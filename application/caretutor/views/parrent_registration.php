<?php echo $header; ?>

	<div class="wrapper bck_clr">
		<div class="container">
			<div class="row">
				<section>
					<!-- <div class="col-md-12 notice margin_top">
						<h4>To Register Over Phone, Call Directly: +8801756441122</h4>
					</div> -->
				</section>
				<section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">
					<div class="col-md-1"></div>
					<div class="col-md-6 margin_top margin-left-reg">
						<div class="panel panel-default">
							  <div class="panel-heading">
								<h2 class="panel-title"><b><i class="fa fa-user"></i> Post Your Tutor Requirements (It's Free)</b></h2>
							  </div>
							<div class="panel-body">
								<!-- <div class="col-md-1"></div> -->
								<div class="col-md-12">
									<div class="notice">
										<p><span><i class="fa fa-phone"></i></span> In a hurry? Call us at: +8801756441122</p>
									</div>
									<div class="notice">
										<span style="color: #ff0000;" id="msg"></span>
									</div>
									<form id="frmBasicInfo" class="form-horizontal margin_top" data-link="registration/add_basic_info" role="form">
										<div id="personal_info">
<!-- 											<h4><span>Personal Information</span></h4> -->
											<div class="input-group"> 
												<h5 class="input-group-addon"><span><i class="fa fa-user"></i> </span><b>Full Name  </b></h5>
												<input type="text" id="full_name" name="full_name" required class="form-control" placeholder="Full Name"/>
											</div>
											<div class="input-group"> 
												<h5 class="input-group-addon"><span><i class="fa fa fa-mobile-phone"></i> </span><b>Contact Number  </b></h5>
												<input type="text" id="mobile_no" name="mobile_no" required class="form-control" placeholder="Contact Number"/>
											</div>
											<div class="input-group"> 
												<h5 class="input-group-addon"><span><i class="fa fa-envelope-o"></i> </span><b>Email  </b></h5>
												<input type="email" id="email" name="email" required class="form-control" placeholder="Email Address"/>
											</div>
											<div class="input-group"> 
												<h5 class="input-group-addon"><span><i class="fa fa-lock"></i> </span><b>Password</b></h5>
												<input pattern=".{6,}" required title="6 characters minimum" type="password" id="password" name="password" class="form-control" placeholder="Password" />
											</div>
											<div class="input-group"> 
												<h5 class="input-group-addon"><span><i class="fa fa-lock"></i> </span><b>Re-type Password</b></h5>
												<input type="password" id="repassword" name="repassword" required class="form-control" placeholder="Re-enter Password" title="Please enter the same Password as above" onchange="form.password.pattern = this.value;" />
											</div>
											
											<input type="hidden" id="user_type" name="user_type" value="guardian" />
			
											<div class="form-group margin_top row"> 
												<div class="col-md-12">
													<div class="col-md-6"></div>
													<div class="col-md-6" style="padding-right:0;">
														<button class="btn_settings btn btn-success pull-right" type="submit"> Continue</button><!-- </a> -->
													</div>
												</div>
												<div class="col-md-12 pull-right" style="color: #9a9a9a;font-size: 12px;text-align: right;">
													By creating an account, you agree to Care Tutor's <a href="<?php echo base_url();?>landing/terms">terms & conditions</a>. 
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 offers hidden-xs">
						<div class="panel panel-default">
							  <div class="panel-heading">
								<h2 class="panel-title"><b><i class="fa fa-certificate"></i> How it works?</b></h2>
							  </div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<div class="col-md-12">
											<div class="col-md-2">
												<img class="img_reg_icon" alt="image" src="<?php echo base_url();?>assets/img/h6.png"> 
											</div>
											<div class="col-md-10">
												<h4><b><span>Post Requirements</span></b></h4>
												 <p class="date">Post your Tutor requirements. Our system will analyze it and find tutor whose expertise will strongly match your demand. </p>
											</div>
										</div>
										<div class="col-md-12">
											<div class="col-md-2">
												<img class="img_reg_icon" alt="image" src="<?php echo base_url();?>assets/img/h7.png">
											</div>
											<div class="col-md-10">
												<h4><b><span>Get 5 Best CV's</span></b></h4>
												 <p class="date">You'll receive the 5 best CV's in your INBOX/EMAIL according to your Tutor requirements. </p>
											</div>
										</div>
										<div class="col-md-12">
											<div class="col-md-2">
												<img class="img_reg_icon" alt="image" src="<?php echo base_url();?>assets/img/h3.png">
											</div>
											<div class="col-md-10">
												<h4><b><span>Choose Best One</span></b></h4>
												 <p class="date">Choose the best one among the 5 CV's. Offer the selected Tutor for few trial classes before taking the regular classes. Give us your feedback and start Tutoring</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

<?php echo $footer; ?>