<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileValidator;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the account details off the user.
     *
     * @return view
     */
    public function getAccountDetails()
    {
        $userId = auth()->user()->id;
        $data['info'] = User::find($userId);

        return view('profile.edit');
    }

    /**
     * Update the account his details.
     *
     * @param ProfileValidator $request
     */
    public function updateAccountDetails(ProfileValidator $request)
    {
        $userId = auth()->user()->id;

        if (empty($request->password)) {
           User::find($userId)
               ->update($request->except(['_token']));
        } else {
            User::find($userId)
                ->update($request->except(['_token',  'password']));
        }
    }
}
