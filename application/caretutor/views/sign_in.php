<?php echo $header; ?>
<body> 
    <!-- SCROLL TOP BUTTON -->
    <!--<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>-->
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <?php $this->load->view('frontend_menu'); ?>

    <!--=========== End HEADER SECTION ================--> 

    <!--=========== BEGAIN BLOG SECTION ================-->
    <section class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="block login-content">
                        <h2 class="login-header-text">Existing Member Sign In</h2>
                     
                        <form class="form-horizontal" id="frmsignin" action="user/login"  method="post" role="form">
                            <div class="logininner_block">
                                <div class="input_holder login-input">
                                    <input type="email" name="email" id="email" placeholder="Enter Email">
                                </div>
                                <div class="input_holder login-input">
                                    <input type="password" name="password" placeholder="Enter Password">

                                    <div class="error_txt"></div>
                                </div>
                                <ul class="types_block">
                                    <li class="first-select">
                                        <input name="radiog_dark" id="membertype_student" class="common_radio" type="radio" value="guardian" checked=""> <label class="label_text" for="membertype_student">Student</label>
                                    </li>
                                    <li class="">
                                        <input name="radiog_dark" id="membertype_tutor" class="common_radio" type="radio" value="tutor"><label class="label_text" for="membertype_tutor">Tutor</label>
                                    </li>

                                </ul>
                                <div class="input_holder signin-btn">
                                    <input type="submit"  value="Sign In">
                                </div> 
                                <div class="input_holder">
                                <p style="margin-top: 7px!important;"><a target="_blank" href="<?php echo base_url('user/forgot_password'); ?>">Forgot password?</a></p>
                                   By Signing up, you agree to our <a target="_blank" href="<?php echo base_url('landing/terms_and_conditions'); ?>">Terms of Use and Privacy Policy</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="login-content-right">
                        <h2 class="login-header-text">New Member Sign up</h2>
                        <div class="input_holder login-right-btn">
                            <a href="<?php echo base_url('landing/tutor_list'); ?>"> <button type="button" class="btn btn-first"><img src="images/tutor.png" class="img-fluid" alt="">Tutor List</button></a>
                        </div>
                        <div class="input_holder login-right-btn">
                            <a href="<?php echo base_url('landing/become_a_tutor'); ?>"> <button type="button" class="btn btn-second"><img src="images/tutor2.png" class="img-fluid" alt="">Sign Up As a Tutor</button></a>
                        </div>
                        <div class="input_holder login-right-btn">
                            <a href="<?php echo base_url('landing/hire_a_tutor'); ?>"> <button type="button" class="btn btn-third"><img src="images/tutor2.png" class="img-fluid" alt="">Sign Up As a Student</button></a>
                        </div>
                        <!--<div class="input_holder login-right-btn">
                   <button type="button" class="btn btn-fourth"><img src="images/faculty.png" alt="" class="img-fluid">i Need A teacher</button>
                </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--=========== END BLOG SECTION ================-->
<?php echo $footer; ?>