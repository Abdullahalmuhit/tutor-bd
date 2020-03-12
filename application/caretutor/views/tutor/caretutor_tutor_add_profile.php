<?php defined('safe_access') or die('Restricted access!'); ?>

<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css') ?>">
<style>

ul#user_edit_tabs.uk-tab li.uk-tab-responsive.uk-active.uk-open div.uk-dropdown.uk-dropdown-small.uk-dropdown-active.uk-dropdown-shown{min-width: 240px !important;}
@media(max-width:767px ){
	#user_edit_tabs{
		width: 100%;
	}
	.uk-width-small-1-5{
		width: 50%;
		padding-left: 20px;
	}

	.uk-width-small-1-3{
		width: 40%;
		padding-left: 20px;
	}
}

.input-group{
	display: table;
	border-collapse: collapse;
	width:100%;
}
.input-group > div{
	display: table-cell;
}
.input-group-icon{
	/* background:#eee; */
	/* color: #777; */
	/* padding: 0 12px */
}
.input-group-area{
	width:100%;
}
.input-group input{
	border: 0;
	display: block;
	width: 100%;
	/* padding: 8px; */
}
</style>
<?php
//$step = 0;
//var_dump($groups);
$clsDisable_for_2 = ($step==0)?"uk-disabled":"";
$clsDisable_for_3 = ($step==0 || $step==1)?"uk-disabled":"";;
?>

<style>
::-webkit-input-placeholder { /* WebKit, Blink, Edge */
color:    #000;
opacity: 0.4;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
color:    #000;
opacity: 0.4;
opacity:  1;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
color:    #000;
opacity: 0.4;
opacity:  1;
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
color:    #000;
opacity: 0.4;
}
::-ms-input-placeholder { /* Microsoft Edge */
color:    #000;
opacity: 0.4;
}

::placeholder { /* Most modern browsers support this now. */
color:    #000;
opacity: 0.4;
}
</style>


