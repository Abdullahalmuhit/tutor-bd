<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('get_variable'))
{
    function get_variable($var)
    {
    	$app_version = 'v1.0.0';
    	$base_url = get_instance()->config->base_url();
    	$bower_url = $base_url.'assets/bower_components';
    	$kendo_url = $base_url.'assets/bower_components/kendo-ui-core/js';

    	$img_path = $base_url.'assets/panel/img';

    	// check if files are generated to /desc folder
    	$dist_min = isset($_GET["generate"]) ? '.min' : '';

    	$common_styles = '
            <!-- uikit -->
            <link rel="stylesheet" href="'. $bower_url .'/uikit/css/uikit.almost-flat'.$dist_min.'.css" media="all">

            <!-- flag icons -->
            <link rel="stylesheet" href="'.$base_url.'assets/panel/icons/flags/flags'.$dist_min.'.css" media="all">

            <!-- altair admin -->
            <link rel="stylesheet" href="'.$base_url.'assets/panel/css/main'.$dist_min.'.css" media="all">
            <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
        ';

    	return $$var;
    }
}

if (!function_exists('get_page_resource'))
{
	function get_page_resource($sPage = '')
	{
		$sPage = $sPage==''?'index':$sPage;

		$page_resources = array();

		if(substr($sPage, 0, 9 ) === "caretutor")
		{
			$caretutor_sPage = explode("_", $sPage, 2);

			$page_resources['includePage'] = 'caretutor_'. $caretutor_sPage[1];

			$dist_min = get_variable('dist_min');
			$base_url = get_variable('base_url');
			$bower_url = get_variable('bower_url');

			//if($caretutor_sPage[1] == 'job_edit')
			//{
				$scripts = '<!--  product edit functions -->
					<script src="'.$base_url.'assets/panel/js/pages/ecommerce_product_edit'.$dist_min.'.js"></script>
					<!-- inputmask-->
    				<script src="'.$bower_url.'/jquery.inputmask/dist/jquery.inputmask.bundle'.$dist_min.'.js"></script>
					<script src="'.$base_url.'assets/panel/js/pages/forms_advanced'.$dist_min.'.js"></script>
					';
			//}

			if ($caretutor_sPage[1] == 'tutor_add_profile')
			{
				$scripts .= '<!-- page specific plugins -->
						    <!-- file input -->

						    <script src="'.$base_url.'assets/panel/js/custom/uikit_fileinput'.$dist_min.'.js"></script>

						    <!--  user edit functions -->
						    <script src="'.$base_url.'assets/panel/js/pages/page_user_edit'.$dist_min.'.js"></script>
							<script src="'.$base_url.'assets/bower_components/handlebars/handlebars'. $dist_min.'.js"></script>
							<script src="'.$base_url.'assets/panel/js/custom/handlebars_helpers'. $dist_min.'.js"></script>
							<script src="'.$base_url.'assets/panel/js/pages/components_notifications'.$dist_min.'.js"></script>
							<script src="'.$base_url.'assets/panel/js/add_more.js"></script>
                            <script src="'.$base_url.'assets/panel/js/tutor_profile_add_edit.js"></script>
							<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
                            <script src="'.$base_url.'assets/js/croppie.js"></script>
							'
							;
			}

			elseif ($caretutor_sPage[1] == 'tutor_profile_view')
			{

				$scripts .= '<!-- page specific plugins -->
							<script src="'.$base_url.'assets/panel/js/pages/page_user_profile'.$dist_min.'.js"></script>
							<script src="'.$base_url.'assets/bower_components/magnific-popup/dist/jquery.magnific-popup'.$dist_min.'.js"></script>
							<script src="'.$base_url.'assets/panel/js/tutor_profile_view.js"></script>
							<script src="'.$base_url.'assets/panel/js/select_tutor.js"></script>
							'
							;
			}
			elseif ($caretutor_sPage[1] == 'tutor_profile_plain_view')
			{

				$scripts .= '<!-- page specific plugins -->
							<script src="'.$base_url.'assets/panel/js/pages/page_user_profile'.$dist_min.'.js"></script>
							<script src="'.$base_url.'assets/bower_components/magnific-popup/dist/jquery.magnific-popup'.$dist_min.'.js"></script>
							<script src="'.$base_url.'assets/panel/js/tutor_profile_view.js"></script>
							<script src="'.$base_url.'assets/panel/js/select_tutor.js"></script>
							'
							;
			}

			elseif ($caretutor_sPage[1] == 'tutor_my_stats')
			{
				$scripts .= '<!-- page specific plugins -->
							<script src="'.$base_url.'assets/panel/js/give_test.js"></script>
							<script src="'.$base_url.'assets/panel/js/my_stat.js"></script>
							<script src="'.$base_url.'assets/bower_components/handlebars/handlebars'. $dist_min.'.js"></script>
							<script src="'.$base_url.'assets/panel/js/custom/handlebars_helpers'. $dist_min.'.js"></script>
							'
							;
			}

			elseif($caretutor_sPage[1] == 'parents_email_list')
			{
				$scripts .= '
							<!-- page specific plugins -->
							<script src="'.$base_url.'assets/panel/js/pages/page_mailbox.js"></script>
							<script src="'.$base_url.'assets/panel/js/reply_email.js"></script>';
			}
			elseif ($caretutor_sPage[1] == 'tutor_email_list') {
				$scripts .= '
							<!-- page specific plugins -->
							<script src="'.$base_url.'assets/panel/js/pages/page_mailbox.js"></script>
							<script src="'.$base_url.'assets/panel/js/reply_email.js"></script>';
			}
			elseif($caretutor_sPage[1] == 'parents_dashboard')
			{
				$scripts .= '
							<!-- page specific plugins -->
							<script src="'.$base_url.'assets/panel/js/select_tutor.js"></script>';
			}
			elseif($caretutor_sPage[1] == 'tutor_settings')
			{
				$scripts .= '
							<!-- page specific plugins -->
							<script src="'.$base_url.'assets/panel/js/settings_page_tutor.js"></script>';
			}
			elseif($caretutor_sPage[1] == 'parents_settings')
			{
				$scripts .= '
							<!-- page specific plugins -->
							<script src="'.$base_url.'assets/panel/js/settings_page_parents.js"></script>';
			}
			elseif($caretutor_sPage[1] == 'tutor_invoice_list')
			{
				$scripts .= '
							<!-- page specific plugins -->
							<script src="'.$base_url.'assets/bower_components/handlebars/handlebars'. $dist_min.'.js"></script>
							<script src="'.$base_url.'assets/panel/js/custom/handlebars_helpers'. $dist_min.'.js"></script>
							<script src="'.$base_url.'assets/panel/js/pages/page_invoices'.$dist_min.'.js"></script>
							<script src="'.$base_url.'assets/panel/js/pay_bill.js"></script>';
			}
                        elseif($caretutor_sPage[1] == 'tutor_verify_invoice_list')
			{
				$scripts .= '
							<!-- page specific plugins -->
							<script src="'.$base_url.'assets/bower_components/handlebars/handlebars'. $dist_min.'.js"></script>
							<script src="'.$base_url.'assets/panel/js/custom/handlebars_helpers'. $dist_min.'.js"></script>
							<script src="'.$base_url.'assets/panel/js/pages/page_verify_invoice'.$dist_min.'.js"></script>
							<script src="'.$base_url.'assets/panel/js/pay_bill.js"></script>';
			}
			elseif($caretutor_sPage[1] == 'parents_select_good_tutor')
			{
				$scripts .= '
							<!-- page specific plugins -->
							<script src="'.$base_url.'assets/panel/js/pages/page_help'.$dist_min.'.js"></script>';
			}
			elseif ($caretutor_sPage[1] == 'parents_tutor_profile_view')
			{
				$scripts .= '<!-- page specific plugins -->
							<script src="'.$base_url.'assets/panel/js/select_tutor.js"></script>
							'
							;
			}
			elseif($caretutor_sPage[1] == 'tutor_become_good_tutor')
			{
				$scripts .= '
							<!-- page specific plugins -->
							<script src="'.$base_url.'assets/panel/js/pages/page_help'.$dist_min.'.js"></script>';
			}
			$page_resources['scripts'] = $scripts;
		}

		return $page_resources;
	}
}
