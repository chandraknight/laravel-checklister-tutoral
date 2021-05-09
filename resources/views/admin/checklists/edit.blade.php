@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form
                            action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header">{{ __('Edit Checklist') }}</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input value="{{ old('name', $checklist->name) }}" class="form-control"
                                                name="name" type="text" placeholder="{{ __('Checklist name') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Checklist') }}</button>
                            </div>
                        </form>
                    </div>

                    <form action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('{{ __('Are you sure?') }}')">
                            {{ __('Delete This Checklist') }}</button>
                    </form>
                    <hr />
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"><i class="fa fa-align-justify"></i> {{ __('List of Tasks') }}
                                </div>

                                <div class="card-body">
                                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                        <thead>

                                        </thead>
                                        <tbody>
                                            @forelse($checklist->tasks as $task)
                                                <tr>
                                                    <td>{{ $task->name }}</td>
                                                    <td><a href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}"
                                                            class="badge badge-success">{{ __('Edit') }}</a>
                                                        <form class="d-inline"
                                                            action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="badge badge-danger" type="submit"
                                                                onclick="return confirm('{{ __('Are you sure?') }}')">
                                                                {{ __('Delete This Task') }}</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <p>There is no task available right now </p>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{-- <nav>
                        <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                        </nav> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card">

                        @include('admin.tasks.create')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
