

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <!--Google fonts--->

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Student/Parent Dashboard</title>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/landing/new/css/jquery.fancybox.min.css">

<!--Swiper slider CSS-->
<link rel="stylesheet" href="<?php echo base_url();?>assets/landing/new/css/swiper.min.css">
    <!--Owl Carosuel css--->
  

 <link rel="stylesheet" href="<?php echo base_url();?>assets/landing/new/css/owl.carousel.min.css">
<!--Main CSS-->
<link rel="stylesheet" href="<?php echo base_url();?>assets/landing/new/css/owl.theme.default.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/landing/new/css/dashboard.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/landing/new/css/style2.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/landing/new/css/style.css">





<body style="background-color: #edeff0;">



    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4">
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(<?php echo base_url();?>assets/img/h3.png);"></a>
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
        <?php
    }
    ?>
                </ul>
            </div>
        </nav>
        <!-- Page Content  -->
        

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


    
</body>



