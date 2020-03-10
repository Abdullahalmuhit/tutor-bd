<!-- main header -->
<header id="header_main">
    <div class="header_main_content">
        <nav class="uk-navbar">
            <!-- main logo in header -->
            <div class="main_logo_top uk-hidden-small">
                <?php if ($this->session->userdata('user_type') == 'tutor') { ?>
                    <a href="<?php echo base_url('tutor/dashboard'); ?>">
                    <?php } elseif ($this->session->userdata('user_type') == 'guardian') { ?>
                        <a href="<?php echo base_url('parents/dashboard'); ?>">
                        <?php } ?>

                        <img src="<?php echo base_url(); ?>assets/img/caretutor_logo_white.png" alt="" height="15" width="200" class="">
                    </a>
            </div>
            <!-- main sidebar switch -->
            <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                <span class="sSwitchIcon"></span>
            </a>
            <!-- secondary sidebar switch -->
            <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                <span class="sSwitchIcon"></span>
            </a>

            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav user_actions">
                    <li data-uk-dropdown="{mode:'click'}">
                        <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE0BE;</i><span class="uk-badge"><?php echo $email_count; ?></span></a>
                        <?php if (count($email_count) > 0) { ?>
                            <div class="uk-dropdown uk-dropdown-xlarge uk-dropdown-flip uk-dropdown-scrollable">
                                <ul class="md-list md-list-addon">
                                    <?php
                                    foreach ($emails as $email) {
                                        if ($email['user_type'] == 'guardian') {
                                            $sender = 'G';
                                        } elseif ($email['user_type'] == 'tutor') {
                                            $sender = 'T';
                                        } else {
                                            $sender = 'A';
                                        }
                                        ?>
                                        <li style="margin-left: 64px;">
                                            <div class="md-list-addon-element">
                                                <span class="md-user-letters md-bg-cyan"><?php echo $sender; ?></span>
                                            </div>
                                            <div class="md-list-content">
                                                <?php if (($email['sender'] != $this->session->userdata('id')) && ($email['status'] == 'unread')) { ?>
                                                    <span class="uk-badge uk-badge-success">Unread</span>
                                                <?php } ?>
                                                <span class="md-list-heading" style="font-weight: normal;">
                                                    <?php if ($this->session->userdata('user_type') == 'tutor') { ?>
                                                        <a href="<?php echo base_url('tutor/email_list'); ?>"><?php echo substr($email['subject'], 0, 34); ?></a>
                                                    <?php } elseif ($this->session->userdata('user_type') == 'guardian') { ?>
                                                        <a href="<?php echo base_url('parents/email_list'); ?>"><?php echo substr($email['subject'], 0, 34); ?></a>
                                                    <?php } ?>
                                                </span>
                                                <span class="uk-text-small uk-text-muted"><?php echo substr($email['message_detail'], 0, 34); ?></span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <?php if ($this->session->userdata('user_type') == 'tutor') { ?>
                                    <a href="<?php echo base_url('tutor/email_list'); ?>" class="md-btn md-btn-flat md-btn-flat-primary md-btn-block js-uk-prevent uk-margin-small-top">Show All</a>
                                <?php } elseif ($this->session->userdata('user_type') == 'guardian') { ?>
                                    <a href="<?php echo base_url('parents/email_list'); ?>" class="md-btn md-btn-flat md-btn-flat-primary md-btn-block js-uk-prevent uk-margin-small-top">Show All</a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </li>

                    <li data-uk-dropdown="{mode:'click'}" id="notification_click">
                        <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><span class="uk-badge" id="notification_count"><?php echo $notification_count; ?></span></a>
                        <div class="uk-dropdown uk-dropdown-xlarge uk-dropdown-flip uk-dropdown-scrollable">
                            <ul class="md-list md-list-addon">
                                <?php foreach ($notifications as $notification) { ?>
                                    <li style="margin-left: 64px;">
                                        <div class="md-list-addon-element">
                                            <?php if ($notification['status'] == '0') { ?>
                                                <i class="md-list-addon-icon material-icons uk-text-danger">&#xE001;</i>
                                            <?php } else { ?>
                                                <i class="md-list-addon-icon material-icons uk-text-success">&#xE88F;</i>
                                            <?php } ?>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading" style="font-weight: normal;"><?php echo $notification['notification']; ?></span>
                                            <block><?php echo date('d/m/Y h:i a',strtotime($notification['created_at'])); ?></block>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>

                    <li data-uk-dropdown="{mode:'click'}">
                        <a href="#" class="user_action_image">
                            <?php
                            if ($this->session->userdata('user_type') == 'tutor') {
                                if (!empty($profile_pic_info) && $profile_pic_info['profile_pic'] != '') { ?>
                                    <img class="md-user-image" src="<?php echo base_url("assets/upload/" . $profile_pic_info['profile_pic']); ?>" />
                                <?php } else {
                                    ?>
                                    <img class="md-user-image" src="<?php echo base_url(); ?>assets/panel/img/avatars/user.png" alt=""/>
                                    <?php
                                }
                            } else {
                                ?>
                                <img class="md-user-image" src="<?php echo base_url(); ?>assets/panel/img/avatars/user.png" alt=""/>
                            <?php } ?>
                        </a>
                        <div class="uk-dropdown uk-dropdown-small uk-dropdown-flip">
                            <ul class="uk-nav js-uk-prevent">
                                <?php if ($this->session->userdata('user_type') == 'tutor') { ?>
                                    <!-- <li><a href="<?php echo base_url('tutor/profile_view'); ?>">My profile</a></li> -->
                                    <li><a href="<?php echo base_url('tutor/profile_plain_view'); ?>">View profile</a></li>
                                <?php } elseif ($this->session->userdata('user_type') == 'guardian') { ?>
                                    <li><a href="<?php echo base_url('parents/profile'); ?>">My profile</a></li>
                                <?php } ?>

                                <?php if ($this->session->userdata('user_type') == 'tutor') { ?>
                                    <li><a href="<?php echo base_url('tutor/settings'); ?>">Settings</a></li>
                                <?php } elseif ($this->session->userdata('user_type') == 'guardian') { ?>
                                    <li><a href="<?php echo base_url('parents/settings'); ?>">Settings</a></li>
                                <?php } ?>

                                <li><a href="<?php echo base_url(); ?>user/do_signout">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <?php echo $footer;?>
</header><!-- main header end -->
