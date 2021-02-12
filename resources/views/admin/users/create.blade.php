@extends('admin.dashboard')

@section('content')
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('users.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')

                        @include('admin.users.form_rows', ['cardTitle' => __('Add User')])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
