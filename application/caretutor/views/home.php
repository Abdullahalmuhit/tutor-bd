<?php echo $header; ?>

<body>


    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T939DFN" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- SCROLL TOP BUTTON -->
    <!--<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <!--Header area start-->

    <header class="header-area">
        <div id="header-container" class="container">
            <nav class="navbar navbar-expand-lg navbar-light  ">
                <a class="navbar-brand wow fadeInLeft" data-wow-duration="2s" href="<?php echo base_url(); ?>">
                    <!--<h4>BDTutor</h4>-->
                    <img src="<?php echo base_url();?>assets/img/caretutor_logo.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!--  <ul class="navbar-nav mr-auto main-nav">
                        <li class="nav-item active">

                            <a class="nav-link"  href="<?php echo base_url(); ?>"> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="<?php echo base_url('landing/job_board'); ?>">job Board</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="about-us.html">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>landing/become_a_tutor" id="become_a_tutor">Become A Tutor</a>

                        </li>
                    </ul>-->
                    <ul class="snip1226 ml-auto  main-nav">
                        <li class="current nav-item"><a href="<?php echo base_url(); ?>" class="nav-link" data-hover="Home">Home</a></li>

                        <li class="nav-item"><a href="<?php echo base_url('landing/job_board'); ?>" class="nav-link" data-hover="Job Board">Job Board</a></li>

                        <li class="nav-item" onmouseover="tutorialmenuon()" onmouseout="tutorialmenuoff()"><a href="#" class="nav-link" data-hover="Tutorial">Tutorial</a></li>

                        <li class="nav-item" onmouseover="tutormenuon()" onmouseout="tutormenuoff()">
                            <a href="<?php echo base_url('landing/tutor_list'); ?>" class="nav-link" data-hover="Tutors Hub">Tutors Hub</a>
                        </li>

                        <li class="nav-item"><a href="<?php echo base_url('landing/signup'); ?>" class="nav-link" data-hover="Registration">Registration</a></li>

                        <li class="nav-item"><a href="<?php echo base_url().'signin'; ?>" class="nav-link" data-hover="Sign in">Sign In</a></li>


                    </ul>
                    <li class="nav-item nav-help-item" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
                        <a class="nav-link help-icon"   onclick="openNav()" href="#"><i class="fas fa-info-circle"></i></a>
                    </li>

                </div>
            </nav>
            <div class="sub-menu" id="sub-menu" onmouseover="tutormenuon()" onmouseout="tutormenuoff()">
                <ul>
                    <li><a href="#">All Tutor</a></li>
                    <li><a href="#">Featured Tutor</a></li>
                </ul>
            </div>
            <div class="tutorial-sub-menu" id="tutorial-sub-menu" onmouseover="tutorialmenuon()" onmouseout="tutorialmenuoff()">
                <ul>
                    <li onmouseover="videotutorialmenuon()" onmouseout="videotutorialmenuoff()"><a href="#">Video Tutorial<i class="fas fa-angle-right"></i></a></li>

                    <li><a onmouseover="wringtutorialmenuon()" onmouseout="writingtutorialmenuoff()" href="#">Writing Tutorial <i class="fas fa-angle-right"></i></a></li>
                </ul>
            </div>
            <!--item 3-->
            <div class="video-tutorial-sub-menu" id="video-tutorial-sub-menu" onmouseover="videotutorialmenuon()" onmouseout="videotutorialmenuoff()">
                <ul>
                    <li onmouseover="academictutorialmenuon()" onmouseout="academictutorialmenuoff()"><a href="#">Academic<i class="fas fa-angle-right"></i></a></li>


                </ul>
            </div>
            <!--item 4-->
            <div class="academic-tutorial-sub-menu" id="academic-tutorial-sub-menu" onmouseover="academictutorialmenuon()" onmouseout="academictutorialmenuoff()">
                <ul>
                    <li><a href="#">Class-pre-schooling to 5</a></li>

                    <li><a href="#">Class 5-8</a></li>
                    <li><a href="#">Class 9-10</a></li>
                    <li><a href="#">Hsc 1st-2nd</a></li>
                </ul>
            </div>

            <!--item 3-->
            <div class="writing-tutorial-sub-menu" id="writing-tutorial-sub-menu" onmouseover="wringtutorialmenuon()" onmouseout="writingtutorialmenuoff()">
                <ul>
                    <li onmouseover="wringtutorialmenuon2()" onmouseout="writingtutorialmenuoff2()"><a href="#">Academic<i class="fas fa-angle-right"></i></a></li>
                </ul>
            </div>

            <!-- item for academic -->
            <div class="academic-tutorial-sub-menu" id="academic-tutorial-sub-menu-2" onmouseover="wringtutorialmenuon2()" onmouseout="writingtutorialmenuoff2()">
                <ul>
                    <li><a href="#">Class-pre-schooling to 5</a></li>

                    <li><a href="#">Class 5-5</a></li>
                    <li><a href="#">Class 9-10</a></li>
                    <li><a href="#">Hsc 1st</a></li>
                </ul>
            </div>

        </div>

    </header>
   

    <!--Header area End-->

    <div class="modal fade" id="hireTutorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ezCustTrans" style="margin-top: 50px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Fill up your tutor requirements for free</h3>
                    <p class="text-center" style="margin-bottom: 45px !important; color: #1f2c44;">Fill up your tutor requirements within minutes. Over 10000+ Parents/Students have already found qualified tutors through our platform.</p>

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
                                            <select class="form-control sellocation" name="sellocation" id="sellocation" required="required">
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
                            <div class="row">
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

    <div class="slider-wrap">
        <div class="slider-progress">
            <span></span>
        </div>
    </div>
    <div class="image-slider">
        <div class="img-wrap overlay-slider dark ">
            <!--   <div class="slider-content-warper ">
			<h1 class="slider-heading">BEST PRIVATE ONLINE TUTORS</h1>
        </div>-->
            <img src="<?php echo base_url();?>assets/landing/img/full-slider/bc.png" alt="">
        </div>
        <div class="img-wrap overlay-slider dark">
            <!-- <div class="slider-content-warper ">
                <h1 class="slider-heading">LIVE TUITION&nbsp;CLASSES</h1>
            </div>-->
            <img src="<?php echo base_url();?>assets/landing/img/full-slider/slider2.png" alt="">
        </div>
        <div class="img-wrap overlay-slider dark">
            <!-- <div class="slider-content-warper ">
			<h1 class="slider-heading">BEST PRIVATE ONLINE TUTORS</h1>
        </div>-->
            <img src="<?php echo base_url();?>assets/landing/img/full-slider/slider3.png" alt="">
        </div>
    </div>

    <div class="banner-bottom-content text-center">
        <a href="#" class=""><button style="margin-left: 0px" type="button" class="btn btn-primary hvr-rectangle-out">Hire a Tutor</button></a>
        <a href="#"><button type="button" class="btn btn-secondary hvr-rectangle-out">Become a Tutor</button></a>
        <div class="call-info">
            <p>call 01756441122 <br>For any kind of assistance!</p>
        </div>
    </div>






    <!--

    <section class="slider-area">
        <div id="mainslider">
            <div class="swiper-wrapper">
                <div class="single-item swiper-slide overlay dark-1"><img alt="Slider Image" src="<?php echo base_url();?>assets/landing/img/full-slider/bc.jpg" />
                    <div class="slider-caption text-center">
                        <div class="container">
                            <h1 class=" rt-effect-height delay-2">BEST PRIVATE ONLINE TUTORS</h1>

                            <p class="mb-25 hidden-xs hidden-sm rt-effect delay-3">A proven alternative to one to one home tuition</p>

                            <div class=" rt-effect-btn rt-effect delay-4 banner-slider-btn m"><a class="btn slider-hire-btn" href="<?php echo base_url('landing/hire_a_tutor'); ?>">Hire a tutor</a></div>
                            <div class="rt-effect-btn rt-effect delay-4 banner-slider-btn m"><a class="btn slider-hire-btn" href="<?php echo base_url(); ?>landing/become_a_tutor">Become a tutor</a></div>
                            <div class="rt-effect-btn rt-effect delay-4 "><a class="btn slider-hire-btn query-btn" href="#">Call 01756441122 For Any Kind of Assistance!</a>
                            </div>

                        </div>
                        <!-- /.container -->
    <!--  </div>
                </div>
                <!-- /.Item End -->

    <!--   <div class="single-item swiper-slide overlay dark-1"><img alt="Slider Image" src="<?php echo base_url();?>assets/landing/img/full-slider/bc_medium.jpg" />
                    <div class="slider-caption text-center">
                        <div class="container">
                            <h1 class="rt-effect-height delay-2">LIVE TUITION&nbsp;CLASSES</h1>

                            <p class="mb-25 hidden-xs hidden-sm rt-effect delay-3">A complete solution for one to one tutoring</p>

                            <div class=" rt-effect-btn rt-effect delay-4 banner-slider-btn m"><a class="btn slider-hire-btn" href="<?php echo base_url('landing/hire_a_tutor'); ?>">Hire a tutor</a></div>

                            <div class="rt-effect-btn rt-effect delay-4 banner-slider-btn m"><a class="btn slider-hire-btn" href="<?php echo base_url(); ?>landing/become_a_tutor">Become a tutor</a></div>
                            <div class="rt-effect-btn rt-effect delay-4 "><a class="btn slider-hire-btn" href="#">Call 01756441122 <br> For Any Kind of Assistance!</a>
                            </div>
                            <!-- /.container -->
    <!--   </div>
                    </div>
                    <!-- /.Item End -->

    <!--  </div>
                <!-- Add Arrows -->

    <!--      <div class="swiper-next swiper-arrow swiper-right-arrow"><i class="fas fa-angle-right"></i></div>

                <div class="swiper-prev swiper-arrow swiper-left-arrow"><i class="fas fa-chevron-left"></i></div>
            </div>
        </div>
    </section>

    <!----Banner  Area End----->



    <!----How It Works Area Start----->

    <section class="How-it-works-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title how-works-title text-center">
                        <h4 class="">How It Works for Parents?</h4>
                    </div>
                </div>
            </div>
            <div class="row mt-mb-15">
                <div class="col-lg-4 col-md-6">
                    <div class="single-item-style-one wow bounceInLeft" data-wow-duration="2s">
                        <div class="single-item-head d-flex align-items-center">
                            <div style="width: 75px;" class="icon"><i class="far fa-file-alt"></i></div>
                            <h5 class="item-title">Post Your Tutor Requirements</h5>
                        </div>
                        <div class="content">
                            <p>Post your Tutor requirements. Our experts will analyze it and live your requirements to our job board.</p>

                        </div>
                    </div>
                </div><!-- subject-item end -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-item-style-one wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.5s">
                        <div class="single-item-head d-flex align-items-center">
                            <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
                            <h5 class="item-title">Get the Maximum 5 Best Tutor CVs</h5>
                        </div>
                        <div class="content">
                            <p>You'll receive the 5 (max) best Tutors' CVs in your account within 48 hours which closely match to your requirements.</p>

                        </div>
                    </div>
                </div><!-- subject-item end -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-item-style-one  wow bounceInRight" data-wow-duration="2s">
                        <div class="single-item-head d-flex align-items-center">
                            <div class="icon"><i class="fas fa-user-graduate"></i></div>
                            <h5 class="item-title">Select the Best One & Start Learning</h5>
                        </div>
                        <div class="content">
                            <p>Choose the best one among the 5 CV's. Offer the selected Tutor for few trial classes before taking the regular classes. Give us your feedback and start Learning.</p>

                        </div>
                    </div>
                </div><!-- subject-item end -->



            </div>
        </div>
    </section>

    <!--
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
<!--
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
    
     <section class="teacher-say-testimonial-area">
        <div class="container">
            <div class="testimonial-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-lg-12">
                            <div class="section-title text-center text-white">
                                <span>Testimonial</span>
                                <h2>Tutor Review</h2>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme">
                <div class="row">
                    <div class="col-lg-8 center-column">
                        <div>
                            <div class="themeioan_testimonial">
                                <!-- single testimonial item -->
                                <img src="<?php echo base_url('assets/img/1.jpg') ?>" alt="Avatar">
                                <div class="testimonail-content">
                                      <div class="testimonial-author text-center">
                                        <h4>Maria D.</h4>
                                        <p>American International University- Banngladesh (AIUB)</p>
                                        <p>Dhanmondi,Dhaka</p>
                                    </div>
                                    <div class="testimonial-text text-center">
                                        <p>"I always thought that people used to pay much for quality. But these guys
                                            changed my opinion. The quality exceeds the price many times. I recommend it
                                            to
                                            everybody. I recommend it to everybody."
                                        </p>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-lg-8 center-column">
                        <div>
                            <div class="themeioan_testimonial">
                                <!-- single testimonial item -->
                                <img src="<?php echo base_url('assets/img/2.jpg') ?>" alt="Avatar">
                                <div class="testimonail-content">
                                     <div class="testimonial-author text-center">
                                        <h4>Maria D.</h4>
                                        <p>American International University- Banngladesh (AIUB)</p>
                                        <p>Dhanmondi,Dhaka</p>
                                    </div>
                                    <div class="testimonial-text text-center">
                                        <p>"I always thought that people used to pay much for quality. But these guys
                                            changed my opinion. The quality exceeds the price many times. I recommend it
                                            to
                                            everybody. I recommend it to everybody."
                                        </p>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                  <div class="row">
                    <div class="col-lg-8 center-column">
                        <div>
                            <div class="themeioan_testimonial">
                                <!-- single testimonial item -->
                                <img src="<?php echo base_url('assets/img/3.jpg') ?>" alt="Avatar">
                                <div class="testimonail-content">
                                   <div class="testimonial-author text-center">
                                        <h4>Maria D.</h4>
                                        <p>American International University- Banngladesh (AIUB)</p>
                                        <p>Dhanmondi,Dhaka</p>
                                    </div>
                                    <div class="testimonial-text text-center">
                                        <p>"I always thought that people used to pay much for quality. But these guys
                                            changed my opinion. The quality exceeds the price many times. I recommend it
                                            to
                                            everybody. I recommend it to everybody."
                                        </p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>


    <!----student/parents Testimonial Area End----->


    <!--Become a tutor section area start-->
    <section class="become-tutor-area" id="become_a_tutor_secion">
        <div class="container">
            <div class="row">
                <div class="become_a_tutor_column col-lg-7 col-md-7 col-sm-7 wow bounceInLeft" data-wow-duration="2s">

                    <p class="heading">Become a tutor and start earning!</p>
                    <p class="heading_text">Easiest way to create tutor profile</p>


                </div>
                <div class="become_a_tutor_column col-lg-5 col-md-5 col-sm-5  wow bounceInRight" data-wow-duration="2s">
                    <a href="https://caretutors.com/landing/become_a_tutor" class="tutor_registration_button_white">Become A Tutor (It's Free!)</a>
                </div>
            </div>
        </div>
    </section>
    <!--Become a tutor section area End-->


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
                <div class="col-md-3 home-subject-mob wow bounceInLeft" data-wow-duration="2s">
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
                <div class="col-md-3 home-subject-mob wow bounceInLeft" data-wow-duration="2s">
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
                <div class="col-md-3 home-subject-mob  wow bounceInLeft"  data-wow-duration="2s">
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
                <div class="col-md-3 home-subject-mob wow bounceInLeft" data-wow-duration="2s">
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
                <div class="col-md-3 home-subject-mob wow bounceInRight"  data-wow-duration="2s">
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
                <div class="col-md-3 home-subject-mob wow bounceInRight" data-wow-duration="2s">
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
                <div class="col-md-3 home-subject-mob wow bounceInRight" data-wow-duration="2s">
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
                <div class="col-md-3 home-subject-mob wow bounceInRight" data-wow-duration="2s">
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


    <!--Gallery Area End-->

    <!----Teacher Testimonial Area Start----->

    <section class="teacher-say-testimonial-area">
        <div class="container">
            <div class="testimonial-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-lg-12">
                            <div class="section-title text-center text-white">
                                <span>Testimonial</span>
                                <h2>Students Review</h2>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme">
                <div class="row">
                    <div class="col-lg-8 center-column">
                        <div>
                            <div class="themeioan_testimonial">
                                <!-- single testimonial item -->
                                <img src="<?php echo base_url('assets/img/1.jpg') ?>" alt="Avatar">
                                <div class="testimonail-content">
                                      <div class="testimonial-author text-center">
                                        <h4>Maria D.</h4>
                                        <p>American International University- Banngladesh (AIUB)</p>
                                        <p>Dhanmondi,Dhaka</p>
                                    </div>
                                    <div class="testimonial-text text-center">
                                        <p>"I always thought that people used to pay much for quality. But these guys
                                            changed my opinion. The quality exceeds the price many times. I recommend it
                                            to
                                            everybody. I recommend it to everybody."
                                        </p>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-lg-8 center-column">
                        <div>
                            <div class="themeioan_testimonial">
                                <!-- single testimonial item -->
                                <img src="<?php echo base_url('assets/img/2.jpg') ?>" alt="Avatar">
                                <div class="testimonail-content">
                                     <div class="testimonial-author text-center">
                                        <h4>Maria D.</h4>
                                        <p>American International University- Banngladesh (AIUB)</p>
                                        <p>Dhanmondi,Dhaka</p>
                                    </div>
                                    <div class="testimonial-text text-center">
                                        <p>"I always thought that people used to pay much for quality. But these guys
                                            changed my opinion. The quality exceeds the price many times. I recommend it
                                            to
                                            everybody. I recommend it to everybody."
                                        </p>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                  <div class="row">
                    <div class="col-lg-8 center-column">
                        <div>
                            <div class="themeioan_testimonial">
                                <!-- single testimonial item -->
                                <img src="<?php echo base_url('assets/img/3.jpg') ?>" alt="Avatar">
                                <div class="testimonail-content">
                                   <div class="testimonial-author text-center">
                                        <h4>Maria D.</h4>
                                        <p>American International University- Banngladesh (AIUB)</p>
                                        <p>Dhanmondi,Dhaka</p>
                                    </div>
                                    <div class="testimonial-text text-center">
                                        <p>"I always thought that people used to pay much for quality. But these guys
                                            changed my opinion. The quality exceeds the price many times. I recommend it
                                            to
                                            everybody. I recommend it to everybody."
                                        </p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>





    <!--
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
    <!-- <div class="clear"></div>
            </div><!-- container -->
    <!--  </section>
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

    <!--Footer-top-area-start-->

    <section class="footer-top-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-7 mt-5">
                            <div class="download-app">
                                <h4>Download Tution Terminal Android App</h4> <a href="#" target="_blank"><img width="180" src="<?php echo base_url('assets/img/playStore.png') ?>"></a>
                                <div>
                                   <p style="margin-top:10px">With Tution Terminal official app, Make your profile in minutes. Apply to your preferred tutoring jobs that match your skills</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 d-none d-sm-block"><img src="<?php echo base_url('assets/img/android.png') ?>" class="img-fluid "></div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--Footer-top-area-End-->

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
            setTimeout(function() {
                $('.appDownloadModal-lg').modal('hide');
            }, 5000);
            $('.appDownloadModal-lg').modal('show');
        });

        $(window).scroll(function() {
            $('.counting').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count');

                $({
                    countNum: $this.text()
                }).animate({
                        countNum: countTo
                    },

                    {

                        duration: 3000,
                        easing: 'linear',
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

    <script>
        /* for turtorshub */
        function tutormenuon() {
            var tutoremenu = document.getElementById('sub-menu');


            tutoremenu.style.opacity = "1";
            tutoremenu.style.visibility = "unset";
            tutoremenu.style.transition = "0.4s ease-in-out";

        }
        tutormenuon();

        function tutormenuoff() {
            var tutormenu = document.getElementById('sub-menu');


            tutormenu.style.opacity = "0";
            tutormenu.style.visibility = "hidden";
            tutormenu.style.transition = "0.4s ease-in-out";

        }
        tutormenuoff();

    </script>

    <script>
        /* for tutorial*/
        function tutorialmenuon() {
            var tutorialemenu = document.getElementById('tutorial-sub-menu');


            tutorialemenu.style.opacity = "1";
            tutorialemenu.style.visibility = "unset";
            tutorialemenu.style.transition = "0.4s ease-in-out";

        }
        tutorialmenuon();

        function tutorialmenuoff() {
            var tutorialmenu = document.getElementById('tutorial-sub-menu');


            tutorialmenu.style.opacity = "0";
            tutorialmenu.style.visibility = "hidden";
            tutorialmenu.style.transition = "0.4s ease-in-out";

        }
        tutorialmenuoff();

    </script>
    <script>
        /* for tutorial*/
        function videotutorialmenuon() {
            var videotutorialemenu = document.getElementById('video-tutorial-sub-menu');
            var video = document.getElementById('tutorial-sub-menu');
            var video2 = document.getElementById('video-tutorial-sub-menu');

            videotutorialemenu.style.opacity = "1";
            video.style.opacity = "1";
            video2.style.opacity = "1";

            videotutorialemenu.style.visibility = "unset";
            video.style.visibility = "unset";
            video2.style.visibility = "unset";
            videotutorialemenu.style.transition = "0.4s ease-in-out";

        }
        videotutorialmenuon();

        function videotutorialmenuoff() {
            var videotutorialmenu = document.getElementById('video-tutorial-sub-menu');
            var video = document.getElementById('tutorial-sub-menu');

            video.style.visibility = "hidden";

            video.style.opacity = "0";

            videotutorialmenu.style.opacity = "0";
            videotutorialmenu.style.visibility = "hidden";
            videotutorialmenu.style.transition = "0.4s ease-in-out";

        }
        videotutorialmenuoff();

    </script>
