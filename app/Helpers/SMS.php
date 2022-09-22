<?php

namespace App\Helpers;

class SMS
{
    public static function send(int $destination, string $content)
    {
        $fields_string = http_build_query([
            'apikey' => config('sms.sender.api'),
            'smsno' => 2,
            'destination' => $destination,
            'content' => $content
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('sms.sender.url'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $output;
    }
}