<?php
/*
    "Contact Form to Database" Copyright (C) 2011-2013 Michael Simpson  (email : michael.d.simpson@gmail.com)

    This file is part of Contact Form to Database.

    Contact Form to Database is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Contact Form to Database is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Contact Form to Database.
    If not, see <http://www.gnu.org/licenses/>.
*/

require_once('ExportBase.php');
require_once('CFDBExport.php');
require_once('CFDBShortCodeContentParser.php');

class ExportToHtmlTable extends ExportBase implements CFDBExport {

    /**
     * @var bool
     */
    static $wroteDefaultHtmlTableStyle = false;

    var $useBom = false;

    public function setUseBom($use) {
        $this->useBom = $use;
    }

    /**
     * Echo a table of submitted form data
     * @param string $formName
     * @param array $options
     * @return void|string returns String when called from a short code,
     * otherwise echo's output and returns void
     */
    public function export($formName, $options = null) {
        $this->setOptions($options);
        $this->setCommonOptions(true);

        $canDelete = false;
        $useDT = false;
        $editMode = false;
        $printScripts = false;
        $printStyles = false;

        if ($options && is_array($options)) {
            if (isset($options['useDT'])) {
                $useDT = $options['useDT'];
                //$this->htmlTableClass = '';

                if (isset($options['printScripts'])) {
                    $printScripts = $options['printScripts'];
                }

                if (isset($options['printStyles'])) {
                    $printStyles = $options['printStyles'];
                }
                if (isset($options['edit'])) {
                    $this->dereferenceOption('edit');
                    $editMode = 'true' == $this->options['edit'] || 'cells' == $this->options['edit'];
                }
            }

            if (isset($options['canDelete'])) {
                $canDelete = $options['canDelete'];
            }
        }

        // Security Check
        if (!$this->isAuthorized()) {
            $this->assertSecurityErrorMessage();
            return;
        }
        if ($editMode && !$this->plugin->canUserDoRoleOption('CanChangeSubmitData')) {
            $editMode = false;
        }

        // Headers
        $this->echoHeaders('Content-Type: text/html; charset=UTF-8');

        if ($this->isFromShortCode) {
            ob_start();
            if ($this->useBom) {
                // File encoding UTF-8 Byte Order Mark (BOM) http://wiki.sdn.sap.com/wiki/display/ABAP/Excel+files+-+CSV+format
                echo chr(239) . chr(187) . chr(191);
            }
        }
        else {
            if ($this->useBom) {
                // File encoding UTF-8 Byte Order Mark (BOM) http://wiki.sdn.sap.com/wiki/display/ABAP/Excel+files+-+CSV+format
                echo chr(239) . chr(187) . chr(191);
            }
            if ($printScripts) {
                $pluginUrl = plugins_url('/', __FILE__);
                wp_enqueue_script('datatables', $pluginUrl . 'DataTables/media/js/jquery.dataTables.min.js', array('jquery'));
                wp_print_scripts('datatables');
            }
            if ($printStyles) {
                $pluginUrl = plugins_url('/', __FILE__);
                wp_enqueue_style('datatables-demo', $pluginUrl .'DataTables/media/css/demo_table.css');
                wp_enqueue_style('jquery-ui.css', $pluginUrl . 'jquery-ui/jquery-ui.css');
                wp_print_styles(array('jquery-ui.css', 'datatables-demo'));
            }
        }

        // Query DB for the data for that form
        $submitTimeKeyName = 'Submit_Time_Key';
        $this->setDataIterator($formName, $submitTimeKeyName);

        // Break out sections: Before, Content, After
        $before = '';
        $content = '';
        $after = '';
        if (isset($options['content'])) {
            $contentParser = new CFDBShortCodeContentParser;
            list($before, $content, $after) = $contentParser->parseBeforeContentAfter($options['content']);
        }

        if ($before) {
            // Allow for short codes in "before"
            echo do_shortcode($before);
        }

        if ($useDT) {
            $dtJsOptions = isset($options['dt_options']) ?
                    $options['dt_options'] :
                    '"bJQueryUI": true, "aaSorting": [], "iDisplayLength": -1, "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "' . __('All', 'contact-form-7-to-database-extension') . '"]]';
            $i18nUrl = $this->plugin->getDataTableTranslationUrl();
            if ($i18nUrl) {
                if (!empty($dtJsOptions)) {
                    $dtJsOptions .= ',';
                }
                $dtJsOptions .=  " \"oLanguage\": { \"sUrl\":  \"$i18nUrl\" }";
            }
            $dtJsOptions = stripslashes($dtJsOptions); // unescape single quotes when posted via URL
            ?>
            <script type="text/javascript" language="Javascript">
                jQuery(document).ready(function() {
                    jQuery('#<?php echo $this->htmlTableId ?>').dataTable({
                        <?php
                            echo $dtJsOptions;
                            if ($editMode) {
                                do_action_ref_array('cfdb_edit_fnDrawCallbackJsonForSC', array($this->htmlTableId, $this->options['edit']));
                            }
                        ?> })
                });
            </script>
            <?php
        }

        if ($this->htmlTableClass == $this->defaultTableClass && !ExportToHtmlTable::$wroteDefaultHtmlTableStyle) {
            ?>
            <style type="text/css">
                table.<?php echo $this->defaultTableClass ?> {
                    margin-top: 1em;
                    border-spacing: 0;
                    border: 0 solid gray;
                    font-size: x-small;
                }

                br {
                    <?php /* Thanks to Alberto for this style which means that in Excel IQY all the text will
                     be in the same cell, not broken into different cells */ ?>
                    mso-data-placement: same-cell;
                }

                table.<?php echo $this->defaultTableClass ?> th {
                    padding: 5px;
                    border: 1px solid gray;
                }

                table.<?php echo $this->defaultTableClass ?> th > td {
                    font-size: x-small;
                    background-color: #E8E8E8;
                }

                table.<?php echo $this->defaultTableClass ?> tbody td {
                    padding: 5px;
                    border: 1px solid gray;
                    font-size: x-small;
                }

                table.<?php echo $this->defaultTableClass ?> tbody td > div {
                    max-height: 100px;
                    overflow: auto;
                }
            </style>
            <?php
            ExportToHtmlTable::$wroteDefaultHtmlTableStyle = true;
        }

        if ($this->style) {
            ?>
            <style type="text/css">
                <?php echo $this->style ?>
            </style>
            <?php
        }
        ?>

        <table <?php if ($this->htmlTableId) echo "id=\"$this->htmlTableId\" "; if ($this->htmlTableClass) echo "class=\"$this->htmlTableClass\"" ?> >
            <thead>
            <?php
            if (isset($this->options['header']) && $this->options['header'] != 'true') {
               // do not output column headers
            }
            else  {
            ?>
            <tr>
            <?php if ($canDelete) { ?>
            <th id="delete_th" class="col_hidden">
                <button id="delete" name="cfdbdel" onclick="this.form.submit()"><?php echo htmlspecialchars(__('Delete', 'contact-form-7-to-database-extension'))?></button>
                <input type="checkbox" id="selectall"/>
                <script type="text/javascript">
                    jQuery(document).ready(function() {
                        jQuery('#selectall').click(function() {
                            jQuery('#<?php echo $this->htmlTableId ?>').find('input[id^="delete_"]').attr('checked', this.checked);
                        });
                    });
                </script>
            </th>
            
            <?php

            $id_pri_coldi = "";
            }
            ?>
            <th id="col_stt" class="">
            No
            </th>
            <?php
            foreach ($this->dataIterator->getDisplayColumns() as $aCol) {
                $colDisplayValue = $aCol;
                if ($this->headers && isset($this->headers[$aCol])) {
                    $colDisplayValue = $this->headers[$aCol];

                }

                /*if($colDisplayValue == "full_name") {
                    $colDisplayValue = "お名前";
                }

                if($colDisplayValue == "spelling_name") {
                   $colDisplayValue = "フリガナ";
                }

                if($colDisplayValue == "Submitted") {
                   $colDisplayValue = "送信時間";
                }

                if($colDisplayValue == "school_name") {
                   $colDisplayValue = "学校名";
                }

                if($colDisplayValue == "japanese_syllabary") {
                   $colDisplayValue = "japanese syllabary";
                }

                if($colDisplayValue == "phone") {
                   $colDisplayValue = "連絡先電話番号";
                }

                if($colDisplayValue == "mail") {
                   $colDisplayValue = "E-mail アドレス";
                }

                if($colDisplayValue == "question") {
                   $colDisplayValue = "お問い合わせ項目";
                }

                if($colDisplayValue == "content_question") {
                   $colDisplayValue = "お問い合わせ項目";
                }

                if($colDisplayValue == "agress_provision") {
                   $colDisplayValue = "に同意 同意書";
                }

                if($colDisplayValue == "Submitted Login") {
                   $colDisplayValue = "提出ログイン";
                }

                if($colDisplayValue == "company") {
                   $colDisplayValue = "貴社名";
                }

                if($colDisplayValue == "manager") {
                   $colDisplayValue = "部署名・役職";
                }

                if($colDisplayValue == "curator_full_name") {
                   $colDisplayValue = "ご担当者名";
                }*/

                if( ($colDisplayValue == "p1") || ($colDisplayValue == "p2") || 
                    ($colDisplayValue == "p3") || ($colDisplayValue == "name_email") || 
                    ($colDisplayValue == "domail_email") || ($colDisplayValue == "last_name") || 
                    ($colDisplayValue == "first_name") || ($colDisplayValue == "spell_last_name") || 
                    ($colDisplayValue == "spell_first_name") || ($colDisplayValue == "last_curator") ||
                     ($colDisplayValue == "first_curator") || ($colDisplayValue == "spell_last_curator") ||
                      ($colDisplayValue == "spell_first_curator") || ($colDisplayValue == "agress_provision")) {
                   $id_pri_coldi = "del_colDi";
                } else {
                    $id_pri_coldi = "";
                }

                printf('<th title="%s" id="'.$id_pri_coldi.'"><div id="%s,%s">%s</div></th>', $colDisplayValue, $formName, $aCol, $colDisplayValue);
            }
            ?>
            </tr>
            <?php
            } ?>
            </thead>
            <tbody>
            <?php
            $demKey = 0;
            $showLineBreaks = $this->plugin->getOption('ShowLineBreaksInDataTable');
            $showLineBreaks = 'false' != $showLineBreaks;
            while ($this->dataIterator->nextRow()) {
                $demKey++;
                $submitKey = '';
                if (isset($this->dataIterator->row[$submitTimeKeyName])) {
                    $submitKey = $this->dataIterator->row[$submitTimeKeyName];
                }
                ?>
                <tr>
                <?php if ($canDelete && $submitKey) { // Put in the delete checkbox ?>
                    <td align="center" class="col_hidden">
                        <input type="checkbox" id="delete_<?php echo $submitKey ?>" name="<?php echo $submitKey ?>" value="row"/>
                    </td>
                <?php

                }
                ?>
                <?php //for ($demKey=1; $demKey <= 10; $demKey++) {?>
                <td id="text-center-admin"><?php echo $demKey ?></td>
                <?php //} ?>
                <?php

                $fields_with_file = null;
                if (isset($this->dataIterator->row['fields_with_file']) && $this->dataIterator->row['fields_with_file'] != null) {
                    $fields_with_file = explode(',', $this->dataIterator->row['fields_with_file']);
                }
                foreach ($this->dataIterator->getDisplayColumns() as $aCol) {
                    $cell = $this->rawValueToPresentationValue(
                        $this->dataIterator->row[$aCol],
                        $showLineBreaks,
                        ($fields_with_file && in_array($aCol, $fields_with_file)),
                        $this->dataIterator->row[$submitTimeKeyName],
                        $formName,
                        $aCol);

                    if( ($aCol == "p1") || ($aCol == "p2") || ($aCol == "p3") || ($aCol == "name_email") || ($aCol == "domail_email") || ($aCol == "last_name") || ($aCol == "first_name") || ($aCol == "spell_last_name") || ($aCol == "spell_first_name") 
                        || ($aCol == "last_curator") || ($aCol == "first_curator") ||
                         ($aCol == "spell_last_curator") || ($aCol == "spell_first_curator")  || ($aCol == "agress_provision")) {
                       $id_pri_coldi = "del_colDi";
                    } else {
                        $id_pri_coldi = "";
                    }

                    // NOTE: the ID field is used to identify the cell when an edit happens and we save that to the server
                    printf('<td title="%s" id="'.$id_pri_coldi.'"><div id="%s,%s">%s</div></td>', $aCol, $submitKey, $aCol, $cell);
                }
                ?></tr><?php

            } ?>
            </tbody>
        </table>
        <?php

        if ($after) {
            // Allow for short codes in "after"
            echo do_shortcode($after);
        }

        if ($this->isFromShortCode) {
            // If called from a shortcode, need to return the text,
            // otherwise it can appear out of order on the page
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    }

    public function &rawValueToPresentationValue(&$value, $showLineBreaks, $isUrl, &$submitTimeKey, &$formName, &$fieldName) {
        $value = htmlentities($value, null, 'UTF-8'); // no HTML injection
        if ($showLineBreaks) {
            $value = str_replace("\r\n", '<br/>', $value); // preserve DOS line breaks
            $value = str_replace("\n", '<br/>', $value); // preserve UNIX line breaks
        }
        if ($isUrl) {
            $fileUrl = $this->plugin->getFileUrl($submitTimeKey, $formName, $fieldName);
            $value = "<a href=\"$fileUrl\">$value</a>";
        }

        return $value;
    }
}

