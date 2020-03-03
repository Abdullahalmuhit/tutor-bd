<?php echo $header;?>
<body> 
     

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
		<div class="menu_area">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
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
							<li><a href="<?php echo base_url(); ?>register/tutor" class="slider_btn" id="become_a_tutor">Become a Tutor</a></li>                           
						</ul>           
					</div><!--/.nav-collapse -->
				</div>     
			</nav>  
		</div>
      <!-- END MENU -->

    </header>

    <!--=========== End HEADER SECTION ================--> 

    <!--=========== BEGIN BLOG BANNER SECTION ================-->
    <!-- <section id="blogBanner">
      <div class="container">
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <h2>Blog Archive</h2>
        </div>
      </div>
      </div>
    </section> -->
    <!--=========== END BLOG BANNER SECTION ================-->

    <!--=========== BEGAIN BLOG SECTION ================-->
    <section id="blog">
      <div class="container">
        <div class="row">         
          
          <div class="col-lg-12 col-md-12 col-sm-12">
	          <div class="panel panel-primary">
		          <div class="panel-heading">
		          	Available Job
		          </div>
		      </div>
	      </div>
          
          <div class="col-lg-4 col-md-4 col-sm-12">
            <!-- Start blog sidebar -->
              <!-- Start single sidebar -->
              <div class="panel panel-primary">
              	<div class="panel-heading">Search</div>
				<div class="panel-body">
	                <select class="postform input-lg" id="city"> <!-- class="postform" -->
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
	                
	                <div id="location_show" class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px;">
						  		
					</div>
					
	                
	                <br />
                    <div id="category_show" class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px;">
						<?php if(!empty($category)){ unset($category[0]);?>
							<legend style="text-align: left;"><h5><span></span><b> Category </b></h5></legend>
							<div>
								<?php foreach ($category as $cat)
										{
											echo "<input type='checkbox' class='category' name='category[]' value='".$cat->id."'> ".$cat->category."<br/>";
										}
								?>
								<!--<?php
									if (count($category)>2)
									{
										$number = 1;
										$num = ceil((count($category))/2);
										foreach ($category as $cat)
										{
											if ($number == 1)
											{
												echo "<div class='col-xs-6 col-md-6' style='float: left; text-align: left; padding-left: 5px;'>";
											}
											echo "<input type='checkbox' class='category' name='category[]' value='".$cat->id."'> ".$cat->category."<br/>";
											if ($number == $num)
											{
												echo "</div>";
												$number = 1;
												continue;
											}
											$number++;
										}
										
										if ($number != 1)
										{
											echo "</div>";
										}
									}
									else 
									{
										echo "<div class='col-xs-6 col-md-6' style='float: left; text-align: left; padding-left: 5px;'>";
										foreach ($category as $cat)
										{
											echo "<input type='checkbox' class='category' name='category[]' id='sdg' value='".$cat->id."'> ".$cat->category."<br/>";
										}
										echo "</div>";
									}
								?>-->
							</div>
					<?php } ?>
					</div>
	                
	                <div id="class_show" class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px;">
						  		
					</div>
	                <br />
	                
	                <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px; margin-bottom: 10px;">
	                	<legend style="text-align: left;"><h5><span></span><b>	Gender </b></h5></legend>
	                	<div class='col-xs-6 col-md-6' style='float: left; text-align: left; padding-left: 5px;'>
	                		<input type='checkbox' class='gender' name='gender[]' value='Male' checked="checked">		Male
	                	</div>
	                	
	                	<div class='col-xs-6 col-md-6' style='float: left; text-align: left; padding-left: 5px;'>
	                		<input type='checkbox' class='gender' name='gender[]' value='Female' checked="checked">	Female
	                	</div>
	                </div>
                </div>
              </div>
              <!-- End single sidebar -->
            <!-- End blog sidebar -->
          </div>
          
          <div class="col-lg-8 col-md-8 col-sm-12">
          	<div class="loading" style="display: none;">
            	<img src="<?php echo base_url(); ?>assets/panel/img/spinners/spinner_large.gif" alt="" width="64" height="64">
        	</div>
            <!-- BEGAIN BLOG CONTENT -->
            <div class="blogarchive_content">
                <!-- BEGAIN SINGLE BLOG -->
                <div class="col-lg-12 col-md-12 col-sm-12" id="landing_job_list_div">
                	<div class="panel panel-primary">
			          <div class="panel-heading job_count_header">
			          	Total <?php echo $count_job; ?> job found.
			          </div>
			      	</div>
	                  <?php foreach($jobs as $job){ ?>
	                  <div class="panel panel-primary">
						  <div class="panel-heading">Need a <?php echo $job->category; ?> Tutor</div>
						  <div class="panel-body">
						    <div class="row">
								<div class="col-md-6">
									<p><b>Job ID :</b> <?php echo $job->id; ?></p>
									<p><b>Category :</b> <?php echo $job->category; ?></p>
									<p><b>Class :</b> <?php echo $job->sub_cat; ?></p>
									<p><b>Subjects :</b> <?php echo $job->subs; ?></p>
									<p><b>City :</b> <?php echo $job->city; ?></p>
									<p><b>Location :</b> <?php echo $job->location; ?></p>
								</div>
								<div class="col-md-6">
									<p><b>Salary :</b> <?php echo $job->salary_range; ?> Tk.</p>
									<p><b>Days/Week :</b> <?php echo $job->days_per_week; ?></p>
									<p><b>Tutor Gender Preference :</b> <?php echo $job->preferred_gender; ?></p>
									<p><b>Other Requirements :</b> <?php echo $job->other_req; ?></p>
								</div>
							</div>
						  </div>
						  <div class="panel-footer">
						  	<div class="row">
							  		<div class="col-md-6 col-xs-6">
					                 <!--<ul class="sociallink_nav" style="text-align: left;">
					                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
					                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
					                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
					                  <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
					                </ul>-->
					                	<share-button></share-button>
					                </div>
					                <div class="col-md-6 col-xs-6">
					                	<!--<button class="btn default-btn pull-right">Apply</button>-->
					                	<a href="<?php echo ($job->status=='done')?'#':base_url()."signin";?>" class="btn default-btn pull-right" type="button"><?php echo ($job->status=='done')?'Solved':'Apply';?></a>
					                </div>
				             </div>   
						  </div>
					  </div>
	                  <?php 
	                  }
	                  ?>
	                  <br />
	                  <nav>
			            <!--<ul class="pagination wow fadeInLeft">
			              <li><a href="#"><span aria-hidden="true"><<</span><span class="sr-only">Previous</span></a></li>
			              <li><a href="#">1</a></li>
			              <li><a href="#">2</a></li>
			              <li><a href="#">3</a></li>
			              <li><a href="#">4</a></li>
			              <li><a href="#">5</a></li>
			              <li><a href="#"><span aria-hidden="true">>></span><span class="sr-only">Next</span></a></li>
			            </ul>-->
			            <center><?php echo $links; ?></center>
		          	</nav>
                </div>              
           
            </div>
            
          </div>
          
        </div>
      </div>
    </section>
    <!--=========== END BLOG SECTION ================-->

	<?php echo $footer;?>