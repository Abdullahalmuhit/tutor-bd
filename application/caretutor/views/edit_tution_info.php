	<form id="edit_tution_info" data-link="tutor/update_tution_info" class="form-horizontal margin_top" role="form">
		<div class="col-md-9 tutor_responsive_utility">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align: left;">
					<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-graduation-cap"></i> Tuition Related Information</b></h5>
				</div>
				<div class="panel-body" style="text-align: center;">
					<p style="text-align: left; color: #0000FF;">Make this part carefully so that we can invite you the best-matching Tutoring jobs.</p>
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-money"></i> </span><b> Expected Minimum Fees  </b></h5>
						<input type="text" required name="expected_fees" class="form-control" placeholder="Expected Minimum Fees" value="<?php echo (count($tution_info) > 0 && isset($tution_info[0]['expected_fees'])) ? $tution_info[0]['expected_fees'] : ''; ?>"/>
					</div>
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-calendar"></i> </span><b> Days In a Week </b></h5>
						<select required name="days_per_week" class="form-control input_select">
							<option value="1" <?php echo (count($tution_info) > 0 && isset($tution_info[0]['days_per_week']) && $tution_info[0]['days_per_week'] == 1 ) ? 'selected="selected"' : ''; ?>>1</option>
							<option value="2" <?php echo (count($tution_info) > 0 && isset($tution_info[0]['days_per_week']) && $tution_info[0]['days_per_week'] == 2 ) ? 'selected="selected"' : ''; ?>>2</option>
							<option value="3" <?php echo (count($tution_info) > 0 && isset($tution_info[0]['days_per_week']) && $tution_info[0]['days_per_week'] == 3 ) ? 'selected="selected"' : ''; ?>>3</option>
							<option value="4" <?php echo (count($tution_info) > 0 && isset($tution_info[0]['days_per_week']) && $tution_info[0]['days_per_week'] == 4 ) ? 'selected="selected"' : ''; ?>>4</option>
							<option value="5" <?php echo (count($tution_info) > 0 && isset($tution_info[0]['days_per_week']) && $tution_info[0]['days_per_week'] == 5 ) ? 'selected="selected"' : ''; ?>>5</option>
							<option value="6" <?php echo (count($tution_info) > 0 && isset($tution_info[0]['days_per_week']) && $tution_info[0]['days_per_week'] == 6 ) ? 'selected="selected"' : ''; ?>>6</option>
							<option value="7" <?php echo (count($tution_info) > 0 && isset($tution_info[0]['days_per_week']) && $tution_info[0]['days_per_week'] == 7 ) ? 'selected="selected"' : ''; ?>>7</option>
						</select>
					</div>
<!-- 					<div class="input-group">  -->
<!-- 						<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b> Tutoring Categories </b></h5> -->
<!-- 						<input type="text" disabled name="pref_medium" class="form-control" placeholder="Tutoring Categories" /> -->
<!-- 					</div> -->
					<fieldset>
						<legend style="text-align: left;"><h5><span><i class="fa fa-graduation-cap"></i> </span><b> Tutoring Categories </b></h5></legend>
							<?php 
								$prefm = explode(',',$tution_info[0]['pref_medium']);
								
								if (count($category)>3)
								{
									$number = 1;
									$num = ceil((count($category))/3);
									foreach ($category as $cat)
									{
										if (in_array($cat['category_id'], $prefm))
										{
											$chk = str_replace("<input", "<input checked='checked'", $cat['name']);
											//print_r($chk);
										}
										else 
										{
											$chk = $cat['name'];
										}	
										
										if ($number == 1)
										{
											echo "<div style='width: 30%; float: left; text-align: left; padding-left: 5px;'>";
										}
										echo $chk."<br/>";
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
										if (in_array($cat['category_id'], $prefm))
										{
											$chk = str_replace("<input", "<input checked='checked'", $cat['name']);
										}
										else
										{
											$chk = $cat['name'];
										}
										
										echo $chk."<br/>";
									}
									echo "</div>";
								}
							?>				
					</fieldset>
					<!-- <div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Preferred Classes/Courses </b></h5>
						<input type="text" name="pref_class" class="form-control" placeholder="Preferred Classes/Courses" value="<?php echo (count($tution_info) > 0 && isset($tution_info[0]['pref_class'])) ? $tution_info[0]['pref_class'] : ''; ?>"/>
					</div> -->
