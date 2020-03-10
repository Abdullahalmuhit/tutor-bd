
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
                            <a href="#" class="nav-link" data-hover="Tutors Hub">Tutors Hub</a>
                        </li>

                        <li class="nav-item"><a href="<?php echo base_url('landing/signup'); ?>" class="nav-link" data-hover="Registration">Registration</a></li>

                        <li class="nav-item"><a href="<?php echo base_url().'signin'; ?>" class="nav-link" data-hover="Sign in">Sign In</a></li>


                    </ul>
                    <li class="nav-item nav-help-item">
                        <a class="nav-link help-icon" data-hover="" onclick="openNav()" href="#"><i class="fas fa-info-circle"></i></a>
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
   