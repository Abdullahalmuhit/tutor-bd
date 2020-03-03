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
        <section class="clientsay " style="background: #000;background-image:url(images/testimonial-bg.jpg); background-repeat:no-repeat; background-position: center top; background-size:cover; background-attachment:fixed;">
            <div class="container">
                <div class="wow fadeInUpBig" data-wow-duration="1s">

                    <div class="testimonial-left section-title">
                        <h1>Students / Parents Say?</h1>
                        <p>Praesent ornare, mi in porta iaculis, lectus mi ultrices commdolor neque vel massa. Donec sede tortor sodales, tincidunt lPr ornare, mi in porta iaculis, lectus mi ultrices est.</p>

                    </div>
                    <div class="testimonial-right">
                        <div id="clienttestiminials">
                            <div class="owl-carousel">
                                <div class="item">
                                    <div class="item-slide">
                                        <div class="tmthumb">
                                            <img src="images/client1.jpg">
                                        </div>
                                        <div class="tmdesc">
                                            <div class="tmtitle">
                                                <h3><a href="http://live-demo.online/tutor/testimonials/jonathan-doe/">Jonathan Doe</a></h3>
                                                <span>Uttora-Dhaka</span>
                                            </div>
                                            <p>Praesent ornare, mi in porta iaculis, lectus mi ultrices est, eget commodo dolor neque vel massa. Donec sed tortor sodales, tincidunt leo eu, tristique ante. Donec enim arcu, porta eget sagittis non, imperdiet ac enim. Proin egestas odio sit amet leo aliquam rhoncus.</p>

                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="item-slide">
                                        <div class="tmthumb">
                                            <img src="images/client2.jpg">
                                        </div>
                                        <div class="tmdesc">
                                            <div class="tmtitle">
                                                <h3><a href="http://live-demo.online/tutor/testimonials/martina-doe/">Martina Doe</a></h3>
                                                <span>Mohammadpur-Dhaka</span>
                                            </div>
                                            <p>Donec sed tortor sodales, tincidunt leo eu, tristique ante. Donec enim arcu, porta eget sagittis non, imperdiet ac enim. Proin egestas odio sit amet leo aliquam rhoncus. Praesent ornare, mi in porta iaculis, lectus mi ultrices est, eget commodo dolor neque vel massa.</p>

                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="item-slide">
                                        <div class="tmthumb">
                                            <img src="images/client3.jpg">
                                        </div>
                                        <div class="tmdesc">
                                            <div class="tmtitle">
                                                <h3><a href="http://live-demo.online/tutor/testimonials/brandon-shaw/">Brandon Shaw</a></h3>
                                                <span>Dhanmondi-Dhaka</span>
                                            </div>
                                            <p>Donec enim arcu, porta eget sagittis non, imperdiet ac enim. Proin egestas odio sit amet leo aliquam rhoncus. Praesent ornare, mi in porta iaculis, lectus mi ultrices est, eget commodo dolor neque vel massa. Donec sed tortor sodales, tincidunt leo eu, tristique ante.</p>

                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="item-slide">
                                        <div class="tmthumb">
                                            <img src="images/client4.jpg">
                                        </div>
                                        <div class="tmdesc">
                                            <div class="tmtitle">
                                                <h3><a href="http://live-demo.online/tutor/testimonials/sarah-brown/">Sarah Brown</a></h3>
                                                <span>Marketing Class</span>
                                            </div>
                                            <p>Neque nisl rhoncus augue. Scelerisque tincidunt purus dui ut magna. Praesent ornare, mi in porta iaculis, lectus mi ultrices est, eget commodo dolor neque vel massa. Donec sed tortor sodales, tincidunt leo eu, tristique ante. Donec enim arcu, porta eget sagittis non.</p>

                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
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





