<?php namespace RainLab\Api\Facades;

use October\Rain\Support\Facade;

class ApiManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @see \Api\Classes\ApiManager
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'api.manager';
    }
}