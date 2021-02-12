@extends('admin.dashboard')

@section('content')
    <div class="main">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <form method="post" action="{{ route('companies.update', $company) }}" autocomplete="off"
                          class="form-horizontal">
                        @csrf
                        @method('put')

                        @include('admin.companies.form_rows', ['cardTitle' => __('Edit Company')])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
