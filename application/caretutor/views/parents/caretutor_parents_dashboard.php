<?php defined('safe_access') or die('Restricted access!'); ?>
<style type="text/css">
    @media (max-width: 480px) {
        .uk-width-small-1-3, .uk-width-small-2-3{
          width: auto;
        }
    }
</style>
<div id="page_content">
    <div id="page_content_inner">
        <?php if ($this->session->userdata('gretings')) { ?>
            <div class="uk-alert uk-alert-success uk-text-bold uk-text-center"> You have successfully posted your tutor requirements. Best matched tutor profile coming soon. Thank you for choosing our platform. </div>
        <?php } ?>

        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
            <div class="uk-width-xLarge-2-10 uk-width-large-3-10">
                <div class="md-card">
                    <div class="md-card-toolbar toolbar_blue">
                        <h3 class="md-card-toolbar-heading-text">
                            Job Details
                        </h3>
                    </div>
                    <div class="md-card-content">
                        <div class="uk-grid uk-grid-divider uk-grid-medium">

                            <div class="uk-width-large-1-1 uk-text-center uk-text-muted">
                                <ul style="display: none;" data-uk-switcher="{connect:'#my-id, #my-id-two', animation: 'slide-horizontal'}">
                                    <?php
                                    $i = 0;
                                    $j = count($jobs);
                                    for ($i; $i <= $j; $i++) {
                                        ?>
                                        <li><a href=""><?php echo $i; ?></a></li>
                                    <?php } ?>
                                </ul>
                                <ul id="my-id" class="uk-switcher">
                                    <?php
                                    $i = 0;
                                    $j = count($jobs);
                                    foreach ($jobs as $job) {
                                        $k = $i;
                                        ?>
                                        <li>

                                            <div>
                                                <?php
                                                echo "<p style='margin: 0px 0 5px 0 !important;opacity:0.7;'>Job ID " . $job->id . "</p>";
                                                echo "<p style='margin: 5px 0 5px 0 !important; color: #1f2c44; font-weight: bold; font-size: 20px;'>Need a tutor for " . $job->sub_cat . " </p>";

                                                 echo "<p style='margin: 5px 0 5px 0 !important; opacity: 0.7;'>Posted On &nbsp; " . $job->upd . " </p>";

                                                echo '<span><a href="' . base_url('parents/view_job/' . $job->id) . '">
		                                	                  	<span class="uk-badge uk-badge-success uk-badge-square-edge" style="padding: 10px 40px !important; font-size: 13px !important; margin-right: 5px; margin-bottom:15px;">
		                                	                    	View
		                                	                    </span>
		                                	                  </a>
		                                	                  ';
                                                ?>

                                                <?php
                                                if ($job->status == 'post') {
                                                    echo '<a href="' . base_url('parents/job_edit/' . $job->id) . '">
		                                	                  	<span class="uk-badge uk-badge-success uk-badge-square-edge" style="padding: 10px 40px !important; font-size: 13px !important; margin-left: 5px; margin-bottom:15px;">
		                                	                    	&nbsp;Edit&nbsp;
		                                	                    </span>
		                                	                  </a></span>';
                                                }
                                               echo '<br><br>';
                                                ?>

                                                <?php
                                                if ($job->status == 'post') {
                                                    $status = '<span class="uk-badge uk-badge-muted uk-badge-square-edge" style="border-radius: 30px;height: 10px;width: 2px;"><p style="opacity: 0; margin-bottom: 0px !important;">0</p></span>&nbsp;Reviewing';
                                                } elseif ($job->status == 'complete') {
                                                    $status = '<span class="uk-badge uk-badge-danger uk-badge-square-edge" style="border-radius: 30px;height: 10px;width: 2px;"><p style="opacity: 0; margin-bottom: 0px !important;">0</p></span>&nbsp; Completed';
                                                } else {
                                                    $status = '<span class="uk-badge uk-badge-success uk-badge-square-edge" style="border-radius: 30px;height: 10px;width: 2px;"><p style="opacity: 0; margin-bottom: 0px !important;">0</p></span>&nbsp; On board';
                                                }
                                                echo $status;
                                                echo '<br><br>';
                                                ?>

                                                  <div class="uk-float-left" style="margin-left: 50px;"><i style="cursor: pointer;" class="uk-icon-chevron-left" <?php echo ($i == 0) ? '' : 'data-uk-switcher-item="' . ($k - 1) . '"'; ?>></i></div>
                                            <div class="uk-float-right" style="margin-right: 50px"><i style="cursor: pointer;" class="uk-icon-chevron-right" <?php echo ($i == ($j - 1)) ? '' : 'data-uk-switcher-item="' . ($k + 1) . '"'; ?>></i></div>

                                            <?php  echo  ($i + 1) . "/" . $j ; echo '<br>';?>

                                                <hr class="uk-grid-divider uk-hidden-large">
                                            </div>
                                        </li>
                                        <?php $i++;
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div><!-- Till here -->
                </div>
                <a class="md-btn md-btn-success uk-margin-medium-top uk-margin-medium-bottom uk-float-right uk-width-1-1" href="#mailbox_new_message" data-uk-modal="{center:true}">Post Another Tuition Jobs</a>

               <!--  <a class="md-btn md-btn-default uk-margin-medium-top uk-margin-medium-bottom uk-float-right uk-width-1-1" href="javascript:void(0)">Contact us <i class="uk-icon-mobile"></i> 01756 441122</a> -->
            </div>

            <div class="uk-width-xLarge-8-10  uk-width-large-7-10">
                <div class="md-card">
                    <div class="md-card-toolbar toolbar_blue">
                        <h3 class="md-card-toolbar-heading-text">
                            Tutor's Profile
                        </h3>
                    </div>
                    <div class="md-card-content" id="tutor_cv_list">
                        <div id="select_tutor_message">

                        </div>

                        <ul id="my-id-two" class="uk-switcher uk-width-1-1">
                            <?php
                            $i = 1;
                            $j = count($jobs);
                            foreach ($jobs as $job) {
                                    $k = $i;
                                    $cv_lists = $cvs[$job->id];
                                    $selected_tutor = $selected[$job->id];
                                    ?>
                                    <li class="uk-width-1-1">
                                        <div class="uk-grid uk-grid-medium uk-grid-width-medium-1-2 uk-grid-width-large-1-3" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}">
                                            <?php
                                            if (!empty($cv_lists)) {
                                                $l = 0;
                                                foreach ($cv_lists as $cv_list) {
                                                    $selected_header = 'head_blue';
                                                    $selected_text = '';
                                                    if ($cv_list->job_tutor_status == 'Selected') {
                                                        $selected_text = '<a class="md-btn md-btn-success uk-float-right uk-width-1-1" >
                                                                    Selected
                                                                </a>';
                                                        $selected_header = 'head_blue';
                                                    } elseif ($cv_list->job_tutor_status == 'Appointed') {
                                                        $selected_header = 'head_blue';
                                                        $selected_text = '<a class="md-btn md-btn-success uk-float-right uk-width-1-1" >
                                                                    Appointed
                                                                </a>';
                                                    } elseif ($cv_list->job_tutor_status == 'Rejected') {
                                                        $selected_header = 'head_blue';
                                                        $selected_text = '<a class="md-btn md-btn-success uk-float-right uk-width-1-1" >
                                                                    Rejected
                                                                </a>';
                                                    } elseif ($cv_list->job_tutor_status == 'Assign') {
                                                        $selected_header = 'head_blue';
                                                        $selected_text = '<a class="md-btn md-btn-success uk-float-right uk-width-1-1" >
                                                                    Confirmed
                                                                </a>';
                                                    }
                                                    ?>
                                                    <div class="uk-width-medium-1-2 uk-width-large-1-3 uk-margin-small-bottom <?php echo (($l == 0) || ($l == 3)) ? 'uk-margin-small-left' : ''; ?>" <?php echo (($l == 1) || ($l == 2) || ($l == 4)) ? 'style="margin-left: -5px;"' : ''; ?>>
                                                        <div class="md-card">
                                                            <div class="md-card-head <?php echo $selected_header; ?>" style="padding: 10px;">
                                                                <div class="md-card-head-menu" data-uk-dropdown>
                                                                    <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                                                                    <div class="uk-dropdown uk-dropdown-small uk-dropdown-flip">
                                                                        <ul class="uk-nav">
                <?php ?>
                                                                            <li><a href="javascript:void(0)" class="select_tutor_from_cv" data-job_id="<?php echo $job->id; ?>" data-tutor_id="<?php echo $cv_list->id; ?>">Select tutor</a></li>
                                                                            <li><a target="_blank" href="<?php echo base_url('parents/tutor_profile_view/' . $cv_list->id . '/' . $job->id); ?>" >View tutor</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="uk-width-small-1-3" style="float: left;">
                                                                    <?php

                                                                    if ($cv_list->profile_pic != '') {
                                                                        if (!empty($cv_list->profile_pic)) {
                                                                            ?>
                                                                            <img style="width: 60px; height: 60px;" class="md-card-head-avatar" src="<?php echo base_url("assets/upload/" . $cv_list->profile_pic); ?>" />
                                                                        <?php } else { ?>
                                                                            <img style="width: 60px; height: 60px;" class="md-card-head-avatar" src="<?php echo base_url(); ?>assets/panel/img/avatars/user.png" />
                                                                        <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <img style="width: 60px; height: 60px;" class="md-card-head-avatar" src="" />
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="uk-width-small-2-3" style="padding: 21px 0 0 10px;float: left;">
                                                                    <?php echo "<p style='font-size:14px;color:#fff;margin-bottom:0;'>Tutor ID : " . $cv_list->id . '</p>';?>
                                                                    <?php echo "<h3 class='md-card-head-text'>".$cv_list->full_name; ?>
                                                                     <?php

                                                                        if ($cv_list->is_verified == 1) {
                                                                            ?>&nbsp;<i style="color: #fff !important" class="uk-icon-check-circle uk-text-primary" data-parsley-trigger="keyup" data-uk-tooltip="{pos:'right'}" title="Verified"></i>&nbsp;<?php }
                                                                        ?>
                                                                    </h3>
                                                                    <?php if ($cv_list->cv_status == 'completed') { ?>

                                                                    <?php } else { ?>
                                                                        <a class="md-btn md-btn-success" style="padding: 7px 20px; font-size: 14px;" href="<?php echo base_url('parents/tutor_profile_view/' . $cv_list->id . '/' . $job->id); ?>" target="_blank">
                                                                            View Profile
                                                                        </a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="md-card-content">
                                                                <ul class="md-list border_zero">
                                                                    <li>
                                                                        <div class="md-list-content">
                                                                            <span class="md-list-heading">Current Institute</span>
                                                                            <span class="uk-text-small uk-text-muted"><?php echo $cv_list->institute; ?></span>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="md-list-content">
                                                                            <span class="md-list-heading">Experience</span>
                                                                            <span class="uk-text-small uk-text-muted"><?php echo $cv_list->experiences; ?></span>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="md-list-content">
                                                                            <span class="md-list-heading">Requirement Matched</span>
                                                                            <span class="uk-text-small uk-text-muted"><?php echo ($cv_list->step_no * 2) . '0%'; ?></span>
                                                                        </div>
                                                                    </li>


                                                                        <?php if ($selected_text != '') { ?>
                                                                        <li>
                                                                            <div class="md-list-content" style="position: absolute; width: 100%; left: 0; bottom: 0;">
                                                                        <?php echo $selected_text; ?>
                                                                            </div>
                                                                        </li>
                                                                        <?php } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $l++;
                                                }
                                            } else {
                                                ?>
                                                <img src="" style="width: 100%;" />
                                    <?php } ?>
                                        </div>
                                    </li>
                                    <?php
                                    $i++;
                                    } ?>
                        </ul>

                    </div>
                </div>
            </div>



        </div>
    </div>
</div>


<!-- <div class="md-fab-wrapper">
<a class="md-fab md-fab-accent" href="#mailbox_new_message" data-uk-modal="{center:true}">
    <i class="material-icons">&#xE145;</i>
</a>
</div> -->

<div class="uk-modal" id="mailbox_new_message">
    <div class="uk-modal-dialog">
        <button class="uk-modal-close uk-close" type="button"></button>
        <form method="post" id="job_add_form" class="uk-form-stacked new_job_add">
            <input type="hidden" value="1" name="step" id="step" />
            <div id="req_step_one">
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">New Requirements</h3>
                </div>

                <div class="uk-form-row">
                    <label for="selcity" class="uk-form-label">City</label>
                    <select class="selcity" id="selcity" name="selcity" data-md-selectize >
                        <option value="">Select One</option>
                        <?php
                        foreach ($city as $cit) {
                            ?>
                            <option value="<?php echo ($cit->city == 'Select City') ? '' : $cit->id; ?>"><?php echo $cit->city; ?></option>
    <?php
}
?>
                    </select>
                </div>

                <div class="uk-form-row">
                    <label for="selcity" class="uk-form-label">Location</label>
                    <div class="location_dropdown">
                        <select id="sellocation" class="sellocation" name="sellocation" data-md-selectize>
                            <option value="">Select Location</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label for="selcat" class="uk-form-label">Category</label>
                    <select id="selcat" name="selcat" class="selcat" data-md-selectize >
                        <option value="">Select One</option>
                        <?php
                        foreach ($category as $cat) {
                            ?>
                            <option value="<?php echo ($cat->category == 'Select Category') ? '' : $cat->id; ?>"><?php echo $cat->category; ?></option>
    <?php
}
?>
                    </select>
                </div>

                <div class="uk-form-row">
                    <label for="selsubcat" class="uk-form-label">Class / Course</label>
                    <div class="sub_category_dropdown">
                        <select id="selsubcat" class="selsubcat" name="selsubcat" data-md-selectize >
                            <option value="">Select Class/Course</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label for="selstgender" class="uk-form-label">Student Gender</label>
                    <div class="selstgender_dropdown">
                        <select id="selstgender" class="selstgender" name="selstgender" data-md-selectize >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label for="institute_name" class="uk-form-label">Institute Name</label>
                    <input type="text" class="md-input" id="institute_name" name="institute_name" placeholder="Institute Name"/>
                </div>
            </div>

            <div id="req_step_two" style="display: none;">

                <div class="subject_show">

                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="subject">Curriculum: </label>
                    <div id="english_medium" style="display: none;">
                        <p>
                            <input type="radio" name="english_medium_from" id="Cambridge" value='cambridge' data-md-icheck />
                            <label for="Cambridge" class="inline-label">Cambridge</label>
                        </p>

                        <p>
                            <input type="radio" name="english_medium_from" id="Ed-excel" value='ed_excel' data-md-icheck />
                            <label for="Ed-excel" class="inline-label"> Ed-excel </label>
                        </p>

                        <p>
                            <input type="radio" name="english_medium_from" id="IB" value='ib' data-md-icheck />
                            <label for="IB" class="inline-label"> IB </label>
                        </p>
                    </div>

                    <div id="bangla_medium" style="display: none;">
                        <p>
                            <input type="radio" name="bangla_medium_from" id="Bangla version" value='bangla_version' data-md-icheck />
                            <label for="Bangla version" class="inline-label"> Bangla version </label>
                        </p>

                        <p>
                            <input type="radio" name="bangla_medium_from" id="English version" value='english_version' data-md-icheck />
                            <label for="English version" class="inline-label"> English version </label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label for="selgender" class="uk-form-label">Tutor gender reference</label>
                    <select id="selgender" name="selgender" class="selgender" data-md-selectize>
                        <option value="">Tutor gender reference</option>
                        <option value="Any">Any</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="uk-form-row">
                    <label for="selday" class="uk-form-label">Days in a week</label>
                    <select id="selday" name="selday" class="selday" data-md-selectize>
                        <option value="">Days in a week</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </div>

                <div class="uk-form-row">
                    <label for="tutoring_time" class="uk-form-label">Tutoring Time</label>
                    <input type="text" class="md-input" id="tutoring_time" name="tutoring_time" data-uk-timepicker="{format:'12h'}" placeholder="Tutoring Time"/>
                </div>

                <div class="uk-form-row">
                    <label for="salary_range" class="uk-form-label">Salary</label>
                    <input type="number" class="md-input" id="salary_range" name="salary" placeholder="Salary range"/>
                </div>

                <div class="uk-form-row">
                    <label for="date_to_hire" class="uk-form-label">Hire Date</label>
                    <input class="md-input" name="date_to_hire" type="text" id="date_to_hire" data-uk-datepicker="{format:'DD.MM.YYYY'}"  />
                </div>

                <div class="uk-form-row" id="skype_id_div" style="display: none;">
                    <label for="name"></label>
                    <input type="text" class="md-input" id="skype_id" name="skype_id" placeholder="Please provide your Skype ID" >
                </div>

                <div class="uk-form-row">
                    <label for="select_city" class="uk-form-label">Details address</label>
                    <textarea name="address" id="address" cols="30" rows="6" class="md-input" ></textarea>
                </div>

                <div class="uk-form-row">
                    <label for="selday" class="uk-form-label">No of students</label>
                    <select id="selday" name="selday" class="selday" data-md-selectize>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>

                <div class="uk-form-row">
                    <label for="selday" class="uk-form-label">How did you hear about us</label>
                    <select id="selhear" name="selhear" data-md-selectize>
                        <!-- <option value="0">How did you hear about us?</option> -->
                        <option value="1">From Friends & Family</option>
                        <option value="2">From Facebook</option>
                        <option value="3">From Google</option>
                        <option value="4">From Shop</option>
                        <option value="5">Others</option>
                    </select>
                </div>
                <div class="uk-form-row">
                    <label for="select_city" class="uk-form-label">More about your  requirement</label>
                    <textarea name="otherreq" id="otherreq" cols="30" rows="6" class="md-input" data-uk-tooltip="{pos:'bottom'}" title="Describe elaborately if you <br/>select multiple students."></textarea>
                </div>
            </div>

            <div class="uk-modal-footer" style="margin-top: 20px;">
                <div class="uk-form-row">
                    <button type="submit" class="uk-float-right md-btn md-btn-primary" id="submit_form">Continue</button>
                    <button type="button" id="back_to_first_form" class="uk-float-left md-btn md-btn-success" style="display: none;">Back</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->session->unset_userdata('gretings'); ?>
<style>
    .uk-datepicker{
        z-index: 2094;
    }
</style>
