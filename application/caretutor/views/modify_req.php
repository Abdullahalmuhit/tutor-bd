	<form id="frmuptr" data-link="parents/update_tutor_requirements" class="form-horizontal margin_top" role="form">
		<?php 
		foreach ($profile as $row)
		{
		?>
		<input id="id" name="id" type="hidden" class="form-control" value="<?php echo $row->id;?>" />
		
		
		
			<div class="col-md-9">
			
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align: left;">
					<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-user"></i> Tutor Requirements</b></h5>
				</div>
				<div class="panel-body" style="text-align: center;">
			
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-map-marker"></i> </span><b>City </b></h5>
				<select id="selcity" name="selcity" class="form-control input_select selcity">
					<?php 
					foreach ($city as $cit)
					{
					?>
						<option <?php if ($cit->id == $row->city_id) echo "selected"?> value="<?php echo $cit->id; ?>"><?php echo $cit->city; ?></option>
					<?php 
					}
					?>
				</select>
			</div>
			<!-- <div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-map-marker"></i> </span><b>Location </b></h5>
				<select id="sellocation" name="sellocation" class="form-control input_select sellocation">
					<option value="">--Select Location--</option>
				</select>
			</div> -->
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-user"></i> </span><b>Guardian Name </b></h5>
				<input id="guardian_name" name="guardian_name" type="text" class="form-control" placeholder="Guardian Name" value="<?php echo $row->guardian_name;?>"/>
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-phone"></i> </span><b>Guardian Contact No. </b></h5>
				<input id="add_contact_num" name="add_contact_num" type="text" class="form-control" placeholder="Guardian Contact No." value="<?php echo $row->add_contact_num;?>"/>
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span> <i class="fa fa-male"></i> / <i class="fa fa-female"></i> </span><b>Student Gender</b></h5>
				<select id="selstgender" name="selstgender" class="form-control">
					<option <?php if($row->student_gender=="Male") echo "selected";?> value="Male">Male</option>
					<option <?php if($row->student_gender=="Female") echo "selected";?> value="Female">Female</option>
				</select>
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-institution"></i> </span><b>Institute </b></h5>
				<input id="institute" name="institute" type="text" class="form-control" placeholder="Institute Name" value="<?php echo $row->institute;?>"/>
				<input id="institute_id" name="institute_id" type="hidden" class="form-control" value="<?php echo $row->institute_id;?>" />
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-check-circle "></i> </span><b>Tutor For </b></h5>
				<select id="selcat" name="selcat" class="form-control input_select selcat">
					<?php 
					foreach ($category as $cat)
					{
					?>
						<option <?php if ($cat->id == $row->tution_category_id) echo "selected";?> value="<?php echo $cat->id; ?>"><?php echo $cat->category;?></option>
					<?php 
					}
					?>
				</select>
			</div>
			<!-- <div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-book "></i> </span><b>Class </b></h5>
				<select id="selsubcat" name="selsubcat" class="form-control input_select selsubcat">
					<option value="0">--Select Class--</option>
				</select>
			</div> -->
			
			<?php 
				$sub = explode(',', $row->subjects);
			?>
			<fieldset>
				<legend style="text-align: left;"><span><i class="fa fa-graduation-cap"></i> </span><b>Preferred Subjects </b></legend>
				<div>
						<?php 
							
							if (count($sdg)>3)
							{
								$number = 1;
								$num = ceil((count($sdg))/3);
								foreach ($sdg as $cat)
								{
									$chk = (in_array($cat->id, $sub))?"checked='checked'":"";
									if ($number == 1)
									{
										echo "<div style='width: 30%; float: left; text-align: left; padding-left: 5px;'>";
									}
									echo "<input type='checkbox' {$chk} name='sdg[]' value='".$cat->id."'> ".$cat->sdg."<br/>";
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
									$chk = (in_array($cat->id, $sub))?"checked='checked'":"";
									echo "<input type='checkbox' {$chk} name='sdg[]' value='".$cat->id."'> ".$cat->sdg."<br/>";
								}
								echo "</div>";
							}
						?>				
				</div>
			</fieldset>
			
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-calendar"></i> </span><b>Days In a Week </b></h5>
				<select id="selday" name="selday" class="form-control input_select">
					<option <?php if ($row->days_per_week == 1) echo "selected";?> value="1">1</option>
					<option <?php if ($row->days_per_week == 2) echo "selected";?> value="2">2</option>
					<option <?php if ($row->days_per_week == 3) echo "selected";?> value="3">3</option>
					<option <?php if ($row->days_per_week == 4) echo "selected";?> value="4">4</option>
					<option <?php if ($row->days_per_week == 5) echo "selected";?> value="5">5</option>
					<option <?php if ($row->days_per_week == 6) echo "selected";?> value="6">6</option>
					<option <?php if ($row->days_per_week == 7) echo "selected";?> value="7">7</option>
				</select>
			</div>
	<!-- 									<div class="input-group">  -->
	<!-- 										<h5 class="input-group-addon"><span><i class="fa fa-clock-o"></i> </span><b>Hours Per Day </b></h5> -->
	<!-- 										<input id="dailyhours" name="dailyhours" type="number" min="1" class="form-control" placeholder="Hours"/> -->
	<!-- 									</div> -->
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-try"></i> </span><b>Salary Range </b></h5>
				<input id="salary" name="salary" type="text" class="form-control" placeholder="Salary Range" value="<?php echo $row->salary_range; ?>"/>
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span> <i class="fa fa-male"></i> / <i class="fa fa-female"></i> </span><b>Gender Preferences</b></h5>
				<select id="selgender" name="selgender" class="form-control">
					<option <?php if ($row->preferred_gender == "Male") echo "selected";?> value="Male">Male</option>
					<option <?php if ($row->preferred_gender == "Female") echo "selected";?> value="Female">Female</option>
					<option <?php if ($row->preferred_gender == "Any") echo "selected";?> value="Any">Any</option>
				</select>
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-map-marker"></i> </span><b>Address  </b></h5>
				<textarea name="address" id="address" rows="5" class="form-control" style="text-align:start; text-indent: 0px; white-space: pre-wrap; word-wrap: break-word;">
				 <?php echo $row->address; ?> 
				</textarea>
			</div>
			<div class="input-group"> 
				<h5 class="input-group-addon"><span><i class="fa fa-pencil"></i> </span><b>Other requirements  </b></h5>
				<textarea name="otherreq" id="otherreq" rows="5" class="form-control" placeholder="Other requirements"><?php echo $row->other_req; ?> </textarea>
			</div>
			<div class="form-group margin_top row"> 
				<div class="col-md-8"></div>
				<div class="col-md-4">
					<button class="btn_settings btn btn-success  pull-right" type="submit"> Post Requirements</button>
				</div>
			</div>
			</div>
			</div>
		</div>
		<?php 
		}
		?>
	</form>
