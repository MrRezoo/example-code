<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\User\Entities\User;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->create_user();
        // $this->call("OthersTableSeeder");
    }


    private function create_user()
    {

        $users = array(
            [
                'name' => 'Admin',
                'mobile' => '09335668353',
                'password' => 'AdminAdmin',
            ],

        );
        foreach ($users as $user) {
            User::updateOrCreate($user);
        }

    }
}
