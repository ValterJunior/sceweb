<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
	public function boot(){

		$this->app->bind('DateHelper', function()
		{
	    	return new \App\Helpers\DateHelper;
		});

	}


	/**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('DateHelper',function(){
            return new \App\Helpers\DateHelper;
        });
    }	
	
}