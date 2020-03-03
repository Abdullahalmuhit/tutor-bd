<?php
if($jobs){
foreach ($jobs as $job)
{
?>
   <div class="md-card">
        <div class="md-card-content">
            <div class="uk-grid" data-uk-grid-margin style="position: relative;">
                <div class="uk-width-medium-3-4 uk-width-large-3-4">
                    <p style="font-size: 13px !important; opacity: 0.7;  margin: 0 !important;">Job ID -  <?php echo $job->id; ?></p>
                    <p style="font-size: 20px; font-weight: bold; margin: 0 !important;">Need a tutor for <?php echo $job->sub_cat; ?> student</p>

                    <div class="uk-grid" style="font-size: 13px !important; margin: 7px 0 0 0;">
                        <div class="uk-width-medium-1-4 uk-width-large-1-4" style="padding-left: 0px;padding-right: 0px;">
                            <span style="font-weight: bold; color: #0675c1;">Category : </span><?php echo $job->category; ?>
                        </div>


                        <?php echo ($job->category == "English Medium")?"<div class='uk-width-medium-1-4 uk-width-large-1-4' style='padding-left: 0px;'><span style='font-weight: bold; color: #0675c1;'>Curriculum : </span>".ucfirst($job->english_medium_from)."</div>":""?>

                        <div class="uk-width-medium-1-4 uk-width-large-1-4" style="<?php echo ($job->category == "English Medium")?'padding-left: 0px;':''?>">
                            <span style="font-weight: bold; color: #0675c1;">Class : </span> <?php echo $job->sub_cat; ?>
                        </div>
                        <div class="uk-width-medium-1-4 uk-width-large-1-4" style="padding-left: 0px;">
                            <span style="font-weight: bold; color: #0675c1;">Student Gender : </span> <?php echo $job->student_gender; ?>
                        </div>



                    </div>
                        <div class="uk-width-medium-1-1 uk-width-large-1-1" style="padding-left: 0px;margin-top: 8px;">
                            <span style="font-weight: bold; font-size: 12px;"><?php echo $job->days_per_week; ?> <?php echo $job->days_per_week == 1 ? 'day' : 'days' ?> per week </span>
                        </div>

                   <p style="font-size: 12px !important; margin-top: 0px !important; margin-bottom: 0px !important;"><span style="font-weight: bold;">Salary : </span><?php echo $job->salary_range; ?> Tk, <span style="font-weight: 600;color: #212121;">Tutor gender preference :</span> <?php echo $job->preferred_gender; ?>, <span style="font-weight: 600;color: #212121;">No. of Students :</span> <?php echo $job->no_of_student; ?></p>

                    <?php if($job->subs != ''){ ?>
                    <p style="font-size: 12px !important; margin-top: 0px !important; margin-bottom: 0px !important;"><span style="font-weight: bold;">Subjects :</span> <?php echo $job->subs; ?></p>
                    <?php } ?>

                    <?php if($job->tutoring_time != ''){ ?>
                    <p style="font-size: 12px !important; margin-top: 0px !important; margin-bottom: 8px !important;"><span style="font-weight: bold;">Tutoring Time :</span> <?php echo date('h:i a', strtotime($job->tutoring_time)); ?></p>
                    <?php } ?>

                    <p style="padding-top: 7px; padding-bottom: 7px; font-size: 14px !important; font-weight: normal;">
                        <i class="uk-icon-map-marker" style="color: #fff; width: 30px; height: 30px; border-radius: 50%; background: #0675c1; text-align: center; vertical-align: middle; line-height: 30px; font-size: 17px;"></i> <?php echo $job->city; ?>, <?php echo $job->location; ?>
                    </p>
                    <p style="font-size: 12px !important; opacity: 0.7;"><span style="">Other Requirements - </span><?php echo $job->other_req; ?></p>

                </div>
                <div class="uk-width-medium-1-4 uk-width-large-1-4 uk-position-relative" style="margin-top: 24px;">

                    <div class="uk-text-right uk-position-bottom-right">
                        <?php
                        $tutor_applied_jobs = array();
                        foreach ($applied_jobs as $applied_job) {
                            $tutor_applied_jobs[] = $applied_job['job_id'];
                        }
                        ?>
                        <div id="apply_button_disabled_<?php echo $job->id; ?>">
                            <?php if (in_array($job->id, $tutor_applied_jobs)) { ?>
                                <div class="uk-width-medium-1">
                                    <a class="md-btn md-btn-flat disabled" style="background: #eaeaea !important;" href="javascript:void(0)">Applied</a>
                                </div>
                                <!--<a class="uk-badge uk-badge-success uk-badge-square-edge uk-width-1-2 disabled" href="javascript:void(0)">Applied</a>-->
                            <?php } else { ?>
                                <div class="uk-grid" style="margin: 10px 0px 10px 0px">
                                    <?php if ($job->latitude != 0 && $job->longitude != 0): ?>
                                        <!-- Map Javascript Api -->
                                        <a class="get_location uk-badge uk-badge-danger uk-badge-square-edge uk-width-1-3" style="padding: 8px !important; font-size: 14px;" href="javascript::" data-map_gen="false" data-map_lat="<?php echo $job->latitude ?>" data-map_lng="<?php echo $job->longitude ?>" data-job_id="<?php echo $job->id; ?>">Location</a><br>
                                        <!-- <a class="get_direction uk-badge uk-badge-warning uk-badge-square-edge uk-width-1-3" style="padding: 8px !important; font-size: 14px;" href="javascript::" data-map_lat="<?php echo $job->latitude ?>" data-map_lng="<?php echo $job->longitude ?>" data-job_id="<?php echo $job->id; ?>">Direction</a><br> -->

                                        <!-- Map Static Api -->
                                        <!-- <a class="get_location uk-badge uk-badge-danger uk-badge-square-edge uk-width-1-3" style="padding: 8px !important; font-size: 14px;" href="javascript::" data-map_gen="false" data-map_lat="<?php echo $job->latitude ?>" data-map_lng="<?php echo $job->longitude ?>" data-job_id="<?php echo $job->id; ?>">Location</a><br> -->
                                        <a class="get_direction uk-badge uk-badge-warning uk-badge-square-edge uk-width-1-3" style="padding: 8px !important; font-size: 14px;" href="javascript::" data-map_lat="<?php echo $job->latitude ?>" data-map_lng="<?php echo $job->longitude ?>" data-job_id="<?php echo $job->id; ?>">Direction</a><br>
                                    <?php endif; ?>
                                    <a class="uk-badge uk-badge-success uk-badge-square-edge uk-width-1-3" style="padding: 8px !important; font-size: 14px;" href="#apply_confirmation_<?php echo $job->id; ?>" data-job_id="<?php echo $job->id; ?>" data-uk-modal="{center:true}">Apply</a><br>
                                </div>
                            <?php } ?>
                        </div>
                        <!--<p class="uk-text-small hidden uk-text-muted uk-margin-top-remove uk-margin-bottom-remove">Job posted by <?php //echo $job->full_name;  ?></p>-->
                        <p style="font-size: 12px; opacity: 0.7;">Posted on <?php echo date('jS F, Y', strtotime($job->created_at)); ?></p>
                    </div>
                </div>

                <div class="outer_share" style="position: absolute;right: 0;top: 0;">
                    <div id="inner_share">
                        <share-button style="color: #1f2c44;" data-url="<?php echo base_url('landing/job_board_single/'.$job->id); ?>" data-title="Need a tutor for <?php echo $job->sub_cat; ?> student"></share-button>
                    </div>
                </div>
            </div>
            <br>
            <div id="collapse_<?php echo $job->id ?>" class="uk-hidden">
                <div class="uk-grid" data-uk-grid-margin style="margin: 10px 0px 10px 3px; position: relative">
                    <div class="uk-width-medium-4-4 uk-width-large-4-4 uk-text-right">
                        <button id="close_map" data-job_id="<?php echo $job->id; ?>" class="uk-badge uk-badge-danger uk-badge-square-edge" style="width: 10px 5px 10px 5px" type="button" name="button">X</button>
                    </div>
                    <!-- Map Javascript Api -->
                    <div class="uk-width-medium-4-4 uk-width-large-2-4"></div>
                    <div class="uk-width-medium-4-4 uk-width-large-2-4" id="map_location_<?php echo $job->id; ?>" style="height: 300px"></div>
                    <!-- <div class="uk-width-medium-2-4 uk-width-large-2-4" id="map_direction_panel_<?php echo $job->id; ?>" style="height: 300px; overflow: scroll"></div> -->

                    <!-- Map Static Api -->
                    <!-- <div class="uk-width-medium-4-4 uk-width-large-2-4" id="static_api_image_<?php echo $job->id; ?>" style="height: 300px"></div> -->
                    <!-- <div class="uk-width-medium-4-4 uk-width-large-4-4" style="padding-left: 0 !important">
                        <hr>
                        <p>The exact location of this tuition job is inside this 100-meter circle</p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<br />
<nav>
	<center style="border-bottom: none;"><?php echo $links; ?></center>
</nav>


<?php foreach ($jobs as $job){ ?>
        <div class="uk-modal" id="apply_confirmation_<?php echo $job->id; ?>">
	        <div class="uk-modal-dialog">
	        	<button class="uk-modal-close uk-close" type="button"></button>
	                <div class="uk-modal-header" style="border-bottom: 1px solid #ddd !important;">
	                    <h3 class="uk-modal-title">Please Confirm</h3>
	                </div>

                	<div class="uk-margin-medium-bottom" id="generic_question_div_<?php echo $job->id; ?>">
			        	<p>You are applying to teach a <b><?php echo $job->student_gender; ?> <?php echo $job->category; ?></b> student of <b><?php echo $job->sub_cat; ?></b>.</p>
			        	<p>You have to teach <b><?php echo $job->days_per_week; ?> <?php echo $job->days_per_week == 1 ? 'day' : 'days' ?> per week</b> and you'll be paid <b>BDT <?php echo $job->salary_range; ?></b> per month.</p>
			        	<p>Are you sure to apply for this job?</p>
			        </div>

	                <div class="uk-modal-footer" id="uk_modal_footer_<?php echo $job->id; ?>">
		                <div class="uk-form-row">
		                    <button type="button" class="uk-float-right md-btn md-btn-primary apply_job_yes" data-salary_range="<?php echo $job->salary_range; ?>" data-days_per_week="<?php echo $job->days_per_week; ?>" data-student_gender="<?php echo $job->student_gender; ?>" data-sub_cat="<?php echo $job->sub_cat; ?>" data-category="<?php echo $job->category; ?>" data-job_id="<?php echo $job->id; ?>">Yes</button>
		                    <button type="button" id="btnNo" class="uk-modal-close uk-float-right md-btn md-btn-warning apply_job_no">No</button>
		                </div>
		            </div>
	        </div>
		</div>
		<?php } ?>

<?php } else { ?>
<div class="uk-alert uk-alert-danger" data-uk-alert>
    <a href="#" class="uk-alert-close uk-close"></a>
    <center style="font-size: 16px; border-bottom: none;color: #fff;"> No job available </center>
</div>
<?php } ?>

<script>
		new ShareButton({
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
		});
	</script>
