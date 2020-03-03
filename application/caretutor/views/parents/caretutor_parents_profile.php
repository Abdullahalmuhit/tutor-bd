<?php defined('safe_access') or die('Restricted access!'); ?>
<div id="page_content">
    <div id="page_content_inner">
        <div class="md-card">
        	<div class="md-card-toolbar toolbar_gray">
                <h3 class="md-card-toolbar-heading-text">
                    Profile
                </h3>
            </div>
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-1-1">
                        <ul class="md-list md-list-addon">
                            <li>
                                <div class="md-list-content">
                                    <span class="uk-text-small uk-text-muted">Full name</span>
                                    <span class="md-list-heading"><?php echo $user_info->full_name; ?></span>
                                    
                                </div>
                            </li>
                            <li>
                                <div class="md-list-content">
                                    <span class="uk-text-small uk-text-muted">E-mail ID</span>
                                    <span class="md-list-heading"><?php echo $user_info->email; ?></span>
                                    
                                </div>
                            </li>
                            <li>
                                <div class="md-list-content">
                                    <span class="uk-text-small uk-text-muted">Mobile No.</span>
                                    <span class="md-list-heading"><?php echo $user_info->mobile_no; ?></span>                                 
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>