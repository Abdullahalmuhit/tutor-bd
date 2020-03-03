<?php echo $header;?>
<style>
	.modal-header hr {
	    margin-top: 0 !important;
	    margin-bottom: 0 !important;
	}
	
	.modal-body{
		padding: 30px !important;
	}
	
	.modal-footer{
		padding-top : 15px !important;
	}
	body.modal-open {
		overflow: auto !important;
	}
	* {
	  -webkit-border-radius: 0 !important;
	     -moz-border-radius: 0 !important;
	          border-radius: 0 !important;
	}
</style>
<body> 
    <!-- SCROLL TOP BUTTON -->
    <!--<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>-->
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
		<div class="menu_area">
			<nav class="navbar navbar-default navbar-fixed-top visible-xs" role="navigation" <?php echo isset($flag)?'':'style="background-color: #3399ff;border-color: transparent; margin-top: 0px;"';?>>
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
					<a class="navbar-brand" id="caretutor-logo" href="#">Care<span>Tutors</span></a>
					
					<!-- IMG BASED LOGO  -->
						<!--<a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>assets/img/logo.png" alt="logo"></a>-->
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul id="top-menu" class="nav navbar-nav navbar-right main_nav">
							<li><a href="<?php echo base_url(); ?>signin">Log In</a></li>
							<li><a href="<?php echo base_url(); ?>landing/signup">Sign Up</a></li>
							<li><a href="<?php echo base_url(); ?>landing/job_board">Job Board</a></li>
							<li><a href="<?php echo base_url(); ?>landing/become_a_tutor" class="<?php echo isset($flag)?'slider_btn':'slider_btn_other'; ?>" id="become_a_tutor">Become a Tutor</a></li>                           
						</ul>           
					</div><!--/.nav-collapse -->
				</div>     
			</nav>
			<nav class="navbar <?php echo isset($flag)?'navbar-default':'navbar-default-other'; ?> navbar-fixed-top hidden-xs" role="navigation"> 
				<div class="container container_header">
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
					<a class="navbar-brand" id="caretutor-logo" href="#">Care<span>Tutors</span></a>
					
					<!-- IMG BASED LOGO  -->
						<!--<a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>assets/img/logo.png" alt="logo"></a>-->
					</div>
					<div id="navbar" class="navbar-collapse collapse other_page_header">
						<ul id="top-menu" class="nav navbar-nav navbar-right main_nav">
							<li><a href="<?php echo base_url(); ?>signin">Log In</a></li>
							<li><a href="<?php echo base_url(); ?>landing/signup">Sign Up</a></li>
							<li><a href="<?php echo base_url(); ?>landing/job_board">Job Board</a></li>
							<li><a href="<?php echo base_url(); ?>landing/become_a_tutor" class="<?php echo isset($flag)?'slider_btn':'slider_btn_other'; ?>" id="become_a_tutor">Become a Tutor</a></li>                           
						</ul>           
					</div><!--/.nav-collapse -->
				</div>     
			</nav> 
		</div>
      <!-- END MENU -->

    </header>

    <!--=========== End HEADER SECTION ================--> 

    <!--=========== BEGAIN BLOG SECTION ================-->
    <section id="blog" style="background: #E9EAEB;">
      	<div class="container container_body">
      		<div class="row" style="color: #212121;">
          		<div class="col-lg-3 col-md-3 col-sm-12" id="filter_div">
            		<!-- Start blog sidebar -->
              		<!-- Start single sidebar -->
              		<div class="panel panel-primary" style="background-color: #FFFFFF !important;border-color: #FFFFFF !important;color: #666; -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);">
						<div class="panel-body">
							<div class="row">
								<h1 style="padding-left: 15px; font-weight: 100;color: #212121;font-size: 18px;line-height: 1.1; margin-top: 0;">Job Search</h1>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="col-xs-12 col-sm-12 col-md-12" style="padding-left: 0px;padding-right: 0px;">
										<label class="job_board_label">City</label>
				                		<select class="postform input-lg" id="city" style="border: 2px solid #e0e0e0; color: #212121;"> <!-- class="postform" -->
						                  	<?php 
											foreach ($city as $cit)
											{
											?>
												<option value="<?php echo ($cit->city == 'Select City')?'1':$cit->id; ?>"><?php echo $cit->city; ?></option>
											<?php 
											}
											?>
						                </select>
				                		<i class="fa fa-chevron-down"></i>
				                		<br />
				                		<div class="border_bottom col-xs-12 col-sm-12 col-md-12"></div>
									</div>
								</div>
								
								<div id="location_show" class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px;">
									
								</div>
								
								<div id="category_show" class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px;">
									<div class="col-xs-12 col-sm-12 col-md-12" style="padding-left: 0px;padding-right: 0px;">
										<?php if(!empty($category)){ unset($category[0]);?>
											<legend style="text-align: left;border: none;" class="job_board_label"> Category </legend>
											<div style="color: #212121;">
												<?php foreach ($category as $cat)
												{
												?>
												<div class="checkbox checkbox-primary" style="margin-top: 0; margin-bottom: 0;">
												<?php echo "<input type='checkbox' class='category styled' name='category[]' value='".$cat->id."'>"; ?>
												<label for="checkbox2">
						                            <?php echo $cat->category; ?>
						                        </label>
												</div>
												<?php 
												}
												?>
											</div>
										<?php } ?>
										<div class="border_bottom col-xs-12 col-sm-12 col-md-12"></div>
									</div>
								</div>
								
								<div id="class_show" class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px; color: #212121;">
						  		
						  		</div>
						  		
						  		<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px; margin-bottom: 10px;">
						  			<div class="col-xs-12 col-sm-12 col-md-12" style="padding-left: 0px;padding-right: 0px; color: #212121;">
						  				<legend style="text-align: left; border: none;" class="job_board_label"> Gender </legend>
					                	<div class='col-xs-6 col-md-6' style='float: left; text-align: left; padding-left: 0px;'>
					                		<div class="checkbox checkbox-primary">
					                			<input type='checkbox' class='gender styled' name='gender[]' value='Male' checked="checked">
						                        <label for="checkbox2">
						                            Male
						                        </label>
						                    </div>
					                	</div>
					                	
					                	<div class='col-xs-6 col-md-6' style='float: left; text-align: left; padding-left: 5px;'>
					                		<div class="checkbox checkbox-primary">
					                			<input type='checkbox' class='gender styled' name='gender[]' value='Female' checked="checked">
						                        <label for="checkbox2">
						                            Female
						                        </label>
						                    </div>
					                		
					                	</div>
						  			</div>
				                </div>
							</div>
                		</div>
              		</div>              
              <!-- End single sidebar -->
            <!-- End blog sidebar -->
          </div>
          
          <div class="col-lg-9 col-md-9 col-sm-12" id="job_list" style="padding-left: 0px; padding-right: 0px;">
          	<div class="loading" style="display: none;">
            	<img src="<?php echo base_url(); ?>assets/panel/img/spinners/spinner_large.gif" alt="" width="64" height="64">
        	</div>
            <!-- BEGAIN BLOG CONTENT -->
            <div class="blogarchive_content" style="border: 1px solid transparent;">
                <!-- BEGAIN SINGLE BLOG -->
                <div class="col-lg-12 col-md-12 col-sm-12" id="landing_job_list_div" style="padding-left: 0px !important;">
	                  <?php if(!empty($jobs)){ foreach($jobs as $job){ ?>
	                  <div class="panel panel-primary" style="margin-bottom: 0 !important; border-bottom: 1px solid #e0e0e0 !important; border-top-color: #FFFFFF !important; border-left-color: #FFFFFF !important; border-right-color: #FFFFFF !important;">
						  <div class="panel-body">
						    <div class="row">
								<div class="col-md-9 col-sm-12">
									<p style="font-size: 12px !important; color: #b3b3b3; font-weight: bold !important; margin: 0 !important;">Job ID -  <?php echo $job->id; ?></p>
									<p style="font-size: 18px; font-weight: 500; margin: 0 !important; color: #212121;">Need a tutor for <?php echo $job->sub_cat; ?> student</p>
									<p style="font-size: 13px !important; margin: 0 !important; font-weight: 500;"><span style="font-weight: 600; color: #212121;">Category : </span><?php echo $job->category; ?>, <?php echo ($job->category == "English Medium")?"<span style='font-weight: 600; color: #212121;'>Curriculum : </span>".ucfirst($job->english_medium_from).",":""?><span style="font-weight: 600; color: #212121;">Class : </span> <?php echo $job->sub_cat; ?><span style="font-weight: 600; color: #212121;">Student Gender : </span> <?php echo $job->student_gender; ?></p>
									<p style="font-size: 13px !important; margin-top: 8px !important; margin-bottom: 0px !important;"><span style="font-weight: 600; color: #212121;">Days per week </span><?php echo $job->days_per_week; ?> , <span style="font-weight: 600; color: #212121;">Salary : </span><?php echo $job->salary_range; ?> Tk, <span style="font-weight: 600;color: #212121;">Tutor gender preference :</span> <?php echo $job->preferred_gender; ?></p>
									<?php if($job->subs != ''){ ?> 
									<p style="font-size: 13px !important; margin-top: 0px !important; margin-bottom: 8px !important;"><span style="font-weight: 600; color: #212121;">Subjects :</span> <?php echo $job->subs; ?></p>	
									<?php } ?>
									
									<p style="padding-top: 7px; padding-bottom: 7px; font-size: 13px !important; font-weight: 600; color: #212121;"><i class="fa fa-map-marker" style="color: #1976d2;"></i> <?php echo $job->city; ?>, <?php echo $job->location; ?></p>
									<p style="font-size: 13px !important;"><span style="font-weight: 600; color: #212121;">Other Requirements - </span><?php echo $job->other_req; ?></p>
								</div>
								<div class="col-md-3 col-sm-12 footer">
									<div class="col-md-12 col-xs-3 outer_share" style="padding-right: 0px;" align="right">
										<div id="inner_share">
											<share-button data-url="<?php echo base_url('landing/job_board_single/'.$job->id); ?>"></share-button>	
										</div>
					                </div>
					                <div class="col-md-12 col-xs-9 apply" style="padding-right: 0px; margin-top: 80px;" align="right">
					                	<!--<button class="btn default-btn pull-right">Apply</button>-->
					                	<a href="<?php echo ($job->status=='done')?'#':base_url()."signin";?>" class="btn default-btn pull-right" style="padding: 3px 12px" type="button"><?php echo ($job->status=='done')?'Solved':'Apply';?></a>
					                	<br /><br />
					                	<!-- <p class="pull-right hidden" style="font-size: 10px">Job posted by <?php //echo $job->full_name; ?></p>  -->
					                	<p class="pull-right" style="font-size: 10px">Posted on 12th November, 2015</p>
					                </div>
								</div>
							</div>
						  </div>
					  </div>
	                  <?php 
	                  }
	                  } else { ?>
	                  <div class="panel panel-primary" style="margin-bottom: 0 !important; border-bottom: 1px solid #e0e0e0 !important; border-top-color: #FFFFFF !important; border-left-color: #FFFFFF !important; border-right-color: #FFFFFF !important;">
							<div class="panel-body">
						  		<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="alert alert-danger" role="alert" style="margin-bottom: 0 !important;">
											<h3 style="margin: 0 !important;"><center><i class="fa fa-meh-o"></i> <b>Oops! No record found.</b></center></h3>
										</div>
									</div>
								</div>
					  		</div>
					  </div>
	                  <?php 
					  }
	                  ?>
                	</div>
                	<div class="modal fade" id="applyJobSignInModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                		<div class="modal_loading" id="modal_loading" style="display: none;">
			            	<img src="<?php echo base_url(); ?>assets/panel/img/spinners/spinner_large.gif" alt="" width="64" height="64">
			        	</div>
						<div class="modal-dialog" style="margin-top: 50px !important;">
					    	<!--<div class="modal-content" style="border-radius: 0px !important;">
					    		<div class="modal-header">
							    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h3 class="modal-title" id="myModalLabel" style="color: #0072bf;">Sign In</h3>
									<hr/>
							    </div>
							    <form class="form-horizontal apply_job_signin_form" id="apply_job_signin_form" method="post" role="form">
							    	<input type="hidden" name="job_id" id="modal_job_id" />
							    	<div class="modal-body">
								  		<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">								    	
										    	<input type="email" class="form-control" required="required" name="tutor_email" placeholder="Please provide your email id" />
										    </div>
											
											<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
										    	<input type="password" class="form-control" required="required" name="tutor_password" placeholder="Enter your password" />
										    </div>
								  		</div>
								  	</div>
							    	
								    <div class="modal-footer">
								    	<button type="button" class="btn btn-back" id="back_to_first_form" style="display: none;">Back</button>
				        				<button type="submit" name="submit_first" class="btn btn-caretutors apply_job_signin" id="apply_job_signin">Continue</button>
				      				</div>
			      				</form>
			      			</div>-->
					    </div>
					</div>
				</div>
            </div>
         </div>
      </div>
   </div>
</section>
    <!--=========== END BLOG SECTION ================-->
	<?php echo $footer;?>