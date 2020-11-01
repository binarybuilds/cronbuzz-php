<?php


namespace BinaryBuilds\CronBuzzPHP;

/**
 * Class Client
 * @package BinaryBuilds\CronBuzzPHP
 */
class Client
{
    /**
     * @param $url
     * @param  array  $headers
     * @return bool|int|string
     */
    public static function sendGetRequest( $url, $headers = [] )
    {
        return self::sendRequest( $url, 'GET', $headers );
    }

    /**
     * @param $url
     * @param  array  $headers
     * @param  array  $payload
     * @return bool|string|null
     */
    public static function sendJsonPatchRequest( $url, $headers = [], $payload = [] )
    {
        return self::sendRequest( $url, 'PATCH', array_merge($headers, ['content-type: application/json'] ), json_encode($payload) );
    }

    /**
     * @param $url
     * @param  array  $headers
     * @param  array  $payload
     * @return bool|string|null
     */
    public static function sendJsonPostRequest( $url, $headers = [], $payload = [] )
    {
        return self::sendRequest( $url, 'POST', array_merge($headers, ['content-type: application/json'] ), json_encode($payload) );
    }

    /**
     * @param $url
     * @param  array  $headers
     * @param  array  $payload
     * @return bool|string|null
     */
    public static function sendJsonPutRequest( $url, $headers = [], $payload = [] )
    {
        return self::sendRequest( $url, 'PUT', array_merge($headers, ['content-type: application/json'] ), json_encode($payload) );
    }

    /**
     * @param $url
     * @param  array  $headers
     * @param  array  $payload
     * @return bool|string|null
     */
    public static function sendDeleteRequest( $url, $headers = [] )
    {
        return self::sendRequest( $url, 'DELETE', $headers );
    }

    /**
     * @param $url
     * @param $method
0 Milliseconds
     * @param  array  $headers
     * @param  null  $payload
     * @return bool|string|null
     */
    public static function sendRequest( $url, $method, $headers = [], $payload = null )
    {
        try{
            $ch = curl_init();
            curl_setopt( $ch, CURLOPT_URL, $url );
            curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
            curl_setopt( $ch, CURLOPT_TIMEOUT, 30 );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true  );
            curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, $method );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
            if($payload){
                curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
            }
            $response = curl_exec( $ch );
            curl_close( $ch );

            return $response;
        }catch (\Exception $e){
            return null;
        }
    }
}