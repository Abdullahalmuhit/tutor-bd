<?php defined('safe_access') or die('Restricted access!'); ?>
<div class="wrapper d-flex align-items-stretch">
        
        <!-- Page Content  -->
        <div id="content" class="">
            <section>
                <div class="container">
                    <div class="dashboard-right-side parent-profile-right-side">
                        <div class="tutor-profile-header text-center">
                            <h4>Profile</h4>
                        </div>
                                       
                      <div class="parent-profile-details">
                          <div class="profile-name">
                              <p>Full name</p>
                              <span><?php echo $user_info->full_name; ?></span>
                          </div>
                          <div class="profile-email">
                              <p>E-mail ID</p>
                              <span><?php echo $user_info->email; ?></span>
                          </div>
                          <div class="profile-mobile-no">
                              <p>Mobile No</p>
                              <span><?php echo $user_info->mobile_no; ?></span>
                          </div>
                      </div>
                       
                    </div>
                </div>
            </section>
        </div>
    </div>