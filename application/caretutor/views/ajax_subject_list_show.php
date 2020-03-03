<?php if(!empty($sdg)){ ?>
		<div class="alert alert-danger subject_msg" style="display: none;"><center>Select subject</center></div>
		
		<div class="col-xs-6 col-sm-6 col-md-6 input_margin_mobile" style="">

							<div class='form-group' style='margin-bottom:0px'>
								<label for='sdg'>Subjects</label>
							</div>
			<?php
				if (count($sdg)>3)
				{
					$number = 1;
					$num = ceil((count($sdg))/3);
					foreach ($sdg as $cat)
					{
						if ($number == 1)
						{
							echo "<div class='col-xs-12 col-md-6' style='float: left; text-align: left; padding-left: 5px;'>
							";
						}
						echo "<div class='styled-input-single'><input type='checkbox' id='sdg_".$cat['id']."' name='sdg[]' value='".$cat['id']."'> <label for='sdg_".$cat['id']."' class='input-label-checkbox'>".$cat['category']."</label></div>";
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
					echo "<div class='col-xs-12 col-md-6' style='float: left; text-align: left; padding-left: 5px;'> ";
					foreach ($sdg as $cat)
					{
						echo "<div class='styled-input-single'><input type='checkbox' name='sdg[]' id='sdg_".$cat['id']."' value='".$cat['id']."'> <label for='sdg_".$cat['id']."' class='input-label-checkbox'>".$cat['category']."</label></div>";
					}
					echo "</div>";
				}
			echo '</div>';
				
				if($category_id == '3'){
					echo "<div class='col-xs-6 col-md-3 input_margin_mobile' style='float: left; text-align: left; padding-left: 5px;'>";
					echo "<div class='form-group' style='margin-bottom:0px'><label for='sdg'>Curriculum</label></div>";
					echo "<div class='styled-input-single'><input type='radio' required='required' name='english_medium_from' id='english_medium_from' checked='checked' value='cambridge'>  <label for='english_medium_from' class='input-label-radio'>Cambridge</label></div>";
					
					echo "<div class='styled-input-single'><input type='radio' required='required' name='english_medium_from' id='excel_medium_from' value='ed_excel'>  <label for='excel_medium_from' class='input-label-radio'>Ed-excel</label></div>";
					
					echo "<div class='styled-input-single'><input type='radio' required='required' name='english_medium_from' id='ib_medium_from' value='ib'>  <label for='ib_medium_from' class='input-label-radio'>IB</label></div>";
					echo "</div>";
				} else if($category_id == '2'){
					echo "<div class='col-xs-6 col-md-3 input_margin_mobile' style='float: left; text-align: left; padding-left: 5px;'>";
					echo "<div class='styled-input-single'><input type='radio' required='required' name='bangla_medium_from' id='bangla_medium_from' checked='checked' value='bangla_version'>  <label for='bangla_medium_from' class='input-label-radio'>Bangla version</label></div>";
					echo "<div class='styled-input-single'><input type='radio' required='required' name='bangla_medium_from' id='english_medium_from' value='english_version'> <label for='english_medium_from' class='input-label-radio'> English version</label></div>";
					echo "</div>";
				}
			?>
		
<?php } ?>
