<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>caretutors.com | Tutor Panel</title>

        <meta property="og:site_name" content="caretutors.com"/>
        <meta property="og:title" content="caretutors.com | Discover Tutors, Tutoring Jobs in Your Area"/>
        <meta property="og:description" content="The most advanced place in Bangladesh where a student can easily connect to the qualified Tutors. Our platform is to help students and parents to get the best Tutors according to their needs." />
        <meta property="og:image" content="<?php echo base_url(); ?>assets/img/caretutors_logo.png"/>


        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui-css.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/component.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sass-compiled.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />

        <link href="<?php echo base_url(); ?>assets/img/favicon.png" type="image/png" rel="icon">
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/demo.css" media="all" /> -->
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style -hover.css" media="all" /> -->
        <!--for hover-->


        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js" defer="defer"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js" defer="defer"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" defer="defer"></script>

        <script type="text/javascript">
            var BASE_URL = "<?php echo base_url(); ?>";
        </script>

        <script src="<?php echo base_url(); ?>assets/js/waypoints.min.js" defer="defer"></script>
        <script src="<?php echo base_url(); ?>assets/js/modernizr.custom.js" defer="defer"></script>
        <!-- <script type="text/javascript" src="assets/js/circles.min.js"></script>
        <script src="assets/js/custom.js" type="text/javascript"></script> -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modernizr.js" defer="defer"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js" defer="defer"></script>

<!-- <script>
        document.addEventListener("touchstart", function(){}, true);
</script> -->

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-56842288-1', 'auto');
            ga('send', 'pageview');

        </script>
    </head>
    <body>
        <div class="container-fluid">
            <div id="ha-header" class="ha-header ha-header-large">
                <div class="ha-header-perspective">
                    <div class="ha-header-front">
                        <div class="header">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 logo_container">
                                        <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" />
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <div class="visible-xs hidden-sm hidden-md hidden-lg">
                                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                            <ul class="nav navbar-nav">
                                                <li><a href="#">Hello <i><?php echo $this->session->userdata('full_name'); ?></i></a></li>
                                                <li><a href="<?php echo base_url(); ?>tutor/dashboard"><span><i class="fa fa-user"></i> </span>MY PROFILE</a></li>
                                                <li><a href="<?php echo site_url('tutor/internal_job_board/Invited'); ?>"><span><i class="fa fa-envelope"></i> </span>INBOX <?php if ($this->session->userdata('tutor_inbox')) { ?> <span class="badge" style="background-color:#FF0000;"><?php echo $this->session->userdata('tutor_inbox'); ?></span> <?php } ?></a></li>
                                                <li><a href="#"><span><i class="fa fa-file-text"></i> </span>BLOG</a></li>
                                                <li><a href="<?php echo base_url(); ?>landing/faq"><span><i class="fa fa-file-text"></i> </span>FAQ</a></li>
                                                <li><a href="<?php echo base_url(); ?>user/do_signout"><span><i class="fa fa-sign-out"></i> </span>SIGN OUT</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-9 collapse navbar-collapse pull-right">
                                        <div class="navbar-inner">
                                            <ul class="nav navbar-nav">
                                                <li><a href="#">Hello <i><?php echo $this->session->userdata('full_name'); ?></i></a></li>
                                                <li><a href="<?php echo base_url(); ?>tutor/dashboard"><span><i class="fa fa-user"></i> </span>MY PROFILE</a></li>
                                                <li><a href="<?php echo site_url('tutor/internal_job_board/Invited'); ?>"><span><i class="fa fa-envelope"></i> </span>INBOX <?php if ($this->session->userdata('tutor_inbox')) { ?> <span class="badge" style="background-color:#FF0000;"><?php echo $this->session->userdata('tutor_inbox'); ?></span> <?php } ?></a></li>
                                                <li><a href="#"><span><i class="fa fa-file-text"></i> </span>BLOG</a></li>
                                                <!-- <li><a href="#"><span><i class="fa fa-info-circle"></i> </span>HELP</a></li> -->
                                                <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><span><i class="fa fa-info-circle"></i> </span>HELP <i class="fa fa-angle-down"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="<?php echo base_url(); ?>#">BLOG</a></li>
                                                        <li><a target="_blank" href="<?php echo base_url(); ?>landing/faq">FAQ</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>user/do_signout"><span><i class="fa fa-sign-out"></i> </span>SIGN OUT</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>