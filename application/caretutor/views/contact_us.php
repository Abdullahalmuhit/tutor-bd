<?php echo $header; ?>
<body>

    <?php $this->load->view('frontend_menu'); ?>

    <section id="blog">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-md-3"></div>
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="well contact_us_div" style="margin: 0px; border: none !important; box-shadow: none !important; padding: 70px 0 40px 0;">
                        <p class="text-center page_title">Contact Us</p>
                        <form id="contact_us" data-link="landing/contact_us" class="form-horizontal margin_top" role="form">
                            <div class="col-xs-12 col-sm-12 col-md-12" id="msg" style="display: none;">

                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom input_margin_mobile">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" required="required" class="form-control" name="name" id="name" placeholder="Your Name">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom input_margin_mobile">	
                                <div class="form-group">
                                    <label for="email">Email Address</label>					    	
                                    <input type="email" class="form-control" required="required" id="email" name="email" placeholder="Your Email Address" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom input_margin_mobile">	
                                <div class="form-group">
                                    <label for="user_type">You Are</label>	
                                    <div class="select_label">					    	
                                        <select class="form-control" name="user_type" id="user_type" required="required">
                                            <option value="student"> Student</option>
                                            <option value="parent"> Parent</option>
                                            <option value="tutor"> Tutor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom input_margin_mobile">	
                                <div class="form-group">
                                    <label for="message_subject">Subject</label>  
                                    <div class="select_label">  			    	
                                        <select class="form-control" name="message_subject" id="message_subject" required="required">
                                            <option value="">Message Subject</option>
                                            <option value="i-want-to-give-a-feedback"> I want to give a feedback</option>
                                            <option value="i-have-an-issue"> I have an issue</option>
                                            <option value="i-have-an-inpuiry"> I have an inquiry</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom input_margin_mobile">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" rows="4" class="form-control" placeholder="Your Message Here..."></textarea>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 input_margin_mobile" align="center">
                                <div class="form-group">
                                    <button type="submit" id="contact_us_button" class="btn btn-caretutors">Send</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $footer; ?>