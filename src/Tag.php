<?php


namespace BinaryBuilds\CronBuzzPHP;

/**
 * Class Tag
 * @package BinaryBuilds\CronBuzzPHP
 */
class Tag
{
    /**
     * @return mixed
     */
    public static function list()
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/tags';
        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $response = json_decode(Client::sendGetRequest( $url, $headers ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }

    /**
     * @param $tag_id
     * @return mixed
     */
    public static function get( $tag_id )
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/tags/'.$tag_id;
        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $response = json_decode(Client::sendGetRequest( $url, $headers ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }

    /**
     * @param $name
     * @param $channels
     * @return mixed
     */
    public static function create($name)
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/tags';

        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $payload = ['name' => $name];

        $response = json_decode(Client::sendJsonPostRequest( $url, $headers, $payload ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }

    /**
     * @param $tag_id
     * @param $name
     * @return mixed
     */
    public static function update( $tag_id, $name )
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/tags/'.$tag_id;
        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $response = json_decode(Client::sendJsonPutRequest( $url, $headers, ['name' => $name ] ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }

    /**
     * @param $tag_id
     * @return mixed
     */
    public static function delete( $tag_id )
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/tags/'.$tag_id;
        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $response = json_decode(Client::sendDeleteRequest( $url, $headers ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }
}