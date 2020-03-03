<div id="page_content">
    <div id="page_content_inner">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="user_heading">
                        <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                <?php
                                if (!empty($profile_pic_info) && $profile_pic_info['profile_pic'] != '') { ?>
                                    <img src="<?php echo base_url("assets/upload/" . $profile_pic_info['profile_pic']); ?>" />
                                <?php } else {
                                    ?>
                                    <img src="<?php echo base_url(); ?>assets/panel/img/avatars/user.png" />
<?php } ?>
                            </div>
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
                            <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"><?php echo (!empty($user_data)) ? $user_data->full_name : 'Your name'; ?></span>
                                <span class="sub-heading"><?php echo round($review->review, 1) ?> <i style="color: #fff" class="uk-icon-star"></i></span>
                                <?php
                                if (!empty($selected_catagory)) {
                                    foreach ($selected_catagory as $selected_cat) {
                                        $cat_name[] = $selected_cat->category;
                                    }
                                    $cat_name = 'Tutor of ' . implode(',', $cat_name);
                                } else {
                                    $cat_name = 'Tutor of ...';
                                }
                                ?>
                                <span class="sub-heading">Profile Completed: <?php echo (!empty($user_data))?$user_data->profile_percentage:'0'; ?>%, <?php echo $cat_name; ?></span>
                                <!-- <span class="sub-heading" id="user_edit_position"><?php echo $cat_name; ?></span> -->
                            </h2>
                        </div>
                        <!--<button type="submit" class="md-fab md-fab-small md-fab-success" id="user_edit_submit">
                            <i class="material-icons">&#xE161;</i>
                        </button>-->
                    </div>
                    <div class="md-card-content">
                        <ul class="md-list border_zero">
                            <li>
                                <div class="md-list-content">
                                    <div class="uk-float-right">
                                       <!--<b><?php echo count($applied_job_info); ?></b> -->
                                        <a class="md-btn md-btn-success uk-float-right" style="padding: 10px 25px;" href="#applied_jobs_list" data-uk-modal="{center:true}">View</a>&nbsp;&nbsp;
                                        <?php if (count($applied_job_info) > 0) { ?>
                                            <span class="uk-badge uk-badge-primary uk-badge-notification uk-float-left uk-margin-right uk-margin-small-top uk-text-bold uk-text-center"><?php echo count($applied_job_info); ?></span>
                                        <?php } else { ?>
                                            <span class="uk-badge uk-badge-danger uk-badge-notification uk-float-left uk-margin-right uk-margin-small-top uk-text-bold uk-text-center"><?php echo count($applied_job_info); ?></span>
<?php } ?>
                                    </div>
                                    <span class="md-list-heading">Number of applied tutoring jobs</span>
                                </div>
                            </li>
                            <li>
                                <div class="md-list-content">
                                    <div class="uk-float-right">
                                        <a class="md-btn md-btn-success uk-float-right" style="padding: 10px 25px;" href="#assigned_jobs_list" data-uk-modal="{center:true}">View</a>&nbsp;&nbsp;
                                        <?php if (count($assigned_jobs) > 0) { ?>
                                            <span class="uk-badge uk-badge-primary uk-badge-notification uk-float-left uk-margin-right uk-margin-small-top uk-text-bold uk-text-center"><?php echo count($assigned_jobs); ?></span>
                                        <?php } else { ?>
                                            <span class="uk-badge uk-badge-danger uk-badge-notification uk-float-left uk-margin-right uk-margin-small-top uk-text-bold uk-text-center"><?php echo count($assigned_jobs); ?></span>
<?php } ?>
                                    </div>
                                    <span class="md-list-heading">Contact detail of student</span>
                                </div>
                            </li>

                            <?php
                            $update_time = array();
