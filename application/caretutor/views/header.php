<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Discover tutor & tutoring job in your area. Get tutor for Home Tutoring, Group Tutoring & Online Tutoring</title>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-T939DFN');

    </script>
    <!-- End Google Tag Manager -->
    <?php
     	if(isset($single))
		{
			if(count($job)>0)
			{
	?>
    <meta property="og:site_name" content="caretutors.com" />
    <meta property="og:title" content="<?php echo 'Need a tutor for '. $job[0]->sub_cat .' student'; ?>" />
    <meta property="og:description" content="<?php echo 'Salary: '. $job[0]->salary_range .' Tk.'; ?>" />
    <meta property="og:image" content="<?php echo base_url().'assets/img/caretutors_logo.png'; ?>" />
    <?php
			}
		}
        else
	{
	?>
    <meta property="og:site_name" content="caretutors.com" />
    <meta property="og:title" content="caretutors.com | Discover Tutors, Tutoring Jobs in Your Area" />
    <meta property="og:description" content="Caretutors.com is Bangladesh's first-ever & most trusted leading online platform for tutors & students. It helps student/parents to find verified & skilled tutors in-person & online in 12 different categories since 2012." />
    <meta property="og:image" content="<?php echo base_url();?>assets/img/caretutors_logo.png" />
    <?php
	}
     ?>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon.png" />




    <script type="text/javascript">
        var BASE_URL = "<?php echo base_url();?>";

    </script>
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
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

    <!-- Begin Inspectlet Embed Code -->
    <script type="text/javascript" id="inspectletjs">
        window.__insp = window.__insp || [];
        __insp.push(['wid', 1702283534]);
        (function() {
            function ldinsp() {
                if (typeof window.__inspld != "undefined") return;
                window.__inspld = 1;
                var insp = document.createElement('script');
                insp.type = 'text/javascript';
                insp.async = true;
                insp.id = "inspsync";
                insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js';
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(insp, x);
            };
            setTimeout(ldinsp, 500);
            document.readyState != "complete" ? (window.attachEvent ? window.attachEvent('onload', ldinsp) : window.addEventListener('load', ldinsp, false)) : ldinsp();
        })();

    </script>

    <!--Google fonts-->

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap" rel="stylesheet">

    <!--new CSS-->


    <!-- Font Awesome CSS -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!--Bootstrap CSS-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--Fancybox css-->

    <link rel="stylesheet" href="<?php echo base_url();?>assets/landing/new/css/jquery.fancybox.min.css">

    <!--Swiper slider CSS-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/landing/new/css/swiper.min.css">

    <!--owl carosuel css/js-->
    <script src="<?php echo base_url(); ?>assets/landing/new/js/jquery.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/landing/new/js/script.js"></script>

    <script src="<?php echo base_url(); ?>assets/landing/new/js/new-script.js"></script>

    <script src="<?php echo base_url(); ?>assets/landing/new/js/owl.js"></script>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/landing/new/css/owl.css">

    <!--Main CSS-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/landing/new/css/style.css">



    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
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

    <!-- Begin Inspectlet Embed Code -->
    <script type="text/javascript" id="inspectletjs">
        window.__insp = window.__insp || [];
        __insp.push(['wid', 1702283534]);
        (function() {
            function ldinsp() {
                if (typeof window.__inspld != "undefined") return;
                window.__inspld = 1;
                var insp = document.createElement('script');
                insp.type = 'text/javascript';
                insp.async = true;
                insp.id = "inspsync";
                insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js';
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(insp, x);
            };
            setTimeout(ldinsp, 500);
            document.readyState != "complete" ? (window.attachEvent ? window.attachEvent('onload', ldinsp) : window.addEventListener('load', ldinsp, false)) : ldinsp();
        })();

    </script>
    <!-- End Inspectlet Embed Code -->

</head>
