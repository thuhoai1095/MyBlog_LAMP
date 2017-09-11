<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Nguyen Thi Huong";
        $user->password = bcrypt(value("123456"));
        $user->email = "huongnt1@nal.vn";
        $user->avatar = "";
        $user->save();

        $user1 = new User();
        $user1->name = "To Thi Thu Hoai";
        $user1->password = bcrypt(value("123456"));
        $user1->email = "hoaittt@nal.vn";
        $user1->avatar = "";
        $user1->save();
    }
}
