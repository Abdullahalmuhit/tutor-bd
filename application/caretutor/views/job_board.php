
<div class="">
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading" style="text-align: left;">
				<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-rocket"></i> <?php echo $status; ?> Tutoring Jobs</b></h5>
			</div>
			<div class="panel-body">
			
		<div class="all_tution_list margin_top">
			<?php 
			foreach ($jobs as $job)
			{
			?>
			<div class="des_box">
				<div class="row">
					<div class="col-md-5">
						<p><b>Job ID :</b> <?php echo $job->id; ?></p>
						<p><b>Category :</b> <?php echo $job->category; ?></p>
						<p><b>Class/Course :</b> <?php echo $job->sub_cat; ?></p>
						<p><b>Subjects :</b> <?php echo $job->subs; ?></p>
						<p><b>City :</b> <?php echo $job->city; ?></p>
						<p><b>Location :</b> <?php echo $job->location; ?></p>
					</div>
					<div class="col-md-5">
						<p><b>Salary :</b> <?php echo $job->salary_range; ?>Tk</p>
						<p><b>Days/Week :</b> <?php echo $job->days_per_week; ?></p>
						<p><b>Tutor Gender Preference :</b> <?php echo $job->preferred_gender; ?></p>
						<p><b>Other Requirements :</b> <?php echo $job->other_req; ?></p>
					</div>
					
					<?php 
					if ($status != 'Applied' && ($job->my_status != 'Applied' && $job->my_status != 'Selected' && $job->my_status != 'Assign'))
					{
					?>
					<div class="col-md-2">
						<p class="date pull-right"><?php echo $job->upd;?></p>
						<a href="<?php echo base_url();?>tutor/apply_job/<?php echo $job->jobs_id;?>/<?php echo $status;?>"><button style="margin-top:65%; margin-left:44%;" class="btn_settings btn btn-success" type="button"> Apply</button></a>
					</div>
					<?php 
					}
					else 
					{
					?>
					<div class="col-md-2">
						<p class="date pull-right" style="background-color: #d9edf7; color: #000000; padding: 10px;"><?php echo $job->my_status;?></p>
						
					</div>
					<?php 	
					}
					?>
				</div>
			</div>
			<?php 
			}
			?>
			
			
		</div>
		</div>
		</div>
	</div>
</div>

