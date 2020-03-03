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
          				<p class="text-center page_title">Forgot Password</p>
          				<form class="form-horizontal" id="frmfp" data-link="user/forgot_pass_succ" method="post" role="form">
          					<div id="msg" class="col-xs-12 col-sm-12 col-md-12">
          						
          					</div>

          					<div class="col-xs-6 col-sm-6 col-md-6 input_margin_bottom">
                                 <div class="form-group custom_radio active">
                                <label class="radio-inline ">
                                    <input type="radio" name="radiog_dark" value="tutor" required="required" checked="checked"> Tutor
                                </label>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 input_margin_bottom">
                             <div class="form-group custom_radio">
                                <label class="radio-inline ">
                                    <input type="radio" name="radiog_dark" value="guardian" required="required"> Guardian/Student
                                </label>
                                </div>
                            </div>

                             <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom input_margin_mobile">      

                                 <div class="form-group">	
                                  <label for="email">Email Address</label>					    	
                                    <input type="email" class="form-control" required="required" id="email" name="email" placeholder="Your Email Address..." />
                                </div>
                            </div>
                            

							    <div class="col-xs-12 col-sm-12 col-md-12 input_margin_mobile" align="center">
                                	<div class="form-group">
				        				<button type="submit" class="btn btn-caretutors">Get Password</button>
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