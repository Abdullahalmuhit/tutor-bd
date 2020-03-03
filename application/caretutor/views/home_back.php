<?php echo $header; ?>
  <body> 

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
		<div class="menu_area">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
				<div class="container">
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
					<!--<a class="navbar-brand" id="caretutor-logo" href="#">Care<span>Tutors</span></a>-->
					
					<!-- IMG BASED LOGO  -->
					<a class="navbar-brand for_change" href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>assets/img/caretutor_logo.png" alt="logo"></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul id="top-menu" class="nav navbar-nav navbar-right main_nav">
							<li><a href="<?php echo base_url().'signin'; ?>">Sign In</a></li>
							<li><a href="<?php echo base_url('landing/signup'); ?>">Sign Up</a></li>
							<li><a href="<?php echo base_url('landing/job_board'); ?>">Job Board</a></li>               
							<li><a href="<?php echo base_url('landing/become_a_tutor'); ?>" class="slider_btn" id="become_a_tutor">Become a Tutor</a></li>
							<!--aria-label="Left Align" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#becomeATutorModal"-->                           
						</ul>           
					</div><!--/.nav-collapse -->
				</div>     
			</nav>  
		</div>
      <!-- END MENU -->

      <!-- BEGIN SLIDER AREA-->
	    <div class="slider_area">
	        <!-- BEGIN SLIDER-->          
	        <div id="slides">
				<ul class="slides-container">
					<!-- THE FIRST SLIDE-->
					<li>
						<!-- FIRST SLIDE OVERLAY -->
						<div class="slider_overlay"></div>
						<!-- FIRST SLIDE MAIN IMAGE -->
						<img src="<?php echo base_url();?>assets/landing/img/full-slider/bc.jpg" alt="img">
					</li>
				</ul>
				<!-- BEGAIN SLIDER NAVIGATION -->
				
				<!-- FIRST SLIDE CAPTION-->
				<div class="slider_caption">
					<h2>Hire the right tutor today!</h2>
					<a href="#" aria-label="Left Align" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#hireTutorModal" class="slider_btn" id="hire_tutor_button">Hire a tutor (It's Free!)</a>
                                        <h5 class="hidden-xs"><span style="opacity: .6;">Want to become a Tutor?</span>
