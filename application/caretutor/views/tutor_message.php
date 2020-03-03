<div class="" ><!--view profile-->
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading" style="text-align: left;">
				<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-user"></i> <?php echo ($profile->verify_status == 0)?"Success":"Let's get started!"; ?></b></h5>
			</div>
			<div class="panel-body">
				<div class="row">
					<div>
						<div class="col-md-12">
							<?php 
							if ($profile->verify_status == 0)
							{
							?>
							<p>Your account has been successfully created. A confirmation email has been sent to: <?php echo $profile->email;?>. Check your email and click on the link.</p>
							<?php 
							}
							else 
							{
							?>
							<p>Thanks for creating an account with caretutors.com. Please complete your profile today and apply to your desired tutoring jobs. Happy Tutoring!</p>
							<?php 
							}
							?>
						</div>
					</div>
				</div>
				
				<div class="col-md-12">
					<div class="col-md-8">
					</div>
					<div class="col-md-4">
						<a href="<?php echo base_url();?>tutor/step_complete/1"><button class="btn_settings btn btn-success pull-right" <?php echo ($profile->verify_status == 0)?"disabled='disabled'":"";?> type="button">Complete Your Profile</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>