<?php


use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;
use Illuminate\Database\Capsule\Manager as Capsule; 
use \Illuminate\Database\Schema\Blueprint as Blueprint;

class M1478990924Admins implements DbHelperInterface {

        public function run()
        {
        $tableName = 'admins';
        Capsule::schema()->dropIfExists($tableName);
        Capsule::schema()->create($tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned();
            $table->timestamps();
        });
        }
        
}