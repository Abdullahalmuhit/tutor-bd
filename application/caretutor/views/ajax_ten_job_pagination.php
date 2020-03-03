<?php 
foreach ($jobs as $job)
{
?>
    <div class="md-card" style="margin-bottom: 25px;">
        <div class="md-card-content">
        	<div class="uk-grid" data-uk-grid-margin>
            	<div class="uk-width-medium-3-4 uk-width-large-3-4">
                	<span class="uk-text-bold">Job ID : <?php echo $job->id; ?></span>
                	<h3 class="uk-margin-top-remove uk-margin-bottom-remove">Need a tutor for <?php echo $job->sub_cat; ?> student</h3>
                	<span class="uk-text-bold">Category:</span><span> <?php echo $job->category; ?>,<?php echo ($job->category == "English Medium")?"<span style='font-weight: 600; color: #212121;'>Curriculum : </span>".ucfirst($job->english_medium_from).",":""?> </span><span class="uk-text-bold">Class:</span><span> <?php echo $job->sub_cat; ?></span>,<span class="uk-text-bold">Student Gender:</span><span> <?php echo $job->student_gender; ?></span>
                	<p>
                		<span class="uk-text-bold"><?php echo $job->days_per_week == 1 ? 'day' : 'days' ?> per week:</span><span> <?php echo $job->days_per_week; ?>, </span><span class="uk-text-bold">Salary:</span><span> Tk. <?php echo $job->salary_range; ?>, </span><span class="uk-text-bold">Tuition gender preference:</span><span> <?php echo $job->preferred_gender; ?></span><br>
                		<span class="uk-text-bold">Subjects:</span><span> <?php echo $job->subs; ?></span>
                	</p>
                	<p>
                		<i class="uk-icon-map-marker uk-text-primary"></i><span> <?php echo $job->city; ?>, <?php echo $job->location; ?> </span>
                	</p>
                	<p>
                		<span class="uk-text-bold">Other requirements:</span><span> <?php echo $job->other_req; ?> </span>
                	</p>
                </div>
                <div class="uk-width-medium-1-4 uk-width-large-1-4 uk-position-relative">
                	<div class="uk-text-right">
                		<share-button style="padding-right: 0px !important"></share-button>
                	</div>
                	<div class="uk-text-right uk-position-bottom-right">
                		<?php
                			$tutor_applied_jobs = array();
                			foreach($applied_jobs as $applied_job)
							{
								$tutor_applied_jobs[] = $applied_job['job_id'];
							}
                		?>
                		<div id="apply_button_disabled_<?php echo $job->id; ?>">
                		<?php if(in_array($job->id, $tutor_applied_jobs)){ ?>
                			<div class="uk-width-medium-1">
	                            <a class="md-btn md-btn-flat disabled" style="background: #eaeaea !important;" href="javascript:void(0)">Applied</a>
	                        </div>
                		<!--<a class="uk-badge uk-badge-success uk-badge-square-edge uk-width-1-2 disabled" href="javascript:void(0)">Applied</a>-->
                		<?php } else { ?> 
                		<a class="uk-badge uk-badge-success uk-badge-square-edge uk-width-1-2" style="padding-top: 8px; padding-bottom: 8px; font-size: 14px;" href="#apply_confirmation_<?php echo $job->id; ?>" data-job_id="<?php echo $job->id; ?>" data-uk-modal="{center:true}">Apply</a><br>	
                		<?php } ?>
                		</div>
                		<!--<p class="uk-text-small hidden uk-text-muted uk-margin-top-remove uk-margin-bottom-remove">Job posted by <?php //echo $job->full_name; ?></p>-->
                		<p class="uk-text-small uk-text-muted uk-margin-top-remove uk-margin-bottom-remove">Posted on 12th November, 2015</p>
                	</div>
                </div>
            </div>
        </div>
    </div>
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
<?php 
}
?>
<br />
<nav>
	<center style="border-bottom: none;"><?php echo $links; ?></center>
</nav>