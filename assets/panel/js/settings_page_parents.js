$(document).ready(function(){
	$('body').on('click','#check_password',function(e){
		e.preventDefault();
		var previous_password = $('#previous_password').val();
		var url = BASE_URL + 'parents/check_password';
		$.ajax({
			url: url,
			type: "POST",
			data: {'previous_password' : previous_password},
			dataType: "JSON",
			success: function(data) {
				if(data === 1){
					$('#password_message').html('<p class="uk-text-bold uk-text-success uk-text-center">Current password matched</p>');
					$('#new_password').prop("disabled", false);
					$('#confirm_password').prop("disabled", false);
					//$('#update_password').removeClass("disabled");
				}else{
					$('#password_message').html('<p class="uk-text-bold uk-text-danger uk-text-center">Current password doesn\'t matched</p>');
					$('#new_password').prop("disabled", true);
					$('#confirm_password').prop("disabled", true);
					//$('#update_password').addClass("disabled");
				}
				$('#password_message').show();
				$('#password_message').delay(3000).fadeOut('slow');
			}
		});
	});
	
	$('body').on('keyup','#new_password',function(e){
		e.preventDefault();
		var password = $("#new_password").val();
		var confirm_password = $("#confirm_password").val();
		validatePassword();
	});
	
	$('body').on('keyup','#confirm_password',function(e){
		e.preventDefault();
		var password = $("#new_password").val();
		var confirm_password = $("#confirm_password").val();
		validatePassword();
	});
	
	$('body').on('click','#update_password',function(e){
		e.preventDefault();
		var password = $("#new_password").val();
		var url = BASE_URL + 'parents/update_password';
		$('#password_match_message').html('');
		$.ajax({
			url: url,
			type: "POST",
			data: {'password' : password},
			dataType: "JSON",
			success: function(data) {
				if(data === 1){
					$('#password_message').html('<p class="uk-text-bold uk-text-success uk-text-center">Password updated successfully</p>');
					$('#new_password').prop("disabled", true);
					$('#confirm_password').prop("disabled", true);
					$('#update_password').addClass("disabled");
				}else{
					$('#password_message').html('<p class="uk-text-bold uk-text-danger uk-text-center">Password can\'t be updated</p>');
					$('#new_password').prop("disabled", true);
					$('#confirm_password').prop("disabled", true);
					$('#update_password').addClass("disabled");
				}
			},
			complete : function()
			{
				$("#previous_password").val('');
				$("#new_password").val('');
				$("#confirm_password").val('');
				$('#password_message').show();
				$('#password_message').delay(3000).fadeOut('slow');
			}
		});
	});
	
	$('body').on('click','#update_mobile_no',function(e){
		e.preventDefault();
		var mobile_no = $("#mobile_no").val();
		var url = BASE_URL + 'parents/update_mobile_no';
		$.ajax({
			url: url,
			type: "POST",
			data: {'mobile_no' : mobile_no},
			dataType: "JSON",
			success: function(data) {
				if(data === 1){
					$('#mobile_no_message').html('<p class="uk-text-bold uk-text-success uk-text-center">Mobile no. updated successfully</p>');
				}else{
					$('#mobile_no_message').html('<p class="uk-text-bold uk-text-danger uk-text-center">Mobile no. can\'t be updated</p>');
				}
				$('#mobile_no_message').show();
				$('#mobile_no_message').delay(3000).fadeOut('slow');
			}
		});
	});
});

function validatePassword(){
	var password = $("#new_password").val();
	var confirmPassword = $("#confirm_password").val();
	
	if (password != confirmPassword){
			$('#update_password').addClass("disabled");
			$('#password_match_message').html('<p class="uk-text-bold uk-text-danger uk-text-center">Passwords do not match!</p>');
	}else{
			$('#update_password').removeClass("disabled");
			$('#password_match_message').html('<p class="uk-text-bold uk-text-success uk-text-center">Passwords matched!</p>');
		}
}
