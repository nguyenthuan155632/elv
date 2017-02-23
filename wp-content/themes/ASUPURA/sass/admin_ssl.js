jQuery(document).ready(function() {
    jQuery('#selectall').click(function(event) {
        if(this.checked) {
            jQuery('.checkbox1').each(function() {
                this.checked = true;             
            });
        }else{
            jQuery('.checkbox1').each(function() {
                this.checked = false;                 
            });         
        }
    });
    
});

// jQuery(document).ready(function() {
//     jQuery( ".custom-pagination a" ).click(function() {
//         jQuery('.custom-pagination a').removeClass('active');
//         jQuery(this).addClass('active');
//     });
// });