<a href="<?php echo base_url('landing/become_a_tutor'); ?>" style="color: #337ab7;font-weight: bold;">Sign up now</a></h5>

                                        <h5 class="visible-xs">Want to become a Tutor?</h5>
                                        <a class="visible-xs" href="<?php echo base_url('landing/become_a_tutor'); ?>" style="color: #337ab7;font-weight: bold; margin: 0 !important; padding: 0 !important;">Sign up now</a>
                                        <h4><i class="fa fa-phone"></i> 01756 441122</h4>
				</div>

				<!--<div class="featured_tutor_caption hidden-xs">
					<h2>What Tutor Says About Us</h2>
					<a href="#" class="featured_tutor_scroll"><i class="fa fa-angle-down fa-2x"></i></a>              
				</div>-->
	        </div>
			<div id="next_content_arrow" class="hidden-xs">
				<a href="#" id="next_content_arrow_scroll"><i class="fa fa-angle-down fa-2x"></i></a>
			</div>
			<!--=========== BEGAIN FEATURED TUTOR SECTION ================-->
			<!--<div id="featured_teacher_slider" class="hidden-xs">
				<div id="slider1_container">
					<div class="clients_content">
			        	<div class="row">
			                <div class="tutor_slider">
			                  <?php foreach($featured_tutors as $featured_tutor){ ?>
			                  	<div class="col-lg-3 col-md-3 col-sm-3">
									<div class="single_client">
										<img src="<?php echo base_url('assets/upload/'.$featured_tutor->profile_pic);?>" alt="clients Brand" style="width: 75px; height: 75px; float: left; margin-left: 4px;">
										<span class="col-lg-8 col-md-8 col-sm-8">
											<p><b>Name : </b><?php echo $featured_tutor->full_name; ?></p>
											
											<p><b>University : </b><?php echo $featured_tutor->uni_ins; ?></p>
											
											<p><b>Experience : </b><?php echo substr($featured_tutor->experiences, 0, 20).'...'; ?></p>
										</span>
									</div>
								</div>
			                  <?php	} ?>
			                </div>
			            </div>
		            </div>
				</div>
	   		</div>-->
	   		<!--=========== BEGAIN FEATURED TUTOR SECTION ================-->
	    </div>
      <!-- END SLIDER AREA -->
      
		<div class="modal fade" id="hireTutorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog ezCustTrans" style="margin-top: 50px !important;">
		    	<div class="modal-content" style="border-radius: 0px !important;">
		    		<div class="modal-header">
				    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h3 class="modal-title" id="myModalLabel" style="color: #0072bf;">Fill up your tutor requirements for free</h3>
				        <p style="font-size: 14px;">Fill up your tutor requirements within minutes. Over 10000+ Parents/Students have already found qualified tutors  through our platform.</p>
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
									    	<select class="form-control selstugender" name="selstgender" id="selstugender" required="required">
												<option value="">Select Student Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div>
								  	</div>
								  	
								  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								    	<!--<label class="col-sm-3 col-xs-4 hidden-xs" for="exampleInputPassword3">Name</label>-->
								    	<div class="col-sm-12 col-xs-12">
								    		<input type="text" required="required" class="form-control" name="institute_name" id="institute_name" placeholder="Institute Name">
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
								    	<select class="form-control selhear" id="selhear" name="selhear">
											<option value="0">How did you hear about us?</option>
											<option value="1">From Friends & Family</option>
											<option value="2">From Facebook</option>
											<option value="3">From Google</option>
											<option value="4">From Shop</option>
											<option value="5">Others</option>
										</select>
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
		
		<!--<div class="modal fade" id="becomeATutorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" style="margin-top: 50px !important;">
				<div class="modal-content" style="border-radius: 0px !important;">
					<div class="modal-header">
				    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h3 class="modal-title" id="myModalLabel" style="color: #0072bf;">Create a Free Account</h3>
						<hr/>
				    </div>
				    
				    <form class="form-horizontal" id="tutor_registration_form" data-link="registration/add_basic_info" method="post" role="form">
				    <div class="modal-body">
				    <div class="alert alert-danger col-xs-12 col-sm-12 col-md-12" role="alert" id="msg" style="display: none;">
				    	
				    </div>
					<input type="hidden" value="tutor" name="user_type" id="user_type" />
				    		<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
						    	<div class="col-sm-12 col-xs-12">
						    		<input type="text" required="required" class="form-control" name="full_name" id="full_name" placeholder="Name">
						    	</div>
						  	</div>
						  	
						  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
						    	<div class="col-sm-12 col-xs-12">
						    		<input type="text" required="required" class="form-control" name="mobile_no" id="mobile_no" placeholder="Phone Number">
						    	</div>
						  	</div>
						  	
						  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">	
						  		<div class="col-sm-12 col-xs-12">						    	
						    		<input type="email" class="form-control" required="required" id="email" name="email" placeholder="Please provide your email id" />
						    	</div>
						    </div>
							
							<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								<div class="col-sm-12 col-xs-12">
						    		<input type="password" class="form-control" required="required" id="tutor_password" name="password" placeholder="Enter your password" />
						    	</div>
						    </div>
							
							<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								<div class="col-sm-12 col-xs-12">
						    		<input type="password" class="form-control" required="required" id="tutor_confirm_password" placeholder="Enter your password again" />
						    	</div>
						    </div>
				    </div>
				    
				    <div class="modal-footer">
				    	<div class="col-xs-12 col-sm-12 col-md-12">
	        				<button type="submit" id="tutor_registration_continue" class="btn btn-caretutors">Continue</button>
	        				<p style="color: #666666; margin-top: 3px;">By Signing up, you agree to our <a target="_blank" href="<?php echo base_url('landing/terms_and_conditins'); ?>">Terms of Use and Privacy Policy</a></p>
        				</div>
      				</div>
      				</form>
				</div>
			</div>
		</div>-->
    </header>
    <!--=========== End HEADER SECTION ================--> 
    
    <!--=========== BEGAIN FEATURED TUTOR SECTION MOBILE================-->
    <!--<section id="clients" class="visible-xs">
      <div class="container">
        <div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
            	<div class="heading">
              		<p style="text-align: center"> Our Featured Tutors </p>
            	</div>
          	</div>
          	<div class="col-lg-12 col-md-12 col-sm-12">
            	<div class="clients_content">
	              	<div class="row">
	                	<div class="clients_slider autoplay">
	                  	<?php foreach($featured_tutors as $featured_tutor){ ?>
	                  		<div class="col-lg-3 col-md-3 col-sm-3">
								<div class="single_client">
									<img src="<?php echo base_url('assets/upload/'.$featured_tutor->profile_pic);?>" alt="clients Brand" style="width: 75px; height: 75px; float: left; margin-left: 4px;">
									<span class="col-lg-8 col-md-8 col-sm-8">
										<p><b>Name : </b><?php echo $featured_tutor->full_name; ?></p>
										
										<p><b>University : </b><?php echo $featured_tutor->uni_ins; ?></p>
										
										<p><b>Experience : </b><?php echo substr($featured_tutor->experiences, 0, 20).'...'; ?></p>
									</span>
								</div>
							</div>
	                  <?php	} ?>
	                	</div>
	              	</div>
            	</div>
          	</div>
        	</div>
      	</div>
    </section>-->
    <!--=========== END FEATURED TUTOR SECTION MOBILE================-->
	
	<!--=========== BEGAIN TESTIMONIAL SECTION ================-->
    <section id="testimonial">
      <div class="container"> 
        <div class="row">
			<div class="heading">
