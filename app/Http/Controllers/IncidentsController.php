<?php

namespace App\Http\Controllers;

use App\incidentLabels;
use App\Incidents;
use Illuminate\Http\Request;

use App\Http\Requests;

class IncidentsController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Get the incidents index page.
     *
     * @return mixed
     */
    public function index()
    {
        $data['query']  = Incidents::paginate(20);
        $data['labels'] = incidentLabels::all();
        return view('incidents.index', $data);
    }

    public function searchIncidents()
    {

    }

    public function SpecificIncident($id)
    {

    }

    public function updateIncident()
    {

    }

    public function reportIncident()
    {
        return view('incidents.create');
    }

    public function storeIncident()
    {

    }

    /**
     * Assign a ticket to a user.
     *
     * @param int, $id, the user id.
     */
    public function assignTo($id)
    {

    }

    public function AssignedToYou()
    {
        $data['query'] = '';
        return view('', $data);
    }

    public function userAssigns()
    {
        $data['query'] = '';
        return view('', $data);
    }

    public function incidentLabels()
    {
        $data['query'] = incidentLabels::all();
        return view('incidents.labels', $data);
    }

    public function newLabel()
    {

    }

    public function editLabel()
    {

    }

    public function deleteLabel($id)
    {
        incidentLabels::destroy($id);
        session()->flash('message', 'Label deleted');

        return redirect()->back(302);
    }
}
