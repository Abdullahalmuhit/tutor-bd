<?php defined('safe_access') or die('Restricted access!'); ?>
<div id="page_content">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar">
                                <?php
                            	if(!empty($profile_pic_info) && $profile_pic_info['profile_pic'] != ''){
                            		if (file_exists(('assets/upload/'.$profile_pic_info['profile_pic']))) { ?>
                                		<img src="<?php echo base_url("assets/upload/".$profile_pic_info['profile_pic']); ?>" />
                                	<?php }else{ ?>
                                		<img src="<?php echo base_url(); ?>assets/panel/img/avatars/user.png" />
                                	<?php }
                            	}else{ ?>
                            		<img src="<?php echo base_url();?>assets/panel/img/avatars/user.png" />
                            	<?php }?>
                            </div>
                            <div class="user_heading_content uk-padding-top-remove">
                                <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate"><?php echo (!empty($user_data))?$user_data->full_name:'Your name'; ?></span>
                                	<?php
                                    	if(!empty($selected_catagory)){
                                    		foreach($selected_catagory as $selected_cat){
                                    				$cat_name[] = $selected_cat->category;
                                    		}
											$cat_name = 'Tutor of '.implode(',', $cat_name);
                                    	} else {
                                    		$cat_name = 'Tutor of ...';
                                    	} ?>
                                    	<span class="sub-heading" id="user_edit_position"><?php echo $cat_name; ?></span>
                                	<!--<span class="sub-heading"><?php echo $user_data->email; ?></span>
                                	<span class="sub-heading"><?php echo $user_data->mobile_no; ?></span>-->
                                </h2>
							</div>
									
                        </div>
                        <div class="user_content">
                            <!-- <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal',active:<?php echo $step; ?>}">
                                <li class="<?php echo ($step == '1')?'':'uk-active'; ?>"><a href="#">Tuition Related Information</a></li>
                                <li class="<?php echo ($step == '1')?'uk-active':''; ?>"><a href="#">Educational Information</a></li>
                                <li class=""><a href="#">Personal Information</a></li>
                            </ul> -->
                            <!-- <ul id="user_profile_tabs_content" class="uk-margin">
                                <li id="tution_info"> -->





                                	<div class="uk-margin-top">
                                    	<h3 class="full_width_in_card heading_c">
                                            Personal Info
                                        </h3>
                                        <div class="uk-grid" data-uk-grid-margin>
	                                        <div class="uk-width-large-1-2">
					                            <ul class="md-list md-list-addon">
					                                <li>
					                                	<div class="md-list-addon-element">
	                                                        <i class="md-list-addon-icon material-icons">&#xE158;</i>
	                                                    </div>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo $user_data->email; ?></span>
					                                        <span class="uk-text-small uk-text-muted">Your E-mail</span>
					                                    </div>
					                                </li>
					                                <li>
					                                	<div class="md-list-addon-element">
	                                                        <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
	                                                    </div>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo $user_data->mobile_no; ?></span>
					                                        <span class="uk-text-small uk-text-muted">Your contact Number</span>
					                                    </div>
					                                </li>
					                            </ul>
					                        </div>
	                                        <div class="uk-width-large-1-2">
					                            <ul class="md-list">
					                                <li>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo (!empty($personal_info))?($personal_info[0]['gender'] == 'Male')?'Male':'Female':'None'; ?></span>
					                                        <span class="uk-text-small uk-text-muted">Your gender</span>
					                                    </div>
					                                </li>
					                                <li>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo (!empty($personal_info))?($personal_info[0]['additional_numbers'])?$personal_info[0]['additional_numbers']:'None':'None'; ?></span>
					                                        <span class="uk-text-small uk-text-muted">Additional Contact Number</span>
					                                    </div>
					                                </li>
					                            </ul>
					                        </div>
				                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                        	<div class="uk-width-large-1-1">
                                        		<ul class="md-list">
					                                <li>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo (!empty($personal_info))?($personal_info[0]['pre_address'] != '')?$personal_info[0]['pre_address']:'None':'None'; ?></span>
					                                        <span class="uk-text-small uk-text-muted">your detail address</span>
					                                    </div>
					                                </li>
					                            </ul>
                                        	</div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                        	<div class="uk-width-large-1-1">
                                        		<ul class="md-list">
					                                <li>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo (!empty($personal_info))?($personal_info[0]['national_id'] != '')?$personal_info[0]['national_id']:'None':'None'; ?></span>
					                                        <span class="uk-text-small uk-text-muted">NID no / Passport no / Birth certificate no</span>
					                                    </div>
					                                </li>
					                            </ul>
                                        	</div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                        	<div class="uk-width-large-1-2">
                                        		<ul class="md-list md-list-addon">
					                                <li>
					                                	<div class="md-list-addon-element">
	                                                        <i class="md-list-addon-icon uk-icon-facebook-official"></i>
	                                                    </div>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo (!empty($personal_info))?($personal_info[0]['fb_link'])?$personal_info[0]['fb_link']:'None':'None'; ?></span>
					                                        <span class="uk-text-small uk-text-muted">your Facebook ID</span>
					                                    </div>
					                                </li>
					                            </ul>
                                        	</div>
                                        	<div class="uk-width-large-1-2">
                                        		<ul class="md-list md-list-addon">
					                                <li>
					                                	<div class="md-list-addon-element">
	                                                        <i class="md-list-addon-icon uk-icon-linkedin-square"></i>
	                                                    </div>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo (!empty($personal_info))?($personal_info[0]['linkedin_link'])?$personal_info[0]['linkedin_link']:'None':'None'; ?></span>
					                                        <span class="uk-text-small uk-text-muted">your Linkedin ID</span>
					                                    </div>
					                                </li>
					                            </ul>
                                        	</div>
                                        </div>

                                        <h3 class="full_width_in_card heading_c">
                                            Parents Information
                                        </h3>
                                        <div class="uk-grid" data-uk-grid-margin>
                                        	<div class="uk-width-large-1-2">
                                        		<ul class="md-list">
					                                <li>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo (!empty($personal_info))?($personal_info[0]['fathers_name'])?$personal_info[0]['fathers_name']:'None':'None'; ?></span>
					                                        <span class="uk-text-small uk-text-muted">Your father name</span>
					                                    </div>
					                                </li>
					                            </ul>
                                        	</div>
                                        	<div class="uk-width-large-1-2">
                                        		<ul class="md-list">
					                                <li>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo (!empty($personal_info))?($personal_info[0]['fathers_phone'])?$personal_info[0]['fathers_phone']:'None':'None'; ?></span>
					                                        <span class="uk-text-small uk-text-muted">Your father mobile no.</span>
					                                    </div>
					                                </li>
					                            </ul>
                                        	</div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                        	<div class="uk-width-large-1-2">
                                        		<ul class="md-list">
					                                <li>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo (!empty($personal_info))?($personal_info[0]['mothers_name'])?$personal_info[0]['mothers_name']:'None':'None'; ?></span>
					                                        <span class="uk-text-small uk-text-muted">Your mother name</span>
					                                    </div>
					                                </li>
					                            </ul>
                                        	</div>
                                        	<div class="uk-width-large-1-2">
                                        		<ul class="md-list">
					                                <li>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo (!empty($personal_info))?($personal_info[0]['mothers_phone']!='')?$personal_info[0]['mothers_phone']:'None':'None'; ?></span>
					                                        <span class="uk-text-small uk-text-muted">Your mother mobile no.</span>
					                                    </div>
					                                </li>
					                            </ul>
                                        	</div>
                                        </div>

                                        <h3 class="full_width_in_card heading_c">
                                            Emergency Contact Info
                                        </h3>
                                        <div class="uk-grid" data-uk-grid-margin>
                                        	<div class="uk-width-large-1-1">
                                        		<ul class="md-list">
					                                <li>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo (!empty($personal_info))?($personal_info[0]['emmergency_contact_name'])?$personal_info[0]['emmergency_contact_name']:'None':'None'; ?></span>
					                                        <span class="uk-text-small uk-text-muted">Your emergency contact name</span>
					                                    </div>
					                                </li>
					                                <li>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo (!empty($personal_info))?($personal_info[0]['emmergency_contact_address'])?$personal_info[0]['emmergency_contact_address']:'None':'None'; ?></span>
					                                        <span class="uk-text-small uk-text-muted">Your emergency contact address</span>
					                                    </div>
					                                </li>
					                            </ul>
                                        	</div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                        	<div class="uk-width-large-1-2">
                                        		<ul class="md-list">
					                                <li>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo (!empty($personal_info))?($personal_info[0]['emmergency_contact_number'] != '')?$personal_info[0]['emmergency_contact_number']:'None':'None'; ?></span>
					                                        <span class="uk-text-small uk-text-muted">Contact no</span>
					                                    </div>
					                                </li>
					                            </ul>
                                        	</div>
                                        	<div class="uk-width-large-1-2">
                                        		<ul class="md-list">
					                                <li>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo (!empty($personal_info))?($personal_info[0]['emmergency_contact_rel'] != '')?$personal_info[0]['emmergency_contact_rel']:'None':'None'; ?></span>
					                                        <span class="uk-text-small uk-text-muted">Relation</span>
					                                    </div>
					                                </li>
					                            </ul>
                                        	</div>
                                        </div>

                                        <h3 class="full_width_in_card heading_c">
                                            Overviews
                                        </h3>
                                        <div class="uk-grid" data-uk-grid-margin>
                                        	<div class="uk-width-large-1-1">
                                        		<ul class="md-list">
					                                <li>
					                                    <div class="md-list-content">
					                                        <span class="md-list-heading"><?php echo (!empty($personal_info))?($personal_info[0]['overview_yourself'] != '')?$personal_info[0]['overview_yourself']:'None':'None'; ?></span>
					                                        <span class="uk-text-small uk-text-muted">Your overview</span>
					                                    </div>
					                                </li>
					                            </ul>
                                        	</div>
                                        </div>






                                	<div class="uk-margin-top" id="education_info_accordin">
                                    	<?php if(!empty($edu_infos)){ ?>
                                    		<h3 class="full_width_in_card heading_c">
                                                Your education info
                                            </h3>
											<div class="uk-width-medium-1-1">
												<div class="md-card">
													<div class="md-card-content">
														<?php foreach($edu_infos as $edu_info) { ?>
											        	<div class="uk-accordion" data-uk-accordion>
											                <h3 class="uk-accordion-title" id="accordion_title_<?php echo $edu_info['id']; ?>"><?php echo $edu_info['level_of_education']; ?></h3>
											                <div class="uk-accordion-content">
											                    <div class="uk-grid uk-grid-divider uk-animation-slide-left" data-uk-grid-margin>
											                    	<div class="uk-width-large-1-2 uk-width-medium-1-2">
											                    		<ul class="md-list">
											                                <li>
											                                    <div class="md-list-content">
											                                        <span class="md-list-heading">Exam / Degree Title</span>
											                                        <span class="uk-text-small uk-text-muted" id="exam_degree_title_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['exam_degree_title'] != '')?$edu_info['exam_degree_title']:'None'; ?></span>
											                                    </div>
											                                </li>
											                                <li>
											                                    <div class="md-list-content">
											                                        <span class="md-list-heading">Institute Name</span>
											                                        <span class="uk-text-small uk-text-muted" id="institute_name_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['institute'] != '')?$edu_info['institute']:'None'; ?></span>
											                                    </div>
											                                </li>
											                                <li>
											                                    <div class="md-list-content">
											                                        <span class="md-list-heading">Result</span>
											                                        <span class="uk-text-small uk-text-muted" id="result_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['result'])?$edu_info['result']:'None'; ?></span>
											                                    </div>
											                                </li>
											                                <li>
											                                    <div class="md-list-content">
											                                        <span class="md-list-heading">Curriculum</span>
											                                        <span class="uk-text-small uk-text-muted" id="curriculum_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['curriculum'] != '')?ucfirst(str_replace("_"," ",$edu_info['curriculum'])):'None'; ?></span>
											                                    </div>
											                                </li>
											                                <li>
											                                    <div class="md-list-content">
											                                        <span class="md-list-heading">Until date</span>
											                                        <span class="uk-text-small uk-text-muted" id="until_date_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['until_date'] != '')?$edu_info['until_date']:'None'; ?></span>
											                                    </div>
											                                </li>
											                            </ul>
											                    	</div>
											                    	<div class="uk-width-large-1-2 uk-width-medium-1-2">
											                    		<ul class="md-list">
											                                <li>
											                                    <div class="md-list-content">
											                                        <span class="md-list-heading">Group</span>
											                                        <span class="uk-text-small uk-text-muted" id="group_name_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['sdg'])?$edu_info['sdg']:'None'; ?></span>
											                                    </div>
											                                </li>
											                                <li>
											                                    <div class="md-list-content">
											                                        <span class="md-list-heading">ID Card No</span>
											                                        <span class="uk-text-small uk-text-muted" id="id_card_number_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['id_card_number'] != '')?$edu_info['id_card_number']:'None'; ?></span>
											                                    </div>
											                                </li>
											                                <li>
											                                    <div class="md-list-content">
											                                        <span class="md-list-heading">Year of passing</span>
											                                        <span class="uk-text-small uk-text-muted" id="year_of_passing_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['year_of_passing'] != '')?$edu_info['year_of_passing']:'None'; ?></span>
											                                    </div>
											                                </li>
											                                <li>
											                                    <div class="md-list-content">
											                                        <span class="md-list-heading">From date</span>
											                                        <span class="uk-text-small uk-text-muted" id="from_date_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['from_date'] != '')?$edu_info['from_date']:'None'; ?></span>
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
											            <?php } ?>
											        </div>
											    </div>
											</div>
											<?php } ?>
                                    </div>










                                	<div class="uk-grid" data-uk-grid-margin>
                                		<div class="uk-width-medium-1-1 uk-container-center">
				                            <!-- <ul id="subnav-pill-content-1" class="uk-switcher">
				                            	<li class="uk-active" id="tution_first_step"> -->
				                                    <div class="uk-grid uk-margin-large-bottom" data-uk-grid-margin>
				                                        <div class="uk-width-large-1-1">
				                                            <h4 class="full_width_in_card heading_c">Your selected category info</h4>
				                                            <ul id="filter" class="uk-subnav uk-subnav-pill">
				                                            	<?php $area_hidden = $i = 0; foreach($cateories_class[0] as $category_class){
				                                            		$area_hidden = $cateories_class[0][0]->id;
				                                            	?>
				                                            		<li <?php echo ($i == 0)?'class="uk-active"':''; ?> data-uk-filter="filter-<?php echo $category_class->id; ?>"><a href="#"><?php echo $category_class->category; ?></a></li>
				                                            	<?php $i++; } ?>
												            </ul>
				                                        </div>

				                                        <div class="uk-width-large-1-1 uk-margin-large-right uk-margin-small-left uk-grid-margin uk-visible-large">
					                                        <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-1 uk-margin-large-bottom hierarchical_show" data-uk-grid="{gutter: 20, controls: '#filter'}">
												                <?php $k = 1; foreach($cateories_class[1] as $category_class){
												                	if(in_array($category_class->id, $class_ids)){
												                		$padding_right = '';
												                		if($k%3 == 0){
												                			$padding_right = 'padding-right: 10px;';
												                		}
												                ?>
												                	<div <?php echo ($category_class->parent_id != $area_hidden)?'aria-hidden="true" style="display: none;'.$padding_right.'"':'style="'.$padding_right.'"'; ?> data-uk-filter="filter-<?php echo $category_class->parent_id; ?>">
													                    <div class="md-card">
													                        <div class="md-card-content">
													                            <h3 class="heading_c uk-margin-small-bottom"><?php echo $category_class->category; ?></h3>
													                            <hr class="uk-grid-divider uk-margin-remove">
													                            <?php $i = 1; foreach($classes_sub[1] as $class_sub){
													                            	if(($class_sub->parent_id == $category_class->id) && (in_array($class_sub->id, $sub_ids)))	{

													                            ?>
													                            	<p class="uk-margin-small-bottom"><?php echo $i.'.'.$class_sub->category; ?></p>
													                            <?php
													                            	$i++;}
													                            ?>

													                            <?php  } ?>
													                        </div>
													                    </div>
													                </div>
												                <?php $k++;} } ?>
												            </div>
											            </div>

											            <div class="uk-width-large-1-1 uk-margin-small-left uk-grid-margin uk-visible-small">
					                                        <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-1 uk-margin-large-bottom hierarchical_show" data-uk-grid="{gutter: 20, controls: '#filter'}">
												                <?php $k = 1; foreach($cateories_class[1] as $category_class){
												                	if(in_array($category_class->id, $class_ids)){
												                		$padding_right = 'padding-right: 10px;';
												                ?>
												                	<div <?php echo ($category_class->parent_id != $area_hidden)?'aria-hidden="true" style="display: none;'.$padding_right.'"':'style="'.$padding_right.'"'; ?> data-uk-filter="filter-<?php echo $category_class->parent_id; ?>">
													                    <div class="md-card">
													                        <div class="md-card-content">
													                            <h3 class="heading_c uk-margin-small-bottom"><?php echo $category_class->category; ?></h3>
													                            <hr class="uk-grid-divider uk-margin-remove">
													                            <?php $i = 1; foreach($classes_sub[1] as $class_sub){
													                            	if(($class_sub->parent_id == $category_class->id) && (in_array($class_sub->id, $sub_ids)))	{

													                            ?>
													                            	<p class="uk-margin-small-bottom"><?php echo $i.'.'.$class_sub->category; ?></p>
													                            <?php
													                            	$i++;}
													                            ?>

													                            <?php  } ?>
													                        </div>
													                    </div>
													                </div>
												                <?php $k++;} } ?>
												            </div>
											            </div>

											            <div class="uk-width-large-1-1">
				                                            <h4 class="full_width_in_card heading_c">Your selected location info</h4>
				                                        </div>
				                                        <?php if(!empty($location_info['city'])){ ?>
				                                        <div class="uk-width-large-1-2">
											            	<ul class="md-list">
				                                                <li>
				                                                    <div class="md-list-content">
				                                                        <span class="md-list-heading"><?php echo $location_info['city']; ?></span>
				                                                        <span class="uk-text-small uk-text-muted">Your city</span>
				                                                    </div>
				                                                </li>
				                                             </ul>
											            </div>

											            <?php if($location_info['location'] != '' || $location_info['pref_locs'] != '') { ?>
											            <div class="uk-width-large-1-2">
											            	<ul class="md-list">
				                                                <li>
				                                                    <div class="md-list-content">
				                                                        <span class="md-list-heading"><?php echo $location_info['location']; ?></span>
				                                                        <span class="uk-text-small uk-text-muted">Your location</span>
				                                                    </div>
				                                                </li>
				                                             </ul>
											            </div>

											            <div class="uk-width-large-1-1">
											            	<ul class="md-list">
				                                                <li>
				                                                    <div class="md-list-content">
				                                                        <span class="md-list-heading"><?php echo $location_info['pref_locs']; ?></span>
				                                                        <span class="uk-text-small uk-text-muted">Your preferred location</span>
				                                                    </div>
				                                                </li>
				                                             </ul>
											            </div>
											            <?php } else{ ?>
											            <div class="uk-width-large-1-2">
				                                        	<ul class="md-list md-list-addon">
				                                                <li>
				                                                    <div class="md-list-addon-element">
				                                                        <i class="md-list-addon-icon uk-icon-skype"></i>
				                                                    </div>
				                                                    <div class="md-list-content">
				                                                        <span class="md-list-heading"><?php echo $tution_info[0]['skype_acc']; ?></span>
				                                                        <span class="uk-text-small uk-text-muted">Skype</span>
				                                                    </div>
				                                                </li>
				                                            </ul>
				                                        </div>
				                                        <div class="uk-width-large-1-2">
				                                        	<ul class="md-list md-list-addon">
				                                                <li>
				                                                    <div class="md-list-addon-element">
				                                                        <i class="md-list-addon-icon uk-icon-google-plus"></i>
				                                                    </div>
				                                                    <div class="md-list-content">
				                                                        <span class="md-list-heading"><?php echo $tution_info[0]['google_acc']; ?></span>
				                                                        <span class="uk-text-small uk-text-muted">Google+</span>
				                                                    </div>
				                                                </li>
				                                            </ul>
				                                        </div>
											            <?php } ?>

				                                        <?php } else { ?>

				                                        <?php } ?>


											            <div class="uk-width-large-1-1">
				                                            <h4 class="full_width_in_card heading_c">Where do you want to provide your service?</h4>
				                                        </div>
				                                        <div class="uk-width-large-1-1">
				                                        	<?php if(!empty($tution_info)){ if($tution_info[0]['student_home'] == '1'){ ?>
				                                            <p>
						                                        <input type="checkbox" class="uk-disabled" <?php echo (!empty($tution_info))?($tution_info[0]['student_home'] == '1')?'checked="checked"':'':''; ?> id="student_home" data-md-icheck disabled="disabled" />
						                                        <label for="student_home" class="inline-label">Student Home</label>
						                                    </p>
						                                    <?php } } ?>

						                                    <?php if(!empty($tution_info)){ if($tution_info[0]['my_home'] == '1'){ ?>
						                                    <p>
						                                        <input type="checkbox" <?php echo (!empty($tution_info))?($tution_info[0]['my_home'] == '1')?'checked="checked"':'':''; ?> id="my_home" data-md-icheck disabled="disabled"  />
						                                        <label for="my_home" class="inline-label">My Home</label>
						                                    </p>
						                                    <?php } } ?>

						                                    <?php if(!empty($tution_info)){ if($tution_info[0]['online'] == '1'){ ?>
						                                    <p>
						                                        <input type="checkbox" <?php echo (!empty($tution_info))?($tution_info[0]['online'] == '1')?'checked="checked"':'':''; ?> id="online" data-md-icheck disabled="disabled"  />
						                                        <label for="my_home" class="inline-label">Online</label>
						                                    </p>
						                                    <?php } } ?>
				                                        </div>
				                                        <div class="uk-width-medium-1-1">
		                                                	<div class="uk-grid online_hide" data-uk-grid-margin <?php echo (!empty($tution_info))?($tution_info[0]['online'] != 1)?'style="display: none;"':'':'style="display: none;"'; ?>>
				                                                <div class="uk-width-medium-1-2">
				                                                    <label for="user_edit_uname_control">Skype</label>
				                                                    <input class="md-input" type="text" id="user_edit_skype_control" name="user_edit_skype_control" value="<?php echo (!empty($tution_info))?$tution_info[0]['skype_acc']:''; ?>" />
				                                                </div>
				                                                <div class="uk-width-medium-1-2">
				                                                    <label for="user_edit_position_control">Google+</label>
				                                                    <input class="md-input" type="text" id="user_edit_google_control" name="user_edit_google_control" value="<?php echo (!empty($tution_info))?$tution_info[0]['google_acc']:''; ?>" />
				                                                </div>
				                                            </div>
			                                            </div>
				                                    </div>
				                                 <!-- </li> -->
				                                 <!-- <li id="tution_second_step"> -->
				                                 	<div class="uk-margin-top">
			                                            <h3 class="full_width_in_card heading_c">
			                                                Experience Info
			                                            </h3>
			                                            <div class="uk-grid" data-uk-grid-margin>
			                                                <div class="uk-width-1-1">
			                                                	<label for="tutor_profile_category">Do you have any tutoring experience?</label>
			                                                	<?php if (!empty($tution_info)){ if($tution_info[0]['has_experience'] == '1'){ ?>
		                                                    	<p>
							                                        <input type="radio" <?php echo (!empty($tution_info))?($tution_info[0]['has_experience'] == '1')?'checked="checked"':'':''; ?> class="experience" data-md-icheck disabled="disabled" />
							                                        <label for="yes_experience" class="inline-label">Yes</label>
							                                    </p>
							                                    <?php } } ?>

							                                    <?php if (!empty($tution_info)){ if($tution_info[0]['has_experience'] == '0'){ ?>
							                                    <p>
							                                        <input type="radio" <?php echo (!empty($tution_info))?($tution_info[0]['has_experience'] == '0')?'checked="checked"':'':''; ?> class="experience" data-md-icheck disabled="disabled" />
							                                        <label for="no_experience" class="inline-label">No</label>
							                                    </p>
							                                    <?php } } ?>
			                                                </div>
			                                            </div>
			                                            <br />
			                                            <div class="uk-animation-slide-top" <?php echo (!empty($tution_info))?($tution_info[0]['has_experience'] == '1')?'':'style="display: none;"':''; ?> >
			                                            	<div class="uk-grid" data-uk-grid-margin>
					                                        	<div class="uk-width-large-1-1">
					                                        		<ul class="md-list">
										                                <li>
										                                    <div class="md-list-content">
										                                        <span class="md-list-heading"><?php echo (!empty($tution_info))?($tution_info[0]['total_experience'] !='')?$tution_info[0]['total_experience']:'None':'None'; ?></span>
										                                        <span class="uk-text-small uk-text-muted">Your total experience?</span>
										                                    </div>
										                                </li>
										                            </ul>
					                                        	</div>
					                                        </div>

					                                        <div class="uk-grid" data-uk-grid-margin>
					                                        	<div class="uk-width-large-1-1">
					                                        		<ul class="md-list">
										                                <li>
										                                    <div class="md-list-content">
										                                        <span class="md-list-heading"><?php echo (!empty($tution_info))?($tution_info[0]['experiences'] != '')?$tution_info[0]['experiences']:'None':'None'; ?></span>
										                                        <span class="uk-text-small uk-text-muted">Your tution experience detail</span>
										                                    </div>
										                                </li>
										                            </ul>
					                                        	</div>
					                                        </div>
			                                            </div>
			                                            <h3 class="full_width_in_card heading_c">
			                                                Availability / Salary
			                                            </h3>
			                                            <div class="uk-grid" data-uk-grid-margin>
			                                                <div class="uk-width-large-1-1">
			                                                	<ul class="md-list">
									                                <li>
									                                    <div class="md-list-content">
									                                        <span class="md-list-heading"><?php echo (!empty($tution_info))?($tution_info[0]['available_days'] != '')?$tution_info[0]['available_days']:'None':'None'; ?></span>
									                                        <span class="uk-text-small uk-text-muted">Your available days</span>
									                                    </div>
									                                </li>
									                            </ul>
			                                                </div>
			                                            </div>
			                                            <div class="uk-grid" data-uk-grid-margin>
			                                                <div class="uk-width-large-1-2">
			                                                	<ul class="md-list">
									                                <li>
									                                    <div class="md-list-content">
									                                        <span class="md-list-heading"><?php echo (!empty($tution_info))?($tution_info[0]['available_time_from'] != '')?$tution_info[0]['available_time_from']:'None':'None'; ?></span>
									                                        <span class="uk-text-small uk-text-muted">You available from</span>
									                                    </div>
									                                </li>
									                            </ul>
			                                                </div>
			                                                <div class="uk-width-large-1-2">
			                                                	<ul class="md-list">
									                                <li>
									                                    <div class="md-list-content">
									                                        <span class="md-list-heading"><?php echo (!empty($tution_info))?($tution_info[0]['available_time_to'] != '')?$tution_info[0]['available_time_to']:'None':'None'; ?></span>
									                                        <span class="uk-text-small uk-text-muted">You available to</span>
									                                    </div>
									                                </li>
									                            </ul>
			                                                </div>
			                                            </div>

			                                            <div class="uk-grid" data-uk-grid-margin>
			                                                <div class="uk-width-medium-1-1">
			                                                	<ul class="md-list">
									                                <li>
									                                    <div class="md-list-content">
									                                        <span class="md-list-heading"><?php echo (!empty($tution_info))?($tution_info[0]['expected_fees'] != '')?$tution_info[0]['expected_fees']:'None':'None'; ?></span>
									                                        <span class="uk-text-small uk-text-muted">You expected salary</span>
									                                    </div>
									                                </li>
									                            </ul>
			                                                </div>
			                                            </div>
			                                            <div class="uk-grid" data-uk-grid-margin>
			                                            	<div class="uk-width-medium-1-1">
			                                            		<ul class="md-list">
									                                <li>
									                                    <div class="md-list-content">
									                                        <span class="md-list-heading"><?php echo (!empty($tution_info))?($tution_info[0]['method']!='')?$tution_info[0]['method']:'None':'None'; ?></span>
									                                        <span class="uk-text-small uk-text-muted">Your tution method / style</span>
									                                    </div>
									                                </li>
									                            </ul>
								                            </div>
			                                            </div>
			                                         </div>
				                                 <!-- </li> -->
				                             <!-- </ul> -->
				                             <br />
					                            <!-- <ul class="uk-subnav uk-subnav-pill uk-float-right" data-uk-switcher="{connect:'#subnav-pill-content-1',animation: 'fade'}">
                                					<li class="uk-active switch_back_button" style="display: none;"><a href="#">Back</a></li>
				                                	<li class="uk-active switch_continue_button"><a href="#">View more</a></li>
					                            </ul> -->
				                         </div>
				                      </div>
                                <!-- </li>
                                <li> -->
                                	<?php if(!empty($credential_info)){ ?>
                                		<div id="credential_info_div" class="uk-width-large-1-1">
                                            <h4 class="full_width_in_card heading_c">Credential info</h4>
                                        </div>
                                        <div class="uk-width-1-1" id="cred_message">

							            </div>
                                        <div style="opacity: 1;" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}" id="user_profile_gallery" data-uk-check-display class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid="{gutter: 4}">
                                        	<?php foreach($credential_info as $credential){ ?>
                                        	<div id="credential_<?php echo $credential['id']; ?>">
	                                            <a href="../assets/upload/credential/<?php echo $credential['file_name']; ?>">
	                                                <img style="height: 109px; width: 100%;" src="../assets/upload/credential/<?php echo $credential['file_name']; ?>" alt="<?php echo $credential['name_of_the_credential']; ?>"/>
	                                            </a>
	                                            <p class="uk-text-bold uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 uk-text-left"><?php echo $credential['name_of_the_credential']; ?>
	                                            	<span class="uk-float-right uk-text-right">
	                                            		<i class="material-icons delete_credential" data-credential_id="<?php echo $credential['id']; ?>" style="cursor: pointer; font-size: 22px;">cancel</i>
	                                            	</span>
	                                            </p>
	                                        </div>
	                                        <?php } ?>
                                        </div>
                                	<?php } ?>
                                <!-- </li>
                                <li> -->

                                <!-- </li>
                            </ul> -->
                        </div>
                    </div>
                </div>
                <!-- <div class="uk-width-large-3-10">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_c uk-margin-bottom">Make Your Profile Strong</h3>
                            <div class="uk-grid" data-uk-grid-margin>
			                    <div class="uk-width-large-1-1 uk-width-medium-1-1">
		                            <a class="md-btn md-btn-warning uk-align-center uk-width-medium-1-1" href="#mailbox_new_message" data-uk-modal="{center:true}" >Upload your credential</a>
		                     	</div>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin>
                            	<div class="uk-width-large-1-1 uk-width-medium-1-1">
		                            <a class="md-btn md-btn-primary uk-align-center uk-width-medium-1-1" href="#">Give a test</a>
		                        </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

