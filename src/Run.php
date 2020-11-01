<?php


namespace BinaryBuilds\CronBuzzPHP;

/**
 * Class Run
 * @package BinaryBuilds\CronBuzzPHP
 */
class Run
{
    /**
     * @var string
     */
    private $ping_id;

    /**
     * @var string
     */
    private $monitor_uuid;

    /**
     * @var string
     */
    private $endpoint = 'https://ping.cronbuzz.com/ping/';

    /**
     * @var Client
     */
    private $client;

    /**
     * Run constructor.
     * @param $monitor_uuid
     */
    public function __construct( $monitor_uuid )
    {
        $this->monitor_uuid = $monitor_uuid;
        $this->client = new Client();
    }

    /**
     * @param  string  $log
     */
    public function start( $log = '' )
    {
        $this->ping_id = $this->client->sendGetRequest( $this->endpoint . $this->monitor_uuid . '/start?'.http_build_query(['log' => $log ]) );
    }

    /**
     * @param  string  $log
     */
    public function complete( $log = '' )
    {
        $this->client->sendGetRequest( $this->endpoint . $this->monitor_uuid . '/complete?'.$this->getParameters($log) );
    }

    /**
     * @param  string  $log
     */
    public function fail( $log = '' )
    {
        $this->client->sendGetRequest( $this->endpoint . $this->monitor_uuid . '/fail?'.$this->getParameters($log) );
    }

    /**
     * @param $log
     * @return string
     */
    private function getParameters( $log )
    {
        return http_build_query( ['ping_id' => $this->ping_id, 'log' => $log ] );
    }
}