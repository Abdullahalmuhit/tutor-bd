
<?php echo $header; ?>
    <!--Faq Area Start-->
    <?php $this->load->view('frontend_menu'); ?>
    <section class="faq-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="faq-title-wrapper">
                        <h2>Tution Terminal CAREERS </h2>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><span><i class="fas fa-chevron-right"></i></span>Tution Terminal Careers</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>

    </section>


    <!--Career Area Start-->
    <section class="career-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="career-item-warper">
                        <div class="career-title">
                            <h2>Operation Manager Needed for Social Media Web Portal</h2>
                        </div>
                        <div class="career-title-bottom">
                            <ul class="nav">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Location: <strong>Dhaka</strong> </span>
                                </li>
                                <li>
                                    <i class="far fa-lightbulb"></i>
                                    <span>Experience: <strong>3-5 Year(s)</strong> </span>
                                </li>
                                <li>
                                    <i class="fas fa-dollar-sign"></i>
                                    <span>Salary: <strong> TAKA 20000 - 25000 per month</strong> </span>
                                </li>
                            </ul>
                            <!-- <div class="keyskills_block">
                                <span class="keyname">Key Skills:</span>
                                <span class="keytext">Portal Management, Web Portal Operation, Web Portal Manager, Web Project Manager, Operations Manager</span>
                            </div>-->
                        </div>
                        <div class="career-body career-details-body">
                            <div class="vacancy_block">No of Vacancy: <span>1</span></div>
                            <div class="details_block">
                                <h4>Job Description</h4>

                                <p>
                                    InfluGlue, Leading Influencer Marketing platform, is looking for an experienced Social Media Marketing Specialist to work as "Manager" to manage the entire operation of the platform.</p>

                                <p>
                                    Job roles involve checking influencer social media profiles, updating the same in the portal, communicating with influencers for various client campaigns, get the job done, and reporting to the customers with all social media assets created by different influencers. Both email and telephonic communication needed as and when required.</p>

                                <p>
                                    The job also involves promoting our platform on different social media platforms and other activities like email marketing.&nbsp;</p>

                                <p>
                                    The sales part is not involved in the job role, but project execution is.</p>

                            </div>

                        </div>
                        <div class="details-kyeskill">
                            <h4>Key Skills</h4>
                            <span class="keytext">Portal Management, Web Portal Operation, Web Portal Manager, Web Project Manager, Operations Manager</span>
                        </div>
                        <div class="candidate-details-block">
                            <h4>Candidate Details</h4>
                           
                            <p>
                                We are looking for a qualified lady who writes good email messages and manage things well and have excellent technical knowledge.</p>
                           
                            <p>
                                This job can be managed by working partially from home also. We have flexible WFH policies.</p>
                           
                            <p>
                                Please apply with a good covering letter as why do you think you can do this job</p>
                           
                        </div>
                        <div class="carrer-footer">
                            <div class="career-footer-btn text-center">

                                <button type="button" class="btn  details-apply-btn">Apply Now</button>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-3">
                    <div class="need_tutor_box">
                        <h2>Need a Tutor?</h2>
                        <div class="inner">
                            <p>We can help you find matching tutors and institutes just under 60 seconds.</p>
                            <a href="job-board.html" class="start_btn_side" target="_blank">Start Now</a>
                        </div>
                    </div>
                    <div class="career-social-block">
                        <div class="social_btn"><a href="#" target="_blank"><img src="images/fbbutton.png" alt=""></a></div>
                        <div class="social_btn"><a href="#" target="_blank"><img src="images/gplusbutton.png" alt=""></a></div>
                        <div class="social_btn"><a href="#" target="_blank"><img src="images/twitter_button.png" alt=""></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Career Area End-->

    <!--Footer-area-start-->
  

    <script>
        function toggleIcon(e) {
            $(e.target)
                .prev('.panel-heading')
                .find(".more-less")
                .toggleClass('glyphicon-plus glyphicon-minus');
        }
        $('.panel-group').on('hidden.bs.collapse', toggleIcon);
        $('.panel-group').on('shown.bs.collapse', toggleIcon);

    </script>

    <?php echo $footer; ?>
