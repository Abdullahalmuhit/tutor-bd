<header class="header-area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light  ">
               <!-- IMG BASED LOGO  -->
               <a class="navbar-brand" style="margin-top: 0 !important;" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/caretutor_logo.png" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto main-nav">
                        <li class="nav-item active">
                        <a class="nav-link"  href="<?php echo base_url(); ?>"> Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('landing/job_board'); ?>">Job Board</a>
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
                        <a class="nav-link signin-p" href="<?php echo base_url().'signin'; ?>"><i class="fas fa-sign-in-alt"></i>Sign In</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>