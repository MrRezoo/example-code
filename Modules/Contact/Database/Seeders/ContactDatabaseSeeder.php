<?php

namespace Modules\Contact\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Contact\Entities\Department;
use Modules\Contact\Entities\Priority;


class ContactDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->priority();
        $this->department();
        // $this->call("OthersTableSeeder");
    }

    public function priority()
    {
        $priorities = array(
            [
                'name' => 'زیاد'
            ],
            [
                'name' => 'متوسط'
            ],
            [
                'name' => 'کم'
            ]
        );

        foreach ($priorities as $priority) {
            $exists = Priority::where('name', $priority['name'])->first();
            if (!$exists) {
                Priority::create([
                    'name' => $priority['name']
                ]);
            }
        }
    }


    public function department()
    {
        $departments = array(
            [
                'name' => 'دپارتمان شماره یک'
            ],
            [
                'name' => 'دپارتمان شماره دو'
            ],
            [
                'name' => 'دپارتمان شماره سه'
            ]
        );

        foreach ($departments as $department) {
            $exists = Department::where('name', $department['name'])->first();
            if (!$exists) {
                Department::create([
                    'name' => $department['name']
                ]);
            }
        }
    }


}
