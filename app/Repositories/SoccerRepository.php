<?php

namespace App\Repositories;

interface SoccerRepository
{
    public function getAll( $id = null, $orderBy = null );

    public function findById( $id );

    public function createOrUpdate( $id = null, $collection = [] );

    public function delete( $id );
}