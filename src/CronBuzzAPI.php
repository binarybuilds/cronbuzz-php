<?php


namespace BinaryBuilds\CronBuzzPHP;

/**
 * Class CronBuzzAPI
 * @package BinaryBuilds\CronBuzzPHP
 */
class CronBuzzAPI
{
    /**
     * @var string
     */
    private static $api_key;

    /**
     * @var string
     */
    private static $team_key;

    /**
     * @var string
     */
    private static $api_base = 'https://app.cronbuzz.com/api';

    /**
     * @return string
     */
    public static function getApiBase()
    {
        return self::$api_base;
    }

    /**
     * @return mixed
     */
    public static function getApiKey()
    {
        return self::$api_key;
    }

    /**
     * @param  mixed  $api_key
     */
    public static function setApiKey($api_key): void
    {
        self::$api_key = $api_key;
    }

    /**
     * @return mixed
     */
    public static function getTeamKey()
    {
        return self::$team_key;
    }

    /**
     * @param  mixed  $team_key
     */
    public static function setTeamKey($team_key): void
    {
        self::$team_key = $team_key;

    }
}