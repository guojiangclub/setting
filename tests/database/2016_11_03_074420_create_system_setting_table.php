<?php

/*
 * This file is part of ibrand/setting.
 *
 * (c) iBrand <https://www.ibrand.cc>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSettingTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('el_system_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->index();
            $table->text('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('el_system_settings');
    }
}
