@extends('admin/layouts.app')

@section('content')
    <form method="POST" action="{{ route('brand_update' ,$brand->id) }}" class="content">
        @csrf
        <section class="content">
            <div class="row ">

                <div class="col-md-9 mx-auto">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('brand.edit_brand') }}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">{{ __('brand.brand_name') }}</label>
                                <input type="text" id="inputName" class="form-control  @error('name') is-invalid @enderror" value="{{ $brand->name }}"  name="name" placeholder="{{ __('brand.brand_name') }}">
                                @error('name')
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
                        <input type="submit" value="{{ __('brand.edit_brand') }}" class="btn btn-success float-right">
                    </div>
                </div>
            </div>
        </section>

    </form>
@endsection
@push('js')

@endpush




