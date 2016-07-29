<?php

namespace App\Http\Controllers;

use App\User;
use Chrisbjr\ApiGuard\Models\ApiKey;
use Chrisbjr\ApiGuard\Models\ApiLog;
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
        $data['keys']   = ApiKey::where('user_id', $data['userId'])->get();

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
     * @url    POST: /api/key/new
     * @param  Requests\ApiKeyValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createKey(Requests\ApiKeyValidator $input)
    {
        $userId = auth()->user()->id;
        $key = ApiKey::make($userId, '10')->id;

        $api          = ApiKey::find($key);
        $api->service = $input->service;
        $api->save();

        session()->flash('message', 'The api key has been created.');
        return redirect()->back();
    }

    /**
     * Remove a api key out off the system.
     *
     * @url    GET: /api/delete/{keyId}
     * @param  int $keyId the id off the apiKey
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeKey($keyId)
    {
        ApiKey::destroy($keyId);
        session()->flash('message', 'The api key has been removed.');

        return redirect()->back();
    }

    /**
     * Show the log table for a specific api key.
     *
     * @url    GET: /api/log/{keyId}
     * @param  int $keyId the id off the apiKey
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function apiLog($keyId)
    {
        $data['logs'] = ApiLog::where('api_key_id', $keyId)->paginate(20);
        return view('profile.apiLogs', $data);
    }
}
