<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $skills = App\Skill::all();
        factory(App\User::class, 50)->create()->each(function($u) use ($skills) {
            $skillSet = $skills->random((rand(1,4)));
            foreach($skillSet as $skill ) {
                $u->skills()->attach($skill->id, ['level' => rand(1,5)]);
            }
        });

        $userTest = User::create([
            'name' => 'Test',
            'role' => 'user',
            'email' => 'test@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Formation13@'), // password
            'remember_token' => Str::random(10),
            'firstname' => 'Dan',
            'lastname' => 'ESPOSITO',
            'bio' => 'blablabla'
        ]);

        $userAdmin = User::create([
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@admin.fr',
            'email_verified_at' => now(),
            'password' => Hash::make('Admin'), // password
            'remember_token' => Str::random(10),
            'firstname' => 'Admin',
            'lastname' => 'ADMIN',
            'bio' => 'Administrateur'
        ]);
    }
}
