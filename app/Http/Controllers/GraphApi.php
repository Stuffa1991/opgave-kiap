<?php

namespace App\Http\Controllers;

use App\Models\PatientVaerdier;

class GraphApi extends Controller
{
    public function getGraphData() {
        return (new PatientVaerdier)->all();
    }
}
