var repeat_ajax_call_stop = false;
var switch_ajax_call_stop = false;
$(document).ready(function () {
    //$('#education_info_accordin > div > div > div > div > div').css({ 'height': '0px', 'position': 'relative', 'overflow' : 'hidden' }).attr('aria-expanded', false);
    $('body').on('ifChanged', 'input[type=radio][name=experience]', function () {
        var experience = $("input[name=experience]:checked").val();
        if (experience == '1') {
            $('#experience_hide').show();
        } else if (experience == '0') {
            $('#experience_hide').removeClass('uk-animation-slide-top').addClass('uk-animation-slide-bottom').hide();
            $('#experience_hide').removeClass('uk-animation-slide-bottom').addClass('uk-animation-slide-top');
        }
    });

    $('body').on('click', '.switch_continue_button', function (e) {
        e.preventDefault();
		if(!switch_ajax_call_stop) {
			switch_ajax_call_stop = true;

    		$("#tution_info").animate({"opacity": 0.3});

            var tutor_profile_category = $('select[name=tutor_profile_category]').val();

            var classcourse = $('select[name=classcourse]').val();
            var tutor_preferred_subjects = $('select[name=tutor_preferred_subjects]').val();
            var tutor_profile_city = $('select[name=tutor_profile_city]').val();
            var tutor_profile_your_location = $('select[name=tutor_profile_your_location]').val();
            var tutor_preferred_locations = $('select[name=tutor_preferred_locations]').val();
            var user_edit_skype_control = $('input[name=user_edit_skype_control]').val();
            var user_edit_google_control = $('input[name=user_edit_google_control]').val();

            if ($('input[name="student_home"]').is(':checked')) {
                //var current_institute = $('input[name="current_institute"]').val();
                var student_home = '1';
            } else {
                var student_home = '0';
            }

            if ($('input[name="my_home"]').is(':checked')) {
                //var current_institute = $('input[name="current_institute"]').val();
                var my_home = '1';
            } else {
                var my_home = '0';
            }

            if ($('input[name="online"]').is(':checked')) {
                //var current_institute = $('input[name="current_institute"]').val();
                var online = '1';
            } else {
                var online = '0';
            }

            var experience = $("input[name=experience]:checked").val();

            var total_experience = $('input[name=total_experience]').val();
            var experience_detail = $('textarea[name=experience_detail]').val();
            var available_days = $('select[name=available_days]').val();
            var tutoring_style = $('select[name=tutoring_style]').val();

            var available_time_from = $('input[name=available_time_from]').val();
            var available_time_to = $('input[name=available_time_to]').val();
            var expected_fees = $('input[name=expected_fees]').val();
            var method = $('textarea[name=method]').val();

            var tution_info_id = $('input[name=tution_info_id]').val();

            var url = BASE_URL + "tutor/ajax_save_tutor_tution_info";
    		console.log(switch_ajax_call_stop);
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    'tution_info_id': tution_info_id,
                    'tutor_profile_category': tutor_profile_category,
                    'classcourse': classcourse,
                    'tutor_preferred_subjects': tutor_preferred_subjects,
                    'tutor_profile_city': tutor_profile_city,
                    'tutor_profile_your_location': tutor_profile_your_location,
                    'tutor_preferred_locations': tutor_preferred_locations,
                    'user_edit_skype_control': user_edit_skype_control,
                    'user_edit_google_control': user_edit_google_control,
                    'student_home': student_home,
                    'my_home': my_home,
                    'online': online,
                    'experience': experience,
                    'total_experience': total_experience,
                    'experience_detail': experience_detail,
                    'available_days': available_days,
                    'available_time_from': available_time_from,
                    'available_time_to': available_time_to,
                    'expected_fees': expected_fees,
                    'method': method,
                    'tutoring_style': tutoring_style
                },
                dataType: "json",
                success: function (data) {
                    !switch_ajax_call_stop;
                    $("#tution_info").animate({"opacity": 1});
                    $('input[name=tution_info_id]').val(data);
                },
                complete: function () {

                    $('#tution_first_step').removeClass('uk-active');
                    $('#tution_first_step').removeAttr('aria-hidden', 'class').attr('aria-hidden', 'true');
                    $('#tution_second_step').removeAttr('class');

                    $('#tution_second_step').addClass('uk-active');
                    $('#tution_second_step').removeAttr('aria-hidden').attr('aria-hidden', 'false');

                    $('.switch_continue_button').hide();
                    $('.switch_continue_button').removeClass('uk-active');
                    $('.switch_back_button').show();
                    $('.switch_back_button').addClass('uk-active');
                    $('.continue_to_education_info').show();
                    $('.continue_to_education_info').addClass('uk-active');
                    $('#page_content_inner')[0].scrollIntoView(true);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus + errorThrown);
                }
            });
        }

    });

    $('body').on('click', '.switch_back_button', function (e) {
        $('#tution_second_step').removeClass('uk-active');
        $('#tution_second_step').removeAttr('aria-hidden', 'class').attr('aria-hidden', 'true');
        $('#tution_first_step').removeAttr('class');
        $('#tution_first_step').addClass('uk-active');
        $('#tution_first_step').removeAttr('aria-hidden').attr('aria-hidden', 'false');

        $('.switch_back_button').hide();
        $('.switch_back_button').removeClass('uk-active');
        $('.switch_continue_button').show();
        $('.switch_continue_button').addClass('uk-active');
        $('.continue_to_education_info').hide();
        $('.continue_to_education_info').removeClass('uk-active');
        $('#page_content_inner')[0].scrollIntoView(true);
    });

    /*$('body').on('click','.switch_continue_button',function(e){
     $('.tution_first_step').removeClass('uk-active');
     $('.tution_first_step').removeAttr('aria-hidden').attr('aria-hidden','false');

     $('.tution_second_step').addClass('uk-active');
     $('.tution_second_step').removeAttr('aria-hidden').attr('aria-hidden','true');
     });


     $('body').on('click','.switch_back_button',function(e){
     $('.tution_second_step').removeClass('uk-active');
     $('.tution_second_step').removeAttr('aria-hidden').attr('aria-hidden','true');

     $('.tution_first_step').addClass('uk-active');
     $('.tution_first_step').removeAttr('aria-hidden').attr('aria-hidden','false');
     });*/

    $('body').on('change', '#tutor_profile_category', function (e) {
        var category_id = $('#tutor_profile_category').val();

        $("#user_content").animate({"opacity": 0.3});
        var url = BASE_URL + "tutor/ajax_load_class_tutor_profile";
        $.ajax({
            url: url,
            type: "POST",
            data: {'category_id': category_id},
            dataType: "html",
            success: function (data) {
                $('div[id="class_show"]').html(data);
                altair_user_edit.init();
                altair_forms.select_elements();
            },
            complete: function () {
                if (class_id != '') {
                    var class_id = $('#classcourse').val();
                    tutor_preferrd_subject_show(class_id);
                } else {
                    $("#user_content").animate({"opacity": 1});
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    $('body').on('ifChanged', '#checkbox_online', function (e) {
        if ($("#checkbox_online").is(":checked")) {
            $('.online_hide').removeClass('uk-animation-slide-bottom');
            $('.online_hide').addClass('uk-animation-slide-top');
            $('.online_hide').show();
        } else {
            $('.online_hide').removeClass('uk-animation-slide-top');
            $('.online_hide').addClass('uk-animation-slide-bottom');
            $('.online_hide').hide();
        }
    });

    $('body').on('change', '#tutor_profile_city', function (e) {
        var city_name = $("#tutor_profile_city option:selected").text();
        if (city_name === 'Online') {
            $('.locatin_hide').hide();
            $('.online_hide').show();
        } else {
            $('.online_hide').hide();
            $('.locatin_hide').show();
        }
        var city_id = $('#tutor_profile_city').val();
        $("#user_content").animate({"opacity": 0.3});

        var url = BASE_URL + "tutor/ajax_load_locations_tutor_profile/" + city_id;
        $.ajax({
            url: url,
            type: "POST",
            dataType: "html",
            success: function (data) {
                $('div[id="your_location_show"]').html(data);
                altair_product_edit.init();
                altair_forms.select_elements();
            },
            complete: function () {
                tutor_preferrd_locations_show(city_id, city_name);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    $('body').on('change', '#tutor_profile_your_location', function (e) {
        e.preventDefault();
        var city_id = $('#tutor_profile_city').val();
    });


    $('body').on('change', '#classcourse', function (e) {
        var class_id = $('#classcourse').val();
        var url = BASE_URL + "tutor/ajax_load_subject_tutor_profile";

        $.ajax({
            url: url,
            type: "POST",
            data: {'class_id': class_id},
            dataType: "html",
            success: function (data) {
                $('div[id="subject_show"]').html(data);
                altair_user_edit.init();
                altair_forms.select_elements();
            },
            complete: function () {
                $("#user_content").animate({"opacity": 1});
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });


    $('body').on('click', '#back_to_education_info', function (e) {
        $('#personal_info_li').removeAttr('aria-expanded').attr('aria-expanded', 'false');
        $('#personal_info_li').removeClass('uk-active');
        $('#personal_info').removeAttr('aria-hidden').attr('aria-hidden', 'true');
        $('#personal_info').removeClass('uk-active');

        $('#educational_info_li').removeAttr('aria-expanded').attr('aria-expanded', 'true');
        $('#educational_info_li').addClass('uk-active');
        $('#educational_info').removeAttr('aria-hidden').attr('aria-hidden', 'false');
        $('#educational_info').addClass('uk-active');

        $('#tution_first_step').addClass('uk-active');
        $('.switch_back_button').addClass('uk-active');
        $('#page_content_inner')[0].scrollIntoView(true);
    });

    $('body').on('click', '#continue_to_personal_info', function (e) {

        e.preventDefault();

        var url = BASE_URL + "tutor/ajax_check_educational_info";

        $.ajax({
            url: url,
            type: "POST",
            data: {'check': '1'},
            dataType: "json",
            success: function (data) {

                if (data === 1) {
                    var level_of_education = $('select[name=level_of_education]').val();
                    if (level_of_education == '0')
                    {
                        personal_info_tab_active();
                        $("#educational_info").animate({"opacity": 1});
                    } else {

                        var req_institute_name  = $('input[name=institute_name]').val();

                        if (req_institute_name == '') {
                            UIkit.notify({
                                message: 'Institute name field is required',
                                status: 'danger',
                                timeout: 5000,
                                pos: 'top-center'
                            });
                        } else {

                          $("#educational_info").animate({"opacity": 0.3});

                          // for alert
                          // UIkit.modal.confirm("Are you sure to add this info?", function () { });

                          var education_info_id = $('input[name="education_info_id"]').val();
                          var level_of_education = $('select[name=level_of_education]').val();
                          var exam_degree_title = $('input[name=exam_degree_title]').val();
                          var id_card_number = $('input[name="id_card_number"]').val();
                          var result = $('input[name="result"]').val();
                          var year_of_passing = $('input[name="year_of_passing"]').val();
                          var curriculum = $('select[name="curriculum"]').val();
                          var from_date = $('input[name="from_date"]').val();
                          var until_date = $('input[name="until_date"]').val();
                          var group_id = $('input[name="group_hidden_id"]').val();
                          var group_name = $('input[name="group_name"]').val();
                          var institute_name = $('input[name="institute_name"]').val();
                          var institute_id = $('input[name="institute_hidden_id"]').val();
                          if ($('input[name="current_institute"]').is(':checked')) {
                              var current_institute = '1';
                          } else {
                              var current_institute = '0';
                          }
                          continue_to_personal_info(education_info_id, level_of_education, exam_degree_title, id_card_number, result, year_of_passing, curriculum, from_date, until_date, group_name, group_id, institute_id, institute_name, current_institute);
                        }
                    }
                } else if (data === 0) {

                    var level_of_education  = $('select[name=level_of_education]').val();
                    var req_institute_name  = $('input[name=institute_name]').val();

                    if (level_of_education == '0') {
                        UIkit.notify({
                            message: 'You have to add education info to go further step.',
                            status: 'danger',
                            timeout: 5000,
                            pos: 'top-center'
                        });
                    } else if (req_institute_name == '') {
                        UIkit.notify({
                            message: 'Institute name field is required',
                            status: 'danger',
                            timeout: 5000,
                            pos: 'top-center'
                        });
                    } else {
                        // for alert
                        // UIkit.modal.confirm("Are you sure to add this info?", function () { });
                        var education_info_id = $('input[name="education_info_id"]').val();
                        var level_of_education = $('select[name=level_of_education]').val();
                        var exam_degree_title = $('input[name=exam_degree_title]').val();
                        var id_card_number = $('input[name="id_card_number"]').val();
                        var result = $('input[name="result"]').val();
                        var year_of_passing = $('input[name="year_of_passing"]').val();
                        var curriculum = $('select[name="curriculum"]').val();
                        var from_date = $('input[name="from_date"]').val();
                        var until_date = $('input[name="until_date"]').val();
                        var group_id = $('input[name="group_hidden_id"]').val();
                        var group_name = $('input[name="group_name"]').val();
                        var institute_name = $('input[name="institute_name"]').val();
                        if ($('input[name="current_institute"]').is(':checked')) {
                            var current_institute = '1';
                        } else {
                            var current_institute = '0';
                        }
                        continue_to_personal_info(education_info_id, level_of_education, exam_degree_title, id_card_number, result, year_of_passing, curriculum, from_date, until_date, group_name, group_id, group_id, institute_name, current_institute);
                    }
                }
            },
            complete: function () {
                $('#page_content_inner')[0].scrollIntoView(true);
            }
        });

    });

    $('body').on('click', '#back_to_tution_info', function (e) {
        $('#educational_info_li').removeAttr('aria-expanded').attr('aria-expanded', 'false');
        $('#educational_info_li').removeClass('uk-active');
        $('#educational_info').removeAttr('aria-hidden').attr('aria-hidden', 'true');
        $('#educational_info').removeClass('uk-active');

        $('#tution_info_li').removeAttr('aria-expanded').attr('aria-expanded', 'true');
        $('#tution_info_li').addClass('uk-active');
        $('#tution_info_li').addClass('uk-active');
        $('#tution_info').removeAttr('aria-hidden').attr('aria-hidden', 'false');
        $('#tution_info').addClass('uk-active');


        $('#tution_first_step').removeAttr('aria-hidden', 'class').attr('aria-hidden', 'true');

        $('#tution_second_step').addClass('uk-active');
        $('#tution_second_step').removeAttr('aria-hidden').attr('aria-hidden', 'false');
        $('#page_content_inner')[0].scrollIntoView(true);

    });

    $('body').on('click', '.continue_to_education_info', function (e) {
        console.log(repeat_ajax_call_stop);
		e.preventDefault();
		if(!repeat_ajax_call_stop){
			repeat_ajax_call_stop = true;

		$("#tution_info").animate({"opacity": 0.3});

        var tutor_profile_category = $('select[name=tutor_profile_category]').val();

        var classcourse = $('select[name=classcourse]').val();
        var tutor_preferred_subjects = $('select[name=tutor_preferred_subjects]').val();
        var tutor_profile_city = $('select[name=tutor_profile_city]').val();
        var tutor_profile_your_location = $('select[name=tutor_profile_your_location]').val();
        var tutor_preferred_locations = $('select[name=tutor_preferred_locations]').val();
        var user_edit_skype_control = $('input[name=user_edit_skype_control]').val();
        var user_edit_google_control = $('input[name=user_edit_google_control]').val();

        if ($('input[name="student_home"]').is(':checked')) {
            //var current_institute = $('input[name="current_institute"]').val();
            var student_home = '1';
        } else {
            var student_home = '0';
        }

        if ($('input[name="my_home"]').is(':checked')) {
            //var current_institute = $('input[name="current_institute"]').val();
            var my_home = '1';
        } else {
            var my_home = '0';
        }

        if ($('input[name="online"]').is(':checked')) {
            //var current_institute = $('input[name="current_institute"]').val();
            var online = '1';
        } else {
            var online = '0';
        }
        var experience = $("input[name=experience]:checked").val();

        var total_experience = $('input[name=total_experience]').val();
        var experience_detail = $('textarea[name=experience_detail]').val();
        var available_days = $('select[name=available_days]').val();
        var tutoring_style = $('select[name=tutoring_style]').val();

        var available_time_from = $('input[name=available_time_from]').val();
        var available_time_to = $('input[name=available_time_to]').val();
        var expected_fees = $('input[name=expected_fees]').val();
        var method = $('textarea[name=method]').val();

        var tution_info_id = $('input[name=tution_info_id]').val();

        var url = BASE_URL + "tutor/ajax_save_tutor_tution_info";
		console.log(repeat_ajax_call_stop);
        $.ajax({
            url: url,
            type: "POST",
            data: {
                'tution_info_id': tution_info_id,
                'tutor_profile_category': tutor_profile_category,
                'classcourse': classcourse,
                'tutor_preferred_subjects': tutor_preferred_subjects,
                'tutor_profile_city': tutor_profile_city,
                'tutor_profile_your_location': tutor_profile_your_location,
                'tutor_preferred_locations': tutor_preferred_locations,
                'user_edit_skype_control': user_edit_skype_control,
                'user_edit_google_control': user_edit_google_control,
                'student_home': student_home,
                'my_home': my_home,
                'online': online,
                'experience': experience,
                'total_experience': total_experience,
                'experience_detail': experience_detail,
                'available_days': available_days,
                'available_time_from': available_time_from,
                'available_time_to': available_time_to,
                'expected_fees': expected_fees,
                'method': method,
                'tutoring_style': tutoring_style
            },
            dataType: "json",
            success: function (data) {
		!repeat_ajax_call_stop;
                $("#tution_info").animate({"opacity": 1});
                $('input[name=tution_info_id]').val(data);
            },
            complete: function () {

                main_sidebar_update(step = '1');
                $('#tution_info_li').removeAttr('aria-expanded').attr('aria-expanded', 'false');
                $('#tution_info_li').removeClass('uk-active');
                $('#tution_info').removeAttr('aria-hidden').attr('aria-hidden', 'true');
                $('#tution_info').removeClass('uk-active');

                $('#educational_info_li').removeClass('uk-disabled');
                $('#educational_info_li').removeAttr('aria-expanded').attr('aria-expanded', 'true');
                $('#educational_info_li').addClass('uk-active');
                $('#educational_info').removeAttr('aria-hidden').attr('aria-hidden', 'false');
                $('#educational_info').addClass('uk-active');

                $('#subnav-pill-content-1').addClass('uk-switcher');
                $('#tution_second_step').removeAttr('style');
                //$('#tution_first_step').removeAttr('style');
                $('#tution_second_step').addClass('uk-active');

                $('.switch_back_button').addClass('uk-active');
                $('#page_content_inner')[0].scrollIntoView(true);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
}
    });

    $('body').on('click', '#personal_info_button', function (e) {
        e.preventDefault();
        $("#personal_info").animate({"opacity": 0.3});
        $("#personal_info_button").attr('disabled', true);
        var gender = $("input:radio[name=gender]:checked").val();
        var additional_numbers = $("input[name=additional_numbers]").val();
        var pre_address = $("textarea[name=pre_address]").val();
        var identity_type = $("select[name=identity_type]").val();
        var identity = $("input[name=identity]").val();
        var date_of_birth = $("input[name=date_of_birth]").val();
        var religion = $("select[name=religion]").val();
        var nationality = $("select[name=nationality]").val();
        var fb_link = $("input[name=fb_link]").val();
        var linkedin_link = $("input[name=linkedin_link]").val();
        var fathers_name = $("input[name=fathers_name]").val();
        var fathers_phone = $("input[name=fathers_phone]").val();
        var mothers_name = $("input[name=mothers_name]").val();
        var mothers_phone = $("input[name=mothers_phone]").val();
        var emmergency_contact_name = $("input[name=emmergency_contact_name]").val();
        var emmergency_contact_address = $("input[name=emmergency_address]").val();
        var emmergency_contact_number = $("input[name=emmergency_contact_number]").val();
        var emmergency_contact_rel = $("input[name=emmergency_contact_rel]").val();
        var overview_yourself = $("textarea[name=overview_yourself]").val();

        $.ajax({
            type: "POST",
            url: BASE_URL + "tutor/tutor_add_edit_personal_info",
            data: {'gender': gender, 'additional_numbers': additional_numbers, 'pre_address': pre_address, 'identity_type': identity_type, 'identity': identity, 'date_of_birth': date_of_birth, 'religion': religion, 'nationality': nationality,
                'fb_link': fb_link, 'linkedin_link': linkedin_link, 'fathers_name': fathers_name, 'fathers_phone': fathers_phone,
                'mothers_name': mothers_name, 'mothers_phone': mothers_phone, 'emmergency_contact_name': emmergency_contact_name, 'emmergency_contact_address': emmergency_contact_address, 'emmergency_contact_number': emmergency_contact_number,
                'emmergency_contact_rel': emmergency_contact_rel, 'overview_yourself': overview_yourself}, //only input
            dataType: "json",
            success: function (response) {

                if (response === 1) {
                    UIkit.notify({
                        message: "<i class='uk-icon-check-circle-o' style='color: white;'></i> Congratulation! You've successfully created your profile.",
                        status: 'success',
                        timeout: 5000,
                        pos: 'top-center'
                    });
                    setTimeout(function () {
                        window.location.reload();
                    }, 5000);
                }
                $("#personal_info_button").attr('disabled', false);
            },
            complete: function () {
                main_sidebar_update(step = '5');
                $("#personal_info").animate({"opacity": 1});
            }
        });
    });

    $('body').on('click', '.edit_education_info', function (e) {
        $('#view_job_div_' + $(this).data('edu_info_id')).hide();
        $('#edit_job_div_' + $(this).data('edu_info_id')).show();
    });

    $('body').on('click', '.cancel_edit_education', function (e) {
        $('#edit_job_div_' + $(this).data('edu_info_id')).hide();
        $('#view_job_div_' + $(this).data('edu_info_id')).show();
    });

    $('body').on('click', '.update_education_info_button', function (e) {
        alert('update');
        return;
        e.preventDefault();
        var edu_info_id = $(this).data('edu_info_id');
        $("#educational_info").animate({"opacity": 0.3});

        var education_info_id = $(this).data('edu_info_id');
        var level_of_education = $('select[name="level_of_education_' + edu_info_id + '"]').val();
        var exam_degree_title = $('input[name="exam_degree_title_' + edu_info_id + '"]').val();
        var id_card_number = $('input[name="id_card_number_' + edu_info_id + '"]').val();
        var result = $('input[name="result_' + edu_info_id + '"]').val();
        var year_of_passing = $('input[name="year_of_passing_' + edu_info_id + '"]').val();
        var curriculum = $('select[name="curriculum_' + edu_info_id + '"]').val();
        var from_date = $('input[name="from_date_' + edu_info_id + '"]').val();
        var until_date = $('input[name="until_date_' + edu_info_id + '"]').val();
        var group_name = $('input[name="group_name_' + edu_info_id + '"]').val();
        var institute_name = $('input[name="institute_name_' + edu_info_id + '"]').val();

        if ($('input[name="current_institute_' + edu_info_id + '"]').is(':checked')) {
            var current_institute = '1';
        } else {
            var current_institute = '0';
        }
        var curriculum_text = $('select[name="curriculum_' + edu_info_id + '"] option:selected').text();

        var url = BASE_URL + "tutor/ajax_update_tutor_educational_info";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                'education_info_id': education_info_id,
                'level_of_education': level_of_education, 'exam_degree_title': exam_degree_title,
                'id_card_number': id_card_number, 'result': result,
                'year_of_passing': year_of_passing, 'curriculum': curriculum,
                'from_date': from_date, 'until_date': until_date,
                'current_institute': current_institute,
                'group_name': group_name, 'institute_name': institute_name},
            dataType: "JSON",
            success: function (data) {
                $("#educational_info").animate({"opacity": 1});

                $('#accordion_title_' + edu_info_id).html(level_of_education);
                $('select[name=level_of_education_' + edu_info_id).html();
                $('#exam_degree_title_' + edu_info_id).html(exam_degree_title);
                $('#id_card_number_' + edu_info_id).html(id_card_number);
                $('#result_' + edu_info_id).html(result);
                $('#year_of_passing_' + edu_info_id).html(year_of_passing);

                $('#curriculum_' + edu_info_id).html(curriculum_text);
                $('#from_date_' + edu_info_id).html(from_date);
                $('#until_date_' + edu_info_id).html(until_date);
                $('#group_name_' + edu_info_id).html(group_name);
                $('#institute_name_' + edu_info_id).html(institute_name);

                if ($('input[name="current_institute_' + edu_info_id + '"]').is(':checked')) {
                    $('#current_institute_' + edu_info_id).html('Yes');
                } else {
                    $('#current_institute_' + edu_info_id).html('No');
                }
            },
            complete: function () {
                $('#edit_job_div_' + edu_info_id).hide();
                $('#view_job_div_' + edu_info_id).show();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });
    //alert('hi');
    $(document).on('click', '.upload_credential_button', function (e) {
        var url = BASE_URL + "tutor/ajax_upload_credential_info";
        var name_of_the_credential = $('#name_of_the_credential').val();
        var file_name = $('#file_name').val();
        if (name_of_the_credential == '') {
            $('#message').html('<div class="uk-alert uk-alert-danger" data-uk-alert>You have not selected any credential type.</div>');
            $('#message').show();
            $('#message').delay(3000).fadeOut('slow');
        } else if (file_name == '') {
            $('#message').html('<div class="uk-alert uk-alert-danger" data-uk-alert>You have not uploaded any credential.</div>');
            $('#message').show();
            $('#message').delay(3000).fadeOut('slow');
        } else {
            $('.upload_credential_button').addClass('disabled');
            $.ajax({
                url: url,
                type: "POST",
                data: {'name_of_the_credential': name_of_the_credential, 'file_name': file_name},
                success: function (data) {
                    if (data != "failed")
                    {
                        $('#name_of_the_credential').val('');
                        $('#file_name').val('');

                        var mail_progressbar = $("#mail_progressbar");
                        var mail_bar = mail_progressbar.find('.uk-progress-bar');

                        mail_bar.css("width", "0%").text("0%");
                        mail_progressbar.addClass("uk-hidden");
                        main_sidebar_update('4');
                        $('#message').html('<div class="uk-alert uk-alert-success" data-uk-alert>You have uploaded credential successfully.</div>');
                        $('#message').show();
                        $('#message').delay(5000).fadeOut('slow');
                        $('.upload_credential_button').removeClass('disabled');
                        var modal = UIkit.modal("#mailbox_new_message");

                        setTimeout(function () {
                            modal.hide();
                            var url = BASE_URL + 'tutor/profile_edit';
                            window.location.replace(url);
                        }, 2000);
                        // setTimeout(function () {
                        //     var url = BASE_URL + 'tutor/profile_view_from_uc';
                        //     window.location.replace(url);
                        // }, 6000);
                    } else
                    {

                        $('#name_of_the_credential').val('');
                        $('#file_name').val('');

                        $('#message').html('<div class="uk-alert uk-alert-danger" data-uk-alert>You have already uploaded your necessary credentials. You can not upload more than 4 credentials.</div>');
                        $('#message').show();
                        $('#message').delay(4000).fadeOut('slow');
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
    });

    $(function() {
        $("body").delegate("#autocomplete_institute", "keypress", function(){
          var btnThis = $(this);
          var edu_id = btnThis.data('edu-id');
          var url = BASE_URL + "tutor/instituteAutoCompleteData";
          $.ajax({
              url: url,
              type: "post",
              data : { 'search' : $(this).val() },
              dataType: "json",
              success: function(data) {
                btnThis.autocomplete({
                  minLength: 3,
                  source: data,
                  focus: function(event, ui) {
                    btnThis.val(ui.item.value);
                    return false;
                  },
                  select: function(event, ui) {
                    btnThis.val(ui.item.value);
                    btnThis.parents('.uk-grid').find('#institute_hidden_id_'+edu_id).val(ui.item.id);
                    return false;
                  }
                });
              }
          });
      });

    });

    $(function() {
        $("body").delegate("#autocomplete_group", "keypress", function(){
        var btnThis = $(this);
        var edu_id = btnThis.data('edu-id');
        var url = BASE_URL + "tutor/groupAutoCompleteData";
        $.ajax({
            url: url,
            type: "post",
            data : { 'search' : $(this).val() },
            dataType: "json",
            success: function(data) {
                btnThis.autocomplete({
                    minLength: 3,
                    source: data,
                    focus: function(event, ui) {
                        btnThis.val(ui.item.value);
                        return false;
                    },
                    select: function(event, ui) {
                        btnThis.val(ui.item.value);
                        btnThis.parents('.uk-grid').find('#group_hidden_id_'+edu_id).val(ui.item.id);
                        return false;
                    }
                });
            }
        });
        });

    });

    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });


    $('#upload').on('change', function () {
    	var reader = new FileReader();
        reader.onload = function (e) {
        	$uploadCrop.croppie('bind', {
        		url: e.target.result
        	}).then(function(){
        		console.log('jQuery bind complete');
        	});

        }
        reader.readAsDataURL(this.files[0]);
    });


    $('.crop_image').on('click', function (ev) {
        $('.image_upload_button').show();
    	$uploadCrop.croppie('result', {
    		type: 'canvas',
    		size: 'viewport'
    	}).then(function (resp) {

            html = '<img src="' + resp + '" />';
            $("#upload-demo-i").html(html);
            $('#upload_new_profile_pic').animate({ scrollTop: 300 });

    		// $.ajax({
    		// 	url: "ajax.php",
    		// 	type: "POST",
    		// 	data: {"image":resp},
    		// 	success: function (data) {
    		// 		html = '<img src="' + resp + '" />';
    		// 		$("#upload-demo-i").html(html);
    		// 	}
    		// });
    	});
    });

    $('.image_upload_button').on('click', function (ev) {
        $(this).find('.upload_button').text('uploading...');
        $(this).find('.upload_button').prop("disabled",true);;
    	$uploadCrop.croppie('result', {
    		type: 'canvas',
    		size: 'viewport'
    	}).then(function (resp) {

    		$.ajax({
    			url: BASE_URL + "tutor/do_upload_profile_pic",
    			type: "POST",
    			data: {"image":resp},
    			success: function (data) {
    				html = '<img src="' + resp + '" />';
    				$("#upload-demo-i").html(html);

                    var modal = UIkit.modal("#upload_new_profile_pic");
                    modal.hide();
                    var url = BASE_URL + 'tutor/profile_edit';
                    window.location.replace(url);
    			}
    		});
    	});
    });

});

function main_sidebar_update(step)
{
    var url = BASE_URL + "tutor/ajax_load_main_sidebar_update";

    $.ajax({
        url: url,
        type: "POST",
        data: {'step': step},
        dataType: "html",
        success: function (data) {
            $('.profile_meter').html(data);
        },
        complete: function () {
            $("#user_content").animate({"opacity": 1});
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus + errorThrown);
        }
    });
}

function tutor_preferrd_subject_show(class_id) {
    var url = BASE_URL + "tutor/ajax_load_subject_tutor_profile";

    $.ajax({
        url: url,
        type: "POST",
        data: {'class_id': class_id},
        dataType: "html",
        success: function (data) {
            $('div[id="subject_show"]').html(data);
            altair_user_edit.init();
            altair_forms.select_elements();
        },
        complete: function () {
            $("#user_content").animate({"opacity": 1});
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus + errorThrown);
        }
    });
}

function tutor_preferrd_locations_show(city_id, city_name) {
    var url = BASE_URL + "tutor/ajax_load_preferred_locations_tutor_profile/" + city_id;
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        success: function (data) {
            $('div[id="preferred_location_show"]').html(data);
            altair_user_edit.init();
            altair_forms.select_elements();
        },
        complete: function () {
            if (city_name === 'Online') {
                $('#tutor_preferred_locations').prop('disabled', true);
                $('#preferred_location_show > div > div').addClass('has-options disabled locked');
                $('#preferred_location_show > div > div > input[type="text"]').prop('disabled', true);
            } else {
                $('#tutor_preferred_locations').prop('disabled', false);
                $('#preferred_location_show > div > div').removeClass('has-options disabled locked');
                $('#preferred_location_show > div > div > input[type="text"]').prop('disabled', false);
            }
            $("#user_content").animate({"opacity": 1});
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus + errorThrown);
        }
    });
}

function continue_to_personal_info(education_info_id, level_of_education, exam_degree_title, id_card_number, result, year_of_passing, curriculum, from_date, until_date, group_name, group_id, institute_id, institute_name, current_institute)
{
    var url = BASE_URL + "tutor/ajax_save_tutor_educational_info";

    $.ajax({
        url: url,
        type: "POST",
        data: {
          'education_info_id'   : education_info_id,
          'level_of_education'  : level_of_education,
          'exam_degree_title'   : exam_degree_title,
          'id_card_number'      : id_card_number,
          'result'              : result,
          'year_of_passing'     : year_of_passing,
          'curriculum'          : curriculum,
          'from_date'           : from_date,
          'until_date'          : until_date,
          'current_institute'   : current_institute,
          'group_id'            : group_id,
          'group_name'          : group_name,
          'institute_id'        : institute_id,
          'institute_name'      : institute_name
        },
        dataType: "html",
        success: function (data) {
            $('div[id="education_info_accordin"]').html(data);
            altair_user_edit.init();
            altair_forms.select_elements();
            altair_md.init();

            altair_forms.init();
            // invoice md inputs
            altair_md.inputs();
            // invoice textarea autosize
            altair_forms.textarea_autosize();

            // reinitialize uikit margin
            altair_uikit.reinitialize_grid_margin();
            altair_addmore.masked_input_widget();

        },
        complete: function () {
            //append_service();
            //$('#education_div_1').remove();
            main_sidebar_update(step = '2');
            $('#personal_info_li').removeClass('uk-disabled');
            $("#educational_info").animate({"opacity": 1});
            personal_info_tab_active();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus + errorThrown);
        }
    });
}

function personal_info_tab_active()
{
    $('input[name="education_info_id"]').val('0');
    $('select[name="level_of_education"]').val('');
    $('input[name="exam_degree_title"]').val('');
    $('input[name="id_card_number"]').val('');
    $('input[name="result"]').val('');
    $('input[name="year_of_passing"]').val('');
    $('select[name="curriculum"]').val('');
    $('input[name="from_date"]').val('');
    $('input[name="until_date"]').val('');
    $('input[name="current_institute"]').prop('checked', false);

    $('#educational_info_li').removeAttr('aria-expanded').attr('aria-expanded', 'false');
    $('#educational_info_li').removeClass('uk-active');
    $('#educational_info').removeAttr('aria-hidden').attr('aria-hidden', 'true');
    $('#educational_info').removeClass('uk-active');

    $('#personal_info_li').removeAttr('aria-expanded').attr('aria-expanded', 'true');
    $('#personal_info_li').addClass('uk-active');
    $('#personal_info').removeAttr('aria-hidden').attr('aria-hidden', 'false');
    $('#personal_info').addClass('uk-active');

    $('#tution_first_step').addClass('uk-active');
    $('.switch_back_button').addClass('uk-active');
}
