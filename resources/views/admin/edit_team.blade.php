@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Team</div>
                <div class="card-body">
                    <form name="add_team" action="" method="POST" class="edit_team">
                        @csrf
                        <input type="hidden" name="team_id" value="{{ @$team['id']}}">
                        <div class="form-group">
                            <label>Team Name</label>
                            <input maxlength="100" name="team_name" value="{{ @$team['name']}}" type="text" placeholder="Enter Team name" class="form-control" required>
                            <small id="emailHelp" class="form-text text-muted">
                                We'll use this team name for your team
                            </small>
                        </div>
                        <div class="form-group">
                            <label>Team Logo</label>
                            <input maxlength="200" name="team_logo" value="{{ @$team['logo_url']}}" type="url" placeholder="Enter Team logo url" class="form-control" required>
                            <small id="logoHelp" class="form-text text-muted">
                                We'll show this logo for branding
                            </small>
                        </div>
                        <div class="alert alert-danger error"></div>
                        <button type="submit" id="edit_team" class="btn btn-primary">
                            Update Team
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
