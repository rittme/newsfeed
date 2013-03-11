<?php 

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'email' => 'bernardo@rittme.com',
            'password' => Hash::make('secreta11'),
        ));
    }

}