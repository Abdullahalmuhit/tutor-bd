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
</style>
<body>
    <!-- SCROLL TOP BUTTON -->
    <!--<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>-->
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
   <?php $this->load->view('frontend_menu'); ?>

    <!--=========== End HEADER SECTION ================-->

    <!--=========== BEGAIN BLOG SECTION ================-->
    <section id="blog">
      	<div class="container container_body" style="padding-top: 70px;">
      		<div class="row">
          		<div class="col-lg-4 col-md-4 col-sm-12" id="filter_div">
            		<!-- Start blog sidebar -->
              		<!-- Start single sidebar -->
              		<div class="panel panel-primary">
						<div class="panel-body">
							<div class="row">
								<h1 class="panel-heading">JOB SEARCH</h1>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group" style="padding-left: 0px;padding-right: 0px;">
										<label class="job_board_label">City</label>
										<div class="select_label">
					                		<select class="form-control" id="city"> <!-- class="postform" -->
					                			<option value="">Select One</option>
							                  	<?php
												foreach ($city as $cit)
												{
												?>
													<option value="<?php echo ($cit->city == 'Select City')?'1':$cit->id; ?>"><?php echo $cit->city; ?></option>
												<?php
												}
												?>
							                </select>
				                		</div>
									</div>
								</div>

								<div id="location_show" class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px; padding-right: 0px;">

								</div>

								<div id="category_show" class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group" style="padding-left: 0px;padding-right: 0px;">
										<?php if(!empty($category)){ //unset($category[0]);?>
											<label for="category"> Category </label>
											<div>
												<?php foreach ($category as $cat)
												{
												?>
												<div class="styled-input-single">
												<?php echo "<input type='checkbox' class='category styled' id='category_".$cat->id."' name='category[]' value='".$cat->id."'>"; ?>
												<label for="category_<?=$cat->id?>" class="input-label-checkbox">
						                            <?php echo $cat->category; ?>
						                        </label>
												</div>
												<?php
												}
												?>
											</div>
										<?php } ?>

									</div>
								</div>

								<div id="class_show" class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px;">

						  		</div>

						  		<div class="col-xs-12 col-sm-12 col-md-12" style=" margin-bottom: 20px;">
						  			<div class="form-group" style="padding-left: 0px;padding-right: 0px;">
						  				<div class='col-xs-12 col-md-12' style="padding-left: 0px;padding-right: 0px;">
						  					<label> Gender </label>
						  				</div>
					                	<div class='col-xs-6 col-md-6' style='float: left; text-align: left; padding-left: 0px;'>
					                		<div class="styled-input-single">
					                			<input type='checkbox' id="Male" class='gender styled' name='gender[]' value='Male' checked="checked">
						                        <label for="Male" class="input-label-checkbox">
						                            Male
						                        </label>
						                    </div>
					                	</div>

					                	<div class='col-xs-6 col-md-6' style='float: left; text-align: left; padding-left: 5px;'>
					                		<div class="styled-input-single">
					                			<input type='checkbox' id="Female" class='gender styled' name='gender[]' value='Female' checked="checked">
						                        <label for="Female" class="input-label-checkbox">
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

          <div class="col-lg-8 col-md-8 col-sm-12" id="job_list">
          	<div class="loading" style="display: none;">
            	<img src="<?php echo base_url(); ?>assets/panel/img/spinners/spinner_large.gif" alt="" width="64" height="64">
        	</div>

			<!-- <a class="pull-right" target="blank" style="color: #0675c1; font-size: 16px; margin: 15px" href="<?php echo site_url('landing/mapview') ?>">Our Coverage</a> -->
            <!-- BEGAIN BLOG CONTENT -->
            <div class="blogarchive_content" style="border: 1px solid transparent;">
                <!-- BEGAIN SINGLE BLOG -->
                <div class="col-lg-12 col-md-12 col-sm-12" id="landing_job_list_div" style="padding-left: 0px !important;">
			          <!--<div class="">
			          	<p style="font-weight: normal; color: #666; text-align: center; border-bottom: 1px solid #e0e0e0; padding: 10px; font-size: 16px;">
			          		Total <?php echo $count_job; ?> job found.
			          	</p>
			          </div>-->
	                  <?php foreach($jobs as $job){ ?>
	                  <div class="panel panel-primary" style="margin-bottom: 25px !important; border: 0; ">
						  <div class="panel-body" style="padding: 28px 19px 28px 30px;">
						    <div class="row" style="position: relative;">
								<div class="col-md-12 col-sm-12">
									<p style="font-size: 13px !important; opacity: 0.7;  margin: 0 !important;">Job ID -  <?php echo $job->id; ?></p>

									<p style="font-size: 20px; font-weight: bold; margin: 0 !important;">Need a tutor for <?php echo $job->sub_cat; ?> student</p>


									<div class="row" style="font-size: 13px !important; margin: 7px 0 0 0;">
										<div class="col-md-3 col-sm-12" style="padding-left: 0px;padding-right: 0px;">
											<span style="font-weight: bold; color: #0675c1;">Category : </span><?php echo $job->category; ?>
										</div>


										<?php echo ($job->category == "English Medium")?"<div class='col-md-3 col-sm-12' style='padding-left: 0px;'><span style='font-weight: bold; color: #0675c1;'>Curriculum : </span>".ucfirst($job->english_medium_from)."</div>":""?>

										<div class="col-md-3 col-sm-12" style="<?php echo ($job->category == "English Medium")?'padding-left: 0px;':'padding-left: 0px;'?>">
											<span style="font-weight: bold; color: #0675c1;">Class : </span> <?php echo $job->sub_cat; ?>
										</div>
										<div class="col-md-3 col-sm-12" style="padding-left: 0px;">
											<span style="font-weight: bold; color: #0675c1;">Student Gender : </span> <?php echo $job->student_gender; ?>
										</div>

										<div class="col-md-12 col-sm-12" style="padding-left: 0px;margin-top: 8px;">
											<span style="font-weight: bold; font-size: 12px;"><?php echo $job->days_per_week; ?> <?php echo $job->days_per_week == 1 ? 'day' : 'days' ?> per week </span>
										</div>

									</div>
								</div>
								<div class="col-md-7 col-sm-12">

									<p style="font-size: 12px !important; margin-top: 0px !important; margin-bottom: 0px !important;"><span style="font-weight: bold;">Salary : </span><?php echo $job->salary_range; ?> Tk, <span style="font-weight: 600;color: #212121;">Tutor gender preference :</span> <?php echo $job->preferred_gender; ?>, <span style="font-weight: 600;color: #212121;">No. of Students :</span> <?php echo $job->no_of_student; ?></p>

									<?php if($job->subs != ''){ ?>
									<p style="font-size: 12px !important; margin-top: 0px !important; margin-bottom: 0px !important;"><span style="font-weight: bold;">Subjects :</span> <?php echo $job->subs; ?></p>
									<?php } ?>

									<?php if($job->tutoring_time != ''){ ?>
									<p style="font-size: 12px !important; margin-top: 0px !important; margin-bottom: 8px !important;"><span style="font-weight: bold;">Tutoring Time :</span> <?php echo date('h:i a', strtotime($job->tutoring_time)); ?></p>
									<?php } ?>

									<p style="padding-top: 7px; padding-bottom: 7px; font-size: 14px !important; font-weight: normal;">
										<i class="fa fa-map-marker" style="color: #fff; width: 30px; height: 30px; border-radius: 50%; background: #0675c1; text-align: center; vertical-align: middle; line-height: 30px; font-size: 17px;"></i> <?php echo $job->city; ?>, <?php echo $job->location; ?>
									</p>
									<p style="font-size: 12px !important; opacity: 0.7;"><span style="">Other Requirements - </span><?php echo $job->other_req; ?></p>
								</div>
								<div class="col-md-5 col-sm-12 footer" style="padding-left: 0px;">

					                <div class=" apply" style="padding-right: 0px;">
					                	<!--<button class="btn default-btn pull-right">Apply</button>
					                		<?php echo ($job->status=='done')?'#':base_url()."signin";?>
					                	-->
										<?php if ($job->latitude != 0 && $job->longitude != 0): ?>
											<!-- Map Javascript Api -->
											<button class="btn btn-danger get_location" data-map_gen="false" data-map_lat="<?php echo $job->latitude; ?>" data-map_lng="<?php echo $job->longitude; ?>" data-job_id="<?php echo $job->id; ?>" style="padding: 3px 12px" type="button" data-toggle="collapse" data-target="#collapse_<?php echo $job->id; ?>">Job Location</button>
											<!-- <button class="btn btn-warning get_direction" data-map_lat="<?php echo $job->latitude; ?>" data-map_lng="<?php echo $job->longitude; ?>" data-job_id="<?php echo $job->id; ?>" style="padding: 3px 12px" type="button" data-toggle="collapse" data-target="#collapse_<?php echo $job->id; ?>">Get Direction</button> -->

											<!-- Map Static Api -->
											<!-- <button class="btn btn-danger get_location" data-map_gen="false" data-map_lat="<?php echo $job->latitude; ?>" data-map_lng="<?php echo $job->longitude; ?>" data-job_id="<?php echo $job->id; ?>" style="padding: 3px 12px" type="button" data-toggle="collapse" data-target="#collapse_<?php echo $job->id; ?>">Job Location</button> -->
											<button class="btn btn-warning get_direction" data-map_lat="<?php echo $job->latitude; ?>" data-map_lng="<?php echo $job->longitude; ?>" data-job_id="<?php echo $job->id; ?>" style="padding: 3px 12px" type="button">Get Direction</button>
										<?php endif; ?>
					                	<button class="btn btn-success  applyJobSignInButton" data-job_id="<?php echo $job->id; ?>" style="padding: 3px 12px" type="button">Apply Now</button>
					                	<br /><br />
					                	<!--<p class="pull-right hidden" style="font-size: 10px">Job posted by <?php //echo $job->full_name; ?></p> -->
					                	<p class="" style="font-size: 12px; opacity: 0.7;">Posted on <?php echo date('jS F, Y',strtotime($job->created_at)); ?></p>
					                </div>
								</div>

								<!-- Map Javascript Api -->
								<div class="col-md-12 collapse" id="collapse_<?php echo $job->id; ?>">
									<div class="row">
										<div class="col-md-12">
											<div id="map_location_<?php echo $job->id; ?>" style="height: 300px; width: 100%; padding-top: 10px"></div>
										</div>
										<!-- <div class="col-md-6">
											<div id="map_direction_panel_<?php echo $job->id; ?>" style="height: 300px; width: 100%; padding-top: 10px; overflow: scroll"></div>
										</div> -->
										<div class="col-md-12">
											<br>
											<hr>
											<p>The exact location of this tuition job is inside this 100-meter circle</p>
										</div>
									</div>
								</div>

								<!-- Map Static Api -->
								<!-- <div class="col-md-12 collapse" id="collapse_<?php echo $job->id; ?>">
									<div class="static_api_image_<?php echo $job->id; ?>"></div>
								</div>

								<div class="outer_share">
									<div id="inner_share">
										<share-button style="color: #1f2c44;" data-url="<?php echo base_url('landing/job_board_single/'.$job->id); ?>" data-title="Need a tutor for <?php echo $job->sub_cat; ?> student"></share-button>
									</div>
				                </div> -->
							</div>
						  </div>
					  </div>
	                  <?php
	                  }
	                  ?>
	                  <br />
	                  	<nav>
			            	<center><?php echo $links; ?></center>
		          		</nav>
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
<style media="screen">
	@media only screen and (max-width: 600px) {
		.map-static-image {
			width: 100%;
		}
	}
