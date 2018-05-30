<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedUserPostsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user_posts = [
            [
                'user_id' => 1,
                'post_id' => 6
            ],
            [
                'user_id' => 1,
                'post_id' => 10
            ]
        ];

        DB::table('user_posts')->insert($user_posts);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('user_posts')->truncate();
    }
}
