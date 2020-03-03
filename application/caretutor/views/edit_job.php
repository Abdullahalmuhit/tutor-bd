<div class="col-md-8 col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="text_center">
				<h5 class="panel-title" style="font-size: 14px;"><b><i class="fa fa-plus-circle"></i> Edit job</b></h5>
			</div>
		</div>
		
		<div class="panel-body">
			<div class="alert alert-danger subject_msg" style="display: none;"><center>Select subject</center></div>
			<form class="form-horizontal" id="job_edit" data-link="parents/parents_job_edit" method="post" role="form">
				<input type="hidden" value="<?php echo $job[0]->id; ?>" name="job_id" id="job_id" />
				<div class="row">
					<h5 class="text_center">Job info</h5>
					<hr />
					<div class="col-xs-12 col-md-12 col-sm-12 form-group">
				    	<label class="col-sm-12 col-xs-12 col-md-3" for="exampleInputEmail3">City</label>
				    	<div class="col-sm-12 col-md-9 col-xs-12">
				    		<select class="form-control selcity" name="selcity" id="selcity" required="required">
							  	<?php 
								foreach ($city as $cit)
								{
								?>
									<option <?php echo ($cit->id == $job[0]->city_id)?'selected="selected"':''; ?> value="<?php echo ($cit->city == 'Select City')?'':$cit->id; ?>"><?php echo $cit->city; ?></option>
								<?php 
								}
								?>
							</select>
				    	</div>
				  	</div>
				  	<div class="col-xs-12 col-sm-12 col-md-12 form-group">
				    	<label class="col-sm-3 col-xs-4 col-md-3" for="exampleInputPassword3">Location</label>
				    	<div class="col-sm-12 col-md-9 col-xs-12">
					    	<select class="form-control sellocation" <?php echo ($job[0]->city == 'Online')?'disabled="disabled"':''; ?> name="sellocation" id="sellocation" required="required" >
					    		<option value=''>Select Location</option>
					    		<?php foreach($location as $loc){ ?> 
					    		<option <?php echo ($loc->id == $job[0]->city_id)?'selected="selected"':''; ?> value="<?php echo $loc->id; ?>"><?php echo $loc->location; ?></option>
					    		<?php } ?>
							</select>
						</div>
				  	</div>
			  	
				  	<div class="col-xs-12 col-sm-12 col-md-12 form-group">
				    	<label class="col-sm-3 col-xs-4 col-md-3" for="exampleInputPassword3">Category</label>
				    	<div class="col-sm-12 col-md-9 col-xs-12">
					    	<select class="form-control selcat" name="selcat" id="selcat" required="required">
								<?php 
								foreach ($category as $cat)
								{
								?>
									<option <?php echo ($cat->id == $job[0]->tution_category_id)?'selected="selected"':''; ?> value="<?php echo ($cat->category == 'Select Category')?'':$cat->id; ?>"><?php echo $cat->category;?></option>
								<?php 
								}
								?>
							</select>
						</div>
				  	</div>
				  	<div class="col-xs-12 col-sm-12 col-md-12 form-group">
				    	<label class="col-sm-3 col-md-3 col-xs-4" for="exampleInputPassword3">Class/Course</label>
				    	<div class="col-sm-12 col-md-9 col-xs-12">
					    	<select class="form-control selsubcat" name="selsubcat" id="selsubcat" required="required">
								<?php foreach($courses as $cour){ ?> 
					    		<option <?php echo ($cour->id == $job[0]->tution_sub_cat_id)?'selected="selected"':''; ?> value="<?php echo $cour->id; ?>"><?php echo $cour->category; ?></option>
					    		<?php } ?>
							</select>
						</div>
				  	</div>
				  	
				  	<div id="subject_show" class="col-xs-12 col-sm-12 col-md-12">
				  		<?php if(!empty($job[0]->subjects)){
				  			 $subjects = explode(',', $job[0]->subjects); ?>
				  			<fieldset class="col-xs-12 col-sm-12 col-md-12">
							<legend style="text-align: left;"><h5><span><i class="fa fa-graduation-cap"></i> </span><b>Subjects </b></h5></legend>
							<div class="col-xs-12 col-sm-12 col-md-12" style="border-style: none none solid; border-width: 0 0 1px; border-color: -moz-use-text-color -moz-use-text-color #e5e5e5;">
								<?php
									if (count($sdg)>3)
									{
										$number = 1;
										$num = ceil((count($sdg))/3);
										foreach ($sdg as $cat)
										{
											$checked = '';
											foreach($subjects as $subject)
											{
												if($subject == $cat['id']){
													$checked = 'checked="checked"';
												}
											}
											if ($number == 1)
											{
												echo "<div class='col-xs-6 col-md-3' style='float: left; text-align: left; padding-left: 5px;'>";
											}
											echo "<input type='checkbox' ".$checked." id='sdg' name='sdg[]' value='".$cat['id']."'> ".$cat['category']."<br/>";
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
											echo "<input type='checkbox' ".$checked." name='sdg[]' id='sdg' value='".$cat['id']."'> ".$cat['category']."<br/>";
										}
										echo "</div>";
									}
									
									if($job[0]->tution_category_id == '3'){
										if($job[0]->english_medium_from == 'cambridge'){
											$checked = 'checked="checked"';
										} elseif($job[0]->english_medium_from == 'ed_excel')
										{
											$checked = 'checked="checked"';
										} elseif($job[0]->english_medium_from == 'ib')
										{
											$checked = 'checked="checked"';
										}
										echo "<div class='col-xs-6 col-md-3' style='float: left; text-align: left; padding-left: 5px;'>";
										echo "<input type='radio' ".$checked." required='required' name='english_medium_from' id='english_medium_from' value='cambridge'>  Cambridge<br/>";
										echo "<input type='radio' ".$checked." required='required' name='english_medium_from' id='english_medium_from' value='ed_excel'>  Ed-excel<br/>";
										echo "<input type='radio' ".$checked." required='required' name='english_medium_from' id='english_medium_from' value='ib'>  IB<br/>";
										echo "</div>";
									} else if($job[0]->tution_category_id == '2'){
										
										if($job[0]->bangla_medium_from == 'bangla_version'){
											$checked = 'checked="checked"';
										} elseif($job[0]->bangla_medium_from == 'english_version')
										{
											$checked = 'checked="checked"';
										}
										
										echo "<div class='col-xs-6 col-md-3' style='float: left; text-align: left; padding-left: 5px; border-left: 1px solid #666;'>";
										echo "<input type='radio' ".$checked." required='required' name='bangla_medium_from' id='bangla_medium_from' value='bangla_version'>  Bangla version<br/>";
										echo "<input type='radio' ".$checked." required='required' name='bangla_medium_from' id='bangla_medium_from' value='english_version'>  English version<br/>";
										echo "</div>";
									}
								?>
							</div>
						</fieldset>	
				  		<?php } ?>
				  	</div>
				  	
				  	<div class="col-xs-12 col-sm-12 col-md-12 form-group">
				  		<label class="col-sm-3 col-md-3 col-xs-4" for="exampleInputPassword3">Tutor gender reference</label>
						<div class="col-sm-12 col-md-9 col-xs-12">
					    	<select class="form-control selgender" id="selgender" name="selgender" required="required">
								<option value="">Tutor gender reference</option>
								<option <?php echo ($job[0]->preferred_gender == 'Male')?'selected="selected"':''; ?> value="Male">Male</option>
								<option <?php echo ($job[0]->preferred_gender == 'Female')?'selected="selected"':''; ?> value="Female">Female</option>
							</select>
						</div>
				  	</div>
				  	<div class="col-xs-12 col-sm-12 col-md-12 form-group">
				  		<label class="col-sm-3 col-md-3 col-xs-4" for="exampleInputPassword3">Days in a week</label>
				  		<div class="col-sm-12 col-md-9 col-xs-12">						    	
					    	<select class="form-control days_in_week" id="days_in_week" name="selday" required="required" >
								<option value="">Days in a week</option>
								<option <?php echo ($job[0]->days_per_week == '1')?'selected="selected"':''; ?> value="1">1</option>
								<option <?php echo ($job[0]->days_per_week == '2')?'selected="selected"':''; ?> value="2">2</option>
								<option <?php echo ($job[0]->days_per_week == '3')?'selected="selected"':''; ?> value="3">3</option>
								<option <?php echo ($job[0]->days_per_week == '4')?'selected="selected"':''; ?> value="4">4</option>
								<option <?php echo ($job[0]->days_per_week == '5')?'selected="selected"':''; ?> value="5">5</option>
								<option <?php echo ($job[0]->days_per_week == '6')?'selected="selected"':''; ?> value="6">6</option>
								<option <?php echo ($job[0]->days_per_week == '7')?'selected="selected"':''; ?> value="7">7</option>
							</select>
						</div>
				  	</div>
				  	
					<div class="col-xs-12 col-sm-12 col-md-12 form-group">
						<label class="col-sm-3 col-md-3 col-xs-4" for="exampleInputPassword3">Salary range</label>
						<div class="col-sm-12 col-md-9 col-xs-12">
				    		<input type="number" class="form-control" id="salary_range" name="salary" required="required" value="<?php echo $job[0]->salary_range; ?>">
				    	</div>
				  	</div>
				  	<!--<div class="col-xs-12 col-sm-12 col-md-12 form-group">
			            <div class="col-xs-12 col-sm-12 col-md-12 input-group input-append date">
			                <input type="text" class="form-control" id="date_to_hire" readonly="readonly" name="date_to_hire" placeholder="When are you looking to hire" />
			                <span class="input-group-addon add-on"  style="width: 1%;"><span class="glyphicon glyphicon-calendar"></span></span>
			            </div>
				  	</div>-->
				  	<div class="col-xs-12 col-sm-12 col-md-12 form-group">
				  		<label class="col-sm-3 col-md-3 col-xs-4" for="exampleInputPassword3">When are you looking to hire</label>
				    	<div class="date col-xs-12 col-sm-12 col-md-9" id="datePicker1">
				            <div class="input-group input-append date">
				                <input type="text" class="form-control" id="date_to_hire" readonly="readonly" name="date_to_hire" value="<?php echo date('m-d-Y',strtotime($job[0]->date_to_hire)); ?>" />
				                <span class="input-group-addon add-on" style="width: 1%;"><span class="glyphicon glyphicon-calendar"></span></span>
				            </div>
				        </div>
				  	</div>
				  	<br />
				  	<h5 class="text_center">Guardian info</h5>
				  	<hr />
				  	<div class="col-xs-12 col-sm-12 col-md-12 form-group">
				  		<label class="col-sm-3 col-md-3 col-xs-4" for="exampleInputPassword3">Guardian name</label>
						<div class="col-sm-12 col-md-9 col-xs-12">
							<input id="guardian_name" name="guardian_name" type="text" class="form-control" value="<?php echo $job[0]->guardian_name; ?>"/>
						</div>
					</div>
		  			
		  			<div class="col-xs-12 col-sm-12 col-md-12 form-group">
		  				<label class="col-sm-3 col-md-3 col-xs-4" for="exampleInputPassword3">Guardian contact no.</label>
						<div class="col-sm-12 col-md-9 col-xs-12">
							<input id="add_contact_num" name="add_contact_num" type="text" class="form-control" value="<?php echo $job[0]->add_contact_num; ?>"/>
						</div>
					</div>
				  	
				  	<br />
				  	<h5 class="text_center">Student info</h5>
				  	<hr />
				  	<div class="col-xs-12 col-sm-12 col-md-12 form-group">
				  		<label class="col-sm-3 col-md-3 col-xs-4" for="exampleInputPassword3">Student Gender</label>
						<div class="col-sm-12 col-md-9 col-xs-12">
					    	<select id="selstgender" name="selstgender" class="form-control" required="required">
								<option value="">Student Gender</option>
								<option <?php echo ($job[0]->student_gender == 'Male')?'selected="selected"':''; ?> value="Male">Male</option>
								<option <?php echo ($job[0]->student_gender == 'Female')?'selected="selected"':''; ?> value="Female">Female</option>
							</select>
						</div>
				  	</div>
				  	
		  			<div class="col-xs-12 col-sm-12 col-md-12 form-group">
		  				<label class="col-sm-3 col-md-3 col-xs-4" for="exampleInputPassword3">Institute</label>
						<div class="col-sm-12 col-md-9 col-xs-12">
							<input id="institute" name="institute" type="text" class="form-control" value="<?php echo $job[0]->institute; ?>"/>
							<input id="institute_id" name="institute_id" type="hidden" class="form-control" value="<?php echo $job[0]->institute_id; ?>" />
						</div>
					</div>
		  			
					<br />
				  	<h5 class="text_center">Contact info</h5>
				  	<hr />
				  	
					<div <?php echo ($job[0]->city == 'Online')?'':'style="display: none;"'; ?> class="col-xs-12 col-sm-12 col-md-12 form-group" id="skype_id_div">
						<label class="col-sm-3 col-md-3 col-xs-4" for="exampleInputPassword3">Skype ID</label>
						<div class="col-sm-12 col-md-9 col-xs-12">
							<input type="text" class="form-control" id="skype_id" name="skype_id" value="<?php echo $job[0]->skype_id; ?>" />
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-12 form-group">
						<label class="col-sm-3 col-md-3 col-xs-4" for="exampleInputPassword3">Detail address</label>
						<div class="col-sm-12 col-md-9 col-xs-12">
				    		<textarea class="form-control" id="detail_address" required="required" name="address" placeholder="Detail address"><?php echo $job[0]->address; ?></textarea>
				    	</div>
				    </div>
				    
				    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
				    	<label class="col-sm-3 col-md-3 col-xs-4" for="exampleInputPassword3">More about job requiremennts</label>
				    	<div class="col-sm-12 col-md-9 col-xs-12">							    	
				    		<textarea class="form-control" id="more_about_requirements" name="otherreq" rows="5" placeholder="Please tell us a bit more about your  requirement to help us match better"><?php echo $job[0]->other_req; ?></textarea>
				    	</div>
				    </div>
				    
				    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
				    	<div class="col-sm-12 col-md-12 col-xs-12">
				    		<button type="submit" class="btn btn-hire-new-tutor pull-right">Submit</button>
				    	</div>
				    </div>
			  	</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-2 col-xs-12 col_md_9 hidden-xs" id="related_link">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<h5 class="panel-title" style="font-size: 14px;"><b><i class="fa fa-info-circle"></i> Related Link</b></h5>
			</div>
		</div>
		
		<div class="panel-body">
			<div class="row" style="text-align: left;">
				<p style="margin-left: 5px;"><a href="#">#Safety issues</a></p>
				<p style="margin-left: 5px;"><a href="#">#How to select a good tutor</a></p>
			</div>
		</div>
	</div>
