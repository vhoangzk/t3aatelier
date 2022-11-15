<?php

use App\Models\Banner;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->boolean('status')->default(Banner::STATUS_ENABLE)->comment(Banner::STATUS_DISABLE . ':inactive | ' . Banner::STATUS_ENABLE .':active');
            $table->unsignedInteger('ordinal')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        $seeder = new BannersSeederInitial();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
