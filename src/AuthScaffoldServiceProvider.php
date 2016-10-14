<?php

namespace Codeuz\AuthScaffold;

use Illuminate\Support\ServiceProvider;

class AuthScaffoldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    	$this->publishes([
        	__DIR__.'/app' => base_path('app'),
    	]);
		
		$this->publishes([
        	__DIR__.'/database' => base_path('database'),
    	]);
		
		$this->publishes([
        	__DIR__.'/public' => base_path('public'),
    	]);
		
		$this->publishes([
        	__DIR__.'/resources' => base_path('resources'),
    	]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
