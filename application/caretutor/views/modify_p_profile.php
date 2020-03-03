	<form id="frmpprof" data-link="parents/update_p_profile" class="form-horizontal margin_top" role="form">
		<div class="col-md-9">
			
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align: left;">
					<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-user"></i> Personal Information</b></h5>
				</div>
				<div class="panel-body" style="text-align: center;">
			
			
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-user"></i> </span><b>Full Name  </b></h5>
						<input id="fullname" name="fullname" type="text" class="form-control" placeholder="Full Name" value="<?php echo $profile->full_name; ?>" />
					</div>
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-envelope-o"></i> </span><b>Email  </b></h5>
						<input id="email" name="email" type="email" disabled class="form-control" placeholder="Email Address" value="<?php echo $profile->email; ?>" />
					</div>
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa fa-mobile-phone"></i> </span><b>Contact Number  </b></h5>
						<input id="mobile_no" name="mobile_no" type="number" class="form-control" placeholder="Contact Number" value="<?php echo $profile->mobile_no; ?>" />
					</div>
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-user"></i> </span><b>User ID</b></h5>
						<input id="user_id" name="user_id" type="text" disabled class="form-control" placeholder="User ID" value="<?php echo $profile->user_id; ?>" />
					</div>
					<div class="input-group margin_top col-md-12"> 
						<div class="col-md-6"></div>
						<div class="col-md-6">
							<button class="btn_settings btn btn-success pull-right" type="submit"> Save</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
