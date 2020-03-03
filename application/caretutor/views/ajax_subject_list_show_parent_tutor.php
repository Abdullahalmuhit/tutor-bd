<?php if(!empty($sdg)){ ?>
	<!--<fieldset class="col-xs-12 col-sm-12 col-md-12">
		<div class="alert alert-danger subject_msg" style="display: none;"><center>Select subject</center></div>
		<legend style="text-align: left;"><h5><span><i class="fa fa-graduation-cap"></i> </span><b>Subjects </b></h5></legend>
		<div class="col-xs-12 col-sm-12 col-md-12" style="border-style: none none solid; border-width: 0 0 1px; border-color: -moz-use-text-color -moz-use-text-color #e5e5e5;">
			<?php
				if (count($sdg)>3)
				{
					$number = 1;
					$num = ceil((count($sdg))/3);
					foreach ($sdg as $cat)
					{
						if ($number == 1)
						{
							echo "<div class='col-xs-6 col-md-3' style='float: left; text-align: left; padding-left: 5px;'>";
						}
						echo "<input type='checkbox' id='sdg' name='sdg[]' value='".$cat['id']."'> ".$cat['category']."<br/>";
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
					echo "<div class='col-xs-6 col-md-3' style='float: left; text-align: left; padding-left: 5px;'>";
					foreach ($sdg as $cat)
					{
						echo "<input type='checkbox' name='sdg[]' id='sdg' value='".$cat['id']."'> ".$cat['category']."<br/>";
					}
					echo "</div>";
				}
				
				if($category_id == '3'){
					echo "<div class='col-xs-6 col-md-3' style='float: left; text-align: left; padding-left: 5px;'>";
					echo "<input type='radio' required='required' name='english_medium_from' id='english_medium_from' value='cambridge'>  Cambridge<br/>";
					echo "<input type='radio' required='required' name='english_medium_from' id='english_medium_from' value='ed_excel'>  Ed-excel<br/>";
					echo "<input type='radio' required='required' name='english_medium_from' id='english_medium_from' value='ib'>  IB<br/>";
					echo "</div>";
				} else if($category_id == '2'){
					echo "<div class='col-xs-6 col-md-3' style='float: left; text-align: left; padding-left: 5px; border-left: 1px solid #666;'>";
					echo "<input type='radio' required='required' name='bangla_medium_from' id='bangla_medium_from' value='bangla_version'>  Bangla version<br/>";
					echo "<input type='radio' required='required' name='bangla_medium_from' id='bangla_medium_from' value='english_version'>  English version<br/>";
					echo "</div>";
				}
			?>
		</div>
	</fieldset>-->
	
	<div class="uk-form-row">
    	<label class="uk-form-label" for="subject">Subject: </label>
        <select id="subject" name="sdg[]" multiple required data-md-selectize>
        	<?php foreach ($sdg as $cat)
			{ ?>
        	<option value="<?php echo $cat['id']; ?>"><?php echo $cat['category']; ?></option>
        	<?php } ?>
        </select>
    </div>
    <div class="uk-form-row">
    	<label class="uk-form-label" for="subject">Medium: </label>
    	<?php if($category_id == '3'){ ?>
    		<p>
                <input type="radio" name="english_medium_from" id="Cambridge" value='cambridge' data-md-icheck checked="checked" />
                <label for="Cambridge" class="inline-label">Cambridge</label>
            </p>
            
            <p>
                <input type="radio" name="english_medium_from" id="Ed-excel" value='ed_excel' data-md-icheck />
                <label for="Ed-excel" class="inline-label"> Ed-excel </label>
            </p>
            
            <p>
                <input type="radio" name="english_medium_from" id="IB" value='ib' data-md-icheck />
                <label for="IB" class="inline-label"> IB </label>
            </p>
    	<?php } else if($category_id == '2'){?>
    		<p>
                <input type="radio" name="bangla_medium_from" id="Bangla version" value='bangla_version' data-md-icheck checked="checked" />
                <label for="Bangla version" class="inline-label"> Bangla version </label>
            </p>
            
            <p>
                <input type="radio" name="bangla_medium_from" id="English version" value='english_version' data-md-icheck />
                <label for="English version" class="inline-label"> English version </label>
            </p>
		<?php } ?>
	</div>
	
<?php } ?>
