<?php defined('safe_access') or die('Restricted access!'); ?>

    <div id="page_content">
        <div id="page_heading">
            <h1>Best five CVs</h1>
        </div>
        <div id="page_content_inner">
			
			<!-- Tutor Card -->
			<div class="uk-grid uk-grid-medium uk-grid-width-medium-1-2 uk-grid-width-large-1-5 uk-sortable sortable-handler" data-uk-sortable data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}">
				<?php
				for($i = 1; $i<=5; $i++)
				{
					$selected = $i == 3?'head_green':'head_blue';
					$button_text = $i == 3?'<i class="uk-icon-check uk-text-muted"></i> Selected':'Select me';
					$button_cls = $i == 3?'md-btn-primary':'md-btn-success';
					
				?>
				<div>
                    <div class="md-card">
                        <div class="md-card-head <?php echo $selected; ?>">
                            <div class="md-card-head-menu" data-uk-dropdown>
                                <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                                <div class="uk-dropdown uk-dropdown-small uk-dropdown-flip">
                                    <ul class="uk-nav">
                                        <li><a href="#">Tutor profile</a></li>
                                        <li><a href="#" class="uk-text-success">Select tutor</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="uk-text-center">
                                <img class="md-card-head-avatar" src="<?php echo base_url();?>assets/panel/img/avatars/avatar_11.png" alt=""/>
                            </div>
                            <h3 class="md-card-head-text uk-text-center">
                                <?php echo 'Shahanaj Bazpei '.$i; ?>

                                <span><?php echo $i.'@gmail.com'; ?></span>
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <ul class="md-list md-list-addon">
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons">&#xE158;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><?php echo $i.'@gmail.com'; ?></span>
                                        <span class="uk-text-small uk-text-muted">Email</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><?php echo $i.'234987'; ?></span>
                                        <span class="uk-text-small uk-text-muted">Phone</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon uk-icon-facebook-official"></i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">facebook.com/envato</span>
                                        <span class="uk-text-small uk-text-muted">Facebook</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon uk-icon-twitter"></i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">twitter.com/envato</span>
                                        <span class="uk-text-small uk-text-muted">Twitter</span>
                                    </div>
                                </li>
                            </ul>
                            <a class="md-btn <?php echo $button_cls; ?> uk-width-1-1" href="#"><?php echo $button_text;?></a>
                        </div>
                    </div>
                </div>	
				<?php
				}
				?>
				
            </div>

        </div>
    </div>