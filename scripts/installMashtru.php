<?php
require '../vendor/autoload.php';

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

echo "Creating db structure" . PHP_EOL;
$jobDb->install();

echo "Adding configured jobs" . PHP_EOL;
foreach ($jobsConfig as $job) {
    $jobDb->create($job);
}
echo "Installed successfully" . PHP_EOL;
unlink(__FILE__);