<div id="page_content">
<div id="page_content_inner">
	<form action="" class="uk-form-stacked" id="user_edit_form">
		<div class="uk-grid" data-uk-grid-margin>
			<div class="uk-width-large-7-10">
				<div class="md-card">
					<div class="user_heading">
						<div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
							
							<div class="fileinput-preview fileinput-exists thumbnail"></div>
							<!-- <div class="user_avatar_controls">
								<span class="btn-file">
									<span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
									<span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
									<input type="file" name="user_edit_avatar_control" id="user_edit_avatar_control">
								</span>
								<a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
							</div> -->
							
						</div>
						<div class="user_heading_content">
							<h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"><?php echo (!empty($user_data))?$user_data->full_name:'Your name'; ?></span>
								<span class="sub-heading"><?php echo round($review->review, 1) ?> <i style="color: #fff" class="uk-icon-star"></i></span>
								<?php
								if(!empty($selected_catagory)){
									foreach($selected_catagory as $selected_cat){
											$cat_name[] = $selected_cat->category;
									}
									$cat_name = 'Tutor of '.implode(', ', $cat_name);
								} else {
									$cat_name = 'Tutor of ...';
								} ?>
								<span class="sub-heading">Profile Completed: <?php echo (!empty($user_data))?$user_data->profile_percentage:'0'; ?>%, <?php echo $cat_name; ?></span>
								<!-- <span class="sub-heading" id="user_edit_position"><?php echo $cat_name; ?></span> -->
							</h2>
							
						</div>
							</hr>
						
						<!--<button type="submit" class="md-fab md-fab-small md-fab-success" id="user_edit_submit">
							<i class="material-icons">&#xE161;</i>
						</button>-->
					</div>
					<div class="user_content" id="user_content_div">
						<ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#user_edit_tabs_content',active:<?php echo $step; ?>}">
							<li id="tution_info_li" class="uk-width-large-1-3 uk-width-medium-1-2"><a href="#">Tuition Related Information</a></li>
							<li id="educational_info_li" class="uk-width-large-1-3 uk-width-medium-1-2"><a href="#">Educational Information</a></li>
							<li id="personal_info_li" class="uk-width-large-1-3 uk-width-medium-1-2"><a href="#">Personal Information</a></li>
						</ul>
						<ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
							<li id="tution_info">
								<div class="uk-grid" data-uk-grid-margin>
									<div class="uk-width-medium-1-1 uk-container-center">
										<ul id="subnav-pill-content-1" class="uk-switcher">
											<li class="uk-active tution_first_step" id="tution_first_step">
												<input type="hidden" name="tution_info_id" value="<?php echo (!empty($tution_info))?$tution_info[0]['id']:'0'; ?>" />
												<div class="uk-margin-top">
													<h3 class="full_width_in_card heading_c">
														Please select categories that match your qualifications.
													</h3>
													<div class="uk-grid" >
														<div class="uk-width-1-1">
															<label class="uk-text-hilight" for="tutor_profile_category">Category <span style="font-size: 12px; opacity: 0.6;">(you can not add more than five categories, so select categories based on your skills)</span></label>
															<select id="tutor_profile_category" name="tutor_profile_category" multiple>
                                                                
																<option value="">Category</option>
																		<?php if(!empty($category)):
																// unset($category[0]);
																foreach ($category as $cat):
																$selected = '';
																if((!empty($selected_cats)) && in_array($cat->id, $selected_cats)):
																	$selected = 'selected="selected"';
																endif; ?>
																<option <?php echo $selected; ?> value="<?php echo $cat->id; ?>"><?php echo $cat->category; ?></option>
															<?php
																								endforeach;
															endif; ?>
															</select>
														</div>
													</div>

													<div class="uk-grid" data-uk-grid-margin>
														<div class="uk-width-1-1" id="class_show">
															<label class="uk-text-hilight" for="classcourse">Class / course <span style="font-size: 12px; opacity: 0.6;">(e.g. Class 1, Standard 1)</span></label>
															<select id="classcourse" name="classcourse" multiple>
																<?php if(!empty($cateories_class)){ ?>
																	<?php foreach ($category as $cat){ ?>
																		<optgroup label='<?php echo $cat->category; ?>'>
																			<?php
																				foreach ($cateories_class as $class)
																				{
																					if($class->parent_id == $cat->id){
																					$selected = '';
																						if(!empty($selected_cls) && in_array($class->id, $selected_cls)){
																							$selected = 'selected="selected"';
																						}
																					?>
																						<option <?php echo $selected; ?> value='<?php echo $class->id; ?>'><?php echo $class->category; ?></option>
																					<?php }
																				}
																			?>
																		</optgroup>
																	<?php } ?>
																<?php } ?>
															</select>
														</div>
													</div>

													<div id="subject_show">
														<?php if(!empty($tution_info)){ ?>
															<h3 class="full_width_in_card heading_c">
																Please select subject(s)
															</h3>
															<div class="uk-grid" data-uk-grid-margin>
																<div class="uk-width-1-1">
																	<label class="uk-text-hilight" for="tutor_preferred_subjects">Subjects</label>
																	<select id="tutor_preferred_subjects" name="tutor_preferred_subjects" multiple>
																			<?php if(!empty($classes_sub)){ ?>
																			<?php foreach ($cateories_class as $class){ ?>
																				<optgroup label='<?php echo $class->category; ?>'>
																					<?php
																						foreach ($classes_sub as $sub)
																						{
																							if($sub->parent_id == $class->id){
																							$selected = '';
																								if(!empty($selected_subs) && in_array($sub->id, $selected_subs)){
																									$selected = 'selected="selected"';
																								}
																							?>
																								<option <?php echo $selected; ?> value='<?php echo $sub->id; ?>'><?php echo $sub->category; ?></option>
																							<?php }
																						}
																					?>
																				</optgroup>
																			<?php } ?>
																		<?php } ?>
																	</select>
																</div>
															</div>
														<?php } ?>
													</div>

													<h3 class="full_width_in_card heading_c">
														Location info
													</h3>

													<div class="uk-grid" data-uk-grid-margin>

													
                                                        
                                                    <div class="uk-width-medium-1-2">
												        <div class="form-group field-signupform-locale required">
                                                            <label for="">Your City</label>
                                                            <select id="tutor_profile_city" class="form-control" name="tutor_profile_city" aria-required="true">
                                                                <option>Select City</option>

                                                                <?php
                                                                    foreach ($city as $cit): ?>

                                                                <option <?php echo (!empty($tution_info))?($tution_info[0]['city_id'] == $cit->id)?'selected="selected"':'':''; ?> value="<?php echo ($cit->city == 'Select City')?'1':$cit->id; ?>"><?php echo $cit->city; ?></option>
                                                                <?php endforeach ?>

                                                            </select>
                                                      </div>
												  </div>
														

														
														
                                                        
                                                        
                                                     <div class="uk-width-medium-1-2 locatin_hide" id="your_location_show" <?php    echo (!empty($tution_info))?($tution_info[0]['city_id'] ==  '3')?'style="display: none;"':'':''; ?>>
                                                                      <label for="">Your Location</label>
                                                                <select id="tutor_profile_your_location" class="form-control" name="tutor_profile_your_location" aria-required="true">
                                                                    <option value="">Select Location</option>

                                                                    <?php if(!empty($cities_location)){ ?>
                                                                            <?php
                                                                                foreach ($cities_location as $loc)
                                                                                {
                                                                                    $selected = '';
                                                                                        if($loc->id == $tution_info[0]['your_location_id']){
                                                                                            $selected = 'selected="selected"';
                                                                                        }
                                                                                    ?>
                                                                    <option <?php echo $selected; ?> '<?php echo $loc->id; ?>'><?php echo $loc->location; ?></option>

                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        <?php } ?>

                                                                </select>
														</div>                 
													</div>
													<div class="uk-grid locatin_hide" data-uk-grid-margin <?php echo (!empty($tution_info))?($tution_info[0]['city_id'] == '3')?'style="display: none;"':'':''; ?>>
														<div class="uk-width-1-1" id="preferred_location_show">
															<label class="uk-text-hilight" for="tutor_preferred_locations">Your preferred locations</label>
															<p class="uk-text-muted uk-text-small">Select up to 10 locations that not too far from your home/university/workplace.</p>
															<select id="tutor_preferred_locations" name="tutor_preferred_locations" multiple>
																<?php if(!empty($cities_location)){ ?>
																	<?php
																		foreach ($cities_location as $loc)
																		{
																			$selected = '';
																				if(in_array($loc->id, $selected_locs)){
																					$selected = 'selected="selected"';
																				}
																			?>
																				<option <?php echo $selected; ?> value='<?php echo $loc->id; ?>'><?php echo $loc->location; ?></option>
																			<?php
																		}
																	?>
																<?php } ?>
															</select>
														</div>
													</div>


													<h3 class="full_width_in_card heading_c">
														Where do you want to provide your service?
													</h3>
													<div class="uk-grid" data-uk-grid-margin>
														<div class="uk-width-medium-1-1">
															<div class="uk-grid">
																<div class="uk-width-medium-2-5">
																	<p>
																		<input type="checkbox" <?php echo (!empty($tution_info))?($tution_info[0]['student_home'] == '1')?'checked="checked"':'':''; ?> name="student_home" id="student_home" data-md-icheck />
																		<label for="student_home" class="inline-label">Student Home</label>
																	</p>
																	<p>
																		<input type="checkbox" <?php echo (!empty($tution_info))?($tution_info[0]['my_home'] == '1')?'checked="checked"':'':''; ?> name="my_home" id="my_home" data-md-icheck />
																		<label for="my_home" class="inline-label">My Home</label>
																	</p>
																	<p>
																		<input type="checkbox" <?php echo (!empty($tution_info))?($tution_info[0]['online'] == '1')?'checked="checked"':'':''; ?> name="online" id="checkbox_online" data-md-icheck />
																		<label for="checkbox_online" class="inline-label">Online</label>
																	</p>
																</div>
																</div>
														</div>

														<div class="uk-width-medium-1-1">
															<div class="uk-grid online_hide" data-uk-grid-margin <?php echo (!empty($tution_info))?($tution_info[0]['online'] != 1)?'style="display: none;"':'':'style="display: none;"'; ?>>
																<div class="uk-width-medium-1-2" style="margin-bottom: 5px;">
																	<label class="uk-text-hilight" for="user_edit_uname_control">Skype</label>
																	<input class="md-input" type="text" id="user_edit_skype_control" name="user_edit_skype_control" value="<?php echo (!empty($tution_info))?$tution_info[0]['skype_acc']:''; ?>" />
																</div>
																<div class="uk-width-medium-1-2" style="margin-bottom: 5px;">
																	<label class="uk-text-hilight" for="user_edit_position_control">Google+</label>
																	<input class="md-input" type="text" id="user_edit_google_control" name="user_edit_google_control" value="<?php echo (!empty($tution_info))?$tution_info[0]['google_acc']:''; ?>" />
																</div>
															</div>
														</div>
													</div>
												</div>
											</li>
											<li class="tution_second_step" id="tution_second_step">
												<div class="uk-margin-top">
													<h3 class="full_width_in_card heading_c">
														Experience Info
													</h3>
													<!-- <div class="uk-grid" data-uk-grid-margin>
														<div class="uk-width-1-1">
															<label class="uk-text-hilight" for="tutor_profile_category">Do you have any tutoring experience?</label>
																<p>
																	<input type="radio" <?php echo (!empty($tution_info))?($tution_info[0]['has_experience'] == '1')?'checked="checked"':'':''; ?> name="experience" class="experience" id="yes_experience" value="1" data-md-icheck />
																	<label for="yes_experience" class="inline-label">Yes</label>
																</p>
																<p>
																	<input type="radio" <?php echo (!empty($tution_info))?($tution_info[0]['has_experience'] == '0')?'checked="checked"':'':''; ?> name="experience" class="experience" id="no_experience" value="0" data-md-icheck />
																	<label for="no_experience" class="inline-label">No</label>
																</p>
														</div>
													</div>
													<br /> -->
													<div id="experience_hide" class="uk-animation-slide-top" >
														<div class="uk-grid" data-uk-grid-margin>
															<div class="uk-width-medium-1-1">
																<div class="uk-form-row">
																	<label class="uk-text-hilight" for="user_edit_uname_control">What is your total tutoring experience?</label>
																	<input class="md-input" type="text" id="experiences" name="total_experience" value="<?php echo (!empty($tution_info))?($tution_info[0]['total_experience']):''; ?>" placeholder="example: 5 years" />
																</div>
															</div>
														</div>
														<div class="uk-grid" data-uk-grid-margin>
															<div class="uk-width-medium-1-1">
																<div class="uk-form-row">
																	<label class="uk-text-hilight" for="message">Please describe your tuition experience details-</label>
																	<p class="uk-text-muted uk-text-small">(We recommend you to write an attractive description to build trust among perspective student / parent)</p>
																	<textarea class="md-input" name="experience_detail" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.." placeholder="I have more than 3 years of experience in teaching and have an considerable private tutoring experience with 3 A levels, 6 O levels student to date."><?php echo (!empty($tution_info))?($tution_info[0]['experiences']):''; ?></textarea>
																</div>
															</div>
														</div>
													</div>
													<h3 class="full_width_in_card heading_c">
														Availability / Salary
													</h3>
													<div class="uk-grid" data-uk-grid-margin>
														<div class="uk-width-medium-1-1">
															<label class="uk-text-hilight" for="user_edit_uname_control">Tell us about your availability</label>
															<select id="tutor_available_days" name="available_days" multiple>
																<option value="">Days</option>
																<option <?php echo (!empty($tution_info))?(in_array('Saturday',$aval_days))?'selected="selected"':'':''; ?> value="Saturday">Saturday</option>
																<option <?php echo (!empty($tution_info))?(in_array('Sunday',$aval_days))?'selected="selected"':'':''; ?> value="Sunday">Sunday</option>
																<option <?php echo (!empty($tution_info))?(in_array('Monday',$aval_days))?'selected="selected"':'':''; ?> value="Monday">Monday</option>
																<option <?php echo (!empty($tution_info))?(in_array('Tuesday',$aval_days))?'selected="selected"':'':''; ?> value="Tuesday">Tuesday</option>
																<option <?php echo (!empty($tution_info))?(in_array('Wednesday',$aval_days))?'selected="selected"':'':''; ?> value="Wednesday">Wednesday</option>
																<option <?php echo (!empty($tution_info))?(in_array('Thursday',$aval_days))?'selected="selected"':'':''; ?> value="Thursday">Thursday</option>
																<option <?php echo (!empty($tution_info))?(in_array('Friday',$aval_days))?'selected="selected"':'':''; ?> value="Friday">Friday</option>
															</select>
														</div>
													</div>
													<div class="uk-grid" data-uk-grid-margin>
														<div class="uk-width-large-1-2 uk-width-medium-1-1">
															<div class="uk-input-group">
																<span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-clock-o"></i></span>
																<label for="uk_tp_1">From time</label>
																<input class="md-input" type="text" name="available_time_from" id="uk_tp_1" data-uk-timepicker="{format:'12h'}" value="<?php echo (!empty($tution_info))?$tution_info[0]['available_time_from']:''; ?>" />
															</div>
														</div>
														<div class="uk-width-large-1-2 uk-width-medium-1-1">
															<div class="uk-input-group">
																<span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-clock-o"></i></span>
																<label for="uk_tp_1">To time</label>
																<input class="md-input" type="text" name="available_time_to" id="uk_tp_2" data-uk-timepicker="{format:'12h'}" value="<?php echo (!empty($tution_info))?$tution_info[0]['available_time_to']:''; ?>" />
															</div>
														</div>
													</div>
													<div class="uk-grid" data-uk-grid-margin>
														<div class="uk-width-medium-1-1">
															<label class="uk-text-hilight" for="user_edit_uname_control">Expected salary</label>
															<input class="md-input" type="text" id="expected_ssalary" name="expected_fees" value="<?php echo (!empty($tution_info))?$tution_info[0]['expected_fees']:''; ?>" />
														</div>
													</div>
													<div class="uk-grid" data-uk-grid-margin>
														<div class="uk-width-medium-1-1">
															<div class="uk-form-row">
																<label class="uk-text-hilight" for="user_edit_uname_control">Preferred tutoring style</label>
																<select id="tutoring_style" name="tutoring_style" multiple>
																	<!-- <option value="0">Tutoring style</option> -->
																	<option <?php echo (!empty($tution_info))?(in_array('1',$tutoring_styles))?'selected="selected"':'':''; ?> value="1">One to one</option>
																	<option <?php echo (!empty($tution_info))?(in_array('2',$tutoring_styles))?'selected="selected"':'':''; ?> value="2">One to many</option>
																	<option <?php echo (!empty($tution_info))?(in_array('3',$tutoring_styles))?'selected="selected"':'':''; ?> value="3">Online tutoring</option>
																</select>
															</div>
														</div>
													</div>

													<div class="uk-grid" data-uk-grid-margin>
														<div class="uk-width-medium-1-1">
															<div class="uk-form-row">
																<label class="uk-text-hilight" for="message">Tell us about your tuition method / style</label>
																<p class="uk-text-muted uk-text-small">(maximum 5000 characters)</p>
																<textarea class="md-input" name="method" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.." placeholder="Example: I base my teaching style on each student's individual needs and strengths. I strive to make material as accessible as possible, in order to promote growth and understanding."><?php echo (!empty($tution_info))?$tution_info[0]['method']:''; ?></textarea>
															</div>
														</div>
													</div>

													</div>
											</li>
										</ul>
										<br />
										<ul class="uk-subnav uk-float-right" data-uk-switcher="{connect:'#subnav-pill-content-1',animation: 'fade'}">
											<li class="uk-active switch_back_button" style="display: none;"><a href="#user_content_div" class="md-btn md-btn-success" style="padding: 10px 25px;">Back</a></li>

											<li class="uk-active switch_continue_button"><a class="md-btn md-btn-primary" href="#user_content_div" data-uk-smooth-scroll style="padding: 10px 25px;">Save & Continue</a></li>

											<li class="continue_to_education_info" style="display: none;"><a href="#user_content_div" data-uk-smooth-scroll style="padding: 10px 25px;" class="md-btn md-btn-primary">Save & continue</a></li>
										</ul>
									</div>
								</div>
							</li>
							<li id="educational_info">
								<div class="uk-margin-top" id="education_info_accordin">
									<?php if(!empty($edu_infos)){ ?>
										<h3 class="full_width_in_card heading_c">
											Your education info
										</h3>
										<div class="uk-width-medium-1-1">
											<div class="md-card" style="box-shadow: none;">
												<div class="md-card-content" style="padding-left: 0px; padding-right: 0px;">
													<?php foreach($edu_infos as $edu_info) { ?>
													<div class="uk-accordion" data-uk-accordion>
														<h3 class="uk-accordion-title" id="accordion_title_<?php echo $edu_info['id']; ?>"><?php echo $edu_info['level_of_education']; ?><span data-edu_id="<?php echo $edu_info['id']; ?>" title="edit info" class="menu_icon uk-icon-pencil-square edit-education" style="float: right;padding: 4px;"></span><span data-edu_del_id="<?php echo $edu_info['id']; ?>" title="Delete info" class="menu_icon uk-icon-trash delete-education" style="float: right;padding: 4px;"></span></h3>
														<div class="uk-accordion-content">
															<div class="uk-grid uk-animation-slide-left" data-uk-grid-margin  id="view_job_div_<?php echo $edu_info['id']; ?>">
																<div class="uk-width-large-1-2 uk-width-medium-1-2">
																	<ul class="md-list">
																		<li>
																			<div class="md-list-content">
																				<span class="md-list-heading">Exam / Degree Title</span>
																				<span class="uk-text-small uk-text-muted" id="exam_degree_title_<?php echo $edu_info['id']; ?>"><?php echo $edu_info['exam_degree_title']; ?></span>
																			</div>
																		</li>
																		<li>
																			<div class="md-list-content">
																				<span class="md-list-heading">Institute Name</span>
																				<span class="uk-text-small uk-text-muted" id="institute_name_<?php echo $edu_info['id']; ?>"><?php echo $edu_info['institute']; ?></span>
																			</div>
																		</li>
																		<li>
																			<div class="md-list-content">
																				<span class="md-list-heading">Result</span>
																				<span class="uk-text-small uk-text-muted" id="result_<?php echo $edu_info['id']; ?>"><?php echo $edu_info['result']; ?></span>
																			</div>
																		</li>
																		<li>
																			<div class="md-list-content">
																				<span class="md-list-heading">Curriculum</span>
																				<span class="uk-text-small uk-text-muted" id="curriculum_<?php echo $edu_info['id']; ?>"><?php echo ucfirst(str_replace("_"," ",$edu_info['curriculum'])); ?></span>
																			</div>
																		</li>
																		<li>
																			<div class="md-list-content">
																				<span class="md-list-heading">Until date</span>
																				<span class="uk-text-small uk-text-muted" id="until_date_<?php echo $edu_info['id']; ?>"><?php echo $edu_info['until_date']; ?></span>
																			</div>
																		</li>
																	</ul>
																</div>
																<div class="uk-width-large-1-2 uk-width-medium-1-2">
																	<ul class="md-list">
																		<li>
																			<div class="md-list-content">
																				<span class="md-list-heading">Group</span>
																				<span class="uk-text-small uk-text-muted" id="group_name_<?php echo $edu_info['id']; ?>"><?php echo $edu_info['sdg']; ?></span>
																			</div>
																		</li>
																		<li>
																			<div class="md-list-content">
																				<span class="md-list-heading">ID Card No (optional)</span>
																				<span class="uk-text-small uk-text-muted" id="id_card_number_<?php echo $edu_info['id']; ?>"><?php echo $edu_info['id_card_number']; ?></span>
																			</div>
																		</li>
																		<li>
																			<div class="md-list-content">
																				<span class="md-list-heading">Year of passing</span>
																				<span class="uk-text-small uk-text-muted" id="year_of_passing_<?php echo $edu_info['id']; ?>"><?php echo $edu_info['year_of_passing']; ?></span>
																			</div>
																		</li>
																		<li>
																			<div class="md-list-content">
																				<span class="md-list-heading">From date</span>
																				<span class="uk-text-small uk-text-muted" id="from_date_<?php echo $edu_info['id']; ?>"><?php echo $edu_info['from_date']; ?></span>
																			</div>
																		</li>
																		<li>
																			<div class="md-list-content">
																				<span class="md-list-heading">Current institute</span>
																				<span class="uk-text-small uk-text-muted" id="current_institute_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['current_institute'] == '1')?'Yes':'No'; ?>.</span>
																			</div>
																		</li>

																	</ul>
																</div>
															</div>
														</div>
													</div>



													<!-- Edit educational info start -->


													<div class="uk-modal <?php echo $edu_info['id']; ?>" id="<?php echo $edu_info['id']; ?>">

														<div class="uk-modal-dialog">
							<style media="screen">
								.ui-autocomplete { z-index:2147483647 !important; }
							</style>
															<a href="" class="uk-modal-close uk-close uk-close-alt"></a>
															<div style="height: 20px; display: block;"></div>
															<div class="uk-width-medium-6">

																	<input type="hidden" id="education_info_id_for_update" name="education_info_id_for_update" value="<?php echo $edu_info['id']; ?>" />
																	<div class="uk-grid" data-uk-grid-margin>
																		<div class="uk-width-medium-1-1">
                                                                            
																			<select id="level_of_education" name="edit_level_of_education" data-md-selectize>
																				<option <?php echo ($edu_info['level_of_education']=="0")?"selected":""; ?> value="0">Level of education</option>
																				<option <?php echo ($edu_info['level_of_education']=="Secondary")?"selected":""; ?> value="Secondary">Secondary</option>
																				<option <?php echo ($edu_info['level_of_education']=="Higher Secondary")?"selected":""; ?> value="Higher Secondary">Higher Secondary</option>
																				<option <?php echo ($edu_info['level_of_education']=="Diploma")?"selected":""; ?> value="Diploma">Diploma</option>
																				<option <?php echo ($edu_info['level_of_education']=="Bachelor/Honors")?"selected":""; ?> value="Bachelor/Honors">Bachelor/Honors</option>
																				<option <?php echo ($edu_info['level_of_education']=="Masters")?"selected":""; ?> value="Masters">Masters</option>
																				<option <?php echo ($edu_info['level_of_education']=="Doctoral")?"selected":""; ?> value="Doctoral">Doctoral</option>
																			</select>
																		</div>
																	</div>
																	<div class="uk-grid" data-uk-grid-margin>
																		<div class="uk-width-medium-1-2">
																			<label for="user_edit_position_control">Exam/Degree title</label>
																			<input  type="text" id="add_exam_degree_title" name="edit_exam_degree_title" class="md-input md-input-width-medium uk-width-5-10" value="<?php echo $edu_info['exam_degree_title'];?>" placeholder="e.g Masters, Honors, HSC/A Level, SSC/O Level" />
																		</div>
																		<div class="uk-width-medium-1-2">
																			<div class="md-input-wrapper md-input-filled">
																				<label for="user_edit_position_control" >Concentration / Major / Group</label>
																				<input type="text" id="autocomplete_group" name="edit_group_name" data-edu-id="<?php echo $edu_info['id']; ?>" class="md-input md-input-width-medium" value="<?php echo $edu_info['sdg']; ?>" />
																				<input type="hidden" id="group_hidden_id_<?php echo $edu_info['id']; ?>" name="edit_group_hidden_id" />

																				<!-- <label for="user_edit_first_name_control">Concentration / Major / Group</label>
																				<select id="tutor_group_name" name="edit_group_name" data-md-selectize >
																					<option value="">Your group name</option>
																					<?php if(!empty($groups)){ ?>
																					<?php foreach ($groups as $group)
																					{
																					?>
																					<option <?php echo ($edu_info['sdg']==$group['sdg'])?"selected":""; ?> value="<?php echo $group['id']; ?>"><?php echo $group['sdg']; ?></option>
																					<?php
																					} }
																					?>
																				</select> -->
																			</div>
																		</div>
																	</div>

																	<div class="uk-grid" data-uk-grid-margin>
																		<div class="uk-width-medium-1-1">
																			<label for="user_edit_position_control" >Institute Name</label>
																			<input type="text" id="autocomplete_institute" name="edit_institute_name" data-edu-id="<?php echo $edu_info['id']; ?>" class="md-input md-input-width-medium" value="<?php echo $edu_info['institute']; ?>" />
																			<input type="hidden" id="institute_hidden_id_<?php echo $edu_info['id']; ?>" name="edit_institute_hidden_id" />
																		</div>
																	</div>

																	<div class="uk-grid" data-uk-grid-margin>
																		<div class="uk-width-medium-1-1">
																			<label for="user_edit_position_control">ID Card Number(optional)</label>
																			<input type="text" id="add_id_card_number" name="edit_id_card_number" class="md-input md-input-width-medium" value="<?php echo $edu_info['id_card_number']; ?>" />
																		</div>
																	</div>

																	<div class="uk-grid" data-uk-grid-margin>
																		<div class="uk-width-medium-1-2">
																			<label for="user_edit_first_name_control">GPA / CGPA</label>
																			<input type="text" name="edit_result" class="md-input md-input-width-medium uk-width-5-10" value="<?php echo $edu_info['result']; ?>" />
																		</div>
																		<div class="uk-width-medium-1-2">
																			<label for="user_edit_position_control">Year of passing</label>
																			<input type="text" name="edit_year_of_passing" class="md-input md-input-width-medium uk-width-5-10" value="<?php echo $edu_info['year_of_passing']; ?>" />
																		</div>
																	</div>
																	<div class="uk-grid" data-uk-grid-margin>
																		<div class="uk-width-medium-1-1">
																			<div class="md-input-wrapper md-input-filled">
																				<label for="curriculum">Curriculum</label>
																				<select id="curriculum" name="edit_curriculum" data-md-selectize>
																					<!-- <option <?php echo ucfirst(str_replace("_"," ",$edu_info['curriculum']))=="Curriculum"?"selected":""; ?> value="0">Curriculum</option> -->
                                                                                    
                                                                                    
                                                                                    
																					<option <?php echo ucfirst(str_replace("_"," ",$edu_info['curriculum']))=="bangla_version"?"selected":""; ?> value="bangla_version">Bangla version</option>
																					<option <?php echo ucfirst(str_replace("_"," ",$edu_info['curriculum']))=="english_version"?"selected":""; ?> value="english_version">English version</option>
																					<option <?php echo ucfirst(str_replace("_"," ",$edu_info['curriculum']))=="Ed-excel"?"selected":""; ?> value="ed-excel">Ed-excel</option>
																					<option <?php echo ucfirst(str_replace("_"," ",$edu_info['curriculum']))=="Cambridge"?"selected":""; ?> value="cambridge">Cambridge</option>
																					<option <?php echo ucfirst(str_replace("_"," ",$edu_info['curriculum']))=="Ib"?"selected":""; ?> value="ib">IB</option>
                                                                                    
                                                                                    
																				</select>
																			</div>
																		</div>
																	</div>
                                                                
                                                       
                                                                
                                                                
                                                                
                                                                
																	<div class="uk-grid" data-uk-grid-margin>
																		<div class="uk-width-large-1-2 uk-width-medium-1-1">
																			<div class="md-input-wrapper md-input-filled">
																				<label for="curriculum">From</label>
																				<div class="uk-input-group" style="display: block;">
																					<span class="uk-input-group-addon" style="position: absolute;top: 25px; right: 0px;"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
																					<!-- <label for="uk_dp_1">From</label> -->
																					<input class="md-input" name="edit_from_date" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}" value="<?php echo $edu_info['from_date']; ?>" placeholder="From">
																				</div>
																			</div>
																		</div>
																		<div class="uk-width-large-1-2 uk-width-medium-1-1">
																			<div class="md-input-wrapper md-input-filled">
																				<label for="curriculum">Until</label>
																				<div class="uk-input-group" style="display: block;">
																					<span class="uk-input-group-addon" style="position: absolute;top: 25px; right: 0px;"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
																					<!-- <label for="uk_dp_1">Until</label> -->
																					<input class="md-input" name="edit_until_date" type="text" id="uk_dp_2" data-uk-datepicker="{format:'DD.MM.YYYY'}" value="<?php echo $edu_info['until_date']; ?>" placeholder="Until">
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="uk-grid" data-uk-grid-margin>
																		<div class="uk-width-large-1-2 uk-width-medium-1-1">
																			<div class="uk-input-group">

																			</div>
																		</div>
																		<div class="uk-width-large-1-2 uk-width-medium-1-1">
																			<div class="uk-input-group uk-text-right">
																				<input type="checkbox" name="edit_current_institute" <?php echo ($edu_info['current_institute'] == '1')?"checked":""; ?> data-md-icheck  value="1"/>
																				<label class="inline-label">I'm currently studying here</label>
																			</div>
																		</div>
																	</div>

																	<div class="uk-grid" data-uk-grid-margin>
																		<div class="uk-width-medium-2-10 uk-float-left">
																			<a style="padding: 10px 25px;" class="md-btn md-btn-primary" data-edu_info_id="<?php echo $edu_info['id']; ?>" id="edit_education_div" href="javascript:void(0)">&nbsp;&nbsp;&nbsp;Update&nbsp;&nbsp;&nbsp;</a>
																		</div>
																	</div>
																	<!-- Save button will be here -->

															</div>
														</div>
													</div>


													<!-- Edit educational info end -->

													<?php } ?>
												</div>
											</div>
										</div>
										<?php } ?>
								</div>


								<div class="uk-grid-top" id="form_education_info">

								</div>
								<div class="uk-grid" data-uk-grid-margin>



									<div class="uk-width-medium-6-10 uk-margin-small-top">
										<a class="md-btn md-btn-primary uk-float-right" style="padding: 10px 25px;" id="add_education_div" href="javascript:void(0)">&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;</a>
									</div>

									<div class="uk-width-medium-2-10 uk-width-small-1-5 uk-margin-small-top" style="text-align: right;">
										<a class="md-btn md-btn-success" style="padding: 10px 25px;" data-uk-smooth-scroll id="back_to_tution_info" href="javascript:void(0)">&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;</a>
									</div>
									<div class="uk-width-medium-2-10 uk-width-small-1-5 uk-margin-small-top">
										<a class="md-btn md-btn-success uk-float-right" style="padding: 10px 25px;" id="continue_to_personal_info" href="javascript:void(0)">Continue</a>
									</div>
								</div>
							</li>
							<li id="personal_info">
								<div class="uk-margin-top">
									<h3 class="full_width_in_card heading_c">
										Personal Info
									</h3>

										<div class="uk-grid" data-uk-grid-margin>
											<div class="uk-width-medium-1-5">
												<div class="md-input-wrapper">
													<label for="user_edit_first_name_control">Gender</label>
												</div>
											</div>
											<div class="uk-width-medium-1-2">
												<span class="icheck-inline">
													<input type="radio" name="gender" <?php echo (!empty($personal_info))?($personal_info[0]['gender'] == 'Male')?'checked="checked"':'':''; ?> value="Male" id="radio_demo_inline_1" data-md-icheck />
													<label for="radio_demo_inline_1" class="inline-label">Male</label>
												</span>
												<span class="icheck-inline">
													<input type="radio" name="gender" value="Female" <?php echo (!empty($personal_info))?($personal_info[0]['gender'] == 'Female')?'checked="checked"':'':''; ?> id="radio_demo_inline_2" data-md-icheck />
													<label for="radio_demo_inline_2" class="inline-label">Female</label>
												</span>
											</div>
										</div>

										<div class="uk-grid" data-uk-grid-margin>
											<div class="uk-width-medium-1-1">
												<label for="user_edit_position_control">Additional Contact Number</label>
												<input type="text" class="md-input md-input-width-medium uk-width-5-10 kUI_masked_contact_number" name="additional_numbers" value="<?php echo (!empty($personal_info))?$personal_info[0]['additional_numbers']:''; ?>" />
											</div>
										</div>

										<div class="uk-grid" data-uk-grid-margin>
											<div class="uk-width-medium-1-1">
												<div class="uk-form-row">
													<label for="pre_address">Details Address</label>
													<textarea class="md-input" name="pre_address" id="pre_address" data-uk-tooltip="{pos:'bottom'}" title="Example: Flat 4A, House 40, Road 16, <br> Dhanmondi, Dhaka" ><?php echo (!empty($personal_info))?$personal_info[0]['pre_address']:''; ?></textarea>
												</div>
											</div>
										</div>

										<div class="uk-grid" data-uk-grid-margin>
											<div class="uk-width-medium-1-1">
												<label for="identity">Identity Card No</label>
												<input class="md-input" type="text" id="user_edit_facebook_control" data-uk-tooltip="{pos:'bottom'}" title="Example: 19953012781000270 / BB 0617607" name="identity" value="<?php echo (!empty($personal_info))?$personal_info[0]['identity']:''; ?>" /> 

											<!--	<div class="input-group md-input">
													<div class="input-group-icon">
														<select class="" style="width: 100px !important; border-radius: 0 !important" name="identity_type" id="identity_type" data-md-selectize>
															<option <?php if (!empty($personal_info)): if ($personal_info[0]['identity_type'] == 'National ID'): echo 'selected'; endif; endif; ?> value="National ID">NID</option>
															<option <?php if (!empty($personal_info)): if ($personal_info[0]['identity_type'] == 'Passport No'): echo 'selected'; endif; endif; ?> value="Passport No">Passport No</option>
															<option <?php if (!empty($personal_info)): if ($personal_info[0]['identity_type'] == 'Birth Certificate No'): echo 'selected'; endif; endif; ?> value="Birth Certificate No">Birth Certificate No</option>
														</select>
													</div>
													<div class="input-group-area">
															<input class="md-input" style="border-radius: 0 !important" type="text" id="user_edit_facebook_control" data-uk-tooltip="{pos:'bottom'}" title="Example: 19953012781000270 / BB 0617607" name="identity" value="<?php echo (!empty($personal_info))?$personal_info[0]['identity']:''; ?>" />
													</div>
												</div> -->

											</div>
										</div>

										<div class="uk-grid" data-uk-grid-margin>
											<div class="uk-width-medium-1-2" style="position: relative;">
												<label for="user_edit_first_name_control">Date of Birth</label>
												<input class="md-input" type="date" data-uk-tooltip="{pos:'bottom'}" title="Example: 2019-01-01" id="user_edit_date_of_birth_control" name="date_of_birth" value="<?php echo (!empty($personal_info))?$personal_info[0]['date_of_birth']:''; ?>" />
											</div>
                                            
											<div class="uk-width-medium-1-2">
												 <label for="">Religion</label>
												<!-- <input class="md-input" type="text" data-uk-tooltip="{pos:'bottom'}" title="Example: Islam" id="user_edit_religion_control" name="religion" value="<?php echo (!empty($personal_info))?$personal_info[0]['religion']:''; ?>" /> -->

                                                    <select id="signupform-locale" class="form-control" name="religion" aria-required="true">
													<option <?php if (!empty($personal_info)): if ($personal_info[0]['religion'] == 'islam'): echo 'selected'; endif; endif; ?> value="islam">Islam</option>
													<option <?php if (!empty($personal_info)): if ($personal_info[0]['religion'] == 'hinduism'): echo 'selected'; endif; endif; ?> value="hinduism">Hinduism</option>
													<option <?php if (!empty($personal_info)): if ($personal_info[0]['religion'] == 'christianity'): echo 'selected'; endif; endif; ?> value="christianity">Christianity</option>
													<option <?php if (!empty($personal_info)): if ($personal_info[0]['religion'] == 'buddhism'): echo 'selected'; endif; endif; ?> value="buddhism">Buddhism</option>
												</select>
											</div>
                                            
                                            
                                  
                                            
                                            
                                            
                                            
                                            
											<div class="uk-width-medium-1-2">
												<label for="user_edit_position_control">Nationality</label>
												<!-- <input class="md-input" type="text" data-uk-tooltip="{pos:'bottom'}" title="Example: Bangladeshi" id="user_edit_nationality_control" name="nationality" value="<?php echo (!empty($personal_info))?$personal_info[0]['nationality']:''; ?>" /> -->
											
                                                      <select id="signupform-locale" class="form-control" name="nationality" aria-required="true">
													<option value="">Select One</option>
													<?php foreach ($country as $v): ?>
													<option value="<?php echo $v->id ?>" <?php if (!empty($personal_info)): if ($personal_info[0]['nationality'] == $v->id): echo 'selected'; endif; endif; ?>><?php echo $v->country ?></option>
													<?php endforeach ?>
													<!-- <option <?php if (!empty($personal_info)): if ($personal_info[0]['religion'] == 'islam'): echo 'selected'; endif; endif; ?> value="islam">Islam</option>
													<option <?php if (!empty($personal_info)): if ($personal_info[0]['religion'] == 'hinduism'): echo 'selected'; endif; endif; ?> value="hinduism">Hinduism</option>
													<option <?php if (!empty($personal_info)): if ($personal_info[0]['religion'] == 'christianity'): echo 'selected'; endif; endif; ?> value="christianity">Christianity</option>
													<option <?php if (!empty($personal_info)): if ($personal_info[0]['religion'] == 'buddhism'): echo 'selected'; endif; endif; ?> value="buddhism">Buddhism</option> -->
												</select>
											</div>
										</div>

										<div class="uk-grid" data-uk-grid-margin>
											<div class="uk-width-medium-1-2" style="position: relative;">
												<label for="user_edit_first_name_control">Facebok Link</label>
												<input class="md-input" type="text" data-uk-tooltip="{pos:'bottom'}" title="Example: https://www.facebook.com/ct" id="user_edit_facebook_control" name="fb_link" value="<?php echo (!empty($personal_info))?$personal_info[0]['fb_link']:''; ?>" />
											</div>
											<div class="uk-width-medium-1-2">
												<label for="user_edit_position_control">Linkedin Link</label>
												<input class="md-input" type="text" data-uk-tooltip="{pos:'bottom'}" title="Example: https://www.linkedin.com/in/ct" id="user_edit_liknedin_control" name="linkedin_link" value="<?php echo (!empty($personal_info))?$personal_info[0]['linkedin_link']:''; ?>" />
											</div>
										</div>

										<h3 class="full_width_in_card heading_c">
											Parents Information
										</h3>

										<div class="uk-grid" data-uk-grid-margin>
											<div class="uk-width-medium-1-2">
												<label for="user_edit_first_name_control">Father's name</label>
												<input class="md-input" type="text" id="user_edit_father_name_control" name="fathers_name" value="<?php echo (!empty($personal_info))?$personal_info[0]['fathers_name']:''; ?>" />
											</div>

											<div class="uk-width-medium-1-2">
												<label for="user_edit_position_control">Father's phone no</label>
												<input class="md-input kUI_masked_contact_number" type="text" id="user_edit_mother_name_control" name="fathers_phone" value="<?php echo (!empty($personal_info))?$personal_info[0]['fathers_phone']:''; ?>" />
											</div>
										</div>
										<div class="uk-grid" data-uk-grid-margin>
											<div class="uk-width-medium-1-2">
												<label for="user_edit_first_name_control">Mother's name</label>
												<input class="md-input" type="text" id="user_edit_father_name_control" name="mothers_name" value="<?php echo (!empty($personal_info))?$personal_info[0]['mothers_name']:''; ?>" />
											</div>

											<div class="uk-width-medium-1-2">
												<label for="user_edit_position_control">Mother's phone no</label>
												<input class="md-input kUI_masked_contact_number" type="text" id="user_edit_mother_name_control" name="mothers_phone" value="<?php echo (!empty($personal_info))?$personal_info[0]['mothers_phone']:''; ?>" />
											</div>
										</div>

										<h3 class="full_width_in_card heading_c">
											Emergency Contact Info
										</h3>
										<div class="uk-grid" data-uk-grid-margin>
											<div class="uk-width-medium-1-1">
												<label for="user_edit_first_name_control">Name</label>
												<input class="md-input" type="text" id="user_edit_father_name_control" name="emmergency_contact_name" value="<?php echo (!empty($personal_info))?$personal_info[0]['emmergency_contact_name']:''; ?>" <?php echo (!empty($personal_info[0]['emmergency_contact_name']))?"":""; ?> />
											</div>
											<div class="uk-width-medium-1-1">
												<label for="user_edit_first_name_control">Address</label>
												<input class="md-input" type="text" id="user_edit_emergency_address" name="emmergency_address" value="<?php echo (!empty($personal_info))?$personal_info[0]['emmergency_contact_address']:''; ?>" <?php echo (!empty($personal_info[0]['emmergency_contact_address']))?"":""; ?> data-parsley-trigger="keyup" data-uk-tooltip="{pos:'bottom'}" title="Floor 5A, House 65, Road 14, <br/>Sector 12, Uttara, Dhaka"/>
											</div>
										</div>
										<div class="uk-grid" data-uk-grid-margin>
											<div class="uk-width-medium-1-2">
												<label for="user_edit_first_name_control">Contact no</label>
												<input class="md-input kUI_masked_contact_number" type="text" id="user_edit_father_name_control" name="emmergency_contact_number" value="<?php echo (!empty($personal_info))?$personal_info[0]['emmergency_contact_number']:''; ?>" <?php echo (!empty($personal_info[0]['emmergency_contact_number']))?"":""; ?> />
											</div>

											<div class="uk-width-medium-1-2">
												<label for="user_edit_position_control">Relation</label>
												<input class="md-input" type="text" id="user_edit_mother_name_control" name="emmergency_contact_rel" value="<?php echo (!empty($personal_info))?$personal_info[0]['emmergency_contact_rel']:''; ?>" <?php echo (!empty($personal_info[0]['emmergency_contact_rel']))?"":""; ?> />
											</div>
										</div>


										<h3 class="full_width_in_card heading_c">
											Overviews
										</h3>
										<div class="uk-grid" data-uk-grid-margin>
											<div class="uk-width-medium-1-1">
												<div class="uk-form-row">

													<p class="uk-text-muted uk-text-small">#A short description about yourself<br />#Describe why they should hire you</p>

													<textarea class="md-input" name="overview_yourself" data-parsley-trigger="keyup" data-uk-tooltip="{pos:'bottom'}" title="Example: I am a dedicated tutor. I have been<br/>in this profession for last 5 years. Teaching<br/>student is a good hobby where I can still<br/>learn a lot or recall the things I learned<br/>when I was small. I love spending time with<br/>kids because after all the tiresome you can<br/>go and be with younger people and feel young<br/>again and you can be a mentor to them and help<br/>them understand the meaning of life. I can<br/>guide them to be a better person and help them<br/>understand the difference between right and<br/>wrong. This is one of the reason it got me<br/>close to my students hence they get close<br/>with me. This is something I look forward and<br/>this is one of the qualityI possess. From my<br/>childhood experiences Ican help this younger<br/>people to become a better human being." placeholder="Add an overview..."><?php echo (!empty($personal_info)) ? $personal_info[0]['overview_yourself'] : "" ; ?></textarea>

													<p class="uk-text-small" style="color: #e53935;">Add an overview (5000 chars max)</p>
												</div>
											</div>
										</div>

											<div class="uk-grid" data-uk-grid-margin>

											<div class="uk-width-medium-2-10 uk-width-small-1-5 uk-margin-small-top" style="text-align: right;">
												<a style="padding: 10px 25px;" class="md-btn md-btn-success" id="back_to_education_info" href="javascript:void(0)">&nbsp;&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;&nbsp;</a>
											</div>

												<div class="uk-width-medium-8-10 uk-width-small-1-5 uk-margin-small-top">

												<button style="padding: 10px 25px;" type="button" id="personal_info_button" class="md-btn md-btn-primary uk-float-right">Save & finish</button>
											</div>
										</div>

								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="uk-width-large-3-10">
				<div class="md-card">
					<div class="md-card-content" style="padding: 0 0 16px;">
						<h3 class="heading_c uk-margin-bottom text_center" style="padding: 15px 10px; font-size: 18px; background-color: #62B235; color: #fff;">Make Your Profile Strong</h3>
						<div class="uk-grid" data-uk-grid-margin style="padding:0 25px 0 15px;">
						<div class="uk-width-large-1-1 uk-width-medium-1-1">
							<a class="md-btn md-btn-warning uk-align-center uk-width-medium-1-1" href="#mailbox_new_message" data-uk-modal="{center:true}" >Upload Your Credential</a>
						</div>
						</div>
						<div class="uk-grid" data-uk-grid-margin style="padding:0 25px 0 15px;">
						<div class="uk-width-large-1-1 uk-width-medium-1-1">
							<a class="md-btn md-btn-success uk-align-center uk-width-medium-1-1" href="<?php echo base_url('quizes/load_quizes');?>" >Give A test</a>
						</div>
						</div>
						<div class="uk-grid" data-uk-grid-margin style="padding:0 25px 0 15px;">
							<div class="uk-width-large-1-1 uk-width-medium-1-1">
							<a class="md-btn md-btn-danger uk-width-medium-1-1" href="#upload_instructions" data-uk-modal="{center:true}" >Photo Upload Instruction</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</form>

