<?php


namespace BinaryBuilds\CronBuzzPHP;

/**
 * Class CronBuzzTask
 * @package BinaryBuilds\CronBuzzPHP
 */
class CronBuzzTask
{
    /**
     * @param $monitor_uuid
     * @param $task_callback
     * @throws \Exception
     */
    public static function run( $monitor_uuid, $task_callback )
    {
        // Initialize the monitor with the uuid.
        $run = new Run($monitor_uuid );

        // Send a ping indicating the execution is started.
        $run->start();

        try{
            // Execute the user's code.
            call_user_func($task_callback);

            // Send a ping indicating the execution is completed.
            $run->complete();
        }catch (\Exception $exception){

            // If an exception occured, Send a failure ping with the error message.
            $run->fail( $exception->getMessage() );

            // Finally rethrow the exception so the user can perform their own
            // exception handling.
            throw $exception;
        }
    }
}