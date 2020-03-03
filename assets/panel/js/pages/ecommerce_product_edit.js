/*
*  Altair Admin
*  ecommerce_product_edit.js (ecommerce_product_edit.html)
*/

$(function() {
    // product edit
    altair_product_edit.init();
});

altair_product_edit = {
    init: function() {
        // product edit form
        altair_product_edit.edit_form();
        // product tags
        altair_product_edit.product_tags();
    },
    edit_form: function() {
        // form variables
        var $product_edit_form = $('#job_edit_form'),
            $product_edit_submit_btn = $('#job_edit_submit');
        // submit form
        
        $product_edit_submit_btn.on('click',function(e) {
            e.preventDefault();

            /*var form_serialized = JSON.stringify( $product_edit_form.serializeObject(), null, 2 );
            UIkit.modal.alert('<p>Product data:</p><pre>' + form_serialized + '</pre>');*/
           	var url = BASE_URL+"parents/parents_job_edit";
			var data = $product_edit_form.serializeObject();

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
        });
    },
    product_tags: function() {

        $('.product_edit_tags_control').selectize({
            plugins: {
                'remove_button': {
                    label: ''
                },
                'dropdown_append_page': ''
            },
            dropdownParent: $page_content,
            placeholder: 'Select subject(s)',
            /*options: [
                {id: 1, title: 'LTE', value: 'lte'},
                {id: 2, title: 'Quad HD', value: 'quad_hd'},
                {id: 3, title: 'Android™ 5.0', value: 'android_5'},
                {id: 4, title: '64GB', value: '64gb'}
            ],*/
            render: {
                option: function(data, escape) {
                    return  '<div class="option">' +
                        '<span>' + escape(data.title) + '</span>' +
                        '</div>';
                },
                item: function(data, escape) {
                    return '<div class="item">' + escape(data.title) + '</div>';
                }
            },
            maxItems: null,
            valueField: 'value',
            labelField: 'title',
            searchField: 'title',
            create: true,
            onDropdownOpen: function($dropdown) {
                $dropdown
                    .hide()
                    .velocity('slideDown', {
                        begin: function() {
                            $dropdown.css({'margin-top':'0'});
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    });
            },
            onDropdownClose: function($dropdown) {
                $dropdown
                    .show()
                    .velocity('slideUp', {
                        complete: function() {
                            $dropdown.css({'margin-top':''});
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    });
            }
        });
    }
};
