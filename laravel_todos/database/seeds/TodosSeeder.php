<?php

use Illuminate\Database\Seeder;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert(
            [
                'id_User'=>1,
                'checked'=>0,
                'content'=>'content_1',
                'created_at'=> new DateTime()
            ]
        );
        DB::table('todos')->insert(
            [
                'id_User'=>1,
                'checked'=>0,
                'content'=>'content_2',
                'created_at'=> new DateTime()
            ]
        );
    }
}
