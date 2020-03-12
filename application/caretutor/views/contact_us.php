<?php echo $header; ?>
<body>

    <?php $this->load->view('frontend_menu'); ?>
    <section class="faq-area contact-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="faq-title-wrapper contact-tittle-warper">
                        <h2>Contact</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><span><i class="fas fa-chevron-right"></i></span>Contact</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="faq-main-area contact-main-area ">
        <div class="container">
            <div class="form-outer">
                <div class="form-inner">
                     <form id="contact_us" data-link="landing/contact_us" class="form-horizontal margin_top" role="form">

                        <div class="row faq-form">
                            <div class="form-group col-md-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="">
                            </div>
                            
                            <div class="form-group col-md-6">
                                  <label for="user_type">You Are</label>	
                                    <div  class="select_label">					    	
                                        <select class="form-control" name="user_type" id="user_type" required="required">
                                            <option value="student"> Student</option>
                                            <option value="parent"> Parent</option>
                                            <option value="tutor"> Tutor</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group col-md-6">
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
                            <div class="form-group col-md-12 help-label">
                                <label for="">how can we help?</label>
                                <textarea class="form-control"  name="message" id="message" rows="3"></textarea>
                            </div>

                            <button type="submit" id="contact_us_button" class="btn faq-submit-btn">Submit</button>

                        </div>
                    </form>
                </div>
            </div>


        </div>
    </section>
<?php echo $footer; ?>