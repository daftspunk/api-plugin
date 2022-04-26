<?php namespace RainLab\Api\Classes;

use System\Classes\PluginManager;
use October\Rain\Support\Traits\Singleton;

class ApiManager
{
    use Singleton;

    /**
     * @var array resources is a list of registered api resources.
     */
    protected $resources = [];

    public function init()
    {
        foreach (PluginManager::instance()->getAllPlugins() as $plugin) {
            if (method_exists($plugin, 'registerApiResources')) {
                $this->registerResources($plugin->registerApiResources());
            }
        }
    }

    public function get($resource)
    {
        return $this->resources[$resource];
    }

    public function registerResources($resources)
    {
        $this->resources = array_merge($this->resources, $resources);
    }
}