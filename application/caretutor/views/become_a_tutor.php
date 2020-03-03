<?php echo $header;?>
<body>
    <!-- SCROLL TOP BUTTON -->
    <!--<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>-->
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
     <?php $this->load->view('frontend_menu'); ?>

    <!--=========== End HEADER SECTION ================-->

    <!--=========== BEGAIN BLOG SECTION ================-->
	<section id="blog" >
      	<div class="container-fluid">
      		<div class="row">
      			<div class="col-lg-3 col-sm-3 col-md-3"></div>
          		<div class="col-md-6 col-lg-6 col-sm-6">
          			<div class="well doc_search_form_container" style="margin: 0px; border: none !important; box-shadow: none !important; padding: 70px 0 40px 0;">
          				<p class="text-center page_title" >Tutor Sign Up</p>
          				<form class="form-horizontal" id="tutor_registration_form" data-link="registration/add_basic_info" method="post" role="form">
          					<div class="alert alert-danger col-xs-12 col-sm-12 col-md-12" role="alert" id="msg" style="display: none;">

						    </div>
							<input type="hidden" value="tutor" name="user_type" id="user_type" />
			                    <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom input_margin_mobile">
			                        <div class="form-group">
			                            <label for="full_name">Name</label>
			                            <input type="text" required="required" class="form-control" name="full_name" id="full_name" placeholder="Your Name">
			                        </div>
			                    </div>

			                    <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom input_margin_mobile">
			                        <div class="form-group">
			                            <label for="mobile_no">Phone Number</label>
			                            <input type="number" required="required" class="form-control checkTutorNumber" name="mobile_no" id="mobile_no" placeholder="Eg. 0161...">
			                        </div>
			                    </div>

			                    <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom input_margin_mobile">
			                        <div class="form-group">
			                            <label for="email">Email Address</label>
			                            <input type="email" class="form-control" required="required" id="email" name="email" placeholder="Your Email Address..." />
			                        </div>
			                    </div>

			                    <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom input_margin_mobile">
			                        <div class="form-group">
			                            <label for="tutor_password">Password</label>
			                            <input type="password" class="form-control" required="required" id="tutor_password" name="password" placeholder="Enter Your Password" />
			                        </div>
			                    </div>

			                    <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom input_margin_mobile">
			                        <div class="form-group">
			                            <label for="tutor_confirm_password">Retype Password</label>
			                            <input type="password" class="form-control" required="required" id="tutor_confirm_password" placeholder="Enter Your Password Again" />
			                        </div>
			                    </div>

							    <div class="col-xs-12 col-sm-12 col-md-12 input_margin_mobile">
								    <div class="form-group">
											    	<button type="submit" id="tutor_registration_continue" class="btn btn-caretutors">Continue</button>
					                <p style="margin-top: 7px!important; text-align: center;">By Signing up, you agree to our <a target="_blank" href="<?php echo base_url('landing/terms_and_conditions'); ?>">Terms of Use and Privacy Policy</a></p>
					                </div>
		        				</div>
						    </div>
          				</form>
          			</div>
          		</div>
         	</div>
      	</div>
	</section>
    <!--=========== END BLOG SECTION ================-->
	<?php echo $footer;?>
