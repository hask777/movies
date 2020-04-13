jQuery(document).ready(function ($) {
    $('label').on('click', function(e){
		e.preventDefault();
        var genreName = e.target.innerText;
        var id = e.target.querySelector('input').value;

		var api_url = 'https://api.themoviedb.org/3/discover/movie';
		var key = 'adb034dccc907acc9ca6ae36a72f2d6b';

		$.ajax({
		    url: api_url + "?api_key=" + key + "&with_genres=" + id,
		    contentType: "application/json",
		    dataType: 'json',
		    success: function(result){
		    	console.log(result);

		    	$('.popular-movies').html(
				'cxc'
		    	);
		    }
		})
	});
});
