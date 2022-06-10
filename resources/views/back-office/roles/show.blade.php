@extends('layouts.back-office')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Role</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                        <li class="breadcrumb-item active">Update role</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Role</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('roles.update', $role->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="rolePermissions">Role Permissions</label><br>
                                    <div class="checkboxes">
                                        @foreach ($permissions as $permission)
                                            <div class="custom-control custom-control-sm custom-checkbox checkbox-div">
                                                <input name="permissions[]" type="checkbox" class="custom-control-input" id="{{ $permission->id }}" value="{{ $permission->id }}" {{ $role->hasPermissionTo($permission->id) ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="{{$permission->id}}">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
@endpush

@push('scripts')
@endpush
