<?php

 namespace App\Utils;


 use DateTime;
 use DateTimeZone;

 class Signature
 {
     public function generateSignature(String $requestId, array $requestBody, $timestamp): String
     {


//        echo $timestamp;

        $clientId = "BRN-0288-1680445183182";
        $requestDate = $timestamp;
        $targetPath = "/checkout/v1/payment"; // For merchant request to Jokul, use Jokul path here. For HTTP Notification, use merchant path here
        $secretKey = "SK-XKqMbBF3ZUCOxlvwMgDB";

//        dump($requestBody);
//        dump(json_encode($requestBody));
//        echo json_encode($requestBody);
        // Generate Digest
        $digestValue = base64_encode(hash('sha256', json_encode($requestBody), true));
//        echo "Digest: " . $digestValue;
//        echo "\r\n\n";

        // Prepare Signature Component
        $componentSignature = "Client-Id:" . $clientId . "\n" .
            "Request-Id:" . $requestId . "\n" .
            "Request-Timestamp:" . $requestDate . "\n" .
            "Request-Target:" . $targetPath . "\n" .
            "Digest:" . $digestValue;
//        echo "Component Signature: \n" . $componentSignature;
//        echo "\r\n\n";

        // Calculate HMAC-SHA256 base64 from all the components above
        $signature = base64_encode(hash_hmac('sha256', $componentSignature, $secretKey, true));
//        echo "Signature: " . $signature;
//        echo "\r\n\n";

        // Sample of Usage
        $headerSignature = "Client-Id:" . $clientId . "\n" .
            "Request-Id:" . $requestId . "\n" .
            "Request-Timestamp:" . $requestDate . "\n" .
            // Prepend encoded result with algorithm info HMACSHA256=
            "Signature:" . "HMACSHA256=" . $signature;
//        echo "your header request look like: \n" . $headerSignature;
//        echo "\r\n\n";

        return "HMACSHA256=" . $signature;

     }
 }
