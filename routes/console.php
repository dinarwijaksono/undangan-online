<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('migrate:fresh-test', function () {

    config(['database.default' => 'mysql-test']);

    Artisan::call('migrate:fresh');

    $this->comment("Success");
})->purpose('Runing migrate:fresh for database test');
