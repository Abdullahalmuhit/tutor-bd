<?php echo $header;?>
<body> 
    <!-- SCROLL TOP BUTTON -->
    <!--<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>-->
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <?php $this->load->view('frontend_menu'); ?>

    <!--=========== End HEADER SECTION ================--> 

    <!--=========== BEGAIN BLOG SECTION ================-->
	<section id="blog" style="padding-bottom: 400px!important;">
      	<div class="container-fluid">
      		<div class="row">
      			<div class="col-lg-3 col-sm-3 col-md-3"></div>
          		<div class="col-md-6 col-lg-6 col-sm-6">
          			<div class="well doc_search_form_container" style="margin: 0px; border: none !important; box-shadow: none !important; padding: 70px 0 40px 0;">
          				<p class="text-center page_title" >Password Reset Successfully</p>
          				<form class="form-horizontal" id="frmfp" data-link="user/forgot_pass_succ" method="post" role="form">
          					<div id="msg" class="col-xs-12 col-sm-12 col-md-12">
          						
          					</div>
							  	
							  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">	
							  		<div class="col-sm-12 col-xs-12">						    	
							    		<p>Password has send to your email. Please check your email for new password.</p>
							    	</div>
							    </div>
						    </div>
          				</form>
          			</div>
          		</div>
         	</div>
      	</div>
	</section>
    <!--=========== END BLOG SECTION ================-->
	<?php echo $footer;?>