<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormBuilder as Form;

class FormGroupServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
	    Form::component('textGroup','components.text', ['params','errors']);
	    Form::component('textAreaGroup','components.text-area', ['params','errors']);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }
}
