/*
 *  Altair Admin
 *  forms_file_upload.js (forms_file_upload.html)
 */

$(function () {
    // file upload
    altair_form_file_upload.init();
});


altair_form_file_upload = {
    init: function () {

        var progressbar = $("#file_upload-progressbar"),
                mail_progressbar = $("#mail_progressbar"),
                bar = progressbar.find('.uk-progress-bar'),
                mail_bar = mail_progressbar.find('.uk-progress-bar'),
                settings = {

                    action: 'do_upload', // upload url
                    param: 'userfile',
                    allow: '*.(jpg|jpeg|gif|png)', // allow only images

                    loadstart: function () {
                        bar.css("width", "0%").text("0%");
                        progressbar.removeClass("uk-hidden");
                    },

                    progress: function (percent) {
                        percent = Math.ceil(percent);
                        bar.css("width", percent + "%").text(percent + "%");
                    },

                    allcomplete: function (response) {

                        bar.css("width", "100%").text("100%");

                        setTimeout(function () {
                            progressbar.addClass("uk-hidden");
                        }, 250);

                        alert("Upload Completed");
                        location.reload();
                    }
                };

        settings_credentials = {
            action: 'do_upload_credential', // upload url
            single: true,
            allow: '*.(jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG)', // allow only images
            param: 'userfile',
            type: 'text',
            loadstart: function () {
                mail_bar.css("width", "0%").text("0%");
                mail_progressbar.removeClass("uk-hidden uk-progress-danger");
            },
            progress: function (percent) {
                percent = Math.ceil(percent);
                mail_bar.css("width", percent + "%").text(percent + "%");
                if (percent == '100') {
                    setTimeout(function () {
                        //progressbar.addClass("uk-hidden");
                    }, 1500);
                }
            },
            error: function (event) {
                mail_progressbar.addClass("uk-progress-danger");
                mail_bar.css({'width': '100%'}).text('100%');
            },
            abort: function (event) {
                console.log(event);
            },
            complete: function (response, xhr) {
                $('#file_name').val(response);
                //console.log(response);
            }
        };

        var select = UIkit.uploadSelect($("#user_edit_avatar_control"), settings),
                drop = UIkit.uploadDrop($("#file_upload-drop"), settings),
                credentials_select = UIkit.uploadSelect($("#file_upload-select"), settings_credentials),
                credentials_drop = UIkit.uploadDrop($("#credential_file_upload-drop"), settings_credentials);
    }
};
