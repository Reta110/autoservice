<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 30)->create()->each(function ($user) {
            $user->vehicles()->saveMany(factory(App\Vehicle::class, 2)->make());
        });

        DB::table('users')->insert([
            'name' => 'Agustín Aubert',
            'email' => 'aaubert@automec.cl',
            'role' => 'admin',
            'password' => bcrypt('automec2015'),
            'last_name' => ' ',
            'rut' => ' ',
            'phone' => ' ',
            'address' => ' ',
        ]);

        DB::table('users')->insert([
            'name' => 'Pedro Pablo Silva',
            'email' => 'psilva@automec.cl',
            'role' => 'admin',
            'password' => bcrypt('automec2015'),
            'last_name' => ' ',
            'rut' => ' ',
            'phone' => ' ',
            'address' => ' ',
        ]);

        DB::table('users')->insert([
            'name' => 'Diego Michaeli',
            'email' => 'dmichaeli@automec.cl',
            'role' => 'admin',
            'password' => bcrypt('automec2015'),
            'last_name' => ' ',
            'rut' => ' ',
            'phone' => ' ',
            'address' => ' ',
        ]);

        DB::table('users')->insert([
            'name' => 'Rafael Torrealba',
            'email' => 'rafaeltorrealba6@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('squ1r3s6'),
            'last_name' => ' ',
            'rut' => ' ',
            'phone' => ' ',
            'address' => ' ',
        ]);

    }
}