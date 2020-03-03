$(document).ready(function(){
	$('body').on('click','#edit_city', function(){
		var id = $(this).data('city_id');
		var city_name = $(this).data('city_name');
		
		$('#city_id').val(id);
		$('#city').val(city_name);
	});
	
	$('body').on('click','#edit_location', function(){
		var location_id 	= $(this).data('location_id');
		var city_id 		= $(this).data('city_id');
		var location_name 	= $(this).data('location_name');
		
		$('#location_id').val(location_id);
		$('#parent_city_id').val(city_id);
		$('#location').val(location_name);
	});
	
	$('body').on('click','#edit_subject',function(){
		var class_id = $(this).data('class_id');
		var parent_id = $(this).data('parent_id');
		var class_name = $(this).data('class_name');
		
		$('#class_id').val(class_id);
		$('#parent_id').val(parent_id);
		$('#class').val(class_name);
	});
});