<?php


use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Database\Schema\Blueprint as Blueprint;

class M1478904432RadioShowCategories implements DbHelperInterface
{

    public function run()
    {
        $tableName = 'radio_show_categories';
        Capsule::schema()->dropIfExists($tableName);
        Capsule::schema()->create($tableName, function (Blueprint $table) {
            $table->integer('radio_show_id')->index()->unsigned();
            $table->integer('category_id')->index()->unsigned();
            $table->timestamps();
        });
    }

}