

  





<body style="background-color: #edeff0;">

    <div style="height: 100%;overflow: scroll;" class="wrapper d-flex align-items-stretch"> 
                                          
        <nav id="sidebar">
                                       
       
                                    
            <div class="p-4 tutor-dashboard-menu">
            <span class="btn-file">
                        <a class="fileinput-new" href="#upload_new_profile_pic" data-uk-modal="{center:true}"><i class="material-icons">&#xE2C6;</i>Upload Profile</a>
                    </span>
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(<?php echo base_url();?>assets/img/2.jpg);"></a>
                <div class="sidebar-profile">
                    <p class="p-text"><a href="javascript:void(0)">
                <?php
                if ($this->session->userdata('user_type') == 'tutor') {
                   
                    
                    if ($user_verification == 3 && $user_data->is_verified == 1) {
                        ?><i class="uk-icon-check-circle" style="color: #fff;" data-parsley-trigger="keyup" data-uk-tooltip="{pos:'right'}" title="Verified"></i>&nbsp;<?php
                    }
                }
                echo 'Hello ' . explode(" ", $this->session->userdata('full_name'))[0] . ',<br/> ' . ucfirst($this->session->userdata('user_type')) . ' ID ' . $this->session->userdata('id') . '';
                ?>
            </a></p>
            
             <div class="user_avatar_controls">
                    
             </div>
          
                </div>

                <ul class="list-unstyled components mb-5">
                    <?php
    if ($this->session->userdata('user_type') == 'guardian') {
        ?>
        <div class="menu_section">
            <ul>
                <li<?php
                if ($includePage == "caretutor_parents_dashboard") {
                    echo ' class="act_section"';
                };
                ?>>
                    <a href="<?php echo base_url(); ?>parents/dashboard">
                        <span class="menu_icon uk-icon-dashboard"></span>
                        Dashboard
                    </a>
                </li>


                <li<?php
                if ($includePage == "") {
                    echo ' class="act_section"';
                };
                ?>>
                <a  href="#mailbox_new_message" data-uk-modal="{center:true}"><i class="fa fa-hourglass-start" ></i> Post Jobs</a>
                </li>

                <!-- <li<?php
                if ($includePage == "caretutor_parents_cvs") {
                    echo ' class="act_section"';
                };
                ?>>
                    <a href="<?php echo base_url(); ?>parents/view_cvs">
                        <span class="menu_icon uk-icon-file-text"></span>
                        View Tutor CV's
                    </a>
                </li> -->
                <li<?php
                if ($includePage == "caretutor_parents_profile") {
                    echo ' class="act_section"';
                };
                ?>>
                    <a href="<?php echo base_url(); ?>parents/profile"">
                        <span class="menu_icon uk-icon-user"></span>
                        Profile
                    </a>
                </li>
                <li<?php
                if ($includePage == "caretutor_parents_settings") {
                    echo ' class="act_section"';
                };
                ?>>
                    <a href="<?php echo base_url(); ?>parents/settings">
                        <span class="menu_icon uk-icon-cog"></span>
                        Settings
                    </a>
                </li>
            </ul>
        </div>
        <?php
    } else {
        ?>

        <?php
        $tution = $education = $personal = $credential = $test = 0;
        $name = $father_info = $mother_info = $overview = $email = $contact_num = $additional_num = $gender = $social_link =
        $det_address = $emergency_contact = $nid = $hons = $hsc = $ssc = $edus = $availability = $salary_range =
        $tution_style = $tution_cat = $tution_cls = $pref_sub = $city = $location = $pref_location = $tution_place =
        $tution_exp = $total_exp = $tution_exp_det = $pro_pic = 0;

                    if (!empty($tution_info)) {
                        //$tution = 20;
                        foreach ($tution_info as $tutions) {
                            //var_dump($tution['expected_fees']);
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
                            //var_dump($per_info['overview_yourself']);

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
        <div class="menu_section">
            <ul>
                <li<?php
                if ($includePage == "caretutor_tutor_dashboard") {
                    echo ' class="act_section"';
                };
                ?>>
                    <a <?php echo ($completed < 20) ? 'class="disabled"' : 'href="' . base_url("tutor/dashboard") . '"'; ?>>
                        <span class="menu_icon uk-icon-home"></span>
                        Home
                    </a>
                </li>
              <?php if ($user_data->user_status == 'active'): ?>
                <li<?php
                if ($includePage == "caretutor_tutor_add_profile") {
                    echo ' class="act_section"';
                };
                ?>>
                    <a href="<?php echo base_url(); ?>tutor/profile_edit">
                        <span class="menu_icon uk-icon-pencil-square-o"></span>
                        Edit Profile
                    </a>
                </li>
              <?php endif; ?>
                <li<?php
                if ($includePage == "caretutor_tutor_profile_plain_view") {
                    echo ' class="act_section"';
                };
                ?>>
                    <a href="<?php echo base_url(); ?>tutor/profile_plain_view">
                        <span class="menu_icon uk-icon-eye"></span>
                        View Profile
                    </a>
                </li>
                <li<?php
                if ($includePage == "caretutor_tutor_my_stats") {
                    echo ' class="act_section"';
                };
                ?>>
                    <a href="<?php echo base_url(); ?>tutor/my_stats">
                        <span class="menu_icon uk-icon-user"></span>
                        My Status
                    </a>
                </li>
                <li<?php
                if ($includePage == "caretutor_parents_profile") {
                    echo ' class="act_section"';
                };
                ?>>
                    <a href="<?php echo base_url(); ?>tutor/payment"">
                        <span class="menu_icon uk-icon-money"></span>
                        Payment
                    </a>
                </li>
                <li<?php
                if ($includePage == "caretutor_tutor_settings") {
                    echo ' class="act_section"';
                };
                ?>>
                    <a href="<?php echo base_url(); ?>tutor/settings">
                        <span class="menu_icon uk-icon-cog"></span>
                        Settings
                    </a>
                </li>
                <li<?php
                if ($includePage == "caretutor_tutor_contract_confirmation") {
                    echo ' class="act_section"';
                };
                ?>>
                    <a href="<?php echo base_url(); ?>tutor/contract_confirmation">
                        <span class="menu_icon uk-icon-link"></span>
                        Confirmation Letter
                    </a>
                </li>
            </ul>
        </div>

        <div class="menu_section">
        <ul>
     
             <div class="sidebar_logo">
                <a href="javascript:void(0)"><b>Complete Your Profile</b></a>
            </div>
            <?php
            $tution = $education = $personal = $credential = $test = 0;
                    $name = $father_info = $mother_info = $overview = $email = $contact_num = $additional_num = $gender = $social_link = $det_address = $emergency_contact = $nid = $hons = $hsc = $ssc = $edus = $availability = $salary_range = $tution_style = $tution_cat = $tution_cls = $pref_sub = $city = $location = $pref_location = $tution_place = $tution_exp = $total_exp = $tution_exp_det = $pro_pic = 0;

                    if (!empty($tution_info)) {
                        //$tution = 20;
                        foreach ($tution_info as $tutions) {
                            //var_dump($tution['expected_fees']);
                            if (!empty($tutions['expected_fees']) && !ctype_space($tutions['expected_fees'])) {
                                $salary_range = 2.5;
                            }
                            if (!empty($tutions['method']) && !ctype_space($tutions['method'])) {
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
                            if (!empty($per_info['fathers_name']) && !ctype_space($per_info['fathers_name']) || !empty($per_info['fathers_phone']) && !ctype_space($per_info['fathers_phone'])) {
                                $father_info = 2.5;
                            }
                            if (!empty($per_info['mothers_name']) && !ctype_space($per_info['mothers_name']) || !empty($per_info['mothers_phone']) && !ctype_space($per_info['mothers_phone'])) {
                                $mother_info = 2.5;
                            }
                            if (!empty($per_info['overview_yourself']) && !ctype_space($per_info['overview_yourself'])) {
                                $overview = 3;
                            }
                            if (!empty($per_info['additional_numbers'])) {
                                $additional_num = 2.5;
                            }
                            if (!empty($per_info['gender'])) {
                                $gender = 2.5;
                            }
                            if (!empty($per_info['pre_address']) && !ctype_space($per_info['pre_address'])) {
                                $det_address = 3;
                            }
                            if (!empty($per_info['fb_link']) && !ctype_space($per_info['fb_link']) || !empty($per_info['linkedin_link']) && !ctype_space($per_info['linkedin_link'])) {
                                $social_link = 2.5;
                            }
                            if (!empty($per_info['emmergency_contact_name']) && !ctype_space($per_info['emmergency_contact_name']) || !empty($per_info['emmergency_contact_number']) && !ctype_space($per_info['emmergency_contact_number'])) {
                                $emergency_contact = 2.5;
                            }
                            if (!empty($per_info['identity']) && !ctype_space($per_info['identity'])) {
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
            <div class="uk-progress">
                    <div class="uk-progress-bar" style="width: <?php echo $user_data->profile_percentage; ?>%;"><?php echo $user_data->profile_percentage; ?>%</div>
                </div>

                <?php
                    //$step = 0;
                    $clsDisable_for_2 = ($step == 0) ? "uk-disabled" : "";
                    $clsDisable_for_3 = ($step == 0 || $step == 1) ? "uk-disabled" : "";
                    ;
                ?>

                    </li>
                    <li>
                    <a href="javascript:void(0)">
                        <?php if (!empty($tution_info)) { ?>
                            <span class="menu_icon uk-icon-university uk-text-success"></span>

                        <?php } else { ?>
                            <span class="menu_icon uk-icon-university uk-text-danger"></span>
                        <?php } ?>
                        Tuition Related Information
                    </a>
                </li>
                <li class="<?php echo $clsDisable_for_2; ?>">
                    <a href="javascript:void(0)">
                        <?php if (!empty($edu_infos)) { ?>
                            <span class="menu_icon uk-icon-graduation-cap uk-text-success"></span>
                        <?php } else { ?>
                            <span class="menu_icon uk-icon-graduation-cap uk-text-danger"></span>
                        <?php } ?>
                        Educational Information
                    </a>
                </li>
                <li class="<?php echo $clsDisable_for_3; ?>">
                    <a href="javascript:void(0)">
                        <?php if (!empty($personal_info)) { ?>
                            <span class="menu_icon uk-icon-info-circle uk-text-success"></span>
                        <?php } else { ?>
                            <span class="menu_icon uk-icon-info-circle uk-text-danger"></span>
                        <?php } ?>
                        Personal Information
                    </a>
                </li>
                <li>
                    <!-- <a href="<?php echo base_url('quizes/load_quizes'); ?>">
                        <?php if ($exam_result > 0) { ?>
                            <span class="menu_icon uk-icon-file-text uk-text-success"></span>
                        <?php } else { ?>
                            <span class="menu_icon uk-icon-file-text uk-text-danger"></span>
                        <?php } ?>
                        Give a test
                    </a> -->
                    <a href="javascript::">
                        <?php if ($exam_result > 0) { ?>
                            <span class="menu_icon uk-icon-file-text uk-text-success"></span>
                        <?php } else { ?>
                            <span class="menu_icon uk-icon-file-text uk-text-danger"></span>
                        <?php } ?>
                        Give a test
                    </a>
                </li>
                <li>
                    <a href="#mailbox_new_message" data-uk-modal="{center:true}">
                        <?php if ($credential_info_count > 3) { ?>
                            <span class="menu_icon uk-icon-upload uk-text-success"></span>
                            <?php
                        } else {
                            ?>
                            <span class="menu_icon uk-icon-upload uk-text-success"></span>
                        <?php } ?>
                        Upload credential
                    </a>
                </li>
                </ul>
        </div>
        <?php
    }
    ?>
    
        </div>  
        </nav>


</body>



<?php echo $footer;?>


    




