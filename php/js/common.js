$(document).ready(function() {

	// Hide all abstracts after pafe load    
    $( '.journal-article-list-abstract' ).hide();
    $( ".trigger-abstract" ).click(function() {
   		
   		var id = $(this).attr('id').replace('display_', 'abstract_')
    	$( '#' + id ).slideDown('slow');
    });

    $( '#togglePast' ).change(function() {

    	if($(this).is(":checked")) {

			$( '#type' ).val('.*');
    	}
    	else {

			$( '#type' ).val('^$|^honorary$');
    	}
    });
});
