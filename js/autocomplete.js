var MIN_LENGTH = 3;

$( document ).ready(function() {
	$("#nameOfSongSearch").keyup(function() {
		var keyword = $("#nameOfSongSearch").val();
		if (keyword.length >= MIN_LENGTH) {
			$.get( "autocomplete.php", { keyword: keyword } )
			.done(function( data ) {
				$('#results').html('');
				var results = jQuery.parseJSON(data);
				$(results).each(function(key, value) {
					$('#results').append('<div class="item">' + value + '</div>');
				})

			    $('.item').click(function() {
			    	var text = $(this).html();
			    	$('#nameOfSongSearch').val(text);
			    })

			});
		} else {
			$('#results').html('');
		}
	});

    $("#nameOfSongSearch").blur(function(){
    		$("#results").fadeOut(500);
    	})
        .focus(function() {		
    	    $("#results").show();
    	});

});