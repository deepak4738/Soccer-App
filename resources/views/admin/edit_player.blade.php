@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Player</div>
                <div class="card-body">
                    <form name="edit_player" action="" method="POST" class="edit_player">
                        @csrf
                        <input type="hidden" name="player_id" value="{{ @$player['id']}}">
                        <div class="form-group">
                            <label>First Name</label>
                            <input maxlength="100" name="first_name" value="{{ @$player['first_name']}}" type="text" placeholder="Enter player first name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input maxlength="100" name="last_name" value="{{ @$player['last_name']}}" type="text" placeholder="Enter player last name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Player Logo</label>
                            <input maxlength="200" name="player_image_url" value="{{ @$player['player_image_url']}}" type="url" placeholder="Enter Player logo url" class="form-control">
                            <small id="logoHelp" class="form-text text-muted">
                                We'll show this logo for branding
                            </small>
                        </div>
                        <div class="form-group">
                            <label>Choose Team</label>
                            <select class="form-control" name="team_id">
                                <option value=""></option>
                                @if(!empty($teams))
                                    @foreach($teams as $team)
                                        <option value="{{ $team['id']}}" {{ (@$player['team_id'] == $team['id'] ? "selected" : "") }}>{{ $team['name']}}</option>
                                    @endforeach
                                @endif
                                
                            </select>
                        </div>
                        <div class="alert alert-danger error"></div>
                        <button type="submit" id="edit_player" class="btn btn-primary">
                            Update Player
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
