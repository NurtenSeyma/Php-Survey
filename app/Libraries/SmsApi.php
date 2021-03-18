<?php

namespace App\Libraries;

class SmsApi
{
    public $secret="c9beb40a8b72f0bfe642e0f47f47f4cf573191d0";
    public $token="0bbfd212dfe1c9597c9652b3bc5b36ad3cdc999c";
    public function sendMessage($message)
    {
        $data = array(
            'secret' => $this->secret,
            'token' => $this->token,
            'message' => $message
        );
        $ch = curl_init("https://api.hauscloud.net/sms/");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        array_push($headers, 'Content-Type: application/json');
        array_push($headers, "Accept: text/json");
        array_push($headers, "Cache-Control: no-cache");
        array_push($headers, "Pragma: no-cache");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