//                            $tution = $education = $personal = $credential = $test = 0;
//                            if (!empty($tution_info)) {
//                                array_push($update_time, $tution_info[0]['updated_at']);
//                                $tution = 20;
//                            }
//                            if (!empty($edu_infos)) {
//                                foreach ($edu_infos as $edu_info) {
//                                    array_push($update_time, $edu_info['updated_at']);
//                                }
//                                $education = 20;
//                            }
//                            if (!empty($personal_info)) {
//                                array_push($update_time, $personal_info[0]['updated_at']);
//                                $personal = 20;
//                            }
//                            if (!empty($credential_info_count)) {
//                                //$credential = 20;
//                                $credential = 0;
//                                for ($i = 1; $i <= $credential_info_count; $i++) {
//                                    $credential = $i * 5;
//                                }
//                            }
//                            if ($exam_result > 0) {
//                                $test = 20;
//                            }
//                            $completed = $tution + $education + $personal + $credential + $test;
                            $tution = $education = $personal = $credential = $test = 0;
                            $name = $father_info = $mother_info = $overview = $email = $contact_num = $additional_num = $gender = $social_link = $det_address = $emergency_contact = $nid = $hons = $hsc = $ssc = $edus = $availability = $salary_range = $tution_style = $tution_cat = $tution_cls = $pref_sub = $city = $location = $pref_location = $tution_place = $tution_exp = $total_exp = $tution_exp_det = $pro_pic = 0;

                            if (!empty($tution_info)) {
                                //$tution = 20;
                                foreach ($tution_info as $tutions) {
                                    array_push($update_time, $tution_info[0]['updated_at']);
                                    if (!empty($tutions['expected_fees'])) {
                                        $salary_range = 2.5;
                                    }
                                    if (!empty($tutions['method'])) {
                                        $tution_style = 3;
                                    }
                                    if (!empty($tutions['has_experience'])) {
                                        $tution_exp = 2;
                                    }
                                    if (!empty($tutions['total_experience'])) {
                                        $total_exp = 2;
                                    }
                                    if (!empty($tutions['experiences'])) {
                                        $tution_exp_det = 3;
                                    }
                                    if (!empty($tutions['available_days']) || !empty($tutions['available_time_from']) || !empty($tutions['available_time_to'])) {
                                        $availability = 2;
                                    }
                                    if (!empty($tutions['student_home']) || !empty($tutions['my_home']) || !empty($tutions['online'])) {
                                        $tution_place = 2;
                                    }
                                }
                            }

                            if (!empty($location_info)) {
                                if (!empty($location_info['city'])) {
                                    $city = 2;
                                }
                                if (!empty($location_info['location'])) {
                                    $location = 2;
                                }
                                if (!empty($location_info['pref_locs'])) {
                                    $pref_location = 2;
                                }
                            }
                            if (!empty($cateories_class)) {
                                $tution_cat = 2;
                            }
                            if (!empty($classes_sub)) {
                                $tution_cls = 2;
                            }
                            if (!empty($cateories_class)) {
                                $pref_sub = 2;
                            }
                            if (!empty($profile_pic_info)) {
                                $pro_pic = 2.5;
                            }
                            if (!empty($user_data)) {
                                if (!empty($user_data->mobile_no)) {
                                    $contact_num = 2.5;
                                }
                                if (!empty($user_data->email)) {
                                    $email = 2.5;
                                }
                                if (!empty($user_data->full_name)) {
                                    $name = 2.5;
                                }
                            }
                            if (!empty($edu_infos)) {
                                //$education = 20;

                                foreach ($edu_infos as $edu) {
                                    array_push($update_time, $edu['updated_at']);
                                    if ($edu['level_of_education'] == "Bachelor/Honors") {
                                        $hons = 4;
                                    }
                                    if ($edu['level_of_education'] == "Secondary") {
                                        $ssc = 4;
                                    }
                                    if ($edu['level_of_education'] == "Higher Secondary") {
                                        $hsc = 4;
                                    }
                                    $edus = $hons + $ssc + $hsc;
                                }
                            }
                            if (!empty($personal_info)) {
                                //$personal = 20;
                                array_push($update_time, $personal_info[0]['updated_at']);
                                foreach ($personal_info as $per_info) {
                                    if (!empty($per_info['fathers_name']) || !empty($per_info['fathers_phone'])) {
                                        $father_info = 2.5;
                                    }
                                    if (!empty($per_info['mothers_name']) || !empty($per_info['mothers_phone'])) {
                                        $mother_info = 2.5;
                                    }
                                    if (!empty($per_info['overview_yourself'])) {
                                        $overview = 3;
                                    }
                                    if (!empty($per_info['additional_numbers'])) {
                                        $additional_num = 2.5;
                                    }
                                    if (!empty($per_info['gender'])) {
                                        $gender = 2.5;
                                    }
                                    if (!empty($per_info['pre_address'])) {
                                        $det_address = 3;
                                    }
                                    if (!empty($per_info['fb_link']) || !empty($per_info['linkedin_link'])) {
                                        $social_link = 2.5;
                                    }
                                    if (!empty($per_info['emmergency_contact_name']) || !empty($per_info['emmergency_contact_number'])) {
                                        $emergency_contact = 2.5;
                                    }
                                    if (!empty($per_info['identity'])) {
                                        $nid = 2.5;
                                    }
                                }
                            }

                            if (!empty($credential_info_count)) {
                                //$credential = 20;
                                $credential = 0;
                                for ($i = 1; $i <= $credential_info_count; $i++) {
                                    $credential = $i * 4;
                                }
                            }
                            if ($exam_result > 0) {
                                $test = 10;
                            }
                            $completed = $name + $pro_pic + $father_info + $contact_num + $email + $availability + $tution_exp + $tution_exp_det + $total_exp + $tution_place + $location + $city + $pref_location + $tution_style + $tution_cat + $tution_cls + $pref_sub + $salary_range + $emergency_contact + $edus + $nid + $social_link + $det_address + $additional_num + $gender + $mother_info + $overview + $tution + $education + $personal + $credential + $test;
                            ?>

                            <li>
                                <div class="md-list-content">
                                    <div class="uk-float-right">
