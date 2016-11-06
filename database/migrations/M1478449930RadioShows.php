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
            $table->string('description', 150)->nullable();
            $table->integer('radio_id')->index()->unsigned();
            $table->string('website')->nullable();
            $table->string('logo_url')->nullable();
            $table->dateTime('last_sync')->nullable();
            $table->dateTime('next_sync')->nullable();
            $table->integer('frequency_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }

}