<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Mashtru\JobManager;
use Mashtru\Libs\Factories\JobEntityFactory;
use Mashtru\Libs\Helpers\DBConfig;


$jobsConfig = \App\Lib\Helpers\Config::get('cron.jobs');
$dbConfig = Capsule::connection()->getConfig();


$jobDb = JobEntityFactory::getInstance(
    new DBConfig(
        $dbConfig['host'],
        $dbConfig['database'],
        $dbConfig['username'],
        $dbConfig['password']
    ),
    JobManager::TABLE_NAME
);


$jobDb->install();

foreach ($jobsConfig as $job) {
    $jobDb->create($job);
}

unlink(__FILE__);
