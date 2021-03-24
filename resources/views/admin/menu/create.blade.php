@extends('admin/layouts.app')

@section('content')
    <form method="POST" action="{{ route('menu_store') }}" class="content">
        @csrf
        <section class="content">
            <div class="row ">

                <div class="col-md-9 mx-auto">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('menu.new_menu_create') }}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">{{ __('menu.menu_name') }}</label>
                                <input type="text" id="inputName"
                                       class="form-control  @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}" name="name" placeholder="{{ __('menu.menu_name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{ __('menu.all_menu_items') }}</label>
                                <select class="form-control select2" style="width: 100%;" name="parent_id">
                                    <option selected="selected"
                                            disabled>{{ __('menu.select_parent_menu_item') }}</option>
                                    <option value="0">{{ __('menu.main_submenu') }}</option>
                                    @foreach($menuItems as $k=>$item)
                                        <option value="{{$k}}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">{{ __('menu.menu_url') }}</label>
                                <input type="text" id="inputName"
                                       class="form-control  @error('url') is-invalid @enderror" value="{{ old('url') }}"
                                       name="url" placeholder="{{ __('menu.menu_url') }}">
                                @error('url')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">{{ __('menu.menu_status') }}</label><br>
                                <input type="checkbox" name="status" data-bootstrap-switch data-off-color="danger"
                                       data-on-color="success">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div>
                        <input type="submit" value="{{ __('menu.new_menu_create') }}"
                               class="btn btn-success float-right">
                    </div>
                </div>
            </div>
        </section>

    </form>
@endsection
@push('js')

@endpush




