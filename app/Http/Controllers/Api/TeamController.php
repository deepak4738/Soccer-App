<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TeamRepository;
use Illuminate\Support\Facades\Validator;

class TeamController extends BaseController
{   

    /**
     * Repository instance
    */
    public $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    /**
     * PURPOSE : Get All teams
     * METHOD: GET
     * REQ PARAMS: None
     * URL : /api/teams
    */
    public function teams()
    {
        $teams = $this->teamRepository->getAll()->toArray();
        
        return  $this->sendResponse(
                    $teams, 
                    'Teams List Found', 
                    201
                );
    }

    /**
     * PURPOSE : Get team details
     * METHOD: GET
     * REQ PARAMS: None
     * URL : /api/team-details/{id}
    */
    public function teamDetail($team_id)
    {
        if (empty($this->teamRepository->findById($team_id))){
            return $this->sendError('No Team Found', 404);
        }

        $team = $this->teamRepository->findById($team_id)->toArray();
        
        return  $this->sendResponse(
                    $team, 
                    'Teams details', 
                    201
                );
    }

    
    /**
     * PURPOSE : Add Team
     * METHOD: POST
     * REQ PARAMS: team_name, team_logo
     * URL : /api/add/team
    */
    public function addTeam(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'team_name' => 'required',
            'team_logo' => 'required',
        ]);
        
        if($validator->fails()){
            return $this->sendError($validator->errors()->first());
        }

        $validatedData = $validator->validated();
        $record = $this->teamRepository->createOrUpdate(null, $validatedData);

        return  $this->sendResponse(
                    $record, 
                    'Team added.', 
                    201
                );
    }


    /**
     * PURPOSE : Update
     * METHOD: POST
     * REQ PARAMS: id, team_name, team_logo
     * URL : /api/edit/team
    */
    public function updateTeam(Request $request) {
        $validator = Validator::make($request->all(), [
            'team_id' => 'required|exists:teams,id',
            'team_name' => 'required',
            'team_logo' => 'required',
        ]);
        
        if($validator->fails()){
            return $this->sendError($validator->errors()->first());
        }
        $validatedData = $validator->validated();

        $record = $this->teamRepository->createOrUpdate($validatedData['team_id'], $validatedData);

        return  $this->sendResponse(
                    $record, 
                    'Team updated.', 
                    201
                );
        
    }


    /**
     * PURPOSE : Delete tean
     * METHOD: POST
     * REQ PARAMS: team_id
     * URL : /api/delete/team
    */
    public function deleteTeam(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'team_id' => 'required|exists:teams,id',
        ]);
        
        if($validator->fails()){
            return $this->sendError($validator->errors()->first());
        }

        $validatedData = $validator->validated();
        $record = $this->teamRepository->delete($validatedData['team_id']);

        return  $this->sendResponse(
                    $record, 
                    'Team and related player deleted.', 
                    201
                );
    }

}
