<?php

use Illuminate\Database\Seeder;
use  \App\Level;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::truncate();

        $level = new Level;
        $level->level = "Beginner";
        $level->save();

        $level = new Level;
        $level->level = "Intermediate";
        $level->save();

        $level = new Level;
        $level->level = "Professional";
        $level->save();
    }
}
