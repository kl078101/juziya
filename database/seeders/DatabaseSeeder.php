<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Model::unguard();

        $this->call(UsersTableSeeder::class);

        // 模拟内容
        $this->call(StatusesTableSeeder::class);

        // 模拟关注
        $this->call(FollowersTableSeeder::class);

        Model::reguard();
    }
}
