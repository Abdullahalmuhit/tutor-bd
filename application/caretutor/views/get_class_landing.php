<?php if(!empty($classes)){ ?>
	<div class="form-group" style="padding-left: 0px;padding-right: 0px;">
		<div class="col-xs-12 col-sm-12 col-md-12" style="padding-left: 0px;padding-right: 0px;">
			<label> Class/Courses </label>
		</div>
		<?php foreach($categories as $category){ ?>
			<div class="row">
					<?php $all_classes = $classes[$category->id] ?>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group col-xs-12 col-sm-12 col-md-12" style="padding-left: 0px;padding-right: 0px;">
							<label style="margin-top: 10px;"><?php echo $category->category; ?></label>
						</div>
						<?php
							if (count($all_classes)>2)
							{
								$number = 1;
								$num = ceil((count($all_classes))/2);
								foreach ($all_classes as $class)
								{
									if($class_ids){
										if(in_array($class->id, $class_ids)){
											$checked = 'checked="checked"';
										}else{
											$checked = '';
										}
									}else{
										$checked = '';
									}
									
									if ($number == 1)
									{
										echo "<div class='col-xs-6 col-md-6' style='float: left; text-align: left; padding-left: 0px; padding-right: 0;'>";
									}
									?>
									<div class="styled-input-single">
									<?php
										$class_name = (strlen($class->category) > 20)?substr($class->category, 0, 18) . '..':$class->category;
										echo "<input type='checkbox' class='classes styled' id='classes_".$class->id."' name='classes[]' ".$checked." id='sdg' value='".$class->id."'> ";
									?>
									<label for="classes_<?=$class->id?>" class="input-label-checkbox" data-toggle='tooltip' title='<?php echo $class->category; ?>'>
				                    	<?php echo $class_name; ?>     
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
								echo "<div class='col-xs-6 col-md-6' style='float: left; text-align: left; padding-left: 0px; padding-right: 0;'>";
								foreach ($all_classes as $class)
								{
									if($class_ids){
										if(in_array($class->id, $class_ids)){
											$checked = 'checked="checked"';
										}else{
											$checked = '';
										}
									}else{
										$checked = '';
									}
								?>
								<div class="styled-input-single">
								<?php
									$class_name = (strlen($class->category) > 20)?substr($class->category, 0, 18) . '..':$class->category;
									echo "<input type='checkbox' class='classes styled' id='classes_".$class->id."' name='classes[]' ".$checked." id='sdg' value='".$class->id."'> ";
								?>
								<label for="classes_<?=$class->id?>" class="input-label-checkbox" data-toggle='tooltip' title='<?php echo $class->category; ?>'>
			                    	<?php echo $class_name; ?>  
			                    </label>
			                    </div>
								
								<?php }
								echo "</div>";
							}
						?>
						
					</div>
				</div>
		<?php } ?>
		</div>
	</div>
<?php } ?>
<br />