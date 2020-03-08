<?php echo $header;?>
<body>
    <!-- SCROLL TOP BUTTON -->
    <!--<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>-->
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <?php $this->load->view('frontend_menu'); ?>

    <!--=========== End HEADER SECTION ================-->

    <!--=========== BEGAIN BLOG SECTION ================-->
	<section id="blog">
      	<div class="container-fluid">
      		<div class="row">
      			<div class="col-lg-3 col-sm-3 col-md-3"></div>
          		<div class="col-md-6 col-lg-6 col-sm-6">
          			<div class="well doc_search_form_container" style="margin: 0px; border: none !important; box-shadow: none !important; padding: 70px 0 40px 0;">
          				<p class="text-center page_title">Fill up your tutor requirements for free</p>

          				<p class="text-center" style="margin-bottom: 45px !important; color: #1f2c44;">Fill up your tutor requirements within minutes. Over <?php echo $stat->total_jobs ?> Parents/Students have already found qualified tutors through our platform.</p>

          				<form class=" parent_registration_form" id="parent_registration_form" name="parent_registration_form" data-link="registration/parents_registration_frontend" method="post" role="form" >

								<input type="hidden" value="1" name="step" id="step" />
								<input type="hidden" value="guardian" name="user_type" id="user_type" />

				    		<div id="parent_registration_form_first_part">
				    			<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">

								    	<div class="form-group">
								    		<label for="selcity">Select City</label>
								    		<div class="select_label">
									    		<select class="form-control selcity" name="selcity" id="selcity" required="required">
									    			<option value="">Select One</option>
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
								  	</div>
								  	<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">

								    	<div class="form-group">
								    		<label for="sellocation">Select Location</label>
								    		<div class="select_label">
										    	<select class="form-control sellocation" name="sellocation" id="sellocation" required="required" >
													<option>Select Location</option>
												</select>
											</div>
										</div>
								  	</div>

								  	<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">
								    	<div class="form-group">
								    		<label for="selcat">Select Category</label>
								    		<div class="select_label">
										    	<select class="form-control selcat" name="selcat" id="selcat" required="required">
										    		<option value="">Select One</option>
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
								  	</div>
								  	<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">
								    	<div class="form-group">
								    		<label for="selsubcat">Select Class/Course</label>
								    		<div class="select_label">
										    	<select class="form-control selsubcat" name="selsubcat" id="selsubcat" required="required">
													<option>Select Class/Course</option>
												</select>
											</div>
										</div>
								  	</div>

								  	<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">
								    	<div class="form-group">
								    		<label for="selstugender">Select Student Gender</label>
								    		<div class="select_label">
										    	<select class="form-control selstgender" name="selstgender" id="selstugender" required="required">
													<option value="">Select Student Gender</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div>
								  	</div>

								  	<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">
								    	<div class="form-group">
								    		<label for="institute_name">Institute Name</label>
								    		<input type="text" required="required" class="form-control" name="institute_name" id="institute_name" placeholder="Institute Name">
								    	</div>
								  	</div>

								  	<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">
								    	<div class="form-group">
								    		<label for="full_name">Name</label>
								    		<input type="text" required="required" class="form-control" name="full_name" id="full_name" placeholder="Your Name">
								    	</div>
								  	</div>
								  	<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">
								    	<div class="form-group">
								    		<label for="mobile_no">Phone Number</label>
								    		<input type="number" required="required" class="form-control" name="mobile_no" id="mobile_no" placeholder="Eg. 0164...">
								    	</div>
								  	</div>
							  	</div>
						  	</div>
						  	<div id="parent_registration_form_second_part" style="display: none;">
						  		<div class="row">
						  			<fieldset id="subject_show" class="input_margin_bottom">

						  			</fieldset>
						  			<br />
									<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">
										<div class="form-group">
											<label for="selgender">Tutor gender reference</label>
											<div class="select_label">
										    	<select class="form-control selgender" id="selgender" name="selgender">
													<option value="">Tutor gender reference</option>
													<option value="Any">Any</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div>
								  	</div>
								  	<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">								    	<div class="form-group">
											<label for="days_in_week">Days in a week</label>
											<div class="select_label">
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
										</div>
								  	</div>

									<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">
										<div class="form-group">
											<label for="salary_range">Salary</label>
									    	<input type="number" class="form-control" id="salary_range" name="salary" placeholder="Salary">
									    </div>
								  	</div>
								  	<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">
									  	<div class="form-group">
									  		<label for="date_to_hire">When Are You Looking To Hire</label>
									    	<!-- <div class="date" id="datePicker">
									            <div class="input-group input-append date">
									                <input type="text" class="form-control" id="date_to_hire" readonly="readonly" name="date_to_hire" placeholder="When are you looking to hire" />
									                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									            </div>
									        </div> -->
									        <input type="date" class="form-control" id="date_to_hire" name="date_to_hire" placeholder="When are you looking to hire" />
								        </div>
								  	</div>

									<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile" id="skype_id_div" style="display: none;">
										<div class="form-group">
									  		<label for="skype_id">Skype Id</label>
											<input type="text" class="form-control" id="skype_id" name="skype_id" placeholder="Please provide your Skype ID/Google Hangout ID">
										</div>
	  								</div>

	  								<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">
	  									<div class="form-group">
									  		<label for="detail_address">Address</label>
								    		<input type="text" class="form-control" id="detail_address" name="address" placeholder="Details address">
								    	</div>
								    </div>

								    <div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">								    	<div class="form-group">
									  		<label for="no_of_student">No. of student</label>
									  		<div class="select_label">
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
										</div>
								  	</div>

                                    <div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">
	  									<div class="form-group">
									  		<label for="tutoring_time">Tutoring Time</label>
								    		<input type="text" class="form-control timepicker" id="tutoring_time" name="tutoring_time" placeholder="Tutoring Time">
								    	</div>
								    </div>

								    <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom input_margin_mobile">								    	<div class="form-group">
									  		<label for="more_about_requirements">Requirements</label>
								    		<textarea class="form-control" id="more_about_requirements" name="otherreq" rows="5" placeholder="Please tell us a bit more about your  requirement to help us match better"></textarea>
								    	</div>
								    </div>

									 <div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">					<div class="form-group">
									  		<label for="selhear">How Did You Hear About Us?</label>
									  		<div class="select_label">
										    	<select class="form-control selhear" id="selhear" name="selhear">
													<option value="0">How did you hear about us?</option>
													<option value="1">From Friends & Family</option>
													<option value="2">From Facebook</option>
													<option value="3">From Google</option>
													<option value="4">From Shop</option>
													<option value="5">Others</option>
												</select>
											</div>
										</div>
								  	</div>

									<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">							<div class="form-group">
									  		<label for="email">Email Address</label>
								    		<input type="email" class="form-control" required="required" id="email" name="email" placeholder="Write your email ID" />
								    	</div>
								    </div>

									<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">
										<div class="form-group">
									  		<label for="password">Password</label>
								    		<input type="password" class="form-control" required="required" id="password" name="password" placeholder="Enter your password" />
								    	</div>
								    </div>

									<div class="col-xs-12 col-sm-12 col-md-6 input_margin_bottom input_margin_mobile">
										<div class="form-group">
									  		<label for="confirm_password">Retype Password</label>
								    		<input type="password" class="form-control" required="required" id="confirm_password" placeholder="Enter your password again" />
								    	</div>
								    </div>
						  		</div>
						  	</div>

					    <div class="col-xs-12 col-sm-12 col-md-12 input_margin_mobile">

					    	<div class="form-group" style=" margin-right: -15px; margin-left: -15px; text-align: center;">
					    		<div class="row">
						    		<div class="col-xs-12 col-sm-12 col-md-5">
						    			<button type="button" class="btn btn-back " id="back_to_first_form" style="display: none;">Back</button>
						    		</div>
							    	<div class="col-xs-12 col-sm-12 col-md-12">
							    		<button type="submit" name="submit_first" class="btn btn-caretutors parent_registration_form_first_part_submit " id="submit_first">Continue</button>
							    	</div>
			        				<div class="col-xs-12 col-sm-12 col-md-12">
			        					<p style="margin-top: 7px!important;">By Signing up, you agree to our <a target="_blank" href="<?php echo base_url('landing/terms_and_conditions'); ?>">Terms of Use and Privacy Policy</a></p>
			        				</div>
		        				</div>
	        				</div>
	      				</div>
      				</form>
          			</div>
          		</div>
         	</div>
      	</div>
	</section>
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
