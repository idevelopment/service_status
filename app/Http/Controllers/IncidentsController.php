<?php

namespace App\Http\Controllers;

use App\Incidents;
use Illuminate\Http\Request;

use App\Http\Requests;

class IncidentsController extends Controller
{
    public function __constrcut()
    {

    }

    /**
     * Get the incidents index page.
     *
     * @return mixed
     */
    public function index()
    {
        $data['query'] = Incidents::paginate(20);
        return view('incidents.index', $data);
    }

    public function searchIncidents()
    {

    }

    public function reportIncident()
    {

    }

    public function storeIncident()
    {

    }
}
