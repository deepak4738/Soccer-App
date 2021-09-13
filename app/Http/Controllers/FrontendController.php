<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    
    /**
     * Display a listing of the teams.
     *
     * @param None
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $teams = [];
        $response = $this->getData('/api/teams', 'GET', []);

        if(!empty($response['data'])) {
            $teams = $response['data'];
        }
        
        return view('home.teams')->with(compact('teams'));
    }

    /**
     * Fetch and display listing of team players
     * 
     * @param integer $id
     * @return \Illuminate\Http\Response
    */
    public function getPlayers($id)
    {
        $players = [];
        $teamDetails = [];
        $response = $this->getData('/api/team/'.$id, 'GET', []);

        if(!empty($response['data'])) {
            $players = $response['data']['players'];
            $teamDetails = $response['data']['teamDetails'];
        }

        return view('home.team_players')->with(compact('players', 'teamDetails'));
    }

    /**
     * Fetch player details
     * 
     * @param integer $id
     * @return \Illuminate\Http\Response
    */
    public function getPlayer($id)
    {
        $playerDetails = [];        
        $response = $this->getData('/api/player/'.$id, 'GET', []);

        if(!empty($response['data'])) {
            $playerDetails = $response['data'];
        }
        
        return view('home.player_details')->with(compact('playerDetails'));
    }
}
