
$(document).ready(function () {
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