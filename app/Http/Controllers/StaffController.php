<?php

namespace App\Http\Controllers;

use App\countries;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class StaffController
 * @package App\Http\Controllers
 */
class StaffController extends Controller
{
    /**
     * StaffController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('lang');
    }

    /**
     * Get the staff overview.
     *
     * @url    GET:
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['staff'] = User::paginate(15);
        return view('', $data);
    }

    /**
     * Show info about as specific staff member.
     *
     * @url    GET:
     * @param  int $id the staff member id in the database.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $data['member'] = User::find($id);
        return view('', $data);
    }

    /**
     * Get the create view for a new staff member.
     *
     * @url    GET:
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['countries'] = countries::all();
        return view('', $data);
    }

    /**
     * Add a new staff member.
     *
     * @url    POST:
     * @param  Requests\ProfileValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\ProfileValidator $input)
    {
        return redirect()->back();
    }

    /**
     * Update view for a staff member.
     *
     * @url    GET:
     * @param  int $id the staff member id in the database.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data['countries'] = countries::all();
        $data['member']    = User::find($id);

        return view();
    }

    /**
     * Update a staff member.
     *
     * @url    POST:
     * @param  Requests\ProfileValidator $input
     * @param  int $id The staff member id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Requests\ProfileValidator $input, $id)
    {
        return redirect()->back();
    }

    /**
     * Destroy a staff member in the system.
     *
     * @url    GET:
     * @param  int $id the staff member id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        User::destroy($id);
        session()->flash('message', 'Staff member has been deleted');

        return redirect()->back();
    }
}
