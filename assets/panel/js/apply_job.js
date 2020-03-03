$(document).ready(function(){
	$('body').on('click','#notification_click',function(e){
		$.ajax({
			url 	: BASE_URL+'parents/notification_status_change',
			dataType: 'json',
			success	: function(data){
				$('#notification_count').html('0');
			}
		});
	});

	$('body').on('click',".edit-education" ,function(e){
		e.preventDefault();
		var id = $(this).data('edu_id');
		//alert(id);
		var modal = UIkit.modal("."+id);
		modal.show();
	});

	$('body').on('click',".delete-education" ,function(e){
		e.preventDefault();
		var id = $(this).data('edu_del_id');
		UIkit.modal.confirm("Are you sure you want to delete?", function(){

			var url = BASE_URL+"tutor/ajax_delete_tutor_educational_info";

			$.ajax({
				url: url,
				type: "POST",
				data: {
					'id' 	: id
					},
				dataType: "html",
				success: function(data) {
					$('div[id="education_info_accordin"]').html(data);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert(textStatus+errorThrown);
				}
			});
	    });
	});

	$("body").on('click', '.next_question', function(){
		if ($("input[name='quiz_ans']:checked").val()){
			var ans_val = $("input[name='quiz_ans']:checked").val();
		}
		else
		{
			return;
		}

		var question_id = $("input[name='question_id']").val();
		var que_point = $("input[name='que_point']").val();

		$.ajax({
			   url: BASE_URL + 'quizes/load_next_quiz_question/',
			   type: "POST",
			   data: {answer: ans_val, question_id: question_id, que_point: que_point},
			   dataType: "html",
			   async: false,
			   success: function(data) {
				   if (data == "2")
				   {
					   $('#'+'qz').html(data);
				   }
				   else
				   {
					   $('#'+'qz').html(data);
				   }

			   },
			   complete: function() {
			   }
	    });
	});

	$("body").on('click', '.submit_quiz', function(){

		var marks = 0;

		/*var values = [];
		$("input[name='question_id[]']").each(function() {
			values.push($(this).val());
		});*/

		$("input[name='question_id[]']").each(function(){

			var question_id = $(this).val(); //20
			var given_ans = $("input[name='quiz_ans_"+question_id+"']:checked").val(); //C
			var correct_ans = $("input[name='correct_ans_"+question_id+"']").val(); //C

			if (given_ans == correct_ans){ //True
				var que_point = $("input[name='que_point_"+question_id+"']").val(); //1
				marks = (marks*1) + (que_point*1); // 0+1
			}
			else
			{
				marks = marks + 0;
			}
			//alert(marks);
		});

		$.ajax({
			   url: BASE_URL + 'quizes/quiz_completed/',
			   type: "POST",
			   data: {marks:marks},
			   dataType: "html",
			   async: true,
			   success: function(data) {
				   window.location.href = BASE_URL+"quizes/quiz_completed";
				   $('#'+'quiz_result').html(data);

			   },
			   complete: function() {
			   }
	    });
	});

	$("body").delegate(".apply_job_yes", "click", function(e){
		e.preventDefault();
		var job_id = $(this).data('job_id');
		var category = $(this).data('category');
		var sub_cat = $(this).data('sub_cat');
		var student_gender = $(this).data('student_gender');
		var days_per_week = $(this).data('days_per_week');
		var salary_range = $(this).data('salary_range');

			$('#generic_question_div_'+job_id).html('<div class="uk-modal-spinner">Please wait...</div>');
			// $('.apply_job_yes').prop('disabled', true);
			// $('.apply_job_no').prop('disabled', true);
			// $('.uk-modal-close').prop('disabled', true);

			var url = BASE_URL+"landing/tutor_final_submission";

			$.ajax({
				type: "POST",
				url : url,
				data: {'job_id' : job_id},
				dataType : 'JSON',
				success : function(result)
				{
					if(result === 1){
						$('#generic_question_div_'+job_id).html('<center style="border-bottom: none !important;"><p style="color: #6dbe45; font-size: 16px;">You have applied this job successfully.</p></center>');
						$('#uk_modal_footer_'+job_id).hide();
						$('#apply_button_disabled_'+job_id).html('<div class="uk-width-medium-1">'+
						                            '<a class="md-btn md-btn-flat disabled" style="background: #eaeaea !important;" href="javascript:void(0)">Applied</a>'+
						                        '</div>');
						var modal = UIkit.modal(".uk-modal");
						setTimeout(function(){
						    modal.hide();
						    // window.location.href = BASE_URL+"tutor/dashboard";
						}, 4000);
					} else {
						$('#generic_question_div_'+job_id).html('<center class="center" style="border-bottom: none !important;"><p style="color: #a9444b;">Something wrong. Try again.</p></center>'+
						'<p>You\'ve to tution a <b>'+category+' '+sub_cat+'</b> and <b>'+student_gender+'</b> student.</p>'+
							        	'<p>This job cost your <b>'+days_per_week+' days per week</b> and you\'ll be paid <b>'+salary_range+'</b> tk.</p>'+
							        	'<p>Are you sure to apply this job?</p>');

						$('.apply_job_yes').prop('disabled', false);
						$('.apply_job_no').prop('disabled', false);
						$('.uk-modal-close').prop('disabled', false);
					}
				},
				complete : function()
				{
					$(".center").show().delay(5000).fadeOut();
				}
			});
    });

	$( "body" ).delegate( "#close_map", "click", function() {
		var job_id = $(this).data('job_id');
		$('#collapse_'+job_id).addClass('uk-hidden');
	});


	$( "body" ).delegate( ".get_location", "click", function() {
		// Map JavaScript API
	    var job_id = $(this).data('job_id');
		var lat = $(this).data('map_lat');
		var lng = $(this).data('map_lng');
		var gen = $(this).data('map_gen');

		$('#collapse_'+job_id).removeClass('uk-hidden');

		if (gen === false) {
			var tuitionLatLng = {lat: lat, lng: lng};
			
			var map = new google.maps.Map(document.getElementById('map_location_'+job_id), {
				zoom: 17,
				center: tuitionLatLng,
				gestureHandling: 'greedy'
			});
			
			var marker = new google.maps.Marker({
				position: tuitionLatLng,
				map: map,
				icon: "https://caretutors.com/assets/img/mini_marker.png"
				// title: 'Hello World!'
			});
			
			var sunCircle = {
		        strokeColor: "#0675c1",
		        strokeOpacity: 0.8,
		        strokeWeight: 2,
		        fillColor: "#0675c1",
		        fillOpacity: 0.35,
		        map: map,
		        center: tuitionLatLng,
		        radius: 100 // in meters
		    };
		    cityCircle = new google.maps.Circle(sunCircle)
		    cityCircle.bindTo('center', marker, 'position');
		    $(this).data('map_gen',true);
		}

		// Map Static API
		// var job_id = $(this).data('job_id');
		// var gen = $(this).data('map_gen');
		// var lat = $(this).data('map_lat');
		// var lng = $(this).data('map_lng');

		// var mq = window.matchMedia( "(max-width: 600px)" );
		// var size = '650x250';
		// var zoom = '17';
		// if (mq.matches) {
		// 	size = '300x250';
		// 	zoom = '16';
		// }

		// $('#collapse_'+job_id).removeClass('uk-hidden');
		// if (gen === false) {

		// 	$('#collapse_'+job_id).find('#static_api_image_'+job_id).html('<img class="map-static-image" src="https://maps.googleapis.com/maps/api/staticmap?center='+ lat +','+ lng +'&zoom='+ zoom +'&size='+ size +'&maptype=roadmap&markers=label:C%7Ccolor:red%7C'+ lat +','+ lng +'&key=AIzaSyCdo_CRxtGWcZOr7MxI2ihcSr9d-t0V_Kk">');
		// 	$(this).data('map_gen',true);
		// }

	});

	$( "body" ).delegate( ".get_direction", "click", function() {
		// Map Javascript Api
		// var job_id = $(this).data('job_id');
		// var lat = $(this).data('map_lat');
		// var lng = $(this).data('map_lng');
		//
		// $('#collapse_'+job_id).removeClass('uk-hidden');
		// $('#collapse_'+job_id).find('#map_direction_panel_'+job_id).removeClass('uk-hidden');
		//
		// var tuitionLatLng = {lat: lat, lng: lng};
		//
		// if( navigator.geolocation ) {
	    //    navigator.geolocation.getCurrentPosition( success, fail );
	    // } else {
	    //    alert("Sorry, your browser does not support geolocation services.");
	    // }
		//
		// function success(position) {
		// 	var myLat = position.coords.latitude;
		// 	var myLng = position.coords.longitude;
		//
		// 	var myLatLng = {lat: myLat, lng: myLng};
		// 	console.log(myLatLng);
		//
		// 	var directionsService = new google.maps.DirectionsService();
		// 	var directionsDisplay = new google.maps.DirectionsRenderer();
		//
		// 	var map = new google.maps.Map(document.getElementById('map_location_'+job_id), {
		// 		zoom:20,
		// 		mapTypeId: google.maps.MapTypeId.ROADMAP
		// 	});
		//
		// 	directionsDisplay.setMap(map);
		// 	directionsDisplay.setPanel(document.getElementById('map_direction_panel_'+job_id));
		//
		// 	var request = {
		// 		origin: myLatLng,
		// 		destination: tuitionLatLng,
		// 		travelMode: google.maps.DirectionsTravelMode.DRIVING
		// 	};
		//
		// 	directionsService.route(request, function(response, status) {
		// 		if (status == google.maps.DirectionsStatus.OK) {
		// 			directionsDisplay.setDirections(response);
		// 		}
		// 	});
		//
		// }
		//
		// function fail() {
		// 	// Could not obtain location
		// }

		// Redirect to Google
		window.open('https://www.google.com/maps/dir/?api=1&destination='+ $(this).data('map_lat') +','+ $(this).data('map_lng'), '_blank');
	});

	$( "body" ).delegate( ".undo_applied_job", "click", function(e) {
		e.preventDefault();
	    var answer=confirm('By pressing OK button you are going to UNDO the job application');
	    if(answer) {
	    	var job_id = $(this).data('job_id');
	    	$.ajax({
				url 	: BASE_URL + 'tutor/ajax_undo_applied_job/' + job_id,
				dataType: 'json',
				success	: function(result){
					if (result === 1) {
						location.reload();
					} else {
						alert('You can not undo this application');
					}
				}
			});
	    }
	});


});
