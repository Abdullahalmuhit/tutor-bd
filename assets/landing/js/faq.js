$(document).ready(function(){
	
	$('body').on('click','#parent',function(e){
		if($("#parent").hasClass("active")){
			
		}
		else{
			
			$('#tutor').removeClass('active');
			$('.tutor').hide(800);
         	
			$('#parent').addClass('active');
			$('.parent').show(800);
         	
         	
		}
	});
	
	$('body').on('click','#tutor',function(e){
		if($("#tutor").hasClass("active")){
			
		}
		else{
			$('#parent').removeClass('active');
			
			$('.parent').hide(800);
         	
         	$('#tutor').addClass('active');
         	
			$('.tutor').show(800);
		}
	});
});