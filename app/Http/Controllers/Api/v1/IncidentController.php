<?php

namespace App\Http\Controllers\Api\v1;

use App\Incidents;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

/**
 * Class IncidentController
 * @package App\Http\Controllers\Api\v1s
 */
class IncidentController extends ApiBase
{
    protected $headers;
    protected $validation;
    private   $incidents;
    private   $validator;

    /**
     * IncidentController constructor.
     *
     * @param Incidents $incidents
     * @param Validator $validator
     */
    public function __construct(Incidents $incidents, Validator $validator)
    {
        parent::__construct();

        // INIT
        $this->incidents = $incidents;
        $this->validator = $validator;

        // Validation rules.
        // $this->validation['assigned'] = 'required|int';
        // $this->validation['status'    = 'required|int';
        $this->validation['title']    = 'required';
        $this->validation['message']  = 'required';
        $this->validation['services'] = 'required';

        // Headers
        $this->headers['Content-Type'] = 'application/json';
    }

    /**
     * Get all open incidents.
     *
     * @url    GET:
     * @return \Illuminate\Contracts\Routing\ResponseFactory
     */
    public function openIncidents()
    {
        $DbOutput = $this->incidents->with('issues')
            ->whereIn('name', ['Open'])
            ->paginate(15);

        $errMsg   = 'There are no incident tickets in the system';

        if (count($DbOutput) > 0) {
            return $this->response->withPaginator($DbOutput, new IncidentsTransformer);
        }

        return $this->response->withError($errMsg, self::HTTP_NO_CONTENT, $this->headers);
    }

    /**
     * Close a specific incident.
     *
     * @url    GET:
     * @return \Illuminate\Contracts\Routing\ResponseFactory
     */
    public function closedIncidents()
    {
        $DbOutput = $this->incidents->with('issues')
            ->whereIn('name', ['Closed'])
            ->paginate(15);

        if (count($DbOutput) === 0) {
            return $this->response->withError($errMsg, self::HTTP_NO_CONTENT, $this->headers);
        }

        return $this->response->withPaginator($DbOutput, new IncidentsTransformer);
    }

    /**
     * Get all the assigned issues for the user.
     *
     * @url    GET:
     * @return \Illuminate\Contracts\Routing\ResponseFactory
     */
    public function assignedIncidents()
    {
        $userId    = auth()->user()->id;
        $DbOutput  = $this->incidents->where('assigned', $userId)->paginate(15);
        $errMsg    = 'You have no assigned issues.';

        if (count($DbOutput) === 0) {
            return $this->response->withError($errMsg, self::HTTP_NO_CONTENT, $this->headers);
        }

        return $this->response->withPaginator($DbOutput, new IncidentsTransformer);
    }

    /**
     * Get all the incidents in the database.
     *
     * @url    GET:
     * @return \Illuminate\Contracts\Routing\ResponseFactory
     */
    public function allIncidents()
    {
        $DbOutput = $this->incidents->paginate(15);
    }

    /**
     * @url    POST:
     * @param  Request $input
     * @return \Illuminate\Contracts\Routing\ResponseFactory
     */
    public function createIndents(Request $input)
    {
        $inputCheck = $this->validator->make($input->all(), $this->validation);

        if ($inputCheck->fails()) {

            return $this->response->errorWrongArgs();

        } elseif ($this->incidents->create($input->all())) {

            $succMsg = 'Incident ticket created';
            return $this->response->withArray($succMsg, $this->headers);
        }

        return $this->response->errorUnprocessable();
    }

    /**
     * Update a incident in the database.
     *
     * @url    PUT|PATCH:
     * @param  Request $input
     * @param  int $id the incident id in the database.
     * @return \Illuminate\Contracts\Routing\ResponseFactory
     */
    public function editIncident(Request $input, $id = null)
    {
        $inputCheck = $this->validator->make($input->all(), $this->validation);
        $DbUpdate   = $this->incidents->find($id)->update($input->all());

        if ($inputCheck) {
            return $this->response->errorWrongArgs();
        }

        if ($DbUpdate) {
            $successMsg = 'Incident ticket has been updated';
            return $this->response->withArray($successMsg, $this->headers);
        }

        return $this->response->errorNotFound();
    }

    /**
     * Remove a incident out of the database.
     *
     * @url    DELETE:
     * @param  int $id the incident id in the database.
     * @return \Illuminate\Contracts\Routing\ResponseFactory
     */
    public function removeIncident($id = null)
    {
        if ($this->incidents->destroy($id)) {
            $succMsg = 'Incident ticket has been deleted';
            return $this->response->withArray($succMsg, $this->headers);
        }

        return $this->response->errorNotFound();
    }

    /**
     * Return a specific incident in the database.
     *
     * @url    GET:
     * @param  int $id the incident id in the database.
     * @return \Illuminate\Contracts\Routing\ResponseFactory
     */
    public function specificIncident($id = null)
    {
        try {
            $DbOutput = $this->incidents->find($id);
            return $this->response->withItem($DbOutput, new IncidentsTransformer);
        } catch(ModelNotFoundException $e) {
            return $this->response->errorNotFound();
        }
    }
}
