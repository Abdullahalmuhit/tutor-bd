/*
 *  Altair Admin
 *  page_invoices.js (page_invoices.html)
 */

$(function() {
    // init invoices
    altair_addmore.init();
    altair_addmore.masked_input_widget();
});

altair_addmore  = {
    init: function() {
        altair_addmore.add_new();
        $sidebar_secondary_toggle.addClass('uk-hidden-large');
    },
    add_new: function() {

                // append services to invoice form
                var append_service = function() {

                    var $education_form_template_services = $('#education_form_template_services'),
                        $form_education_info = $('#form_education_info');

                    var template = $education_form_template_services.html(),
                        template_compiled = Handlebars.compile(template);

                    var service_id = (!$form_education_info.children().length) ? 1 : parseInt($form_education_info.children('.uk-grid:last').attr('data-service-number')) + 1,
                        context = {
                            "invoice_service_id": service_id
                        },
                        theCompiledHtml = template_compiled(context);

                    $form_education_info.append(theCompiledHtml);
                	// material design
			        altair_md.init();
                    // invoice md inputs
                    altair_md.inputs();


                    altair_user_edit.init();

                    // forms
			        altair_forms.init();
                    // invoice textarea autosize
                    altair_forms.textarea_autosize();
                    altair_forms.select_elements();

                    // reinitialize uikit margin
                    altair_uikit.reinitialize_grid_margin();
                    altair_addmore.masked_input_widget();
                };

                // append first service to invoice form on init
                append_service();

                $('#add_education_div').on('click', function (e) {
                	var level_of_education 	= $('select[name=level_of_education]').val();
                	if(level_of_education == 0)
                	{
                		UIkit.notify({
    						message : 'Select level of education first',
						    status  : 'danger',
						    timeout : 5000,
						    pos     : 'top-center'
						});
						return false;
                	}
                	else{
                		// UIkit.modal.confirm("Are you sure to add this info?", function(){
	                	$("#educational_info").animate({"opacity":0.3});
		                    e.preventDefault();
		                    var education_info_id 	= $('input[name="education_info_id"]').val();
		                    var level_of_education 	= $('select[name=level_of_education]').val();
		                    var exam_degree_title 	= $('input[name=exam_degree_title]').val();
		                    var id_card_number 		= $('input[name="id_card_number"]').val();
		                    var result 				= $('input[name="result"]').val();
		                    var year_of_passing 	= $('input[name="year_of_passing"]').val();
		                    var curriculum 			= $('select[name="curriculum"]').val();
		                    var from_date 			= $('input[name="from_date"]').val();
		                    var until_date 			= $('input[name="until_date"]').val();
                            var group_name 			= $('input[name="group_name"]').val();
		                    var group_id 			= $('input[name="group_hidden_id"]').val();
		                    var institute_name 		= $('input[name="institute_name"]').val();
                            var institute_id        = $('input[name="institute_hidden_id"]').val();
		                    if($('input[name="current_institute"]').is(':checked')){
		                    	var current_institute = '1';
		                    }else{
		                    	var current_institute = '0';
		                    }

		                    var url = BASE_URL+"tutor/ajax_save_tutor_educational_info";

							$.ajax({
								url: url,
								type: "POST",
								data: {
									'education_info_id' 	: education_info_id,
									'level_of_education' 	: level_of_education,
									'exam_degree_title' 	: exam_degree_title,
									'id_card_number' 		: id_card_number,
									'result' 				: result,
									'year_of_passing' 		: year_of_passing,
									'curriculum' 			: curriculum,
									'from_date' 			: from_date,
									'until_date' 			: until_date,
									'current_institute' 	: current_institute,
                                    'group_name' 			: group_name,
									'group_id' 			    : group_id,
                                    'institute_name' 		: institute_name,
									'institute_id' 		    : institute_id},
								dataType: "html",
								success: function(data) {
									$('div[id="education_info_accordin"]').html(data);
								},
								complete: function(){
									append_service();
									$('#education_div_1').remove();
									/*$('select[name=level_of_education]').val('');
		                    		$('input[name=exam_degree_title]').val('');
		                    		$('input[name="id_card_number"]').val('');
		                    		$('input[name="result"]').val('');
		                    		$('input[name="year_of_passing"]').val('');
		                    		$('select[name="curriculum"]').val('');
		                    		$('input[name="from_date"]').val('');
		                    		$('input[name="until_date"]').val('');
		                    		$('select[name="group_name"]').val('');
		                    		//$('select[name="institute_name"]').val('');
                                                $('input[name="institute_name"]').val('');
		                    		$('input[name="current_institute"]').prop('checked', false);*/

									main_sidebar_update(step = '2');
									$('#personal_info_li').removeClass('uk-disabled');
									$("#educational_info").animate({"opacity": 1});
									/*setTimeout(
									  function()
									  {
									    window.location.reload();
									  }, 1.500);
									*/
								},
								error: function(jqXHR, textStatus, errorThrown) {
									alert(textStatus+errorThrown);
								}
							});
	                	// });
                	}
                });

                // Edit education info - added by Arif (2017.10.7)
                $(document).on('click','#edit_education_div', function (e) {

                	var div_id = $(this).data('edu_info_id');

                	var level_of_education 	= $('div#'+div_id+' select[name=edit_level_of_education]').val();
                	if(level_of_education == 0)
                	{
                		UIkit.notify({
    						message : 'Select level of education first',
						    status  : 'danger',
						    timeout : 5000,
						    pos     : 'top-center'
						});
						return false;
                	}
                	else{
                		// UIkit.modal.confirm("Are you sure to add this info?", function(){
	                	$("#educational_info").animate({"opacity":0.3});
		                    e.preventDefault();
		                    var education_info_id 	= $("div#"+div_id+" input[name='education_info_id_for_update']").val();
		                    //alert(education_info_id);
		                    var level_of_education 	= $('div#'+div_id+' select[name=edit_level_of_education]').val();
		                    var exam_degree_title 	= $('div#'+div_id+' input[name=edit_exam_degree_title]').val();
		                    var id_card_number 		= $('div#'+div_id+' input[name="edit_id_card_number"]').val();
		                    var result 				= $('div#'+div_id+' input[name="edit_result"]').val();
		                    var year_of_passing 	= $('div#'+div_id+' input[name="edit_year_of_passing"]').val();
		                    var curriculum 			= $('div#'+div_id+' select[name="edit_curriculum"]').val();
		                    var from_date 			= $('div#'+div_id+' input[name="edit_from_date"]').val();
		                    var until_date 			= $('div#'+div_id+' input[name="edit_until_date"]').val();
                            var group_id 			= $('div#'+div_id+' input[name="edit_group_hidden_id"]').val();
		                    var group_name 			= $('div#'+div_id+' input[name="edit_group_name"]').val();
		                    /*var institute_name 		= $('select[name="institute_name"]').val();*/
                            var institute_id 		= $('div#'+div_id+' input[name="edit_institute_hidden_id"]').val();
		                    var institute_name 		= $('div#'+div_id+' input[name="edit_institute_name"]').val();
		                    if($('div#'+div_id+' input[name="edit_current_institute"]').is(':checked')){
		                    	var current_institute = '1';
		                    }else{
		                    	var current_institute = '0';
		                    }

		                    var url = BASE_URL+"tutor/ajax_save_tutor_educational_info";

							$.ajax({
								url: url,
								type: "POST",
								data: {
									'education_info_id' 	: education_info_id,
									'level_of_education' 	: level_of_education,
									'exam_degree_title' 	: exam_degree_title,
									'id_card_number' 		: id_card_number,
									'result' 				: result,
									'year_of_passing' 		: year_of_passing,
									'curriculum' 			: curriculum,
									'from_date' 			: from_date,
									'until_date' 			: until_date,
									'current_institute' 	: current_institute,
                                    'group_id' 			    : group_id,
									'group_name' 			: group_name,
                                    'institute_name' 		: institute_name,
									'institute_id' 		    : institute_id},
								dataType: "html",
								success: function(data) {
									$('div[id="education_info_accordin"]').html(data);
								},
								complete: function(){
									append_service();
									$('#education_div_1').remove();
									/*$('select[name=level_of_education]').val('');
		                    		$('input[name=exam_degree_title]').val('');
		                    		$('input[name="id_card_number"]').val('');
		                    		$('input[name="result"]').val('');
		                    		$('input[name="year_of_passing"]').val('');
		                    		$('select[name="curriculum"]').val('');
		                    		$('input[name="from_date"]').val('');
		                    		$('input[name="until_date"]').val('');
		                    		$('select[name="group_name"]').val('');
		                    		//$('select[name="institute_name"]').val('');
                                                $('input[name="institute_name"]').val('');
		                    		$('input[name="current_institute"]').prop('checked', false);*/

									main_sidebar_update(step = '2');
									$('#personal_info_li').removeClass('uk-disabled');
									$("#educational_info").animate({"opacity": 1});
									/*setTimeout(
									  function()
									  {
									    window.location.reload();
									  }, 1.500);
									*/
								},
								error: function(jqXHR, textStatus, errorThrown) {
									alert(textStatus+errorThrown);
								}
							});
	                	// });
                	}
                });







                // invoice due-date radio boxes
                altair_md.checkbox_radio();
    },
    masked_input_widget: function() {
	var $kUI_masked_pass_year = $('.kUI_masked_pass_year');
        if($kUI_masked_pass_year.length) {
            $kUI_masked_pass_year.kendoMaskedTextBox({
                mask: "0000"
            });
        }

    var $kUI_masked_pass_year = $('.kUI_masked_contact_number');
        if($kUI_masked_pass_year.length) {
            $kUI_masked_pass_year.kendoMaskedTextBox({
                mask: "00000 000000"
            });
        }
   }
};
