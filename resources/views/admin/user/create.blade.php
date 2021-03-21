@extends('admin/layouts.app')

@section('content')
    <form method="POST" action="{{ route('user_store') }}" class="content">
        @csrf
        <section class="content">
            <div class="row ">

                <div class="col-md-9 mx-auto">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('user.new_user_create') }}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">{{ __('user.firstname') }}</label>
                                <input type="text" id="inputName" class="form-control  @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}" name="firstname" placeholder="{{ __('user.firstname') }}">
                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">{{ __('user.lastname') }}</label>
                                <input type="text" id="inputName" class="form-control  @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" name="lastname" placeholder="{{ __('user.lastname') }}">
                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">{{ __('user.phone') }}</label>
                                <input type="text" id="inputName" class="form-control  @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" placeholder="{{ __('user.phone') }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">{{ __('user.address') }}</label>
                                <input type="text" id="inputName" class="form-control  @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" placeholder="{{ __('user.address') }}">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">{{ __('user.email') }}</label>
                                <input type="email" id="inputName" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="{{ __('user.email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">{{ __('user.password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="" name="password" autocomplete="new-password" placeholder="{{ __('user.password') }}">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputName">{{ __('user.password_confirmation') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="" autocomplete="new-password" placeholder="{{ __('user.password_confirmation') }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('user.role') }}</label>
                                <select class="form-control select2" style="width: 100%;" name="role">
                                    <option selected="selected" disabled>{{ __('user.role') }}</option>
                                    @foreach($role as $k => $item)
                                        <option value="{{$item}}" name="role">{{ $k }}</option>
                                    @endforeach
                                </select>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">{{ __('user.email_verified_at') }}</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control @error('email_verified_at') is-invalid @enderror datetimepicker-input" data-target="#reservationdate" name="email_verified_at"/>
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                @error('email_verified_at')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div>
                        <input type="submit" value="{{ __('user.new_user_create') }}" class="btn btn-success float-right">
                    </div>
                </div>
            </div>
        </section>

    </form>
@endsection
@push('js')

@endpush




