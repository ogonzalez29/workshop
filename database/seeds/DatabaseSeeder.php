<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(app()->environment() == 'local') {
            $this->call(RoleTableSeeder::class);
            $this->call(UsersTableSeeder::class);
            $this->call(MakesTableSeeder::class);
            $this->call(TypesTableSeeder::class);
            $this->call(QdocsTableSeeder::class);
        } 
        else {
            $this->call(RoleTableSeeder::class);
            $this->call(MakesTableSeeder::class);
            $this->call(TypesTableSeeder::class);
        }
        
    }
}
