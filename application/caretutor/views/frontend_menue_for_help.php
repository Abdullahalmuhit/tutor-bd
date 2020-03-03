<header id="header">
        <!-- BEGIN MENU -->
        <div class="menu_area">
          <!--   <nav class="navbar navbar-default navbar-fixed-top visible-xs" role="navigation" <?php //echo isset($flag) ? '' : 'style="background-color: #3399ff;border-color: transparent; margin-top: 0px;"'; ?>>
                <div class="container">
                    <div class="navbar-header">
                        
                        <button type="button" style="margin-top: 14px !important;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" style="margin-top: 8px !important;" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/caretutor_logo.png" alt="logo"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul id="top-menu" class="nav navbar-nav navbar-right main_nav">
                            <li><a href="<?php echo base_url(); ?>signin">Sign In</a></li>
                            <li><a href="<?php echo base_url(); ?>landing/signup">Sign Up</a></li>
                            <li><a href="<?php echo base_url(); ?>landing/job_board">Job Board</a></li>
                            <li><a href="<?php echo base_url(); ?>landing/become_a_tutor" class="<?php //echo isset($flag) ? 'slider_btn' : 'slider_btn_other'; ?>" id="become_a_tutor">Become a Tutor</a></li>                           
                        </ul>           
                    </div>
                </div>     
            </nav> -->


            <!-- <nav class="navbar <?php //echo isset($flag) ? 'navbar-default' : 'navbar-default-other'; ?> navbar-fixed-top hidden-xs" role="navigation">  -->

            <nav class="navbar navbar-default  navbar-fixed-top " role="navigation"> 
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
                        <!--<a class="navbar-brand" id="caretutor-logo" href="<?php echo base_url(); ?>">Care<span>Tutors</span></a>-->

                        <!-- IMG BASED LOGO  -->
                        <a class="navbar-brand" style="margin-top: 0 !important;" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/caretutor_logo.png" alt="logo"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul id="top-menu" class="nav navbar-nav navbar-right main_nav">
                            <li><a href="<?php echo base_url(); ?>signin" class="<?=($this->uri->segment(1)=='signin'?'active':'')?>">Sign In</a></li>
                            <li><a href="<?php echo base_url(); ?>landing/signup" class="<?=($this->uri->segment(2)=='signup'?'active':'')?>">Sign Up</a></li>
                            <li><a href="<?php echo base_url(); ?>landing/job_board" class="<?=($this->uri->segment(2)=='job_board'?'active':'')?>">Job Board</a></li>
                            <!-- <li><a href="<?php echo base_url(); ?>landing/become_a_tutor" class="slider_btn">Become A Tutor</a></li>  -->
                            <li><a href="<?php echo base_url(); ?>landing/become_a_tutor"  class="slider_btn">Become A Tutor</a></li>
                            

                           <!--  <li><a href="<?php echo base_url(); ?>landing/become_a_tutor" class="<?php echo isset($flag) ? 'slider_btn' : 'slider_btn_other'; ?>" id="become_a_tutor">Become a Tutor</a></li> -->                           
                        </ul>           
                    </div><!--/.nav-collapse -->
                </div>     
            </nav> 
        </div>
        <!-- END MENU --
    </header>