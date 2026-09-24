<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProjectsForImageGallery extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('images')->nullable()->after('excerpt');
            $table->dropColumn(['content', 'cover_image']);
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->longText('content')->nullable()->after('excerpt');
            $table->string('cover_image')->nullable()->after('content');
            $table->dropColumn('images');
        });
    }
}