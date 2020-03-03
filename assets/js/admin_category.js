$(document).ready(function () {
    $('body').on('click', '#edit_category', function () {
        var id = $(this).data('category_id');
        var category_name = $(this).data('category_name');
        var category_position = $(this).data('category_position');

        $('#category_id').val(id);
        $('#category').val(category_name);
        $('#category_position').val(category_position);
    });

    $('body').on('click', '#edit_class', function () {
        var class_id = $(this).data('class_id');
        var parent_id = $(this).data('parent_id');
        var class_name = $(this).data('class_name');
        var class_position = $(this).data('class_position');

        $('#class_id').val(class_id);
        $('#parent_id').val(parent_id);
        $('#class').val(class_name);
        $('#class_position').val(class_position);
    });

    $('body').on('click', '#edit_subjects', function () {

        var parent_id = $(this).data('subject_parent_id');
        var subject = $(this).data('subject_id');
        var subject_name = $(this).data('subject_name');

        var url = BASE_URL + "alldata/get_sub_parent/" + subject;

        $.ajax({
            url: url,
            type: "POST",
            dataType: "html",
            success: function (data) {
                //alert(data);
                $("#select_category").val(data);
                $('#subjects').val(subject);
                $('#class_list').val(subject);
                $('#subject').val(subject_name);
                getSubjectClass(data,parent_id);
            },
            complete: function ()
            {

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });

    });
    function getSubjectClass(cat, parent_id)
    {
        var url = BASE_URL + "alldata/get_sub_cat/" + cat;

        $.ajax({
            url: url,
            type: "POST",
            dataType: "html",
            success: function (data) {
                $("#class_list").html(data);
                $("#class_list").val(parent_id);

            },
            complete: function ()
            {
                $('#category_spinner').hide();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    }
    $('body').on("change", "#select_category", function () {
        $('#category_spinner').show();
        var cat_id = $("#select_category").val();
        var url = BASE_URL + "alldata/get_sub_cat/" + cat_id;

        $.ajax({
            url: url,
            type: "POST",
            dataType: "html",
            success: function (data) {
                $("#class_list").html(data);
            },
            complete: function ()
            {
                $('#category_spinner').hide();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });


    $('body').on('click', '.addButton', function () {
        var $template = $('#subjectTemplate'),
                $clone = $template
                .clone()
                .removeClass('hide')
                .removeAttr('id')
                .insertBefore($template),
                $option = $clone.find('[name="subject[]"]').prop('required', true).val('');
    });

    $('body').on('click', '.removeButton', function () {
        var $row = $(this).parents('.form-group');
        // Remove element containing the option
        $row.remove();
    });
});
