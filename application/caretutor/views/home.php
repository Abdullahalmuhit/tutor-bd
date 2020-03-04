<?php echo $header; ?>
 
  <body>


	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T939DFN"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

    <!-- SCROLL TOP BUTTON -->
    <!--<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
 <!--Header area start-->

    <header class="header-area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light  ">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                    <!--<h4>BDTutor</h4>-->
                   <img src="<?php echo base_url();?>assets/img/caretutor_logo.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto main-nav">
                        <li class="nav-item active">
                            
							<a class="nav-link"  href="<?php echo base_url(); ?>"> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('landing/job_board'); ?>">job Board</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about-us.html">About us</a>
                        </li>
                        <li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>landing/become_a_tutor" id="become_a_tutor" >Become A Tutor</a>
                           
                        </li>
                    </ul>
                    <ul class="navbar my-2 my-lg-0 main-nav">
                        <li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('landing/signup'); ?>">Sign Up</a>   
                        </li>
                        <li class="nav-item">
                            <a class="nav-link help-icon" onclick="openNav()" href="#"><i class="fas fa-question-circle"></i></a>
                        </li>
						 
                        <li class="nav-item">
                            <a class="nav-link signin-p" href="<?php echo base_url().'signin'; ?>"><i class="fas fa-sign-in-alt"></i>sign in</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!--Header area End-->
     
		<div class="modal fade" id="hireTutorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog ezCustTrans" style="margin-top: 50px !important;">
		    	<div class="modal-content">
		    		<div class="modal-header">
				    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h3 class="modal-title" id="myModalLabel">Fill up your tutor requirements for free</h3>
				        <p class="text-center" style="margin-bottom: 45px !important; color: #1f2c44;">Fill up your tutor requirements within minutes. Over 10000+ Parents/Students have already found qualified tutors  through our platform.</p>

				    </div>
				    <form class="parent_registration_form" id="parent_registration_form" data-link="registration/parents_registration_frontend" method="post" role="form">
					<input type="hidden" value="1" name="step" id="step" />
					<input type="hidden" value="guardian" name="user_type" id="user_type" />
				    	<div class="modal-body">
				    		<div id="parent_registration_form_first_part">
				    			<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6">
								    	<div class="form-group">
								    		<label for="selcity">Select City</label>
								    		<div class="select_label">
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
								  	</div>
								  	<div class="col-xs-12 col-sm-12 col-md-6">
								    	<div class="form-group">
								    		<label for="sellocation">Select Location</label>
								    		<div class="select_label">
										    	<select class="form-control sellocation" name="sellocation" id="sellocation" required="required" >
													<option>Select Location</option>
												</select>
											</div>
										</div>
								  	</div>

								  	<div class="col-xs-12 col-sm-12 col-md-6">
								    	<div class="form-group">
								    		<label for="selcat">Select Category</label>
								    		<div class="select_label">
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
								  	</div>
								  	<div class="col-xs-12 col-sm-12 col-md-6">
								    	<div class="form-group">
								    		<label for="selsubcat">Select Class/Course</label>
								    		<div class="select_label">
										    	<select class="form-control selsubcat" name="selsubcat" id="selsubcat" required="required">
													<option>Select Class/Course</option>
												</select>
											</div>
										</div>
								  	</div>

								  	<div class="col-xs-12 col-sm-12 col-md-6">
								    	<div class="form-group">
								    		<label for="selstugender">Select Student Gender</label>
								    		<div class="select_label">
										    	<select class="form-control selstugender" name="selstgender" id="selstugender" required="required">
													<option value="">Select Student Gender</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div>
								  	</div>

								  	<div class="col-xs-12 col-sm-12 col-md-6">
								    	<div class="form-group">
								    		<label for="institute_name">Institute Name</label>
								    		<input type="text" required="required" class="form-control" name="institute_name" id="institute_name" placeholder="Institute Name">
								    	</div>
								  	</div>

								  	<div class="col-xs-12 col-sm-12 col-md-6">
								    	<div class="form-group">
								    		<label for="full_name">Name</label>
								    		<input type="text" required="required" class="form-control" name="full_name" id="full_name" placeholder="Name">
								    	</div>
								  	</div>
								  	<div class="col-xs-12 col-sm-12 col-md-6">
								    	<div class="form-group">
								    		<label for="mobile_no">Phone Number</label>
								    		<input type="text" required="required" class="form-control" name="mobile_no" id="mobile_no" placeholder="Eg. 0164...">
								    	</div>
								  	</div>
							  	</div>
						  	</div>
						  	<div id="parent_registration_form_second_part" style="display: none;">
						  		<div class="row" >
						  			<fieldset id="subject_show" class="input_margin_bottom">

						  			</fieldset>

									<div class="col-xs-12 col-sm-12 col-md-6">
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
								  	<div class="col-xs-12 col-sm-12 col-md-6">
									  	<div class="form-group">
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

									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label for="salary_range">Salary</label>
								    		<input type="number" class="form-control" id="salary_range" name="salary" placeholder="Salary">
								    	</div>
								  	</div>
								  	<div class="col-xs-12 col-sm-12 col-md-6">
								  		<div class="form-group">
									  		<label for="date_to_hire">When Are You Looking To Hire</label>
									    	<div class="date" id="datePicker">
									            <div class="input-group input-append date">
									                <input type="text" class="form-control" id="date_to_hire" readonly="readonly" name="date_to_hire" placeholder="When are you looking to hire" />
									                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									            </div>
									        </div>
								        </div>
								  	</div>

									<div class="col-xs-12 col-sm-12 col-md-6" id="skype_id_div" style="display: none;">
										<div class="form-group">
									  		<label for="skype_id">Skype Id</label>
											<input type="text" class="form-control" id="skype_id" name="skype_id" placeholder="Please provide your Skype ID/Google Hangout ID">
										</div>
	  								</div>

	  								<div class="col-xs-12 col-sm-12 col-md-6">
								    	<div class="form-group">
									  		<label for="detail_address">Address</label>
								    		<input type="text" class="form-control" id="detail_address" name="address" placeholder="Detail address">
								    	</div>
								    </div>

								    <div class="col-xs-12 col-sm-12 col-md-6">
								     	<div class="form-group">
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

								    <div class="col-xs-12 col-sm-12 col-md-12">
								    	<div class="form-group">
									  		<label for="more_about_requirements">Requirements</label>
								    		<textarea class="form-control" id="more_about_requirements" name="otherreq" rows="5" placeholder="Please tell us a bit more about your  requirement to help us match better"></textarea>
								    	</div>
								    </div>

								    <div class="col-xs-12 col-sm-12 col-md-6">
									    <div class="form-group">
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

									<div class="col-xs-12 col-sm-12 col-md-6 ">
								    	<div class="form-group">
									  		<label for="email">Email Address</label>
								    		<input type="email" class="form-control" required="required" id="email" name="email" placeholder="Write your email ID" />
								    	</div>
								    </div>

									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
									  		<label for="password">Password</label>
								    		<input type="password" class="form-control" required="required" id="password" name="password" placeholder="Enter your password" />
								    	</div>
								    </div>

									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
									  		<label for="confirm_password">Retype Password</label>
								    		<input type="password" class="form-control" required="required" id="confirm_password" placeholder="Enter your password again" />
								    	</div>
								    </div>
						  		</div>
						  	</div>
				    	</div>
					    <div class="modal-footer">
						    <div class="row">
		                    	<div class="col-xs-12 col-sm-12 col-md-5">
							    	<button type="button" class="btn btn-back" id="back_to_first_form" style="display: none;">Back</button>
			        			</div>
			        			<div class="col-xs-12 col-sm-12 col-md-12">
			        				<button type="submit" name="submit_first" class="btn btn-caretutors parent_registration_form_first_part_submit" id="submit_first">Continue</button>
			        			</div>
			        			<div class="col-xs-12 col-sm-12 col-md-12">
			        				<p style="margin-top: 7px!important; text-align: center;">By Signing up, you agree to our <a target="_blank" href="<?php echo base_url('landing/terms_and_conditions'); ?>">Terms of Use and Privacy Policy</a></p>
		        				</div>
	        				</div>
	      				</div>
      				</form>
		    	</div>
		  	</div>
		</div>
      <!-- END MENU -->
      
       <!----Header sidenav Area Start----->

    <div class="sidenav">
        <div id="mySidenav" class="sidenav">

            <div class="sidenav-header">
                <div class="row">
                    <div class="col-sm-4">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="col-sm-4">
                        <p>Help Center</p>
                    </div>
                    <div class="col-sm-4">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    </div>
                </div>
            </div>
            <div class="help-content text-center">
                <div class="row">
                    <div class="col-md-4">
                        <a href="#">
                            <i class="fas fa-info-circle"></i>
                            <p>Help Center</p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <i class="far fa-newspaper"></i>
                            <p>Aritical</p>
                        </a>

                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <i class="fas fa-id-card"></i>
                            <p>Contact</p>
                        </a>

                    </div>
                </div>
            </div>
            <div class="aritical-suggetion">
                <div class="row">
                    <div class="col-sm-12">
                        <span>Suggested articles</span>
                        <p>Requesting transfer of funds among tutors</p>
                        <p>Requesting transfer of funds among tutors</p>
                        <p>Requesting transfer of funds among tutors</p>
                    </div>
                </div>

            </div>
            <div class="help-faq">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Help BdTutor?</h5>
                        <div class="bs-example">
                            <div class="accordion" id="accordionExample">
                                <div class="card sidenav-card">
                                    <div class="card-header sidenav-card-header" id="newUser">

                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus"></i>New in Bdtutors?</button>

                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="newUser" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p><a href="#">Register as a Student</a></p>
                                            <p><a href="#">Rules Violation and Penalties</a></p>
                                            <p><a href="#">How to Contact BDTutor</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card sidenav-card">
                                    <div class="card-header sidenav-card-header" id="studentHelp">

                                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"><i class="fa fa-plus"></i>Tutor Help</button>

                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="studentHelp" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p><a href="#">Registration and Rules</a></p>
                                            <p><a href="#How to Find students"></a></p>
                                            <p><a href="#">Profile</a></p>
                                            <p><a href="#">Calender</a></p>
                                            <p><a href="#">My Request</a></p>
                                            <p><a href="#">Money Withdrawals</a></p>
                                            <p><a href="#">Setting</a></p>
                                            <p><a href="#">Tutor profile Guidelines</a></p>
                                            <p><a href="#">Top tips foe tutor</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card sidenav-card">
                                    <div class="card-header sidenav-card-header" id="teacherHelp">

                                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"><i class="fa fa-plus"></i>Student Help</button>

                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="teacherHelp" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p><a href="">Registration</a></p>
                                            <p><a href="">Profile Setting</a></p>
                                            <p><a href="">How to find a tutor</a></p>
                                            <p><a href="#">How to know if tutor is good?</a></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!----Header sidenav Area End----->
     
     
	
     <!----Banner  Area Start----->

    <section class="slider-area">
        <div id="mainslider">
            <div class="swiper-wrapper">
                <div class="single-item swiper-slide overlay dark-1"><img alt="Slider Image" src="<?php echo base_url();?>assets/landing/img/full-slider/bc.jpg" />
                    <div class="slider-caption text-center">
                        <div class="container">
                            <h1 class=" rt-effect-height delay-2">BEST PRIVATE ONLINE TUTORS</h1>

                            <p class="mb-25 hidden-xs hidden-sm rt-effect delay-3">A proven alternative to one to one home tuition</p>

                            <div class=" rt-effect-btn rt-effect delay-4"><a class="btn slider-hire-btn" href="<?php echo base_url('landing/hire_a_tutor'); ?>">Hire a tutor</a></div>
                        </div>
                        <!-- /.container -->
                    </div>
                </div>
                <!-- /.Item End -->

                <div class="single-item swiper-slide overlay dark-1"><img alt="Slider Image" src="<?php echo base_url();?>assets/landing/img/full-slider/bc_medium.jpg" />
                    <div class="slider-caption text-center">
                        <div class="container">
                            <h1 class="rt-effect-height delay-2">LIVE TUITION&nbsp;CLASSES</h1>

                            <p class="mb-25 hidden-xs hidden-sm rt-effect delay-3">A complete solution for one to one tutoring</p>

                            <div class="rt-effect-btn rt-effect delay-4"><a class="btn slider-hire-btn" href="<?php echo base_url(); ?>landing/become_a_tutor">Become a tutor</a></div>
                        </div>
                        <!-- /.container -->
                    </div>
                </div>
                <!-- /.Item End -->
                
            </div>
            <!-- Add Arrows -->

            <div class="swiper-next swiper-arrow swiper-right-arrow"><i class="fas fa-angle-right"></i></div>

            <div class="swiper-prev swiper-arrow swiper-left-arrow"><i class="fas fa-chevron-left"></i></div>
        </div>
    </section>

    <!----Banner  Area End----->
    
    
    
         <!----How It Works Area Start----->

         <section class="How-it-works-area" id="home-video">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 no-padding">
                    <div class="col-xs-6 col-md-6 float-left percent-50">
                        <div class="section-title how-works-title">
                            <h4 class="">How It Works for Student & Parents?</h4>


                        </div>

                        <div class="how-it-works-steps">
                            <ul>
                                <li>
                                    <div class="how-it-works-icon">1</div>

                                    <div class="how-it-works-details">
                                        <h4>STEP 1</h4>

                                        <p>Identify your child&#39;s tutoring and mentoring needs. Review listed teacher profiles.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="how-it-works-icon">2</div>

                                    <div class="how-it-works-details">
                                        <h4>STEP 2</h4>

                                        <p>Discuss your specific needs with us including assistance to find the best online tutor for your child.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="how-it-works-icon">3</div>

                                    <div class="how-it-works-details">
                                        <h4>STEP 3</h4>

                                        <p>Book a free demo .Make sure to use&nbsp;a good quality internet connection.</p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-xs-6 col-md-6 float-left percent-50">
                        <div class=" slide" id="media">
                            <div class="">
                                <div class="item  active">
                                    <div class="row">
                                        <div class="col-md-12 video-item"><a class="thumbnail" href="#">
                                                <video controls="" height="450" poster="images/video-poster.png" preload="none" width="100%">
                                                    <source src="https://www.youtube.com/watch?v=LXb3EKWsInQ" type="video/mp4" /> Your browser does not support the video tag.</video>
                                            </a></div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
      
      
 <!----How It Works Area End----->
    
    
     <!----student/parents Testimonial Area Start----->
    <div id="pagewrap">
        <section class="clientsay " style="background-image:url('assets/landing/img/testimonial-bg.jpg'); background-repeat:no-repeat; background-position: center top; background-size:cover; background-attachment:fixed;">
            <div class="container">
                <div class="wow fadeInUpBig" data-wow-duration="1s">

                    <div class="testimonial-left section-title">
                        <h1>Students / Parents Say?</h1>
                        <p>Praesent ornare, mi in porta iaculis, lectus mi ultrices commdolor neque vel massa. Donec sede tortor sodales, tincidunt lPr ornare, mi in porta iaculis, lectus mi ultrices est.</p>

                    </div>
                    <div class="testimonial-right">
                        <div id="clienttestiminials">
                            <div class="owl-carousel">
                                    <?php  foreach($testimonials as $testimonial){
              				 if($testimonial['commentator_flag'] == 'tutor'){

              				 ?>
                                <div class="item">
                                    <div class="item-slide">
                                        <div class="tmthumb">
                                            <img src="<?php echo base_url('assets/upload/testimonial_user_image/60x60/'.$testimonial['commentator_image']); ?>" alt="img">
                                        </div>
                                        <div class="tmdesc">
                                            <div class="tmtitle">
                                                <h3><a href="#"><?php echo $testimonial['name'];?></a></h3>
                                                <span><?php echo $testimonial['designation'];?></span>
                                            </div>
                                            <p>"<?php echo $testimonial['comment'];?></p>

                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                              
                               <?php } } ?>
                             
                           
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div><!-- .end section class -->
                <div class="clear"></div>
            </div><!-- container -->
        </section>
    </div>

    <!----student/parents Testimonial Area End----->
     

	     <!----Popular Category Area Start----->

    <section class="popular-category-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="popular-category-header text-center section-title">
                        <h4>Popular Categories</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 home-subject-mob">
                    <div class="subject-bg-wrap home-subject-1 default-width"><a href="#"><img class="img-fluid" src="<?php echo base_url('assets/landing/img/category/category_1.jpg'); ?>" alt="Bangla-English-Medium"> </a>
                        <div class="subject-bg-tag home-subject-1">Subject</div>
                        <div class="subject-bg-course"><i class="fas fa-language"></i>
                            <h5>Bangla & English Medium</h5>
                        </div>
                        <div class="subject-bg-hover"><span><i class="fas fa-language"></i></span>
                            <h4><a href="#">Bangla & English Medium</a></h4>
                            <div class="subject-bg-view-more"><a href="<?php echo base_url('landing/hire_a_tutor'); ?>">Hire a tutor</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 home-subject-mob">
                    <div class="subject-bg-wrap home-subject-1 default-width"><a href="#"><img class="img-fluid" src="<?php echo base_url('assets/landing/img/category/category_2.jpg'); ?>" alt="Bangla-English-Medium"> </a>
                        <div class="subject-bg-tag home-subject-1">Subject</div>
                        <div class="subject-bg-course"><i class="fas fa-book-reader"></i>
                            <h5>Language Learning</h5>
                        </div>
                        <div class="subject-bg-hover"><span><i class="fas fa-book-reader"></i></span>
                            <h4><a href="#">Language Learning</a></h4>
                            <div class="subject-bg-view-more"><a href="<?php echo base_url('landing/hire_a_tutor'); ?>">Hire a tutor</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 home-subject-mob">
                    <div class="subject-bg-wrap home-subject-1 default-width"><a href="#"><img class="img-fluid" src="<?php echo base_url('assets/landing/img/category/category_3.jpg'); ?>" alt="Bangla-English-Medium"> </a>
                        <div class="subject-bg-tag home-subject-1">Subject</div>
                        <div class="subject-bg-course"><i class="far fa-window-restore"></i>
                            <h5>Professional Skill Development</h5>
                        </div>
                        <div class="subject-bg-hover"><span><i class="far fa-window-restore"></i></span>
                            <h4><a href="#">Professional Skill Development</a></h4>
                            <div class="subject-bg-view-more"><a href="<?php echo base_url('landing/hire_a_tutor'); ?>">Hire a tutor</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 home-subject-mob">
                    <div class="subject-bg-wrap home-subject-1 default-width"><a href="#"><img class="img-fluid" src="<?php echo base_url('assets/landing/img/category/category_4.jpg'); ?>" alt="Bangla-English-Medium"> </a>
                        <div class="subject-bg-tag home-subject-1">Subject</div>
                        <div class="subject-bg-course"><i class="fas fa-window-restore"></i>
                            <h5>Special Skill Development</h5>
                        </div>
                        <div class="subject-bg-hover"><span><i class="fas fa-window-restore"></i></span>
                            <h4><a href="#">Special Skill Development</a></h4>
                            <div class="subject-bg-view-more"><a href="<?php echo base_url('landing/hire_a_tutor'); ?>">Hire a tutor</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 home-subject-mob">
                    <div class="subject-bg-wrap home-subject-1 default-width"><a href="#"><img class="img-fluid" src="<?php echo base_url('assets/landing/img/category/category_5.jpg'); ?>" alt="Bangla-English-Medium"> </a>
                        <div class="subject-bg-tag home-subject-1">Subject</div>
                        <div class="subject-bg-course"><i class="fas fa-school"></i>
                            <h5>Religious Studies</h5>
                        </div>
                        <div class="subject-bg-hover"><span><i class="fas fa-school"></i></span>
                            <h4><a href="#">Religious Studies</a></h4>
                            <div class="subject-bg-view-more"><a href="<?php echo base_url('landing/hire_a_tutor'); ?>">Hire a tutor</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 home-subject-mob">
                    <div class="subject-bg-wrap home-subject-1 default-width"><a href="#"><img class="img-fluid" src="<?php echo base_url('assets/landing/img/category/category_6.jpg'); ?>" alt="Bangla-English-Medium"> </a>
                        <div class="subject-bg-tag home-subject-1">Subject</div>
                        <div class="subject-bg-course"><i class="fas fa-stamp"></i>
                            <h5>Arts</h5>
                        </div>
                        <div class="subject-bg-hover"><span><i class="fas fa-stamp"></i></span>
                            <h4><a href="#">Arts</a></h4>
                            <div class="subject-bg-view-more"><a href="<?php echo base_url('landing/hire_a_tutor'); ?>">Hire a tutor</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 home-subject-mob">
                    <div class="subject-bg-wrap home-subject-1 default-width"><a href="#"><img class="img-fluid" src="<?php echo base_url('assets/landing/img/category/category_7.jpg'); ?>" alt="Bangla-English-Medium"> </a>
                        <div class="subject-bg-tag home-subject-1">Subject</div>
                        <div class="subject-bg-course"><i class="fas fa-business-time"></i>
                            <h5>Test Preparation</h5>
                        </div>
                        <div class="subject-bg-hover"><span><i class="fas fa-business-time"></i></span>
                            <h4><a href="#">Test Preparation</a></h4>
                            <div class="subject-bg-view-more"><a href="<?php echo base_url('landing/hire_a_tutor'); ?>">Hire a tutor</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 home-subject-mob">
                    <div class="subject-bg-wrap home-subject-1 default-width"><a href="#"><img class="img-fluid" src="<?php echo base_url('assets/landing/img/category/category_8.jpg'); ?>" alt="Bangla-English-Medium"> </a>
                        <div class="subject-bg-tag home-subject-1">Subject</div>
                        <div class="subject-bg-course"><i class="fas fa-user-graduate"></i>
                            <h5>Admission Test</h5>
                        </div>
                        <div class="subject-bg-hover"><span><i class="fas fa-user-graduate"></i></span>
                            <h4><a href="#">Admission Test</a></h4>
                            <div class="subject-bg-view-more"><a href="<?php echo base_url('landing/hire_a_tutor'); ?>">Hire a tutor</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!----Popular Category Area End----->
     
   <!----How It Works Area Start----->

    <section class="How-it-works-area">
        <div class="container">
            <div class="how-works-content-area">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="how-it-works-header text-center section-title">
                            <div class="box__top-icon">
                                <span class="icon-wrap"> <i class="far fa-compass"></i></span>
                            </div>
                            <h4>How it Works for tutors ?</h4>

                        </div>
                    </div>
                </div>
                <div class="how-work-warp">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="how-works-body-content text-center">
                                <div class="review__item">
                                    <div class="thumbnail review-card">
                                        <span class="review-card__object">
                                            <img src="<?php echo base_url('assets/landing/img/category/create-account.png'); ?>" class="img-fluid" alt="TUTOR Post">
                                        </span>
                                        <div class="caption review-card__caption">
                                            <h3 class="review-card__caption_title">1. Create a Free Account</h3>
                                            <p class="review-card__caption_text">
                                                Post your Tutor requirements. Our experts will analyze it and live your requirements to our job board.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="how-works-body-content text-center">
                                <div class="review__item">
                                    <div class="thumbnail review-card">
                                        <span class="review-card__object">
                                            <img src="<?php echo base_url('assets/landing/img/category/alerm.png'); ?>" class="img-fluid" alt="TUTOR Post">
                                        </span>
                                        <div class="caption review-card__caption">
                                            <h3 class="review-card__caption_title">2. Get Free Tutoring Job Alerts</h3>
                                            <p class="review-card__caption_text">
                                                You'll receive the 5 (max) best Tutors' CVs in your account within 48 hours which closely match to your requirements
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="how-works-body-content text-center">
                                <div class="review__item">
                                    <div class="thumbnail review-card last-review-card">
                                        <span class="review-card__object">
                                            <img src="<?php echo base_url('assets/landing/img/category/applyt.png'); ?>" class="img-fluid" alt="TUTOR Post">
                                        </span>
                                        <div class="caption review-card__caption">
                                            <h3 class="review-card__caption_title">3. Apply to Your Desired Job</h3>
                                            <p class="review-card__caption_text">
                                                Choose the best one among the 5 CV's. Offer the selected Tutor for few trial classes before taking the regular classes. Give us your feedback and start Learning.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!----How It Works Area End----->

 <!--Gallery Area Start-->

    <section class="gallery-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="gallery-header text-center">
                        <h4>Tution Terminal Gallery</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.!</p>
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="row">
                    <div class="col-md-4">
                        <figure class="effect-ravi">
                            <img src="https://picsum.photos/1000/810/?random" alt="img17" />
                            <figcaption>
                                <h2>Teachers <span>Party</span></h2>
                                <p>
                                    <a data-fancybox="gallery" href="https://picsum.photos/1000/810/?random"><i class="fas fa-plus"></i></a>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4">
                        <figure class="effect-ravi">
                            <img src="https://picsum.photos/1000/800/?random" alt="img25" />
                            <figcaption>
                                <h2>Student <span>Party</span></h2>
                                <p>
                                    <a data-fancybox="gallery" href="https://picsum.photos/1000/800/?random"><i class="fas fa-plus"></i></a>

                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4">
                        <figure class="effect-ravi">
                            <img src="https://picsum.photos/1000/801/?random" alt="img25" />
                            <figcaption>
                                <h2>Work<span> Space</span></h2>
                                <p>
                                    <a data-fancybox="gallery" href="https://picsum.photos/1000/801/?random">
                                        <i class="fas fa-plus"></i>
                                    </a>

                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4">
                        <figure class="effect-ravi">
                            <img src="https://picsum.photos/1000/802/?random" alt="img25" />
                            <figcaption>
                                <h2>Happy <span>Employee</span></h2>
                                <p>
                                    <a data-fancybox="gallery" href="https://picsum.photos/1000/802/?random">
                                        <i class="fas fa-plus"></i>
                                    </a>

                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4">
                        <figure class="effect-ravi">
                            <img src="https://picsum.photos/1000/803/?random" alt="img17" />
                            <figcaption>
                                <h2>Cloths <span>Donetion</span></h2>
                                <p>
                                    <a data-fancybox="gallery" href="https://picsum.photos/1000/803/?random">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4">
                        <figure class="effect-ravi">
                            <img src="https://picsum.photos/1000/804/?random" alt="img25" />
                            <figcaption>
                                <h2>Best <span>Teacher</span></h2>
                                <p>
                                    <a data-fancybox="gallery" href="https://picsum.photos/1000/804/?random">
                                        <i class="fas fa-plus"></i>
                                    </a>

                                </p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--Gallery Area End-->
    
     <!----Teacher Testimonial Area Start----->

    <div id="pagewrap">
        <section class="clientsay " style="background-image:url('assets/landing/img/testimonial-bg.jpg'); background-repeat:no-repeat; background-position: center top; background-size:cover; background-attachment:fixed;">
            <div class="container">
                <div class="wow fadeInUpBig" data-wow-duration="1s">

                    <div class="testimonial-left section-title">
                        <h1>Student / Parents Say?</h1>
                        <p>Praesent ornare, mi in porta iaculis, lectus mi ultrices commdolor neque vel massa. Donec sede tortor sodales, tincidunt lPr ornare, mi in porta iaculis, lectus mi ultrices est.</p>

                    </div>
                    <div class="testimonial-right">
                        <div id="clienttestiminials">
                            <div class="owl-carousel">
                               <?php  foreach($testimonials as $testimonial){
              				 if($testimonial['commentator_flag'] == 'parent'){

              				 ?>
                                <div class="item">
                                    <div class="item-slide">
                                        <div class="tmthumb">
                                            <img src="<?php echo base_url('assets/upload/testimonial_user_image/60x60/'.$testimonial['commentator_image']); ?>">
                                        </div>
                                        <div class="tmdesc">
                                            <div class="tmtitle">
                                                <h3><a href="#"><?php echo $testimonial['name'];?></a></h3>
                                                <span><?php echo $testimonial['designation'];?></span>
                                            </div>
                                            <p>"<?php echo $testimonial['comment'];?>"</p>

                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                             <?php } } ?>
                             
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div><!-- .end section class -->
                <div class="clear"></div>
            </div><!-- container -->
        </section>
    </div>

    <!----Teacher Testimonial Area End----->
    
      <!----Counter Area Start----->

    <section class="counter-area-strat">
        <div class="container">
            <div class="counter-content">
                <div class="row">

                    <div class="col-md-4">
                        <div class="counter-head">
                            <div class="counter-img">
                                <img src="assets/landing/img/counter.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="counter-text">
                                <h3> Quick &amp;<br><span><b> Convenient</b></span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row mt">
                            <div class="col-md-4 col-sm-12">
                                <div class="counters">
                                    <h3 style="cursor: pointer"><span class="counter"><b>
                                                <?php echo $stat->total_applied ?></b></span><br> Total Applied </h3>
                                    <img src="assets/landing/img/arrow.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="counters">
                                    <h3><span class="counter"><b> <?php echo $stat->total_live_jobs ?></b></span><br> Live Tution Jobs</h3>
                                    <img src="assets/landing/img/arrow.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="counters">
                                    <h3><span class="counter"><b><?php echo round($stat->total_rating, 1) ?></b></span><span>/5</span><br> Avarage rating </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix visible-xs-block"></div>
                </div>
            </div>
        </div>
    </section>

    <!----Counter Area End----->
 

	<?php echo $footer; ?>
	
	<script type="text/javascript" language="javascript">



// Wire up the events as soon as the DOM tree is ready
$(document).ready(function() {

});
</script>

<script type="text/javascript">
  // $(window).on('load', function() {
  //   // setTimeout(function(){
  //   // 	$('.subscribeModal-lg').modal('hide');
  //   // }, 10000);
  //   $('.subscribeModal-lg').modal('show');
  // });
  $(window).on('load', function() {
    setTimeout(function(){
    	$('.appDownloadModal-lg').modal('hide');
    }, 5000);
    $('.appDownloadModal-lg').modal('show');
  });

	$(window).scroll(function(){
		$('.counting').each(function() {
			var $this = $(this),
			  countTo = $this.attr('data-count');

			$({ countNum: $this.text()}).animate({
				countNum: countTo
			},

			{

				duration: 3000,
				easing:'linear',
				step: function() {
					// $this.text(Math.floor(this.countNum));
					$this.text(Number(parseFloat(this.countNum).toFixed(1)));
				},
				complete: function() {
					$this.text(this.countNum);
				}

			});
		});
	})
</script>





