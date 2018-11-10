<?php

// cleaning the post variables
function clean_var($variable) {
	$variable = strip_tags(stripslashes(trim(rtrim($variable))));
	return $variable;
}

$error_flag = 0;
$data = [];
if (!empty($_POST['name']) ) {
	$data['name'] = clean_var($_POST['name']);
} else {
	$error['name'] = 'Name';
	$error_flag = 1;
}

if (!empty($_POST['email']) ) {
	$data['email'] = clean_var($_POST['email']);
} else {
	$error['email'] = 'Email';
	$error_flag = 1;
}

if (!empty($_POST['mobile']) ) {
	$data['mobile'] = clean_var($_POST['mobile']);
} else {
	$error['mobile'] = 'Mobile';
	$error_flag = 1;
}

if (!empty($_POST['department']) ) {
	$data['department'] = clean_var($_POST['department']);
} else {
	$error['department'] = 'Department';
	$error_flag = 1;
}

if (!empty($_POST['doctor']) ) {
	$data['doctor'] = clean_var($_POST['doctor']);
} else {
	$error['doctor'] = 'Doctor';
	$error_flag = 1;
}

if (!empty($_POST['date']) ) {
	$data['date'] = clean_var($_POST['date']);
} else {
	$error['date'] = 'Date';
	$error_flag = 1;
}

if ($error_flag == 1) {
	$error = array('flag' => '1',
		'error' => implode(", ",$error));

	echo json_encode($error);
	exit();
} else {

	// basic settings section
	$sendto = 'YOUR_EMAIL_ADDRESS';
	$subject = 'Appointment Request';
	

	$plsubject = "=?utf-8?B?".base64_encode($subject)."?=";
	$msg = "Name: " . $data['name'] . "\n";
	$msg .= "E-mail: " . $data['email'] . "\n";
	$msg .= "Mobile: " . $data['mobile'] . "\n";
	$msg .= "Department: " . $data['department'] . "\n";
	$msg .= "Doctor:" . $data['doctor'] . "\n";
	$msg .= "Date and Time:" . $data['date'] . "\n\n\n";
	$msg .= "Thanks for Creating Account! We'll contact you back as soon as it is possible.";

	$header = "Content-type: text/plain; charset=utf-8\r\n"; 
	$header .= 'From:'. $data['email'];
	
	mail($sendto, $plsubject, $msg, $header);

	echo json_encode(array('flag' => '2'));
	exit();
}