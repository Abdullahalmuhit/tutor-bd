<div class="body_container"><!--view profile-->
	<div class="row">
		<div class="col-md-8 col_md_9 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="text_center">
						<h5 class="panel-title" style="font-size: 14px;"><b><i class="fa fa-plus-circle"></i> Hire a new tutor</b></h5>
					</div>
				</div>
				
				<div class="panel-body">
					<form class="form-horizontal parent_registration_form" id="parent_registration_form" data-link="parents/parents_new_job_save" method="post" role="form">
						<input type="hidden" value="1" name="step" id="step" />
						<input type="hidden" value="guardian" name="user_type" id="user_type" />
						<div class="row">
							<h5 class="text_center">Job info</h5>
							<hr />
							<div class="col-xs-12 col-md-12 col-sm-12 input_margin_bottom">
						    	<!--<label class="col-sm-3 col-xs-4 hidden-xs" for="exampleInputEmail3">City</label>-->
						    	<div class="col-sm-12 col-md-12 col-xs-12">
						    		<select class="form-control selcity" name="selcity" id="selcity" required="required">
									  	<?php 
										foreach ($city as $cit)
										{
										?>
											<option value="<?php echo ($cit->city == 'Select City')?'':$cit->id; ?>"><?php echo $cit->city; ?></option>
										<?php 
										}
										?>
									</select>
						    	</div>
						  	</div>
						  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
						    	<!--<label class="col-sm-3 col-xs-4 hidden-xs" for="exampleInputPassword3">Location</label>-->
						    	<div class="col-sm-12 col-xs-12">
							    	<select class="form-control sellocation" name="sellocation" id="sellocation" required="required" >
										<option>Select Location</option>
									</select>
								</div>
						  	</div>
					  	
						  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
						    	<!--<label class="col-sm-3 col-xs-4 hidden-xs" for="exampleInputPassword3">Category</label>-->
						    	<div class="col-sm-12 col-md-12 col-xs-12">
							    	<select class="form-control selcat" name="selcat" id="selcat" required="required">
										<?php 
										foreach ($category as $cat)
										{
										?>
											<option value="<?php echo ($cat->category == 'Select Category')?'':$cat->id; ?>"><?php echo $cat->category;?></option>
										<?php 
										}
										?>
									</select>
								</div>
						  	</div>
						  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
						    	<!--<label class="col-sm-3 col-xs-4 hidden-xs" for="exampleInputPassword3">Class/Course</label>-->
						    	<div class="col-sm-12 col-md-12 col-xs-12">
							    	<select class="form-control selsubcat" name="selsubcat" id="selsubcat" required="required">
										<option>Select Class/Course</option>
									</select>
								</div>
						  	</div>
						  	
						  	<div id="subject_show" class="col-xs-12 col-sm-12 col-md-12">
						  		
						  	</div>
						  	
						  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								<div class="col-sm-12 col-md-12 col-xs-12">
							    	<select class="form-control selgender" id="selgender" name="selgender" required="required">
										<option value="">Tutor gender reference</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
						  	</div>
						  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
						  		<div class="col-sm-12 col-md-12 col-xs-12">						    	
							    	<select class="form-control days_in_week" id="days_in_week" name="selday" required="required" >
										<option value="">Days in a week</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
									</select>
								</div>
						  	</div>
						  	
							<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								<div class="col-sm-12 col-md-12 col-xs-12">
						    		<input type="number" class="form-control" id="salary_range" name="salary" required="required" placeholder="Salary range">
						    	</div>
						  	</div>
						  	<!--<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
					            <div class="col-xs-12 col-sm-12 col-md-12 input-group input-append date">
					                <input type="text" class="form-control" id="date_to_hire" readonly="readonly" name="date_to_hire" placeholder="When are you looking to hire" />
					                <span class="input-group-addon add-on"  style="width: 1%;"><span class="glyphicon glyphicon-calendar"></span></span>
					            </div>
						  	</div>-->
						  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
						    	<div class="date col-xs-12 col-sm-12 col-md-12" id="datePicker">
						            <div class="input-group input-append date">
						                <input type="text" class="form-control" id="date_to_hire" readonly="readonly" name="date_to_hire" placeholder="When are you looking to hire" />
						                <span class="input-group-addon add-on" style="width: 1%;"><span class="glyphicon glyphicon-calendar"></span></span>
						            </div>
						        </div>
						  	</div>
						  	<br />
						  	<h5 class="text_center">Guardian info</h5>
						  	<hr />
						  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								<div class="col-sm-12 col-md-12 col-xs-12">
									<input id="guardian_name" name="guardian_name" type="text" class="form-control" placeholder="Guardian Name"/>
								</div>
							</div>
				  			
				  			<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								<div class="col-sm-12 col-md-12 col-xs-12">
									<input id="add_contact_num" name="add_contact_num" type="text" class="form-control" placeholder="Guardian Contact No."/>
								</div>
							</div>
						  	
						  	<br />
						  	<h5 class="text_center">Student info</h5>
						  	<hr />
						  	<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								<div class="col-sm-12 col-md-12 col-xs-12">
							    	<select id="selstgender" name="selstgender" class="form-control" required="required">
										<option value="">Student Gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
						  	</div>
						  	
				  			<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								<div class="col-sm-12 col-md-12 col-xs-12">
									<input id="institute" name="institute" type="text" class="form-control" placeholder="Institute Name"/>
									<input id="institute_id" name="institute_id" type="hidden" class="form-control" />
								</div>
							</div>
				  			
							<br />
						  	<h5 class="text_center">Contact info</h5>
						  	<hr />
						  	
							<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom" id="skype_id_div" style="display: none;">
								<div class="col-sm-12 col-md-12 col-xs-12">
									<input type="text" class="form-control" id="skype_id" name="skype_id" placeholder="Please provide your Skype ID">
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
								<div class="col-sm-12 col-md-12 col-xs-12">
						    		<textarea class="form-control" id="detail_address" required="required" name="address" placeholder="Detail address"></textarea>
						    	</div>
						    </div>
						    
						    <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
						    	<div class="col-sm-12 col-md-12 col-xs-12">							    	
						    		<textarea class="form-control" id="more_about_requirements" name="otherreq" rows="5" placeholder="Please tell us a bit more about your  requirement to help us match better"></textarea>
						    	</div>
						    </div>
						    
						    <div class="col-xs-12 col-sm-12 col-md-12">
						    	<div class="col-sm-12 col-md-12 col-xs-12">
						    		<button type="submit" name="submit_first" class="btn btn-hire-new-tutor pull-right" id="submit_first">Save</button>
						    	</div>
						    </div>
					  	</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-2 col-xs-12 col_md_9 hidden-xs">
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
		<div class="col-md-2 col-xs-12 col_md_9 visible-xs">
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
	</div>
</div>