$('body').on('click', '.pay_bill', function (e) {

	$(this).attr('onclick','return false;');
        /*var job_id = $(this).data('data-job_id'),
        url = BASE_URL+'tutor/makePayment';

        if(job_id !='') {
        	$.ajax({
            url: url,
            type: "POST",
            data: {'job_id' : job_id},
            dataType: "json",
            success: function (data) {
                
            },
            complete: function ()
            {
                //$('#send_email_modal').modal('hide');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + errorThrown);
            }
        });
        }*/
    });