</style>
<script type="text/javascript">
	$( "body" ).delegate( ".get_location", "click", function() {
		// Map Javascript Api
		var job_id = $(this).data('job_id');
		var lat = $(this).data('map_lat');
		var lng = $(this).data('map_lng');
		var gen = $(this).data('map_gen');

		if (gen === false) {
			var tuitionLatLng = {lat: lat, lng: lng};
			
			var map = new google.maps.Map(document.getElementById('map_location_'+job_id), {
				zoom: 17,
				center: tuitionLatLng,
				gestureHandling: 'greedy'
			});
			
			var marker = new google.maps.Marker({
				position: tuitionLatLng,
				map: map,
				icon: "<?php echo base_url('assets/img/mini_marker.png') ?>"
				// title: 'Hello World!'
			});
			
			var sunCircle = {
		        strokeColor: "#0675c1",
		        strokeOpacity: 0.8,
		        strokeWeight: 2,
		        fillColor: "#0675c1",
		        fillOpacity: 0.35,
		        map: map,
		        center: tuitionLatLng,
		        radius: 100 // in meters
		    };
		    cityCircle = new google.maps.Circle(sunCircle)
		    cityCircle.bindTo('center', marker, 'position');
		    $(this).data('map_gen',true);
		}

		// Map Static Api
		// var job_id = $(this).data('job_id');
		// var gen = $(this).data('map_gen');
		// var lat = $(this).data('map_lat');
		// var lng = $(this).data('map_lng');

		// var mq = window.matchMedia( "(max-width: 600px)" );
		// var size = '650x250';
		// var zoom = '17';
		// if (mq.matches) {
		// 	size = '300x250';
		// 	zoom = '16';
		// }

		// if (gen === false) {
		// 	$('.static_api_image_'+job_id).html('<img class="map-static-image" src="https://maps.googleapis.com/maps/api/staticmap?center='+ lat +','+ lng +'&zoom='+ zoom +'&size='+ size +'&maptype=roadmap&markers=label:C%7Ccolor:red%7C'+ lat +','+ lng +'&key=AIzaSyCdo_CRxtGWcZOr7MxI2ihcSr9d-t0V_Kk">');
		// 	$(this).data('map_gen',true);
		// }

	});

	$( "body" ).delegate( ".get_direction", "click", function() {

		// Map Javascript Api

		// var job_id = $(this).data('job_id');
		// var lat = $(this).data('map_lat');
		// var lng = $(this).data('map_lng');
		//
		// $('#map_direction_panel_'+job_id).parents('.col-md-6').removeClass('hidden');
		//
		// var tuitionLatLng = {lat: lat, lng: lng};
		//
		// if( navigator.geolocation ) {
	    //    navigator.geolocation.getCurrentPosition( success, fail );
	    // } else {
	    //    alert("Sorry, your browser does not support geolocation services.");
	    // }
		//
		// function success(position) {
		// 	var myLat = position.coords.latitude;
		// 	var myLng = position.coords.longitude;
		//
		// 	var myLatLng = {lat: myLat, lng: myLng};
		// 	console.log(myLatLng);
		//
		// 	var directionsService = new google.maps.DirectionsService();
		// 	var directionsDisplay = new google.maps.DirectionsRenderer();
		//
		// 	var map = new google.maps.Map(document.getElementById('map_location_'+job_id), {
		// 		zoom:16,
		// 		mapTypeId: google.maps.MapTypeId.ROADMAP,
		// 		gestureHandling: 'greedy'
		// 	});
		//
		// 	directionsDisplay.setMap(map);
		// 	directionsDisplay.setPanel(document.getElementById('map_direction_panel_'+job_id));
		//
		// 	var request = {
		// 		origin: myLatLng,
		// 		destination: tuitionLatLng,
		// 		travelMode: google.maps.DirectionsTravelMode.DRIVING
		// 	};
		//
		// 	directionsService.route(request, function(response, status) {
		// 		if (status == google.maps.DirectionsStatus.OK) {
		// 			directionsDisplay.setDirections(response);
		// 		}
		// 	});
		//
		// }
		//
		// function fail() {
		// 	// Could not obtain location
		// }

		// Redirect to Google
		window.open('https://www.google.com/maps/dir/?api=1&destination='+ $(this).data('map_lat') +','+ $(this).data('map_lng'), '_blank');
	});
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPgyQ1fqOQy3kgl2xgRgXDeow1C7cot_0" async defer></script>