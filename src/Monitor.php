<?php


namespace BinaryBuilds\CronBuzzPHP;

/**
 * Class Monitor
 * @package BinaryBuilds\CronBuzzPHP
 */
class Monitor
{
    /**
     * @return mixed
     */
    public static function list()
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/monitors';
        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $response = json_decode(Client::sendGetRequest( $url, $headers ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }

    /**
     * @return mixed
     */
    public static function get( $monitor_id )
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/monitors/'.$monitor_id;
        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $response = json_decode(Client::sendGetRequest( $url, $headers ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }

    /**
     * @param $monitor_id
     * @return mixed
     */
    public static function pause( $monitor_id )
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/monitors/'.$monitor_id.'/pause';
        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $response = json_decode(Client::sendJsonPatchRequest( $url, $headers ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }

    /**
     * @param $monitor_id
     * @return mixed
     */
    public static function resume( $monitor_id )
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/monitors/'.$monitor_id.'/resume';
        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $response = json_decode(Client::sendJsonPatchRequest( $url, $headers ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }

    /**
     * @param $name
     * @param $schedule
     * @param $duration
     * @param  array  $notification_lists
     * @param  array  $tags
     * @param  bool  $notify_overlaps
     * @param  bool  $notify_long_running
     * @param  bool  $notify_duplicates
     * @return mixed
     */
    public static function create($name, $schedule, $duration, $notification_lists = [], $tags = [], $notify_overlaps = true, $notify_long_running = true, $notify_duplicates = true)
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/monitors';

        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $payload = [
            'name' => $name,
            'schedule' => $schedule,
            'execution_duration' => $duration,
            'lists' => $notification_lists,
            'tags' => $tags,
            'notify_overlap' => $notify_overlaps,
            'notify_long_running' => $notify_long_running,
            'notify_duplicate' => $notify_duplicates
        ];

        $response = json_decode(Client::sendJsonPostRequest( $url, $headers, $payload ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }

    /**
     * @param $monitor_id
     * @param $fields
     * @return mixed
     */
    public static function update( $monitor_id, $fields )
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/monitors/'.$monitor_id;
        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $response = json_decode(Client::sendJsonPutRequest( $url, $headers, $fields ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }

    /**
     * @param $monitor_id
     * @return mixed
     */
    public static function delete( $monitor_id )
    {
        $url = CronBuzzAPI::getApiBase() . '/' . CronBuzzAPI::getTeamKey() . '/monitors/'.$monitor_id;
        $headers = ['Authorization: Bearer '.CronBuzzAPI::getApiKey(), 'Accept: application/json'];

        $response = json_decode(Client::sendDeleteRequest( $url, $headers ), true );

        return isset($response['data']) ? $response['data'] : $response;
    }
}