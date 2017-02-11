<?php
require '../vendor/autoload.php';

use App\Lib\Helpers\Config;
use Illuminate\Database\Capsule\Manager as Capsule;
use Mashtru\JobManager;
use Mashtru\Libs\Factories\JobEntityFactory;
use Mashtru\Libs\Helpers\DBConfig;


$jobsConfig = Config::get('cron.jobs', '../');
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
$jobDb->uninstall();
$jobDb->install();

echo "Adding configured jobs" . PHP_EOL;
foreach ($jobsConfig as $job) {
    $jobDb->create($job);
}
echo "Installed successfully" . PHP_EOL;
unlink(__FILE__);
