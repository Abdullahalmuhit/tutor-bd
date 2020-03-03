<?php
defined('safe_access') or die('Restricted access!');
$verified = ($verify_data == NULL) ? -1 : $verify_data->status;
?>

<div id="page_content">
    <div id="page_content_inner">
        <form action="" class="uk-form-stacked" id="user_edit_form">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-1-1">
                                    <ul class="uk-tab" data-uk-tab="{connect:'#tabs_1'}">
                                        <li class="uk-active uk-width-large-1-4 uk-width-small-1-4"><a href="#">Password Change</a></li>
                                        <?php if ($user_verification != 3 && $user_verification != 5): ?>
                                            <li class="uk-width-large-1-4 uk-width-small-1-4"><a href="#">Personal Info</a></li>
                                        <?php endif ?>
                                        <li class="uk-width-large-1-4 uk-width-small-1-4"><a href="#">Request for Verification</a></li>
                                        <?php if ($verify_data && $verify_data->address_verification_code != '' && $verify_data->address_verified == '0'): ?>
                                            <li class="uk-width-large-1-4 uk-width-small-1-4"><a href="#">Address Verification</a></li>
                                        <?php endif ?>
                                        <?php if ($user_data && ($user_data->user_status === 'locked' || $user_data->user_status === 'unlock_req')): ?>
                                            <li class="uk-width-large-1-4 uk-width-small-1-4"><a href="#">Unlock Request</a></li>
                                        <?php endif ?>
                                    </ul>
                                    <ul id="tabs_1" class="uk-switcher uk-margin">
                                        <li>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                                    <div class="uk-form-row">
                                                        <label>Previous Password</label>
                                                        <input type="password" class="md-input" id="previous_password"/>

                                                    </div>
                                                </div>
                                                <div class="uk-width-large-1-1 uk-width-medium-1-1" id="password_message" style="display: none;">

                                                </div>
                                                <!-- <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                                    <div class="uk-form-row ">
                                                        <span class="uk-float-right"><a class="md-btn md-btn-success" id="check_password" href="javascript:void(0)" style="padding: 10px 25px;">Check</a></span>
                                                    </div>
                                                </div> -->
                                                <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                                    <div class="uk-form-row">
                                                        <label>New Password</label>
                                                        <input type="password" id="new_password" class="md-input" disabled />
                                                    </div>
                                                    <div class="uk-form-row">
                                                        <label>Confirm Password</label>
                                                        <input type="password" id="confirm_password" class="md-input" disabled />
                                                    </div>
                                                    <div class="uk-form-row" id="password_match_message">

                                                    </div>
                                                    <div class="uk-form-row uk-float-right">
                                                        <button type="button" id="update_password" class="md-btn md-btn-primary disabled" style="padding: 10px 25px;" >Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php if ($user_verification != 3 && $user_verification != 5): ?>
                                            <li>
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-large-1-1 uk-width-medium-1-1" style="padding-top: 5px;">
                                                        <div class="uk-form-row">
                                                            <label>Full Name</label>
                                                            <input type="text" class="md-input" id="full_name" value="<?php echo $user_data->full_name; ?>"/>
                                                            <label>Mobile No.</label>
                                                            <input type="text" class="md-input" id="mobile_no" value="<?php echo $user_data->mobile_no; ?>"/>

                                                        </div>
                                                    </div>
                                                    <div class="uk-width-large-1-1 uk-width-medium-1-1" id="update_info_messege" style="display: none;">

                                                    </div>
                                                    <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                                        <div class="uk-form-row uk-float-right">
                                                            <a style="padding: 10px 25px;" class="md-btn md-btn-primary" id="update_settings_personal_info" href="javascript:void(0)">Update</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endif ?>
                                        <li>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-large-1-1 uk-width-medium-1-1" style="padding-top: 5px;">
                                                    <?php
                                                    if ($verified == -1) {
                                                        ?>
                                                        <div class="uk-input-group">
                                                            <span class="uk-input-group-addon"><button class="md-btn md-btn-primary" id="request_for_verification" href="javascript:void(0)" style="padding: 14px 25px;">Send Request</button></span>
                                                        </div>
                                                        <div class="uk-width-large-1-1 uk-width-medium-1-1" id="request_message" style="display: none;">

                                                        </div>
                                                        <?php
                                                    } elseif ($verified >= 3) {
                                                        ?>
                                                        <!-- <div class="uk-input-group">
                                                            <span class="uk-input-group-addon"><a class="md-btn md-btn-primary" id="request_profile_edit" style="padding: 14px 25px;" href="javascript:void(0)">Request to Edit Profile</a></span>
                                                        </div>
                                                        <div class="uk-width-large-1-1 uk-width-medium-1-1" id="request_message" style="display: none;">

                                                        </div> -->
                                                        <?php
                                                    } elseif ($verified >= 0 && $verified <= 2) {
                                                        ?>
                                                        <div class="uk-input-group">
                                                            <span class="uk-input-group-addon">Your Request is in review state. Wait for confirmation and invoice. Thank You.</span>
                                                        </div>
                                                        <?php
                                                    }
//
                                                    elseif ($verified >= 3) {
                                                        ?>
                                                        <!-- <div class="uk-input-group">
                                                            <span class="uk-input-group-addon">Received your payment information. Wait for confirmation. Thank You.</span>
                                                        </div> -->
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                                <div class="uk-width-large-1-1 uk-width-medium-1-1" id="mobile_no_message" style="display: none;">

                                                </div>
                                            </div>
                                        </li>
                                        <?php if ($verify_data && $verify_data->address_verification_code != '' && $verify_data->address_verified == '0'): ?>
                                            <li>
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-large-1-1 uk-width-medium-1-1" style="padding-top: 5px;">
                                                        <div class="uk-form-row">
                                                            <label>Verification Code</label>
                                                            <input type="number" class="md-input" id="address_verification_code" />
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-large-1-1 uk-width-medium-1-1" id="verification_info_messege" style="display: none;">

                                                    </div>
                                                    <div class="uk-width-large-1-1 uk-width-medium-1-1">
                                                        <div class="uk-form-row uk-float-right">
                                                            <a style="padding: 10px 25px;" class="md-btn md-btn-primary" id="update_settings_address_verification" href="javascript:void(0)">Verify</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endif ?>
                                        <?php if ($user_data && ($user_data->user_status === 'locked' || $user_data->user_status === 'unlock_req')): ?>
                                            <li>
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon"><button class="md-btn md-btn-primary" id="update_settings_unlock_request" href="javascript:void(0)" style="padding: 14px 25px;">Send Request</button></span>
                                                </div>
                                                <div class="uk-width-large-1-1 uk-width-medium-1-1" id="update_settings_unlock_request_message" style="display: none;">

                                                </div>
                                            </li>
                                        <?php endif ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--div class="uk-width-large-3-10">
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
                </div>-->
            </div>

        </form>

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
