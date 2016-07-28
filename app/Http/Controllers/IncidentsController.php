<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Incidents;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class IncidentsController
 * @package App\Http\Controllers
 */
class IncidentsController extends Controller
{
    public $open;
    public $closed;

    /**
     * IncidentsController constructor.
     */
    public function __construct()
    {
        $this->open   = Incidents::where('status', 0)->with('issues');
        $this->closed = Incidents::where('status', 1)->with('issues');
    }

    /**
     * Get the incidents index page.
     *
     * @return mixed
     */
    public function index()
    {
        $data['open']   = $this->open->count();
        $data['closed'] = $this->closed->count();
        $data['query']  = Incidents::with('issues')->paginate(20);

        return view('incidents.index', $data);
    }

    /**
     * Search the incidents.
     *
     * @param  Request $input
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchIncidents(Request $input)
    {
        $term           = $input->get('term');
        $data['query']  = Incidents::where('', 'LIKE', "%$term%")->get();
        $data['open']   = $this->open->count();
        $data['closed'] = $this->closed->count();
        return view('incidents.index', $data);
    }

    /**
     * Get all the incidents assigned to you.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function assignedToYou()
    {
        $user           = auth()->user()->id;
        $data['open']   = $this->open->count();
        $data['closed'] = $this->closed->count();
        $data['query']  = Incidents::where('assigned', $user)->paginate(20);

        return view('incidents.index', $data);
    }

    /**
     * Get all the open issues.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function openIssues()
    {
        $data['open']   = $this->open->count();
        $data['closed'] = $this->closed->count();
        $data['query']  = $this->open->paginate(20);

        return view('incidents.index', $data);
    }

    /**
     * Get all the closed issues.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function closedIssues()
    {
        $data['open']   = $this->open->count();
        $data['closed'] = $this->closed->count();
        $data['query']  = $this->closed->paginate(20);

        return view('incidents.index', $data);
    }

    /**
     * Assign a incident to a staff member.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assign()
    {
        return redirect()->back(302);
    }

    /**
     * Show a specific incident
     *
     * @param  int $id The issue id in the database.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showIncident($id)
    {
        // ->with() will eager-load all the relations. Try $incident = Incident::find($id);
        // $page = $incident->relation()->paginate(...)

        $data['incident'] = Incidents::find($id);
        $data['comments'] = $data['incident']->comments()->paginate();

        return view('incidents.show' , $data);
    }

    /**
     * Create view for a new incident.
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createIncident()
    {
        $data['users'] = User::all();
        return view('incidents.create', $data);
    }

    /**
     * Store a new incident.
     *
     * @param  Requests\IncidentsValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeIncident(Requests\IncidentsValidator $input)
    {
        $incident = Incidents::create($input->except('_token'))->id;
        Incidents::find($incident)->issues()->attach(1);
        session()->flash('message', 'Incident is created.');
        return redirect()->back(302);
    }

    /**
     * Store a new comment into the database.
     *
     * @url    POST; /incidents/comment/(id)
     * @param  Requests\CommentValidator $input
     * @param  int $id the id from the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createComment(Requests\CommentValidator $input, $id)
    {
        // Save the comment
        $comment = Comments::create([
            'comment' => $input->comment,
            'user_id' => auth()->user()->id
        ])->id;

        $incident = Incidents::find($id);
        $incident->comments()->attach($comment);

        session()->flash('message', 'Your comment has been added.');
        return redirect()->back();
    }

}