<?php defined('safe_access') or die('Restricted access!'); ?>
<style type="text/css">
    .uk-text-muted{ opacity: 0.7; }
    .iradio_md.checked::after {background-color: #7cb342;}
    .disabled { opacity: 1 !important; }
</style>
<div id="page_content" >
    <div id="page_content_inner">
        <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="user_heading">
                        <div class="user_heading_avatar">
                            <?php
                            if (!empty($profile_pic_info) && $profile_pic_info['profile_pic'] != '') { ?>
                                <img src="<?php echo base_url("assets/upload/" . $profile_pic_info['profile_pic']); ?>" />
                            <?php } else {
                                ?>
                                <img src="<?php echo base_url(); ?>assets/panel/img/avatars/user.png" />
<?php } ?>
                        </div>
                        <div class="user_heading_content uk-padding-top-remove">
                            <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate"><?php echo (!empty($user_data)) ? $user_data->full_name : 'Your name'; ?></span>
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
                                <span class="sub-heading">Profile Completed: <?php echo (!empty($user_data))?$user_data->profile_percentage:'0'; ?>%, 
                                    <?php if (!empty($marks->correctlyanswered)) { ?>
                                        <?php echo 'Quiz Marks: ' . $marks->correctlyanswered;
                                    } else {
                                        echo "Quiz Marks: Not appeared.";
                                    } ?>
                                </span>
                                <span class="sub-heading" id="user_edit_position"><?php echo $cat_name; ?></span>
                                <!--<span class="sub-heading"><?php echo $user_data->email; ?></span>
                                <span class="sub-heading"><?php echo $user_data->mobile_no; ?></span>-->
                            </h2>
                        </div>
                    </div>
                    <div class="user_content">
                        <!-- <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal',active:<?php echo $step; ?>}">
                            <li class="<?php echo ($step == '1') ? '' : 'uk-active'; ?>"><a href="#">Tuition Related Information</a></li>
                            <li class="<?php echo ($step == '1') ? 'uk-active' : ''; ?>"><a href="#">Educational Information</a></li>
                            <li class=""><a href="#">Personal Information</a></li>
                        </ul> -->
                        <!-- <ul id="user_profile_tabs_content" class="uk-margin">
                            <li id="tution_info"> -->


                        <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2 uk-text-bold">
                                <label style="display: none;">&nbsp;&nbsp;</label>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-float-right ">
                                    <a class="md-btn md-btn-success"  href="<?php echo base_url(); ?>tutor/generate_cv/<?php echo $user_data->id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;Download CV&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                </div>
                            </div>
                        </div>



                        <div class="uk-margin-top">
                            <h1 class="page_title">
                                Personal Info
                            </h1>
                            <div class="uk-grid">
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your E-mail</span>
                                                <span class="md-list-heading"><?php echo ($user_data->email) ? $user_data->email : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Contact Number</span>
                                                <span class="md-list-heading" ><?php echo ($user_data->mobile_no) ? $user_data->mobile_no : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <ul class="md-list">

                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Gender</span>
                                                <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['gender'] != '') ? $personal_info[0]['gender'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Additional Contact Number</span>
                                                <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['additional_numbers']) ? $personal_info[0]['additional_numbers'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                    <ul class="md-list">

                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Address</span>
                                                <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['pre_address'] != '') ? $personal_info[0]['pre_address'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="md-list-content">
                                                <!-- <span class="uk-text-small uk-text-muted">NID no / Passport no / Birth certificate no</span> -->
                                                <span class="uk-text-small uk-text-muted"><?php echo (!empty($personal_info)) ? ($personal_info[0]['identity_type'] != '') ? $personal_info[0]['identity_type'] : '<b>NID no / Passport no / Birth certificate no</b>' : '<b>NID no / Passport no / Birth certificate no</b>'; ?></span>
                                                <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['identity'] != '') ? $personal_info[0]['identity'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Date of Birth</span>
                                                <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['date_of_birth'] != '') ? $personal_info[0]['date_of_birth'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Religion</span>
                                                <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['religion'] != '') ? $personal_info[0]['religion'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Nationality</span>
                                                <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['nationality'] != '') ? $personal_info[0]['nationality_name'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Facebook ID</span>
                                                <span class="md-list-heading"><?php echo (!empty($personal_info)) ? ($personal_info[0]['fb_link']) ? $personal_info[0]['fb_link'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <ul class="md-list">

                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Linkedin ID</span>
                                                <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['linkedin_link']) ? $personal_info[0]['linkedin_link'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <h1 class="page_title"> Parents Information </h1>
                            <div class="uk-grid">
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Father Name</span>
                                                <span class="md-list-heading"><?php echo (!empty($personal_info)) ? ($personal_info[0]['fathers_name']) ? $personal_info[0]['fathers_name'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Mother Name</span>
                                                <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['mothers_name']) ? $personal_info[0]['mothers_name'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Father Mobile No.</span>
                                                <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['fathers_phone']) ? $personal_info[0]['fathers_phone'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Mother Mobile No.</span>
                                                <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['mothers_phone'] != '') ? $personal_info[0]['mothers_phone'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <h1 class="page_title"> Emergency Contact Info </h1>
                            <div class="uk-grid">
                                <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Emergency Contact Name</span>
                                                <span class="md-list-heading"><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_name']) ? $personal_info[0]['emmergency_contact_name'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Emergency Contact Address</span>
                                                <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_number'] != '') ? $personal_info[0]['emmergency_contact_address'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Contact No.</span>
                                                <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_number'] != '') ? $personal_info[0]['emmergency_contact_number'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Relation</span>
                                                <span class="md-list-heading" ><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_rel'] != '') ? $personal_info[0]['emmergency_contact_rel'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <h1 class="page_title"> Overviews </h1>
                            <div class="uk-grid">
                                <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Overview</span>
                                                <span class="md-list-heading"><?php echo (!empty($personal_info)) ? ($personal_info[0]['overview_yourself'] != '') ? $personal_info[0]['overview_yourself'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                            <h1 class="page_title"> Your Selected Category Info </h1>
                            <div class="uk-grid">
                                <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">


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


                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>


                            <h1 class="page_title">Preferable Classes and Subjects</h1>
                            <div class="uk-grid ">
                                <div class="uk-width-medium-1-1">

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

                            <h1 class="page_title"> Your Selected Location Info </h1>
                            <div class="uk-grid">
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your City</span>
                                                <span class="md-list-heading" ><?php echo (!empty($location_info['city'])) ? ($location_info['city']) ? $location_info['city'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Location</span>
                                                <span class="md-list-heading" ><?php echo (!empty($location_info['location'])) ? ($location_info['location']) ? $location_info['location'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Preferred Location</span>
                                                <span class="md-list-heading"><?php echo (!empty($location_info['pref_locs'])) ? ($location_info['pref_locs']) ? $location_info['pref_locs'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>


                                    </ul>
                                </div>
                            </div>

                            <h1 class="page_title"> Where Do You Want to Provide Your Service? </h1>
                            <div class="uk-grid">

                                <div class="uk-width-large-1-1 uk-width-medium-1-1">
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

                                <?php if ($tution_info[0]['online'] == 1) { ?>
                                    <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                        <ul class="md-list">
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="uk-text-small uk-text-muted">Google+</span>
                                                    <span class="md-list-heading" ><?php echo (!empty($tution_info[0]['google_acc'])) ? ($tution_info[0]['google_acc'] != '') ? $tution_info[0]['google_acc'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                        <ul class="md-list">
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="uk-text-small uk-text-muted">Skype</span>
                                                    <span class="md-list-heading" ><?php echo (!empty($tution_info[0]['skype_acc'])) ? ($tution_info[0]['skype_acc'] != '') ? $tution_info[0]['skype_acc'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                <?php } ?>

                            </div>

                            <h1 class="page_title"> Experience Info </h1>
                            <div class="uk-grid">
                                <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                    <ul class="md-list">
                                        <!-- <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Do you have any tutoring experience?</span>
                                                    <?php if (!empty($tution_info)) {
                                                        if ($tution_info[0]['has_experience'] == '1') { ?>
                                                        <input type="radio" checked="checked" name="experience" class="experience" id="yes_experience" value="1" data-md-icheck />
                                                        <label for="yes_experience" class="inline-label">Yes</label>
                                                    <?php } else { ?>
                                                        <input type="radio" checked="checked" name="experience" class="experience" id="yes_experience" value="1" data-md-icheck />
                                                        <label for="yes_experience" class="inline-label">No</label>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                            </div>
                                        </li> -->

                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your total experience?</span>
                                                <span class="md-list-heading"><?php echo (!empty($tution_info)) ? ($tution_info[0]['total_experience'] != '' && $tution_info[0]['has_experience'] == '1') ? $tution_info[0]['total_experience'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Tuition experience details</span>
                                                <span class="md-list-heading"><?php echo (!empty($tution_info)) ? ($tution_info[0]['experiences'] != '' && $tution_info[0]['has_experience'] == '1') ? $tution_info[0]['experiences'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>




                                    </ul>
                                </div>
                            </div>

                            <h1 class="page_title"> Availability / Salary </h1>
                            <div class="uk-grid">
                                <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Available Days</span>
                                                <span class="md-list-heading"><?php echo (!empty($tution_info)) ? ($tution_info[0]['available_days']) ? $tution_info[0]['available_days'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>


                                    </ul>
                                </div>

                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">You Available From</span>
                                                <span class="md-list-heading" ><?php echo (!empty($tution_info)) ? ($tution_info[0]['available_time_from']) ? $tution_info[0]['available_time_from'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">You Expected Salary (bdt/=)</span>
                                                <span class="md-list-heading" ><?php echo (!empty($tution_info)) ? ($tution_info[0]['expected_fees']) ? $tution_info[0]['expected_fees'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Available To</span>
                                                <span class="md-list-heading" ><?php echo (!empty($tution_info)) ? ($tution_info[0]['available_time_to']) ? $tution_info[0]['available_time_to'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Tuition Style</span>
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
                                        </li>
                                    </ul>
                                </div>
                                <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted">Your Tutoring method</span>
                                                <span class="md-list-heading"><?php echo (!empty($tution_info)) ? ($tution_info[0]['method']) ? $tution_info[0]['method'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></span>
                                            </div>
                                        </li>


                                    </ul>
                                </div>
                            </div>




                            <!-- <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Name</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($user_data)) ? $user_data->full_name : 'Your name'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Overview</label>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                            <span>
                                                    <label><?php echo (!empty($personal_info)) ? ($personal_info[0]['overview_yourself'] != '') ? $personal_info[0]['overview_yourself'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Father's Name</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($personal_info)) ? ($personal_info[0]['fathers_name']) ? $personal_info[0]['fathers_name'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Father's Phone</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($personal_info)) ? ($personal_info[0]['fathers_phone']) ? $personal_info[0]['fathers_phone'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Mother's Name</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($personal_info)) ? ($personal_info[0]['mothers_name']) ? $personal_info[0]['mothers_name'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Mother's Phone</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($personal_info)) ? ($personal_info[0]['mothers_phone'] != '') ? $personal_info[0]['mothers_phone'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>E-mail</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo $user_data->email; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Contact Number</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo $user_data->mobile_no; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Additional Number</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($personal_info)) ? ($personal_info[0]['additional_numbers']) ? $personal_info[0]['additional_numbers'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Gender</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($personal_info)) ? ($personal_info[0]['gender'] != '') ? $personal_info[0]['gender'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Facebook Link</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($personal_info)) ? ($personal_info[0]['fb_link']) ? $personal_info[0]['fb_link'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Linkedin Link</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($personal_info)) ? ($personal_info[0]['linkedin_link']) ? $personal_info[0]['linkedin_link'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Details Address</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($personal_info)) ? ($personal_info[0]['pre_address'] != '') ? $personal_info[0]['pre_address'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Emergency Contact Name </label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_name']) ? $personal_info[0]['emmergency_contact_name'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Emergency Contact Address </label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_address']) ? $personal_info[0]['emmergency_contact_address'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Emergency Contact Number </label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_number'] != '') ? $personal_info[0]['emmergency_contact_number'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Emergency Contact Relation </label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($personal_info)) ? ($personal_info[0]['emmergency_contact_rel'] != '') ? $personal_info[0]['emmergency_contact_rel'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>National ID / Passport / Driving license no </label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($personal_info)) ? ($personal_info[0]['identity'] != '') ? $personal_info[0]['identity'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div> -->




                            <div class="uk-margin-top" id="education_info_accordin">
<?php if (!empty($edu_infos)) { ?>
                                    <h1 class="page_title"> Education Details </h1>

                                    <div class="uk-width-medium-1-1">


    <?php foreach ($edu_infos as $edu_info) { ?>
                                            <div >
                                                <h3 style="padding: 0 20px;" class="full_width_in_card heading_c" id="accordion_title_<?php echo $edu_info['id']; ?>"><?php echo $edu_info['level_of_education']; ?></h3>
                                                <div class="uk-accordion-content">
                                                    <div class="uk-grid uk-animation-slide-left" data-uk-grid-margin>
                                                        <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                                            <ul class="md-list">
                                                                <li>
                                                                    <div class="md-list-content">
                                                                        <span class="uk-text-small uk-text-muted">Exam / Degree Title</span>
                                                                        <span class="md-list-heading" id="exam_degree_title_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['exam_degree_title'] != '') ? $edu_info['exam_degree_title'] : '<b style="color: red">Not Given</b>'; ?></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="md-list-content">
                                                                        <span  class="uk-text-small uk-text-muted">Institute Name</span>
                                                                        <span class="md-list-heading" id="institute_name_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['institute'] != '') ? $edu_info['institute'] : '<b style="color: red">Not Given</b>'; ?></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="md-list-content">
                                                                        <span class="uk-text-small uk-text-muted">Result</span>
                                                                        <span class="md-list-heading"  id="result_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['result']) ? $edu_info['result'] : '<b style="color: red">Not Given</b>'; ?></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="md-list-content">
                                                                        <span class="uk-text-small uk-text-muted">Curriculum</span>
                                                                        <span class="md-list-heading" id="curriculum_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['curriculum'] != '') ? ucfirst(str_replace("_", " ", $edu_info['curriculum'])) : '<b style="color: red">Not Given</b>'; ?></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="md-list-content">
                                                                        <span class="uk-text-small uk-text-muted">Until date</span>
                                                                        <span class="md-list-heading"  id="until_date_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['until_date'] != '' && $edu_info['until_date'] != '0000-00-00') ? $edu_info['until_date'] : '<b style="color: red">Not Given</b>'; ?></span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                                            <ul class="md-list">
                                                                <li>
                                                                    <div class="md-list-content">
                                                                        <span class="uk-text-small uk-text-muted" >Group</span>
                                                                        <span class="md-list-heading" id="group_name_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['sdg']) ? $edu_info['sdg'] : '<b style="color: red">Not Given</b>'; ?></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="md-list-content">
                                                                        <span class="uk-text-small uk-text-muted">ID Card No</span>
                                                                        <span class="md-list-heading" id="id_card_number_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['id_card_number'] != '') ? $edu_info['id_card_number'] : '<b style="color: red">Not Given</b>'; ?></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="md-list-content">
                                                                        <span class="uk-text-small uk-text-muted" >Year of passing</span>
                                                                        <span class="md-list-heading" id="year_of_passing_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['year_of_passing'] != '' && $edu_info['year_of_passing'] != 0) ? $edu_info['year_of_passing'] : '<b style="color: red">Not Given</b>'; ?></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="md-list-content">
                                                                        <span class="uk-text-small uk-text-muted">From date</span>
                                                                        <span class="md-list-heading"  id="from_date_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['from_date'] != '' && $edu_info['from_date'] != '0000-00-00') ? $edu_info['from_date'] : '<b style="color: red">Not Given</b>'; ?></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="md-list-content">
                                                                        <span class="uk-text-small uk-text-muted">Current institute</span>
                                                                        <span class="md-list-heading"  id="current_institute_<?php echo $edu_info['id']; ?>"><?php echo ($edu_info['current_institute'] == '1') ? 'Yes' : 'No'; ?>.</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    <?php } ?>


                                    </div>
<?php } ?>
                            </div>

                            <!-- <h3 class="full_width_in_card heading_c">
                                    <i style="color:#0277bd;"class="uk-icon-check-circle uk-icon-small"></i> Availability / Salary
                            </h3>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Available days</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($tution_info)) ? ($tution_info[0]['available_days'] != '') ? $tution_info[0]['available_days'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Available from</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($tution_info)) ? ($tution_info[0]['available_time_from'] != '') ? $tution_info[0]['available_time_from'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Available to</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($tution_info)) ? ($tution_info[0]['available_time_to'] != '') ? $tution_info[0]['available_time_to'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Expected salary</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                    <label><?php echo (!empty($tution_info)) ? ($tution_info[0]['expected_fees'] != '') ? $tution_info[0]['expected_fees'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>

                            <h3 class="full_width_in_card heading_c">
                                    <i style="color:#0277bd;"class="uk-icon-book uk-icon-small"></i> Tuition Related Information
                            </h3>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Preferred Tutoring Style </label>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                            <span>
                                                    <label>
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
                                                    </label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Tutoring method</label>
                                    </div>
                                    <div class="uk-width-medium-1-4">
                                            <span>
                                                            <label><?php echo (!empty($tution_info)) ? ($tution_info[0]['method']) ? $tution_info[0]['method'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?></label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Tutoring Categories</label>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                            <span>
                                                    <label><?php
                            $i = 0;
                            foreach ($cateories_class[0] as $category_class) {
                                echo $category_class->category . ", ";
                                $i++;
                            }
                            ?>
                                                    </label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Tutoring Classes</label>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                            <span>
                                                    <label>
<?php
$i = 0;
foreach ($cateories_class[1] as $category_class) {
    if (in_array($category_class->id, $class_ids)) {
        echo $category_class->category . ", ";
        $i++;
    }
}
?>
                                                    </label>
                                            </span>
                                    </div>
                            </div>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Preferred Subjects</label>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                            <span>
                                                    <label><?php
                            $k = 1;
                            foreach ($cateories_class[1] as $category_class) {
                                if (in_array($category_class->id, $class_ids)) {
                                    ?>
                                                                    <div>
                                                                            <span style="color:#505050; font-weight: bold;"><?php echo $category_class->category . ': '; ?></span>
                                    <?php
                                    $i = 1;
                                    $f = 1;
                                    foreach ($classes_sub[1] as $class_sub) {
                                        if (($class_sub->parent_id == $category_class->id) && (in_array($class_sub->id, $sub_ids))) {
                                            ?>
                                                                                            <span style="color:#505050;"><?php echo $class_sub->category . ', '; ?></span>
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
} ?>
                                                    </label>
                                            </span>
                                    </div>
                            </div>

                            <h3 class="full_width_in_card heading_c">
                                    <i style="color:#0277bd;"class="uk-icon-map-marker uk-icon-small"></i> Location Info
                            </h3>
<?php if (!empty($location_info['city'])) { ?>
                                <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-3 uk-text-bold">
                                                <label>City</label>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                                <span>
                                                        <label><?php echo (!empty($location_info['city'])) ? ($location_info['city'] != '') ? $location_info['city'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?>
                                                        </label>
                                                </span>
                                        </div>
                                </div>
    <?php if ($location_info['location'] != '' || $location_info['pref_locs'] != '') { ?>
                                    <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-3 uk-text-bold">
                                                    <label>Location</label>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                    <span>
                                                            <label><?php echo (!empty($location_info['location'])) ? ($location_info['location'] != '') ? $location_info['location'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?>
                                                            </label>
                                                    </span>
                                            </div>
                                    </div>
                                    <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-3 uk-text-bold">
                                                    <label>Preferred location</label>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                    <span>
                                                            <label><?php echo (!empty($location_info['pref_locs'])) ? ($location_info['pref_locs'] != '') ? $location_info['pref_locs'] : '<b style="color: red">Not Given</b>' : '<b style="color: red">Not Given</b>'; ?>
                                                            </label>
                                                    </span>
                                            </div>
                                    </div>
    <?php } else { ?>
                                    <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-3 uk-text-bold">
                                                    <label><i class="uk-icon-skype uk-icon-small"></i> Skype</label>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                    <span>
                                                            <label><?php echo $tution_info[0]['skype_acc']; ?>
                                                            </label>
                                                    </span>
                                            </div>
                                    </div>
                                    <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-3 uk-text-bold">
                                                    <label><i class="uk-icon-google-plus-square uk-icon-small"></i> Google+</label>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                    <span>
                                                            <label><?php echo $tution_info[0]['google_acc']; ?>
                                                            </label>
                                                    </span>
                                            </div>
                                    </div>
                                <?php }
                            } else {

                            } ?>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label> Place of tutoring <label>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                            <span>
                            <?php
                            $pt = "";
                            if (count($tution_info) > 0) {
                                $pt = "";
                                if ($tution_info[0]['student_home'] == 1) {
                                    $pt .= "Student Home | ";
                                }

                                if ($tution_info[0]['my_home'] == 1) {
                                    $pt .= " My home | ";
                                }

                                if ($tution_info[0]['online'] == 1) {
                                    $pt .= "Online";
                                }
                            } else {
                                $pt = "N/A";
                            }
                            ?>
                                                    <label><?php echo $pt; ?>
                                                    </label>
                                            </span>
                                    </div>
                            </div>

                            <h3 class="full_width_in_card heading_c">
                                    <i style="color:#0277bd;"class="uk-icon-tasks uk-icon-small"></i> Experience Info
                            </h3>
                            <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-text-bold">
                                            <label>Tutoring Experience</label>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                            <span>
                                                    <label><?php if (!empty($tution_info)) {
                                if ($tution_info[0]['has_experience'] == '1') {
                                    echo "Yes";
                                } else {
                                    echo "No";
                                }
                            } ?>
                                                    </label>
                                            </span>
                                    </div>
                            </div>

<?php if (!empty($tution_info)) {
    if ($tution_info[0]['has_experience'] == '1') { ?>
                                    <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-3 uk-text-bold">
                                                    <label>Total Experience</label>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                    <span>
                                                            <label><?php echo ($tution_info[0]['total_experience'] != '') ? $tution_info[0]['total_experience'] : '<b style="color: red">Not Given</b>'; ?>
                                                            </label>
                                                    </span>
                                            </div>
                                    </div>
                                    <div class="uk-grid uk-margin-small-top" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-3 uk-text-bold">
                                                    <label>Tuition Experience Details</label>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                    <span>
                                                            <label><?php echo ($tution_info[0]['experiences'] != '') ? $tution_info[0]['experiences'] : 'N/A'; ?>
                                                            </label>
                                                    </span>
                                            </div>
                                    </div>
    <?php }
} ?>
                            -->

                                <div id="credential_info_div" class="uk-width-large-1-1">
                                    <h1 class="page_title"> Credential info</h1>
                                </div>
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

                        </div>
                    </div>
                </div>
                <!-- <div class="uk-width-large-3-10">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_c uk-margin-bottom">Make Your Profile Strong</h3>
                            <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                            <a class="md-btn md-btn-warning uk-align-center uk-width-medium-1-1" href="#mailbox_new_message" data-uk-modal="{center:true}" >Upload your credential</a>
                                        </div>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                            <a class="md-btn md-btn-primary uk-align-center uk-width-medium-1-1" href="#">Give a test</a>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <!-- <div class="uk-modal" id="mailbox_new_message">
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
                        <p class="uk-text uk-text-left">3.NID (both side) OR Passport </p>
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
    Make sure file size will not more than 5 MB.</span>
            </div>

        </div>
    </div> -->
