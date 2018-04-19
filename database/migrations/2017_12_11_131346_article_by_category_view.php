<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticleByCategoryView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement("CREATE VIEW categoryarticlespost AS SELECT articles.id AS article_id, images.foto, articles.state, articles.title, categories.name, categories.id AS category_id, articles.created_at FROM articles, categories, images WHERE state = '1' AND categories.id = articles.category_id AND images.article_id = articles.id ORDER BY article_id DESC;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
