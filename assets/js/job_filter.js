$('document').ready(function(){
	
	$('body').on('click', '.uk-pagination a', function(e){
		e.preventDefault();
		//$('#page_content').stop().animate({ scrollTop: 0 }, 500);
		$("#page_content").animate({"opacity":0.3});
		$('#page_content').animate({ scrollTop: 0 }, 500);
		
		var city_id 	= $('#filter_city').val();
		var location_id = $('#filter_location').val();
		var category_id = $('#filter_category').val();
		var class_id 	= $('#filter_class').val();
		var gender		= $('#filter_gender').val();
		$.ajax({
			type: "POST",
			url : $(this).attr('href'),
			data:	{'city_id' : city_id, 'location_id' : location_id, 'category_id' : category_id, 'class_id' : class_id, 'gender' : gender},
			dataType : 'html',
			success : function(data)
			{
				$('#job_list_show').html(data);
			},
			complete : function()
			{
				$("#page_content").animate({"opacity":1});
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus+errorThrown);
			}
		});	
	});
	
	$('body').on('change', '#filter_city', function(){
		var city_id 	= $('#filter_city').val();
		var location_id = $('#filter_location').val();
		var category_id = $('#filter_category').val();
		var class_id 	= $('#filter_class').val();
		var gender		= $('#filter_gender').val();
		//$('.loading').show();
		$("#page_content").animate({"opacity":0.3});
		$('#page_content').animate({ scrollTop: 0 }, 500);
		var url = BASE_URL+"tutor/ajax_load_locations_tutor_job_search/"+city_id;
		$.ajax({
			url: url,
			type: "POST",
			dataType: "html",
			success: function(data) {
				$('div[id="location_show"]').html(data);
				altair_product_edit.init();
				altair_forms.select_elements();
			},
			complete: function(){
				job_filter(city_id, location_id, category_id, class_id, gender);
				$("#page_content").animate({"opacity":1});
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus+errorThrown);
			}
		});
	});
	
	$('body').on("change","#filter_location", function(){
		var city_id 	= $('#filter_city').val();
		var location_id = $('#filter_location').val();
		var category_id = $('#filter_category').val();
		var class_id 	= $('#filter_class').val();
		var gender		= $('#filter_gender').val();
		$("#page_content").animate({"opacity":0.3});
		$('#page_content').animate({ scrollTop: 0 }, 500);
		var url = BASE_URL+"tutor/all_job_pagination_list";
		
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
				$("#page_content").animate({"opacity":1});
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus+errorThrown);
			}
		});
	});
	
	$('body').on('change', '#filter_category', function(){
		var city_id 	= $('#filter_city').val();
		var location_id = $('#filter_location').val();
		var category_id = $('#filter_category').val();
		var class_id 	= $('#filter_class').val();
		var gender		= $('#filter_gender').val();
		$("#page_content").animate({"opacity":0.3});
		$('#page_content').animate({ scrollTop: 0 }, 500);//$('.loading').show();
		var url = BASE_URL+"tutor/ajax_load_class_tutor_job_search";
		$.ajax({
			url: url,
			type: "POST",
			data: {'category_id' : category_id},
			dataType: "html",
			success: function(data) {
				$('div[id="class_show"]').html(data);
				altair_product_edit.init();
				altair_forms.select_elements();
			},
			complete: function(){
				job_filter(city_id, location_id, category_id, class_id, gender);
				$("#page_content").animate({"opacity":1});
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus+errorThrown);
			}
		});
	});

	$('body').on("change","#filter_class", function(){
		var city_id 	= $('#filter_city').val();
		var location_id = $('#filter_location').val();
		var category_id = $('#filter_category').val();
		var class_id 	= $('#filter_class').val();
		var gender		= $('#filter_gender').val();
		
		$("#page_content").animate({"opacity":0.3});
		$('#page_content').animate({ scrollTop: 0 }, 500);
		
		var url = BASE_URL+"tutor/all_job_pagination_list";
		
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
				$("#page_content").animate({"opacity":1});
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus+errorThrown);
			}
		});
	});
	
	$('body').on("change","#filter_gender", function(){
		var city_id 	= $('#filter_city').val();
		var location_id = $('#filter_location').val();
		var category_id = $('#filter_category').val();
		var class_id 	= $('#filter_class').val();
		var gender		= $('#filter_gender').val();
		
		$("#page_content").animate({"opacity":0.3});
		$('#page_content').animate({ scrollTop: 0 }, 500);
		
		var url = BASE_URL+"tutor/all_job_pagination_list";
		
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
				$("#page_content").animate({"opacity":1});
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus+errorThrown);
			}
		});
	});
});

function job_filter(city_id, location_id, category_id, class_id, gender){
	var url = BASE_URL+"tutor/all_job_pagination_list";
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
}
