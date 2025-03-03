<?php

use App\Jobs\CheckLateTasks;
use App\Jobs\FetchSwarmSensors;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::job(new CheckLateTasks)->everyMinute();
Schedule::job(new FetchSwarmSensors)->everyTenMinutes();
