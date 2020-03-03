$(document).ready(function() {
	
	$('body').on('click','.reply_email',function(e){
		e.preventDefault();
		var thread_id = $(this).data('thread_id');
		//alert(thread_id);
		var message = $('#mailbox_reply_'+thread_id).val();
		if( message == ''){
			$('#reply_email_message_'+thread_id).html('<div class="uk-alert uk-alert-danger" data-uk-alert>'+
				                                'Please write massage to reply this email.'+
				                            '</div>');
			$('#reply_email_message_'+thread_id).delay(3000).fadeOut('slow');
			return false;
		}
		var receiver = $(this).data('receiver');
		$('#loader_span_'+thread_id).show();
		$(this).attr('disabled', true);
		
		$.ajax({
			url 	: BASE_URL+'parents/reply_to_email',
			method	: 'post',
			data	: {'thread_id' : thread_id , 'message' : message , 'receiver' : receiver},
			dataType: 'json',
			success	: function(data){
				$('#mailbox_reply_'+thread_id).val('');
				$('#reply_email_message_'+thread_id).html('<div class="uk-alert uk-alert-success" data-uk-alert>'+
				                                'Your message sent successfully.'+
				                            '</div>');
				$(this).attr('disabled', false);
			},
			complete: function()
			{
				setTimeout(function(){window.location.reload();},2000);
			}
		});
	});
});