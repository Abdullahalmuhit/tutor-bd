/*
 *  Altair Admin
 *  page_user_edit.js (page_user_edit.html)
 */

$(function() {
    // user edit
    altair_user_edit.init();
});

altair_user_edit = {
    init: function() {
        // user edit form
        altair_user_edit.edit_form();
        // user languages
        altair_user_edit.user_languages();
        // Class course
        altair_user_edit.class_course();
        // user groups
        //altair_user_edit.user_groups();
        // user todo_list
        altair_user_edit.user_todo();
        // Category
        altair_user_edit.tutor_category();
        //Preferred Location
        altair_user_edit.preferred_location();
        //Subjects you teach
        altair_user_edit.subjects();
        //tutor_availability_days
        altair_user_edit.available_days();
        altair_user_edit.tutoring_style();
        //tutor_institute
        altair_user_edit.tutor_institute();
        //tutor_group
        altair_user_edit.tutor_group();
        kendoUI.masked_input_widget();
    },
    edit_form: function() {
        // form variables
        var $user_edit_form = $('#user_edit_form'),
            $user_edit_submit_btn = $('#user_edit_submit'),
            user_name = $('#user_edit_uname'),
            user_name_control= $('#user_edit_uname_control'),
            user_position = $('#user_edit_position'),
            user_skype_control = $('#user_edit_skype_control'),
            user_google_control = $('#user_edit_google_control'),
            user_position_control = $('#user_edit_position_control');

        user_name_control
            // insert user name into form input
            .val(user_name.text())
            // change user name on keyup
            .on('keyup',function() {
                user_name.text(user_name_control.val());
            });
        // update inputs
        altair_md.update_input(user_name_control);


        user_position_control
            // insert user position into form input
            .val(user_position.text())
            // change user position on keyup
            .on('keyup',function() {
                user_position.text(user_position_control.val());
            });
        // update inputs
        altair_md.update_input(user_position_control);

    },
    user_languages: function() {

        $('#user_edit_languages').selectize({
            plugins: {
                'remove_button': {
                    label     : ''
                },
                'dropdown_append_page': ''
            },
            dropdownParent: $page_content,
            placeholder: 'Select language(s)',
            options: [
                {id: 1, title: 'English', value: 'gb'},
                {id: 2, title: 'French', value: 'fr'},
                {id: 3, title: 'Chinese', value: 'cn'},
                {id: 4, title: 'Dutch', value: 'nl'},
                {id: 5, title: 'Italian', value: 'it'},
                {id: 6, title: 'Spanish', value: 'es'},
                {id: 7, title: 'German', value: 'de'},
                {id: 8, title: 'Polish', value: 'pl'}
            ],
            render: {
                option: function(data, escape) {
                    return  '<div class="option">' +
                        '<i class="item-icon flag-' + escape(data.value).toUpperCase() + '"></i>' +
                        '<span>' + escape(data.title) + '</span>' +
                        '</div>';
                },
                item: function(data, escape) {
                    return '<div class="item"><i class="item-icon flag-' + escape(data.value).toUpperCase() + '"></i>' + escape(data.title) + '</div>';
                }
            },
            maxItems: null,
            valueField: 'value',
            labelField: 'title',
            searchField: 'title',
            create: false,
            onDropdownOpen: function($dropdown) {
                $dropdown
                    .hide()
                    .velocity('slideDown', {
                        begin: function() {
                            $dropdown.css({'margin-top':'0'});
                        },
                        duration: 200,
                        easing: easing_swiftOut,
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
    },

    tutor_institute: function() {
        $('#tutor_institute_name').selectize({
            plugins: {
                'remove_button': {
                    label     : ''
                },
                'dropdown_append_page': ''
            },
            dropdownParent: $page_content,
            placeholder: 'Your Institute name',

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
            maxItems: 1,
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
                        easing: easing_swiftOut,
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
    },

    tutor_group: function() {

        $('#tutor_group_name').selectize({
            plugins: {
                'remove_button': {
                    label     : ''
                },
                'dropdown_append_page': ''
            },
            dropdownParent: $page_content,
            placeholder: 'Your group name',
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
            maxItems: 1,
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
                        easing: easing_swiftOut,
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
    },

    tutor_category: function() {

        $('#tutor_profile_category').selectize({
            plugins: {
                'remove_button': {
                    label     : ''
                },
                'dropdown_append_page': ''
            },
            dropdownParent: $page_content,
            placeholder: 'Select category(s)',
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
            maxItems: 5,
            valueField: 'value',
            labelField: 'title',
            searchField: 'title',
            create: false,
            onDropdownOpen: function($dropdown) {
                $dropdown
                    .hide()
                    .velocity('slideDown', {
                        begin: function() {
                            $dropdown.css({'margin-top':'0'});
                        },
                        duration: 200,
                        easing: easing_swiftOut,
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
    },

    class_course: function() {

        $('#classcourse').selectize({
            plugins: {
                'remove_button': {
                    label     : ''
                },
                'dropdown_append_page': ''
            },
            dropdownParent: $page_content,
            placeholder: 'Select class / course(s)',

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
            create: false,
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
    },

    preferred_location: function() {

        $('#tutor_preferred_locations').selectize({
            plugins: {
                'remove_button': {
                    label     : ''
                },
                'dropdown_append_page': ''
            },
            dropdownParent: $page_content,
            placeholder: 'Your preferred location(s)',

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
            maxItems: 10,
            valueField: 'value',
            labelField: 'title',
            searchField: 'title',
            create: false,
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
    },

    subjects: function() {

        $('#tutor_preferred_subjects').selectize({
            plugins: {
                'remove_button': {
                    label     : ''
                },
                'dropdown_append_page': ''
            },
            dropdownParent: $page_content,
            placeholder: 'Your preferred subjects(s)',

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
            create: false,
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
    },
    available_days:function(){
    	$('#tutor_available_days').selectize({
            plugins: {
                'remove_button': {
                    label     : ''
                },
                'dropdown_append_page': ''
            },
            dropdownParent: $page_content,
            placeholder: 'Days of week',

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
            create: false,
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
    },
    tutoring_style:function(){
    	$('#tutoring_style').selectize({
            plugins: {
                'remove_button': {
                    label     : ''
                },
                'dropdown_append_page': ''
            },
            dropdownParent: $page_content,
            placeholder: 'Tutoring Style',

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
            create: false,
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
    },
    user_groups: function() {

        var $user_groups = $('#user_groups'),
            $all_groups = $('#all_groups'),
            $user_groups_control = $('#user_groups_control'),
            serialize_user_group = function() {
                var serialized_data = $user_groups.data("sortable").serialize();
                $user_groups_control.val( JSON.stringify(serialized_data) );
            };


        var sortable_user_groups = UIkit.sortable($user_groups, {
            group: '.groups_connected',
            handleClass: 'sortable-handler'
        });

        UIkit.sortable($all_groups, {
            group: '.groups_connected',
            handleClass: 'sortable-handler'
        });

        // serialize user group on change
        $user_groups.on('change.uk.sortable',function() {
            serialize_user_group();
        });

        // serialize group on init
        serialize_user_group();

    },
    user_todo: function() {
        var $user_todo = $('#user_todo');
        $user_todo.find('input:checkbox')
            .on('ifChecked', function(){
                $(this).closest('li').addClass('md-list-item-disabled');
            })
            .on('ifUnchecked', function(){
                $(this).closest('li').removeClass('md-list-item-disabled');
            });
    }
};
