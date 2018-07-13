<?php

function isValidEmail($address) {
	return filter_var($address, FILTER_VALIDATE_EMAIL);
}

function getDomain($address) {
	return substr(strrchr($address, "@"), 1);
}

$emailstring = $_REQUEST['emails'];

// Split the string into individual strings 
$emails = preg_split("/\s+/", $emailstring, NULL, PREG_SPLIT_NO_EMPTY);

// Remove invalid emails
$filteredEmails = array_filter($emails, "isValidEmail");

// Get the domains from the emails
$domains = array_map("getDomain", $filteredEmails);

// Remove duplicate domains
$uniqueDomains = array_values(array_unique($domains));

// Print the unique domains and their numbers
echo nl2br("Number Domain\n");
for ($i = 0; $i < count($uniqueDomains); $i++) {
	$domainOut = $uniqueDomains[$i];
	$indexOut = $i + 1;
	echo nl2br("$indexOut $domainOut\n");
}

?>
