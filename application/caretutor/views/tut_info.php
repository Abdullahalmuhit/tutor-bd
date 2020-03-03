<div class="" ><!--view profile-->
	<div class="col-md-9">
	
		<div class="panel panel-default">
			<div class="panel-heading" style="text-align: left;">
				<h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-graduation-cap"></i> Tuition Related Information</b></h5>
			</div>
			<div class="panel-body">
				
				<div class="row">
					<div>
						<div class="col-md-6">
							<p><b>Expected Fees</b></p>
						</div>
						<div class="col-md-6">
							<p><?php echo count($tution_info) > 0 ? $tution_info[0]['expected_fees']." BDT" : 'N/A'; ?></p>
						</div>
					</div>
					<div>
						<div class="col-md-6">
							<p><b>Days Per Week</b></p>
						</div>
						<div class="col-md-6">
							<p><?php echo count($tution_info) > 0 ? $tution_info[0]['days_per_week'] : 'N/A'; ?></p>
						</div>
					</div>
					<div>
						<div class="col-md-6">
							<p><b>Tutoring Categories</b></p>
						</div>
						<div class="col-md-6">
							<p><?php echo count($tution_info) > 0 ? $categories->cat : 'N/A'; ?></p>
						</div>
					</div>
					<!-- <div>
						<div class="col-md-6">
							<p><b>Preferred Classes</b></p>
						</div>
						<div class="col-md-6">
							<p><?php echo count($tution_info) > 0 ? $tution_info[0]['pref_class'] : 'N/A'; ?></p>
						</div>
					</div> -->
					<div>
						<div class="col-md-6">
							<p><b>Preferred Subjects</b></p>
						</div>
						<div class="col-md-6">
							<p><?php echo count($tution_info) > 0 ? $subs->subj : 'N/A'; ?></p>
						</div>
					</div>
					<div>
						<div class="col-md-6">
							<p><b>Preferred Locations</b></p>
						</div>
						<div class="col-md-6">
							<p><?php echo count($tution_info) > 0 ? $locations->loc : 'N/A'; ?></p>
						</div>
					</div>
					<div>
						<div class="col-md-6">
							<p><b>Score</b></p>
						</div>
						<div class="col-md-6">
							<p><?php echo ((count($tution_info) > 0) && ($tution_info[0]['diff_score'] != '')) ? $tution_info[0]['diff_score'] : 'N/A'; ?></p>
						</div>
					</div>
					<div>
						<div class="col-md-6">
							<p><b>Preferred Tutoring Style</b></p>
						</div>
						<div class="col-md-6">
							<?php 
							$pts = "N/A";
							if (count($tution_info) > 0) 
							{
								if ($tution_info[0]['pref_tut_style']==1)
								{
									$pts = "Private Tutoring -- One student";
								}
								elseif ($tution_info[0]['pref_tut_style']==2)
								{
									$pts = "Group Tutoring";
								}
								elseif ($tution_info[0]['pref_tut_style']==3)
								{
									$pts = "Online Tutoring";
								}
								
							}
							else
							{
								$pts = "N/A";
							}
							?>
							<p><?php echo $pts; ?></p>
						</div>
					</div>
					<div>
						<div class="col-md-6">
							<p><b>Place of Tutoring</b></p>
						</div>
						<div class="col-md-6">
							<?php
							$pt = "N/A";
							if (count($tution_info) > 0) 
							{
								if ($tution_info[0]['place_of_tut']==1)
								{
									$pt = "Student Place";
								}
								elseif ($tution_info[0]['place_of_tut']==2)
								{
									$pt = "My Place";
								}
								
							}
							else
							{
								$pt = "N/A";
							}
							?>
							<p><?php echo $pt; ?></p>
						</div>
					</div>
					<div>
						<div class="col-md-6">
							<p><b>Tutoring Experience</b></p>
						</div>
						<div class="col-md-6">
							<p><?php echo count($tution_info) > 0 ? $tution_info[0]['experiences'] : 'N/A'; ?></p>
						</div>
					</div>
					<div>
						<div class="col-md-6">
							<p><b>Tutoring Method</b></p>
						</div>
						<div class="col-md-6">
							<p><?php echo count($tution_info) > 0 ? $tution_info[0]['method'] : 'N/A'; ?></p>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-8">
					</div>
					<div class="col-md-4">
						<a href="<?php echo base_url();?>tutor/load_tut_info"><button class="btn_settings btn btn-success pull-right" type="button">Edit Profile</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>