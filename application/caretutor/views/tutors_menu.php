<!-- <div class="col-md-3">
        <div class="panel panel-default">
                <div class="panel-heading" style="text-align: left;">
                        <h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-cog"></i> My Menu</b></h5>
                </div>
                <div class="panel-body" style="padding: 0px;">
                        <div class="settings_list">
                                <ul>
                                        <li <?php if ($menu_id == 1) echo "class='active_list'"; ?>><a href="<?php echo base_url(); ?>tutor/dashboard"><span><i class="fa fa-user"></i> </span> Profile</a></li>
                                        <li <?php if ($menu_id == 2) echo "class='active_list'"; ?>><a href="<?php echo base_url(); ?>tutor/tutor_personal_info"><span><i class="fa fa-info"></i> </span> Personal Information</a></li>
                                        <li <?php if ($menu_id == 3) echo "class='active_list'"; ?>><a href="<?php echo base_url(); ?>tutor/tutor_edu_info"><span><i class="fa fa-graduation-cap"></i> </span> Educational Information</a></li>
                                        <li <?php if ($menu_id == 4) echo "class='active_list'"; ?>><a href="<?php echo base_url(); ?>tutor/tution_info"><span><i class="fa fa-graduation-cap"></i> </span> Tuition Related Information</a></li>
                                        <li <?php if ($menu_id == 7) echo "class='active_list'"; ?>><a href="<?php echo base_url(); ?>tutor/internal_job_board/Invited"><span><i class="fa fa-rocket"></i> </span> View Invited Tutoring Jobs</a></li>
                                        <li <?php if ($menu_id == 5) echo "class='active_list'"; ?>><a href="<?php echo base_url(); ?>tutor/internal_job_board/Applied"><span><i class="fa fa-rocket"></i> </span> View Applied Tutoring Jobs</a></li>
                                        <li <?php if ($menu_id == 6) echo "class='active_list'"; ?>><a href="<?php echo base_url(); ?>tutor/internal_job_board/All"><span><i class="fa fa-rocket"></i> </span> View Available Tutoring Jobs</a></li>
                                </ul>
                        </div>
                </div>
        </div>
</div>  -->

<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align: left;">
            <h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-cog"></i> My Menu</b></h5>
        </div>
        <div class="panel-body" style="padding: 0px;">
            <div class="settings_list">
                <ul>
                    <li class="<?php echo ($menu_id == 1) ? 'active_list' : '';
echo ($profile->step_no < 1) ? 'disabled' : ''; ?>"><a href="<?php echo base_url(); ?>tutor/dashboard"><span><i class="fa fa-user"></i> </span> Profile</a></li>
                    <li class="<?php echo ($menu_id == 2) ? 'active_list' : '';
echo ($profile->step_no < 2) ? 'disabled' : ''; ?>"><a href="<?php echo base_url(); ?>tutor/tutor_personal_info"><span><i class="fa fa-info"></i> </span> Personal Information</a></li>
                    <li class="<?php echo ($menu_id == 3) ? 'active_list' : '';
echo ($profile->step_no < 3) ? 'disabled' : ''; ?>"><a href="<?php echo base_url(); ?>tutor/tutor_edu_info"><span><i class="fa fa-graduation-cap"></i> </span> Educational Information</a></li>
                    <li class="<?php echo ($menu_id == 4) ? 'active_list' : '';
echo ($profile->step_no < 4) ? 'disabled' : ''; ?>"><a href="<?php echo base_url(); ?>tutor/tution_info"><span><i class="fa fa-graduation-cap"></i> </span> Tuition Related Information</a></li>
                    <li class="<?php echo ($menu_id == 8) ? 'active_list' : '';
echo ($profile->step_no < 4) ? 'disabled' : ''; ?>"><a href="<?php echo base_url(); ?>tutor/tutor_upload_img"><span><i class="fa fa-image"></i> </span> Profile Picture</a></li>
                    <li class="<?php echo ($menu_id == 7) ? 'active_list' : '';
echo ($profile->step_no < 5) ? 'disabled' : ''; ?>"><a href="<?php echo base_url(); ?>tutor/internal_job_board/Invited"><span><i class="fa fa-rocket"></i> </span> Invited Tutoring Jobs</a></li>
                    <li class="<?php echo ($menu_id == 5) ? 'active_list' : '';
echo ($profile->step_no < 5) ? 'disabled' : ''; ?>"><a href="<?php echo base_url(); ?>tutor/internal_job_board/Applied"><span><i class="fa fa-rocket"></i> </span> Applied Tutoring Jobs</a></li>
                    <li class="<?php echo ($menu_id == 6) ? 'active_list' : '';
echo ($profile->step_no < 5) ? 'disabled' : ''; ?>"><a href="<?php echo base_url(); ?>tutor/internal_job_board/All"><span><i class="fa fa-rocket"></i> </span> Available Tutoring Jobs</a></li>
                    <li class="<?php echo ($menu_id == 9) ? 'active_list' : '';
echo ($profile->step_no < 5) ? 'disabled' : ''; ?>"><a href="<?php echo base_url(); ?>tutor/edit_password"><span><i class="fa fa-lock"></i> </span> Change Password</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
