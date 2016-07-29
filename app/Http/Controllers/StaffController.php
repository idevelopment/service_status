<?php

namespace App\Http\Controllers;

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
    }

    /**
     * Get the staff overview.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['staff'] = User::paginate(15);
        return view('', $data);
    }
}
