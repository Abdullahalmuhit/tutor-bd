$.fn.is_on_screen = function () {
    var win = $(window);
    var viewport = {
        top: win.scrollTop(),
        left: win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();

    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();

    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
};

$(document).ready(function () {



    /*$('body').on('submit','#tutor_search',function(e){
     var value = $('.tutor_search').val();
     var url = BASE_URL+'admin_dashboard/tutor_search';
     alert(value);
     $.ajax({
     url: url,
     type: "POST",
     data: {'value' : value},
     dataType: "html",
     success: function(data) {
     
     },
     complete: function()
     {
     
     },
     error: function(jqXHR, textStatus, errorThrown) {
     alert(textStatus+errorThrown);
     }
     });
     });*/

    $('body').on('click', '.tutor_email_send', function (e) {
        var tutor_name = $(this).data('tutor_name');
        var tutor_id = $(this).data('tutor_id');

        $('.tutor_name').html(tutor_name);
        $('#client_id').val(tutor_id);
    });

    $('body').on('change', '#live', function (e) {
        if ($('#live').is(':checked')) {
            $('#live_to').attr('disabled', false);
        } else {
            $('#live_to').val('');
            $('#live_to').attr('disabled', true);
        }

    });


    $('body').on('click', '#client_email_send_button', function (e) {
        e.preventDefault();

        var url = BASE_URL + 'admin_dashboard/email_send_to_client';
        var data = $('#client_email_send').serialize();
        var email_subject = $('#email_subject').val();
        var message = $('#message').val();

        //alert(url);
        //return false;

        if (email_subject == '') {
            $("#email_subject").popover({
                placement: 'top',
                html: 'true',
                content: "<span>Please Add E-mail subject</span>"
            }).popover('show');

            $('.popover').stop(true, true).fadeTo(300, 100).fadeTo(2000, 100).fadeTo(800, 0, function ()
            {
                $('#email_subject').popover('hide');
            });
            return false;
        }

        if (message == '') {
            $("#message").popover({
                placement: 'top',
                html: 'true',
                content: "<span>Please Add Message</span>"
            }).popover('show');

            $('.popover').stop(true, true).fadeTo(300, 100).fadeTo(2000, 100).fadeTo(800, 0, function ()
            {
                $('#message').popover('hide');
            });
            return false;
        }
        $('.email_sent_message').html('Please wait...<i class="fa fa-cog fa-spin"></i>');
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            dataType: "html",
            success: function (data) {
                $('.email_sent_message').html('<div class="alert alert-success text_center" role="alert">Email sent Successfully!</div>');
                $('.email_sent_message').show();
                $('.email_sent_message').delay(3000).fadeOut('slow');

                $('#email_subject').val('');
                $("#message").val('');
            },
            complete: function ()
            {
                //$('#send_email_modal').modal('hide');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    $("p").append("&nbsp;");

    $("form").submit(function (event) {
        if (($(this).attr('id') == 'profile_pic') || ($(this).attr('id') == 'frmtutjobs') || ($(this).attr('id') == 'tutor_search') || ($(this).attr('id') == 'createquestionform') || ($(this).attr('id') == 'createexamform') || ($(this).attr('id') == 'export_email_phone'))
        {
            return true;
        }
        /* Stop form from submitting normally */
        event.preventDefault();
        if ($(this).attr('id') == 'testimonial_add') {
            $('#add_msg').html('<i style="" class="fa fa-cog fa-spin fa-2x"></i>');
            var url = BASE_URL + $(this).data("link");
            var form = "#" + $(this).attr('id');

            var formData = new FormData($(this)[0]);
            //var data = $(form).serialize();

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                dataType: "html",
                contentType: false,
                processData: false,
                success: function (data) {
                    $('.testimonial_list').html('');
                    $('.testimonial_list').html(data);
                    $("#testimonial_add :input").val('');
                    $(".commentator_image").val('');
                },
                complete: function ()
                {
                    $('#add_msg').html('<div class="alert alert-success text_center" role="alert">Testimonial Added Successfully!</div>');
                    $('#add_msg').show();
                    $('#add_msg').delay(3000).fadeOut('slow');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus + errorThrown);
                }
            });
            return false;
        }
        if ($(this).attr('id') == 'testimonial_edit')
        {
            $(window).scrollTop(0);
            $('#edit_msg').html('<i style="" class="fa fa-cog fa-spin fa-2x"></i>');
            $('#edit_msg').show();
            var url = BASE_URL + $(this).data("link");
            var form = "#" + $(this).attr('id');
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                dataType: "html",
                contentType: false,
                processData: false,
                success: function (data) {
                    $('.testimonial_list').html('');
                    $('.testimonial_list').html(data);
                    $("#commentator_image").val('');
                },
                complete: function ()
                {
                    $('#edit_msg').html('<div class="alert alert-info text_center" role="alert">Testimonial Edited Successfully!</div>');
                    $('#edit_msg').show();
                    $('#edit_msg').delay(3000).fadeOut('slow');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus + errorThrown);
                }
            });
            return false;
        }

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
                alert(textStatus + errorThrown);
            }
        });

    });

    $("#upd_pt").click(function (event) {
        var url = $(this).data("link");
        var data = {'point': $("#point").val()};
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            dataType: "html",
            success: function (data) {
                window.location.href = data;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });
    /*
     $(".selcity").change(function(){
     
     var city_id = $(".selcity").val();
     
     var url = BASE_URL+"alldata/get_location/"+city_id;
     
     //alert(url);
     
     $.ajax({
     url: url,
     type: "POST",
     dataType: "html",
     success: function(data) {
     $(".sellocation").html(data);
     },
     error: function(jqXHR, textStatus, errorThrown) {
     alert(textStatus+errorThrown);
     }
     });
     });*/

    $("#pref_city").change(function () {
        var city_id = $("#pref_city").val();
        var url = BASE_URL + "alldata/get_location_with_checkbox/" + city_id;
        $.ajax({
            url: url,
            type: "POST",
            dataType: "html",
            success: function (data) {
                $("#pre_loc").html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    /*$(".selcat").change(function(){
     
     var cat_id = $(".selcat").val();
     
     var url = BASE_URL+"alldata/get_sub_cat/"+cat_id;
     
     //alert(url);
     
     $.ajax({
     url: url,
     type: "POST",
     dataType: "html",
     success: function(data) {
     $(".selsubcat").html(data);
     },
     error: function(jqXHR, textStatus, errorThrown) {
     alert(textStatus+errorThrown);
     }
     });
     });*/

    $("#btnsms").click(function () {
        var url = BASE_URL + "admin_dashboard/send_sms_email/sms";
        var data = {'sms_mail[]': [], 'job_id': $("#job_id").val()};

        $(":checked").each(function () {
            data['sms_mail[]'].push($(this).val());
        });

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            dataType: "html",
            success: function (data) {
                alert(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    $("#btnmail").click(function () {

        var url = BASE_URL + "admin_dashboard/send_sms_email/email";

        var data = {'sms_mail[]': [], 'job_id': $("#job_id").val()};
        $(":checked").each(function () {
            data['sms_mail[]'].push($(this).val());
        });

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            dataType: "html",
            success: function (data) {
                alert(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    $("#btnsendcv").click(function () {

        var url = BASE_URL + "admin_dashboard/send_cv";

        var data = {'tp[]': [], 'job_id': $("#job_id").val(), 'user_id': $("#user_id").val()};
        $(":checked").each(function () {
            data['tp[]'].push($(this).val());
        });

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            dataType: "html",
            success: function (data) {
                alert(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    $('#institute').blur(function () {
        var keyEvent = $.Event("keydown");
        keyEvent.keyCode = $.ui.keyCode.ENTER;
        $(this).trigger(keyEvent);
        // Stop event propagation if needed
        return false;
    }).autocomplete({
        source: BASE_URL + "alldata/institute_autocomplete",
        autoFocus: true,
        select: function (event, ui) {
            event.preventDefault();
            $(this).val(ui.item.label);
            $("#institute_id").val(ui.item.value);
        },
        change: function (event, ui) {
            if (!ui.item)
            {
                $("#institute_id").val("");
            }
        }
    });

    $('#hsc_institute').blur(function () {
        var keyEvent = $.Event("keydown");
        keyEvent.keyCode = $.ui.keyCode.ENTER;
        $(this).trigger(keyEvent);
        // Stop event propagation if needed
        return false;
    }).autocomplete({
        source: BASE_URL + "alldata/institute_autocomplete",
        autoFocus: true,
        select: function (event, ui) {
            event.preventDefault();
            $(this).val(ui.item.label);
            $("#hsc_ins_id").val(ui.item.value);
        },
        change: function (event, ui) {
            if (!ui.item)
            {
                $("#hsc_ins_id").val("");
            }
        }
    });

    $('#ssc_institute').blur(function () {
        var keyEvent = $.Event("keydown");
        keyEvent.keyCode = $.ui.keyCode.ENTER;
        $(this).trigger(keyEvent);
        // Stop event propagation if needed
        return false;
    }).autocomplete({
        source: BASE_URL + "alldata/institute_autocomplete",
        autoFocus: true,
        select: function (event, ui) {
            event.preventDefault();
            $(this).val(ui.item.label);
            $("#ssc_ins_id").val(ui.item.value);
        },
        change: function (event, ui) {
            if (!ui.item)
            {
                $("#ssc_ins_id").val("");
            }
        }
    });

    $('#msc_institute').blur(function () {
        var keyEvent = $.Event("keydown");
        keyEvent.keyCode = $.ui.keyCode.ENTER;
        $(this).trigger(keyEvent);
        // Stop event propagation if needed
        return false;
    }).autocomplete({
        source: BASE_URL + "alldata/institute_autocomplete",
        autoFocus: true,
        select: function (event, ui) {
            event.preventDefault();
            $(this).val(ui.item.label);
            $("#msc_ins_id").val(ui.item.value);
        },
        change: function (event, ui) {
            if (!ui.item)
            {
                $("#msc_ins_id").val("");
            }
        }
    });

    $('#subject').blur(function () {
        var keyEvent = $.Event("keydown");
        keyEvent.keyCode = $.ui.keyCode.ENTER;
        $(this).trigger(keyEvent);
        // Stop event propagation if needed
        return false;
    }).autocomplete({
        source: BASE_URL + "alldata/subject_autocomplete",
        autoFocus: true,
        select: function (event, ui) {
            event.preventDefault();
            $(this).val(ui.item.label);
            $("#subject_id").val(ui.item.value);
        },
        change: function (event, ui) {
            if (!ui.item)
            {
                $("#subject_id").val("");
            }
        }
    });

    $('#msc_subject').blur(function () {
        var keyEvent = $.Event("keydown");
        keyEvent.keyCode = $.ui.keyCode.ENTER;
        $(this).trigger(keyEvent);
        // Stop event propagation if needed
        return false;
    }).autocomplete({
        source: BASE_URL + "alldata/subject_autocomplete",
        autoFocus: true,
        select: function (event, ui) {
            event.preventDefault();
            $(this).val(ui.item.label);
            $("#msc_sdg_id").val(ui.item.value);
        },
        change: function (event, ui) {
            if (!ui.item)
            {
                $("#msc_sdg_id").val("");
            }
        }
    });

    var $head = $('#ha-header');
    $('.ha-waypoint').each(function (i) {
        var $el = $(this),
                animClassDown = $el.data('animateDown'),
                animClassUp = $el.data('animateUp');

        $el.waypoint(function (direction) {
            if (direction === 'down' && animClassDown) {
                $head.attr('class', 'ha-header ' + animClassDown);
            } else if (direction === 'up' && animClassUp) {
                $head.attr('class', 'ha-header ' + animClassUp);
            }
        }, {offset: '10%'});
    });
    function scroll_to_top() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
    }
    $(function () {
        $(".accordion").accordion({
            header: "h3", collapsible: false, active: false, event: "click"
        });

        $("#tabs").tabs();

        $('.des_box_hover').hover(function () {
            $(this).parent().children('.row.des_box_hover').toggle();
            $(this).toggle();
        });
        $('form .navbar-nav > li > a').css('padding-bottom', '0px');
        $('form .navbar-nav > li > a').css('padding-top', '0px');
        $('.sub_per').click(function () {
            $('#personal_info').hide();
            $('#edu_info').show();
            scroll_to_top();
        });
        $('.sub_edu').click(function () {
            $('#edu_info').hide();
            $('#tution_info').show();
            scroll_to_top();
        });
    });

    $('body').on('click', '.select_tutor', function () {
        $.ajax({
            url: BASE_URL + "parents/select_tutor_from_resume_list/" + $('input[name=selected_tutor]').val() + "/" + $(this).data('job_id'),
            type: 'post',
            dataType: 'html',
            success: function (data) {
                alert(data);
                location.reload();
            }
        });
    });

    $('body').on('click', '#featured_tutor_add', function (e) {
        e.preventDefault();
        $(window).scrollTop(0);
        if ($(".tutor_id:checked").length > 0)
        {
            $('.tutor_featured_message').html('<i style="position: absolute;left: 50%;top: 50%;" class="fa fa-spinner fa-pulse fa-2x"></i>');
            var tutor_id = $(".tutor_id:checked").map(function () {
                return $(this).val();
            }).get();

            $.ajax({
                url: BASE_URL + 'admin_dashboard/featured_tutor_add',
                type: 'post',
                dataType: 'json',
                data: {'tutor_id': tutor_id},
                success: function (data)
                {
                    $('.tutor_featured_message').html('<div class="alert alert-success" style="text-align: center; margin-top: 10px;" role="alert"> Tutors Featured Successfully</div>');
                    $('.tutor_featured_message').show();
                    $('.tutor_featured_message').delay(5000).fadeOut('slow');
                },
                complete: function ()
                {
                    location.reload();
                }
            });

        } else {
            $('.tutor_featured_message').html('<div class="alert alert-danger" style="text-align: center; margin-top: 10px;" role="alert">Please Select Tutors</div>');
            $('.tutor_featured_message').show();
            $('.tutor_featured_message').delay(3000).fadeOut('slow');
        }
        return false;
    });

    $('body').on('click', '#featured_tutor_remove', function (e) {
        e.preventDefault();
        $(window).scrollTop(0);
        if ($(".tutor_id:checked").length > 0)
        {
            $('.tutor_featured_message').html('<i style="position: absolute;left: 50%;top: 50%;" class="fa fa-spinner fa-pulse fa-2x"></i>');
            var tutor_id = $(".tutor_id:checked").map(function () {
                return $(this).val();
            }).get();

            $.ajax({
                url: BASE_URL + 'admin_dashboard/featured_tutor_remove',
                type: 'post',
                dataType: 'json',
                data: {'tutor_id': tutor_id},
                success: function (data)
                {
                    $('.tutor_featured_message').html('<div class="alert alert-success" style="text-align: center; margin-top: 10px;" role="alert"> Tutors Un-featured Successfully</div>');
                    $('.tutor_featured_message').show();
                    $('.tutor_featured_message').delay(5000).fadeOut('slow');
                },
                complete: function ()
                {
                    location.reload();
                }
            });

        } else {
            $('.tutor_featured_message').html('<div class="alert alert-danger" style="text-align: center; margin-top: 10px;" role="alert">Please Select Tutors</div>');
            $('.tutor_featured_message').show();
            $('.tutor_featured_message').delay(3000).fadeOut('slow');
        }
        return false;
    });

    $('body').on('click', '.edit_comment_button', function () {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var comment = $(this).data('comment');
        var commentator_flag = $(this).data('commentator_flag');
        var commentator_image = $(this).data('commentator_image');
        var designation = $(this).data('designation');

        $('#edit_name').val(name);
        $('#edit_comment').val(comment);
        $('#edit_commentator_flag').val(commentator_flag);
        $('#edit_commentator_image').val(commentator_image);
        $('#edit_designation').val(designation);
        $('#edit_id').val(id);
        $('#commentator_imageInputFile').val('');
    });

    $('body').on('click', '#testimonial_live', function (e) {
        if ($('.testimonial_checkbox:checked').length) {
            var testimonial_id = $(".testimonial_checkbox:checked").map(function () {
                return $(this).val();
            }).get();

            $(window).scrollTop(0);
            $('#live_not_live').html('<i style="" class="fa fa-cog fa-spin fa-2x"></i>');
            var url = BASE_URL + 'admin_dashboard/testimonial_live';

            $.ajax({
                url: url,
                type: "POST",
                data: {'testimonial_id': testimonial_id},
                dataType: "html",
                success: function (data) {
                    $('.testimonial_list').html(data);
                },
                complete: function ()
                {
                    $('#live_not_live').html('<div class="alert alert-info text_center" role="alert">Testimonial Live Successfully!</div>');
                    $('#live_not_live').show();
                    $('#live_not_live').delay(3000).fadeOut('slow');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus + errorThrown);
                }
            });
        } else {
            $('#live_not_live').html('<div class="alert alert-danger text_center" role="alert">Select testimonial first</div>');
            $('#live_not_live').show();
            $('#live_not_live').delay(3000).fadeOut('slow');
        }

    });

    $('body').on('click', '#testimonial_not_live', function (e) {
        if ($('.testimonial_checkbox:checked').length) {
            var testimonial_id = $(".testimonial_checkbox:checked").map(function () {
                return $(this).val();
            }).get();

            $(window).scrollTop(0);
            $('#live_not_live').html('<i style="" class="fa fa-cog fa-spin fa-2x"></i>');
            var url = BASE_URL + 'admin_dashboard/testimonial_not_live';

            $.ajax({
                url: url,
                type: "POST",
                data: {'testimonial_id': testimonial_id},
                dataType: "html",
                success: function (data) {
                    $('.testimonial_list').html(data);
                },
                complete: function ()
                {
                    $('#live_not_live').html('<div class="alert alert-info text_center" role="alert">Testimonial Not Live Successfully!</div>');
                    $('#live_not_live').show();
                    $('#live_not_live').delay(3000).fadeOut('slow');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus + errorThrown);
                }
            });
        } else {
            $('#live_not_live').html('<div class="alert alert-danger text_center" role="alert">Select testimonial first</div>');
            $('#live_not_live').show();
            $('#live_not_live').delay(3000).fadeOut('slow');
        }
    });

    $('body').on('click', '.delete_comment_button', function (e) {
        var id = $(this).data('id');
        var current_image = $(this).data('current_image');
        $('.testimonial_id').val(id);
        $('.current_image').val(current_image);
    });

    $('body').on('click', '.delete_testmonial_modal_button', function () {
        $('#testimoialDeleteModal').modal('hide');
        $('#edit_msg').html('<i style="" class="fa fa-cog fa-spin fa-2x"></i>');
        $.ajax({
            url: BASE_URL + 'admin_dashboard/delete_testmonial',
            type: 'post',
            dataType: 'html',
            data: {'testimonial_id': $('.testimonial_id').val(), 'current_image': $('.current_image').val()},
            success: function (data)
            {
                $('.testimonial_list').html(data);
            },
            complete: function ()
            {
                $('#edit_msg').html('<div class="alert alert-info text_center" role="alert">Testimonial Deleted Successfully!</div>');
                $('#edit_msg').show();
                $('#edit_msg').delay(3000).fadeOut('slow');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    $('body').on('click', '.email_send', function (e) {
        e.preventDefault();
        var thread_id = $(this).data('thread_id');
        //alert(thread_id);
        var message = $('#mailbox_reply').val();
        if (message == '') {
            $("#mailbox_reply").popover({
                placement: 'bottom',
                html: 'true',
                content: "<span>Please write message first</span>"
            }).popover('show');

            $('.popover').stop(true, true).fadeTo(300, 100).fadeTo(2000, 100).fadeTo(800, 0, function ()
            {
                $('#mailbox_reply').popover('hide');
            });
            return false;
        }
        var receiver = $(this).data('receiver');
        $('#loader_span').show();
        $(this).attr('disabled', true);

        $.ajax({
            url: BASE_URL + 'admin_dashboard/reply_to_email',
            method: 'post',
            data: {'thread_id': thread_id, 'message': message, 'receiver': receiver},
            dataType: 'json',
            success: function (data) {
                $("#mailbox_reply").val('');
                $('#loader_span').html('<div class="alert alert-success" role="alert">Your mail sent successfully</div>');
                $(this).attr('disabled', false);
            },
            complete: function ()
            {
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
            }
        });
    });

});
