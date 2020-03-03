<div class="" ><!--view profile-->
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading" style="text-align: left;">
				<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-user"></i> Personal Information</b></h5>
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
					<div>
						<div class="col-md-6">
							<p><b>Tutor ID</b></p>
						</div>
						<div class="col-md-6">
							<p><?php if (count($profile)>0) {echo $profile->user_id;}else{echo "N/A";}?></p>
						</div>
					</div>
					<div>
						<div class="col-md-6">
							<p><b>Fathers Name</b></p>
						</div>
						<div class="col-md-6">
							<p><?php if (count($profile)>0) {echo $profile->fathers_name;}else{echo "N/A";}?></p>
						</div>
					</div>
					<div>
						<div class="col-md-6">
							<p><b>Additional Number</b></p>
						</div>
						<div class="col-md-6">
							<p><?php if (count($profile)>0) {echo $profile->additional_numbers;}else{echo "N/A";}?></p>
						</div>
					</div>
					<div>
						<div class="col-md-6">
							<p><b>Gender</b></p>
						</div>
						<div class="col-md-6">
							<p><?php if (count($profile)>0) {echo $profile->gender;}else{echo "N/A";}?></p>
						</div>
					</div>
					<div>
						<div class="col-md-6">
							<p><b>Facebook Link</b></p>
						</div>
						<div class="col-md-6">
							<p><?php if (count($profile)>0) {echo $profile->fb_link;}else{echo "N/A";}?></p>
						</div>
					</div>
					<div>
						<div class="col-md-6">
							<p><b>Detail Address</b></p>
						</div>
						<div class="col-md-6">
							<p><?php if (count($profile)>0) {echo $profile->pre_address;}else{echo "N/A";}?></p>
						</div>
					</div>
					
					
					
					
					<div>
						<div class="col-md-6">
							<p><b>National ID</b></p>
						</div>
						<div class="col-md-6">
							<p><?php if (count($profile)>0) {echo $profile->national_id;}else{echo "N/A";}?></p>
						</div>
					</div>
					<div>
						<div class="col-md-6">
							<p><b>Passport Number</b></p>
						</div>
						<div class="col-md-6">
							<p><?php if (count($profile)>0) {echo $profile->passport_number;}else{echo "N/A";}?></p>
						</div>
					</div>
					
					<fieldset>
						<legend style="text-align: left;"><h5><span><i class="fa fa-user"></i> </span><b> Emergency Contact Person </b></h5></legend>
						
						<div>
							<div class="col-md-6">
								<p><b>Name</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->emmergency_contact_name;}else{echo "N/A";}?></p>
							</div>
						</div>
						<div>
							<div class="col-md-6">
								<p><b>Contact Number</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->emmergency_contact_number;}else{echo "N/A";}?></p>
							</div>
						</div>
						<div>
							<div class="col-md-6">
								<p><b>Relation</b></p>
							</div>
							<div class="col-md-6">
								<p><?php if (count($profile)>0) {echo $profile->emmergency_contact_rel;}else{echo "N/A";}?></p>
							</div>
						</div>
					</fieldset>
					
		<!-- 			<div> -->
		<!-- 				<div class="col-md-5"> -->
		<!-- 					<p><b>Address</b></p> -->
		<!-- 				</div> -->
		<!-- 				<div class="col-md-7"> -->
		<!-- 					<p>Green Road, Dhanmondi</p> -->
		<!-- 				</div> -->
		<!-- 			</div> -->
				</div>
				<div class="col-md-12">
					<div class="col-md-8">
					</div>
					<div class="col-md-4">
						<a href="<?php echo base_url();?>tutor/load_personal_info"><button class="btn_settings btn btn-success pull-right" type="button">Edit Profile</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>