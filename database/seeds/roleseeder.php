<?php

use Illuminate\Database\Seeder;
use DB;
class roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => 'مدير عام',
        ]);
        DB::table('roles')->insert([
            'role' => 'مدير',
        ]);
        DB::table('roles')->insert([
            'role' => 'منفذ خدمات',
        ]);
        DB::table('roles')->insert([
            'role' => 'طالب خدمه',
        ]);
      }
}
