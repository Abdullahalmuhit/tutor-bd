$(document).ready(function() {
	
	
	
	$('body').on('click','#notification_click',function(e){
		$.ajax({
			url 	: BASE_URL+'parents/notification_status_change',
			dataType: 'json',
			success	: function(data){
				$('#notification_count').html('0');
			}
		});
	});
	
	$('body').on('click','.select_tutor_from_cv',function(e){
		var job_id = $(this).data('job_id');
		var tutor_id = $(this).data('tutor_id');
		$("#tutor_cv_list").animate({"opacity":0.4});
		$('html, body').animate({scrollTop : 0},800);
		$.ajax({
			url 	: BASE_URL+'parents/select_tutor_from_cv',
			method	: 'post',
			data	: {'job_id' : job_id , 'tutor_id' : tutor_id},
			dataType: 'json',
			success	: function(data){
				if (data.status) {
					$('#select_tutor_message').html('<div class="uk-alert uk-alert-success" data-uk-alert>' + data.msg + '</div>');
					$("#tutor_cv_list").animate({"opacity":1});
				} else {
					$('#select_tutor_message').html('<div class="uk-alert uk-alert-danger" data-uk-alert>' + data.msg + '</div>');
					$("#tutor_cv_list").animate({"opacity":1});
				}
			},
			complete: function()
			{
				//setTimeout(function(){window.location.reload();},2000);
				setTimeout(function(){window.location.replace(BASE_URL+'parents/dashboard');},2000);
			}
		});
	});
});