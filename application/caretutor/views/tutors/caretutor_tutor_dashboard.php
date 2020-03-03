<?php defined('safe_access') or die('Restricted access!'); ?>
    <div id="page_content">
        <div id="page_content_inner">
        	<div class="loading" style="display: none;">
        		<div class="uk-width-medium-1-4">
                    <img src="<?php echo base_url(); ?>assets/panel/img/spinners/spinner_large.gif" alt="" width="64" height="64">
                </div>
        	</div>
        	<div class="md-card">
        		<div class="md-card-content">
        			<?php if($flag == '1'){ ?>
        			<div class="uk-alert uk-alert-success" data-uk-alert>
                        <a href="#" class="uk-alert-close uk-close"></a>
                        Congratulations! You've applied job successfully.
                    </div>
                    <?php } ?>
        			<h3 class="heading_a">Search</h3>
        			<div class="uk-grid uk-grid-divider" data-uk-grid-margin>
                        <div class="uk-width-medium-1-5">
                            <div class="uk-width-medium-1-1 uk-width-large-1-1">
	                            <select id="city" data-md-selectize>
	                                <?php 
									foreach ($city as $cit)
									{
									?>
										<option value="<?php echo ($cit->city == 'Select City')?'':$cit->id; ?>"><?php echo $cit->city; ?></option>
									<?php 
									}
									?>
	                            </select>
	                        </div>
                        </div>
                        <div class="uk-width-medium-1-5">
                            <div class="uk-width-medium-1-1 uk-width-large-1-1">
                            	<div class="location_dropdown">
		                            <select id="sellocation" data-md-selectize>
		                                <option value="">Select Location</option>
		                                
		                            </select>
		                        </div>
	                        </div>
                        </div>
                        <div class="uk-width-medium-1-5">
                            <div class="uk-width-medium-1-1 uk-width-large-1-1">
	                            <select id="category" data-md-selectize>
	                                <?php 
									foreach ($category as $cat)
									{
									?>
										<option value="<?php echo ($cat->category == 'Select Category')?'':$cat->id; ?>"><?php echo $cat->category;?></option>
									<?php 
									}
									?>
	                            </select>
	                        </div>
                        </div>
                        <div class="uk-width-medium-1-5">
                            <div class="uk-width-medium-1-1 uk-width-large-1-1">
                            	<div class="sub_category_dropdown">
		                            <select id="selsubcat" data-md-selectize>
		                                <option value="">Select Class/Courses</option>
		                            </select>
	                            </div>
	                        </div>
                        </div>
                        <div class="uk-width-medium-1-5">
                            <div class="uk-width-medium-1-1 uk-width-large-1-1">
	                            <select id="gender" data-md-selectize>
	                                <option value="">Select Gender</option>
	                                <option value="Male">Male</option>
									<option value="Female">Female</option>
	                            </select>
	                        </div>
                        </div>
                    </div>
        		</div>
        	</div>
            <div class="md-card">
                <div class="md-card-content" id="job_list_show">
                    <h3 class="heading_a text_center" style="padding: 5px; border: 1px solid #5cb85c;">Total <span class="uk-badge uk-badge-success uk-badge-notification" style="font-size: 15px; padding: 6px 6px;"><?php echo $count_job ?></span> Job Found</h3>
                    <br />
                    	<div class="uk-grid" data-uk-grid-margin>
	                    	<?php foreach($jobs as $job){ ?>
	                    		<div class="uk-width-1-1">
		                            <div class="uk-accordion-content job_div">
		                            	<h3 class="uk-accordion-title uk-accordion-title-primary job_header text_center">Need a <?php echo $job->category.'-'.$job->id; ?> tutor</h3>
		                                <div class="uk-grid" data-uk-grid-margin>
							                <div class="uk-width-small-2-6">
							                    <div class="uk-margin-bottom">
							                        <address>
							                            <p><strong>Job ID : </strong><?php echo $job->id; ?></p>
							                            <p><strong>Category : </strong><?php echo $job->category; ?></p>
							                            <p><strong>Class : </strong><?php echo $job->sub_cat; ?></p>
							                            <p><strong>Subjects : </strong><?php echo $job->subs; ?></p>
							                            <p><strong>City : </strong><?php echo $job->city; ?></p>
							                            <p><strong>Location : </strong><?php echo $job->location; ?></p>
							                        </address>
							                    </div>
							                </div>
							                <div class="uk-width-small-3-6">
							                    <p><strong>Salary : </strong><?php echo $job->salary_range; ?> Tk.</p>
					                            <p><strong>Days/Week : </strong><?php echo $job->days_per_week; ?></p>
					                            <p><strong>Tutor Gender Preference : </strong><?php echo $job->preferred_gender; ?></p>
					                            <p><strong>Other Requirements : </strong><?php echo $job->other_req; ?></p>
							                </div>
							                <div class="uk-width-small-1-6">
							                	<p class="uk-text-muted uk-text-small uk-text-italic" style="text-align: right;"><?php echo $job->upd; ?></p>
							                	<a href="<?php echo ($job->status=='done')?'#':base_url()."signin";?>"><button style="margin-top:65%; margin-left:44%;" class="md-btn md-btn-success" type="button"> <?php echo ($job->status=='done')?'Solved':'Apply';?></button></a>
							                </div>
							            </div>
		                            </div>
		                        </div>
		                        <br />
	                    	<?php } ?>
	                    </div>
                    	<center><?php echo $links; ?></center>
                </div>
            </div>
        </div>
    </div>
