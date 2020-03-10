<?php if(!empty($locations)){ ?>
		<legend style="text-align: left; border: none; margin-left: 1px;" id="area_list_name_div" class="job_board_label"> Locations </legend>
		<div class="col-xs-12 col-sm-12 col-md-12 " style="padding-left: 0px;padding-right: 0px; color: #212121;">
			<!--<?php
				if (count($locations)>2)
				{
					$number = 1;
					$num = ceil((count($locations))/2);
					foreach ($locations as $location)
					{
						if ($number == 1)
						{
							echo "<div class='col-xs-6 col-md-6' style='float: left; text-align: left; padding-left: 0px;'>";
						}
					?>
					<div class="checkbox checkbox-primary">
					<?php
						$location_name = (strlen($location->location) > 10)?substr($location->location, 0, 7) . '..':$location->location;
						echo "<input type='checkbox' class='locations styled' name='locations[]' value='".$location->id."'>";
					?>
					<label for="checkbox2" data-toggle='tooltip' title='<?php echo $location->location; ?>'>
						<?php echo $location_name; ?>
					</label>
                    </div>
					<?php
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
					echo "<div class='col-xs-6 col-md-6' style='float: left; text-align: left; padding-left: 0px;'>";
					foreach ($locations as $location)
					{
						?>
					<div class="checkbox checkbox-primary">
					<?php
						$location_name = (strlen($location->location) > 10)?substr($location->location, 0, 7) . '..':$location->location;
						echo "<input type='checkbox' class='locations styled' name='locations[]' value='".$location->id."'>";
					?>
					<label for="checkbox2" data-toggle='tooltip' title='<?php echo $location->location; ?>'>
						<?php echo $location_name; ?>
					</label>
                    </div>
					<?php
					}
					echo "</div>";
				}
			?>-->

<?php
				if (count($locations)>2)
				{
					$number = 1;
					$step = 1;
					$num = ceil((count($locations))/2);
					foreach ($locations as $location)
					{
						if ($number == 1)
						{
							echo "<div class='col-xs-6 col-md-6' style='float: left; text-align: left; padding-left: 0px;'>";
						}
						
						if ($number == 4 && count($locations) > 6)
						{
							if($step == 2 )
							{
								//echo $step;
								echo "<div id='area_show_more_div' style='text-align: right; padding-left: 0px;'>";
								echo "<a style='color: #02A6D8; cursor:pointer;' id='area_show_more'>More...</a>";
								echo "</div>";
							}
							else{
								echo "<div style='text-align: right; padding-left: 0px;' class='123'>&nbsp;</div>";
							}
							echo "<div class='area_div' style='padding-left: 0px; display: none;'>";
						}
					?>
					<div class="checkbox checkbox-primary">
					<?php
						$location_name = (strlen($location->location) > 10)?substr($location->location, 0, 7) . '..':$location->location;
						echo "<input type='checkbox' class='locations styled' name='locations[]' value='".$location->id."'>";
					?>
					<label for="checkbox2" data-toggle='tooltip' title='<?php echo $location->location; ?>'>
						<?php echo $location_name; ?>
					</label>
                    </div>

					<?php
					if(count($locations) % 2 == 0){
						$if_condition = ( $number == $num );
					}else{
						if($step == 2){
							$if_condition = ($number == $num ) || $number == ($num-1);	
						}else{
							$if_condition = ( $number == $num );
						}
					}
						if ($if_condition)
						{
							if($step == 2){
								if(count($locations) > 6){
									echo "<div id='area_show_more_div' style='text-align: right; padding-left: 0px;'>";
									echo "<a style='color: #02A6D8; cursor:pointer;' id='area_show_less'>Less...</a>";
									echo "</div>";	
								}
							}else{
								echo "<div style='text-align: right; padding-left: 0px;'>&nbsp;</div>";
							}
							if(count($locations) > 6)
							{
								echo "</div>";
							}

							echo "</div>";
							$number = 1;
							$step = 2;
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
					echo "<div class='col-xs-6 col-md-6' style='float: left; text-align: left; padding-left: 0px;'>";
					foreach ($locations as $location)
					{
						?>
					<div class="checkbox checkbox-primary">
					<?php
						$location_name = (strlen($location->location) > 10)?substr($location->location, 0, 7) . '..':$location->location;
						echo "<input type='checkbox' class='locations styled' name='locations[]' value='".$location->id."'>";
					?>
					<label for="checkbox2" data-toggle='tooltip' title='<?php echo $location->location; ?>'>
						<?php echo $location_name; ?>
					</label>
                    </div>
					<?php
					}
					echo "</div>";
				}
			?>
		</div>
<?php } ?>
<br />