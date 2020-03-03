<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/cv_style.css'; ?>">
        <link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div align="center">
            <img src="assets/img/caretutor_logo_w.png" alt="Caretutors Logo" />
        </div>
        <h5 style="font-size: 24px; text-align: center; background-color: #0072BC; color: #ffffff; padding: 5px;">
            <b>
                <?php echo ($tutor_info->full_name) ? "CV of ". $tutor_info->full_name : "Name isn't Defined!!!"; ?>
            </b>
        </h5>

        <table style="width:100%">
            <tr>
                <td><b>Tutor ID</b></td>
                <td><?php echo $tutor_info->id; ?></td>
                <td rowspan="4" align="right"><img style="width: 125px;" src="<?php echo $tutor_info->photo ? $tutor_info->photo : 'assets/img/images.jpg' ?>" alt="Profile Picture" /></td>
            </tr>
            <tr>
                <td><b>Name</td>
                <td><?php echo ($tutor_info->full_name) ? $tutor_info->full_name : "None"; ?></td>
            </tr>
            <tr>
                <td><b>Contact No.</b></td>
                <td><?php echo ($tutor_info->mobile_no) ? $tutor_info->mobile_no : "None"; ?></td>
            </tr>
            <tr>
                <td><b>E-mail</b></td>
                <td><?php echo $tutor_info->email; ?></td>
            </tr>
            <tr>
                <td><b>Overview</b></td>
                <td><?php echo (!empty($personal_info[0]['overview_yourself'])) ? $personal_info[0]['overview_yourself'] : "Not given"; ?></td>
                <td align="right"><?php echo 'Member Since ' . $tutor_info->created_at; ?></td>

            </tr>
        </table>
        &nbsp; &nbsp; &nbsp;
        <hr>

        <div>
            <h3 class="heading">Personal Info</h3>
            <table style="width:100%">
                <tr>
                    <td><b>Fathers Name</b></td>
                    <td><?php echo ($tutor_info->fathers_name) ? $tutor_info->fathers_name : "None"; ?></td>
                </tr>
                <tr>
                    <td><b>Fathers Phone</b></td>
                    <td><?php echo ($tutor_info->fathers_phone) ? $tutor_info->fathers_phone : "None"; ?></td>
                </tr>
                <tr>
                    <td><b>Mothers Name</b></td>
                    <td><?php echo ($tutor_info->mothers_name) ? $tutor_info->mothers_name : "None"; ?></td>
                </tr>
                <tr>
                    <td><b>Mothers Phone</b></td>
                    <td><?php echo ($tutor_info->mothers_phone) ? $tutor_info->mothers_phone : "None"; ?></td>
                </tr>
                <tr>
                    <td><b>Additional Contact No.</b></td>
                    <td><?php echo ($tutor_info->additional_numbers) ? $tutor_info->additional_numbers : "None"; ?></td>
                </tr>
                <tr>
                    <td><b>Gender</b></td>
                    <td><?php echo ($tutor_info->gender) ? $tutor_info->gender : "None"; ?></td>
                </tr>
                <tr>
                    <td><b>Facebook Link</b></td>
                    <td><?php echo ($tutor_info->fb_link) ? $tutor_info->fb_link : "None"; ?></td>
                </tr>
                <tr>
                    <td><b>Linkedin Link</b></td>
                    <td><?php echo ($tutor_info->linkedin_link) ? $tutor_info->linkedin_link : "None"; ?></td>
                </tr>
                <tr>
                    <td><b>Detail Address</b></td>
                    <td><?php echo ($tutor_info->pre_address) ? $tutor_info->pre_address : "None"; ?></td>
                </tr>
                <tr>
                    <td><b><?php echo $tutor_info->identity_type ? $tutor_info->identity_type : 'NID no / Passport no / Birth certificate no' ?></b></td>
                    <td><?php echo ($tutor_info->identity) ? $tutor_info->identity : "None"; ?></td>
                </tr>
                <tr>
                    <td><b>Emergency Contact Name</b></td>
                    <td><?php echo ($tutor_info->emmergency_contact_name) ? $tutor_info->emmergency_contact_name : "None"; ?></td>
                </tr>
                <tr>
                    <td><b>Emergency Contact Address</b></td>
                    <td><?php echo ($tutor_info->emmergency_contact_address) ? $tutor_info->emmergency_contact_address : "None"; ?></td>
                </tr>
                <tr>
                    <td><b>Emergency Contact No.</b></td>
                    <td><?php echo ($tutor_info->emmergency_contact_number) ? $tutor_info->emmergency_contact_number : "None"; ?></td>
                </tr>
                <tr>
                    <td><b>Emergency Contact Relation</b></td>
                    <td><?php echo ($tutor_info->emmergency_contact_rel) ? $tutor_info->emmergency_contact_rel : "None"; ?></td>
                </tr>
            </table>
        </div>

        <div>
            <h3 class="heading">Education Details</h3>
            <?php foreach ($edu_info as $edu) { ?>
                <table style="width:100%; border: 1px double #0072BC; margin: 10px 0;">
                    <caption style="color:#0072BC; text-align:left; font-weight: bold; margin-bottom: 5px 0;"><u><?php echo $edu->level_of_education ? $edu->level_of_education : 'N/A'; ?></u></caption>
                    <tr>
                        <td><b>Degree</b></td>
                        <td><?php echo $edu->exam_degree_title ? $edu->exam_degree_title : 'N/A' ?></td>
                        <td><b>Result</b></td>
                        <td><?php echo $edu->result ? $edu->result : 'N/A' ?></td>
                        <td><b>From</b></td>
                        <td><?php echo $edu->from_date && $edu->from_date != '0000-00-00' ? $edu->from_date : 'N/A' ?></td>
                    </tr>
                    <tr>
                        <td><b>Group</b></td>
                        <td><?php echo $edu->sdg ? $edu->sdg : 'N/A' ?></td>
                        <td><b>Year</b></td>
                        <td><?php echo $edu->year_of_passing ? $edu->year_of_passing : 'N/A' ?></td>
                        <td><b>To</b></td>
                        <td><?php echo $edu->until_date && $edu->until_date != '0000-00-00' ? $edu->until_date : 'N/A' ?></td>
                    </tr>
                    <tr>
                        <td><b>Institute</b></td>
                        <td><?php echo $edu->institute ? $edu->institute : 'N/A' ?></td>
                        <td><b>Curriculum</b></td>
                        <td><?php echo $edu->curriculum ? $edu->curriculum : 'N/A' ?></td>
                        <td><b>Current Institute</b></td>
                        <td><?php echo $edu->current_institute == '1' ? 'Yes' : 'No' ?></td>
                    </tr>
                    <tr>
                        <td><b>ID</b></td>
                        <td><?php echo $edu->id_card_number ? $edu->id_card_number : 'N/A' ?></td>
                    </tr>
                </table>
            <?php } ?>
        </div>

        <div>
            <h3 class="heading">Tuition Related Info</h3>
            <table style="width:100%">
                <tr>
                    <td><b>Available days</b></td>
                    <td><?php echo $tutor_info->available_days ? $tutor_info->available_days : 'None' ?></td>
                </tr>
                <tr>
                    <td><b>Available time</b></td>
                    <td><?php echo $tutor_info->available_time_to ? $tutor_info->available_time_to : 'None' ?></td>
                </tr>
                <tr>
                    <td><b>Expected Minimum Fees</b></td>
                    <td><?php echo $tutor_info->expected_fees ? $tutor_info->expected_fees . ' BDT' : 'None' ?></td>
                </tr>
                <tr>
                    <td><b>Tutoring Categories</b></td>
                    <td><?php echo $sub_data->pref_medium ? $sub_data->pref_medium : 'None' ?></td>
                </tr>
                <tr>
                    <td><b>Tutoring Classes</b></td>
                    <td><?php echo $sub_data->pref_class ? $sub_data->pref_class : 'None' ?></td>
                </tr>
                <tr>
                    <td><b>Tutoring Subjects</b></td>
                    <td><?php echo $sub_data->pref_subjects ? $sub_data->pref_subjects : 'None' ?></td>
                </tr>
                <tr>
                    <td><b>City</b></td>
                    <td><?php echo $tutor_info->city ? $tutor_info->city : 'None' ?></td>
                </tr>
                <tr>
                    <td><b>Location</b></td>
                    <td><?php echo $tutor_info->location ? $tutor_info->location : 'None' ?></td>
                </tr>
                <tr>
                    <td><b>Preferred Locations</b></td>
                    <td><?php echo $sub_data->pref_locations ? $sub_data->pref_locations : 'None' ?></td>
                </tr>
                <tr>
                    <td><b>Preferred Tutoring Style</b></td>
                    <td>
                        <?php
                        $pts = "";
                        if ($tutor_info->pref_tut_style) {
                            $pts = "";
                            $arr = explode(",", $tutor_info->pref_tut_style);

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
                            if($tutor_info->student_home == 1 || $tutor_info->my_home == 1 || $tutor_info->online == 1){
                                $pt = "";
                                //$arr = explode(",",$tution_info[0]['place_of_tut']);
                                if ($tutor_info->student_home == 1) {
                                    $pt .= "Student Home | ";
                                }

                                if ($tutor_info->my_home == 1) {
                                    $pt .= " My home | ";
                                }

                                if ($tutor_info->online == 1) {
                                    $pt .= "Online";
                                }
                                echo $pt;
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
                        <?php echo ($tutor_info->total_experience && $tutor_info->has_experience == '1') ? $tutor_info->total_experience : 'N/A'; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Experience Details</b></td>
                    <td>
                        <!-- <?php //echo count($tution_info) > 0 && count($tution_info) < 0 ? $tution_info[0]['experiences'] : 'N/A'; ?> -->
                        <?php echo ($tutor_info->experiences && $tutor_info->has_experience == '1') ? $tutor_info->experiences : 'N/A'; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Tutoring Method</b></td>
                    <td>
                        <!-- <?php //echo count($tution_info) > 0 && count($tution_info) < 0 ? $tution_info[0]['method'] : 'N/A'; ?> -->
                        <?php echo $tutor_info->method ? $tutor_info->method : 'N/A'; ?>
                    </td>
                </tr>
            </table>
        </div>

    </body>

</html>
