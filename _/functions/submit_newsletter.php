<?php
add_action('gform_after_submission_3', 'post_to_third_party', 10, 2);

function post_to_third_party($entry, $form) {

	
	//echo '<pre>';print_r($entry);echo '</pre>';

	$post_url = 'http://dmtrk.net/signup.ashx';
	
	
	if (isset($entry['3.1']) && $entry['3.1'] == 'Personal Injury') {
	$pers_inj = 'y';
	} else {
	$pers_inj = 'n';	
	}
	
	if (isset($entry['3.2']) && $entry['3.2'] == 'Road Traffic Accidents') {
	$rta = 'y';
	} else {
	$rta = 'n';	
	}
	
	if (isset($entry['3.3']) && $entry['3.3'] == 'Financial Mis-selling') {
	$fin_mis = 'y';
	} else {
	$fin_mis = 'n';	
	}
	
	if (isset($entry['3.4']) && $entry['3.4'] == 'Professional Negligence') {
	$prof_neg = 'y';
	} else {
	$prof_neg = 'n';	
	}
	
	$clin_neg = 'n';
	$com_lit = 'n';
	
    $body = array(
    	'Email' => $entry['2'], 
		'addressbookid' => '1838090', 
        'userid' => '88348',
        'cd_FIRSTNAME' => $entry['1.3'],
        'cd_LASTNAME' => $entry['1.6'],
        'cd_FULLNAME' => $entry['1.3'].' '.$entry['1.6'],
        'cd_CLIN_NEG_radio' => $clin_neg,
        'cd_PERS_IN_radio' => $pers_inj,
        'cd_RTA_radio' => $rta,
        'cd_FIN_MIS_radio' => $fin_mis,
        'cd_PROF_NEG_radio' => $prof_neg,
        'cd_COM_LIT_radio' => $com_lit
        );
        
    // echo '<pre>';print_r($body);echo '</pre>';
    
    $request = new WP_Http();
    $response = $request->post($post_url, array('body' => $body));   
     
}
?>