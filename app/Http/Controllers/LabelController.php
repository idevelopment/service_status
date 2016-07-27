<?php

namespace App\Http\Controllers;

use App\Label;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class LabelController
 * @package App\Http\Controllers.
 *
 * TODO: Add phpunit tests.
 * TODO: Set translation
 */
class LabelController extends Controller
{
    /**
     * LabelController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all the labels into the view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['query'] = Label::paginate(15);
        return view('labels.index', $data);
    }

    /**
     * Get the insert form for a label.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('labels.create');
    }

    /**
     * Store the new label in the database.
     *
     * @param  Requests\LabelValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\LabelValidator $input)
    {
        Label::create($input->except('_token'));
        return redirect()->back(302);
    }

    /**
     * Update view for a specific label
     *
     * @param int $id the id in the database.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data['label'] = Label::find($id);
        return view('labels.specific', $data);
    }

    /**
     * Update the label in the database.
     *
     * @param  Requests\LabelValidator $input
     * @param  int $id the id in the database
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Requests\LabelValidator $input, $id)
    {
        Label::find($id)->update($input->except('_token'));
        return redirect()->back(302);
    }

    /**
     * Destroy a label in the database.
     *
     * @param  int $id The label id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Label::destroy($id);
        session()->flash('message', 'The label has been deleted');
        return redirect()->back(302);
    }
}
