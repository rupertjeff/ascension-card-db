<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        try {
            \DB::beginTransaction();

            $this->call(ExpansionSeeder::class);
            $this->call(FactionSeeder::class);
            $this->call(ChronicleCardSeeder::class);

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            $this->command->error($e->getMessage());
        }
        Model::reguard();
    }
}
