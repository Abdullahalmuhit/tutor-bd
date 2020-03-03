<div class="modal-content" style="border-radius: 0px !important;">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel" style="color: #0072bf;">Sign In</h3>
		<hr/>
    </div>
    <form class="form-horizontal apply_job_signin_form" id="apply_job_signin_form" method="post" role="form">
    	<input type="hidden" name="job_id" id="modal_job_id" />
    	<div class="modal-body">
    		<p style="color: #A9444B;">Wrong information. Try again with correct information.</p>
    		<br />
	  		<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">								    	
			    	<input type="email" class="form-control" required="required" name="tutor_email" placeholder="Please provide your email id" />
			    </div>
				
				<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
			    	<input type="password" class="form-control" required="required" name="tutor_password" placeholder="Enter your password" />
			    </div>
	  		</div>
	  	</div>
    	
	    <div class="modal-footer">
			<button type="submit" name="submit_first" class="btn btn-caretutors apply_job_signin" id="apply_job_signin">Continue</button>
			<p style="color: #666666; margin-top: 3px;">Or may be you don't have account. Please create account here. <a href="javascript:void(0)" style="color: #31708F;" id="modal_tutor_signup">Sign up</a></p>
		</div>
	</form>
</div>