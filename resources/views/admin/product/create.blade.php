@extends('admin/layouts.app')

@section('content')
    <form method="POST" action="{{ route('product_store') }}" class="content dropdowne" id="my-awesome-dropzone"
          enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="row ">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('product.new_product_create') }}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputName">{{ __('product.product_name') }}</label>
                                    <input type="text" id="inputName"
                                           class="form-control  @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" name="name"
                                           placeholder="{{ __('product.product_name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('product.product_brands') }}</label>
                                    <select class="form-control select2" style="width: 100%;" name="brand_id">
                                        <option selected="selected"
                                                disabled>{{ __('product.product_brands_select') }}</option>
                                        @foreach($brands as $item)
                                            <option value="{{$item->id}}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPrice">{{ __('product.product_price') }}</label>
                                    <input type="number" id="inputPrice"
                                           class="form-control  @error('price') is-invalid @enderror"
                                           value="{{ old('price') }}" name="price"
                                           placeholder="{{ __('product.product_price') }}">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('product.product_categories') }}</label>
                                    <select class="form-control select2" style="width: 100%;" name="category_id">
                                        <option selected="selected"
                                                disabled>{{ __('product.product_categories_select') }}</option>
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputNewPrice">{{ __('product.product_new_price') }}</label>
                                    <input type="number" id="inputNewPrice"
                                           class="form-control  @error('new_price') is-invalid @enderror"
                                           value="{{old('new_price')}}" name="new_price"
                                           placeholder="{{ __('product.product_new_price') }}">
                                    @error('new_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('product.product_subcategories') }}</label>
                                    <select class="form-control select2" style="width: 100%;" name="subcategory_id">
                                        <option selected="selected"
                                                disabled>{{ __('product.product_subcategories_select') }}</option>
                                        @foreach($subcategories as $item)
                                            <option value="{{$item->id}}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputQuantity">{{ __('product.product_quantity') }}</label>
                                        <input type="number" id="inputQuantity"
                                               class="form-control  @error('quantity') is-invalid @enderror"
                                               value="{{ old('quantity') }}" name="quantity"
                                               placeholder="{{ __('product.product_quantity') }}">
                                        @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div
                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <span style="margin-left: -35px">New/Old</span><br>
                                            <input type="checkbox" class="custom-control-input" id="customSwitch3"
                                                   name="status">
                                            <label class="custom-control-label"
                                                   for="customSwitch3">{{ __('product.product_status_change') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div
                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <span style="margin-left: -35px">No Sale/Sale</span><br>
                                            <input type="checkbox" class="custom-control-input" id="customSwitch4"
                                                   name="sale">
                                            <label class="custom-control-label"
                                                   for="customSwitch4">{{ __('product.product_sale_change') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div
                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <span style="margin-left: -35px">Disable/Enabled</span><br>
                                            <input type="checkbox" class="custom-control-input" id="customSwitch5"
                                                   name="active">
                                            <label class="custom-control-label"
                                                   for="customSwitch5">{{ __('product.product_active_change') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="exampleInputFile">{{ __('product.product_img') }}</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                       multiple="multiple" name="image[]">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        @error('image')
                                        <div class="">
                                   <span role="alert" style="color:#dc3545">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">{{ __('product.product_main_img') }}</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile1"
                                                       name="main_image">
                                                <label class="custom-file-label" for="exampleInputFile1">Choose main
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        @error('main_image')
                                        <div class="">
                                   <span role="alert" style="color:#dc3545">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div>
                    <input type="submit" value="{{ __('product.new_product_create') }}"
                           class="btn btn-success float-right">
                </div>
            </div>

        </section>

    </form>

@endsection

@push('js')
@endpush




