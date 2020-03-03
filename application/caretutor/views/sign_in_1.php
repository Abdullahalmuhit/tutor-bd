<?php echo $header; ?>
	<div class="wrapper bck_clr">
		<div class="container">
			<div class="row">
				<section>
					<!-- <div class="col-md-12 notice margin_top">
						<h3>To Register Over Phone, Call Directly: +8801756441122</h3>
					</div> -->
				</section>
				<section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">
					<div class="col-md-2"></div>
					<div class="col-md-8 margin_top" style="text-align:center;">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h2 class="panel-title"><b><i class="fa fa-user"></i> Sign In</b></h2>
						  </div>
						  <div class="panel-body">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<form id="frmsignin" data-link="user/login" class="form-horizontal margin_top" role="form">
									<span id="msg"></span>
									<div class="input-group">
										<input type="radio" <?php echo (isset($user_type) && ($user_type == 'guardian'))?"checked":"";?> name="radiog_dark" id="radparent" class="css-checkbox" value="guardian" />
										<label for="radparent" class="css-label radGroup2" style="margin-right: 20px;">Parent/Student</label>
										<input type="radio" <?php echo (isset($user_type) && ($user_type == 'tutor'))?"checked":"";?> name="radiog_dark" id="radtutor" class="css-checkbox" value="tutor" />
										<label for="radtutor" class="css-label radGroup2">Tutor</label>
									</div>
									<div class="input-group"> 
										<h5 class="input-group-addon"><span><i class="fa fa-envelope-o"></i> </span><b>Email : </b></h5>
										<input id="email" name="email" type="email" required class="form-control" placeholder="Email Address"/>
									</div>
									<div class="input-group"> 
										<h5 class="input-group-addon"><span><i class="fa fa-lock"></i> </span><b>Password :</b></h5>
										<input id="password" name="password" type="password" required class="form-control" placeholder="Password"/>
									</div>
									
									<div class="form-group margin_top row"> 
										<div class="col-md-7"></div>
										<div class="col-md-5">
											<button class="btn_settings btn btn-success  pull-right" type="submit">Sign in</button>
										</div>
										<div class="col-md-5 pull-right" style="font-size: 12px;">
											<a class="pull-right" href="<?php echo base_url();?>user/forgot_password">Forgot password?</a><br/>
											<a class="pull-right" href="<?php echo base_url();?>"> &nbsp;Sign Up Now</a><span style="color: #000000;" class="pull-right">Don't have an account? </span>
										</div>
									</div>
								</form>
							</div>
						  </div>
						</div>
				</section>
			</div>
		</div>
	</div>
<?php echo $footer; ?>