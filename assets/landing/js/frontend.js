
	$('#datePicker').datepicker({});
	
	
	$('body').on('change', '.selcity', function(){
		var city_id = $(".selcity").val();
		var url = BASE_URL+"alldata/get_location/"+city_id;
		$.ajax({
			url: url,
			type: "POST",
			dataType: "html",
			success: function(data) {
				$(".sellocation").html(data);
			},
			complete: function(){
				var dropdown_text = $(".selcity option:selected").text();
	
				if(dropdown_text == 'Online'){
					$('#skype_id_div').show();
					$('.sellocation').attr('disabled', 'disabled');
					$("#skype_id").prop('required',true);
				}else{
					$('#skype_id_div').hide();	
					$('.sellocation').prop("disabled", false);
					$("#skype_id").prop('required',false);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus+errorThrown);
			}
		});
	});

	$('body').on('change', '.selcat', function(){
		var cat_id = $(".selcat").val();
		var class_id = $(".select_class").val();
		var url = BASE_URL+"alldata/get_sub_cat/"+cat_id;
		
		$.ajax({
			url: url,
			type: "POST",
			dataType: "html",
			success: function(data) {
				$(".selsubcat").html(data);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus+errorThrown);
			}
		});
	});

	$('body').on("change",".selsubcat", function(){
		var cat_id = $(".selcat").val();
		var class_id = $(".selsubcat").val();
		var url = BASE_URL+"alldata/ajax_load_subject";
		
		$.ajax({
			url: url,
			type: "POST",
			data: {'cat_id' : cat_id, 'class_id': class_id},
			dataType: "html",
			success: function(data) {
				$("#subject_show").html(data);
			},
			complete: function()
			{
				
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus+errorThrown);
			}
		});
	});
	
	$('body').on('click','#submit_first',function(e){
		var full_name = $('#full_name').val();
		var mobile_no = $('#mobile_no').val();
		
		if(full_name != '' && mobile_no != ''){
			$('#parent_registration_form_first_part').hide();
			$('#parent_registration_form_second_part').show();
			$('#step').val('2');
			$('#submit_first').html('Submit');
			$('#back_to_first_form').show();
		}
	});
	
	$('body').on('click','#back_to_first_form',function(e){
		$('#parent_registration_form_first_part').show();
		$('#parent_registration_form_second_part').hide();
		$('#step').val('1');
		$('#submit_first').html('Continue');
		$('#back_to_first_form').hide();
	});
	
	$('body').on('submit','.parent_registration_form',function(e){
		e.preventDefault();
		var step = $('#step').val();
		if(step === '2'){
			if($("input[name='sdg[]']").length > 0){
				if($("input[type='checkbox'][name='sdg[]']:checked").length) {
					
				} else {
					$('.subject_msg').show();
					$('.subject_msg').delay(3000).fadeOut('slow');
					return false;
				}
			}
			
			var url = BASE_URL+$(this).data("link");
				var form = "#"+$(this).attr('id');
				var data = $(form).serialize();

				$.ajax({
					url: url,
					type: "POST",
					data: data,
					dataType: "json",
					success: function(data) {
						//return false;
						if(data.status == 'redirect')
						{
							window.location.href = BASE_URL+data.url;
						}
						if(data.status == 'message')
						{
							$("#msg").html(data.msg);
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert(textStatus+errorThrown);
					}
				});
		}else if(step === '1'){
			var full_name = $('#full_name').val();
			var mobile_no = $('#mobile_no').val();
			
			if(full_name != '' && mobile_no != ''){
				
				$('#parent_registration_form_first_part').hide();
				$('#parent_registration_form_second_part').show();
				$('#step').val('2');
			}
		}
	});
	
	$('body').on('submit','#tutor_registration_form',function(e){
		e.preventDefault();
		$("#tutor_registration_form").animate({"opacity":0.4});
		$('#tutor_registration_continue').prop('disabled', true);
		var url = BASE_URL+$(this).data("link");
		var form = "#"+$(this).attr('id');
		var data = $(form).serialize();
		$.ajax({
			url: url,
			type: "POST",
			data: data,
			dataType: "json",
			success: function(data) {
				if(data.status == 'redirect')
				{
					window.location.href = BASE_URL+data.url;
				}
				if(data.status == 'message')
				{
					$("#msg").html(data.msg).show();
					$('#tutor_registration_continue').prop('disabled', false);
					$("#tutor_registration_form").animate({"opacity":1});
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus+errorThrown);
			}
		});
	});
	
	$('#hireTutorModal').on('hidden.bs.modal', function () {
		var full_name = $('#full_name').val();
		var mobile_no = $('#mobile_no').val();
		var step = $('#step').val();
		
		if(step == '2' && full_name != '' && mobile_no != ''){
			$.ajax({
				type: "POST",
				url: BASE_URL+'alldata/send_email_to_admin',
				data: {'full_name' : full_name, 'mobile_no': mobile_no},
				dataType: 'json',  // fix: need to append your data to the call
				success: function (data) {
					$('.parent_registration_form')[0].reset();
					$('#parent_registration_form_first_part').show();
					$('.parent_registration_form_first_part_submit').show();
					$('#step').val('1');
					$('#parent_registration_form_second_part').hide();
					$('.parent_registration_form_second_part_submit').hide();
					$('.sellocation').prop("disabled", false);
					
					$('#back_to_first_form').hide();
				},
				complete: function()
				{
					
				}
			});
		}else{
			$('.parent_registration_form')[0].reset();
		}
	});

	$('#becomeATutorModal').on('hidden.bs.modal', function () {
		$('#tutor_registration_form')[0].reset();
	});

	$('body').on('change','#password',function(e){
		e.preventDefault();
		var password = $("#password").val();
		var confirm_password = $("#confirm_password").val();
		validatePassword();
	});
	
	$('body').on('keyup','#confirm_password',function(e){
		e.preventDefault();
		var password = $("#password").val();
		var confirm_password = $("#confirm_password").val();
		validatePassword();
	});
	
	
	$('body').on('change','#tutor_password',function(e){
		e.preventDefault();
		var password = $("#tutor_password").val();
		var confirm_password = $("#tutor_confirm_password").val();
		validateTutorPassword();
	});
	
	$('body').on('keyup','#tutor_confirm_password',function(e){
		e.preventDefault();
		var password = $("#tutor_password").val();
		var confirm_password = $("#tutor_confirm_password").val();
		validateTutorPassword();
	});

function validatePassword(){
	var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");
  
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

function validateTutorPassword(){
	var password = document.getElementById("tutor_password")
  , confirm_password = document.getElementById("tutor_confirm_password");
  
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}
