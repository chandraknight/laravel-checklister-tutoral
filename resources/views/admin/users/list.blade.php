@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header"><i class="fa fa-align-justify"></i> {{ __('List of Users') }}</div>

                        <div class="card-body">
                            <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>{{ __('Sn') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Website') }}</th>
                                        <th>{{ __('Create At') }}</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td> {{ $user->email }}</td>
                                            <td> {{ $user->website }}</td>
                                            <td> {{ $user->created_at }}</td>
                                        </tr>
                                    @empty
                                        <p>There is no task available right now </p>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                        <div class="card-footer">
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

@section('scripts')

@endsection
