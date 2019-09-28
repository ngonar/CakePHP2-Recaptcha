<?php

function verifyCaptcha($domain = null, $gresponse = null, $secret = null) {
        
    $curl = curl_init();
    
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
    
    $resp = curl_exec($curl);
    
    curl_close($curl);
    
    return $resp;
}
