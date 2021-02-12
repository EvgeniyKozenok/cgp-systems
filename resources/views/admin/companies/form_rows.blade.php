<div class="card ">
    <div class="card-header card-header-success">
        <h4 class="card-title">{{ $cardTitle }}</h4>
        <p class="card-category"></p>
    </div>
    <div class="card-body ">
        @if (session('status'))
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{ url()->previous() }}"
                   class="btn btn-sm btn-success">{{ __('Back') }}</a>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label" for="input-name">{{ __('Name') }}</label>
            <div class="col-sm-7">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           name="name" id="input-name" type="text"
                           placeholder="{{ __('Name') }}"
                           value="{{ old('name', $company->name ?? '') }}"
                           required="true" aria-required="true"/>
                    @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label"
                   for="input-address">{{ __('Company Address') }}</label>
            <div class="col-sm-7">
                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                    <input
                        class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                        name="address" id="input-address" type="text"
                        placeholder="{{ __('Address') }}"
                        value="{{ old('address', $company->address ?? '') }}"
                    />
                    @if ($errors->has('address'))
                        <span id="name-error" class="error text-danger">{{ $errors->first('address') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
        </div>
    </div>
</div>
