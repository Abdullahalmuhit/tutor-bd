/*var dont_confirm_leave = 0; //set dont_confirm_leave to 1 when you want the user to be able to leave withou confirmation
        var leave_message = 'You sure you want to leave?';
		
			function goodbye(e) 
	        {
	        	var full_name = $('#full_name').val();
				var mobile_no = $('#mobile_no').val();
				var city	  = $("#selcity option:selected").text();
				var location = $("#sellocation option:selected").text();
				var category = $("#selcat option:selected").text();
				var sub_cat = $("#selsubcat option:selected").text();
				var step 	  = $('#step').val();
				if(step === '2'){
					if(dont_confirm_leave !== 1)
		            {
		                if(!e) e = window.event;
		                //e.cancelBubble is supported by IE - this will kill the bubbling process.
		                e.cancelBubble = true;
		                e.returnValue = leave_message;
		                //e.stopPropagation works in Firefox.
		                if (e.stopPropagation) 
		                {
		                    e.stopPropagation();
		                    e.preventDefault();
		                    $.ajax({
								type: "POST",
								url: BASE_URL+'alldata/send_email_to_admin',
								data: {'full_name' : full_name, 'mobile_no': mobile_no, 'city' : city, 'location' : location, 'category' : category, 'sub_category' : sub_cat},
								dataType: 'json',
								success: function (data) {
									$('.parent_registration_form')[0].reset();
								},
								complete: function()
								{
									$('#parent_registration_form_first_part').show();
									$('.parent_registration_form_first_part_submit').show();
									$('#step').val('1');
									$('#parent_registration_form_second_part').hide();
									$('.parent_registration_form_second_part_submit').hide();
								}
							});
		                }
		
		                //return works for Chrome and Safari
		                return leave_message;
		            }
				}
	            
	        } 
		//if(step === '2'){}
    window.onbeforeunload=goodbye;*/