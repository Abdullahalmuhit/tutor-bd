<div class="row home_view">
	<div class="col-md-8 col-xs-12" style="overflow-y: scroll; height:500px;"><!--view profile-->
		<?php foreach($jobs as $job){ ?> 
		<div class="row" style="background-color: #F5F5F5;">
		<div class="col-md-12 col-xs-12">
			<div class="col-md-3 col-xs-12 col_md_9">
				<div class="panel panel-default" style="border-right: 1px solid #FFFFFF !important;">
					<div class="panel-heading">
							<div class="text_center">
								<h5 class="panel-title" style="font-size: 14px;"><b><i class="fa fa-info-circle"></i> Job Info</b></h5>
							</div>
					</div>
					
					<div class="panel-body" style="background: #DAEED2;">
							<div class="text_center outer">
								<div class="inner">
									<p style="font-size: 13px;"><b>Need a <?php echo $job->category; ?> Tutor</b></p>
									<p>
										<a href="javascript:void(0)" style="text-decoration: none;" class="view_job" data-job_id="<?php echo $job->id; ?>" data-city="<?php echo $job->city; ?>" data-location="<?php echo $job->location; ?>" data-category="<?php echo $job->category; ?>" data-class_course="<?php echo $job->sub_cat; ?>" data-guardian_name="<?php echo $job->guardian_name; ?>" data-guardian_contact_number="<?php echo $job->add_contact_num; ?>" data-student_gender="<?php echo $job->student_gender; ?>" data-institution_name="<?php echo $job->institute; ?>" data-tutor_gender="<?php echo $job->preferred_gender; ?>" data-days_per_week="<?php echo $job->days_per_week; ?>" data-salary_range="<?php echo $job->salary_range; ?>" data-date_to_hire="<?php echo $job->date_to_hire; ?>" data-address="<?php echo $job->address; ?>" data-other_req="<?php echo $job->other_req; ?>" data-subjects="<?php echo $job->subs; ?>" data-bangla_medium_from="<?php echo $job->bangla_medium_from; ?>" data-english_medium_from="<?php echo ucfirst($job->english_medium_from); ?>" data-skype_id="<?php echo $job->skype_id; ?>" data-job_name="<?php echo $job->category; ?>"><span class="label label-info">View</span></a> 
										<a href="javascript:void(0)" style="text-decoration: none;" class="edit_job" data-job_id="<?php echo $job->id; ?>"><span class="label label-warning">Edit</span></a></p>
									<p style="font-size: 12px;">Posted: 8:45 PM 30 June,2015</p>
									<p style=""><span class="label label-success">Active</span></p>
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="col-md-7 col-xs-12 col_md_9">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="text_center">
								<h5 class="panel-title" style="font-size: 14px;"><b><i class="fa fa-files-o"></i> Tutor CV's</b></h5>
							</div>
						</div>
					</div>
					
					<div class="panel-body" style="font-size: 10px; background: #DAEED2;">
						<div class="row border_bottom">
							<div class="col-xs-3 col-md-3 col_xs text_center"><b>Tutor Name</b></div>
							<div class="col-xs-4 col-md-5 col_xs text_center "><b>Institution</b></div>
							<div class="col-xs-3 col-md-2 col_xs text_center "><b>Experience</b></div>
							<div class="col-xs-2 col-md-2 col_xs text_center "><b>Select</b></div>
						</div>
						<div class="row vertical_center border_bottom">
							<div class="col-xs-3 col-md-3 col_xs text_center">
								1) Simon Islam<br />
								House-78, Road-3, Block-C<br />
								Bashundhara R/A, Dhaka
							</div>
							<div class="col-xs-4 col-md-5 col_xs text_center ">
								<p>Independent University, Bangladesh</p>
							</div>
							<div class="col-xs-3 col-md-2 col_xs text_center ">
								<p>2 years</p>
							</div>
							<div class="col-xs-2 col-md-2 col_xs text_center ">
								<a href="javascript:void(0)" class="btn btn-success-custom btn-sm select_tutor_from_best_cv view_button_<?php echo $job->id; ?>" data-job_id="<?php echo $job->id; ?>" id="tutor_select_button_1_<?php echo $job->id; ?>" data-tutor_id="1" data-name="1) Simon Islam" data-address="House-78, Road-3, Block-C, Bashundhara R/A, Dhaka" data-institution_name="Independent University, Bangladesh">View</a>
							</div>
						</div>
						<div class="row vertical_center border_bottom">
							<div class="col-xs-3 col_xs col-md-3 text_center ">
								2) Simon Islam<br />
								House-78, Road-3, Block-C<br />
								Bashundhara R/A, Dhaka
							</div>
							<div class="col-xs-4 col-md-5 col_xs text_center ">
								<p>Independent University, Bangladesh</p>
							</div>
							<div class="col-xs-3 col-md-2 col_xs text_center ">
								<p>2 years</p>
							</div>
							<div class="col-xs-2 col-md-2 col_xs text_center ">
								<a href="javascript:void(0)" class="btn btn-success-custom btn-sm select_tutor_from_best_cv view_button_<?php echo $job->id; ?>" data-job_id="<?php echo $job->id; ?>" id="tutor_select_button_2_<?php echo $job->id; ?>" data-tutor_id="2" data-name="2) Simon Islam" data-address="House-78, Road-3, Block-C, Bashundhara R/A, Dhaka" data-institution_name="Independent University, Bangladesh">View</a>
							</div>
						</div>
						<div class="row vertical_center border_bottom">
							<div class="col-xs-3 col-md-3 col_xs text_center ">
								3) Simon Islam<br />
								House-78, Road-3, Block-C<br />
								Bashundhara R/A, Dhaka
							</div>
							<div class="col-xs-4 col-md-5 col_xs text_center ">
								<p>Independent University, Bangladesh</p>
							</div>
							<div class="col-xs-3 col-md-2 col_xs text_center ">
								<p>2 years</p>
							</div>
							<div class="col-xs-2 col-md-2 col_xs text_center ">
								<a href="javascript:void(0)" class="btn btn-success-custom btn-sm select_tutor_from_best_cv view_button_<?php echo $job->id; ?>" data-job_id="<?php echo $job->id; ?>" id="tutor_select_button_3_<?php echo $job->id; ?>" data-tutor_id="3" data-name="3) Simon Islam" data-address="House-78, Road-3, Block-C, Bashundhara R/A, Dhaka" data-institution_name="Independent University, Bangladesh">View</a>
							</div>
						</div>
						<div class="row vertical_center border_bottom">
							<div class="col-xs-3 col-md-3 col_xs text_center ">
								4) Simon Islam<br />
								House-78, Road-3, Block-C<br />
								Bashundhara R/A, Dhaka
							</div>
							<div class="col-xs-4 col-md-5 col_xs text_center ">
								<p>Independent University, Bangladesh</p>
							</div>
							<div class="col-xs-3 col-md-2 col_xs text_center ">
								<p>2 years</p>
							</div>
							<div class="col-xs-2 col-md-2 col_xs text_center ">
								<a href="javascript:void(0)" class="btn btn-success-custom btn-sm select_tutor_from_best_cv view_button_<?php echo $job->id; ?>" data-job_id="<?php echo $job->id; ?>" id="tutor_select_button_4_<?php echo $job->id; ?>" data-tutor_id="4" data-name="4) Simon Islam" data-address="House-78, Road-3, Block-C, Bashundhara R/A, Dhaka" data-institution_name="Independent University, Bangladesh">View</a>
							</div>
						</div>
						<div class="row vertical_center">
							<div class="col-xs-3 col-md-3 col_xs text_center ">
								5) Simon Islam<br />
								House-78, Road-3, Block-C<br />
								Bashundhara R/A, Dhaka
							</div>
							<div class="col-xs-4 col-md-5 col_xs text_center ">
								<p>Independent University, Bangladesh</p>
							</div>
							<div class="col-xs-3 col-md-2 col_xs text_center ">
								<p>2 years</p>
							</div>
							<div class="col-xs-2 col-md-2 col_xs text_center ">
								<a href="javascript:void(0)" class="btn btn-success-custom btn-sm select_tutor_from_best_cv view_button_<?php echo $job->id; ?>" data-job_id="<?php echo $job->id; ?>" id="tutor_select_button_5_<?php echo $job->id; ?>" data-tutor_id="5" data-name="5) Simon Islam" data-address="House-78, Road-3, Block-C, Bashundhara R/A, Dhaka" data-institution_name="Independent University, Bangladesh">View</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-2 col-xs-12 col_md_9">
				<div class="panel panel-default" style="border-left: 1px solid #FFFFFF !important;">
					<div class="panel-heading">
						<div class="row">
							<div class="text_center">
								<h5 class="panel-title" style="font-size: 14px;"><b><i class="fa fa-lock"></i> Selected </b></h5>
							</div>
						</div>
					</div>
					
					<div class="panel-body" style="background: #DAEED2;">
							<div class="text_center outer">
								<div class="selected_tutor inner" id="selected_tutor_<?php echo $job->id; ?>">
									
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<br />
<?php } ?>
</div>

	<div class="col-md-2 col-xs-12 col_md_9 hidden-xs" id="related_link">
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
	<div class="col-xs-12 col_md_9 visible-xs" id="mobile_related_link">
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

