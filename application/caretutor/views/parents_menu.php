<!-- <div class="col-md-3 box">
	<h4><span><i class="fa fa-cog"></i> Settings</span></h4>
	<div class="settings_list">
		<ul>
			<li class="<?php if ($active=='profile') echo 'active_list'?>"><a href="<?php echo base_url();?>parents/dashboard"><span><i class="fa fa-user"></i> </span> Profile</a></li>
			<li class="<?php if ($active=='inbox') echo 'active_list'?>"><a href="<?php echo base_url();?>parents/show_all_resume"><span><i class="fa fa-envelope"></i> </span> Inbox</a></li>
			<li class="<?php if ($active=='edit') echo 'active_list'?>"><a href="<?php echo base_url();?>parents/show_all_request"><span><i class="fa fa-pencil"></i> </span> Your Tutor Requirements</a></li>
			<li class="<?php if ($active=='req') echo 'active_list'?>"><a href="<?php echo base_url();?>parents/new_req"><span><i class="fa fa-file-text"></i> </span> New Request</a></li>
			<li class="<?php if ($active=='chp') echo 'active_list'?>"><a href="<?php echo base_url();?>parents/edit_password"><span><i class="fa fa-key"></i> </span> Change Password</a></li>
		</ul>
	</div>
</div>  -->


<div class="col-md-2 col_md_2">
	<div class="panel panel-default">
		<div class="panel-heading" style="text-align: left;">
			<h5 class="panel-title" style="font-size: 14px;"><b><i class="fa fa-cog"></i> My Menu</b></h5>
		</div>
		<div class="panel-body" style="padding: 0px;">
			<div class="settings_list">
				<ul>
					<li class="<?php if ($active=='home') echo 'active_list'?>"><a href="<?php echo base_url();?>parents/home"><span><i class="fa fa-home"></i> </span>Home</a></li>
					<li class="<?php if ($active=='profile') echo 'active_list'?>"><a href="<?php echo base_url();?>parents/dashboard"><span><i class="fa fa-user"></i> </span>My Profile</a></li>
					<li class="<?php if ($active=='inbox') echo 'active_list'?>"><a href="<?php echo base_url();?>parents/show_all_resume"><span><i class="fa fa-envelope"></i> </span> Inbox</a></li>
					<!--<li class="<?php if ($active=='edit') echo 'active_list'?>"><a href="<?php echo base_url();?>parents/show_all_request"><span><i class="fa fa-pencil"></i> </span> Your Tutor Requirements</a></li>
					<li class="<?php if ($active=='req') echo 'active_list'?>"><a href="<?php echo base_url();?>parents/new_req"><span><i class="fa fa-file-text"></i> </span> New Request</a></li>-->
					<li class="<?php if ($active=='chp') echo 'active_list'?>"><a href="<?php echo base_url();?>parents/edit_password"><span><i class="fa fa-key"></i> </span> Settings</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