<p class="heading_p">What some awesome tutor says about us</p>
			</div>

	        <div class="testimonial_customer_column col-lg-7 col-md-7 col-sm-7">
          		<div class="testimonial_customer">
	            	<!-- BEGAIN TESTIMONIAL SLIDER -->
	              	<ul class="testimonial_slider">
                		<?php  foreach($testimonials as $testimonial){
              				 if($testimonial['commentator_flag'] == 'tutor'){
              				 
              				 ?>
              				<li>
	                  			<div class="testi_content">
	                  				<div>
	                  					<div class="media testi_media">
						                    <span class="media-left testi_img">
						                      	<img src="<?php echo base_url('assets/upload/testimonial_user_image/60x60/'.$testimonial['commentator_image']); ?>" alt="img">
						                    </span>
						                    <div class="media-body">
						                      <p class="ft-wt-500"><?php echo $testimonial['name'];?></p>
						                      <p class="mt-5"><?php echo $testimonial['designation'];?></p>                      
						                    </div>
						                </div>
		                  				<p class="mt-5">
		                  					<?php echo $testimonial['comment'];?>
		                  				</p>
	                  				</div>
	                  			</div>
	                		</li>
              			<?php } } ?>
              		</ul>
            	</div>
          	</div>
          	
          	<div class="testimonial_customer_column col-lg-5 col-md-5 col-sm-5">
            <!-- START BLOG HEADING -->
	            <div class="heading">
	            	<p class="parent_tutor_registration_text">Hire the right tutor Today</p>
	            	<p class="random_text">Over 10000+ students/parents find their tutors</p>
              	<a aria-label="Left Align" style="cursor: pointer;" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#hireTutorModal" class="parent_tutor_registration_button">Hire the right tutor (its free)</a>
	            </div>
          	</div>          
        </div>
      </div>
    </section>
    <!--=========== END TESTIMONIAL SECTION ================-->
	<!--=========== BEGIN SERVICE SECTION ================-->
    <section id="service">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- BEGAIN SERVICE HEADING -->
            <div class="heading">
              <!--<h2 class="wow fadeInLeftBig"></h2>-->
              <p class="heading_p">How it works for students / parents</p>
            </div>
          </div>          
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- BEGAIN SERVICE  -->
            <div class="service_area">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <!-- BEGAIN SINGLE SERVICE -->
                  <div class="single_service wow fadeInLeft">
                    <div class="service_iconarea">
                      <span class="fa fa-file-text-o service_icon"></span>
                    </div>
                    <h3 class="service_title">Post your Tutor requirements</h3>
                    <p>Post your Tutor requirements. Our system will analyze it and find tutor whose expertise will strongly match your demand. </p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <!-- BEGAIN SINGLE SERVICE -->
                  <div class="single_service wow fadeInRight">
                    <div class="service_iconarea">
                      <span class="fa fa-files-o service_icon"></span>
                    </div>
                    <h3 class="service_title">Get the maximum 5 best tutor CVs</h3>
                    <p>You'll receive the 5 best CV's in your INBOX and EMAIL according to your Tutor requirements.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <!-- BEGAIN SINGLE SERVICE -->
                  <div class="single_service wow fadeInLeft">
                    <div class="service_iconarea">
                      <span class="fa fa-graduation-cap service_icon"></span>
                    </div>
                    <h3 class="service_title">Select the best one and Start Learning</h3>
                    <p>Choose the best one among the 5 CV's. Offer the selected Tutor for few trial classes before taking the regular classes. Give us your feedback and start Learning.</p>
                  </div>
                </div>          	   
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END SERVICE SECTION ================-->

    <!--=========== BEGAIN TESTIMONIAL SECTION ================-->
    <section id="testimonial">
      <div class="container"> 
        <div class="row">
        	<div class="heading">
              <!--<h2 class="wow fadeInLeftBig">Satisfied Parents</h2>-->
              <p class="heading_p">What student / parent says about us</p>
            </div>
          
          	<div class="testimonial_customer_column col-lg-7 col-md-7 col-sm-7">
          		<div class="testimonial_customer">
              		<ul class="testimonial_slider">
              			<?php  foreach($testimonials as $testimonial){
              				 if($testimonial['commentator_flag'] == 'parent'){
              				 
              				 ?>
              				<li>
	                  			<div class="testi_content">
	                  				<div>
	                  					<div class="media testi_media">
						                    <span class="media-left testi_img">
						                      	<img src="<?php echo base_url('assets/upload/testimonial_user_image/60x60/'.$testimonial['commentator_image']); ?>" alt="img">
						                    </span>
						                    <div class="media-body">
						                      <p class="ft-wt-500"><?php echo $testimonial['name'];?></p>
						                      <p class="mt-5"><?php echo $testimonial['designation'];?></p>                      
						                    </div>
						                </div>
		                  				<p class="mt-5">
		                  					<?php echo $testimonial['comment'];?>
		                  				</p>
	                  				</div>
	                  			</div>
	                		</li>
              			<?php } } ?>
              		</ul>
            	</div>
          	</div>  
            
          <div class="testimonial_customer_column col-lg-5 col-md-5 col-sm-5">
            <!-- START BLOG HEADING -->
            <div class="heading">
            	<p class="parent_tutor_registration_text">Become a tutor and start earning!</p>
            	<p class="random_text">Around 13000+ tutors got tuition jobs</p>
	              	<a href="<?php echo base_url('landing/become_a_tutor'); ?>" class="parent_tutor_registration_button">Become a tutor</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END TESTIMONIAL SECTION ================-->
	
	<!--=========== BEGIN SERVICE SECTION ================-->
