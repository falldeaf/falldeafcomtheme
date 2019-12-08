 jQuery('.videomenu').on("click", "li:not(.selected)", function() {
  	jQuery(this).parent().find('li').removeClass("selected");
    jQuery(this).parent().find('li').removeClass("hovered");
    jQuery(this).parent().find('.fa').removeClass("rainbow");
    jQuery(this).addClass("selected");
    jQuery("#" + jQuery(this).parent().attr('id') + "vid").attr('src', jQuery( this ).attr('vidurl'));
    jQuery("#" + jQuery(this).parent().attr('id') + "descrip").html( jQuery(this).find('span').html() );
  });
  
 jQuery('.videomenu').on("mouseenter", "li:not(.selected)", function() {
 		jQuery( this ).addClass('hovered');
    jQuery( this ).find( ".fa" ).addClass('rainbow');
  })
  .on("mouseleave", "li:not(.selected)", function() {
  	jQuery( this ).removeClass('hovered');
    jQuery( this ).find( ".fa" ).removeClass('rainbow');
  });
