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

					<p style="font-size: 12px !important; margin-top: 0px !important; margin-bottom: 0px !important;"><span style="font-weight: bold;">Salary : </span><?php echo $job->salary_range; ?> Tk, <span style="font-weight: 600;color: #212121;">Tutor gender preference :</span> <?php echo $job->preferred_gender; ?>, <span style="font-weight: 600;color: #212121;">No. of Students :</span> <?php echo $job->no_of_student; ?></p></p>

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
                	<button class="btn btn-success  applyJobSignInButton" data-job_id="<?php echo $job->id; ?>" style="padding: 3px 12px" type="button"><?php echo ($job->status=='done')?'Solved':'Apply Now';?></button>
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
