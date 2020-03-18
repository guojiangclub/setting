<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table = config('ibrand.setting.table_name');
        if (!Schema::hasTable($table)) {
            Schema::create($table, function (Blueprint $table) {
                $table->increments('id');
                $table->string('key')->index();
                $table->text('value');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table = config('ibrand.setting.table_name');

        Schema::drop($table);
    }
}
