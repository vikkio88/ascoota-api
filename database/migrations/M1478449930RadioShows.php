<?php


use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Database\Schema\Blueprint as Blueprint;

class M1478449930RadioShows implements DbHelperInterface
{

    public function run()
    {
        $tableName = 'radio_shows';
        Capsule::schema()->dropIfExists($tableName);
        Capsule::schema()->create($tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('slug')->index();
            $table->string('description')->nullable();
            $table->string('author')->nullable();
            $table->boolean('explicit')->default(false);
            $table->integer('radio_id')->index()->unsigned()->nullable();
            $table->integer('language_id')->index()->unsigned();
            $table->string('website')->nullable();
            $table->string('feed_url')->nullable();
            $table->string('logo_url')->nullable();
            $table->integer('frequency_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }

}