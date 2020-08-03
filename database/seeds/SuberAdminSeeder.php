<?php

use Illuminate\Database\Seeder;
use App\user;
class SuberAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new user();
        $user->name='mostafa';
        $user->email='admin@gmail.com';
        $user->password=bcrypt('asdasdasd');
        $user->phone=1234567;
        $user->role='مدير عام';
        $user->location='السعوديه';
        $user->save();
    }
}
