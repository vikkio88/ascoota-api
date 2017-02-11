<?php

require '../vendor/autoload.php';

use App\Lib\Helpers\Config;
use Illuminate\Database\Capsule\Manager as Capsule;
use Mashtru\JobManager;
use Mashtru\Libs\Helpers\DBConfig;
use Mashtru\Libs\Helpers\RunnerConfig;

$dbConfig = Capsule::connection()->getConfig();

$jobs = new JobManager(
    new DBConfig(
        $dbConfig['host'],
        $dbConfig['database'],
        $dbConfig['username'],
        $dbConfig['password']
    ),
    new RunnerConfig(
        Config::get('cron.namespaces', '../')
    )
);


$jobs->fire();