<!-- 					<div class="input-group">  -->
<!-- 						<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap"></i> </span><b>Preferred Subjects </b></h5> -->
<!-- 						<input type="text" disabled name="pref_subjects" class="form-control" placeholder="Preferred Subjects" /> -->
<!-- 					</div> -->
					<fieldset>
						<legend style="text-align: left;"><h5><span><i class="fa fa-graduation-cap"></i> </span><b> Preferred Subjects </b></h5></legend>
							<?php 
								$prefs = explode(',',$tution_info[0]['pref_subjects']);
								if (count($sdg)>3)
								{
									$number = 1;
									$num = ceil((count($sdg))/3);
									foreach ($sdg as $cat)
									{
										if (in_array($cat->id, $prefs))
										{
											$chksub = "checked='checked'";
											//print_r($chk);
										}
										else
										{
											$chksub = "";
										}
										
										
										if ($number == 1)
										{
											echo "<div style='width: 30%; float: left; text-align: left; padding-left: 5px;'>";
										}
										echo "<input type='checkbox' ".$chksub." name='sdg[]' value='".$cat->id."'> ".$cat->sdg."<br/>";
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
										$chksub = "";
										if (in_array($cat->id, $prefs))
										{
											$chksub = "checked='checked'";
											//print_r($chk);
										}
										
										echo "<input type='checkbox' ".$chksub." name='sdg[]' value='".$cat->id."'> ".$cat->sdg."<br/>";
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
					
<!-- 					<div class="input-group">  -->
<!-- 						<h5 class="input-group-addon"><span><i class="fa fa-map-marker"></i> </span><b>Preferred Locations </b></h5> -->
<!-- 						<input type="text" disabled name="pref_locations" class="form-control" placeholder="Preferred Locations" /> -->
<!-- 					</div> -->
					<!-- <div id="pre_loc" style="background-color:#f9f9f9; display: table; position: relative; width:70.7%;">  -->
										
<!-- 					</div> -->
					
					<fieldset>
						<legend style="text-align: left;"><h5><span><i class="fa fa-map-marker"></i> </span><b> Preferred Locations </b></h5></legend>
						<div id="pre_loc">
						</div>
					</fieldset>
					
					
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-pencil"></i> </span><b>Score </b></h5>
						<textarea id="diff_score" name="diff_score" rows="2" class="form-control" placeholder="IELTS / GMAT / GRE / TOEFL / SAT Score"><?php echo (count($tution_info) > 0 && isset($tution_info[0]['diff_score'])) ? $tution_info[0]['diff_score'] : ''; ?></textarea>
					</div>
					
					<div class="input-group" style="text-align: left;"> 
						<h5 class="input-group-addon"><span><i class="fa fa-pencil"></i> </span><b>Preferred Tutoring Style </b></h5>
						<span class="input-group-addon form-control">
							<?php 
							$pts = explode(',',$tution_info[0]['pref_tut_style']);
							?>
							<input type='checkbox' <?php echo (count($tution_info) > 0 && in_array('1',$pts)) ? "checked='checked'" : ""; ?> name='pts[]' value='1'> Private Tutoring -- One student <br/>
							<input type='checkbox' <?php echo (count($tution_info) > 0 && in_array('2',$pts)) ? "checked='checked'" : ""; ?> name='pts[]' value='2'> Group Tutoring <br/>
							<input type='checkbox' <?php echo (count($tution_info) > 0 && in_array('3',$pts)) ? "checked='checked'" : ""; ?> name='pts[]' value='3'> Online Tutoring
						</span>
					</div>
					
					<div class="input-group" style="text-align: left;"> 
						<h5 class="input-group-addon"><span><i class="fa fa-pencil"></i> </span><b>Place of Tutoring </b></h5>
						<span class="input-group-addon form-control">
							<?php 
							$pt = explode(',',$tution_info[0]['place_of_tut']);
							?>
							<input type='checkbox' <?php echo (count($tution_info) > 0 && in_array('1',$pt)) ? "checked='checked'" : ""; ?> name='pt[]' value='1'> Student Place <br/>
							<input type='checkbox' <?php echo (count($tution_info) > 0 && in_array('2',$pt)) ? "checked='checked'" : ""; ?> name='pt[]' value='2'> My Place
						</span>
					</div>
					
					
					
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-pencil"></i> </span><b>Tutoring Experience </b></h5>
						<textarea name="experiences" required rows="5" class="form-control" placeholder="Tell us about your tutoring experiences"><?php echo (count($tution_info) > 0 && isset($tution_info[0]['experiences'])) ? $tution_info[0]['experiences'] : ''; ?></textarea>
					</div>
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-pencil"></i> </span><b>Tutoring Method </b></h5>
						<textarea name="method" required rows="5" class="form-control" placeholder="Your Tutoring Method / Approach"><?php echo (count($tution_info) > 0 && isset($tution_info[0]['method'])) ? $tution_info[0]['method'] : ''; ?></textarea>
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
