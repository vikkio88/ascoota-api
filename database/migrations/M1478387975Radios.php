<?php


use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Database\Schema\Blueprint as Blueprint;

class M1478387975Radios implements DbHelperInterface
{

    public function run()
    {
        $tableName = 'radios';
        Capsule::schema()->dropIfExists($tableName);
        Capsule::schema()->create($tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('description', 150)->nullable();
            $table->integer('language_id')->index()->unsigned();
            $table->string('website');
            $table->string('logo_url')->nullable();
            $table->timestamps();
        });
    }
}