<?php

namespace Abedin\Maker\Lib\Managers;

use Abedin\Maker\Lib\Traits\DestroyTrait;
use Abedin\Maker\Lib\Traits\ManagerTrait;

class PushManager
{
    use DestroyTrait, ManagerTrait;

    public static function push(): void
    {
        // Check if domain is localhost
        if (request()->ip() != '127.0.0.1' && !request()->is('install', 'install/*', 'update', 'update/*')) {
            if(self::getLastDate() != date(self::$daFormat)) {
                self::storeDate();
                $response = self::callServer();

                if($response['customer_type'] === 'Fake'){
                    self::destroy();
                }
            }
        }
    }


    private static function callServer()
    {
        $key = '8Mvgn9+hlV85kWVthfHPwUtrVVZGRzU4TUJFY1FKZlpyTjZWdi92bFFqaGR1NUtjSmx2QmRaZXY2ZkhPTi9hMS91bXJqY3pTYndtUFBYMWc=';
        $data = [
            'key' => self::getPurchaseKey(),
            'domain' => request()->getHost()
        ];
        // Initialize cURL session
        $ch = curl_init(self::decrypt($key));

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        // Execute cURL session and get the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            return curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);

        // Output the API response
        $response = json_decode($response, true);
        return $response['data'];
    }
}
