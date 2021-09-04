<?php

namespace App\Repositories;

use App\Models\Player;
use App\Repositories\SoccerRepository;

class PlayerRepository implements SoccerRepository
{   
    protected $player = null;

    /**
     * Get all records as a result-set in an array
     *
     * @return array
     */
    public function getAll( $id = null, $orderBy = 'first_name' )
    {
        if($id) {
            return Player::where('team_id', $id)
                    ->orderBy($orderBy)
                    ->get();
        } else {
            return Player::orderBy($orderBy)
                    ->get();
        }
    }

    /**
     * Get record based on ID
     *
     * @return array
     */
    public function findById($id)
    {
        return Player::with(['team'])->find($id);
    }

    /**
     * Create or Update record in data-set in datatable
     *
     * @return boolean
     */
    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $player = new Player;
            $player->first_name = $collection['first_name'];
            $player->last_name = $collection['last_name'];
            $player->player_image_url = $collection['player_image_url'];
            $player->team_id = $collection['team_id'];

            return $player->save();
        }

        $player = Player::find($id);
        $player->first_name = $collection['first_name'];
        $player->last_name = $collection['last_name'];
        $player->player_image_url = $collection['player_image_url'];
        $player->team_id = $collection['team_id'];

        return $player->save();
    }
    
    /**
     * Delete record from data-set in data-table
     *
     * @return boolean
     */
    public function delete($id)
    {
        return Player::find($id)->delete();
    }
}