jQuery(document).ready(function($){
	var screenWidth = window.screen.width;
    if(screenWidth < 800){
        window.location.href = 'http://loclhost/tutor/www/m.caretutors';
    }

	
	$('.fdw-background').hover(
		function () {
			$(this).animate({opacity:'1'});
		},
		function () {
			$(this).animate({opacity:'0'});
		}
	);
	
	$('body').on('click','.select_tutor_from_best_cv',function(e){
		e.preventDefault();
		var tutor_id = $(this).data('tutor_id');
		var name = $(this).data('name');
		var address = $(this).data('address');
		var institution_name = $(this).data('institution_name');
		var job_id = $(this).data('job_id');
		//$('#tutor_select_button_'+tutor_id).addClass('disabled');
		$('.view_button_'+job_id).addClass('disabled');
		$('#tutor_select_button_'+tutor_id+'_'+job_id).html('Selected');
		var html = '<p>'+name+'</p><p>'+institution_name+'</p>'+
				   '<p><a href="javascript:void(0)" style="text-decoration: none;" class="view_tutor">'+
				   '<span class="label label-info">View</span>'+
				   '</a> <a href="javascript:void(0)" style="text-decoration: none;" data-job_id="'+job_id+'" data-tutor_id="'+tutor_id+'" class="cancel_tutor">'+
				   '<span class="label label-danger">Cancel</span></a></p>';
		$('#selected_tutor_'+job_id).html(html);
	});
	
	$('body').on('click','.cancel_tutor',function(e){
		var tutor_id = $(this).data('tutor_id');
		var job_id = $(this).data('job_id');
		$('#tutor_select_button_'+tutor_id+'_'+job_id).html('View');
		$('#selected_tutor_'+job_id).html('');
		$('.view_button_'+job_id).removeClass('disabled');
	});
	
	$('body').on('change', '.selcity', function(){
		var city_id = $(this).val();
		var url = BASE_URL+"alldata/get_location_dropdown/"+city_id;
		$.ajax({
			url: url,
			type: "POST",
			dataType: "html",
			success: function(data) {
				$('div.sellocation').remove();
				$('select[id="sellocation"]').remove();
				$('div[class="location_dropdown"]').html(data);
				altair_forms.select_elements();
			},
			complete: function(){
				var dropdown_text = $(".selcity option:selected").text();
	
				if(dropdown_text == 'Online'){
					$('#skype_id_div').show();
					$('#sellocation').attr('disabled', 'disabled');
					//
				}else{
					$('#skype_id_div').hide();	
					$('#sellocation').prop("disabled", false);
					//
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus+errorThrown);
			}
		});
	});
	
	var toggleform = function(){
		if($('#req_step_one').is(':visible')) {
            $('#req_step_one').hide();
            $('#req_step_two').show();
            $('#submit_form').text('Submit');
            //$("#skype_id").prop('required',true);
        } else {
        	$('#req_step_one').show();
        	$('#req_step_two').hide();
        	$('#submit_form').text('Continue');
        	//$("#skype_id").prop('required',false);
        }
	};
	
	/*$('body').on('click','#sstep',function(e) {
        e.preventDefault();
        var step = $('#step').val();
		if(step === '1'){
			altair_md.card_show_hide(req_step_one,undefined,toggleform,undefined);
			$('#step').val('2');
			$('#sstep').html('Submit');
			$('#back_to_first_form').show();
		} else if(step === '2')
		{
			new_job_add();
		}
    });*/
   
   $('body').on('submit','.new_job_add',function(e) {
        e.preventDefault();
        var step = $('#step').val();
		if(step === '1'){
			altair_md.card_show_hide(req_step_one,undefined,toggleform,undefined);
			$('#step').val('2');
			$('#sstep').html('Submit');
			$('#back_to_first_form').show();
		} else if(step === '2')
		{
			new_job_add();
		}
    });
	
	$('body').on('click','#back_to_first_form',function(e){
		altair_md.card_show_hide(req_step_one,undefined,toggleform,undefined);
		$('#step').val('1');
		$('#sstep').html('Continue');
		$('#back_to_first_form').hide();
	});
	
	$('body').on('change', '.selcat', function(){
		var cat_id = $(this).val();
		var url = BASE_URL+"alldata/get_sub_cat_dropdown/"+cat_id;
		
		$.ajax({
			url: url,
			type: "POST",
			dataType: "html",
			success: function(data) {
				$('div.selsubcat').remove();
				$('select[id="selsubcat"]').remove();
				$('div[class="sub_category_dropdown"]').html(data);
				altair_forms.select_elements();
			},
			complete: function()
			{
				if(cat_id === '3'){
					$('#english_medium').show();
					$('#bangla_medium').hide();	
				}
				else if(cat_id === '2' )
				{
					$('#english_medium').hide();
					$('#bangla_medium').show();	
				}
				
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus+errorThrown);
			}
		});
	});

	$('body').on("change",".selsubcat", function(){
		var cat_id 		= $("#selcat").val();
		var class_id 	= $("#selsubcat").val();
		var job_id 		= $("#job_id").val();
		var url 		= BASE_URL+"alldata/ajax_load_subject_parent_tutor";
		
		$.ajax({
			url: url,
			type: "POST",
			data: {'cat_id' : cat_id, 'class_id': class_id, 'job_id' : job_id},
			dataType: "html",
			success: function(data) {
				//$('div.selsubcat').remove();
				//$('select[id="subject"]').remove();
				$('div[class="subject_show"]').html(data);
				altair_product_edit.init();
				altair_forms.select_elements();
			},
			complete: function()
			{
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus+errorThrown);
			}
		});
	});
	
	
	
	$('body').on('change','.selcat',function(e){
		$('#subject_show').html('');
	});
});

function new_job_add()
{
	$('#sstep').attr('disabled', 'disabled');
	
	/*if($("input[name='sdg[]']").length > 0){
		if($("input[type='checkbox'][name='sdg[]']:checked").length) {
			
		} else {
			$('.subject_msg').show();
			$('.subject_msg').delay(3000).fadeOut('slow');
			return false;
		}
	}*/
	
	
		var url = BASE_URL+"parents/parents_new_job_save";
		var data = $('#job_add_form').serialize();

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
					$("#msg").html(data.msg);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus+errorThrown);
			}
		});
}
