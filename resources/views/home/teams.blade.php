@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('Team Listing') }}</div>
                        <div class="panel-body">
                            @if(!empty($teams))
                                @foreach( $teams as $team )
                                <div class="card col-md-3" style="padding: 10px;">
                                    <img class="card-img-top" src="{{ $team['logo_url'] }}" alt="Card image cap">
                                    <div class="card-block">
                                        <h4 class="card-title">{{ $team['name'] }}</h4>
                                        <a href="{{ route('getPlayers', [ 'id' => $team['id']])}}" class="btn btn-primary">View player(s)</a>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p> {{ __('Unfortunately no teams are added. Hence, no data availale!!') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
