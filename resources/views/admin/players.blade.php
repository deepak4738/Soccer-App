@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Players</div>
                <div>
                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
                    @endif
                    <div class="alert alert-danger error"></div>
                    <a href="{{ route('addPlayer') }}" class="btn btn-primary new_button">Create New Player</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Player Image</th>
                                <th>Team ID</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($players as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ $item['first_name'] }} {{ $item['last_name'] }}</td>
                                    <td><img src="{{ $item['player_image_url'] }}" alt="Card image cap"></td>
                                    <td>{{ $item['team_id'] }}</td>
                                    <td>
                                        <a href="{{ route('editPlayer', [ 'id' => $item['id'] ]) }}" class="btn btn-secondary">Edit</a> 
                                        |
                                        <a href="javascript:void(0);" data-player_id="{{ $item['id'] }}" class="btn btn-danger delete_player">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
