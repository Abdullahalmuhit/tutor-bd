<?php defined('safe_access') or die('Restricted access!'); ?>

<div id="page_content">
        <div id="page_content_inner">

            <div class="md-card-list-wrapper" id="mailbox">
                <div class="uk-width-large-8-10 uk-container-center">
                    <div class="md-card-list">
                        <div class="md-card-list-header heading_list">All Messages</div>
                        <div class="md-card-list-header md-card-list-header-combined heading_list" style="display: none">All Messages</div>
                        <ul class="hierarchical_slide">
                            <?php foreach($emails as $email){ 
								$subject_emails = $subs_emails[$email['id']];
								$name_list = array();
								$dulpicate = array();
								$other_name = '';
								foreach($subject_emails as $subject_email){
									if(in_array($subject_email['full_name'], $dulpicate))
									{
										
									}else{
										if($subject_email['full_name'] == $this->session->userdata('full_name')){
											$name = "me";
										}else{
											$other_name = $subject_email['full_name'];
											$name = $subject_email['full_name'];
										}
										array_push($name_list, $name);
									}
									array_push($dulpicate, $subject_email['full_name']);
								}
	                    	?>
	                    	<li data-thread_id="<?php echo $email['id']; ?>">
	                            <span class="md-card-list-item-date"><?php echo $email['created_at']; ?></span>
	                            <div class="md-card-list-item-avatar-wrapper">
	                            	<?php if(($email['sender'] != $this->session->userdata('id')) && ($email['status'] == 'unread')){ ?>
	                            	<span class="uk-badge uk-badge-danger uk-margin-small-top">Unread</span>
	                            	<?php } ?>
	                            </div>
	                            <div class="md-card-list-item-sender">
	                                <span><?php echo implode(",",$name_list); ?></span>
	                            </div>
	                            <div class="md-card-list-item-subject">
	                                <div class="md-card-list-item-sender-small">
	                                    <span><?php echo implode(", ",$name_list); ?></span>
	                                </div>
	                                <span><?php echo $email['subject']; ?></span>
	                            </div>
	                            <div class="md-card-list-item-content-wrapper">
	                                <div class="md-card-list-item-content">
	                                	<div class="uk-grid" data-uk-grid-margin>
					                        <div class="uk-width-medium-1-1">
					                            <ul class="md-list md-list-addon">
					                            	<?php foreach ($subject_emails as $subject_email){
					                            		$sender = '';
					                            		if($subject_email['sender'] == $this->session->userdata('id')){
					                            			$sender = '<span class="md-card-list-item-avatar md-bg-grey">U</span>';
					                            		}else{
					                            			$sender = '<span class="md-card-list-item-avatar md-bg-light-green">'.substr($other_name,0,1).'</span>';
					                            		}
					                            	?>
					                            		<li>
						                                    <div class="md-card-list-item-avatar-wrapper">
						                                        <?php echo $sender; ?>
						                                    </div>
						                                    <div class="md-list-content">
						                                        <span class="md-list-heading"><?php echo $subject_email['message_detail']; ?></span>
						                                        <span class="uk-text-small uk-text-muted"><?php echo $subject_email['created_at']; ?></span>
						                                    </div>
						                                </li>
					                            	<?php } ?>
					                            </ul>
					                        </div>
					                        <div class="uk-width-medium-1-1 uk-text-center" id="reply_email_message_<?php echo $email['id']; ?>">
					                        	
					                        </div>
					                    </div>
	                                </div>
	                                <form class="md-card-list-item-reply">
	                                    <label for="mailbox_reply_784">Reply to <span><?php echo $email['email']; ?></span></label>
	                                    <textarea class="md-input md-input-full" name="mailbox_reply" id="mailbox_reply_<?php echo $email['id']; ?>" cols="30" rows="4"></textarea>
	                                    <button class="md-btn md-btn-primary reply_email" data-thread_id="<?php echo $email['id']; ?>" data-receiver="<?php echo $email['sender']; ?>">Send</button>
	                                    <span id="loader_span_<?php echo $email['id']; ?>" style="display: none;">Please wait...<i class="uk-icon-cog uk-icon-medium uk-icon-spin"></i></span>
	                                </form>
	                            </div>
	                        </li>
	                    	<?php } ?> 
                            <li data-thread_id="0">
	                            <span class="md-card-list-item-date">20 Jul</span>
	                            <div class="md-card-list-item-sender">
	                                <span>Caretutor</span>
	                            </div>
	                            <div class="md-card-list-item-subject">
	                                <div class="md-card-list-item-sender-small">
	                                    <span>Caretutor</span>
	                                </div>
	                                <span>Welcome to caretutor</span>
	                            </div>
	                            <div class="md-card-list-item-content-wrapper">
	                                <div class="md-card-list-item-content">
	                                    Thank you for creating your account on Caretutor.                                    
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