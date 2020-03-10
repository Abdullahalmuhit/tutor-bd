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
                                    <button type="button" class="btn btn4">Apply now</button>
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
  <br />
  	<nav>
    	<center><?php echo $links; ?></center>
	</nav>
<script>
	/*new ShareButton({
		ui: {
		    flyout: "bottom left"
		},
		networks: {
		    facebook: {
				url: BASE_URL+'landing/job_board_single',
				app_id: '1658313664440003',
				title: 'My Choiced Job',
				caption: 'Caption fo Care',
				description: 'Great Job',
				image: 'http://caretutors.com/assets/img/caretutors_logo.png'
		    },
		    linkedin: {
				url: BASE_URL+'landing/job_board_single',
				title: 'My Choiced Job',
				description: 'Great Job'
		    },
		    googlePlus: {
				url: BASE_URL+'landing/job_board_single'
		    },
		    twitter: {
		        enabled: false
		    },
		      pinterest: {
		        enabled: false
		      },
		      reddit: {
		        enabled: false
		      },
		      whatsapp: {
		        enabled: false
		      },
		      email: {
		        enabled: false
		      }
		  }
	});*/

	new ShareButton({
		ui: {
		    flyout: "bottom left"
		},
		networks: {
		    facebook: {
				//url: BASE_URL+'landing/job_board_single',
				before: function(element) {
		        	this.url = element.getAttribute("data-url");
		        	this.title = element.getAttribute("data-title");
		        	this.description = element.getAttribute("data-title");
				},
				app_id: '1658313664440003',
				caption: 'Caption fo Care',
				image: BASE_URL+'/assets/img/caretutors_logo.png'
		    },
		    linkedin: {
				//url: BASE_URL+'landing/job_board_single',
				before: function(element) {
		        	this.url = element.getAttribute("data-url");
		        	this.title = element.getAttribute("data-title");
				},
				title: 'My Choiced Job',
				description: 'Great Job'
		    },
		    googlePlus: {
				//url: BASE_URL+'landing/job_board_single'
				before: function(element) {
		        	this.url = element.getAttribute("data-url");
				},
		    },
		    twitter: {
		        enabled: false
		    },
		      pinterest: {
		        enabled: false
		      },
		      reddit: {
		        enabled: false
		      },
		      whatsapp: {
		        enabled: false
		      },
		      email: {
		        enabled: false
		      }
		  }
	});
</script>
