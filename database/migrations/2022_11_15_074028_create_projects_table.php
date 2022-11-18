<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path')->unique();
            $table->string('external_url', 255)->nullable();
            $table->string('thumbnail', 255)->nullable();
            $table->string('banner', 255)->nullable();
            $table->text('meta_data')->nullable();
            $table->text('content')->nullable();
            $table->boolean('status')->default(Project::STATUS_ENABLE);
            $table->unsignedInteger('ordinal')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
