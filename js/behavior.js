jQuery(function() {
	
    if( jQuery(window).width() >= 1030 ) 
    {
        jQuery('#content h2').each(function( index ) {
            var percent_downpage = jQuery(this).offset().top / jQuery(document).height();
            var y_position = jQuery(window).height() * percent_downpage;
            jQuery('#outer').append('<div style="top:' + y_position + 'px; background-color:' + 
                                    ColorLuminance('#4dff24', index / -10) + ';" class="table_bubble" ' +
                                    'uid="' + index + '"><div></div><span class="table_number"> ' + index + ' </span class="table_title"> &nbsp;' 
                                    + jQuery( this ).text() +'</span></div>');
            //console.log( index + ": " + jQuery( this ).text() + jQuery( this ).offset().top );
        });
    
        jQuery( window ).resize(function() {
            jQuery('#content h2').each(function( index ) {
            var percent_downpage = jQuery(this).offset().top / jQuery(document).height();
                var y_position = jQuery(window).height() * percent_downpage;
    
                //jQuery('.table_bubble:nth-of-type(' + (index+jQuery('#content h2').size()) + ')').css('top', y_position);
                jQuery('.table_bubble:eq(' + index+ ')').css('top', y_position);
                //console.log( index + ": " + jQuery('.table_bubble:nth-of-type(' + (index+jQuery('#content h2').size()) + ')').text() );
    
            });
        });
        
        var outflag = false;
        
        jQuery('.table_bubble').hover(function() {
            jQuery('.table_bubble').stop().animate(
                {
                    width: "150px"
                }, 
                    500,
                    "easeOutBounce",
                    function(){
                        outflag = true;
                    }
                );
        }, function() {
            jQuery('.table_bubble').stop().animate(
                {
                    width: "40px"
                }, 
                    200,
                    "swing",
                    function(){
                        outflag = false;
                    }
                ); 
        });
    
        jQuery('.table_bubble').click(function() {
           jQuery(window).scrollTop( jQuery('#content h2:eq('+ jQuery(this).attr('uid') +')').offset().top );
           console.log(jQuery('#content h2:eq('+ jQuery(this).attr('uid') +')').text() );
           console.log(jQuery(this).attr('uid'));
        });

    }

function ColorLuminance(hex, lum) {

	// validate hex string
	hex = String(hex).replace(/[^0-9a-f]/gi, '');
	if (hex.length < 6) {
		hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
	}
	lum = lum || 0;

	// convert to decimal and change luminosity
	var rgb = "#", c, i;
	for (i = 0; i < 3; i++) {
		c = parseInt(hex.substr(i*2,2), 16);
		c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
		rgb += ("00"+c).substr(c.length);
	}

	return rgb;
}

});