<?php echo ($update_time) ? (max($update_time)) : ''; ?>
                                    </div>
                                    <span class="md-list-heading">Profile last updated on</span>
                                </div>
                            </li>


                            <li>
                                <div class="md-list-content">
                                    <div class="uk-float-right uk-panel uk-panel-box uk-panel-box-primary uk-padding-remove"  style="width: 30%;">
                                        <div class="uk-progress">
                                            <div class="uk-progress-bar" style="width: <?php echo $user_data->profile_percentage; ?>%;"><?php echo $user_data->profile_percentage; ?>%</div>
                                        </div>
                                    </div>
                                    <span class="md-list-heading">Profile Percentage</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--  <div class="uk-width-large-3-10">
                 <div class="md-card">
                     <div class="md-card-content">
                         <h3 class="heading_c uk-margin-bottom text_center">Make Your Profile Strong</h3>
                         <div class="uk-grid" data-uk-grid-margin>
                             <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                 <a class="md-btn md-btn-warning uk-align-center uk-width-medium-1-1" href="#mailbox_new_message" data-uk-modal="{center:true}" >Upload your credential</a>
                             </div>
                         </div>
                         <div class="uk-grid" data-uk-grid-margin>
                             <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                 <a class="md-btn md-btn-primary uk-align-center uk-width-medium-1-1" href="#give_a_test" data-uk-modal="{center:true}" >Give a test</a>
                             </div>
                         </div>
                         <div class="uk-grid" data-uk-grid-margin>
                             <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                 <a class="md-btn md-btn-danger uk-width-medium-1-1" href="#upload_instructions" data-uk-modal="{center:true}" >Photo Upload Instruction</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div> -->


            <!-- <div class="uk-width-large-3-10">
                <div class="md-card">
                    <div class="md-card-content" style="padding: 0 0 16px;">
                        <h3 class="heading_c uk-margin-bottom text_center" style="padding: 15px 10px; font-size: 1.125em; background-color: #0675c1; color: #fff;">Make Your Profile Strong</h3>
                        <div class="uk-grid" data-uk-grid-margin style="padding:0 25px 0 15px;">
                            <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                <a class="md-btn md-btn-warning uk-align-center uk-width-medium-1-1" href="#mailbox_new_message" data-uk-modal="{center:true}" >Upload Your Credential</a>
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin style="padding:0 25px 0 15px;">
                            <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                <a class="md-btn md-btn-success uk-align-center uk-width-medium-1-1" href="<?php echo base_url('quizes/load_quizes'); ?>" >Give A test</a>
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin style="padding:0 25px 0 15px;">
                            <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                <a class="md-btn md-btn-danger uk-width-medium-1-1" href="#upload_instructions" data-uk-modal="{center:true}" >Photo Upload Instruction</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!--div class="uk-modal" id="mailbox_new_message">
    <div class="uk-modal-dialog">
        <button class="uk-modal-close uk-close" type="button"></button>

        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Upload Credentials</h3>
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
            <a class="uk-float-right md-btn md-btn-primary btnup upload_credential_button" style="padding: 10px 25px;" href="javascript:void(0)" id="upload_credential_button">Send</a>
        </div>

        <div class="uk-text uk-credential_inst">
            <span>Note: In case you don't have the scanner you can take the pictures by your smartphone to upload them.
                Make sure file size will not more than 5 MB. You can’t upload more than 4 credentials.</span>
        </div>

    </div>
