<div class="col-md-3">
	<div class="panel panel-default">
		<div class="panel-heading" style="text-align: left;">
			<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-cog"></i> My Menu</b></h5>
		</div>
		<div class="panel-body" style="padding: 0px;">
			<div class="settings_list">
				<ul>
					<li class="<?php echo ($profile->step_no<1)?'disabled':''; ?>"><a href="<?php echo base_url();?>tutor/dashboard"><span><i class="fa fa-user"></i> </span> Profile</a></li>
					<li class="<?php echo ($profile->step_no<2)?'disabled':''; ?>"><a href="<?php echo base_url();?>tutor/tutor_personal_info"><span><i class="fa fa-info"></i> </span> Personal Information</a></li>
					<li class="<?php echo ($profile->step_no<3)?'disabled':''; ?>"><a href="<?php echo base_url();?>tutor/tutor_edu_info"><span><i class="fa fa-graduation-cap"></i> </span> Educational Information</a></li>
					<li class="<?php echo ($profile->step_no<4)?'disabled':''; ?>"><a href="<?php echo base_url();?>tutor/tution_info"><span><i class="fa fa-graduation-cap"></i> </span> Tuition Related Information</a></li>
					<li class="<?php echo ($profile->step_no<5)?'disabled':''; ?>"><a href="<?php echo base_url();?>tutor/internal_job_board/Invited"><span><i class="fa fa-rocket"></i> </span> View Invited Tutoring Jobs</a></li>
					<li class="<?php echo ($profile->step_no<5)?'disabled':''; ?>"><a href="<?php echo base_url();?>tutor/internal_job_board/Applied"><span><i class="fa fa-rocket"></i> </span> View Applied Tutoring Jobs</a></li>
					<li class="<?php echo ($profile->step_no<5)?'disabled':''; ?>"><a href="<?php echo base_url();?>tutor/internal_job_board/All"><span><i class="fa fa-rocket"></i> </span> View Available Tutoring Jobs</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
