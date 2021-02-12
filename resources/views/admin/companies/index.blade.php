@extends('admin.dashboard')

@section('content')
    <div class="main">
        <div style="padding-top: 20px" class="container-fluid">
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route('companies.create') }}">Add Company</a>
                </div>
            </div>

            <div class="card">
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
                                            class="table table-bordered table-striped table-hover datatable datatable dataTable no-footer"
                                            role="grid" style="margin-left: 0; width: 100%;">
                                            <thead>
                                            <tr role="row">
                                                <th>ID</th>
                                                <th>Company Name</th>
                                                <th>Company Address</th>
                                                <th>Users</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            @foreach($companies as $company)
                                                <tr data-entry-id="1" role="row" @if ($loop->even)class="odd"@endif>
                                                    <td>{{ $company->id }}</td>
                                                    <td>{{ $company->name }}</td>
                                                    <td>{{ $company->address }}</td>
                                                    <td>{{ $company->users->implode('name', '; ') ?? ''  }}</td>
                                                    <td>
                                                        <form action="{{ route('companies.destroy', $company) }}"
                                                              method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a class="btn btn-xs btn-info"
                                                               href="{{ route('companies.edit', $company) }}">Edit</a>
                                                            <input type="submit" class="btn btn-xs btn-danger delete-btn"
                                                                   value="Delete"
                                                                   data-msg="{{ __("Are you sure you want to delete this company?") }}"
                                                            >
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                            </div>
                            {{ $companies->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
