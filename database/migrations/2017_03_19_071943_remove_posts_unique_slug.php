<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePostsUniqueSlug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function(Blueprint $table) {
            $table->dropUnique('posts_slug_unique');
            $table->unique(['page_id', 'slug']);            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function(Blueprint $table) {
            $table->dropUnique('posts_page_id_slug_unique');
            $table->unique('slug');
        });
    }
}
