<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Scientist;
use App\Models\User;

class ScientistUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $scientists = Scientist::all();
        foreach ($scientists as $scientist) {
            $user = User::where('email', $scientist->email)->first();
            if ($user) {
                $scientist->user_id = $user->id;
                $scientist->save();
            }
        }
    }
}
