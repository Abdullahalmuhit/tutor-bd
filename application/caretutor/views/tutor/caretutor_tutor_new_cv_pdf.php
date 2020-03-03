<!DOCTYPE html>
<html>

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

     <title><?php echo ($user_data->full_name) ? "CV of ". $user_data->full_name : "Name isn't Defined!!!"; ?></title>

     <style type="text/css">
        * { margin: 0; padding: 0; }
        body { font: 16px Helvetica, Sans-Serif; line-height: 24px; background: url(assets/img/noise.jpg); }
        .clear { clear: both; }
        #page-wrap { width: 800px; margin: 40px auto 60px; }
        #pic { float: right; margin: -30px 0 0 0; }
        h1 { margin: 0 0 16px 0; padding: 0 0 16px 0; font-size: 42px; font-weight: bold; letter-spacing: -2px; border-bottom: 1px solid #999; }
        h2 { font-size: 20px; margin: 0 0 6px 0; position: relative; }
        h2 span { position: absolute; bottom: 0; right: 0; font-style: italic; font-family: Georgia, Serif; font-size: 16px; color: #999; font-weight: normal; }
        p { margin: 0 0 16px 0; }
        a { color: #999; text-decoration: none; border-bottom: 1px dotted #999; }
        a:hover { border-bottom-style: solid; color: black; }
        ul { margin: 0 0 32px 17px; }
        #objective { width: 500px; float: left; }
        #objective p { font-family: Georgia, Serif; font-style: italic; color: #666; }
        dt { font-style: italic; font-weight: bold; font-size: 18px; text-align: right; padding: 0 26px 0 0; width: 150px; float: left; height: 100px; border-right: 1px solid #999;  }
        dd { width: 600px; float: right; }
        dd.clear { float: none; margin: 0; height: 15px; }
     </style>
</head>

<body>
    <div id="page-wrap">
        <img id="pic" src="<?php echo ((!empty($profile_pic_info)) && ($profile_pic_info['profile_pic'] != '')) ? base_url('assets/upload') . '/' . $profile_pic_info['profile_pic'] : base_url('assets/img/images.jpg'); ?>" alt="Profile Picture" />
        <div id="contact-info" class="vcard">
            <h1 class="fn"><?php echo $user_data->full_name ? $user_data->full_name : 'Not given' ?></h1>
            <p>
                Cell: <span class="tel"><?php echo $user_data->mobile_no ? $user_data->mobile_no : 'Not given' ?></span><br />
                Additional: <span class="tel"><?php echo (!empty($personal_info)) ? ($personal_info[0]['additional_numbers']) ? $personal_info[0]['additional_numbers'] : 'None' : 'None'; ?></span><br />
                Email: <a class="email" href="mailto:<?php echo $user_data->email ? $user_data->email : 'Not given' ?>"><?php echo $user_data->email ? $user_data->email : 'Not given' ?></a><br />
                Address: <span><?php echo (!empty($personal_info)) ? ($personal_info[0]['pre_address']) ? $personal_info[0]['pre_address'] : 'None' : 'None'; ?></span>
            </p>
        </div>
        <div id="objective">
            <p><?php echo (!empty($personal_info[0]['overview_yourself'])) ? $personal_info[0]['overview_yourself'] : 'Not given'; ?></p>
        </div>
        <div class="clear"></div>
        <dl>
            <?php foreach ($edu_infos as $edu): ?>
                <dd class="clear"></dd>
                <dt><?php echo $edu['level_of_education']; ?></dt>
                <dd>
                    <h2><?php echo $edu['institute'] ? $edu['institute'] : 'Not Given' ?> <span>| <?php echo $edu['curriculum'] ?></span></h2>
                    <p>
                        <strong>ID:</strong> <?php echo $edu['id_card_number'] ? $edu['id_card_number'] : 'Not Given' ?> <br>
                        <strong>Major:</strong> <?php echo $edu['sdg'] ? $edu['sdg'] : 'Not Given' ?> , <strong>Exam/Degree:</strong> <?php echo $edu['exam_degree_title'] ? $edu['exam_degree_title'] : 'Not Given' ?> , <strong>Result:</strong> <?php echo $edu['result'] ? $edu['result'] : 'Not Given' ?> <strong>Year:</strong> <?php echo $edu['year_of_passing'] ? $edu['year_of_passing'] : 'Not Given' ?>, <strong>Current Institute:</strong> <?php echo $edu['current_institute'] == '1' ? 'Yes' : 'No' ?>
                    </p>
                </dd>
            <?php endforeach ?>

            <dd class="clear"></dd>

            <dt>Experience</dt>
            <dd>
                <div id="objective">
                    <p><?php echo (!empty($tution_info)) ? ($tution_info[0]['experiences'] != '' && $tution_info[0]['has_experience'] == '1') ? $tution_info[0]['experiences'] : 'N/A' : 'N/A'; ?></p>
                </div>
            </dd>

            <dd class="clear"></dd>

            <dt>Method</dt>
            <dd>
                <div id="objective">
                    <p><?php echo (!empty($tution_info)) ? ($tution_info[0]['method']) ? $tution_info[0]['method'] : 'N/A' : 'N/A'; ?></p>
                </div>
            </dd>

            <dd class="clear"></dd>

            <dt>Availability</dt>
            <dd>
                <p>
                    <strong>Days:</strong> <?php echo (!empty($tution_info)) ? ($tution_info[0]['available_days'] != '') ? $tution_info[0]['available_days'] : 'None' : 'None'; ?>, <strong>Time: </strong> <?php echo ($tution_info[0]['available_time_from'] && $tution_info[0]['available_time_to']) ? $tution_info[0]['available_time_from'] . ' - ' . $tution_info[0]['available_time_to'] : "N/A"; ?>, <strong>Expected Minimum Fees: </strong> <?php echo (!empty($tution_info[0]['expected_fees'])) ? $tution_info[0]['expected_fees']." BDT" : "N/A"; ?>, <strong>City: </strong> <?php echo (!empty($location_info['city'])) ? $location_info['city'] : "N/A"; ?>, <strong>Location: </strong> <?php echo (!empty($location_info['location'])) ? $location_info['location'] : "N/A"; ?>, <strong>Preferred Locations: </strong> <?php echo (!empty($location_info['pref_locs'])) ? $location_info['pref_locs'] : "N/A"; ?>, <strong>Preferred Tutoring Style: </strong> <?php
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
                </p>
            </dd>

            <dd class="clear"></dd>

            <dt>Others</dt>
            <dd>
                <p>
                    <strong>Tutoring Categories :</strong> <?php
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
                        ?> <strong>Tutoring Classes: </strong> <?php echo (!empty($classes->class)) ? $classes->class : "N/A"; ?> <strong>Preferable Subjects: </strong> 
                            <?php foreach ($classes_sub as $i => $class_sub): ?>
                                <span><?php if ($i != 0) echo ', '; ?><?php echo $class_sub->category; ?></span>
                            <?php endforeach ?>
                            , <strong>Place of Tutoring: </strong> 
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
                </p>
            </dd>
            
            <dd class="clear"></dd>
        </dl>
        
        <div class="clear"></div>

        <table width="100%">
            <tr>
                <td><strong>Fathers Name</strong></td>
                <td>: <?php echo (!empty($personal_info)) ? ($personal_info[0]['fathers_name']) ? $personal_info[0]['fathers_name'] : 'None' : 'None'; ?></td>
                <td><strong>Fathers Phone</strong></td>
                <td>: <?php echo (!empty($personal_info)) ? ($personal_info[0]['fathers_phone']) ? $personal_info[0]['fathers_phone'] : 'None' : 'None'; ?></td>
            </tr>
            <tr>
                <td><strong>Mothers Name</strong></td>
                <td>: <?php echo (!empty($personal_info)) ? ($personal_info[0]['mothers_name']) ? $personal_info[0]['mothers_name'] : 'None' : 'None'; ?></td>
                <td><strong>Mothers Phone</strong> </td>
                <td>: <?php echo (!empty($personal_info)) ? ($personal_info[0]['mothers_phone'] != '') ? $personal_info[0]['mothers_phone'] : 'None' : 'None'; ?></td>
            </tr>
            <tr>
                <td><strong>Gender</strong></td>
                <td>: <?php echo (!empty($personal_info)) ? ($personal_info[0]['gender'] == 'Male') ? 'Male' : 'Female' : 'None'; ?></td>
                <td><strong>Emergency Contact Name </strong></td>
                <td>: <?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_name']) ? $personal_info[0]['emmergency_contact_name'] : 'None' : 'None'; ?></td>
            </tr>
            <tr>
                <td><strong>Emergency Contact No</strong></td>
                <td>: <?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_number'] != '') ? $personal_info[0]['emmergency_contact_number'] : 'None' : 'None'; ?></td>
                <td><strong>Emergency Contact Relation </strong></td>
                <td>: <?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_rel'] != '') ? $personal_info[0]['emmergency_contact_rel'] : 'None' : 'None'; ?></td>
            </tr>

        </table>
    
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>