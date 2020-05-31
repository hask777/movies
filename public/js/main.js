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

	// Show movie and trailer buttons

	$('#play_movie').on('click', function(e){
		e.preventDefault();
		$('.youtube').hide();
		$('.videocdn').show();
	});
	
	$('#play_trailer').on('click', function(e){
		e.preventDefault();
			$('.youtube').show();
			$('.videocdn').hide();
	});
	
	// MOBILE

	$('.filter_show_button').on('click', function(){
		$('.filter_mobile_overlay').css('display', 'block');
		$('.mobile_sidebar_close_button').css('display', 'block');
		$('.filter_show_button').css('display', 'none');
	});

	$('.mobile_sidebar_close_button').on('click', function(){
		$('.filter_mobile_overlay').css('display', 'none');
		$('.mobile_sidebar_close_button').css('display', 'none');
		$('.filter_show_button').css('display', 'block');
	});

	// FILTER

	$('.movie_list').hide();
	$('.genres_head').on('click', function(){
		$('.movie_list').slideToggle();		
	});

	$('.countries_list').hide();
	$('.country_head').on('click', function(){
		$('.countries_list').slideToggle();		
	});

	$('.years_list').hide();
	$('.years_head').on('click', function(){
		$('.years_list').slideToggle();		
	});

	$('.raiting_list').hide();
	$('.raiting_head').on('click', function(){
		$('.raiting_list').slideToggle();		
	});

	// AVERAGE
	$('#movie_raiting').change(function() {
		$('#movie_raiting_value').text($(this).val());
	});

});
