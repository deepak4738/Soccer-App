<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Redirect admin root routing to admin teams listing
     *
     * @param None
     * @return route redirection
     */
    public function show()
    {
        return redirect()->route('adminTeams');
    }

    /**
     * Display team listing with CRUD functionality
     *
     * @param None
     * @return \Illuminate\Http\Response
     */
    public function teams()
    {
        $teams = [];
        $response = $this->getData('/api/teams', 'GET', []);

        if(!empty($response['data'])) {
            $teams = $response['data'];
        }
        
        return view('admin.teams')->with(compact('teams'));
    }

    /**
     * Add team form
     *
     * @param None
     * @return \Illuminate\Http\Response
     */
    public function addTeam(){
        return view('admin.add_team');
    }


    /**
     * Edit team form with content
     *
     * @param integer $id
     * @param object $request
     * @return \Illuminate\Http\Response
     */
    public function editTeam($id, Request $request){
        $team = [];
        $response = $this->getData('/api/team-details/'.$id, 'GET', [], true);

        if(!$response['status']){
            return redirect()->route('adminTeams')->with('error', $response['message']);
        }
        if(!empty($response['data'])) {
            $team = $response['data'];
        }

        return view('admin.edit_team')->with(compact('team'));
    }


    /**
     * Display player listing with CRUD functionality
     *
     * @param None
     * @return \Illuminate\Http\Response
     */
    public function players()
    {
        $players = [];
        $response = $this->getData('/api/players', 'GET', []);

        if(!empty($response['data'])) {
            $players = $response['data'];
        }
        
        return view('admin.players')->with(compact('players'));
    }

    /**
     * Add player form
     *
     * @param None
     * @return \Illuminate\Http\Response
     */
    public function addPlayer(){
        $teams = [];
        $response = $this->getData('/api/teams', 'GET', []);

        if(!empty($response['data'])) {
            $teams = $response['data'];
        }

        return view('admin.add_player')->with(compact('teams'));
    }


    /**
     * Edit player form with content
     *
     * @param integer $id
     * @param object $request
     * @return \Illuminate\Http\Response
     */
    public function editPlayer($id, Request $request){
        $player = [];
        $teams = [];
        $response = $this->getData('/api/player-details/'.$id, 'GET', [], true);

        if(!$response['status']){
            return redirect()->route('adminPlayers')->with('error', $response['message']);
        }
        
        if(!empty($response['data'])) {
            $player = $response['data'];
        }

        $teamResponse = $this->getData('/api/teams', 'GET', []);

        if(!empty($teamResponse['data'])) {
            $teams = $teamResponse['data'];
        }

        return view('admin.edit_player')->with(compact('player', 'teams'));
    }
}