</div>
<div class="col-xs-12 col_md_9 visible-xs" id="mobile_related_link">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<h5 class="panel-title" style="font-size: 14px;"><b><i class="fa fa-info-circle"></i> Related Link</b></h5>
			</div>
		</div>
		
		<div class="panel-body">
			<div class="row" style="text-align: left;">
				<p style="margin-left: 5px;"><a href="#">#Safety issues</a></p>
				<p style="margin-left: 5px;"><a href="#">#How to select a good tutor</a></p>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('#datePicker1').datepicker();

		$("form").submit(function(event){
			event.preventDefault();
			if($("input[name='sdg[]']").length > 0){
				if($("input[type='checkbox'][name='sdg[]']:checked").length) {
					
				} else {
					$('.subject_msg').show();
					$('.subject_msg').delay(5000).fadeOut('slow');
					
					$('html, body').animate({
				        scrollTop: $('.subject_msg').offset().top
				    }, 2000);
					return false;
				}
			}

			var url = BASE_URL+$(this).data("link");
			var form = "#"+$(this).attr('id');
			var data = $(form).serialize();
			$.ajax({
				url: url,
				type: "POST",
				data: data,
				dataType: "json",
				success: function(data) {
					if(data.status == 'redirect')
					{
						window.location.href = BASE_URL+data.url;
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert(textStatus+errorThrown);
				}
			});
		});
		
		$('#institute').blur(function(){
		    var keyEvent = $.Event("keydown");
		    keyEvent.keyCode = $.ui.keyCode.ENTER;
		    $(this).trigger(keyEvent);
		    // Stop event propagation if needed
		    return false; 
	    }).autocomplete({
			source: BASE_URL+"alldata/institute_autocomplete",
			autoFocus: true,
			select: function(event, ui) {
		        event.preventDefault();
		        $(this).val(ui.item.label);
		        $("#institute_id").val(ui.item.value);
		    },
		    change: function(event, ui) {
		    	if(!ui.item)
		    	{
		    		$("#institute_id").val("");
		    	}
		    }
		});
	});
</script>