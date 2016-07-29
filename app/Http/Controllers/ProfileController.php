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
     * @url    /profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $data['userId'] = auth()->user()->id;
        $data['query']  = User::find($data['userId']);

        return view('profile.index', $data);
    }

    /**
     * Change the account information.
     *
     * @url    POST: /profile/update/information
     * @param  Requests\AccountInfoValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function PostAccountInfo(Requests\AccountInfoValidator $input)
    {
        $userId = auth()->user()->id;
        User::find($userId)->update($input->except('_token'));

        session()->flash('message', 'Account information has been updated');
        return redirect()->back(302);
    }

    /**
     * Change the account password.
     *
     * @url    POST: /profile/update/security
     * @param  Requests\PasswordValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function PostAccountCredentials(Requests\PasswordValidator $input)
    {
        $pass   = bcrypt($input->password);
        $userId = auth()->user()->id;

        User::find($userId)->update($input->except($pass));
        session()->flash('message', 'Password credentials has been updated');
        return redirect()->back(302);
    }

    /**
     * Create a  api key for the account.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createKey()
    {
        return redirect()->back();
    }

    /**
     * Remove a api ey out off the system.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeKey()
    {
        return redirect()->back();
    }

    /**
     * Show the log table for a specific api key.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function apiLog()
    {
        return view('', $data);
    }
}
