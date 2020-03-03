	<!-- secondary sidebar -->
    <aside id="sidebar_secondary">
        <div class="sidebar_secondary_wrapper">
            <h4 class="heading_c uk-margin-bottom">Important Notes</h4>

            <ul class="md-list">
            	<li>
                	<div class="md-list-content">
                    	<span class="md-list-heading">
<?php
                            	if($this->session->userdata('user_type') == 'tutor'){ ?>
					<a href="<?php echo base_url('tutor/become_good_tutor'); ?>" target="_blank">> How to become a good tutor</a><br>
					<a href="<?php echo base_url('tutor/safety_guideline'); ?>" target="_blank">> Guidelines for Tutor</a><br>
					<a href="<?php echo base_url('tutor/tutors_tips'); ?>" target="_blank">> A few tips for Tutor</a>
                                <?php } elseif($this->session->userdata('user_type') == 'guardian'){ ?> 
					<a href="<?php echo base_url('parents/select_good_tutor'); ?>" target="_blank">How to select a good tutor</a>
                                <?php } ?>
                    		
                    	</span>
                    </div>
                </li>
            </ul>
        </div>
    </aside><!-- secondary sidebar end -->