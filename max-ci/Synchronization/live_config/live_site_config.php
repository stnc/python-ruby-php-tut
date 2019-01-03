<?php
global $coreon_theme_current_skin_option_name;
function chromatin_redux_options() {
	global $this_theme_redux_option_name;
	$result = false;
	if ( isset ( $_GET['skin'] ) ) {
		$select_skin = $_GET['skin'];
		if ( file_exists( get_template_directory() . "/includes/plugins/ReduxFramework/inc/extensions/wbc_importer/demo-data/" . $select_skin . "/theme-options.txt" ) ) {
			$string           = file_get_contents( get_template_directory() . "/includes/plugins/ReduxFramework/inc/extensions/wbc_importer/demo-data/" . $select_skin . "/theme-options.txt" );
			$json_a           = json_decode( $string, true );
			$scFw_rdx_options = $json_a;
			$result           = true;
		} else {
			$result = false;
			//die ("fd");
			$scFw_rdx_options = get_option( $this_theme_redux_option_name );
		}
	} else {
		$result           = false;
		$scFw_rdx_options = get_option( $this_theme_redux_option_name );
	}
	$result_data = array(
		'result'       => $result,
		'options_data' => $scFw_rdx_options
	);
	return $result_data;
}

$scFw_rdx_options = chromatin_redux_options()['options_data'];
$file_options_result= chromatin_redux_options()['result'];
if ( isset ( $_GET['skin']) && $file_options_result  ) {
	$select_skin = $_GET['skin'];
} else {
	$select_skin = get_option( $coreon_theme_current_skin_option_name );
}

/*$site_url_ch            = site_url();
$prod_min = ( $site_url_ch != 'http://ch.dev' ) ? 		array( 'min' => '.min', 'devpath' => '' ) : array('min'     => '','devpath' => 'dev/');*/
$prod_min =array('min'     => '','devpath' => 'dev/');