<?php if(!empty($edu_infos)){ ?>
	<h3 class="full_width_in_card heading_c">
        Your education info
    </h3>
	<div class="uk-width-medium-1-1">
		<div class="md-card">
			<div class="md-card-content">
				<?php foreach($edu_infos as $edu_info) { ?>
	        	<div class="uk-accordion" data-uk-accordion>
	                <h3 class="uk-accordion-title" id="accordion_title_<?php echo $edu_info['id']; ?>"><?php echo $edu_info['level_of_education']; ?><span data-edu_id="<?php echo $edu_info['id']; ?>" title="edit info" class="menu_icon uk-icon-pencil-square edit-education" style="float: right;padding: 4px;"></span><span data-edu_del_id="<?php echo $edu_info['id']; ?>" title="Delete info" class="menu_icon uk-icon-trash delete-education" style="float: right;padding: 4px;"></span></h3>
	                <div class="uk-accordion-content">
	                    <div class="uk-grid uk-grid-divider uk-animation-slide-left" data-uk-grid-margin  id="view_job_div_<?php echo $edu_info['id']; ?>">
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
	                                        <span class="md-list-heading">ID Card No. (optional)</span>
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
	            <?php } ?>
	        </div>
	    </div>
	</div>
	<?php } ?>