<?php

function verifyCaptcha($domain = null, $gresponse = null, $secret = null) {
    
    // Get cURL resource
    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',        
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => [
            'secret' => $secret,
            'response' => $gresponse,
            'remoteip' => $domain
        ]
    ]);
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    // Close request to clear up some resources
    curl_close($curl);

    
    return $resp;
}
