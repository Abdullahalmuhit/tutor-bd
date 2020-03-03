$(document).ready(function () {
    $('body').on('blur', '#previous_password', function (e) {
        e.preventDefault();
        var previous_password = $('#previous_password').val();
        var url = BASE_URL + 'tutor/check_password';
        $.ajax({
            url: url,
            type: "POST",
            data: {'previous_password': previous_password},
            dataType: "JSON",
            success: function (data) {
                if (data === 1) {
                    $('#password_message').html('<p class="uk-text-bold uk-text-success uk-text-center">Current password matched</p>');
                    $('#new_password').prop("disabled", false);
                    $('#confirm_password').prop("disabled", false);
                    //$('#update_password').removeClass("disabled");
                } else {
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

    //request for verify
    $('body').on('click', '#request_for_verification', function (e) {
        //e.preventDefault();
        $('#request_for_verification').attr("disabled", "disabled");
        var url = BASE_URL + 'tutor/request_for_verification';
        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                if (data === 1) {
                    $('#request_message').html('<p class="uk-text-bold uk-text-success uk-text-center">Your Request Sent Successfully. Caretutor Team will get back to you soon</p>');

                    // $('#confirm_password').prop("disabled", false);
                    //$('#update_password').removeClass("disabled");
                } else {
                    $('#request_message').html('<p class="uk-text-bold uk-text-danger uk-text-center">Something went wrong! Please try again later.</p>');
                    // $('#new_password').prop("disabled", true);
                    // $('#confirm_password').prop("disabled", true);
                    //$('#update_password').addClass("disabled");
                }

                $('#request_message').show();
                $('#request_message').delay(3000).fadeOut('slow');
                location.reload();
                //alert(data);
            }
        });
    });

    //request for verify
    $('body').on('click', '#request_profile_edit', function (e) {
        e.preventDefault();
        var url = BASE_URL + 'tutor/request_edit_profile';
        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                if (data === 1) {
                    $('#request_message').html('<p class="uk-text-bold uk-text-success uk-text-center">Your Request Sent Successfully. Caretutors.com Team will get back to you soon</p>');
                    // $('#new_password').prop("disabled", false);
                    // $('#confirm_password').prop("disabled", false);
                    //$('#update_password').removeClass("disabled");
                } else {
                    $('#request_message').html('<p class="uk-text-bold uk-text-danger uk-text-center">Something went wrong! Please try again later.</p>');
                    // $('#new_password').prop("disabled", true);
                    // $('#confirm_password').prop("disabled", true);
                    //$('#update_password').addClass("disabled");
                }
                $('#request_message').show();
                $('#request_message').delay(3000).fadeOut('slow');
                //alert(data);
            }
        });
    });

    //unlock request
    $('body').on('click', '#update_settings_unlock_request', function (e) {
        e.preventDefault();
        var url = BASE_URL + 'tutor/update_settings_unlock_request';
        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                console.log(typeof data);
                if (data === 1) {
                    $('#update_settings_unlock_request_message').html('<p class="uk-text-bold uk-text-success uk-text-center">Your Request Sent Successfully. Caretutors.com Team will get back to you soon</p>');
                    // $('#new_password').prop("disabled", false);
                    // $('#confirm_password').prop("disabled", false);
                    //$('#update_password').removeClass("disabled");
                } else {
                    $('#update_settings_unlock_request_message').html('<p class="uk-text-bold uk-text-warning uk-text-center">Your Request is already there. We are currently processing on it.</p>');
                    // $('#new_password').prop("disabled", true);
                    // $('#confirm_password').prop("disabled", true);
                    //$('#update_password').addClass("disabled");
                }
                $('#update_settings_unlock_request_message').show();
                $('#update_settings_unlock_request_message').delay(3000).fadeOut('slow');
                //alert(data);
            }
        });
    });

    //payment confirmation for verification
    $('body').on('click', '#payment_send', function (e) {
        e.preventDefault();
        var verify_id = $('#verify_id').val();
        var payment_method = $('#payment_method').val();
        var ref_no = $('#ref_no').val();
        var url = BASE_URL + 'tutor/send_data_verification';
        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            data: {
                'payment_method': payment_method,
                'ref_no': ref_no,
                'verify_id': verify_id
            },
            success: function (data) {
                if (data === 1) {

                    $('#payment_send_message').html('<p class="uk-text-bold uk-text-success uk-text-center">Successfully Submitted. Wait for payment confirmation</p>');
                    $('#payment_method').val("");
                    $('#ref_no').val("");
                } else {
                    $('#payment_send_message').html('<p class="uk-text-bold uk-text-danger uk-text-center">Something went wrong!! Please try again.</p>');
                    $('#payment_method').val("");
                    $('#ref_no').val("");
                }
                $('#payment_send_message').show();
                $('#payment_send_message').delay(3000).fadeOut('slow');
                //alert(data);
            }
        });
    });


    $('body').on('keyup', '#new_password', function (e) {
        e.preventDefault();
        var password = $("#new_password").val();
        var confirm_password = $("#confirm_password").val();
        validatePassword();
    });

    $('body').on('keyup', '#confirm_password', function (e) {
        e.preventDefault();
        var password = $("#new_password").val();
        var confirm_password = $("#confirm_password").val();
        validatePassword();
    });

    $('body').on('click', '#update_password', function (e) {
        e.preventDefault();
        var password = $("#new_password").val();
        var url = BASE_URL + 'tutor/update_password';
        $('#password_match_message').html('');
        $.ajax({
            url: url,
            type: "POST",
            data: {'password': password},
            dataType: "JSON",
            success: function (data) {
                if (data === 1) {
                    $('#password_message').html('<p class="uk-text-bold uk-text-success uk-text-center">Password updated successfully</p>');
                    $('#new_password').prop("disabled", true);
                    $('#confirm_password').prop("disabled", true);
                    $('#update_password').addClass("disabled");
                } else {
                    $('#password_message').html('<p class="uk-text-bold uk-text-danger uk-text-center">Password can\'t be updated</p>');
                    $('#new_password').prop("disabled", true);
                    $('#confirm_password').prop("disabled", true);
                    $('#update_password').addClass("disabled");
                }
            },
            complete: function ()
            {
                $("#previous_password").val('');
                $("#new_password").val('');
                $("#confirm_password").val('');
                $('#password_message').show();
                $('#password_message').delay(3000).fadeOut('slow');
            }
        });
    });

    $('body').on('click', '#update_settings_personal_info', function (e) {
        e.preventDefault();
        var full_name = $("#full_name").val();
        var mobile_no = $("#mobile_no").val();
        // var url = BASE_URL + 'tutor/update_mobile_no';
        var url = BASE_URL + 'tutor/update_settings_personal_info';
        $.ajax({
            url: url,
            type: "POST",
            data: {'full_name': full_name, 'mobile_no': mobile_no},
            dataType: "JSON",
            success: function (data) {
                if (data === 1) {
                    $('#update_info_messege').html('<p class="uk-text-bold uk-text-success uk-text-center">Personal info updated successfully</p>');
                } else {
                    $('#update_info_messege').html('<p class="uk-text-bold uk-text-danger uk-text-center">Personal info can\'t be updated</p>');
                }
                $('#update_info_messege').show();
                $('#update_info_messege').delay(3000).fadeOut('slow');
            }
        });
    });

    $('body').on('click', '#update_settings_address_verification', function (e) {
        e.preventDefault();
        var address_verification_code = $("#address_verification_code").val();
        var url = BASE_URL + 'tutor/update_settings_address_verification';
        $.ajax({
            url: url,
            type: "POST",
            data: {'address_verification_code': address_verification_code},
            dataType: "JSON",
            success: function (data) {
                if (data === 1) {
                    $('#verification_info_messege').html('<p class="uk-text-bold uk-text-success uk-text-center">Address Verified</p>');
                    setTimeout(function(){
                        location.reload();
                    }, 1500);
                } else {
                    $('#verification_info_messege').html('<p class="uk-text-bold uk-text-danger uk-text-center">Wrong Verification Code</p>');
                }
                $('#verification_info_messege').show();
                $('#verification_info_messege').delay(3000).fadeOut('slow');
            }
        });
    });

    $(document).on('click', '.upload_credential_button', function (e) {
        var url = BASE_URL + "tutor/ajax_upload_credential_info";
        var name_of_the_credential = $('#name_of_the_credential').val();
        var file_name = $('#file_name').val();
        if (file_name == '')
        {
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
                        }, 2000);
                        setTimeout(function () {
                            var url = BASE_URL + 'tutor/profile_view_from_uc';
                            window.location.replace(url);
                        }, 6000);
                    } else
                    {

                        $('#name_of_the_credential').val('');
                        $('#file_name').val('');

                        $('#message').html('<div class="uk-alert uk-alert-danger" data-uk-alert>You have already uploaded your necessary credentials.</div>');
                        $('#message').show();
                        $('#message').delay(4000).fadeOut('slow');
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                },
            });
        }
    });
});

function validatePassword() {
    var password = $("#new_password").val();
    var confirmPassword = $("#confirm_password").val();

    if (password != confirmPassword) {
        $('#update_password').addClass("disabled");
        $('#password_match_message').html('<p class="uk-text-bold uk-text-danger uk-text-center">Passwords do not match!</p>');
    } else {
        $('#update_password').removeClass("disabled");
        $('#password_match_message').html('<p class="uk-text-bold uk-text-success uk-text-center">Passwords matched!</p>');
    }
}

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
            //alert(textStatus+errorThrown);
        }
    });
}
