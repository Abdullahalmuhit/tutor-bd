<?php echo $header; ?>
<body language="English" class="page-template page-template-template-howto page-template-template-howto-php page page-id-420 page-child parent-pageid-411  en LTR blog-1 how-to-videos sidebar-primary" dir="LTR" data-gr-c-s-loaded="true">
    
    <?php $this->load->view('frontend_menu'); ?>

    <section id="video_menu" class="visible-lg">
        <div class="container">
            
                    <nav class="navbar-default">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Bangla Medium</a></li>
                            <li><a href="#">English Medium</a></li>
                            <li><a class="active" href="#">University Admission Test</a></li>
                            <li><a href="#"> Language Learning </a></li>
                            <li><a href="#"> Skill Development </a></li>
                            <li><a href="#"> Religious Studies </a></li>
                            <li><a href="#"> Arts </a></li>
                            <li><a href="#"> Test Preparation </a></li>
                        </ul>
                    </nav>
           
        </div>
    </section>

    <section id="video_banner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <h3 class="banner_title">HOW TO VIDEOS</h3>
                    <p style="font-size: 24px; color: #fff;">Check out our step by step tutorials to learn how to use Caretutors</p>
                    <a href="#" class="btn btn_w_brdr" style="margin-top: 65px; margin-bottom: 48px;">Get Started</a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <img src="<?php echo base_url(); ?>assets/landing/img/video_banner.png">
                </div>
            </div>
        </div>
    </section>

    <div id="blog" style="padding-bottom: 0px!important;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <p class="text-center video_page_title">Caretutors How-To videos provide you with guidance on the various services</p>
                    <div class="howto-container">
                    <?php if(count($videos) > 0){?>
                        <div class="row">
                    
                        <?php
                        //var_dump($videos);
                        foreach ($videos as $video) {
                            ?>  


                            <div class="col-md-4 col-lg-4 col-sm-12">
                                <div class="howto">
                                    
                                    <div class="pretty-embed" data-pe-videoid="<?= $video->youtube_id; ?>" data-pe-fitvids="true"></div>
                                    <h3 class="video_title"><?= $video->heading_text; ?></h3>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        </div> 

                        <?php } ?>
                                              
                </div>
               
            </div>
        </div>
    </div>

    <?php echo $footer; ?>