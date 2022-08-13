<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        $this->call(LevelsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(PeriodesTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(ElementsTableSeeder::class);
        $this->call(SubElementsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(PenActivitiesTableSeeder::class);
        $this->call(TandasTableSeeder::class);
    }
}
