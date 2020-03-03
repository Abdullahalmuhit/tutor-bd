
	<form id="frmtr" data-link="parents/new_tutor_requirements" class="form-horizontal margin_top" role="form">
			<div class="col-md-9">
			
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align: left;">
					<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-file-text"></i> Post Your Tutor Requirements</b></h5>
				</div>
				<div class="panel-body" style="text-align: center;">
			
				<?php if ($m=="y"){?><span>Your requirements posted successfully.</span><?php }?>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-map-marker"></i> </span><b>City </b></h5>
				<select id="selcity" name="selcity" class="form-control input_select selcity">
					<?php 
					foreach ($city as $cit)
					{
					?>
						<option value="<?php echo $cit->id; ?>"><?php echo $cit->city; ?></option>
					<?php 
					}
					?>
				</select>
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-map-marker"></i> </span><b>Location </b></h5>
				<select id="sellocation" name="sellocation" class="form-control input_select sellocation">
					<option value="">--Select Location--</option>
				</select>
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-user"></i> </span><b>Guardian Name </b></h5>
				<input id="guardian_name" name="guardian_name" type="text" class="form-control" placeholder="Guardian Name"/>
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-phone"></i> </span><b>Guardian Contact No. </b></h5>
				<input id="add_contact_num" name="add_contact_num" type="text" class="form-control" placeholder="Guardian Contact No."/>
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span> <i class="fa fa-male"></i> / <i class="fa fa-female"></i> </span><b>Student Gender</b></h5>
				<select id="selstgender" name="selstgender" class="form-control">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-institution"></i> </span><b>Institute </b></h5>
				<input id="institute" name="institute" type="text" class="form-control" placeholder="Institute Name"/>
				<input id="institute_id" name="institute_id" type="hidden" class="form-control" />
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-check-circle "></i> </span><b>Tutor For </b></h5>
				<select id="selcat" name="selcat" class="form-control input_select selcat">
					<?php 
					foreach ($category as $cat)
					{
					?>
						<option value="<?php echo $cat->id; ?>"><?php echo $cat->category;?></option>
					<?php 
					}
					?>
				</select>
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-book "></i> </span><b>Class / Course </b></h5>
				<select id="selsubcat" name="selsubcat" class="form-control input_select selsubcat">
					<option value="0">--Select Class--</option>
				</select>
			</div>
			
			
				
			<fieldset>
				<legend style="text-align: left;"><h5><span><i class="fa fa-graduation-cap"></i> </span><b>Subjects </b></h5></legend>
				<div>
						<?php 
							
							if (count($sdg)>3)
							{
								$number = 1;
								$num = ceil((count($sdg))/3);
								foreach ($sdg as $cat)
								{
									if ($number == 1)
									{
										echo "<div style='width: 30%; float: left; text-align: left; padding-left: 5px;'>";
									}
									echo "<input type='checkbox' name='sdg[]' value='".$cat->id."'> ".$cat->sdg."<br/>";
									if ($number == $num)
									{
										echo "</div>";
										$number = 1;
										continue;
									}
									$number++;
								}
								
								if ($number != 1)
								{
									echo "</div>";
								}
							}
							else 
							{
								echo "<div style='width: 30%; float: left; text-align: left; padding-left: 5px;'>";
								foreach ($sdg as $cat)
								{
									echo "<input type='checkbox' name='sdg[]' value='".$cat->id."'> ".$cat->sdg."<br/>";
								}
								echo "</div>";
							}
						?>				
				</div>
			</fieldset>
			
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-calendar"></i> </span><b>Days In a Week </b></h5>
				<select id="selday" name="selday" class="form-control input_select">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
				</select>
			</div>
	<!-- 									<div class="input-group">  -->
	<!-- 										<h5 class="input-group-addon"><span><i class="fa fa-clock-o"></i> </span><b>Hours Per Day </b></h5> -->
	<!-- 										<input id="dailyhours" name="dailyhours" type="number" min="1" class="form-control" placeholder="Hours"/> -->
	<!-- 									</div> -->
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-try"></i> </span><b>Salary Range </b></h5>
				<input id="salary" name="salary" type="text" class="form-control" placeholder="Salary Range"/>
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span> <i class="fa fa-male"></i> / <i class="fa fa-female"></i> </span><b>Tutor Gender Preference</b></h5>
				<select id="selgender" name="selgender" class="form-control">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Any">Any</option>
				</select>
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-map-marker"></i> </span><b>Address  </b></h5>
				<textarea name="address" id="address" rows="5" class="form-control" placeholder="Please provide your detail address"></textarea>
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-pencil"></i> </span><b>Other requirements  </b></h5>
				<textarea name="otherreq" id="otherreq" rows="5" class="form-control" placeholder="Please specify if you have any further requirements"></textarea>
			</div>
			<div class="form-group margin_top row"> 
				<div class="col-md-8"></div>
				<div class="col-md-4">
					<button class="btn_settings btn btn-success  pull-right" type="submit"> Post Requirements</button>
				</div>
			</div>
			</div></div>
		</div>
	</form>
