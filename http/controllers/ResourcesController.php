<?php namespace RainLab\Api\Http\Controllers;

use RainLab\Api\Classes\ApiManager;

class ResourcesController extends Controller
{
    public function index($version, $resource)
    {
        $model = ApiManager::instance()->get($resource);

        return $model::all();
    }

    public function show($version, $resource, $id)
    {
        $model = ApiManager::instance()->get($resource);

        return $model::find($id);
    }
}