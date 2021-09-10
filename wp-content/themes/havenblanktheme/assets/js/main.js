/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
    
    $(document).on('click', function(e){
        //ordering dropdown
        if ($('.sort__current').has(e.target).length === 0){
            $('.sort__current').next().toggleClass('open')
        }
    })
	

}( jQuery ) );
