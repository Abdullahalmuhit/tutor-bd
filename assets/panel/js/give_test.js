/*
 *  Altair Admin
 *  page_invoices.js (page_invoices.html)
 */

$(function() {
    // init invoices
    altair_addmore.init();
});

altair_addmore  = {
    init: function() {
        altair_addmore.add_new();
        $sidebar_secondary_toggle.addClass('uk-hidden-large');
    },
    add_new: function() {

                // append services to invoice form
                var append_service = function() {

                    var $give_test_form_template_services = $('#give_test_form_template_services'),
                        $form_give_test_info = $('#form_give_test_info');

                    var template = $give_test_form_template_services.html(),
                        template_compiled = Handlebars.compile(template);

                    var service_id = (!$form_give_test_info.children().length) ? 1 : parseInt($form_give_test_info.children('.uk-grid:last').attr('data-service-number')) + 1,
                        context = {
                            "invoice_service_id": service_id
                        },
                        theCompiledHtml = template_compiled(context);

                    $form_give_test_info.append(theCompiledHtml);
                    
                	// material design
			        altair_md.init();
			
			        // forms
			        altair_forms.init();
                    // invoice md inputs
                    altair_md.inputs();
                    // invoice textarea autosize
                    altair_forms.textarea_autosize();

                    // reinitialize uikit margin
                    altair_uikit.reinitialize_grid_margin();
                };

                // append first service to invoice form on init
                append_service();

                $('#add_test_button').on('click', function (e) {
                	append_service();
                });

                // invoice due-date radio boxes
                altair_md.checkbox_radio();
    },
};
