<form id="frmedu" data-link="tutor/update_edu_info_step" class="form-horizontal margin_top" role="form">
	<div class="col-md-9">
		<div class="panel panel-default">
				<div class="panel-heading" style="text-align: left;">
					<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-graduation-cap"></i> Educational Information</b></h5>
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
					
					<fieldset>
    					<legend style="text-align: left;">Graduate/Masters Level</legend>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>University  </b></h5>
							<input id="msc_institute" name="msc_institute" type="text" class="form-control" placeholder="Your University" value=""/>
							<input id="msc_ins_id" name="msc_ins_id" type="hidden" class="form-control" value=""/>
						</div>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Major / Subject  </b></h5>
							<input id="msc_subject" name="msc_subject" type="text" class="form-control" placeholder="Major / Subject" value=""/>
							<input id="msc_sdg_id" name="msc_sdg_id" type="hidden" class="form-control" value=""/>
						</div>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Passing Year  </b></h5>
							<input id="msc_pass_year" name="msc_pass_year" type="text" class="form-control" placeholder="Passing Year" value=""/>
						</div>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Result  </b></h5>
							<input id="msc_cgpa" name="msc_cgpa" type="text" class="form-control" placeholder="CGPA" value=""/>
						</div>
					</fieldset>
					
					<fieldset>
    					<legend style="text-align: left;">Under Graduate/Honours Level</legend>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>University  </b></h5>
							<input id="institute" name="institute" type="text" class="form-control" placeholder="Your University" value=""/>
							<input id="institute_id" name="institute_id" type="hidden" class="form-control" value=""/>
						</div>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Major / Subject  </b></h5>
							<input id="subject" name="subject" type="text" class="form-control" placeholder="Major / Subject" value=""/>
							<input id="subject_id" name="subject_id" type="hidden" class="form-control" value=""/>
						</div>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Passing Year  </b></h5>
							<input id="uni_semester" name="uni_semester" type="text" class="form-control" placeholder="Passing Year" value=""/>
						</div>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Result  </b></h5>
							<input id="uni_cgpa" name="uni_cgpa" type="text" class="form-control" placeholder="CGPA" value=""/>
						</div>
					</fieldset>
					
					<fieldset>
    					<legend style="text-align: left;">Higher Secondary Level</legend>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>A Levels/ HSC  </b></h5>
							<input id="a_or_hsc" name="a_or_hsc" type="text" class="form-control" placeholder="A Levels/ HSC" value="" />
						</div>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Institution Name  </b></h5>
							<input id="hsc_institute" name="hsc_institute" type="text" class="form-control" placeholder="Institute" value=""/>
							<input id="hsc_ins_id" name="hsc_ins_id" type="hidden" class="form-control" value="" />
						</div>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Result  </b></h5>
							<input id="hsc_result" name="hsc_result" type="text" class="form-control" placeholder="A Levels/ HSC Result" value="" />
						</div>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Passing Year  </b></h5>
							<input id="hsc_pass_year" name="hsc_pass_year" type="text" class="form-control" placeholder="A Levels/ HSC Passing Year" value="" />
						</div>
					</fieldset>
					
					<fieldset>
    					<legend style="text-align: left;">Secondary Level</legend>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>O Levels/ SSC  </b></h5>
							<input id="o_or_ssc" name="o_or_ssc" type="text" class="form-control" placeholder="O Levels/ SSC"  value="" />
						</div>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Institution Name  </b></h5>
							<input id="ssc_institute" name="ssc_institute" type="text" class="form-control" placeholder="Institute" value=""/>
							<input id="ssc_ins_id" name="ssc_ins_id" type="hidden" class="form-control" value="" />
						</div>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Result  </b></h5>
							<input id="ssc_result" name="ssc_result" type="text" class="form-control" placeholder="O Levels/ SSC Result" value="" />
						</div>
						<div class="input-group"> 
							<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Passing Year  </b></h5>
							<input id="ssc_pass_year" name="ssc_pass_year" type="text" class="form-control" placeholder="O Levels/ SSC Passing Year" value="" />
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
