@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Teams</div>
                <div>
                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
                    @endif
                    <div class="alert alert-danger error"></div>
                    <a href="{{ route('addTeam') }}" class="btn btn-primary new_button">Create New Team</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Team Logo</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($teams as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td><img src="{{ $item['logo_url'] }}" alt="Card image cap"></td>
                                    <td>
                                        <a href="{{ route('editTeam', ['id' => $item['id']]) }}" class="btn btn-secondary">Edit</a> 
                                        |
                                        <a href="javascript:void(0);" data-team_id="{{ $item['id'] }}" class="btn btn-danger delete_team">Delete</a>
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
