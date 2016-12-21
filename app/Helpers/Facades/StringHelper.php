<?php

namespace App\Helpers\Facades;

use Illuminate\Support\Facades\Facade;

class StringHelper extends Facade
{

	/**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'StringHelper'; // the IoC binding.
    }


}