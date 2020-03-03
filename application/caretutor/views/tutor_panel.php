<?php
    define('safe_access',true);
    //include('php/variables.php');
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/panel/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/panel/img/favicon-32x32.png" sizes="32x32">

    <title>caretutors.com <?php echo get_variable('app_version'); ?></title>

	<?php 
		if (isset($css)) {
		    echo '    <!-- additional styles for plugins -->';
		    echo $css;
		}; 
		echo get_variable('common_styles'); 
		$dist_min = get_variable('dist_min');
	?>

</head>
<body class="sidebar_main_open<?php if(isset($body_class)) echo ' '.$body_class; ?>">
	
	<?php $this->load->view('partials/tutor_header'); ?>

	<?php $this->load->view('partials/tutor_sidebar'); ?>

	<?php 
		$resources = get_page_resource($includePage);
		$this->load->view("tutors/".$resources['includePage']);
	
	?>
	
    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- momentJS date library -->
    <script src="<?php echo base_url();?>assets/bower_components/moment/min/moment.min.js"></script>
    
    <!-- superslides slider -->
    <!-- common functions -->
    <script src="<?php echo base_url();?>assets/panel/js/common<?php echo $dist_min; ?>.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url();?>assets/panel/js/uikit_custom<?php echo $dist_min; ?>.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url();?>assets/panel/js/altair_admin_common<?php echo $dist_min; ?>.js"></script>
    
     <!-- parsley (validation) -->
    <!--<script>
    altair_forms.parsley_validation_config();
    </script>
    <script src="<?php echo base_url();?>assets/bower_components/parsleyjs/dist/parsley<?php echo $dist_min; ?>.js"></script>
    
    
    <script src="<?php echo base_url();?>assets/panel/js/pages/forms_validation<?php echo $dist_min; ?>.js"></script>
    -->
	<script src="<?php echo base_url();?>assets/js/job_filter.js"></script>
	<script>var BASE_URL = "<?php echo base_url();?>";</script>
	<?php 
		if (isset($resources['scripts'])) {
			echo '    <!-- page specific plugins -->';
			echo $resources['scripts'];
		}; 
	?>

    <!-- enable hires images -->
    <script>
        $(function() {
            altair_helpers.retina_images();
        });
    </script>

	<?php if( isset($_GET["release"]) && $_GET["release"] == true ) { ?>
	    <script>
	        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	        ga('create', 'UA-65191727-1', 'auto');
	        ga('send', 'pageview');
	    </script>
	<?php }; ?>
</body>
</html>