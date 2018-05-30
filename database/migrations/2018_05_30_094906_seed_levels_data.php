<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedLevelsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $levels = [
            [
                'name' => '助理/实习生'
            ],
            [
                'name' => '工程师'
            ],
            [
                'name' => '主管'
            ],
            [
                'name' => '经理'
            ],
            [
                'name' => '总监'
            ],
            [
                'name' => '副总'
            ],
            [
                'name' => '总经理'
            ]
        ];

        DB::table('levels')->insert($levels);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('levels')->truncate();
    }
}
