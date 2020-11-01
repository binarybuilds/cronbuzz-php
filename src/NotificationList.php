<?php


namespace BinaryBuilds\CronBuzzPHP;

/**
 * Class NotificationList
 * @package BinaryBuilds\CronBuzzPHP
 */
class NotificationList
{
    /**
     * @return mixed
     */
    public static function list()
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/notification-lists';
        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $response = json_decode(Client::sendGetRequest( $url, $headers ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }

    /**
     * @param $list_id
     * @return mixed
     */
    public static function get( $list_id )
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/notification-lists/'.$list_id;
        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $response = json_decode(Client::sendGetRequest( $url, $headers ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }

    /**
     * @param $name
     * @param $channels
     * @return mixed
     */
    public static function create($name, $channels)
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/notification-lists';

        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $payload = ['name' => $name, 'channels' => $channels];

        $response = json_decode(Client::sendJsonPostRequest( $url, $headers, $payload ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }

    /**
     * @param $list_id
     * @param $name
     * @return mixed
     */
    public static function update( $list_id, $name )
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/notification-lists/'.$list_id;
        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $response = json_decode(Client::sendJsonPutRequest( $url, $headers, ['name' => $name ] ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }

    /**
     * @param $list_id
     * @return mixed
     */
    public static function delete( $list_id )
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/notification-lists/'.$list_id;
        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $response = json_decode(Client::sendDeleteRequest( $url, $headers ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }
}