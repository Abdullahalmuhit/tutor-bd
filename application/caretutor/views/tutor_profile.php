<div class="" ><!--view profile--><?php //var_dump($personal_info);  ?>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align: left;">
                <h5 class="panel-title" style="font-size: 18px;"><b><i class="fa fa-user"></i> My Profile</b></h5>
            </div>
            <div class="panel-body">
                <div class="col-md-3 pull-right row">
                    <img class="thumb" src="<?php echo ((count($personal_info) > 0) && ($personal_info->profile_pic != '')) ? base_url() . 'assets/upload/' . $personal_info->profile_pic : base_url() . 'assets/img/images.jpg'; ?>" alt="Profile Picture" />
                    <p><?php echo 'Member Since ' . $profile->created_at; ?></p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4><span><i class="fa fa-info"></i> Personal Information</span></h4>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Tutor ID</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo $profile->id; ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Name</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo $profile->full_name; ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Fathers Name</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php if (count($personal_info) > 0) {
    echo $personal_info->fathers_name;
} else {
    echo "N/A";
} ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Email</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo ($con_det == 'yes') ? $profile->email : 'N/A'; ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Contact Number</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo ($con_det == 'yes') ? $profile->mobile_no : 'N/A'; ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Additional Number</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php if (count($personal_info) > 0) {
    echo ($con_det == 'yes') ? $personal_info->additional_numbers : 'N/A';
} else {
    echo "N/A";
} ?></p>
                        </div>
                    </div>

                    <div>
                        <div class="col-md-4">
                            <p><b>Gender</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php if (count($personal_info) > 0) {
    echo $personal_info->gender;
} else {
    echo "N/A";
} ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Facebook Link</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><a href="<?php echo ($con_det == 'yes') ? $personal_info->fb_link : '#'; ?>"><?php if (count($personal_info) > 0) {
    echo ($con_det == 'yes') ? $personal_info->fb_link : 'N/A';
} else {
    echo "N/A";
} ?></a></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Detail Address</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php if (count($personal_info) > 0) {
    echo ($con_det == 'yes') ? $personal_info->pre_address : 'N/A';
} else {
    echo "N/A";
} ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Emergency Contact Name</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php if (count($personal_info) > 0) {
    echo $personal_info->emmergency_contact_name;
} else {
    echo "N/A";
} ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Emergency Contact Number</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php if (count($personal_info) > 0) {
    echo ($con_det == 'yes') ? $personal_info->emmergency_contact_number : 'N/A';
} else {
    echo "N/A";
} ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Emergency Contact Relation</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php if (count($personal_info) > 0) {
    echo $personal_info->emmergency_contact_rel;
} else {
    echo "N/A";
} ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>National ID</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php if (count($personal_info) > 0) {
    echo $personal_info->national_id;
} else {
    echo "N/A";
} ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Passport Number</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php if (count($personal_info) > 0) {
    echo $personal_info->passport_number;
} else {
    echo "N/A";
} ?></p>
                        </div>
                    </div>
                </div>

                <div class="row tutor_responsive_utility">
                    <div class="col-md-12">
                        <h4><span><i class="fa fa-graduation-cap"></i> Educational Information</span></h4>
                    </div>
                    <fieldset>
                        <legend style="text-align: left;">Graduate/Masters Level</legend>
                        <div>
                            <div class="col-md-4">
                                <p><b>University</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
    echo $edu_info->msc_ins;
} else {
    echo "N/A";
} ?></p>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-4">
                                <p><b>Subject</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
    echo ($edu_info->msc_sdg == 'All') ? '' : $edu_info->msc_sdg;
} else {
    echo "N/A";
} ?></p>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-4">
                                <p><b>Passing Year</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
    echo $edu_info->msc_pass_year;
} else {
    echo "N/A";
} ?></p>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-4">
                                <p><b>Result</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
    echo $edu_info->msc_cgpa;
} else {
    echo "N/A";
} ?></p>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend style="text-align: left;">Under Graduate/Honours Level</legend>
                        <div>
                            <div class="col-md-4">
                                <p><b>University</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
    echo $edu_info->uni_ins;
} else {
    echo "N/A";
} ?></p>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-4">
                                <p><b>Subject</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
    echo $edu_info->subject_name;
} else {
    echo "N/A";
} ?></p>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-4">
                                <p><b>Passing Year</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
    echo $edu_info->uni_semester;
} else {
    echo "N/A";
} ?></p>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-4">
                                <p><b>Result</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
    echo $edu_info->uni_cgpa;
} else {
    echo "N/A";
} ?></p>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend style="text-align: left;">Higher Secondary Level</legend>
                        <div>
                            <div class="col-md-4">
                                <p><b>Higher Secondary Type</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
    echo $edu_info->a_or_hsc;
} else {
    echo "N/A";
} ?></p>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-4">
                                <p><b>Institute Name</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
    echo $edu_info->hsc_ins;
} else {
    echo "N/A";
} ?></p>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-4">
                                <p><b>Result</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
    echo $edu_info->hsc_result;
} else {
    echo "N/A";
} ?></p>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-4">
                                <p><b>Passing Year</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
    echo $edu_info->hsc_pass_year;
} else {
    echo "N/A";
} ?></p>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend style="text-align: left;">Secondary Level</legend>
                        <div>
                            <div class="col-md-4">
                                <p><b>Secondary Type</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
    echo $edu_info->o_or_ssc;
} else {
    echo "N/A";
} ?></p>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-4">
                                <p><b>Institute Name</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
                                echo $edu_info->ssc_ins;
                            } else {
                                echo "N/A";
                            } ?></p>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-4">
                                <p><b>Result</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
                                echo $edu_info->ssc_result;
                            } else {
                                echo "N/A";
                            } ?></p>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-4">
                                <p><b>Passing Year</b></p>
                            </div>
                            <div class="col-md-5">
                                <p><?php if (count($edu_info) > 0) {
                                echo $edu_info->ssc_pass_year;
                            } else {
                                echo "N/A";
                            } ?></p>
                            </div>
                        </div>
                    </fieldset> 
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4><span><i class="fa fa-check"></i> Availability</span></h4>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Available days/week</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo $tut_info[0]['days_per_week']; ?> days/week</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4><span><i class="fa fa-graduation-cap"></i> Tuition Related Information</span></h4>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Expected Minimum Fees </b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo (!empty($tut_info[0]['expected_fees'])) ? $tut_info[0]['expected_fees'] : "N/A"; ?> BDT</p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b> Tutoring Categories</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo (!empty($categories->cat)) ? $categories->cat : "N/A"; ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b> Preferred Subjects </b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo (!empty($subjects->subj)) ? $subjects->subj : "N/A"; ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b> Preferred Locations </b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo (!empty($locations->loc)) ? $locations->loc : "N/A"; ?></p>
                        </div>
                    </div>

                    <div>
                        <div class="col-md-4">
                            <p><b>Score</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo ((count($tut_info) > 0) && ($tut_info[0]['diff_score'] != '')) ? $tut_info[0]['diff_score'] : 'N/A'; ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Preferred Tutoring Style</b></p>
                        </div>
                        <div class="col-md-5">
<?php
$pts = "N/A";
if (count($tut_info) > 0) {
    $pts = "";
    $arr = explode(",", $tut_info[0]['pref_tut_style']);

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
                            <p><?php echo $pts; ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Place of Tutoring</b></p>
                        </div>
                        <div class="col-md-5">
<?php
$pt = "N/A";
if (count($tut_info) > 0) {
    $pt = "";
    $arr = explode(",", $tut_info[0]['place_of_tut']);
    if (in_array('1', $arr)) {
        $pt .= "Student Place";
    }

    if (count($arr) > 1) {
        $pt .= ", ";
    }

    if (in_array('2', $arr)) {
        $pt .= "My Place";
    }

    if ($pt == "") {
        $pt = "N/A";
    }
} else {
    $pt = "N/A";
}
?>
                            <p><?php echo $pt; ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Tutoring Experience</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo count($tut_info) > 0 ? $tut_info[0]['experiences'] : 'N/A'; ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-4">
                            <p><b>Tutoring Method</b></p>
                        </div>
                        <div class="col-md-5">
                            <p><?php echo count($tut_info) > 0 ? $tut_info[0]['method'] : 'N/A'; ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>