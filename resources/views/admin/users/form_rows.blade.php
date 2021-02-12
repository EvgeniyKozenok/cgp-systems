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

        @if (isset($roles) && $roles)
            <div class="row">
                <label class="col-sm-2 col-form-label"
                       for="role">{{ __('Choose Role') }}</label>
                <div class="col-sm-7">
                    <div class="form-group">
                        <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                            <select required="required" class="form-control" name="role" id="role">
                                @foreach ($roles as $role)
                                    <option
                                        value="{{ $role->id }}" {{ $user  ?? null && $user->roles()->first()->id == $role->id ? 'selected' : '' }}>{{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('role'))
                                <span id="role-error" class="error text-danger">{{ $errors->first('role') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <label class="col-sm-2 col-form-label" for="name">{{ __('Name') }}</label>
            <div class="col-sm-7">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           name="name" id="input-name" type="text"
                           placeholder="{{ __('Name') }}" value="{{ old('name', $user->name ?? '') }}"
                           required="true" aria-required="true"/>
                    @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label" for="email">{{ __('Email') }}</label>
            <div class="col-sm-7">
                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" id="input-email" type="email"
                           placeholder="{{ __('Email') }}"
                           value="{{ old('email', $user->email ?? '') }}"
                           required/>
                    @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label" for="password">{{ __(' Password') }}</label>
            <div class="col-sm-7">
                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <input
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                        type="password" name="password" id="input-password"
                        placeholder="{{ __('Password') }}" value="{{ old('password') }}"/>
                    @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
        </div>
    </div>
</div>
