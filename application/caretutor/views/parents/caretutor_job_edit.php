<?php defined('safe_access') or die('Restricted access!'); ?>

    <div id="page_content">
    	<form id="job_edit_form" class="uk-form-stacked">
        <div id="page_heading">
            <h1 class="page_title"><a href="#">Need a <?php echo $job[0]->category.' - '.$job[0]->sub_cat; ?> Tutor</a></h1>
            <!-- <span class="uk-text-muted uk-text-upper uk-text-small uk-text-bold uk-text-warning">subjects : </span><span class="uk-text-muted uk-text-upper uk-text-small">Physics, Mathematics</span> -->

            <div class="subject_show" style="margin-bottom: 20px;">
            <?php if(!empty($job[0]->subjects)){
            	$subjects = explode(',', $job[0]->subjects);
            ?>
            <div class="uk-form-row md-input-wrapper">
            	<label for="product_edit_tags_control">Subject: </label>
                <select id="selSubject" class="product_edit_tags_control" name="sdg[]" multiple>
                	<?php
                		foreach ($sdg as $cat)
						{
							$selected = '';
							foreach($subjects as $subject)
							{
								if($subject == $cat['id']){
									$selected = 'selected';
								}
							}
					?>
                	<option value="<?php echo $cat['id']; ?>" <?php echo $selected; ?> ><?php echo $cat['category']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <?php } ?>
            </div>

            	<input type="hidden" value="<?php echo $job[0]->id; ?>" name="job_id" id="job_id" />
            	<input type="hidden" value="<?php echo $job[0]->user_id; ?>" name="user_id" />
                <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                    <div class="uk-width-xLarge-2-10 uk-width-large-1-1 uk-margin-top">

                            <h1 class="page_title">
                                    Contact Info
                            </h1>
                            <div class="md-card-content">
                                <div class="uk-grid  uk-grid-medium" data-uk-grid-margin>
                                    <div class="uk-width-large-1-2 uk-width-medium-1-1">
                                        <div class="uk-form-row">
                                            <label for="product_edit_price_control">Name</label>
                                            <input type="text"  class="md-input" name="full_name" value="<?php echo $job[0]->full_name; ?>" />
                                        </div>
                                        <div class="uk-form-row">

                                            <label for="product_edit_price_control">Email</label>
                                            <input type="text"  class="md-input" name="email" value="<?php echo $job[0]->email; ?>" />

                                        </div>

                                    </div>
                                    <div class="uk-width-large-1-2 uk-width-medium-1-1">
                                        <div class="uk-form-row">
                                            <label for="product_edit_price_control">Phone</label>
                                            <input type="text"  class="md-input" name="mobile_no" value="<?php echo $job[0]->mobile_no; ?>" />
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="product_edit_description_control">Address</label>
                                            <input type="text" class="md-input"  name="address" value="<?php echo $job[0]->address; ?>" />

                                        </div>
                                    </div>

                                </div>
                            </div>

                    </div>
                    <div class="uk-width-xLarge-1-1  uk-width-large-1-1 uk-margin-top">


                                <h1 class="page_title uk-margin-top">
                                    Requirement details
                                </h1>

                            <div class="md-card-content large-padding">
                                <div class="uk-grid  uk-grid-medium" data-uk-grid-margin>
                                    <div class="uk-width-large-1-1">
                                         <div class="uk-form-row">
                                            <div class="uk-form-row md-input-wrapper">
                                              <label>Job ID</label>
                                              <span class="uk-text-large uk-text-middle"><?php echo $job[0]->id; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-1-2">


		                                <div class="uk-form-row md-input-wrapper">
                                            <label for="product_edit_memory_control">City</label>
                                            <select id="selcity" class="selcity" name="selcity"  data-md-selectize>
                                                <?php
												foreach ($city as $cit)
												{
												?>
													<option <?php echo ($cit->id == $job[0]->city_id)?'selected="selected"':'' ; ?> value="<?php echo ($cit->city == 'Select City')?'':$cit->id; ?>"><?php echo $cit->city; ?></option>
												<?php
												}
												?>
                                            </select>
                                        </div>



		                                <div class="uk-form-row md-input-wrapper">
                                            <label for="product_edit_memory_control" >Category</label>
                                            <select id="selcat" class="selcat" name="selcat"  data-md-selectize>
                                                <?php
												foreach ($category as $cat)
												{
												?>
													<option <?php echo ($cat->id == $job[0]->tution_category_id)?'selected="selected"':''; ?> value="<?php echo ($cat->category == 'Select Category')?'':$cat->id; ?>"><?php echo $cat->category;?></option>
												<?php
												}
												?>
                                            </select>
                                        </div>

                                    	<div class="uk-form-row md-input-wrapper">
                                            <label for="product_edit_memory_control">Class</label>
                                            <div class="sub_category_dropdown">
                                            <select id="selsubcat" class="selsubcat"  name="selsubcat" data-md-selectize>
                                                <?php foreach($courses as $cour){ ?>
									    		<option <?php echo ($cour->id == $job[0]->tution_sub_cat_id)?'selected="selected"':''; ?> value="<?php echo $cour->id; ?>"><?php echo $cour->category; ?></option>
									    		<?php } ?>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="uk-form-row md-input-wrapper">
                                            <label for="product_edit_memory_control" >Preferred Gender</label>
                                            <select id="selgender" name="selgender"  data-md-selectize>
                                                <option value="">Tutor gender reference</option>
                                                <option <?php echo ($job[0]->preferred_gender == 'Any')?'selected="selected"':''; ?> value="Any">Any</option>
												<option <?php echo ($job[0]->preferred_gender == 'Male')?'selected="selected"':''; ?> value="Male">Male</option>
												<option <?php echo ($job[0]->preferred_gender == 'Female')?'selected="selected"':''; ?> value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="uk-form-row md-input-wrapper">
                                            <label for="product_edit_memory_control">Weekly Days</label>
                                            <select id="selday" name="selday"  data-md-selectize>
                                                <option value="">Days in a week</option>
												<option <?php echo ($job[0]->days_per_week == '1')?'selected="selected"':''; ?> value="1">1</option>
												<option <?php echo ($job[0]->days_per_week == '2')?'selected="selected"':''; ?> value="2">2</option>
												<option <?php echo ($job[0]->days_per_week == '3')?'selected="selected"':''; ?> value="3">3</option>
												<option <?php echo ($job[0]->days_per_week == '4')?'selected="selected"':''; ?> value="4">4</option>
												<option <?php echo ($job[0]->days_per_week == '5')?'selected="selected"':''; ?> value="5">5</option>
												<option <?php echo ($job[0]->days_per_week == '6')?'selected="selected"':''; ?> value="6">6</option>
												<option <?php echo ($job[0]->days_per_week == '7')?'selected="selected"':''; ?> value="7">7</option>
                                            </select>
                                        </div>



                                    </div>
                                    <div class="uk-width-large-1-2">
                                           <div class="uk-form-row md-input-wrapper">
                                            <label for="product_edit_memory_control" >Location</label>
                                            <div class="location_dropdown">
                                                <select id="sellocation" class="sellocation" name="sellocation"  data-md-selectize>
                                                    <?php
                                                    foreach ($location as $loc)
                                                    {
                                                    ?>
                                                        <option <?php echo ($loc->id == $job[0]->location_id)?'selected="selected"':'' ; ?> value="<?php echo ($loc->location == 'Select Category')?'':$loc->id; ?>"><?php echo $loc->location;?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                    	<?php $english_medium = $bangla_medium = '';
                                		if($job[0]->tution_category_id == '3'){
                                			$bangla_medium = 'style="display:none;"';
                                		} elseif($job[0]->tution_category_id == '2'){
                                			$english_medium = 'style="display:none;"';

                                		} if($job[0]->bangla_medium_from != '' || $job[0]->english_medium_from != ''){ ?>

                                		<div class="uk-form-row md-input-wrapper">
									    	<label for="subject">Medium: </label>
									    	<div id="english_medium" <?php echo $english_medium; ?>>
									    		<p>
									                <input type="radio" name="english_medium_from" id="Cambridge" <?php echo ($job[0]->english_medium_from == 'cambridge')?'checked="checked"':''; ?> value='cambridge' data-md-icheck />
									                <label for="Cambridge" class="inline-label">Cambridge</label>
									            </p>

									            <p>
									                <input type="radio" name="english_medium_from" id="Ed-excel" <?php echo ($job[0]->english_medium_from == 'ed_excel')?'checked="checked"':''; ?> value='ed_excel' data-md-icheck />
									                <label for="Ed-excel" class="inline-label"> Ed-excel </label>
									            </p>

									            <p>
									                <input type="radio" name="english_medium_from" id="IB" <?php echo ($job[0]->english_medium_from == 'ib')?'checked="checked"':''; ?> value='ib' data-md-icheck />
									                <label for="IB" class="inline-label"> IB </label>
									            </p>
									        </div>

									        <div id="bangla_medium" <?php echo $bangla_medium; ?>>
									            <p>
									                <input type="radio" name="bangla_medium_from" id="Bangla version" <?php echo ($job[0]->bangla_medium_from == 'bangla_version')?'checked="checked"':''; ?> value='bangla_version' data-md-icheck />
									                <label for="Bangla version" class="inline-label"> Bangla version </label>
									            </p>

									            <p>
									                <input type="radio" name="bangla_medium_from" id="English version" <?php echo ($job[0]->bangla_medium_from == 'english_version')?'checked="checked"':''; ?> value='english_version' data-md-icheck />
									                <label for="English version" class="inline-label"> English version </label>
									            </p>
									     	</div>
										</div>

                                		<?php }?>


                                    	<div class="uk-form-row md-input-wrapper">
                                            <label for="product_edit_manufacturer_control">Salary</label>
                                            <input type="text" class="md-input"  name="salary_range" id="salary_range" value="<?php echo $job[0]->salary_range; ?>" />
                                        </div>

                                        <div class="uk-form-row md-input-wrapper">
                                            <label for="product_edit_sn_control">Hire Date</label>
                                            <input class="md-input"  name="date_to_hire" type="text" id="date_to_hire" value="<?php echo date('d.m.Y',strtotime($job[0]->date_to_hire)); ?>" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                        </div>


                                        <div class="uk-form-row md-input-wrapper">
                                            <label for="product_edit_memory_control">No of students</label>
                                            <select id="no_of_student" name="no_of_student"  data-md-selectize>
                                                <option value="">Days in a week</option>
                                                <option <?php echo ($job[0]->no_of_student == '1')?'selected="selected"':''; ?> value="1">1</option>
                                                <option <?php echo ($job[0]->no_of_student == '2')?'selected="selected"':''; ?> value="2">2</option>
                                                <option <?php echo ($job[0]->no_of_student == '3')?'selected="selected"':''; ?> value="3">3</option>
                                                <option <?php echo ($job[0]->no_of_student == '4')?'selected="selected"':''; ?> value="4">4</option>
                                                <option <?php echo ($job[0]->no_of_student == '5')?'selected="selected"':''; ?> value="5">5</option>
                                                <option <?php echo ($job[0]->no_of_student == '6')?'selected="selected"':''; ?> value="6">6</option>
                                                <option <?php echo ($job[0]->no_of_student == '7')?'selected="selected"':''; ?> value="7">7</option>
                                                <option <?php echo ($job[0]->no_of_student == '8')?'selected="selected"':''; ?> value="8">8</option>
                                                <option <?php echo ($job[0]->no_of_student == '9')?'selected="selected"':''; ?> value="9">9</option>
                                                <option <?php echo ($job[0]->no_of_student == '10')?'selected="selected"':''; ?> value="10">10</option>
                                            </select>
                                        </div>

                                        <div class="uk-form-row md-input-wrapper">
                                            <label for="product_edit_sn_control">Tutoring Time</label>
                                            <input class="md-input"  name="tutoring_time" type="text" id="tutoring_time" value="<?php if ($job[0]->tutoring_time): echo date('h:i a', strtotime($job[0]->tutoring_time)); endif; ?>" data-uk-timepicker="{format:'12h'}">
                                        </div>

                                         <div class="uk-form-row md-input-wrapper">
                                            <label for="product_edit_memory_control">Student Gender</label>
                                            <select id="selstgender" name="selstgender"  data-md-selectize>
                                                <option value="">Student Gender</option>
                                                <option <?php echo ($job[0]->student_gender == 'Male')?'selected="selected"':''; ?> value="Male">Male</option>
                                                <option <?php echo ($job[0]->student_gender == 'Female')?'selected="selected"':''; ?> value="Female">Female</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="uk-width-large-1-1">
                                         <div class="uk-form-row md-input-wrapper">
                                            <label for="product_edit_description_control">Description</label>
                                            <textarea class="md-input" name="otherreq" id="product_edit_description_control" cols="30" rows="4"><?php echo $job[0]->other_req; ?></textarea>
                                        </div>
                                        <div class="uk-form-row uk-float-right">
                                        <a class="md-btn md-btn-primary uk-margin-medium-top uk-margin-medium-bottom "  href="javascript:void(0)" id="job_edit_submit" style="padding: 10px 25px;">Update</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
        	</div>
		</form>
    </div>