<section id="service">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- BEGAIN SERVICE HEADING -->
            <div class="heading">
              <!--<h2 class="wow fadeInLeftBig"></h2>-->
              <p class="heading_p">How it works for tutors</p>
            </div>
          </div>          
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- BEGAIN SERVICE  -->
            <div class="service_area">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <!-- BEGAIN SINGLE SERVICE -->
                  <div class="single_service wow fadeInLeft">
                    <div class="service_iconarea">
                      <span class="fa fa-user service_icon"></span>
                    </div>
                    <h3 class="service_title">Create a free Account</h3>
                    <p>Make your profile in minutes. Add your preferred locations, classes/courses, expected salary and more.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <!-- BEGAIN SINGLE SERVICE -->
                  <div class="single_service wow fadeInRight">
                    <div class="service_iconarea">
                      <span class="fa fa-envelope-o service_icon"></span>
                    </div>
                    <h3 class="service_title">Get free tutoring job alerts</h3>
                    <p>Get updated tutoring jobs alerts via SMS, Email whenever new jobs are posted.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <!-- BEGAIN SINGLE SERVICE -->
                  <div class="single_service wow fadeInLeft">
                    <div class="service_iconarea">
                      <span class="fa fa-files-o service_icon"></span>
                    </div>
                    <h3 class="service_title">Apply to your desired job</h3>
                    <p>Apply to your preferred tutoring jobs that match your skills and get selected by the students/parents.</p>
                  </div>
                </div>             
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--=========== END SERVICE SECTION ================-->
	<?php echo $footer; ?>
	<script type="text/javascript" language="javascript">



// Wire up the events as soon as the DOM tree is ready
$(document).ready(function() {

}); 
</script> 