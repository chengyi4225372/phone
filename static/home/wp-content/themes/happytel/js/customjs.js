jQuery( document ).ready(function( $ ) {
    
//    $('#quote-issue-overlay').on("click", function() {
//        $('#issue-popup .form-popup-content .other-link').removeClass('other-link').insertAfter('#issue-popup .form-popup-content ul li:last-child').wrap('<li class="others">');
//
//    });
    

    $('.quoteResult-page .quote-result-block .quote-result-left .est-block p:nth-child(2)').prepend('*', $('.quoteResult-page .quote-result-block .quote-result-left .est-block p:nth-child(2) span'), ' ');
    
    $('.quoteResult-page .quote-result-block .quote-result-left .est-block p:nth-child(2)').attr({
        'title' : '<h3>What\'s the difference between an Original (OEM) and Generic screen?</h3><p>Our original (OEM) screens are made with original parts whereas generic screens are made by other manufacturers.</p>',
        'data-tippy-theme' : 'custom'
    });
    
    // $('.quoteResult-page .quote-result-block .quote-result-left .est-block').append($('.quoteResult-page .quote-result-block .quote-result-left .est-block p:first-child'));
    
//    tippy(ref, {
//        // Available v2.3+ - If true, HTML can be injected in the title attribute
//        allowTitleHTML: true,
//    });
    
	$("#input_2_3").attr("readonly","readonly");
	
    tippy('.est-price', {
        delay: 50,
        arrow: true,
        arrowType: 'sharp',
        size: 'large',
        duration: 500,
        animation: 'scale',
        placement: 'bottom'
    });
    
    $('.single-post .page-content').append($('.yarpp-related'));
    
    jQuery( document ).on( 'change','.field-date input', function(){
      var site_url = window.location.origin;
      
      var date = jQuery( this ).val();
      var store = getUrlParams( 'centre_field' );
      
      var details = date +'_'+ store;
      
      jQuery.ajax({
      type: "POST",
      url: site_url + '/wp-content/themes/happytel/custom-ajax-functions.php',
      data:{
      'type' : 'get_date_hours',
      'details' : details,
      },

      success: function ( data ) {
        jQuery( '.page-template-book-now .page-content-block .gform_wrapper .gform_body .gfield.field-time select' ).empty().append( data );
        jQuery( '.page-template-book-now .page-content-block .gform_wrapper .gform_body .gfield.field-time').css( 'visibility', 'visible' );
      },
      error: function ( data ) {
        console.log('error');
      }
    } );
      
    } )
    
});

function getUrlParams( prop ) {
    var params = {};
    var search = decodeURIComponent( window.location.href.slice( window.location.href.indexOf( '?' ) + 1 ) );
    var definitions = search.split( '&' );

    definitions.forEach( function( val, key ) {
        var parts = val.split( '=', 2 );
        params[ parts[ 0 ] ] = parts[ 1 ];
    } );

    return ( prop && prop in params ) ? params[ prop ] : params;
}