<br />
<div class="row hidden-xs">
 	<div class="col-md-2"></div>
 	<div class="col-md-10" style="padding-left: 25px;">
		<a href="<?php echo base_url('parents/hire_a_new_tutor'); ?>" class="btn btn-hire-new-tutor btn-lg pull-left" id="tutor_select_button_5" data-tutor_id="5" data-name="5) Simon Islam" data-address="House-78, Road-3, Block-C, Bashundhara R/A, Dhaka" data-institution_name="Independent University, Bangladesh">Hire a new tutor</a>
	</div>	
</div>
<div class="row visible-xs">
	<div class="col-xs-8" style="left: 25%;">
		<a href="<?php echo base_url('parents/hire_a_new_tutor'); ?>" class="btn btn-hire-new-tutor btn-lg pull-left" id="tutor_select_button_5" data-tutor_id="5" data-name="5) Simon Islam" data-address="House-78, Road-3, Block-C, Bashundhara R/A, Dhaka" data-institution_name="Independent University, Bangladesh">Hire a new tutor</a>
	</div>
</div>

<div class="modal fade" id="viewJobModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="top: 10%;">
    	<div class="modal-content" style="border-radius: 0px !important;">
		    <div class="modal-body">
		    	<div class="container">
    				<div class="row">
    					<div class="col-md-12">
    						<div class="panel panel-info">
    							<div class="panel-heading">
    								<button type="button" class="close view_modal_close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							    	<h5>Need a <span class="job_name_view"></span> Tutor</h5>
							  	</div>
							  	<div class="panel-body">
							  		<p><label class="col-md-6 col-xs-6" style="height: 20px;">City:</label><span class="col-md-6 col-xs-6 text_color city_view"></span></p>
							  		<p class="location_p" style="display: none;"><label class="col-md-6 col-xs-6" style=" height: 20px;">Location:</label><span class="col-md-6 col-xs-6 text_color location_view"></span></p>
							  		<p><label class="col-md-6 col-xs-6" style=" height: 20px;">Category:</label><span class="col-md-6 col-xs-6 text_color category_view"></span></p>
							  		<p><label class="col-md-6 col-xs-6" style=" height: 20px;">Class/Courses:</label><span class="col-md-6 col-xs-6 text_color class_view"></span></p>
							  		<p class="subject_p" style="display: none;"><label class="col-md-6 col-xs-6" style=" height: 20px;">Subjects:</label><span class="col-md-6 col-xs-6 text_color subject_view"></span></p>
							  		<p><label class="col-md-6 col-xs-6" style=" height: 20px;">Guardian name:</label><span class="col-md-6 col-xs-6 text_color guardian_view"></span></p>
							  		<p><label class="col-md-6 col-xs-6" style=" height: 20px;">Guardian contact no:</label><span class="col-md-6 col-xs-6 text_color guardian_contact_view"></span></p>
							  		<p><label class="col-md-6 col-xs-6" style=" height: 20px;">Student gender:</label><span class="col-md-6 col-xs-6 text_color student_gender_view"></span></p>
							  		<p><label class="col-md-6 col-xs-6" style=" height: 20px;">Institution name:</label><span class="col-md-6 col-xs-6 text_color institution_view"></span></p>
							  		<p><label class="col-md-6 col-xs-6" style=" height: 20px;">Days in a week:</label><span class="col-md-6 col-xs-6 text_color days_in_week_view"></span></p>
							  		<p><label class="col-md-6 col-xs-6" style=" height: 20px;">Salary range:</label><span class="col-md-6 col-xs-6 text_color salary_view"></span></p>
							  		<p><label class="col-md-6 col-xs-6" style=" height: 20px;">When are you looking to hire:</label><span class="col-md-6 col-xs-6 text_color hire_date_view"></span></p>
							  		<p><label class="col-md-6 col-xs-6" style=" height: 20px;">Detail address:</label><span class="col-md-6 col-xs-6 text_color address_view"></span></p>
							  		<p><label class="col-md-6 col-xs-6" style=" height: 20px;">More about requirements:</label><span class="col-md-6 col-xs-6 text_color more_about_view"></span></p>
							  		<p class="bangla_medium_p" style="display: none;"><label class="col-md-6 col-xs-6" style=" height: 20px;">Bangla medium from:</label><span class="col-md-6 col-xs-6 text_color bangla_medium_from_view"></span></p>
							  		<p class="english_medium_p" style="display: none;"><label class="col-md-6 col-xs-6" style=" height: 20px;">English medium from:</label><span class="col-md-6 col-xs-6 text_color english_medium_from_view"></span></p>
							  		<p class="skype_p" style="display: none;"><label class="col-md-6 col-xs-6" style=" height: 20px;">Skype id:</label><span class="col-md-6 col-xs-6 text_color skype_id_view"></span></p>
							  		<p><label class="col-md-6 col-xs-6" style=" height: 20px;">Tutor gender:</label><span class="col-md-6 col-xs-6 text_color tutor_gender_view"></span></p>
							  	</div>
    						</div>
    					</div>
    				</div>
    			</div>
		    </div>
		</div>
	</div>
</div>