</div>
</div>
<div class="uk-modal" id="mailbox_new_message">
<div class="uk-modal-dialog">
	<button class="uk-modal-close uk-close" type="button"></button>

		<div class="uk-modal-header">
			<h3 class="uk-modal-title">Upload Credentials</h3>
		</div>
		<div class="uk-width-1-1" id="message">

		</div>
		<input type="hidden" name="file_name" id="file_name" />
		<div class="uk-margin-medium-bottom">
			<label for="mail_new_to">Credential Type</label>
			<!-- <input type="text" class="md-input" name="name_of_the_credential" id="name_of_the_credential" /> -->
			<select id="name_of_the_credential" name="name_of_the_credential" data-md-selectize>
				<option value="">Please Select</option>
				<option value="SSC/O Level Marksheets/ certificates">SSC/O Level Marksheets/ certificates</option>
				<option value="HSC/A Level Marksheets/ certificates">HSC/A Level Marksheets/ certificates</option>
				<option value="NID/ Passport/ Birth certificate">NID/ Passport/ Birth certificates</option>
				<option value="University ID">University ID</option>
				<option value="Others">Others</option>
			</select>
		</div>

		<div id="credential_file_upload-drop" class="uk-file-upload">
			<div class="uk-grid" data-uk-grid-margin>
				<div class="uk-width-medium-1-2">
					<p class="uk-text uk-text-left">1.SSC/O Level Marksheets/certificates</p>
					<p class="uk-text uk-text-left">2.HSC/A Level Marksheets/certificates</p>
					<p class="uk-text uk-text-left">3.NID/ Passport/ Birth certificate </p>
					<p class="uk-text uk-text-left">4.University ID</p>
				</div>

				<div class="uk-width-medium-1-2">
					<p class="uk-text">Drop file to upload</p>
					<p class="uk-text-muted uk-text-small uk-margin-small-bottom">or</p>
					<a class="uk-form-file md-btn md-btn-success" style="padding: 10px 25px;">Choose file<input id="file_upload-select" type="file"></a>
				</div>
			</div>
		</div>
		<div id="mail_progressbar" class="uk-progress uk-hidden">
			<div class="uk-progress-bar" style="width:0">0%</div>
		</div>

		<div class="uk-modal-footer">
			<a class="uk-float-right md-btn md-btn-primary btnup upload_credential_button" style="padding: 10px 25px;" href="javascript:void(0)" id="upload_credential_button">Send</a>
		</div>

		<div class="uk-text uk-credential_inst">
			<span>Note: In case you don't have the scanner you can take the pictures by your smartphone to upload them.
