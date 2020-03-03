<div class="modal-content" style="border-radius: 0px !important;">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel" style="color: #0072bf;">Sign Up</h3>
		<hr/>
    </div>
    <form class="form-horizontal modal_tutor_signup_form" id="modal_tutor_signup_form" method="post" role="form">
    	<div class="modal-body">
    		<p id="email_unique_p" style="color: #A9444B; display: none;">This e-mail already used. Try unique one.</p>
    		<br />
	  		<div class="row">
	  			<input type="hidden" value="tutor" name="user_type" id="user_type" />
	  			<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">								    	
			    	<input type="text" class="form-control" required="required" id="full_name" name="full_name" placeholder="Please provide your name" />
			    </div>
			    
			    <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">								    	
			    	<input type="text" class="form-control" required="required" id="mobile_no" name="mobile_no" placeholder="Please provide your mobile_no" />
			    </div>
			    
				<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">								    	
			    	<input type="email" class="form-control" required="required" id="email" name="email" placeholder="Please provide your email id" />
			    </div>
				
				<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
			    	<input type="password" class="form-control" required="required" id="password" name="password" placeholder="Enter your password" />
			    </div>
				
				<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
			    	<input type="password" class="form-control" required="required" id="confirm_password" placeholder="Enter your password again" />
			    </div>
	  		</div>
	  	</div>
    	
	    <div class="modal-footer">
			<button type="submit" class="btn btn-caretutors modal_tutor_basic_signup" id="modal_tutor_basic_signup">Sign Up</button>
		</div>
	</form>
</div>