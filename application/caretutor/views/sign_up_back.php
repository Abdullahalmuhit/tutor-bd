<?php echo $header;?>
<body> 
    <!-- SCROLL TOP BUTTON -->
    <!--<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>-->
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
		<div class="menu_area">
<!-- 			<nav class="navbar navbar-default navbar-fixed-top visible-xs" role="navigation" <?php echo isset($flag)?'':'style="background-color: #3399ff;border-color: transparent; margin-top: 0px;"';?>>
				<div class="container">
					<div class="navbar-header">
						<button type="button" style="margin-top: 14px !important;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="navbar-brand" style="margin-top: 8px !important;"  href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>assets/img/caretutor_logo.png" alt="logo"></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul id="top-menu" class="nav navbar-nav navbar-right main_nav">
							<li><a href="<?php echo base_url(); ?>signin">Sign In</a></li>
							<li><a href="<?php echo base_url(); ?>landing/signup">Sign Up</a></li>
							<li><a href="<?php echo base_url(); ?>landing/job_board">Job Board</a></li>
							<li><a href="<?php echo base_url(); ?>landing/become_a_tutor" class="<?php echo isset($flag)?'slider_btn':'slider_btn_other'; ?>" id="become_a_tutor">Become a Tutor</a></li>                           
						</ul>           
					</div>
				</div>     
			</nav> -->
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
				<div class="container container_header">
					<div class="navbar-header">
					<!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

					<!-- LOGO -->

					<!-- TEXT BASED LOGO -->
					<!--<a class="navbar-brand" id="caretutor-logo" href="<?php echo base_url(); ?>">Care<span>Tutors</span></a>-->
					
					<!-- IMG BASED LOGO  -->
						<a class="navbar-brand" style="margin-top: 0px !important;"  href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>assets/img/caretutor_logo.png" alt="logo"></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul id="top-menu" class="nav navbar-nav navbar-right main_nav">
							<li><a href="<?php echo base_url(); ?>signin">Sign In</a></li>
							<li><a href="<?php echo base_url(); ?>landing/signup">Sign Up</a></li>
							<li><a href="<?php echo base_url(); ?>landing/job_board">Job Board</a></li>
							<li><a href="<?php echo base_url(); ?>landing/become_a_tutor" class="slider_btn">Become A Tutor</a></li>                           
						</ul>           
					</div><!--/.nav-collapse -->
				</div>     
			</nav> 
		</div>
      <!-- END MENU -->

    </header>

    <!--=========== End HEADER SECTION ================--> 

    <!--=========== BEGAIN BLOG SECTION ================-->
	<section id="blog">
      	<div class="container-fluid">
      		<div class="row">
      			<div class="col-lg-3 col-sm-3 col-md-3"></div>
          		<div class="col-md-6 col-lg-6 col-sm-6">
          			<div class="well doc_search_form_container" style="margin-top:30px; border: none !important; box-shadow: none !important;">
          				<p class="text-center" style="border-bottom: 1px solid #1976d2; margin-bottom: 20px !important;color: #3c3c3c;font-weight: 700;font-size: 24px;">SIGN UP</p>
          				<div class="col-xs-12 col-sm-12 col-md-12">
          					<div class="col-sm-6 col-xs-12" style="text-align: center;">
		        				<a href="#" aria-label="Left Align" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#hireTutorModal" id="hireTutorModalButton" class="btn btn-caretutors">Hire a tutor</a>
	        				</div>
	        				
					    	<div class="col-sm-6 col-xs-12" style="text-align: center;">
		        				<a href="<?php echo base_url('landing/become_a_tutor'); ?>" class="btn btn-caretutors">Become a tutor</a>
	        				</div>
        				</div>
          			</div>
          		</div>
         	</div>
      	</div>
	</section>
	<div class="modal fade" id="hireTutorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog ezCustTrans" style="margin-top: 50px !important;">
		    	<div class="modal-content" style="border-radius: 0px !important;">
		    		<div class="modal-header">
					    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h3 class="modal-title" id="myModalLabel" style="color: #0072bf;">Fill up your tutor requirements for free</h3>
					        <p style="font-size: 14px;">Fill up your tutor requirements within minutes. Over 10000+ Parents/Students have already found qualified tutors through our platform.</p>
							<hr/>
				    </div>
				    <form class="form-horizontal parent_registration_form" id="parent_registration_form" data-link="registration/parents_registration_frontend" method="post" role="form">
					<input type="hidden" value="1" name="step" id="step" />
					<input type="hidden" value="guardian" name="user_type" id="user_type" />
				    	<div class="modal-body">
				    		<div id="parent_registration_form_first_part">
				    			<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								    	<!--<label class="col-sm-3 col-xs-4 hidden-xs" for="exampleInputEmail3">City</label>-->
								    	<div class="col-sm-12 col-xs-12">
								    		<select class="form-control selcity" name="selcity" id="selcity" required="required">
											  	<?php 
												foreach ($city as $cit)
												{
												?>
													<option value="<?php echo ($cit->city == 'Select City')?'':$cit->id; ?>"><?php echo $cit->city; ?></option>
												<?php 
												}
												?>
											</select>
								    	</div>
								  	</div>
								  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								    	<!--<label class="col-sm-3 col-xs-4 hidden-xs" for="exampleInputPassword3">Location</label>-->
								    	<div class="col-sm-12 col-xs-12">
									    	<select class="form-control sellocation" name="sellocation" id="sellocation" required="required" >
												<option>Select Location</option>
											</select>
										</div>
								  	</div>
							  	
								  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								    	<!--<label class="col-sm-3 col-xs-4 hidden-xs" for="exampleInputPassword3">Category</label>-->
								    	<div class="col-sm-12 col-xs-12">
									    	<select class="form-control selcat" name="selcat" id="selcat" required="required">
												<?php 
												foreach ($category as $cat)
												{
												?>
													<option value="<?php echo ($cat->category == 'Select Category')?'':$cat->id; ?>"><?php echo $cat->category;?></option>
												<?php 
												}
												?>
											</select>
										</div>
								  	</div>
								  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								    	<!--<label class="col-sm-3 col-xs-4 hidden-xs" for="exampleInputPassword3">Class/Course</label>-->
								    	<div class="col-sm-12 col-xs-12">
									    	<select class="form-control selsubcat" name="selsubcat" id="selsubcat" required="required">
												<option>Select Class/Course</option>
											</select>
										</div>
								  	</div>
								  	
								  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								    	<!--<label class="col-sm-3 col-xs-4 hidden-xs" for="exampleInputPassword3">Class/Course</label>-->
								    	<div class="col-sm-12 col-xs-12">
									    	<select class="form-control selstgender" name="selstugender" id="selstugender" required="required">
												<option value="">Select Student Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div>
								  	</div>
							  	
								  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								    	<!--<label class="col-sm-3 col-xs-4 hidden-xs" for="exampleInputPassword3">Name</label>-->
								    	<div class="col-sm-12 col-xs-12">
								    		<input type="text" required="required" class="form-control" name="full_name" id="full_name" placeholder="Name">
								    	</div>
								  	</div>
								  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								    	<!--<label class="col-sm-3 col-xs-4 hidden-xs" for="exampleInputPassword3">Phone Number</label>-->
								    	<div class="col-sm-12 col-xs-12">
								    		<input type="text" required="required" class="form-control" name="mobile_no" id="mobile_no" placeholder="Phone Number">
								    	</div>
								  	</div>
							  	</div>
						  	</div>
						  	<div id="parent_registration_form_second_part" style="display: none;">
						  		<div class="row" style="margin-left: 0px !important; margin-right: 0px !important;">
						  			<fieldset id="subject_show" class="input_margin_bottom">
									
						  			</fieldset>
						  			<br />
									<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								    	<select class="form-control selgender" id="selgender" name="selgender">
											<option value="">Tutor gender reference</option>
											<option value="Any">Any</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
								  	</div>
								  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">								    	
								    	<select class="form-control days_in_week" id="days_in_week" name="selday">
											<option value="">Days in a week</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
										</select>
								  	</div>
								  	
									<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								    	<input type="number" class="form-control" id="salary_range" name="salary" placeholder="Salary">
								  	</div>
								  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								    	<div class="date" id="datePicker">
								            <div class="input-group input-append date">
								                <input type="text" class="form-control" id="date_to_hire" readonly="readonly" name="date_to_hire" placeholder="When are you looking to hire" />
								                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
								            </div>
								        </div>
								  	</div>
								  	
									<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom" id="skype_id_div" style="display: none;">
										<input type="text" class="form-control" id="skype_id" name="skype_id" placeholder="Please provide your Skype ID/Google Hangout ID">
	  								</div>
	  								
	  								<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								    	<textarea class="form-control" id="detail_address" name="address" placeholder="Detail address"></textarea>
								    </div>
								    
								    <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">								    	
								    	<select class="form-control no_of_student" id="no_of_student" name="no_of_student">
											<option value="1">No of student</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
										</select>
								  	</div>
								  	
								    <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">								    	
								    	<textarea class="form-control" id="more_about_requirements" name="otherreq" rows="5" placeholder="Please tell us a bit more about your  requirement to help us match better"></textarea>
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
				    	</div>
					    <div class="modal-footer">
					    	<button type="button" class="btn btn-back" id="back_to_first_form" style="display: none;">Back</button>
	        				<button type="submit" name="submit_first" class="btn btn-caretutors parent_registration_form_first_part_submit" id="submit_first">Continue</button>
	        				<p style="color: #666666; margin-top: 3px;">By Signing up, you agree to our <a target="_blank" href="<?php echo base_url('landing/terms_and_conditions'); ?>">Terms of Use and Privacy Policy</a></p>
	      				</div>
      				</form>
		    	</div>
		  	</div>
		</div>
    <!--=========== END BLOG SECTION ================-->
	<?php echo $footer;?>