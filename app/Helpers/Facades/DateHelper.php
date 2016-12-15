<?php

namespace App\Helpers\Facades;

use Illuminate\Support\Facades\Facade;

class DateHelper extends Facade
{

	/**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'DateHelper'; // the IoC binding.
    }


}