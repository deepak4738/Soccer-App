@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Player Detail</h3>
                            <hr>
                            @if(!empty($playerDetails))
                                <div class="card col-md-3" style="padding: 10px;" >
                                    <img class="card-img-top" src="{{ $playerDetails['player_image_url'] }}" alt="Card image cap">
                                    <div class="card-block">
                                        <p class="card-text">
                                            Player: {{ $playerDetails['last_name'] }} {{ $playerDetails['first_name'] }}<br>
                                            Team: {{ $playerDetails['team']['name'] }}
                                        </p>
                                    </div>
                                </div>
                            @else
                                <p> {{ __('Unfortunately no details fetched!!') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
