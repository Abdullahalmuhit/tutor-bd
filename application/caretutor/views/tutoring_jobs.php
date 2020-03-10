<?php echo $header;?>
<style>
    .modal-header hr {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    .modal-body {
        padding: 30px !important;
    }

    .modal-footer {
        padding-top: 15px !important;
    }

    body.modal-open {
        overflow: auto !important;
    }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<body class="tutoring-job-body">
    <!-- SCROLL TOP BUTTON -->
    <!--<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>-->
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <?php $this->load->view('frontend_menu'); ?>

    <!--=========== End HEADER SECTION ================-->

    <!--=========== BEGAIN BLOG SECTION ================-->
    <section>

        <div class="job-board-main-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="job-board-header">
                            <h4>Tutor jobs in Dhaka City</h4>
                            <div class="breadcumb">
                                <span><a href="index.html">Home</a></span> <span class="arrow">></span> <span class="bread-active"><a href="job-board.html">Jobs board</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="job-board-body-content">
                            <div class="d-flex justify-content-between job-board-body-header  mb-3">
                                <div class="p-2 job-p">
                                    1 - 25 of 1911 jobs
                                </div>
                                <div class="p-2 job-p">
                                    <span>show</span>
                                    <select name="itemno">
                                        <option value="25" selected="">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    <span>Per Page</span>
                                </div>
                            </div>
                            <!--item1-->
                            <div class="col-lg-12 col-md-12 col-sm-12" id="landing_job_list_div" style="padding-left: 0px !important;">

                                <?php foreach($jobs as $job){ ?>

                                <div class="tutor-post-block">
                                    <div class="tutor-post-header">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h4>Need a tutor for <?php echo $job->sub_cat; ?> student</h4>
                                            </div>
                                            <div class="job-id">
                                                job Id 203
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="p-2 p-r">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span> <?php echo $job->city; ?>, <?php echo $job->location; ?></span>
                                            </div>
                                            <div class="p-2 posted-date p-r">
                                                <?php echo date('jS F, Y',strtotime($job->created_at)); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tutor-post-body-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class=" class">Class: <span> <?php echo $job->sub_cat; ?></span></p>

                                                <?php if($job->subs != ''){ ?>
                                                <p>Subjects : <span class="all-sub"><?php echo $job->subs; ?></span> </p>
                                                <?php } ?>

                                                <?php if($job->tutoring_time != ''){ ?>
                                                <p>Tutoring Time : <span class="time"><?php echo date('h:i a', strtotime($job->tutoring_time)); ?></span> </p>
                                                <?php } ?>
                                                <p>tutoring duration : <span>1 hour</span></p>

                                                <p><?php echo $job->days_per_week; ?> <?php echo $job->days_per_week == 1 ? 'day' : 'days' ?> per week</p>

                                                <p>Salary: <span class="sallery-text"><?php echo $job->salary_range; ?>,</span> </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="tutor-gender">Tutor gender requrement : <span> <?php echo $job->preferred_gender; ?></span> </p>

                                                <p>Requirements : <span></span></p>
                                                <p>Special notes : <span></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tutor-footer-top">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class=" category">Category: <span><?php echo $job->category; ?></span></p>
                                            </div>
                                            <div>
                                                <p class=" gender">Student Gender: <span><?php echo $job->student_gender; ?></span> </p>
                                            </div>
                                            <div>
                                                <p> No. of Students : <span class="student-txt"><?php echo $job->no_of_student; ?></span> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tutor-post-footer text-right">
                                        <?php if ($job->latitude != 0 && $job->longitude != 0): ?>

                                        <button class="btn btn1 get_location" data-map_gen="false" data-map_lat="<?php echo $job->latitude; ?>" data-map_lng="<?php echo $job->longitude; ?>" data-job_id="<?php echo $job->id; ?>" style="padding: 3px 12px" type="button" data-toggle="collapse" data-target="#collapse_<?php echo $job->id; ?>">Job Location</button>
                                        <button class="btn btn2 get_direction" data-map_lat="<?php echo $job->latitude; ?>" data-map_lng="<?php echo $job->longitude; ?>" data-job_id="<?php echo $job->id; ?>" style="padding: 3px 12px" type="button">Get Direction</button>
                                        <button type="button" class="btn btn3">View details</button>
                                        
                                       <button class="btn btn-success  applyJobSignInButton" data-job_id="<?php echo $job->id; ?>" style="padding: 3px 12px" type="button">Apply Now</button>
                                        <?php endif; ?>

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
                                </div>


                                <?php
	                  }
	                  ?>
                            </div>

                           
                        </div>
                         <nav>
                                <center><?php echo $links; ?></center>
                        </nav>
                    </div>
                    <div class="col-md-4">
                        <div class="job-board-filter">
                            <div class="filter-header">
                                <div class="d-flex justify-content-between  mb-3">
                                    <div class="p-2 job-p">
                                        <i class="fas fa-filter"></i>
                                        <span class="f-t">Filter</span>
                                    </div>
                                    <div class="p-2 job-p">
                                        <a href="#"><span><i>Reset all fields</i></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row filter-city-content">
                                <div class="col-xs-12 col-sm-12 col-md-12 no-padding">
                                    <div class="form-group" style="padding-left: 0px;padding-right: 0px;">
                                        <label class="job_board_label">City</label>
                                        <div class="select_label">
                                            <select class="form-control" id="city">
                                                <!-- class="postform" -->
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
                                <div id="location_show" class="col-xs-12 col-sm-12 col-md-12 location-show-checkbox" style="margin-top: 10px; padding-right: 0px;">

                                </div>
                            </div>




                            <div class="filter-category-content">
                                <h4>Category</h4>
                                <div class="row">
                                    <?php if(!empty($category)){ //unset($category[0]);?>
                                    <div id="category_show" class="col-md-12">
                                        <?php foreach ($category as $cat)
												{
												?>
                                        <div class="checkbox">
                                            <label for="category_<?=$cat->id?>" style="font-size:13px;font-family: 'Poppins', sans-serif;cursor: pointer;">

                                                <?php echo "<input type='checkbox' class='category styled' id='category_".$cat->id."' name='category[]' value='".$cat->id."'>"; ?>
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                <?php echo $cat->category; ?>
                                            </label>
                                        </div>
                                        <?php
												}
												?>
                                    </div>

                                    <?php } ?>
                                    <div id="class_show" class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px;">

                                    </div>
                                </div>

                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12 filter-gender-content" style=" margin-bottom: 20px;">
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
            </div>
            
            
              <div class="modal fade tutoring-modal" id="applyJobSignInModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                		<div class="modal_loading" id="modal_loading" style="display: none;">
			            	<img src="<?php echo base_url(); ?>assets/panel/img/spinners/spinner_large.gif" alt="" width="64" height="64">
			        	</div>
						<div class="modal-dialog modal-dialog-centered" style="margin-top: 50px !important;">
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
        $("body").delegate(".get_location", "click", function() {
            // Map Javascript Api
            var job_id = $(this).data('job_id');
            var lat = $(this).data('map_lat');
            var lng = $(this).data('map_lng');
            var gen = $(this).data('map_gen');

            if (gen === false) {
                var tuitionLatLng = {
                    lat: lat,
                    lng: lng
                };

                var map = new google.maps.Map(document.getElementById('map_location_' + job_id), {
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
                $(this).data('map_gen', true);
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

        $("body").delegate(".get_direction", "click", function() {

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
            window.open('https://www.google.com/maps/dir/?api=1&destination=' + $(this).data('map_lat') + ',' + $(this).data('map_lng'), '_blank');
        });

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPgyQ1fqOQy3kgl2xgRgXDeow1C7cot_0" async defer></script>
