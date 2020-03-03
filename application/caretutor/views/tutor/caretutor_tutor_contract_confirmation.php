
<div id="page_content">
    <div id="page_content_inner">
        <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="md-card-toolbar toolbar_blue" <?php echo ($assigned_jobs? '':'style="padding:0px;"'); ?> >
                        <h3 class="md-card-toolbar-heading-text">
                            Contract Confirmation Letter
                        </h3>
                        <?php
                        if ($assigned_jobs) { 
                            foreach ($assigned_jobs as $job) {
                                ?>
                                <div class="uk-float-right " style="margin-top: 10px;">
                                    <a class="md-btn md-btn-success"  target="_blank" href="<?php echo base_url(); ?>tutor/generate_contract_letter/<?php echo $job->id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;Download&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                </div>

                            </div>
                            <div class="user_content">
                                <div class="con-heading">
                                    <h3 class="con-headting-text">Tuition Confirmation Letter</h3>

                                </div>

                                <div class="col-md-6 uk-body-letter">
                                    Dear Tutor &amp; Employer,<br/><br/>
                                    We <b>Caretutors.com</b> are very happy to match you both for Job ID <?php echo $job->id; ?>. The vacancy details are
                                    in the following:
                                </div>
                                <div class="con-heading">
                                    <h3 class="con-headting-text">Tuition Vacancy Details</h3>
                                </div>
                                <div class="col-md-6">

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1 uk-width-large-1-1">
                                            <span class="uk-text-bold uk-job-id">Job ID : <?php echo $job->id; ?></span>
                                            <h3 class="uk-margin-top-remove uk-margin-bottom-remove">Need a tutor for <?php echo $job->sub_cat; ?> student</h3>
                                            <span class="uk-text-bold">Category:</span><span> <?php echo $job->category; ?>, </span><span class="uk-text-bold">Class:</span><span> <?php echo $job->sub_cat; ?>, </span><span class="uk-text-bold">Gender:</span><span> <?php echo $job->student_gender; ?></span>
                                            <p>
                                                <span class="uk-text-bold">Days per week:</span><span> <?php echo $job->days_per_week; ?>, </span><span class="uk-text-bold">Salary:</span><span> Tk. <?php echo $job->salary_range; ?>, </span><span class="uk-text-bold">Tuition gender preference:</span><span> <?php echo $job->preferred_gender; ?></span><br>
                                                <span class="uk-text-bold">Subjects:</span><span> <?php echo $job->subs; ?></span>
                                            </p>
                                            <p>
                                                <i class="uk-icon-map-marker uk-text-primary"></i><span> <?php echo $job->city; ?>, <?php echo $job->location; ?> </span>
                                            </p>
                                            <p>
                                                <span class="uk-text-bold">Other requirements:</span><span> <?php echo (!empty($job->other_req)) ? $job->other_req : "N/A"; ?> </span>
                                            </p>
                                        </div>

                                        <div class="uk-width-medium-1-1 uk-width-large-1-1">
                                            <p><span class="uk-text-bold">Employer Name : </span> Mr / Mrs <?php echo $job->guardian_name; ?></p>
                                            <p><span class="uk-text-bold">Guardian Phone : </span> <?php echo $job->add_contact_num; ?></p>
                                            <p><span class="uk-text-bold">Guardian ID : </span> <?php echo $job->parent_id; ?></p>
                                            <p><span class="uk-text-bold">Tutor Name : </span> Mr / Mrs <?php echo $user_data->full_name; ?></p>
                                            <p><span class="uk-text-bold">Tutor Phone : </span> <?php echo $user_data->mobile_no; ?></p>
                                            <p><span class="uk-text-bold">Tutor ID : </span> <?php echo $user_data->id; ?></p>
                                            <p><span class="uk-text-bold">Date of Hiring : </span> <?php
                                                $hire_date = strtotime($job->date_to_hire);
                                                $format_hire_date = date('j F Y', $hire_date);
                                                echo $format_hire_date;
                                                ?></p>                                        
                                        </div>

                                        <div class="uk-width-medium-1-1 uk-width-large-1-1">
                                            <p># Both parties match with each other by using <b>caretutors.com's</b> platform &amp; knowing its <b><a href="<?= base_url(); ?>landing/terms_and_conditions" target="_blank">Terms of Use and Privacy Policy</a></b>.</p>

                                        </div>
                                        <div class="uk-width-medium-1-1 uk-width-large-1-1">
                                            <div class="uk-signature-part2">
                                                <span class="uk-text-bold uk-job-id">Employer Name : </span><br/>
                                                <p><?php echo $job->guardian_name; ?></p>
                                                <p class="uk-signature"><span>Signature:.........................</span></p>
                                                <p class="uk-signature"><span>Date:.............................</span></p>
                                            </div>
                                            <div class="uk-signature-part1">
                                                <span class="uk-text-bold uk-job-id">Tutor Name : </span><br/>
                                                <p><?php echo $user_data->full_name; ?></p>
                                                <p class="uk-signature"><span>Signature:.........................</span></p>
                                                <p class="uk-signature"><span>Date:.............................</span></p>
                                            </div>

                                        </div>
                                        <div class="uk-width-medium-1-1 uk-width-large-1-1 uk-text-space">
                                            <span class="uk-text-bold uk-job-id">Note: </span>Caretutors.com is an online tutor matching platform. Our process is done virtually. Hence, we
                                            strongly recommend both parties to check our <b><a href="<?= base_url(); ?>landing/terms_and_conditions" target="_blank">Terms of Use and Privacy Policy</a></b> precisely. For any further assistance, we request to contact our support service
                                            (01756441122).
                                        </div>
                                        <div class="uk-width-medium-1-1 uk-width-large-1-1 uk-thank-you-text">
                                            <p><u>Thank you for using our platform</u></p>
                                        </div>
                                        
                                    </div>
                                    <hr/>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php } else {
                        ?>

                     

                        <div class="user_content" style="background-color: #fff;">
                          
                             <div class="col-md-6">
                                No data available
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>