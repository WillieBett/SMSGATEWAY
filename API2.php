<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customsms
{
    private $api_url = 'https://smsportal.hostpinnacle.co.ke/SMSApi/send';
    private $userid = 'BROOKHILLSCHOOL';
    private $password = 'Qz5T3nkS';
    private $api_key = '6ee11d9df2cd22ac1e56b098644649a84e4bb250';
    private $senderid='BROOKHILL';
    private $msgType = 'text';
    private $duplicatecheck = true;
    private $output = 'json';
    private $sendMethod = 'quick';

    function __construct($params) { 
        $this->_CI = & get_instance();
        $this->session_name = $this->_CI->setting_model->getCurrentSessionName();
    }

    public function sendSms($mobile, $message)
    {
        $data = array(
            'mobile' =>$this=>$mobile,
            'msg' =>$this=>$message,
            'userid' => $userid,
            'password' => $password,
            'senderid' => $senderid,
            'msgType' => $msgType,
            'duplicatecheck' => $duplicatecheck,
            'output' => $output,
            'sendMethod' => $sendMethod,
        );

        $url = $this->api_url . '?' . http_build_query($data);

        $headers = array(
            'Authorization: Bearer ' . $this->api_key,
            'Content-Type: application/json',
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return 'Curl error: ' . curl_error($ch);
        }

        curl_close($ch);

        return $response;
    }
}