Make sure file size will not more than 5 MB. You can’t upload more than 4 credentials.</span>
		</div>

</div>
</div>

<div class="uk-modal" id="upload_new_profile_pic">
<div class="uk-modal-dialog">
	<button class="uk-modal-close uk-close" type="button"></button>

		<div class="uk-modal-header">
			<h3 class="uk-modal-title">Upload Profile Picture</h3>
		</div>
		<div class="uk-width-1-1" id="message">

		</div>
		<div class="uk-grid">
			<div class="uk-width-medium-4-6 uk-width-small-1-1 uk-text-center" style="padding-left: 0 !important">
				<div id="upload-demo" style="padding: 23px"></div>
			</div>
			<div class="uk-width-medium-2-6 uk-width-small-1-1" style="padding-top: 30px">
				<!-- <button type="button" name="button" class="uk-button uk-button-default">chose file</button> -->
				<a class="uk-form-file uk-button uk-button-default">Choose file<input id="upload" type="file"></a>
				<button type="button" name="button" class="uk-button uk-button-success crop_image">crop</button>
				<div style="margin: 20px 20px 20px 0">
					<div id="upload-demo-i"></div>
				</div>

			</div>
			<div class="uk-width-medium-1-1 uk-width-small-1-1 image_upload_button" style="padding-top: 30px; display: none">
				<div class="uk-text-right uk-position-bottom-right" style="bottom: 25px; right: 25px; margin-top: 25px">
					<button type="button" name="button" class="uk-button uk-button-primary upload_button">Upload Image</button>
				</div>
			</div>
		</div>

