<a href="#" class="uk-close sidebar_main_close_button"></a>
<div class="sidebar_main_header">
    <div class="sidebar_logo">
        <a href="javascript:void(0)"><b>Complete Your Profile</b></a>
    </div>
    <!-- <div class="sidebar_actions">
        <select id="lang_switcher" name="lang_switcher">
            <option value="gb" selected>English</option>
        </select>
    </div> -->
    <?php
    $tution = $education = $personal = $credential = $test = 0;
        $name = $father_info = $mother_info = $overview = $email = $contact_num = $additional_num = $gender = $social_link = 
        $det_address = $emergency_contact = $nid = $hons = $hsc = $ssc = $edus = $availability = $salary_range = 
        $tution_style = $tution_cat = $tution_cls = $pref_sub = $city = $location = $pref_location = $tution_place = 
        $tution_exp = $total_exp = $tution_exp_det = $pro_pic = 0;

                    if (!empty($tution_info)) {
                        //$tution = 20;
                        foreach ($tution_info as $tutions) {
//                           var_dump($tution['expected_fees']);
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
                            if (!empty($per_info['national_id'])) {
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

    <div class="sidebar_actions uk-margin-small-top">
        <div class="uk-progress">
            <div class="uk-progress-bar" style="width: <?php echo $completed; ?>%;"><?php echo $completed; ?>%</div>
        </div>
    </div>
</div>

<?php
//$step = 0; 
$clsDisable_for_2 = ($step == 0) ? "uk-disabled" : "";
$clsDisable_for_3 = ($step == 0 || $step == 1) ? "uk-disabled" : "";
;
?>
<div class="menu_section" id="menu_section"> 
    <ul>
        <li>
            <a href="<?php echo base_url('tutor/profile_edit'); ?>">
                <?php if (!empty($tution_info)) { ?>
                    <span class="menu_icon uk-icon-university uk-text-success">&nbsp;</span>
                <?php } else { ?> 
                    <span class="menu_icon uk-icon-university uk-text-danger">&nbsp;</span>
<?php } ?>
                Tuition Related Information
            </a>
        </li>
        <li class="<?php echo $clsDisable_for_2; ?>">
            <a href="<?php echo base_url('tutor/profile_edit'); ?>">
                <?php if (!empty($edu_infos)) { ?>
                    <span class="menu_icon uk-icon-graduation-cap uk-text-success">&nbsp;</span>
                <?php } else { ?> 
                    <span class="menu_icon uk-icon-graduation-cap uk-text-danger">&nbsp;</span>
<?php } ?>
                Educational Information
            </a>
        </li>
        <li class="<?php echo $clsDisable_for_3; ?>">
            <a href="<?php echo base_url('tutor/profile_edit'); ?>">
                <?php if (!empty($personal_info)) { ?>
                    <span class="menu_icon uk-icon-info-circle uk-text-success">&nbsp;</span>
                <?php } else { ?> 
                    <span class="menu_icon uk-icon-info-circle uk-text-danger">&nbsp;</span>
<?php } ?>
                Personal Information
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('quizes/load_quizes'); ?>">
                <?php if ($exam_result > 0) { ?>
                    <span class="menu_icon uk-icon-file-text uk-text-success">&nbsp;</span>
                <?php } else { ?> 
                    <span class="menu_icon uk-icon-file-text uk-text-danger">&nbsp;</span>
<?php } ?>
                Give a test
            </a>
        </li>
        <li>
            <a href="#mailbox_new_message" data-uk-modal="{center:true}">
                <?php if ($credential_info_count > 3) { ?>
                    <span class="menu_icon uk-icon-upload uk-text-success">&nbsp;</span>
                    <?php
                } else {
                    ?> 
                    <span class="menu_icon uk-icon-upload uk-text-success">&nbsp;</span>
<?php } ?>
                Upload credential
            </a>
        </li>
    </ul>
</div>