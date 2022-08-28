<?php

namespace Database\Seeders;

use App\Models\PatientVaerdier;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PatientVaerdierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PatientVaerdier::create([
            'slettet' => false,
            'ydernummer' => '1',
            'dato' => Carbon::parse('2022-08-21'),
            'standard_vaerdi' => 89,
            'praksis_vaerdi' => 111
        ]);

        PatientVaerdier::create([
            'slettet' => false,
            'ydernummer' => '2',
            'dato' => Carbon::parse('2022-08-21'),
            'standard_vaerdi' => 85,
            'praksis_vaerdi' => 100
        ]);
    }
}
