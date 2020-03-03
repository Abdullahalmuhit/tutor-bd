<div class="" ><!--view profile-->
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading" style="text-align: left;">
				<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-user"></i> My Personal Info</b></h5>
			</div>
			<div class="panel-body">
	
		<div class="row">
			<h4 class="col-md-10"><span><i class="fa fa-user"></i> Your Profile</span></h4>
		</div>
		<div class="row">
			<div>
				<div class="col-md-5">
					<p><b>Name</b></p>
				</div>
				<div class="col-md-7">
					<p><?php echo $profile->full_name;?></p>
				</div>
			</div>
			<div>
				<div class="col-md-5">
					<p><b>Email</b></p>
				</div>
				<div class="col-md-7">
					<p><?php echo $profile->email;?></p>
				</div>
			</div>
			<div>
				<div class="col-md-5">
					<p><b>Contact Number</b></p>
				</div>
				<div class="col-md-7">
					<p><?php echo $profile->mobile_no;?></p>
				</div>
			</div>
			<div>
				<div class="col-md-5">
					<p><b>User Id</b></p>
				</div>
				<div class="col-md-7">
					<p><?php echo $profile->user_id;?></p>
				</div>
			</div>
<!-- 			<div> -->
<!-- 				<div class="col-md-5"> -->
<!-- 					<p><b>Address</b></p> -->
<!-- 				</div> -->
<!-- 				<div class="col-md-7"> -->
<!-- 					<p>Green Road, Dhanmondi</p> -->
<!-- 				</div> -->
<!-- 			</div> -->
			<div class="col-md-12">
				<div class="col-md-8">
				</div>
				<div class="col-md-4">
					<a href="<?php echo base_url();?>parents/edit_profile"><button class="btn_settings btn btn-success pull-right" type="button">Edit Profile</button></a>
				</div>
			</div>
		</div>
		</div></div>
	</div>
</div>