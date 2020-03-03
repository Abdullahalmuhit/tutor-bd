<div class="" ><!--view profile-->
	<div class="col-md-9">
	
		<div class="panel panel-default">
			<div class="panel-heading" style="text-align: left;">
				<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-user"></i> My Request</b></h5>
			</div>
			<div class="panel-body">
	
				<?php 
				foreach ($profile as $row)
				{
					$id = $row->id;
				?>
				<div class="row">
					<div>
						<div class="col-md-5">
							<p><b>Gurardian Name</b></p>
						</div>
						<div class="col-md-7">
							<p><?php echo $row->guardian_name;?></p>
						</div>
					</div>
					<div>
						<div class="col-md-5">
							<p><b>Contact Number</b></p>
						</div>
						<div class="col-md-7">
							<p><?php echo $row->add_contact_num;?></p>
						</div>
					</div>
					<div>
						<div class="col-md-5">
							<p><b>City</b></p>
						</div>
						<div class="col-md-7">
							<p><?php echo $row->city;?></p>
						</div>
					</div>
					<div>
						<div class="col-md-5">
							<p><b>Location</b></p>
						</div>
						<div class="col-md-7">
							<p><?php echo $row->location;?></p>
						</div>
					</div>
					<div>
						<div class="col-md-5">
							<p><b>Institute</b></p>
						</div>
						<div class="col-md-7">
							<p><?php echo $row->institute;?></p>
						</div>
					</div>
					<div>
						<div class="col-md-5">
							<p><b>Class</b></p>
						</div>
						<div class="col-md-7">
							<p><?php echo $row->sub_cat;?></p>
						</div>
					</div>
					<div>
						<div class="col-md-5">
							<p><b>Subjects</b></p>
						</div>
						<div class="col-md-7">
							<p><?php echo $row->subs;?></p>
						</div>
					</div>
					<div>
						<div class="col-md-5">
							<p><b>Salary</b></p>
						</div>
						<div class="col-md-7">
							<p><?php echo $row->salary_range;?></p>
						</div>
					</div>
					<div>
						<div class="col-md-5">
							<p><b>Address</b></p>
						</div>
						<div class="col-md-7">
							<p><?php echo $row->address;?></p>
						</div>
					</div>
					<div>
						<div class="col-md-5">
							<p><b>Other Requirements</b></p>
						</div>
						<div class="col-md-7">
							<p><?php echo $row->other_req;?></p>
						</div>
					</div>
				</div>
				<?php 
				}
				?>
				
				<div class="col-md-12">
					<div class="col-md-8">
					</div>
					<div class="col-md-4">
						<a href="<?php echo base_url();?>parents/edit_req/<?php echo $id;?>"><button class="btn_settings btn btn-success pull-right" type="button">Edit Requirements</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>