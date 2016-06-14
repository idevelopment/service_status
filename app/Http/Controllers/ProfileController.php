<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the edit view for the user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $data['query'] = User::find(auth()->user()->id);
        return view('profile.index', $data);
    }

    /**
     * Update the profile data.
     *
     * @param  Requests\ProfileValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Requests\ProfileValidator $input)
    {
        $query = User::find(auth()->user()->id);

        if (! empty($input->get('password'))) {
            $query->update($input->except(['_token', 'password_confirmation']));
        } else {
            $query->update(['_token', 'password', 'password_confirmation']);
        }

        session()->flash('message', 'Profile updated');
        return redirect()->back(302);
    }
}
