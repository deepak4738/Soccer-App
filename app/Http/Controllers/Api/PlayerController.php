<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TeamRepository;
use App\Repositories\PlayerRepository;
use Illuminate\Support\Facades\Validator;

class PlayerController extends BaseController
{
    /**
     * Repository instance
    */
    public $teamRepository;
    public $playerRepository;

    public function __construct(TeamRepository $teamRepository, PlayerRepository $playerRepository)
    {
        $this->teamRepository = $teamRepository;
        $this->playerRepository = $playerRepository;
    }

    /**
     * PURPOSE: Get All player by team_id
     * METHOD: GET
     * REQ PARAMS: team_id 
     * URL: /api/team/{id}
    */
    public function getPlayers($team_id)
    {
        if (empty($this->teamRepository->findById($team_id))){
            return $this->sendError('No Team Found', 404);
        }

        $data = [];
        $data['teamDetails'] = $this->teamRepository->findById($team_id)->toArray();
        $data['players'] = $this->playerRepository->getAll($team_id)->toArray();

        return  $this->sendResponse(
                    $data, 
                    '', 
                    201
                );
    }

    /**
     * PURPOSE : Player details with team
     * METHOD: GET
     * REQ PARAMS : player_id 
     * URL : /api/player/{id}
    */
    public function getPlayer($player_id)
    {    
        if (empty($this->playerRepository->findById($player_id))){
            return $this->sendError('No Player Found', 404);
        }

        $data = [];
        $data = $this->playerRepository->findById($player_id)->toArray();
        
        return  $this->sendResponse(
                    $data, 
                    '', 
                    201
                );
    }
    /**
     * PURPOSE : Get All players
     * METHOD: GET
     * REQ PARAMS: None
     * URL : /api/players
    */
    public function players()
    {
        $players = $this->playerRepository->getAll(null, 'team_id')->toArray();
        
        return  $this->sendResponse(
                    $players, 
                    'Players List Found', 
                    201
                );
    }

    /**
     * PURPOSE : Add Player
     * METHOD: POST
     * REQ PARAMS: first_name, last_name, player_image_url, team_id
     * URL : /api/add/player
    */
    public function addPlayer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'player_image_url' => 'required',
            'team_id' => 'required|exists:teams,id',
        ]);
        
        if($validator->fails()){
            return $this->sendError($validator->errors()->first());
        }

        $validatedData = $validator->validated();
        $record = $this->playerRepository->createOrUpdate(null, $validatedData);

        return  $this->sendResponse(
                    $record, 
                    'Player added.', 
                    201
                );
    }

    /**
     * PURPOSE : Player details 
     * METHOD: GET
     * REQ PARAMS : none 
     * URL : /api/player-details/{id}
    */
    public function playerDetail($player_id)
    {
        if (empty($this->playerRepository->findById($player_id))){
            return $this->sendError('No Player Found', 404);
        }

        $data = [];
        $data = $this->playerRepository->findById($player_id)->toArray();
        
        return  $this->sendResponse(
                    $data, 
                    'Player Detail', 
                    201
                );
    }

    /**
     * PURPOSE : Update Player
     * METHOD: POST
     * REQ PARAMS: player_id, first_name, last_name, player_image_url, team_id
     * URL : /api/edit/player
    */
    public function updatePlayer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'player_id' => 'required|exists:players,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'player_image_url' => 'required',
            'team_id' => 'required|exists:teams,id',
        ]);
        
        if($validator->fails()){
            return $this->sendError($validator->errors()->first());
        }

        $validatedData = $validator->validated();
        $record = $this->playerRepository->createOrUpdate($validatedData['player_id'], $validatedData);

        return  $this->sendResponse(
                    $record, 
                    'Player updated.', 
                    201
                );
    }

     /**
     * PURPOSE : Delete Player
     * METHOD: POST
     * REQ PARAMS: player_id
     * URL : /api/delete/player
    */
    public function deletePlayer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'player_id' => 'required|exists:players,id',
        ]);
        
        if($validator->fails()){
            return $this->sendError($validator->errors()->first());
        }

        $validatedData = $validator->validated();
        $record = $this->playerRepository->delete($validatedData['player_id']);

        return  $this->sendResponse(
                    $record, 
                    'Player deleted.', 
                    201
                );
    }
}
