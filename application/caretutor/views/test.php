<?php defined('safe_access') or die('Restricted access!'); ?>

<style type="text/css">

    .uk-text-muted{ opacity: 0.7; }

    .iradio_md.checked::after {background-color: #7cb342;}

    .disabled { opacity: 1 !important; }

</style>

<body style="background-color: #fff;">



    <div class="wrapper d-flex align-items-stretch">

        

        <!-- Page Content  -->

        <div id="content" class="tutor-content">

            <nav class="navbar navbar-expand-lg tutor-panel-topbar">

                <div class="container-fluid">

                    <span class="topbar-user-name"  > <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate"><?php echo (!empty($user_data)) ? $user_data->full_name : 'Your name'; ?></span>

                                <span class="sub-heading" style="color: #186A3B " ><?php echo round($review->review, 1) ?> <i style="color: #186A3B " class="uk-icon-star"></i></span>

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

                                

                                <span style="color: #186A3B " class="sub-heading">Profile Completed: <?php echo (!empty($user_data))?$user_data->profile_percentage:'0'; ?>%, 

                                    <?php if (!empty($marks->correctlyanswered)) { ?>

                                        <?php echo 'Quiz Marks: ' . $marks->correctlyanswered;

                                    } else {

                                        echo "Quiz Marks: Not appeared.";

                                    } ?>

                                </span>

                                <span style="color: #186A3B " class="sub-heading" id="user_edit_position"><?php echo $cat_name; ?></span>

                               

                            </h2>

                        </span>

                                

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>

                            <div class="uk-width-medium-1-2 uk-text-bold">

                                <label style="display: none;">&nbsp;&nbsp;</label>

                            </div>

                            <div class="uk-width-medium-1-2">

                                <div class="uk-float-right ">

                                    <a class="btn btn-success"  href="<?php echo base_url(); ?>tutor/generate_cv/<?php echo $user_data->id; ?>">Download CV</a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </nav>

            <div class="container ">
                <div class="tutor-view-profile-content">

                    <div class="tutor-profile-header job-view">
                        <h4>Personal Information</h4>
                    </div>

                    <div class="contact-info-content ">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Your Name</p>

                                    <span><?php echo (!empty($user_data)) ? $user_data->full_name : 'Your name'; ?></span>

                                </div>



                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Your E-mail</p>

                                    <span class="md-list-heading"><?php echo ($user_data->email) ? $user_data->email : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>



                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Your Contact Number</p>

                                    <span class="md-list-heading" ><?php echo ($user_data->mobile_no) ? $user_data->mobile_no : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>



                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Additional Contact Number</p>

                                    <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['additional_numbers']) ? $personal_info[0]['additional_numbers'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>



                            </div>

                            <div class="col-md-12">

                                <div class="b">

                                    <p>Address</p>

                                    <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['pre_address'] != '') ? $personal_info[0]['pre_address'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>



                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Your Gender</p>

                                    <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['gender'] != '') ? $personal_info[0]['gender'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                <span class="uk-text-small uk-text-muted"><?php echo (!empty($personal_info)) ? ($personal_info[0]['identity_type'] != '') ? $personal_info[0]['identity_type'] : '<b>NID no / Passport no / Birth certificate no</b>' : '<b>NID no / Passport no / Birth certificate no</b>'; ?></span>

                                                <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['identity'] != '') ? $personal_info[0]['identity'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Date of Birth</p>

                                    <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['date_of_birth'] != '') ? $personal_info[0]['date_of_birth'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Religion</p>

                                    <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['religion'] != '') ? $personal_info[0]['religion'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Nationality</p>

                                    <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['nationality'] != '') ? $personal_info[0]['nationality_name'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Your Facebook ID</p>

                                    <span class="md-list-heading"><?php echo (!empty($personal_info)) ? ($personal_info[0]['fb_link']) ? $personal_info[0]['fb_link'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-12">

                                <div class="b">

                                    <p>Your Linked ID</p>

                                    <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['linkedin_link']) ? $personal_info[0]['linkedin_link'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tutor-profile-header job-view">

                        <h4>Parents Information</h4>

                    </div>

                    <div class="contact-info-content ">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Your Father Name</p>

                                    <span class="md-list-heading"><?php echo (!empty($personal_info)) ? ($personal_info[0]['fathers_name']) ? $personal_info[0]['fathers_name'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Father Mobile Number</p>

                                    <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['fathers_phone']) ? $personal_info[0]['fathers_phone'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Your Mother Name</p>

                                    <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['mothers_name']) ? $personal_info[0]['mothers_name'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Mother Phone Number</p>

                                    <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['mothers_phone'] != '') ? $personal_info[0]['mothers_phone'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tutor-profile-header job-view">

                        <h4>Emergency Contact Info</h4>

                    </div>

                    <div class="contact-info-content ">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Emergency Contact Name</p>

                                    <span class="md-list-heading"><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_name']) ? $personal_info[0]['emmergency_contact_name'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Emergency Contact Address</p>

                                    <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_number'] != '') ? $personal_info[0]['emmergency_contact_address'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Contact Number</p>

                                    <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_number'] != '') ? $personal_info[0]['emmergency_contact_number'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Relation</p>

                                    <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_rel'] != '') ? $personal_info[0]['emmergency_contact_rel'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="tutor-profile-header job-view">

                        <h4>Overviews</h4>

                    </div>

                    <div class="contact-info-content ">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="b">

                                    <p>Your Overviews</p>

                                    <span class="md-list-heading"><?php echo (!empty($personal_info)) ? ($personal_info[0]['overview_yourself'] != '') ? $personal_info[0]['overview_yourself'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tutor-profile-header job-view">

                        <h4>Your Selected Category Info</h4>

                    </div>

                    <div class="contact-info-content ">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="b">

                                    <p>Your Selected Category Info</p>

                                    <span class="select-cate-btn">





                                    <?php

                                                        if($selected_catagory):

                                                            $i = 0;

                                                            foreach ($selected_catagory as $category_class) {

                                                                echo '<span class="category_view">' . $category_class->category . "</span>";

                                                                $i++;

                                                            }

                                                        else:

                                                            echo '<b style="color: red">&nbsp;&nbsp;Not Given</b>';

                                                        endif;

                                                    ?>

                                                    

                                        <!-- <button type="button" class="btn btn-success">Bangla</button>

                                        <button type="button" class="btn btn-success">English</button>

                                        <button type="button" class="btn btn-success">All subject</button> -->

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tutor-profile-header job-view">

                        <h4>Preferable Classes and Subjects</h4>

                    </div>

                    <div class="contact-info-content ">

                        <div class="row">

                            <div class="col-sm-12">

                            <?php

                                        if ($cateories_class && $classes_sub):

                                            $k = 1;

                                            foreach ($cateories_class as $category_class) {

                                                if (in_array($category_class->id, $class_ids)) {

                                                    ?>

                                                <div>

                                                    <span style="font-weight: bold;"><?php echo $category_class->category . ': '; ?></span>

                                                    <?php

                                                    $i = 1;

                                                    $f = 1;

                                                    foreach ($classes_sub as $class_sub) {

                                                        if (($class_sub->parent_id == $category_class->id) && (in_array($class_sub->id, $sub_ids))) {

                                                            ?>

                                                            <span><?php if ($i != 1) echo ', '; ?><?php echo $class_sub->category; ?></span>

                                                                    <?php

                                                                    $i++;

                                                                } elseif (empty($sub_ids)) {

                                                                    $f = 0;

                                                                }

                                                            }

                                                            if ($f == 0) {

                                                                ?>

                                                                    <p><?php echo "Not Specified." ?></p>

                                                                <?php

                                                            }

                                                            ?>

                                                                </div>

                                                            <?php $k++;

                                                        }

                                                    }

                                            else:

                                                echo '<b style="color: red">&nbsp;&nbsp;Not Given</b>';

                                            endif;

                                        ?>

                            </div>

                        </div>

                    </div>



                    <div class="tutor-profile-header job-view">

                        <h4>Your Selected Location Info</h4>

                    </div>

                    <div class="contact-info-content ">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Your City</p>

                                    <span class="md-list-heading" ><?php echo (!empty($location_info['city'])) ? ($location_info['city']) ? $location_info['city'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Your Location</p>

                                    <span class="md-list-heading" ><?php echo (!empty($location_info['location'])) ? ($location_info['location']) ? $location_info['location'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-12">

                                <div class="b">

                                    <p>Your Preferred Location </p>

                                    <span class="md-list-heading"><?php echo (!empty($location_info['pref_locs'])) ? ($location_info['pref_locs']) ? $location_info['pref_locs'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tutor-profile-header job-view">

                        <h4>Where Do You Want to Provide Your Service?</h4>

                    </div>

                    <div class="contact-info-content ">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="b">

                                    <span>

                                        <div class="checkbox">

                                        <ul class="md-list">

                                        <li>

                                            <div class="md-list-content">

                                                <?php

                                                    if ($tution_info[0]['student_home'] != 0 || $tution_info[0]['my_home'] != 0 || $tution_info[0]['online'] != 0) {

                                                        $pt = "";

                                                        if ($tution_info[0]['student_home'] == 1) {

                                                            $pt .= '<input type="checkbox" checked="checked" name="student_home" id="student_home" data-md-icheck disabled />

    										                                        <label for="student_home" class="inline-label" style="color: #1f2c44;">Student Home</label>';

                                                        }



                                                        if ($tution_info[0]['my_home'] == 1) {

                                                            $pt .= '<input type="checkbox" checked="checked" name="my_home" id="my_home" data-md-icheck disabled/>

    										                                        <label for="my_home" class="inline-label" style="color: #1f2c44;">My Home</label>';

                                                        }



                                                        if ($tution_info[0]['online'] == 1) {

                                                            $pt .= '<input type="checkbox" checked="checked" name="online" id="checkbox_online" data-md-icheck disabled/>

    										                                        <label for="checkbox_online" class="inline-label" style="color: #1f2c44;">Online</label>';

                                                        }

                                                        echo $pt;

                                                    } else {

                                                        echo '<b style="color: red">&nbsp;&nbsp;Not Given</b>';

                                                    }

                                                ?>

                                            </div>

                                        </li>





                                    </ul>

                                        </div>

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tutor-profile-header job-view">

                        <h4>Experience Info</h4>

                    </div>

                    <div class="contact-info-content ">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="b">

                                    <p>Your total experience?</p>

                                    <span class="md-list-heading"><?php echo (!empty($tution_info)) ? ($tution_info[0]['total_experience'] != '' && $tution_info[0]['has_experience'] == '1') ? $tution_info[0]['total_experience'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-12">

                                <div class="b">

                                    <p>Tuition experience details</p>

                                    <span class="md-list-heading"><?php echo (!empty($tution_info)) ? ($tution_info[0]['experiences'] != '' && $tution_info[0]['has_experience'] == '1') ? $tution_info[0]['experiences'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tutor-profile-header job-view">

                        <h4>Availability / Salary</h4>

                    </div>

                    <div class="contact-info-content ">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="b">

                                    <p> Your Available Days</p>

                                    <span class="md-list-heading"><?php echo (!empty($tution_info)) ? ($tution_info[0]['available_days']) ? $tution_info[0]['available_days'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p> Your Tutoring method</p>

                                    <span class="md-list-heading"><?php echo (!empty($tution_info)) ? ($tution_info[0]['method']) ? $tution_info[0]['method'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p> You Available From</p>

                                    <span class="md-list-heading" ><?php echo (!empty($tution_info)) ? ($tution_info[0]['available_time_from']) ? $tution_info[0]['available_time_from'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p> You Available To</p>

                                    <span class="md-list-heading" ><?php echo (!empty($tution_info)) ? ($tution_info[0]['available_time_to']) ? $tution_info[0]['available_time_to'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>





                            <div class="col-md-6">

                                <div class="b">

                                    <p> Your Tuition Style</p>

                                    <span class="md-list-heading" >

                                                    <?php

                                                    $pts = "";

                                                    if (count($tution_info) > 0) {

                                                        $pts = "";

                                                        $arr = explode(",", $tution_info[0]['pref_tut_style']);



                                                        if (in_array('1', $arr)) {

                                                            $pts .= "One to one";

                                                        }



                                                        if (count($arr) > 1) {

                                                            $pts .= ", ";

                                                        }



                                                        if (in_array('2', $arr)) {

                                                            $pts .= "One to many";

                                                        }



                                                        if (count($arr) > 2) {

                                                            $pts .= ", ";

                                                        }



                                                        if (in_array('3', $arr)) {

                                                            $pts .= "Online Tutoring";

                                                        }



                                                        if ($pts == "") {

                                                            $pts = "N/A";

                                                        }

                                                    } else {

                                                        $pts = "N/A";

                                                    }

                                                    ?>

<?php echo $pts; ?>

                                                </span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p> You Expected Salary (bdt/=)</p>

                                    <span class="md-list-heading" ><?php echo (!empty($tution_info)) ? ($tution_info[0]['expected_fees']) ? $tution_info[0]['expected_fees'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tutor-profile-header job-view">

                      <?php if (!empty($edu_infos)) { ?>

                        <h4>Education Details</h4>

                    </div>

                    <div class="contact-info-content ">

                        <div class="row">

                            <div class="col-sm-12">

                            <?php foreach ($edu_infos as $edu_info) { ?>

                                <h5 style="padding: 0 20px;" class="full_width_in_card heading_c" id="accordion_title_<?php echo $edu_info['id']; ?>"><?php echo $edu_info['level_of_education']; ?></h5>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p> Exam / Degree Title</p>

                                    <span class="md-list-heading" id="exam_degree_title_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['exam_degree_title'] != '') ? $edu_info['exam_degree_title'] : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p> Group</p>

                                    <span class="md-list-heading" id="group_name_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['sdg']) ? $edu_info['sdg'] : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p> Institute Name</p>

                                    <span class="md-list-heading" id="institute_name_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['institute'] != '') ? $edu_info['institute'] : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p> ID Card No</p>

                                    <span class="md-list-heading" id="id_card_number_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['id_card_number'] != '') ? $edu_info['id_card_number'] : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p> Result</p>

                                    <span class="md-list-heading"  id="result_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['result']) ? $edu_info['result'] : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p> Year of passing</p>

                                    <span class="md-list-heading" id="year_of_passing_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['year_of_passing'] != '' && $edu_info['year_of_passing'] != 0) ? $edu_info['year_of_passing'] : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Curriculum</p>

                                    <span class="md-list-heading" id="curriculum_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['curriculum'] != '') ? ucfirst(str_replace("_", " ", $edu_info['curriculum'])) : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>From date</p>

                                    <span class="md-list-heading"  id="from_date_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['from_date'] != '' && $edu_info['from_date'] != '0000-00-00') ? $edu_info['from_date'] : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Until date</p>

                                    <span class="md-list-heading"  id="until_date_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['until_date'] != '' && $edu_info['until_date'] != '0000-00-00') ? $edu_info['until_date'] : '<b style="color: red">Not Given</b>'; ?></span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="b">

                                    <p>Current institute</p>

                                    <span class="md-list-heading"  id="current_institute_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['current_institute'] == '1') ? 'Yes' : 'No'; ?>.</span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <?php } ?>

                    <?php } ?>

                    <div class="tutor-profile-header job-view">

                        <h4>Credential info</h4>

                    </div>

                    <div class="contact-info-content ">

                        <div class="row">

                            <div class="col-md-6">

                            <?php if (empty($credential_info)): ?>

                                    <div class="uk-width-1-1" id="cred_message">

                                        <h3 class="uk-text-bold" style="text-align: center; color: red">No Credentials Found</h3>

                                    </div>

                                <?php elseif (count($credential_info) === 1): ?>

                                    <div class="uk-width-1-1" id="cred_message">

                                        <h3 class="uk-text-bold" style="text-align: center; color: red">You've uploaded 1 credential out of 4</h3>

                                    </div>

                                <?php elseif (count($credential_info) === 2): ?>

                                    <div class="uk-width-1-1" id="cred_message">

                                        <h3 class="uk-text-bold" style="text-align: center; color: red">You've uploaded 2 credential out of 4</h3>

                                    </div>

                                <?php elseif (count($credential_info) === 3): ?>

                                    <div class="uk-width-1-1" id="cred_message">

                                        <h3 class="uk-text-bold" style="text-align: center; color: red">You've uploaded 3 credential out of 4</h3>

                                    </div>

                                <?php endif ?>

                                <?php if (!empty($credential_info)): ?>

                                    <div class="uk-width-1-1" id="cred_message">



                                    </div>

                                    <div style="opacity: 1;" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}" id="user_profile_gallery" data-uk-check-display class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid="{gutter: 4}">

                                    <?php foreach ($credential_info as $credential): ?>

                                            <div id="credential_<?php echo $credential['id']; ?>">

                                                <a href="../assets/upload/credential/<?php echo $credential['file_name']; ?>">

                                                    <img style="height: 109px; width: 100%;" src="../assets/upload/credential/<?php echo $credential['file_name']; ?>" alt="<?php echo $credential['name_of_the_credential']; ?>"/>

                                                </a>

                                                <p class="uk-text-bold uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 uk-text-left"><?php echo $credential['name_of_the_credential']; ?>

                                                    <?php

                                                    if($user_data->is_verified == 1 && $user_data->user_status == 'active')

                                                    {

                                                        ?>

                                                        <span class="uk-float-right uk-text-right">

                                                            <i class="material-icons delete_credential" data-credential_id="<?php echo $credential['id']; ?>" style="cursor: pointer; font-size: 22px;">cancel</i>

                                                        </span>

                                                        <?php

                                                    }

    												elseif($user_verification < 3)

                                                    {

                                                        ?>

                                                        <span class="uk-float-right uk-text-right">

                                                            <i class="material-icons delete_credential" data-credential_id="<?php echo $credential['id']; ?>" style="cursor: pointer; font-size: 22px;">cancel</i>

                                                        </span>

                                                        <?php

                                                    }

                                                    ?>

                                                </p>

                                            </div>

                                    <?php endforeach; ?>

                                <?php endif ?>

                            </div>

                            <div class="col-md-6">

                                <img src="images/certificate2.png" class="img-fluid" alt="">

                            </div>

                        </div>

                    </div>









                </div>

            </div>

            <div class="container">



            </div>

        </div>

    </div>



    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="js/main.js"></script>









    <script>

        var SITE = SITE || {};





        function readURL(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();

                var tmppath = URL.createObjectURL(event.target.files[0]);



                reader.onload = function(e) {

                    $('#img-uploaded').attr('src', e.target.result);

                    $('input.img-path').val(tmppath);

                }



                reader.readAsDataURL(input.files[0]);

            }

        }



        $(".uploader").change(function() {

            readURL(this);

        });



    </script>





</body>