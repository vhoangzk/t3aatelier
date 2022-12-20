<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAppLoadingCollumnToSysConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sys_config', function (Blueprint $table) {
            $table->string('app_loading')->after('app_logo_image')->default('uploads/config/logo-loading.png');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sys_config', function (Blueprint $table) {
            //
        });
    }
}