</div>
</div>

<div class="uk-modal" id="upload_instructions">
<div class="uk-modal-dialog">
	<button class="uk-modal-close uk-close" type="button"></button>

	<div class="uk-modal-header" style="padding: 0px; text-align: center;">
		<h3 class="uk-modal-title">How to upload a perfect profile picture</h3>
	</div>
	<div class="uk-margin-medium-bottom">
		<p>You have excellent educational background and good experience of tutoring, but you’re having a hard time to find new tuitions. Sound familiar? If so, consider the first impression your profile makes with prospective client.</p>
		<p>Your profile is how you present yourself to the world. And if a picture is worth a thousand words, what does your profile picture say about you? Does it say you’re friendly, professional, and easy to get along with?</p>
		<p>Client look at profile photos to get a sense of who you are…and if they don’t see a photo that conveys friendliness and professionalism, you may get overlooked. To help you attract client and stand out from the crowd, keep these guidelines in mind when you’re snapping your pics.</p>

		<ol>
			<li>
			<h4>Find your best light</h4>
			<p>Shady areas outdoors, without direct sunlight, are a great lighting choice. Inside, avoid overhead light, which creates harsh shadows, and instead look for natural light.</p>
			</li>
			<li>
			<h4>Simplify the background</h4>
			<p>Look for a background that is clear and uncluttered. A solid, not-too-bright wall or simple outdoor background works well.</p>
			</li>
			<li>
			<h4>Focus on your face</h4>
			<p>Face the camera straight on or with your shoulders at a slight angle. Crop so that you only include your head and the top of your shoulders.</p>
			</li>
			<li>
			<h4>Smile! (You’ll land more jobs)</h4>
			<p>Clients find smiling tutors more warm, friendly, and trustworthy. Not used to smiling for the camera? Try pretending that you are greeting your best friend.</p>
			</li>
		</ol>

		<h3 class="uk-modal-title">Do & Don't Examples (Male)</h3>
		<img src="<?php echo base_url(); ?>assets/img/2.jpg" />
		<h3 class="uk-modal-title">Do & Don't Examples (Female)</h3>
		<img src="<?php echo base_url(); ?>assets/img/female.png" />
	</div>
