@extends('admin/layouts.app')

@section('content')
    <form method="POST" action="{{ route('product_update',$product->id) }}" class="content" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="row ">

                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('product.edit_product') }}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">{{ __('product.product_name') }}</label>
                                <input type="text" id="inputName" class="form-control  @error('name') is-invalid @enderror" value="{{ $product->name}}" name="name" placeholder="{{ __('product.product_name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">{{ __('product.product_price') }}</label>
                                <input type="number" id="inputName" class="form-control  @error('price') is-invalid @enderror" value="{{$product->price}}" name="price" placeholder="{{ __('product.product_price') }}">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">{{ __('product.product_quantity') }}</label>
                                <input type="number" id="inputName" class="form-control  @error('quantity') is-invalid @enderror" value="{{$product->quantity}}" name="quantity" placeholder="{{ __('product.product_quantity') }}">
                                @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">{{ __('product.product_img') }}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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

                            <img src="{{$product->img}}" style="width: 140px">
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>
                <div class="col-md-6">
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
                            <div class="form-group">
                                <label>{{ __('product.product_categories') }}</label>
                                <select class="form-control select2" style="width: 100%;" name="category_id">
                                    <option selected="selected" disabled>{{ __('product.product_categories_select') }}</option>
                                    @foreach($categories as $item)
                                        <option value="{{$item->id}}" @if($product->category->id == $item->id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('product.product_subcategories') }}</label>
                                <select class="form-control select2" style="width: 100%;" name="subcategory_id">
                                    <option selected="selected" disabled>{{ __('product.product_subcategories_select') }}</option>
                                    @foreach($subcategories as $item)
                                        <option value="{{$item->id}}" @if($product->sub_category && $product->sub_category->id == $item->id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('product.product_brands') }}</label>
                                <select class="form-control select2" style="width: 100%;" name="brand_id">
                                    <option selected="selected" disabled>{{ __('product.product_brands_select') }}</option>
                                    @foreach($brands as $item)
                                        <option value="{{$item->id}}" @if($product->brand->id == $item->id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3" name="status" @if($product->sale ==1) checked  @endif>
                                    <label class="custom-control-label" for="customSwitch3">{{ __('product.product_status_change') }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch4" name="sale" @if($product->status ==1) checked  @endif>
                                    <label class="custom-control-label" for="customSwitch4">{{ __('product.product_sale_change') }}</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div>
                        <input type="submit" value="{{ __('product.edit_product') }}" class="btn btn-success float-right">
                    </div>
                </div>
            </div>
        </section>

    </form>
@endsection

@push('js')

@endpush




