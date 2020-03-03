$(document).ready(function () {

    $('body').on('keyup', ".sort_job", function (event) {
        var job_id = $(this).data('job_id');
        var prev_sort_number = $(this).data('prev_sort_number');
        var sort = $(this).val();
        var page = $(this).data('page');
        if (event.keyCode == 13) {
            $.ajax({
                type: "POST",
                url: BASE_URL + 'admin_dashboard/sort_live_job',
                dataType: 'html',
                data: {'sort': sort, 'job_id': job_id, 'prev_sort_number': prev_sort_number, 'page': page},
                success: function (data)
                {
                    $(".blogarchive_content").animate({"opacity": 1});
                },
                complete: function ()
                {
                    window.location.replace(BASE_URL + 'admin_dashboard/job_board');
                }
            });
        }
    });

    $('body').on('click', '#all_job_pagination a', function (e) {
        e.preventDefault();
        $(".blogarchive_content").animate({"opacity": 0.4});
        $('html, body').animate({scrollTop: 0}, 800);

        $.ajax({
            type: "POST",
            url: $(this).attr('href'),
            dataType: 'html',
            success: function (data)
            {
                $('#admin_job_list_div').html(data);
            },
            complete: function ()
            {
                $(".blogarchive_content").animate({"opacity": 1});
            }
        });
    });
    $('body').on('change', '.roles_functions', function (e) {
        var user_access_id = $(this).data('user_access_id');
        var admin_id = $(this).data('admin_id');
        var menu_id = $(this).data('menu_id');

        $('#' + admin_id + '_loader_' + menu_id).html('<i class="fa fa-spinner fa-pulse"></i>');

        if ($(this).is(':checked')) {
            if (user_access_id == 0) {
                $.ajax({
                    url: BASE_URL + 'admin_dashboard/user_access_save',
                    type: 'post',
                    dataType: 'html',
                    data: {'admin_id': admin_id, 'menu_id': menu_id},
                    success: function (data)
                    {
                        $('#' + admin_id + '_loader_' + menu_id).html('');
                        $('#' + admin_id + '_loader_' + menu_id).html('<input type="checkbox" checked="checked" class="roles_functions" data-user_access_id="' + data + '" data-admin_id="' + admin_id + '" data-menu_id="' + menu_id + '" />');
                    }
                });
            }
        } else
        {
            if (user_access_id != 0) {
                $.ajax({
                    url: BASE_URL + 'admin_dashboard/user_access_delete',
                    type: 'post',
                    dataType: 'html',
                    data: {'user_access_id': user_access_id},
                    success: function (data)
                    {
                        $('#' + admin_id + '_loader_' + menu_id).html('');
                        $('#' + admin_id + '_loader_' + menu_id).html('<input type="checkbox" class="roles_functions" data-user_access_id="0" data-admin_id="' + admin_id + '" data-menu_id="' + menu_id + '" />');
                    }
                });
            }
        }
    });
});