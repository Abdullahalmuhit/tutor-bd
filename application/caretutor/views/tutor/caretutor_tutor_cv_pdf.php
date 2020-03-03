<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/cv_style.css'; ?>">
        <link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <!-- <div align="center">
            <img src="assets/img/caretutor_logo_w.png" alt="Caretutors Logo" />
        </div> -->
        <h5 style="font-size: 24px; text-align: center; background-color: #0072BC; color: #ffffff; padding: 5px;">
            <b>
                <?php echo ($user_data->full_name) ? "CV of ". $user_data->full_name : "Name isn't Defined!!!"; ?>
            </b>
        </h5>

        <table style="width:100%">
            <tr>
                <td><b>Tutor ID</b></td>
                <td><?php echo $user_data->id; ?></td>
                <td rowspan="4" align="right"><img style="width: 125px;" src="<?php echo ((!empty($profile_pic_info)) && ($profile_pic_info['profile_pic'] != '')) ? 'assets/upload/' . $profile_pic_info['profile_pic'] : 'assets/img/images.jpg'; ?>" alt="Profile Picture" /></td>
            </tr>
            <tr>
                <td><b>Name</td>
                <td><?php echo ($user_data->full_name) ? $user_data->full_name : "None"; ?></td>
            </tr>
            <tr>
                <td><b>Contact No.</b></td>
                <td><?php echo ($user_data->mobile_no) ? $user_data->mobile_no : "None"; ?></td>
            </tr>
            <tr>
                <td><b>E-mail</b></td>
                <td><?php echo $user_data->email; ?></td>
            </tr>
            <tr>
                <td><b>Overview</b></td>
                <td><?php echo (!empty($personal_info[0]['overview_yourself'])) ? $personal_info[0]['overview_yourself'] : "Not given"; ?></td>
                <td align="right"><?php echo 'Member Since ' . $user_data->created_at; ?></td>

            </tr>
        </table>
        &nbsp; &nbsp; &nbsp;
        <hr>

        <div>
            <h3 class="heading">Personal Info</h3>
            <table style="width:100%">
                <tr>
                    <td><b>Fathers Name</b></td>
                    <td><?php echo (!empty($personal_info)) ? ($personal_info[0]['fathers_name']) ? $personal_info[0]['fathers_name'] : 'None' : 'None'; ?></td>
                </tr>
                <tr>
                    <td><b>Fathers Phone</b></td>
                    <td><?php echo (!empty($personal_info)) ? ($personal_info[0]['fathers_phone']) ? $personal_info[0]['fathers_phone'] : 'None' : 'None'; ?></td>
                </tr>
                <tr>
                    <td><b>Mothers Name</b></td>
                    <td><?php echo (!empty($personal_info)) ? ($personal_info[0]['mothers_name']) ? $personal_info[0]['mothers_name'] : 'None' : 'None'; ?></td>
                </tr>
                <tr>
                    <td><b>Mothers Phone</b></td>
                    <td><?php echo (!empty($personal_info)) ? ($personal_info[0]['mothers_phone'] != '') ? $personal_info[0]['mothers_phone'] : 'None' : 'None'; ?></td>
                </tr>
                <tr>
                    <td><b>Additional Contact No.</b></td>
                    <td><?php echo (!empty($personal_info)) ? ($personal_info[0]['additional_numbers']) ? $personal_info[0]['additional_numbers'] : 'None' : 'None'; ?></td>
                </tr>
                <tr>
                    <td><b>Gender</b></td>
                    <td><?php echo (!empty($personal_info)) ? ($personal_info[0]['gender'] == 'Male') ? 'Male' : 'Female' : 'None'; ?></td>
                </tr>
                <tr>
                    <td><b>Facebook Link</b></td>
                    <td><?php echo (!empty($personal_info)) ? ($personal_info[0]['fb_link']) ? $personal_info[0]['fb_link'] : 'None' : 'None'; ?></td>
                </tr>
                <tr>
                    <td><b>Linkedin Link</b></td>
                    <td><?php echo (!empty($personal_info)) ? ($personal_info[0]['linkedin_link']) ? $personal_info[0]['linkedin_link'] : 'None' : 'None'; ?></td>
                </tr>
                <tr>
                    <td><b>Detail Address</b></td>
                    <td><?php echo (!empty($personal_info)) ? ($personal_info[0]['pre_address'] != '') ? $personal_info[0]['pre_address'] : 'None' : 'None'; ?></td>
                </tr>
                <tr>
                    <td><b><?php echo (!empty($personal_info)) ? ($personal_info[0]['identity_type'] != '') ? $personal_info[0]['identity_type'] : '<b>NID no / Passport no / Birth certificate no</b>' : '<b>NID no / Passport no / Birth certificate no</b>'; ?></b></td>
                    <td><?php echo (!empty($personal_info)) ? ($personal_info[0]['identity'] != '') ? $personal_info[0]['identity'] : 'None' : 'None'; ?></td>
                </tr>
                <tr>
                    <td><b>Emergency Contact Name</b></td>
                    <td><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_name']) ? $personal_info[0]['emmergency_contact_name'] : 'None' : 'None'; ?></td>
                </tr>
                <tr>
                    <td><b>Emergency Contact Address</b></td>
                    <td><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_address']) ? $personal_info[0]['emmergency_contact_address'] : 'None' : 'None'; ?></td>
                </tr>
                <tr>
                    <td><b>Emergency Contact No.</b></td>
                    <td><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_number'] != '') ? $personal_info[0]['emmergency_contact_number'] : 'None' : 'None'; ?></td>
                </tr>
                <tr>
                    <td><b>Emergency Contact Relation</b></td>
                    <td><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_rel'] != '') ? $personal_info[0]['emmergency_contact_rel'] : 'None' : 'None'; ?></td>
                </tr>
            </table>
        </div>

        <div>
            <h3 class="heading">Education Details</h3>
            <?php foreach ($edu_infos as $edu) { ?>
                <table style="width:100%; border: 1px double #0072BC; margin: 10px 0;">
                    <caption style="color:#0072BC; text-align:left; font-weight: bold; margin-bottom: 5px 0;"><u><?php echo $edu['level_of_education']; ?></u></caption>
                    <tr>
                        <td><b>Degree</b></td>
                        <td><?php
                            if ($edu['exam_degree_title'] != '') {
                                echo $edu['exam_degree_title'];
                            } else {
                                echo "N/A";
                            }
                            ?></td>
                        <td><b>Result</b></td>
                        <td><?php
                            if ($edu['result'] != '') {
                                echo $edu['result'];
                            } else {
                                echo "N/A";
                            }
                            ?></td>
                        <td><b>From</b></td>
                        <td><?php
                            if ($edu['from_date'] != '' && $edu['from_date'] != '0000-00-00') {
                                echo $edu['from_date'];
                            } else {
                                echo "N/A";
                            }
                            ?></td>
                    </tr>
                    <tr>
                        <td><b>Group</b></td>
                        <td><?php
                            if ($edu['sdg'] != '') {
                                echo $edu['sdg'];
                            } else {
                                echo "N/A";
                            }
                            ?></td>
                        <td><b>Year</b></td>
                        <td><?php
                            if ($edu['year_of_passing'] != '' && $edu['year_of_passing'] != 0) {
                                echo $edu['year_of_passing'];
                            } else {
                                echo "N/A";
                            }
                            ?></td>
                        <td><b>To</b></td>
                        <td><?php
                            if ($edu['until_date'] != '' && $edu['until_date'] != '0000-00-00') {
                                echo $edu['until_date'];
                            } else {
                                echo "N/A";
                            }
                            ?></td>
                    </tr>
                    <tr>
                        <td><b>Institute</b></td>
                        <td><?php
                            if ($edu['institute'] != '') {
                                echo $edu['institute'];
                            } else {
                                echo "N/A";
                            }
                            ?></td>
                        <td><b>Curriculum</b></td>
                        <td><?php
                            if ($edu['curriculum'] != '') {
                                echo $edu['curriculum'];
                            } else {
                                echo "N/A";
                            }
                            ?></td>
                        <td><b>Current Institute</b></td>
                        <td><?php
                            if ($edu['current_institute'] == '1') {
                                echo 'Yes';
                            } else {
                                echo "No";
                            }
                            ?></td>
                    </tr>
                    <tr>
                        <td><b>ID</b></td>
                        <td><?php
                            if ($edu['id_card_number'] != '') {
                                echo $edu['id_card_number'];
                            } else {
                                echo "N/A";
                            }
                            ?></td>
                    </tr>
                </table>
            <?php } ?>
        </div>

        <div>
            <h3 class="heading">Tuition Related Info</h3>
            <table style="width:100%">
                <tr>
                    <td><b>Available days</b></td>
                    <td><?php echo (!empty($tution_info)) ? ($tution_info[0]['available_days'] != '') ? $tution_info[0]['available_days'] : 'None' : 'None'; ?></td>
                </tr>
                <tr>
                    <td><b>Available time</b></td>
                    <td><?php echo ($tution_info[0]['available_time_from'] && $tution_info[0]['available_time_to']) ? $tution_info[0]['available_time_from'] . ' - ' . $tution_info[0]['available_time_to'] : "N/A"; ?></td>
                </tr>
                <tr>
                    <td><b>Expected Minimum Fees</b></td>
                    <td><?php echo (!empty($tution_info[0]['expected_fees'])) ? $tution_info[0]['expected_fees']." BDT" : "N/A"; ?></td>
                </tr>
                <tr>
                    <td><b>Tutoring Categories</b></td>
                    <td>
                        <?php
                            if($selected_catagory):
                                $i = 0;
                                $cat = "";
                                foreach ($selected_catagory as $category_class) {
                                    $cat .=$category_class->category . ", ";
                                    $i++;
                                }
                                $category_class_display = rtrim($cat, ', ');
                                echo $category_class_display;
                            else:
                                echo "N/A";
                            endif;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Tutoring Classes</b></td>
                    <td><?php echo (!empty($classes->class)) ? $classes->class : "N/A"; ?></td>
                </tr>
                <tr>
                    <td><b>Preferable Classes and Subjects</b></td>
                    <td>
                        <?php
                            if($cateories_class && $classes_sub):
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
                                            $k++;
                                        }
                                    }
                                else:
                                    echo "N/A";
                                endif;
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><b>City</b></td>
                    <td><?php echo (!empty($location_info['city'])) ? $location_info['city'] : "N/A"; ?></td>
                </tr>
                <tr>
                    <td><b>Location</b></td>
                    <td><?php echo (!empty($location_info['location'])) ? $location_info['location'] : "N/A"; ?></td>
                </tr>
                <tr>
                    <td><b>Preferred Locations</b></td>
                    <td><?php echo (!empty($location_info['pref_locs'])) ? $location_info['pref_locs'] : "N/A"; ?></td>
                </tr>
                <tr>
                    <td><b>Preferred Tutoring Style</b></td>
                    <td>
                        <?php
                        $pts = "";
                        if (count($tution_info) > 0) {
                            $pts = "";
                            $arr = explode(",", $tution_info[0]['pref_tut_style']);

                            if (in_array('1', $arr)) {
                                $pts .= "Private Tutoring -- One student";
                            }

                            if (count($arr) > 1) {
                                $pts .= ", ";
                            }

                            if (in_array('2', $arr)) {
                                $pts .= "Group Tutoring";
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
                    </td>
                </tr>
                <tr>
                    <td><b>Place of Tutoring</b></td>
                    <td>
                        <?php
                            if($tution_info[0]['student_home'] == 1 || $tution_info[0]['my_home'] == 1 || $tution_info[0]['online'] == 1){
                                if (count($tution_info) > 0)
                                {
                                    $pt = "";
                                    //$arr = explode(",",$tution_info[0]['place_of_tut']);
                                    if ($tution_info[0]['student_home'] == 1) {
                                        $pt .= "Student Home | ";
                                    }

                                    if ($tution_info[0]['my_home'] == 1) {
                                        $pt .= " My home | ";
                                    }

                                    if ($tution_info[0]['online'] == 1) {
                                        $pt .= "Online";
                                    }
                                    echo $pt;
                                }
                            } else {
                                echo "N/A";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Tutoring Experience</b></td>
                    <td>
                        <!-- <?php //echo count($tution_info) > 0 && count($tution_info) < 0 ? $tution_info[0]['total_experience'] : 'N/A'; ?> -->
                        <?php echo (!empty($tution_info)) ? ($tution_info[0]['total_experience'] != '' && $tution_info[0]['has_experience'] == '1') ? $tution_info[0]['total_experience'] : 'N/A' : 'N/A'; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Experience Details</b></td>
                    <td>
                        <!-- <?php //echo count($tution_info) > 0 && count($tution_info) < 0 ? $tution_info[0]['experiences'] : 'N/A'; ?> -->
                        <?php echo (!empty($tution_info)) ? ($tution_info[0]['experiences'] != '' && $tution_info[0]['has_experience'] == '1') ? $tution_info[0]['experiences'] : 'N/A' : 'N/A'; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Tutoring Method</b></td>
                    <td>
                        <!-- <?php //echo count($tution_info) > 0 && count($tution_info) < 0 ? $tution_info[0]['method'] : 'N/A'; ?> -->
                        <?php echo (!empty($tution_info)) ? ($tution_info[0]['method']) ? $tution_info[0]['method'] : 'N/A' : 'N/A'; ?>
                    </td>
                </tr>
            </table>
        </div>

    </body>

</html>
