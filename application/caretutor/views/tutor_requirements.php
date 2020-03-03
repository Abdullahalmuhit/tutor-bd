<?php echo $header; ?>
	<div class="wrapper bck_clr">
		<div class="container">
			<div class="row">
				<section>
					<!-- <div class="col-md-12 notice margin_top">
						<h4>To Register Over Phone, Call Directly: +8801756441122</h4>
					</div> -->
				</section>
				<section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">
					<div class="col-md-2"></div>
					<div class="col-md-8 margin_top" style="text-align:center;">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h2 class="panel-title"><b><i class="fa fa-user"></i> Request For A Tutor</b></h2>
						  </div>
						  <div class="panel-body">
							
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<div class="notice">
										<p><span><i class="fa fa-phone"></i></span> To Register Over Phone, Call Directly: +8801756441122</p>
								</div>
								<h4><span>Post Your Tutor Requirements</span></h4>
								<form id="frmtr" data-link="parents/add_tutor_requirements" class="form-horizontal margin_top" role="form">
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
										<h5 class="input-group-addon"><span><i class="fa fa-dollar"></i> </span><b>Guardian Name </b></h5>
										<input id="guardian_name" name="guardian_name" type="text" class="form-control" placeholder="Guardian Name"/>
									</div>
									<div class="input-group"> 
										<h5 class="input-group-addon"><span><i class="fa fa-dollar"></i> </span><b>Guardian Contact No. </b></h5>
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
										<h5 class="input-group-addon"><span><i class="fa fa-dollar"></i> </span><b>Institute </b></h5>
										<input id="institute" name="institute" type="text" class="form-control" placeholder="Institute Name"/>
									</div>
									<div class="input-group"> 
										<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap "></i> </span><b>Tutor For </b></h5>
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
										<h5 class="input-group-addon"><span><i class="fa fa-graduation-cap "></i> </span><b>Class </b></h5>
										<select id="selsubcat" name="selsubcat" class="form-control input_select selsubcat">
											<option value="0">--Select Class--</option>
										</select>
									</div>
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
										<h5 class="input-group-addon"><span><i class="fa fa-dollar"></i> </span><b>Salary Range </b></h5>
										<input id="salary" name="salary" type="number" class="form-control" placeholder="Salary Range"/>
									</div>
									<div class="input-group"> 
										<h5 class="input-group-addon"><span> <i class="fa fa-male"></i> / <i class="fa fa-female"></i> </span><b>Gender Preferences</b></h5>
										<select id="selgender" name="selgender" class="form-control">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Any">Any</option>
										</select>
									</div>
									<div class="input-group"> 
										<h5 class="input-group-addon"><span><i class="fa fa-pencil"></i> </span><b>Address  </b></h5>
										<textarea name="address" id="address" rows="5" class="form-control">
										Flat : 
										House : 
										Road : 
										Block : 
										Area : 
										</textarea>
									</div>
									<div class="input-group"> 
										<h5 class="input-group-addon"><span><i class="fa fa-pencil"></i> </span><b>Other requirements  </b></h5>
										<textarea name="otherreq" id="otherreq" rows="5" class="form-control" placeholder="Other requirements"></textarea>
									</div>
									<div class="form-group margin_top row"> 
										<div class="col-md-8"></div>
										<div class="col-md-4">
											<button class="btn_settings btn btn-success  pull-right" type="submit"> Post Requirements</button>
										</div>
									</div>
								</form>
							</div>
						  </div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>	
<?php echo $footer; ?>
