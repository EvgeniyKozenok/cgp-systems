@extends('admin.dashboard')

@section('content')
    <div class="main">
        <div style="padding-top: 20px" class="container-fluid">
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route('users.create') }}">Add User</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    User List
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert @if (session('error')) alert-danger @else alert-success @endif">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <span>{{ session('status') }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <div class="dt-bootstrap4 no-footer">
                            <div class="dataTables_scroll">
                                <div class="dataTables_scrollHead"
                                     style="overflow: hidden; position: relative; border: 0 none; width: 100%;">
                                    <div class="dataTables_scrollHeadInner"
                                         style="box-sizing: content-box;  width: 100%; padding-right: 15px;">
                                        <table
                                            class="table table-bordered table-striped table-hover datatable datatable-User dataTable no-footer"
                                            role="grid" style="margin-left: 0; width: 100%;">
                                            <thead>
                                            <tr role="row">
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>User Companies</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            @foreach($users as $user)
                                                <tr data-entry-id="1" role="row" @if ($loop->even)class="odd"@endif>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>

                                                    <td>{{ $user->email }}</td>

                                                    <td>
                                                        <span class="badge badge-info">
                                                            {{ $user->roles()->get()->implode('name', '; ') ?? '' }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        {{ $user->companies->implode('name', '; ') ?? '' }}
                                                    </td>


                                                    <td>
                                                        <form action="{{ route('users.destroy', $user) }}"
                                                              method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a class="btn btn-xs btn-info"
                                                               href="{{ route('users.edit', $user) }}">Edit</a>
                                                            @if(auth()->id() !== $user->id)
                                                                <input type="submit" class="btn btn-xs btn-danger delete-btn"
                                                                       value="Delete"
                                                                       data-msg="{{ __("Are you sure you want to delete this user?") }}"
                                                                >
                                                            @endif
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                            </div>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
