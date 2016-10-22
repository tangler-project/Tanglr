<?php

use Illuminate\Database\Seeder;

class UserGroup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\UserGroup::class, 25)->create();
    }
}
