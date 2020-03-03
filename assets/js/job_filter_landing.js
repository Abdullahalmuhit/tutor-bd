$('document').ready(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();
        $(".blogarchive_content").animate({ "opacity": 0.4 });
        // $('html, body').animate({ scrollTop: 0 }, 800);
        $('.loading').show();

        // var city_id = $('input[name^="city"]').val();
        var city_id = $('#city').val();

        var selected_locations = [];
        $('input[name^="locations"]').each(function() {
            if ($(this).is(":checked")) {
                selected_locations.push($(this).val());
            }
        });
        if (selected_locations) {
            var location_id = selected_locations;
        } else {
            var location_id = '';
        }


        var selected_category = [];
        $('input[name^="category"]').each(function() {
            if ($(this).is(":checked")) {
                selected_category.push($(this).val());
            }
        });
        if (selected_category) {
            var category_id = selected_category;
        } else {
            var category_id = '';
        }


        var selected_class = [];
        $('input[name^="class"]').each(function() {
            if ($(this).is(":checked")) {
                selected_class.push($(this).val());
            }
        });
        if (class_id) {
            var class_id = selected_class;
        } else {
            var class_id = '';
        }

        var selected_genders = [];
        $('input[name^="gender"]').each(function() {
            if ($(this).is(":checked")) {
                selected_genders.push($(this).val());
            }
        });
        if (selected_genders) {
            var gender = selected_genders;
        } else {
            var gender = '';
        }

        $.ajax({
            type: "POST",
            url: $(this).attr('href'),
            data: { 'city_id': city_id, 'location_id': location_id, 'category_id': category_id, 'class_id': class_id, 'gender': gender },
            dataType: 'html',
            success: function(data) {
                $('#landing_job_list_div').html(data);
            },
            complete: function() {
                $('.loading').hide();
                $(".blogarchive_content").animate({ "opacity": 1 });
            }
        });
    });

    $('body').on('change', '#city', function() {
        var city_id = $(this).val();
        if (city_id != '') {
            $(".blogarchive_content").animate({ "opacity": 0.4 });
            // $('html, body').animate({ scrollTop: 0 }, 800);

            var location_id = '';
            var selected_category = [];
            $('input[name^="category"]').each(function() {
                if ($(this).is(":checked")) {
                    selected_category.push($(this).val());
                }
            });
            if (selected_category) {
                var category_id = selected_category;
            } else {
                var category_id = '';
            }


            var selected_class = [];
            $('input[name^="class"]').each(function() {
                if ($(this).is(":checked")) {
                    selected_class.push($(this).val());
                }
            });
            if (class_id) {
                var class_id = selected_class;
            } else {
                var class_id = '';
            }

            var selected_genders = [];
            $('input[name^="gender"]').each(function() {
                if ($(this).is(":checked")) {
                    selected_genders.push($(this).val());
                }
            });
            if (selected_genders) {
                var gender = selected_genders;
            } else {
                var gender = '';
            }

            $('.loading').show();
            var url = BASE_URL + "alldata/get_location_landing/" + city_id;
            $.ajax({
                url: url,
                type: "POST",
                dataType: "html",
                success: function(data) {
                    $('#location_show').html(data);
                },
                complete: function() {
                    job_filter(city_id, location_id, category_id, class_id, gender);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //alert(textStatus + errorThrown);
                }
            });
        }
    });

    $('body').on('click', '#area_show_more', function(e) {
        $('#area_show_more_div').html("<a style='color: #02A6D8; cursor:pointer;' id='area_show_less'>Less... </a>");
        $('.area_div').slideDown('slow');
    });

    $('body').on('click', '#area_show_less', function(e) {
        $('#area_show_more_div').html("<a style='color: #02A6D8; cursor:pointer;' id='area_show_more'>More... </a>");
        $('.area_div').slideUp('slow');
        $('html, body').animate({
            scrollTop: $("#area_list_name_div").offset().top
        }, 2000);
    });

    $('body').on("change", ".locations", function() {
        $(".blogarchive_content").animate({ "opacity": 0.4 });
        // $('html, body').animate({ scrollTop: 0 }, 800);
        $('.loading').show();
        var city_id = $('#city').val();
        var selected_locations = [];
        $('input[name^="locations"]').each(function() {
            if ($(this).is(":checked")) {
                selected_locations.push($(this).val());
            }
        });
        if (selected_locations) {
            var location_id = selected_locations;
        } else {
            var location_id = '';
        }


        var selected_category = [];
        $('input[name^="category"]').each(function() {
            if ($(this).is(":checked")) {
                selected_category.push($(this).val());
            }
        });
        if (selected_category) {
            var category_id = selected_category;
        } else {
            var category_id = '';
        }


        var selected_class = [];
        $('input[name^="class"]').each(function() {
            if ($(this).is(":checked")) {
                selected_class.push($(this).val());
            }
        });
        if (class_id) {
            var class_id = selected_class;
        } else {
            var class_id = '';
        }

        var selected_genders = [];
        $('input[name^="gender"]').each(function() {
            if ($(this).is(":checked")) {
                selected_genders.push($(this).val());
            }
        });
        if (selected_genders) {
            var gender = selected_genders;
        } else {
            var gender = '';
        }

        var url = BASE_URL + "landing/all_job_pagination_list";
        $.ajax({
            url: url,
            type: "POST",
            dataType: "html",
            success: function(data) {
                $('#subject_show').html(data);
            },
            complete: function() {
                job_filter(city_id, location_id, category_id, class_id, gender);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    $('body').on('change', '.category', function() {
        $(".blogarchive_content").animate({ "opacity": 0.4 });
        // $('html, body').animate({ scrollTop: 0 }, 800);
        $('.loading').show();
        var city_id = $('#city').val();

        var selected_locations = [];
        $('input[name^="locations"]').each(function() {
            if ($(this).is(":checked")) {
                selected_locations.push($(this).val());
            }
        });
        if (selected_locations) {
            var location_id = selected_locations;
        } else {
            var location_id = '';
        }


        var selected_category = [];
        $('input[name^="category"]').each(function() {
            if ($(this).is(":checked")) {
                selected_category.push($(this).val());
            }
        });
        if (selected_category) {
            var category_id = selected_category;
        } else {
            var category_id = '';
        }


        var selected_class = [];
        $('input[name^="class"]').each(function() {
            if ($(this).is(":checked")) {
                selected_class.push($(this).val());
            }
        });
        if (class_id) {
            var class_id = selected_class;
        } else {
            var class_id = '';
        }

        var selected_genders = [];
        $('input[name^="gender"]').each(function() {
            if ($(this).is(":checked")) {
                selected_genders.push($(this).val());
            }
        });
        if (selected_genders) {
            var gender = selected_genders;
        } else {
            var gender = '';
        }

        var url = BASE_URL + "alldata/get_class_landing";
        $.ajax({
            url: url,
            type: "POST",
            data: { 'category_id': category_id, 'class_id': class_id },
            dataType: "html",
            success: function(data) {
                $('#class_show').html(data);
            },
            complete: function() {
                job_filter(city_id, location_id, category_id, class_id, gender);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    $('body').on('change', '.classes', function() {
        $(".blogarchive_content").animate({ "opacity": 0.4 });
        // $('html, body').animate({ scrollTop: 0 }, 800);
        $('.loading').show();
        var city_id = $('#city').val();

        var selected_locations = [];
        $('input[name^="locations"]').each(function() {
            if ($(this).is(":checked")) {
                selected_locations.push($(this).val());
            }
        });
        if (selected_locations) {
            var location_id = selected_locations;
        } else {
            var location_id = '';
        }


        var selected_category = [];
        $('input[name^="category"]').each(function() {
            if ($(this).is(":checked")) {
                selected_category.push($(this).val());
            }
        });
        if (selected_category) {
            var category_id = selected_category;
        } else {
            var category_id = '';
        }


        var selected_class = [];
        $('input[name^="classes"]').each(function() {
            if ($(this).is(":checked")) {
                selected_class.push($(this).val());
            }
        });
        if (selected_class) {
            var class_id = selected_class;
        } else {
            var class_id = '';
        }

        var selected_genders = [];
        $('input[name^="gender"]').each(function() {
            if ($(this).is(":checked")) {
                selected_genders.push($(this).val());
            }
        });
        if (selected_genders) {
            var gender = selected_genders;
        } else {
            var gender = '';
        }

        var url = BASE_URL + "landing/all_job_pagination_list";

        $.ajax({
            url: url,
            type: "POST",
            data: { 'city_id': city_id, 'location_id': location_id, 'category_id': category_id, 'class_id': class_id, 'gender': gender },
            dataType: "html",
            success: function(data) {
                $('#landing_job_list_div').html(data);
            },
            complete: function() {
                $(".blogarchive_content").animate({ "opacity": 1 });
                $('.loading').hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });

    $('body').on("change", ".gender", function() {
        $(".blogarchive_content").animate({ "opacity": 0.4 });
        // $('html, body').animate({ scrollTop: 0 }, 800);
        var city_id = $('#city').val();

        var selected_locations = [];
        $('input[name^="locations"]').each(function() {
            if ($(this).is(":checked")) {
                selected_locations.push($(this).val());
            }
        });
        if (selected_locations) {
            var location_id = selected_locations;
        } else {
            var location_id = '';
        }


        var selected_category = [];
        $('input[name^="category"]').each(function() {
            if ($(this).is(":checked")) {
                selected_category.push($(this).val());
            }
        });
        if (selected_category) {
            var category_id = selected_category;
        } else {
            var category_id = '';
        }


        var selected_class = [];
        $('input[name^="classes"]').each(function() {
            if ($(this).is(":checked")) {
                selected_class.push($(this).val());
            }
        });
        if (selected_class) {
            var class_id = selected_class;
        } else {
            var class_id = '';
        }

        var selected_genders = [];
        $('input[name^="gender"]').each(function() {
            if ($(this).is(":checked")) {
                selected_genders.push($(this).val());
            }
        });
        if (selected_genders) {
            var gender = selected_genders;
        } else {
            var gender = '';
        }

        $('.loading').show();
        var url = BASE_URL + "landing/all_job_pagination_list";

        $.ajax({
            url: url,
            type: "POST",
            data: { 'city_id': city_id, 'location_id': location_id, 'category_id': category_id, 'class_id': class_id, 'gender': gender },
            dataType: "html",
            success: function(data) {
                $('#landing_job_list_div').html(data);
            },
            complete: function() {
                $('.loading').hide();
                $(".blogarchive_content").animate({ "opacity": 1 });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
    });
});

function job_filter(city_id, location_id, category_id, class_id, gender) {
    var url = BASE_URL + "landing/all_job_pagination_list";
    $.ajax({
        url: url,
        type: "POST",
        data: { 'city_id': city_id, 'location_id': location_id, 'category_id': category_id, 'class_id': class_id, 'gender': gender },
        dataType: "html",
        success: function(data) {
            $('#landing_job_list_div').html(data);
        },
        complete: function() {
            $('.loading').hide();
            $(".blogarchive_content").animate({ "opacity": 1 });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert(textStatus + errorThrown);
        }
    });
}

/*$('body').on("change","#sellocation", function(){
	var city_id 	= $('#city').val();
	var location_id = $(this).val();
	var category_id = $('#category').val();
	var class_id 	= $('#selsubcat').val();
	var gender		= $('#gender').val();
	$('.loading').show();
	var url = BASE_URL+"landing/all_job_pagination_list";
	
	$.ajax({
		url: url,
		type: "POST",
		data:	{'city_id' : city_id, 'location_id' : location_id, 'category_id' : category_id, 'class_id' : class_id, 'gender' : gender},
		dataType: "html",
		success: function(data) {
			$('#landing_job_list_div').html(data);
		},
		complete: function()
		{
			$('.loading').hide();
		},
		error: function(jqXHR, textStatus, errorThrown) {
			alert(textStatus+errorThrown);
		}
	});
});
	
* 
* $('body').on('change', '#category', function(){
	var city_id 	= $('#city').val();
	var location_id = $('#sellocation').val();
	var category_id = $(this).val();
	var class_id 	= '';
	var gender		= $('#gender').val();
	$('.loading').show();
	var url = BASE_URL+"alldata/get_sub_cat/"+category_id;
	$.ajax({
		url: url,
		type: "POST",
		dataType: "html",
		success: function(data) {
			$('#selsubcat').html(data);
		},
		complete: function()
		{
			job_filter(city_id, location_id, category_id, class_id, gender);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			alert(textStatus+errorThrown);
		}
	});
});
	
$('body').on("change","#selsubcat", function(){
	var city_id 	= $('#city').val();
	var location_id = $('#sellocation').val();
	var category_id = $('#category').val();
	var class_id 	= $(this).val();
	var gender		= $('#gender').val();
	$('.loading').show();
	var url = BASE_URL+"landing/all_job_pagination_list";
	
	$.ajax({
		url: url,
		type: "POST",
		data:	{'city_id' : city_id, 'location_id' : location_id, 'category_id' : category_id, 'class_id' : class_id, 'gender' : gender},
		dataType: "html",
		success: function(data) {
			$('#job_list_show').html(data);
		},
		complete: function()
		{
			$('.loading').hide();
		},
		error: function(jqXHR, textStatus, errorThrown) {
			alert(textStatus+errorThrown);
		}
	});
});
	
* */