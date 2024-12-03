<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flag;

class FlagsSeeder extends Seeder
{
    public function run()
    {
        $flags = [
            'Entry',
            'Dinner',
            'Breakfast',
            'Lottery(11AM - 12PM)',
            'Lottery(5PM - 6PM)',
            'Poolside Entry',
            'Gift',
            'Lunch',
        ];

        foreach ($flags as $flag) {
            Flag::create(['name' => $flag]);
        }
    }
}

