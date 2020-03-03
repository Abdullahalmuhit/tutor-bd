	<form id="frmperinfo" data-link="tutor/update_personal_info" class="form-horizontal" role="form">
		<div class="col-md-9 tutor_responsive_utility">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align: left;">
					<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-user"></i> Personal Information</b></h5>
				</div>
				<div class="panel-body" style="text-align: center;">
				
					<?php 
					if ($profile->step_no < 5)
					{
						if ($profile->step_no == 1)
						{
							$link = base_url()."tutor/step_one";
						}
						elseif ($profile->step_no == 2)
						{
							$link = base_url()."tutor/step_two";
						}
						elseif ($profile->step_no == 3)
						{
							$link = base_url()."tutor/step_three";
						}
					?>
					<div style="border-bottom:3px solid #0071bb; position: relative; top: 10px; margin: 0 135px;"></div>
					<ul id="progressbar">
						<li class="<?php echo ($profile->step_no > 0)?"active":"";?>"><a href="<?php echo $link;?>">Personal Information</a></li>
						<li class="<?php echo ($profile->step_no > 1)?"active":"";?>"><a href="<?php echo $link;?>">Educational Information</a></li>
						<li class="<?php echo ($profile->step_no > 2)?"active":"";?>"><a href="<?php echo $link;?>">Tuition Related Information</a></li>
					</ul>
					<?php 
					}
					?>
				
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-user"></i> </span><b>Father's Name  </b></h5>
							<input id="fathers_name" required name="fathers_name" type="text" class="form-control" placeholder="Father's Name" value="<?php if (count($personal_info)>0){echo $personal_info->fathers_name;}?>" />
						</div>
				<!-- 		<div class="input-group">  -->
				<!-- 			<h5 class="input-group-addon"><span><i class="fa fa-user"></i> </span><b>Your Photo </b></h5> -->
				<!-- 			<input type="file" class="form-control"/> -->
				<!-- 		</div> -->
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa fa-mobile-phone"></i> </span><b>Additional Number  </b></h5>
							<input id="additional_numbers" required name="additional_numbers" type="text" class="form-control" placeholder="Additional Contact Number" value="<?php if (count($personal_info)>0){echo $personal_info->additional_numbers;}?>" />
						</div>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span> <i class="fa fa-male"></i> / <i class="fa fa-female"></i> </span><b>Gender</b></h5>
							<select required id="selgender" name="selgender" class="form-control">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-link"></i> </span><b>Facebook Profile</b></h5>
							<input id="fb_link" name="fb_link" type="url" pattern="http://www\.facebook\.com\/(.+)|https://www\.facebook\.com\/(.+)" required class="form-control" placeholder="facebook profile link" value="<?php if (count($personal_info)>0){echo $personal_info->fb_link;}?>" />
						</div>
						<p class="pull-left text-success">Please put a valid facebook profile link. e.g: https://www.facebook.com/CareTutors</p>
						
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-pencil"></i> </span><b>Detail Address </b></h5>
							<textarea name="pre_address" required rows="4" class="form-control" placeholder="Please Provide Your Detail Address"><?php echo (count($personal_info) > 0) ? $personal_info->pre_address : ''; ?></textarea>
						</div>
						
						
						
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-user"></i> </span><b>National ID</b></h5>
							<input id="national_id" name="national_id" type="text" class="form-control" placeholder="National ID" value="<?php if (count($personal_info)>0){echo $personal_info->national_id;}?>" />
						</div>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-user"></i> </span><b>Passport Number</b></h5>
							<input id="passport_number" name="passport_number" type="text" class="form-control" placeholder="Passport Number" value="<?php if (count($personal_info)>0){echo $personal_info->passport_number;}?>" />
						</div>
						
						<fieldset>
							<legend style="text-align: left;"><h5><span><i class="fa fa-user"></i> </span><b> Emergency Contact Person </b></h5></legend>
						
							<div class="input-group"> 
								<h5 class="input-group-addon"><span><i class="fa fa-user"></i> </span><b>Name  </b></h5>
								<input id="emmergency_contact_name" name="emmergency_contact_name" type="text" class="form-control" placeholder="Name" value="<?php if (count($personal_info)>0){echo $personal_info->emmergency_contact_name;}?>" />
							</div>
							<div class="input-group"> 
								<h5 class="input-group-addon"><span><i class="fa fa-mobile"></i> </span><b>Contact Number  </b></h5>
								<input id="emmergency_contact_number" name="emmergency_contact_number" type="text" class="form-control" placeholder="Number" value="<?php if (count($personal_info)>0){echo $personal_info->emmergency_contact_number;}?>" />
							</div>
							<div class="input-group"> 
								<h5 class="input-group-addon"><span><i class="fa fa-user"></i> </span><b>Relation  </b></h5>
								<input id="emmergency_contact_rel" name="emmergency_contact_rel" type="text" class="form-control" placeholder="Relation" value="<?php if (count($personal_info)>0){echo $personal_info->emmergency_contact_rel;}?>" />
							</div>
						</fieldset>
						
						<div class="input-group margin_top col-md-12"> 
							<div class="col-md-6"></div>
							<div class="col-md-6">
								<button class="btn_settings btn btn-success pull-right" type="submit"> Save</button> 
							</div>
						</div>
					</div>
				</div>
		</div>
	</form>
<!-- </div> -->