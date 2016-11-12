<?php


use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Database\Schema\Blueprint as Blueprint;

class M1478990180FeedRequests implements DbHelperInterface
{

    public function run()
    {
        $tableName = 'feed_requests';
        Capsule::schema()->dropIfExists($tableName);
        Capsule::schema()->create($tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->string('feed_url');
            $table->string('radio_name');
            $table->integer('radio_id')->index()->unsigned()->nullable();
            $table->integer('user_id')->index()->unsigned();
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });
    }

}