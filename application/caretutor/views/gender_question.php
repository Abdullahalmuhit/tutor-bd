<div class="modal-content" style="border-radius: 0px !important;">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel" style="color: #0072bf;">Confirmation about gender</h3>
		<hr/>
    </div>
	<div class="modal-body">
		<div class="col-xs-12 col-sm-12 col-md-12">
	  		<p style="color: rgb(68, 68, 68); padding-top: 7px;">This jobs preferred gender is <?php echo $gender; ?>, which is not matched with your gender.</p>
	  		<p style="color: rgb(68, 68, 68); ">Are you sure to apply this job?</p>
	    </div>
	</div>
    <div class="modal-footer">
    	<center>
		  	<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="radio radio-info radio-inline">
	                <input type="radio" id="inlineRadio1" value="1" name="gender_q" data-job_id="<?php echo $job_id; ?>" class="gender_q">
	                <label for="inlineRadio1"> Yes </label>
	            </div>
	            <div class="radio radio-inline">
	                <input type="radio" id="inlineRadio2" value="0" name="gender_q" data-job_id="<?php echo $job_id; ?>" class="gender_q">
	                <label for="inlineRadio2"> No </label>
	            </div>
		  	</div>
	  	</center>
	</div>
</div>