$(document).ready(function(){
	$( "body" ).delegate( ".applyJobSignInButton", "click", function(e) {
	// $('body').on('click',".applyJobSignInButton" ,function(e){
		var job_id = $(this).data('job_id');

		var url = BASE_URL+"landing/check_session_exist";
		$.ajax({
			type: "POST",
			url : url,
			data: {'job_id' : job_id},
			dataType : 'html',
			success : function(data)
			{
				$('.modal-dialog').html(data);
				$('#modal_job_id').val(job_id);
				$('#applyJobSignInModal').modal('show');
			},
			complete : function()
			{
				var apply_success_flag = $('#apply_success_flag').val();
				if(apply_success_flag){
					window.location.href = BASE_URL+'tutor/dashboard/0/1';
				}
			}
		});
    });

    $('body').on('submit','#apply_job_signin_form',function(e){
		e.preventDefault();
		$('.modal_loading').show();
		$(".modal-content").animate({"opacity":0.9});
		$('#apply_job_signin').prop('disabled', true);
		var data = $(this).serialize();
		var url = BASE_URL+"landing/apply_job_signin_form";
		$.ajax({
			type: "POST",
			url : url,
			data: data,
			dataType : 'html',
			success : function(data)
			{
				$('.modal-dialog').html(data);
			},
			complete : function()
			{
				var apply_success_flag = $('#apply_success_flag').val();
				if(apply_success_flag){
					window.location.href = BASE_URL+'tutor/dashboard/0/1';
				}
				$('.modal_loading').hide();
				$(".modal-content").animate({"opacity":1});
			}
		});
	});

	$('body').on('click','#modal_tutor_signup',function(e){
		e.preventDefault();
		$('.modal_loading').show();
		$(".modal-content").animate({"opacity":0.9});
		$('#apply_job_signin').prop('disabled', true);
		var url = BASE_URL+"landing/modal_tutor_signup_form";
		$.ajax({
			url : url,
			dataType : 'html',
			success : function(data)
			{
				$('.modal-dialog').html(data);
				//return false;
			},
			complete : function()
			{
				$('.modal_loading').hide();
				$(".modal-content").animate({"opacity":1});
			}
		});
	});

	$('body').on('submit','#modal_tutor_signup_form',function(e){
		e.preventDefault();
		$('.modal_loading').show();
		$(".modal-content").animate({"opacity":0.9});
		$('#apply_job_signin').prop('disabled', true);
		var data = $(this).serialize();
		var url = BASE_URL+"landing/check_email_unique";
		$.ajax({
			type: "POST",
			url : url,
			data: data,
			dataType : 'JSON',
			success : function(result)
			{
				if(result == 0){
					$('#email_unique_p').show();
					$('#password').val('');
					$('#confirm_password').val('');
				} else if(result == 1)
				{
					modal_tutor_signup(data);
				}
			},
			complete : function()
			{
				$('.modal_loading').hide();
				$(".modal-content").animate({"opacity":1});
			}
		});
	});

	/*$('body').on('change','.location_q',function(e){
		var location_q = $(this).val();
		if(location_q == 1)
		{
			e.preventDefault();
			$('.modal_loading').show();
			$(".modal-content").animate({"opacity":0.9});
			var url = BASE_URL+"landing/gender_question";
			var job_id = $(this).data('job_id');
			$.ajax({
				type: "POST",
				url : url,
				data: {'job_id' : job_id},
				dataType : 'html',
				success : function(result)
				{
					$('.modal-dialog').html(result);
				},
				complete : function()
				{
					var apply_success_flag = $('#apply_success_flag').val();
					if(apply_success_flag){
						window.location.href = BASE_URL+'tutor/dashboard/0/1';
					}
					$('.modal_loading').hide();
					$(".modal-content").animate({"opacity":1});
				}
			});
		}else if(location_q == 0){
			var url = BASE_URL+"landing/ajax_sign_in_form";
			$.ajax({
				type: "POST",
				url : url,
				dataType : 'html',
				success : function(result)
				{
					$('#applyJobSignInModal').modal('hide');
					$('.modal-dialog').html(result);
				},
				complete : function()
				{

				}
			});
		}
	});

	$('body').on('change','.gender_q',function(e){
		var gender_q = $(this).val();
		if(gender_q == 1)
		{
			e.preventDefault();
			$('.modal_loading').show();
			$(".modal-content").animate({"opacity":0.9});
			var url = BASE_URL+"landing/category_question";
			var job_id = $(this).data('job_id');
			$.ajax({
				type: "POST",
				url : url,
				data: {'job_id' : job_id},
				dataType : 'html',
				success : function(result)
				{
					$('.modal-dialog').html(result);
				},
				complete : function()
				{
					var apply_success_flag = $('#apply_success_flag').val();
					if(apply_success_flag){
						window.location.href = BASE_URL+'tutor/dashboard/0/1';
					}
					$('.modal_loading').hide();
					$(".modal-content").animate({"opacity":1});
				}
			});
		}else if(gender_q == 0){
			var url = BASE_URL+"landing/ajax_sign_in_form";
			$.ajax({
				type: "POST",
				url : url,
				dataType : 'html',
				success : function(result)
				{
					$('#applyJobSignInModal').modal('hide');
					$('.modal-dialog').html(result);
				},
				complete : function()
				{

				}
			});
		}
	});

	$('body').on('change','.category_q',function(e){
		var category_q = $(this).val();
		if(category_q == 1)
		{
			e.preventDefault();
			$('.modal_loading').show();
			$(".modal-content").animate({"opacity":0.9});
			var url = BASE_URL+"landing/final_submission";
			var job_id = $(this).data('job_id');
			$.ajax({
				type: "POST",
				url : url,
				data: {'job_id' : job_id},
				dataType : 'html',
				success : function(result)
				{
					$('.modal-dialog').html(result);
				},
				complete : function()
				{
					var apply_success_flag = $('#apply_success_flag').val();
					if(apply_success_flag){
						window.location.href = BASE_URL+'tutor/dashboard/0/1';
					}
					$('.modal_loading').hide();
					$(".modal-content").animate({"opacity":1});
				}
			});
		}else if(category_q == 0){
			var url = BASE_URL+"landing/ajax_sign_in_form";
			$.ajax({
				type: "POST",
				url : url,
				dataType : 'html',
				success : function(result)
				{
					$('#applyJobSignInModal').modal('hide');
					$('.modal-dialog').html(result);
				},
				complete : function()
				{

				}
			});
		}
	});*/

	$('body').on('change','.generic_q',function(e){
		var generic_q = $(this).val();
		if(generic_q == 1)
		{
			e.preventDefault();
			$('.modal_loading').show();
			$(".modal-content").animate({"opacity":0.9});
			var url = BASE_URL+"landing/final_submission";
			var job_id = $(this).data('job_id');
			$.ajax({
				type: "POST",
				url : url,
				data: {'job_id' : job_id},
				dataType : 'html',
				success : function(result)
				{
					$('.modal-dialog').html(result);
				},
				complete : function()
				{
					var apply_success_flag = $('#apply_success_flag').val();
					if(apply_success_flag){
						window.location.href = BASE_URL+'tutor/dashboard/0/1';
					}
					$('.modal_loading').hide();
					$(".modal-content").animate({"opacity":1});
				}
			});
		} else if (generic_q == 0){
			var url = BASE_URL+"landing/ajax_sign_in_form";
			$.ajax({
				type: "POST",
				url : url,
				dataType : 'html',
				success : function(result)
				{
					$('#applyJobSignInModal').modal('hide');
					$('.modal-dialog').html(result);
				},
				complete : function()
				{

				}
			});
		}
	});

	$('#applyJobSignInModal').on('hidden.bs.modal', function () {
		var url = BASE_URL+"landing/ajax_sign_in_form";
		$.ajax({
			type: "POST",
			url : url,
			dataType : 'html',
			success : function(result)
			{
				$('.modal-dialog').html(result);
			},
			complete : function()
			{

			}
		});
	});
});

function modal_tutor_signup(data)
{
	var url = BASE_URL+"landing/add_basic_info";
	$.ajax({
		type: "POST",
		url : url,
		data: data,
		dataType : 'json',
		success : function(data)
		{
			var url = BASE_URL+"landing/modal_tutor_signup_confirmation";
			$.ajax({
				type: "POST",
				url : url,
				dataType : 'html',
				success : function(data)
				{
					$('.modal-dialog').html(data);
				}
			});
		}
	});
}