</div>-->
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
            <img src="<?php echo base_url(); ?>assets/img/male.png" />
            <h3 class="uk-modal-title">Do & Don't Examples (Female)</h3>
            <img src="<?php echo base_url(); ?>assets/img/female.png" />
        </div>
    </div>
</div>



<div class="uk-modal" id="applied_jobs_list">
    <div class="uk-modal-dialog">
        <button class="uk-modal-close uk-close" type="button"></button>
        <div class="uk-modal-header">
            <h3 class="uk-modal-title uk-text-center">Applied Job list</h3>
        </div>
        <?php
        if ($applied_job_info) {
            foreach ($applied_job_info as $job) {
                ?>
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1 uk-width-large-1-1">
                                <span class="uk-text-bold">Job ID : <?php echo $job->id; ?></span>
                                <h3 class="uk-margin-top-remove uk-margin-bottom-remove">Need a tutor for <?php echo $job->sub_cat; ?> student</h3>
                                <span class="uk-text-bold">Category:</span><span> <?php echo $job->category; ?>, </span><span class="uk-text-bold">Class:</span><span> <?php echo $job->sub_cat; ?>, </span><span class="uk-text-bold">Gender:</span><span> <?php echo $job->student_gender; ?></span>
                                <p>
                                    <span class="uk-text-bold">Days per week:</span><span> <?php echo $job->days_per_week; ?>, </span><span class="uk-text-bold">Salary:</span><span> Tk. <?php echo $job->salary_range; ?>, </span><span class="uk-text-bold">Tuition gender preference:</span><span> <?php echo $job->preferred_gender; ?></span><br>
                                    <span class="uk-text-bold">Subjects:</span><span> <?php echo $job->subs; ?></span>
                                </p>
                                <p>
                                    <i class="uk-icon-map-marker uk-text-primary"></i><span> <?php echo $job->city; ?>, <?php echo $job->location; ?> </span>
                                </p>
                                <p>
                                    <span class="uk-text-bold">Other requirements:</span><span> <?php echo $job->other_req; ?> </span>
                                </p>
                                <p>
                                    <span class="uk-text-bold">Applied at:</span><span> <?php echo date('d-m-Y h:i a', strtotime($job->applied_time)); ?> </span>
                                </p>
                            </div>
                        </div>
                        <div class="uk-grid" style="margin: 10px 0px 10px 0px">
                            <?php if ($job->latitude != 0 && $job->longitude != 0): ?>
                                <!-- Map Javascript Api -->
                                <a class="get_location uk-badge uk-badge-danger uk-badge-square-edge uk-width-1-3" style="padding: 8px !important; font-size: 14px;" href="javascript::" data-map_gen="false" data-map_lat="<?php echo $job->latitude ?>" data-map_lng="<?php echo $job->longitude ?>" data-job_id="<?php echo $job->id; ?>">Location</a><br>
                                <!-- <a class="get_direction uk-badge uk-badge-warning uk-badge-square-edge uk-width-1-3" style="padding: 8px !important; font-size: 14px;" href="javascript::" data-map_lat="<?php echo $job->latitude ?>" data-map_lng="<?php echo $job->longitude ?>" data-job_id="<?php echo $job->id; ?>">Direction</a><br> -->

                                <!-- Map Static Api -->
                                <!-- <a class="get_location uk-badge uk-badge-danger uk-badge-square-edge uk-width-1-3" style="padding: 8px !important; font-size: 14px;" href="javascript::" data-map_gen="false" data-map_lat="<?php echo $job->latitude ?>" data-map_lng="<?php echo $job->longitude ?>" data-job_id="<?php echo $job->id; ?>">Location</a><br> -->
                                <a class="get_direction uk-badge uk-badge-warning uk-badge-square-edge uk-width-1-3" style="padding: 8px !important; font-size: 14px;" href="javascript::" data-map_lat="<?php echo $job->latitude ?>" data-map_lng="<?php echo $job->longitude ?>" data-job_id="<?php echo $job->id; ?>">Direction</a><br>
                                <?php if ($job->apply_status == 'Applied'): ?>
                                    <a class="undo_applied_job uk-badge uk-badge-primary uk-badge-square-edge uk-width-1-3" style="padding: 8px; font-size: 14px;" href="javascript::" data-job_id="<?php echo $job->id; ?>">Undo Apply</a>
                                <?php endif ?>
                            <?php endif; ?>
                        </div>
                        <div id="collapse_<?php echo $job->id ?>" class="uk-hidden">
                            <div class="uk-grid" data-uk-grid-margin style="margin: 10px 0px 10px 3px; position: relative">
                                <div class="uk-width-medium-4-4 uk-width-large-4-4 uk-text-right">
                                    <button id="close_map" data-job_id="<?php echo $job->id; ?>" class="uk-badge uk-badge-danger uk-badge-square-edge" style="width: 10px 5px 10px 5px" type="button" name="button">X</button>
                                </div>
                                <!-- Map Javascript Api -->
                                <div class="uk-width-medium-4-4 uk-width-large-4-4" id="map_location_<?php echo $job->id; ?>" style="height: 300px"></div>
                                <!-- <div class="uk-width-medium-2-4 uk-width-large-2-4" id="map_direction_panel_<?php echo $job->id; ?>" style="height: 300px; overflow: scroll"></div> -->

                                <!-- Map Static Api -->
                                <!-- <div class="uk-width-medium-4-4 uk-width-large-2-4" id="static_api_image_<?php echo $job->id; ?>" style="height: 300px"></div> -->
                                <!-- <div class="uk-width-medium-4-4 uk-width-large-4-4" style="padding-left: 0 !important">
                                    <hr>
                                    <p>The exact location of this tuition job is inside this 100-meter circle</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="uk-alert uk-alert-danger" data-uk-alert>
                You haven't applied any job yet.
            </div>
        <?php }
        ?>
    </div>
</div>

<div class="uk-modal" id="assigned_jobs_list">
    <div class="uk-modal-dialog">
        <button class="uk-modal-close uk-close" type="button"></button>
        <div class="uk-modal-header">
            <h3 class="uk-modal-title uk-text-center">Assigned Job list</h3>
        </div>
        <?php
        if ($assigned_jobs) {
            foreach ($assigned_jobs as $job) {
                ?>
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1 uk-width-large-1-1">
                                <span class="uk-text-bold">Job ID : <?php echo $job->id; ?></span>
                                <h3 class="uk-margin-top-remove uk-margin-bottom-remove">Need a tutor for <?php echo $job->sub_cat; ?> student</h3>
                                <span class="uk-text-bold">Category:</span><span> <?php echo $job->category; ?>, </span><span class="uk-text-bold">Class:</span><span> <?php echo $job->sub_cat; ?>, </span><span class="uk-text-bold">Gender:</span><span> <?php echo $job->student_gender; ?></span>
                                <p>
                                    <span class="uk-text-bold">Days per week:</span><span> <?php echo $job->days_per_week; ?>, </span><span class="uk-text-bold">Salary:</span><span> Tk. <?php echo $job->salary_range; ?>, </span><span class="uk-text-bold">Tuition gender preference:</span><span> <?php echo $job->preferred_gender; ?></span><br>
                                    <span class="uk-text-bold">Subjects:</span><span> <?php echo $job->subs; ?></span>
                                </p>
                                <p>
                                    <i class="uk-icon-map-marker uk-text-primary"></i><span> <?php echo $job->city; ?>, <?php echo $job->location; ?> </span>
                                </p>
                                <p>
                                    <span class="uk-text-bold">Other requirements:</span><span> <?php echo $job->other_req; ?> </span>
                                </p>
                                <p>
                                    <span class="uk-text-bold">Assigned at:</span><span> <?php echo $job->updated_at; ?> </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="uk-alert uk-alert-danger" data-uk-alert>
                You haven't assigned to any job yet.
            </div>
        <?php }
        ?>
    </div>
</div>
<script id="give_test_form_template_services" type="text/x-handlebars-template">
    <!--{{#ifCond invoice_service_id '!==' 1}}
    {{/ifCond}}
    -->
    <div class="education_div" data-service-number="{{invoice_service_id}}">

    <div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-large-1-2 uk-width-medium-1-2">
    <div class="uk-input-group">
    <span class="uk-input-group-addon"><input type="checkbox" data-md-icheck/></span>
    <label>Checkbox addon</label>
    <input type="text" class="md-input" />
    </div>
    </div>
    {{#ifCond invoice_service_id '==' 1}}
    <div class="uk-width-large-1-2 uk-width-medium-1-2">
    <div class="uk-input-group">
    <span class="uk-input-group-addon"><a class="md-btn" href="javascript:void(0)" id="add_test_button" >Add</a></span>
    </div>
    </div>
    {{/ifCond}}
    </div>
    <hr class="md-hr"/>
    </div>
</script>
