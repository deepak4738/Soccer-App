@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        @if(!empty($teamDetails))
                        <div class="panel-heading">
                            <span class="card-img-top-span">Team: {{ $teamDetails['name'] }}</span>
                            <br><img class="card-img-top" src="{{ $teamDetails['logo_url'] }}" alt="Team Image">
                        </div>
                        @endif
                        <div class="panel-body">
                            <h4>Team Players</h4>
                            <hr>
                            @if(!empty($players))
                                @foreach( $players as $player )
                                <div class="card col-md-3" style="padding: 10px;">
                                    <a href="{{ route('getPlayer', [ 'id' => $player['id']])}}">
                                        <img class="card-img-top" src="{{ $player['player_image_url'] }}" alt="Card image cap">
                                        <div class="card-block">
                                            <p class="card-text">
                                                {{ $player['last_name'] }} {{ $player['first_name'] }}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            @else
                                <p> {{ __('Unfortunately no players are added under this team. Hence, no data availale!!') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
