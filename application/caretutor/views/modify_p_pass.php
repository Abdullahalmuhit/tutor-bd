	<form id="frmppass" data-link="parents/update_p_pass" class="form-horizontal margin_top" role="form">
		<div class="col-md-9">
			
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align: left;">
					<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-lock"></i> Change Password</b></h5>
				</div>
				<div class="panel-body" style="text-align: center;">
		
		
					<?php if ($m=="dm"){?><span>Current password does not match</span><?php } else if ($m=="y") {?><span>Password change successfully</span><?php }?>
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-lock"></i> </span><b>Current Password  </b></h5>
						<input id="cpass" name="cpass" type="password" class="form-control" placeholder="Current Password" />
					</div>
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-lock"></i> </span><b>New Password</b></h5>
						<input type="password" id="password" name="password" required class="form-control" placeholder="New Password" title="" />
					</div>
					<div class="input-group"> 
						<h5 class="input-group-addon"><span><i class="fa fa-lock"></i> </span><b>Re-type Password</b></h5>
						<input type="password" id="repassword" name="repassword" required class="form-control" placeholder="Re-type Password" title="Please enter the same Password as above" onchange="form.password.pattern = this.value;" />
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
