(function() {
    tinymce.create("tinymce.plugins.myelement1", {

        //url argument holds the absolute url of our plugin directory
        init : function(ed, url) {
            ed.addButton("mybutton-element1", {
                title : "title",
                // cmd : "table_command",
                icon: 'icon dashicons-images-alt',
                type: 'menubutton',
                menu: [
                        { 
                            text : 'text', 
                            value : 'insert-myelement1',
                            onclick : function() {
                                var width = jQuery(window).width(), H = jQuery(window).height() - 50, W = ( 800 < width ) ? 800 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'title', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=myelement1-form' );
                            }
                        },
                        { 
                            text : 'text', 
                            value : 'remove-myelement1',
                            onclick : function() {
                                tinyMCE.activeEditor.dom.remove(tinyMCE.activeEditor.dom.select('div[class^=myelement1]'));
                            }
                        }
                ]
            });

        },

        createControl : function(n, cm) {
            return null;
        }
    });

    tinymce.PluginManager.add("myelement1", tinymce.plugins.myelement1);

    jQuery(function(){

        var element1Form = jQuery('<div id="myelement1-form"><table id="myelement1-table" class="form-table">\
            <tr>\
                <th><label for="myelement1-number">number:</label></th>\
                <td><input type="text" id="myelement1-number" name="number" value="3" /><br />\
                <small>specify...</small></td>\
            </tr>\
        </table>\
        <p class="submit-myelement1">\
            <input type="button" id="myelement1-submit" class="button-primary" value="submit" />\
        </p>\
        </div>');
        
        var element1 = element1Form.find('table');
        element1Form.appendTo('body').hide();
        
        jQuery('#myelement1-submit').click(function(){
            var numbers = element1.find('#myelement1-number').val();
            var show_element1 += ''; 
            tinyMCE.activeEditor.execCommand('mceInsertContent', 0, show_element1);
            tb_remove();
            
        });
    });
})();