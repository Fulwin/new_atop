<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedPostsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $posts = [
            [
                'name' => '销售总监',
                'department_id' => 4
            ],
            [
                'name' => '销售经理',
                'department_id' => 4
            ],
            [
                'name' => '销售工程师',
                'department_id' => 4
            ],
            [
                'name' => '商务助理',
                'department_id' => 4
            ],
            [
                'name' => '研发总监',
                'department_id' => 1
            ],
            [
                'name' => '产品经理',
                'department_id' => 1
            ],
            [
                'name' => '结构经理',
                'department_id' => 1
            ],
            [
                'name' => '软件经理',
                'department_id' => 1
            ],
            [
                'name' => '硬件工程师',
                'department_id' => 1
            ],
            [
                'name' => '软件工程师',
                'department_id' => 1
            ],
            [
                'name' => '测试工程师',
                'department_id' => 1
            ],
            [
                'name' => 'FAE工程师',
                'department_id' => 9
            ],
            [
                'name' => 'PE工程师',
                'department_id' => 1
            ],
            [
                'name' => '运营副总',
                'department_id' => 2
            ],
            [
                'name' => '生产经理',
                'department_id' => 2
            ],
            [
                'name' => '品质经理',
                'department_id' => 3
            ],
            [
                'name' => '品质工程师',
                'department_id' => 3
            ],
            [
                'name' => '计划经理',
                'department_id' => 5
            ],
            [
                'name' => '计划专员',
                'department_id' => 5
            ],
            [
                'name' => '总经理',
                'department_id' => 7
            ],
            [
                'name' => '仓储主管',
                'department_id' => 8
            ],
            [
                'name' => '项目管理员',
                'department_id' => 1
            ],
            [
                'name' => '行政经理',
                'department_id' => 6
            ],
            [
                'name' => '行政专员',
                'department_id' => 6
            ],
            [
                'name' => '结构工程师',
                'department_id' => 1
            ],
            [
                'name' => '采购主管',
                'department_id' => 10
            ],
            [
                'name' => '采购专员',
                'department_id' => 10
            ],
            [
                'name' => '包装组长',
                'department_id' => 2
            ],
            [
                'name' => '市场专员',
                'department_id' => 9
            ],
            [
                'name' => 'DCC专员',
                'department_id' => 3
            ],
            [
                'name' => 'IT工程师',
                'department_id' => 6
            ],
            [
                'name' => 'OQC工程师',
                'department_id' => 3
            ],
            [
                'name' => 'IPQC工程师',
                'department_id' => 3
            ],
            [
                'name' => 'IPQC工程师',
                'department_id' => 3
            ],
            [
                'name' => '财务经理',
                'department_id' => 11
            ],
            [
                'name' => '财务总监',
                'department_id' => 11
            ],
            [
                'name' => '财务副总',
                'department_id' => 11
            ],
            [
                'name' => '会计',
                'department_id' => 11
            ],
            [
                'name' => '出纳',
                'department_id' => 11
            ],
            [
                'name' => '市场经理',
                'department_id' => 9
            ],
            [
                'name' => '生产总监',
                'department_id' => 2
            ],
            [
                'name' => 'PE主管',
                'department_id' => 2
            ]
        ];

        DB::table('posts')->insert($posts);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('posts')->truncate();
    }
}