<div class="uk-modal" id="mailbox_new_message">
    <div class="uk-modal-dialog">
        <button class="uk-modal-close uk-close" type="button"></button>

            <div class="uk-modal-header">
                <h3 class="uk-modal-title">Upload credentials</h3>
            </div>
            <div class="uk-width-1-1" id="message">

            </div>
            <input type="hidden" name="file_name" id="file_name" />
            <div class="uk-margin-medium-bottom">
                <label for="mail_new_to">Name of the Credential</label>
                <input type="text" class="md-input" name="name_of_the_credential" id="name_of_the_credential" />
            </div>

            <div id="credential_file_upload-drop" class="uk-file-upload">
            	<div class="uk-grid" data-uk-grid-margin>
                	<div class="uk-width-medium-1-2">
            			<p class="uk-text uk-text-left">1.SSC/O Level Marksheets/certificates</p>
            			<p class="uk-text uk-text-left">2.HSC/A Level Marksheets/certificates</p>
            			<p class="uk-text uk-text-left">3.NID OR Passport </p>
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
                <a class="uk-float-right md-btn md-btn-primary btnup upload_credential_button" href="javascript:void(0)" id="upload_credential_button"  style="padding: 10px 25px;">Send</a>
            </div>

            <div class="uk-text uk-credential_inst">
	            <span>Note: In case you don't have the scanner you can take the pictures by your smartphone to upload them.
	Make sure file size will not more than 5 MB. You can’t upload more than 4 credentials.</span>
	        </div>

    </div>
</div>
