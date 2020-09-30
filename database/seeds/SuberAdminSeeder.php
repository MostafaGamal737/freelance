<?php

use Illuminate\Database\Seeder;
use App\User;
class SuberAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->name='مدير عام';
        $user->email='Taameed@hotmail.com';
        $user->password=bcrypt('1234567');
        $user->phone=1234567;
        $user->role='مدير عام';
        $user->location='السعوديه';
        $user->save();
    }
}
