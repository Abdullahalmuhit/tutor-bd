	<form id="edit_tution_info" data-link="tutor/update_tution_info_step" class="form-horizontal margin_top" role="form">
		<div class="col-md-9 tutor_responsive_utility">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align: left;">
					<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-info-circle"></i> Tuition Related Information</b></h5>
				</div>
				<div class="panel-body" style="text-align: center;">
		
					<!-- <h4><span>Tuition Related Information</span></h4> -->
					<div style="border-bottom:3px solid #0071bb; position: relative; top: 10px; margin: 0 135px;"></div>
					<ul id="progressbar">
						<li class="active">Personal Information</li>
						<li class="active">Educational Information</li>
						<li class="active">Tuition Related Information</li>
					</ul>
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-money"></i> </span><b> Expected Minimum Fees  </b></h5>
						<input type="text" name="expected_fees" class="form-control" placeholder="Expected Minimum Fees" value=""/>
					</div>
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-calendar"></i> </span><b> Days In a Week </b></h5>
						<select name="days_per_week" class="form-control input_select">
							<option value="1" >1</option>
							<option value="2" >2</option>
							<option value="3" >3</option>
							<option value="4" >4</option>
							<option value="5" >5</option>
							<option value="6" >6</option>
							<option value="7" >7</option>
						</select>
					</div>
					<!-- <div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b> Tutoring Categories </b></h5>
						<input type="text" disabled name="pref_medium" class="form-control" placeholder="Tutoring Categories" />
					</div>  -->
					<fieldset>
						<legend style="text-align: left;"><h5><span><i class="fa fa-graduation-cap"></i> </span><b> Tutoring Categories </b></h5></legend>
								<?php 
									
									if (count($category)>3)
									{
										$number = 1;
										$num = ceil((count($category))/3);
										foreach ($category as $cat)
										{
											if ($number == 1)
											{
												echo "<div style='width: 30%; float: left; text-align: left; padding-left: 5px;'>";
											}
											echo $cat['name']."<br/>";
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
										foreach ($category as $cat)
										{
											echo $cat['name']."<br/>";
										}
										echo "</div>";
									}
								?>				
					</fieldset>
					
					
					<!-- <div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Preferred Classes/Courses </b></h5>
						<input type="text" name="pref_class" class="form-control" placeholder="Preferred Classes/Courses" value="<?php echo (count($tution_info) > 0 && isset($tution_info[0]['pref_class'])) ? $tution_info[0]['pref_class'] : ''; ?>"/>
					</div> -->
					<!-- <div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Preferred Subjects </b></h5>
						<input type="text" disabled name="pref_subjects" class="form-control" placeholder="Preferred Subjects" />
					</div>  -->
					
					<fieldset>
						<legend style="text-align: left;"><h5><span><i class="fa fa-graduation-cap"></i> </span><b> Preferred Subjects </b></h5></legend>
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
					</fieldset>
					
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-map-marker"></i> </span><b>Preferred City </b></h5>
						<select id="pref_city" name="pref_city" class="form-control input_select">
							<?php 
							foreach ($city as $c)
							{
								echo "<option value='".$c->id."'>".$c->city."</option>";	
							}
							?>
							
						</select>
					</div>
					
					<!-- <div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-map-marker"></i> </span><b>Preferred Locations </b></h5>
						<input type="text" disabled name="pref_locations" class="form-control" placeholder="Preferred Locations" />
					</div>  -->
					
					<fieldset>
						<legend style="text-align: left;"><h5><span><i class="fa fa-map-marker"></i> </span><b> Preferred Locations </b></h5></legend>
						<div id="pre_loc">
						</div>
					</fieldset>
					
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-pencil"></i> </span><b>Score </b></h5>
						<textarea id="diff_score" name="diff_score" rows="2" class="form-control" placeholder="IELTS / GMAT / GRE / TOEFL / SAT Score"></textarea>
					</div>
					
					<div class="input-group" style="text-align: left;"> 
						<h5 class="input-group-addon"><span><i class="fa fa-pencil"></i> </span><b>Preferred Tutoring Style </b></h5>
						<span class="input-group-addon form-control">
							<input type='checkbox' name='pts[]' value='1'> Private Tutoring -- One student <br/>
							<input type='checkbox' name='pts[]' value='2'> Group Tutoring <br/>
							<input type='checkbox' name='pts[]' value='3'> Online Tutoring
						</span>
					</div>
					
					<div class="input-group" style="text-align: left;"> 
						<h5 class="input-group-addon"><span><i class="fa fa-pencil"></i> </span><b>Place of Tutoring </b></h5>
						<span class="input-group-addon form-control">
							<input type='checkbox' name='pt[]' value='1'> Student Place <br/>
							<input type='checkbox' name='pt[]' value='2'> My Place
						</span>
					</div>
					
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-pencil"></i> </span><b>Tutoring Experience </b></h5>
						<textarea name="experiences" rows="7" class="form-control" placeholder="Tutoring Experience"></textarea>
					</div>
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-pencil"></i> </span><b>Tutoring Method </b></h5>
						<textarea name="method" rows="7" class="form-control" placeholder="Your Tutoring Method / Approach"></textarea>
					</div>
					<div class="input-group margin_top col-md-12"> 
						<div class="col-md-6"></div>
						<div class="col-md-6">
							<button class="btn_settings btn btn-success pull-right" type="submit">Save</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
