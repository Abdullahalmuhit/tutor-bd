<div class="tutor_responsive_utility" ><!--view profile-->
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading" style="text-align: left;">
				<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-graduation-cap"></i> Educational Information</b></h5>
			</div>
			<div class="panel-body">
			
				<?php 
				if ($profil->step_no < 5)
				{
					if ($profil->step_no == 1)
					{
						$link = base_url()."tutor/step_one";
					}
					elseif ($profil->step_no == 2)
					{
						$link = base_url()."tutor/step_two";
					}
					elseif ($profil->step_no == 3)
					{
						$link = base_url()."tutor/step_three";
					}
				?>
				<div style="border-bottom:3px solid #0071bb; position: relative; top: 10px; margin: 0 135px;"></div>
				<ul id="progressbar">
					<li class="<?php echo ($profil->step_no > 0)?"active":"";?>"><a href="<?php echo $link;?>">Personal Information</a></li>
					<li class="<?php echo ($profil->step_no > 1)?"active":"";?>"><a href="<?php echo $link;?>">Educational Information</a></li>
					<li class="<?php echo ($profil->step_no > 2)?"active":"";?>"><a href="<?php echo $link;?>">Tuition Information</a></li>
				</ul>
				<?php 
				}
				?>
	
				<div class="row">
					<fieldset>
    					<legend style="text-align: left;">Graduate/Masters Level</legend>
						<div>
							<div class="col-md-6">
								<p><b>University</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->msc_ins;}else{echo "N/A";}?></p>
							</div>
						</div>
						<div>
							<div class="col-md-6">
								<p><b>Subject</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo ($profile->msc_sdg=='All')?'':$profile->msc_sdg;}else{echo "N/A";}?></p>
							</div>
						</div>
						<div>
							<div class="col-md-6">
								<p><b>Passing Year</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->msc_pass_year;}else{echo "N/A";}?></p>
							</div>
						</div>
						<div>
							<div class="col-md-6">
								<p><b>Result</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->msc_cgpa;}else{echo "N/A";}?></p>
							</div>
						</div>
					</fieldset>
					
					<fieldset>
    					<legend style="text-align: left;">Under Graduate/Honours Level</legend>
						<div>
							<div class="col-md-6">
								<p><b>University</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->uni_ins;}else{echo "N/A";}?></p>
							</div>
						</div>
						<div>
							<div class="col-md-6">
								<p><b>Subject</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->subject_name;}else{echo "N/A";}?></p>
							</div>
						</div>
						<div>
							<div class="col-md-6">
								<p><b>Passing Year</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->uni_semester;}else{echo "N/A";}?></p>
							</div>
						</div>
						<div>
							<div class="col-md-6">
								<p><b>Result</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->uni_cgpa;}else{echo "N/A";}?></p>
							</div>
						</div>
					</fieldset>
					
					<fieldset>
    					<legend style="text-align: left;">Higher Secondary Level</legend>
						<div>
							<div class="col-md-6">
								<p><b>Higher Secondary Type</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->a_or_hsc;}else{echo "N/A";}?></p>
							</div>
						</div>
						<div>
							<div class="col-md-6">
								<p><b>Institute Name</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->hsc_ins;}else{echo "N/A";}?></p>
							</div>
						</div>
						<div>
							<div class="col-md-6">
								<p><b>Result</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->hsc_result;}else{echo "N/A";}?></p>
							</div>
						</div>
						<div>
							<div class="col-md-6">
								<p><b>Passing Year</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->hsc_pass_year;}else{echo "N/A";}?></p>
							</div>
						</div>
					</fieldset>
					
					<fieldset>
    					<legend style="text-align: left;">Secondary Level</legend>
						<div>
							<div class="col-md-6">
								<p><b>Secondary Type</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->o_or_ssc;}else{echo "N/A";}?></p>
							</div>
						</div>
						<div>
							<div class="col-md-6">
								<p><b>Institute Name</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->ssc_ins;}else{echo "N/A";}?></p>
							</div>
						</div>
						<div>
							<div class="col-md-6">
								<p><b>Result</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->ssc_result;}else{echo "N/A";}?></p>
							</div>
						</div>
						<div>
							<div class="col-md-6">
								<p><b>Passing Year</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->ssc_pass_year;}else{echo "N/A";}?></p>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-md-12">
					<div class="col-md-8">
					</div>
					<div class="col-md-4">
						<a href="<?php echo base_url();?>tutor/load_edu_info"><button class="btn_settings btn btn-success pull-right" type="button">Edit Profile</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>