</div>
</div>


<script id="education_form_template_services" type="text/x-handlebars-template">
<!--{{#ifCond invoice_service_id '!==' 1}}
{{/ifCond}}
-->
<div class="education_div" id="education_div_1" data-service-number="{{invoice_service_id}}">
	<h3 class="full_width_in_card heading_c">
		Add Education Information
		<!--{{#ifCond invoice_service_id '!==' 1}}
		<span style="float: right;margin-top: -5px;">
			<i class="md-icon md-icon material-icons md-card-overlay-toggler remove_education_div">&#xE5CD;</i>
		</span>
		{{/ifCond}}-->
	</h3>
	<div class="uk-grid" data-uk-grid-margin>
		<div class="uk-width-medium-12">

				<input type="hidden" name="education_info_id" value="0" />
				<div class="uk-grid" data-uk-grid-margin>
					<div class="uk-width-medium-1-1">

				<label class="uk-text-muted uk-text-small"><b>Add Masters, Honors, HSC/A Level, SSC/O Level <span style="color: #e53935;">(Required)*</span></b></label>
						 <!--  <select id="level_of_education" name="level_of_education" data-md-selectize>  -->
                      <select id="signupform-locale" class="form-control" name="level_of_education" aria-required="true">
							<option value="0">Level of education</option>
							<option value="Secondary">Secondary</option>
							<option value="Higher Secondary">Higher Secondary</option>
							<option value="Diploma">Diploma</option>
							<option value="Bachelor/Honors">Bachelor/Honors</option>
							<option value="Masters">Masters</option>
							<option value="Doctoral">Doctoral</option>
						</select>
					</div>
				</div>
				<div class="uk-grid" data-uk-grid-margin>
					<div class="uk-width-medium-1-2">
						<label for="user_edit_position_control">Exam/Degree title</label>
						<input type="text" id="add_exam_degree_title" name="exam_degree_title" class="md-input md-input-width-medium uk-width-5-10" value="" placeholder="e.g Masters, Honors, HSC/A Level, SSC/O Level" />
					</div>
					<div class="uk-width-medium-1-2">
						<input type="text" id="autocomplete_group" name="group_name" data-edu-id="<?php if(isset($edu_info)): echo $edu_info['id']; endif; ?>" class="md-input md-input-width-medium" placeholder="Concentration / Major / Group" />
						<input type="hidden" id="group_hidden_id_<?php if(isset($edu_info)): echo $edu_info['id']; endif; ?>" name="group_hidden_id" />
						<span class="uk-text-danger">required*</span>
						<!-- <div class="md-input-wrapper">
						<label for="user_edit_first_name_control">Concentration / Major / Group</label>
						<select id="tutor_group_name" name="group_name" data-md-selectize>
							<option value="">Your group name</option>
							<?php if(!empty($groups)){ ?>
							<?php foreach ($groups as $group)
							{
							?>
							<option value="<?php echo $group['id']; ?>"><?php echo $group['sdg']; ?></option>
							<?php
							} }
							?>
						</select>
						</div> -->
					</div>
				</div>

				<div class="uk-grid" data-uk-grid-margin>
					<div class="uk-width-medium-1-1">
						<input type="text" id="autocomplete_institute" name="institute_name" data-edu-id="<?php if(isset($edu_info)): echo $edu_info['id']; endif; ?>" class="md-input md-input-width-medium" placeholder="Institute Name" />
						<input type="hidden" id="institute_hidden_id_<?php if(isset($edu_info)): echo $edu_info['id']; endif; ?>" name="institute_hidden_id" />
						<span class="uk-text-danger">required*</span>
					</div>
				</div>

				<div class="uk-grid" data-uk-grid-margin>
					<div class="uk-width-medium-1-1">
						<!-- <label for="user_edit_position_control">ID Card Number(optional)</label> -->
						<input type="text" id="add_id_card_number" name="id_card_number" class="md-input md-input-width-medium" placeholder="ID Card Number(optional)" />
					</div>
				</div>

				<div class="uk-grid" data-uk-grid-margin>
					<div class="uk-width-medium-1-2">
						<!-- <label for="user_edit_first_name_control">GPA / CGPA</label> -->
						<input type="text" name="result" class="md-input md-input-width-medium uk-width-5-10" placeholder="GPA / CGPA" />
					</div>
					<div class="uk-width-medium-1-2">
						<!-- <label for="user_edit_position_control">Year of passing</label> -->
						<input type="text" name="year_of_passing" class="md-input md-input-width-medium uk-width-5-10" value="" placeholder="Year of passing" />
					</div>
				</div>
				<div class="uk-grid" data-uk-grid-margin>
					<div class="uk-width-medium-1-1">
						<div class="md-input-wrapper">
						<label for="curriculum">Curriculum</label>
						<!-- <select id="curriculum" name="curriculum" placehlder="Curriculum" data-md-selectize > -->
                        <select id="signupform-locale" class="form-control" name="curriculum" aria-required="true">
							<!-- <option value="0">Curriculum</option> -->
							<option value="bangla_version">Bangla version</option>
							<option value="english_version">English version</option>
							<option value="ed-excel">Ed-excel</option>
							<option value="cambridge">Cambridge</option>
							<option value="ib">IB</option>
						</select>
						</div>
					</div>
				</div>
				<div class="uk-grid" data-uk-grid-margin>
					<div class="uk-width-large-1-2 uk-width-medium-1-1">
						<div class="uk-input-group" style="    display: block;">
							<span class="uk-input-group-addon" style="position: absolute;top: 25px; right: 0px;"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
							<!-- <label for="uk_dp_1">From</label> -->
							<input class="md-input md-input-width-medium uk-width-5-10" name="from_date" type="text" id="datepicker" data-uk-datepicker="{format:'DD.MM.YYYY'}" placeholder="From">
						</div>
					</div>
					<div class="uk-width-large-1-2 uk-width-medium-1-1">
						<div class="uk-input-group" style="    display: block;">
							<span class="uk-input-group-addon" style="position: absolute;top: 25px; right: 0px;"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
							<!-- <label for="uk_dp_1">Until</label> -->
							<input class="md-input" name="until_date" type="text" id="datepickerUntil" data-uk-datepicker="{format:'DD.MM.YYYY'}" placeholder="Until">
						</div>
					</div>
				</div>
				<div class="uk-grid" data-uk-grid-margin>
					<div class="uk-width-large-1-2 uk-width-medium-1-1">
						<div class="uk-input-group">

						</div>
					</div>
					<div class="uk-width-large-1-2 uk-width-medium-1-1">
						<div class="uk-input-group uk-text-right">
							<input type="checkbox" name="current_institute" data-md-icheck  value="1"/>
							<label class="inline-label">I'm currently studying here</label>
						</div>
					</div>
				</div>

		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!--ref for help video-->












