var is_submit = 'false';
$(document).ready(function () {

    $('#datePicker').datepicker();

    $('body').on('submit', '#frmfp', function (e) {

        e.preventDefault();
        $(this).find("button[type='submit']").text("Please Wait...").prop('disabled',true);
        var url = BASE_URL + $(this).data("link");
        var form = "#" + $(this).attr('id');
        var data = $(form).serialize();

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            dataType: "json",
            success: function (data) {

                if (data.status == 'redirect')
                {
                    window.location.href = BASE_URL + data.url;
                }
                if (data.status == 'message')
                {
                    $("#msg").html(data.msg);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });


    $('body').on('submit', '#frmsignin', function (e) {
        e.preventDefault();
        var formData = $('#frmsignin').serialize();
        var url = BASE_URL + "user/login";
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (data) {
                if (data.status === 'message')
                {
                    $('#msg').html('<div class="alert alert-danger col-xs-12 col-sm-12 col-md-12" role="alert">' + data.msg + '</div>');
                } else if (data.status === 'redirect')
                {
                    window.location.href = BASE_URL + data.url;
                }
            },
            complete: function () {

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    $('body').on('submit', '#contact_us', function (e) {
        e.preventDefault();
        var formData = $('#contact_us').serialize();
        var url = BASE_URL + $(this).data('link');
        $('#msg').html('<div class="alert alert-info col-xs-12 col-sm-12 col-md-12" role="alert"><center>Please wait...<i class="fa fa-spinner fa-pulse"></i></center></div>').show();
        $(".contact_us_div *").children().prop('disabled', true);
        $("#contact_us_button").prop('disabled', true);
        $(window).scrollTop(0);

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (data) {
                if (data === 1)
                {
                    $('#msg').html('<div class="alert alert-success col-xs-12 col-sm-12 col-md-12" role="alert"><center>Message sent successfully.</center></div>').show();
                } else if (data === 0)
                {
                    $('#msg').html('<div class="alert alert-danger col-xs-12 col-sm-12 col-md-12" role="alert"><center>Message can not be sent. Please try again.</center></div>').show();
                }
                $('#msg').delay(3000).fadeOut('slow');
            },
            complete: function () {
                $(".contact_us_div *").children().prop('disabled', false);
                $("#contact_us_button").prop('disabled', false);
                $('#contact_us')[0].reset();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    $('body').on('change', '#no_of_student', function () {
        var no_of_student = $('#no_of_student').val();
        if (no_of_student > '1')
        {
            $("#more_about_requirements").popover({
                placement: 'top',
                html: 'true',
                content: "<span>Please describe your multiple students requirments here.</span>"
            }).popover('show');

            $('.popover').stop(true, true).fadeTo(300, 100).fadeTo(2000, 100).fadeTo(800, 0, function ()
            {
                $('#more_about_requirements').popover('hide');
            });
        }
    });

    $('body').on('change', '.selcity', function () {
        var city_id = $(".selcity").val();
        var url = BASE_URL + "alldata/get_location/" + city_id;
        $.ajax({
            url: url,
            type: "POST",
            dataType: "html",
            success: function (data) {
                $(".sellocation").html(data);
            },
            complete: function () {
                var dropdown_text = $(".selcity option:selected").text();

                if (dropdown_text == 'Online') {
                    $('#skype_id_div').show();
                    $('.sellocation').attr('disabled', 'disabled');
                    $("#skype_id").prop('required', true);
                } else {
                    $('#skype_id_div').hide();
                    $('.sellocation').prop("disabled", false);
                    $("#skype_id").prop('required', false);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    $('body').on('change', '.selectcity, .selectlocation, .selgender, .selloe', function () {
        var city_id = $(".selectcity").val();
        var location_id = $(".selectlocation").val();
        var gender = $(".selgender").val();
        //var cat_id = $(".selcat").val();
        //var subcat_id = $(".selsubcat").val();
        var selloe = $(".selloe").val();
        if ($(this).attr('id') == 'selectcity')
        {
            setTimeout(function () {
                loadloc(city_id);
            }, 0);
        }
        var url = BASE_URL + "admin_dashboard/get_filtered_teacher_list/";
        $('.all_tution_list').css({'opacity': 0.3});
        $.ajax({
            url: url,
            data: {
                city_id: city_id,
                location_id: location_id,
                gender: gender,
                //cat_id: cat_id,
                //subcat_id: subcat_id,
                selloe: selloe,
            },
            type: "POST",
            dataType: "html",
            success: function (data) {
                $('.all_tution_list').html(data);
            },
            complete: function () {
                $('.all_tution_list').css({'opacity': 1});
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    function loadloc(city_id) {
        var url = BASE_URL + "alldata/get_location/" + city_id;
        $.ajax({
            url: url,
            type: "POST",
            dataType: "html",
            success: function (data) {
                $(".selectlocation").html(data);
            },
            complete: function () {
                var dropdown_text = $(".selectcity option:selected").text();

                if (dropdown_text == 'Online') {
                    $('#skype_id_div').show();
                    $('.selectlocation').attr('disabled', 'disabled');
                    $("#skype_id").prop('required', true);
                } else {
                    $('#skype_id_div').hide();
                    $('.selectlocation').prop("disabled", false);
                    $("#skype_id").prop('required', false);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    }

    $('body').on('keydown', '#tutor_id, #full_name, #mobile_no, #institute_name', function (event) {
        if (event.keyCode == 13) {
            var tutor_id = $("#tutor_id").val();
            var full_name = $("#full_name").val();
            var mobile_no = $("#mobile_no").val();
            var institute_name = $("#institute_name").val();
            var city_id = $(".selectcity").val();
            var location_id = $(".selectlocation").val();
            var gender = $(".selgender").val();
            //var cat_id = $(".selcat").val();
            //var subcat_id = $(".selsubcat").val();
            var selloe = $(".selloe").val();
            var url = BASE_URL + "admin_dashboard/get_filtered_teacher_list/";
            $('.all_tution_list').css({'opacity': 0.3});
            $.ajax({
                url: url,
                data: {
                    tutor_id: tutor_id,
                    full_name: full_name,
                    mobile_no: mobile_no,
                    institute_name: institute_name,
                    city_id: city_id,
                    location_id: location_id,
                    gender: gender,
                    //cat_id: cat_id,
                    //subcat_id: subcat_id,
                    selloe: selloe,
                },
                type: "POST",
                dataType: "html",
                success: function (data) {
                    $('.all_tution_list').html(data);
                },
                complete: function () {
                    $('.all_tution_list').css({'opacity': 1});
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus + errorThrown);
                }
            });
        }
    });

    $('body').on('change', '.selcat', function () {
        var cat_id = $(".selcat").val();
        var class_id = $(".select_class").val();
        var url = BASE_URL + "alldata/get_sub_cat/" + cat_id;

        $.ajax({
            url: url,
            type: "POST",
            dataType: "html",
            success: function (data) {
                $(".selsubcat").html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    $('body').on("change", ".selsubcat", function () {
        var cat_id = $(".selcat").val();
        var class_id = $(".selsubcat").val();
        var url = BASE_URL + "alldata/ajax_load_subject";

        $.ajax({
            url: url,
            type: "POST",
            data: {'cat_id': cat_id, 'class_id': class_id},
            dataType: "html",
            success: function (data) {
                $("#subject_show").html(data);
            },
            complete: function ()
            {

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });


    $('body').on('click', '#submit_first', function (e) {
        var full_name = $('#full_name').val();
        var mobile_no = $('#mobile_no').val();

        if (full_name != '' && mobile_no != '') {
            $('#parent_registration_form_first_part').hide();
            $('#parent_registration_form_second_part').show();
            $('#step').val('2');
            $('#submit_first').html('Submit');
            $('#submit_first').parent().removeClass('col-md-12').addClass('col-md-7');
            $('#back_to_first_form').show();
        }
    });

    $('body').on('click', '#back_to_first_form', function (e) {
        $('#parent_registration_form_first_part').show();
        $('#parent_registration_form_second_part').hide();
        $('#step').val('1');
        $('#submit_first').html('Continue');
        $('#submit_first').parent().removeClass('col-md-7').addClass('col-md-12');
        $('#back_to_first_form').hide();
    });

    $('body').on('submit', '.parent_registration_form', function (e) {
        e.preventDefault();
        $('#back_to_first_form').prop('disabled', true);
        $('#submit_first').prop('disabled', true);
        $('#submit_first').html('Please wait...');

        var step = $('#step').val();
        if (step === '2') {
            if ($("input[name='sdg[]']").length > 0) {
                if ($("input[type='checkbox'][name='sdg[]']:checked").length) {

                } else {
                    $('#back_to_first_form').prop('disabled', false);
                    $('#submit_first').prop('disabled', false);
                    $('#submit_first').html('Submit');
                    $('.subject_msg').show();
                    $('.subject_msg').delay(3000).fadeOut('slow');
                    return false;
                }
            }
            is_submit = 'true';

            var url = BASE_URL + $(this).data("link");
            var form = "#" + $(this).attr('id');
            var data = $(form).serialize();

            $.ajax({
                url: url,
                type: "POST",
                data: data,
                dataType: "json",
                success: function (data) {
                    if (data.status == 'redirect')
                    {
                        window.location.href = BASE_URL + data.url;
                    }
                    if (data.status == 'message')
                    {
                        //$("#msg").html(data.msg);
                        $("#email").popover({
                            placement: 'top',
                            html: 'true',
                            content: "<span>This e-mail id already used. Try new one.</span>"
                        }).popover('show');

                        $('.popover').stop(true, true).fadeTo(300, 100).fadeTo(2000, 100).fadeTo(800, 0, function ()
                        {
                            $('#email').popover('hide');
                        });
                        $('#back_to_first_form').prop('disabled', false);
                        $('#submit_first').prop('disabled', false);
                        $('#submit_first').html('Submit');
                    }
                },
                complete: function ()
                {

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus + errorThrown);
                }
            });
        } else if (step === '1') {
            var full_name = $('#full_name').val();
            var mobile_no = $('#mobile_no').val();
            if (full_name != '' && mobile_no != '') {

                $('#parent_registration_form_first_part').hide();
                $('#parent_registration_form_second_part').show();
                $('#step').val('2');
            }
        }
    });

    $('body').on('submit', '#tutor_registration_form', function (e) {
        e.preventDefault();

        var url = BASE_URL + $(this).data("link");
        var form = "#" + $(this).attr('id');
        var data = $(form).serialize();
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                if (data.status == 'redirect')
                {
                    window.location.href = BASE_URL + data.url;
                }
                if (data.status == 'message')
                {
                    $("#msg").html(data.msg).show();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    $('#hireTutorModal').on('hidden.bs.modal', function () {
        var full_name = $('#full_name').val();
        var mobile_no = $('#mobile_no').val();
        var city = $("#selcity option:selected").text();
        var location = $("#sellocation option:selected").text();
        var category = $("#selcat option:selected").text();
        var sub_category = $("#selsubcat option:selected").text();
        var step = $('#step').val();

        if (step == '2' && full_name != '' && mobile_no != '') {
            $.ajax({
                type: "POST",
                url: BASE_URL + 'alldata/send_email_to_admin',
                data: {'full_name': full_name, 'mobile_no': mobile_no, 'city': city, 'location': location, 'category': category, 'sub_category': sub_category},
                dataType: 'json', // fix: need to append your data to the call
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
                complete: function ()
                {

                }
            });
        } else {
            $('.parent_registration_form')[0].reset();
        }
    });

    $('body').on('change', '#password', function (e) {
        e.preventDefault();
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();
        validatePassword();
    });

    $('body').on('keyup', '#confirm_password', function (e) {
        e.preventDefault();
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();
        validatePassword();
    });


    $('body').on('change', '#tutor_password', function (e) {
        e.preventDefault();
        var password = $("#tutor_password").val();
        var confirm_password = $("#tutor_confirm_password").val();
        validateTutorPassword();
    });

    $('body').on('keyup', '#tutor_confirm_password', function (e) {
        e.preventDefault();
        var password = $("#tutor_password").val();
        var confirm_password = $("#tutor_confirm_password").val();
        validateTutorPassword();
    });

    $('body').on('blur', '.checkTutorNumber', function(){
        var mobile_no = $(this).val();
        var url = BASE_URL + 'landing/checkTutorNumber';
        btnThis = $(this);
        $.ajax({
            url: url,
            type: "POST",
            data: {mobile_no: mobile_no},
            dataType: "json",
            success: function (data) {
                if (btnThis.val() != "") {
                    if (data == 'success') {
                        btnThis.parents('.form-group').removeClass('has-warning has-feedback');
                        btnThis.parents('.form-group').find('.text-warning').remove();
                    } else if(data == 'warning') {
                        btnThis.parents('.form-group').addClass('has-warning has-feedback');
                        btnThis.parents('.form-group').find('.text-warning').remove();
                        btnThis.after('<span class="text-warning">this number is already used</span>');
                    }
                }
            },
            complete: function ()
            {

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('ops something went wrong!');
            }
        });
    });

    wireUpEvents();
});

var validNavigation = false;

function wireUpEvents() {
    var dont_confirm_leave = 0; //set dont_confirm_leave to 1 when you want the user to be able to leave without confirmation
    var leave_message = '';

    function goodbye(e) {
        if (is_submit === 'true')
        {

        } else if (is_submit === 'false')
        {
            var step = $('#step').val();
            if (step === '2') {

                /*if(!e) e = window.event;
                 //e.cancelBubble is supported by IE - this will kill the bubbling process.
                 e.cancelBubble = true;
                 e.returnValue = leave_message;
                 //e.stopPropagation works in Firefox.
                 if (e.stopPropagation) {
                 e.stopPropagation();
                 e.preventDefault();
                 }*/
                var full_name = $('#full_name').val();
                var mobile_no = $('#mobile_no').val();
                var city = $("#selcity option:selected").text();
                var location = $("#sellocation option:selected").text();
                var category = $("#selcat option:selected").text();
                var sub_cat = $("#selsubcat option:selected").text();
                var step = $('#step').val();
                console.log(is_submit);
                $.ajax({
                    type: "POST",
                    url: BASE_URL + 'alldata/send_email_to_admin',
                    data: {'full_name': full_name, 'mobile_no': mobile_no, 'city': city, 'location': location, 'category': category, 'sub_category': sub_cat},
                    dataType: 'json',
                    success: function (data) {
                        $('.parent_registration_form')[0].reset();
                    },
                    complete: function ()
                    {
                        $('#parent_registration_form_first_part').show();
                        $('.parent_registration_form_first_part_submit').show();
                        $('#step').val('1');
                        $('#parent_registration_form_second_part').hide();
                        $('.parent_registration_form_second_part_submit').hide();
                    }
                });

                //return works for Chrome and Safari
                return leave_message;
                /*if (!validNavigation) {
                 if (dont_confirm_leave !==1 ) {}
                 }*/
            }
        }
    }
    window.onbeforeunload = goodbye;
}

function validatePassword() {
    var password = document.getElementById("password")
            , confirm_password = document.getElementById("confirm_password");

    if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity('');
    }
}

function validateTutorPassword() {
    var password = document.getElementById("tutor_password")
            , confirm_password = document.getElementById("tutor_confirm_password");

    if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity('');
    }
}
