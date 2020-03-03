<?php defined('safe_access') or die('Restricted access!'); ?>
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
			                                <li class="uk-active uk-width-1-2"><a href="#">Password Change</a></li>
			                                <li class="uk-width-1-2"><a href="#">Phone Number Change</a></li>
			                            </ul>
			                            <ul id="tabs_1" class="uk-switcher uk-margin-large">
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
							                        <div class="uk-width-large-1-1 uk-width-medium-1-1">
							                        	<div class="uk-form-row ">
							                        		<span class="uk-float-right"><a class="md-btn md-btn-success" id="check_password" href="javascript:void(0)" style="padding: 10px 25px;">Check</a></span>
							                        	</div>
							                        </div>
							                        
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
						                                    <button type="button" id="update_password" style="padding: 10px 25px;" class="md-btn md-btn-primary disabled" >Update</button>
						                                </div>
							                        </div>
							                    </div>
			                                </li>
			                                <li>
			                                	<div class="uk-grid" data-uk-grid-margin>
							                        <div class="uk-width-large-1-1 uk-width-medium-1-1" style="padding-top: 5px;">
							                            <div class="uk-form-row">
							                                <label>Mobile No.</label>
							                                <input type="text" class="md-input" id="mobile_no" value="<?php echo $user_data->mobile_no; ?>"/>
							                                
							                            </div>
							                        </div>
							                        <div class="uk-width-large-1-1 uk-width-medium-1-1" id="mobile_no_message" style="display: none;">
							                        	
							                        </div>
							                         <div class="uk-width-large-1-1 uk-width-medium-1-1">
							                        	<div class="uk-form-row uk-float-right">
							                        		<a style="padding: 10px 25px;" class="md-btn md-btn-primary" id="update_mobile_no" href="javascript:void(0)">Update</a>
							                        	</div>
							                        </div>
							                    </div>
			                                </li>
			                            </ul>
			                        </div>
			                    </div>
			                </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
    <div class="uk-modal" id="mailbox_new_message">
	    <div class="uk-modal-dialog">
	        <button class="uk-modal-close uk-close" type="button"></button>
	
	            <div class="uk-modal-header">
	                <h3 class="uk-modal-title">Upload credentials</h3>
	            </div>
	            <div class="uk-width-1-1" id="message">
	            	
	            </div>
	            <input type="hidden" name="file_name" id="file_name" />
	            <div class="uk-margin-medium-bottom">
	                <label for="mail_new_to">Name of the credential</label>
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
			                <a class="uk-form-file md-btn">choose file<input id="file_upload-select" type="file"></a>
			            </div>
			        </div>
	            </div>
	            <div id="mail_progressbar" class="uk-progress uk-hidden">
	                <div class="uk-progress-bar" style="width:0">0%</div>
	            </div>
	            <div class="uk-modal-footer">
	                <a class="uk-float-right md-btn md-btn-primary btnup upload_credential_button" href="javascript:void(0)" id="upload_credential_button">Send</a>
	            </div>
	
	    </div>
	</div>