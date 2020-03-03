<?php echo $header;?>
<body> 
    <!-- SCROLL TOP BUTTON -->
    <!--<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>-->
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <?php $this->load->view('frontend_menu'); ?>

    <!--=========== End HEADER SECTION ================--> 

    <!--=========== BEGAIN BLOG SECTION ================-->

	<section class="signup-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="signup-header text-center">
                        <h1>Let's get started!</h1>
                    </div>
                </div>
            </div>
            <div class="row">
               <div class="col-md-2">
                   
               </div>

                <div class="col-md-4">
                    <div class="signup-content text-center">
                        <img class="inactive-student-parent" src="images/ttnormal.png" alt="">
                        <img class="active-image-parent" src="images/tt_active.png" alt="">
                        <h4>Tutors</h4>
                        <p>Find tuition jobs, build your teaching career, teach online courses</p>
						
                        <a href="<?php echo base_url('landing/become_a_tutor'); ?>"><button type="button" class="btn gerat-teacher-btn">Sign up</button></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="signup-content text-center">
                        <img class="inactive-student-parent" src="images/center_normal.png" alt="">
                        <img class="active-image-parent" src="images/center_active.png" alt="">
                        <h4>Students & Parents</h4>
                        <p>Find tuition jobs, build your teaching career, teach online courses</p>
                        <a href="<?php echo base_url('landing/hire_a_tutor'); ?>"><button type="button" class="btn gerat-teacher-btn">Sign up</button></a>
                    </div>
                </div>
                <div class="col-md-2">
                   
               </div>
            </div>
        </div>
    </section>
	<!-- <section id="blog" style="padding-bottom: 400px!important;">
      	<div class="container-fluid">
      		<div class="row">
      			<div class="col-lg-3 col-sm-3 col-md-3"></div>
          		<div class="col-md-6 col-lg-6 col-sm-6">
          			<div class="well doc_search_form_container" style="margin: 0px; border: none !important; box-shadow: none !important; padding: 70px 0 40px 0;">
          				<p class="text-center page_title">Sign Up</p>

          				

				    	
					    <div class="col-xs-12 col-sm-12 col-md-12 input_margin_mobile">

					    	<div class="form-group" style=" margin-right: -15px; margin-left: -15px; text-align: center;">
					    		<div class="row">
						    		<div class="col-xs-12 col-sm-12 col-md-6">
						    			<a href="<?php echo base_url('landing/hire_a_tutor'); ?>" class="btn btn-caretutors" style="line-height: 50px;">Hire A Tutor</a>
						    		</div>
							    	<div class="col-xs-12 col-sm-12 col-md-6">
							    		<a href="<?php echo base_url('landing/become_a_tutor'); ?>" class="btn btn-caretutors" style="line-height: 50px;">Become A Tutor</a>
							    	</div>
		        				</div>
	        				</div>
	      				</div>
      				
          			</div>
          		</div>
         	</div>
      	</div>
	</section> -->
	<!-- <div class="modal fade" id="hireTutorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
								    	
								    	<div class="col-sm-12 col-xs-12">
									    	<select class="form-control sellocation" name="sellocation" id="sellocation" required="required" >
												<option>Select Location</option>
											</select>
										</div>
								  	</div>
							  	
								  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								    	
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
								    	
								    	<div class="col-sm-12 col-xs-12">
									    	<select class="form-control selsubcat" name="selsubcat" id="selsubcat" required="required">
												<option>Select Class/Course</option>
											</select>
										</div>
								  	</div>
								  	
								  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								    	
								    	<div class="col-sm-12 col-xs-12">
									    	<select class="form-control selstgender" name="selstugender" id="selstugender" required="required">
												<option value="">Select Student Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div>
								  	</div>
							  	
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
		</div> -->
    <!--=========== END BLOG SECTION ================-->
	<?php echo $footer;?>