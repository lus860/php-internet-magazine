@extends('admin/layouts.app')

@section('content')
    <form method="POST" action="{{ route('product_update',$product->id) }}" class="content" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="row ">
                <div class="col-md-12">
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
                            <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputName">{{ __('product.product_name') }}</label>
                                <input type="text" id="inputName" class="form-control  @error('name') is-invalid @enderror" value="{{ $product->name}}" name="name" placeholder="{{ __('product.product_name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                                <div class="form-group col-md-6">
                                    <label>{{ __('product.product_brands') }}</label>
                                    <select class="form-control select2" style="width: 100%;" name="brand_id">
                                        <option selected="selected" disabled>{{ __('product.product_brands_select') }}</option>
                                        @foreach($brands as $item)
                                            <option value="{{$item->id}}" @if($product->brand->id == $item->id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputName">{{ __('product.product_price') }}</label>
                                    <input type="number" id="inputName" class="form-control  @error('price') is-invalid @enderror" value="{{$product->price}}" name="price" placeholder="{{ __('product.product_price') }}">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('product.product_subcategories') }}</label>
                                    <select class="form-control select2" style="width: 100%;" name="subcategory_id">
                                        <option selected="selected" disabled>{{ __('product.product_subcategories_select') }}</option>
                                        @foreach($subcategories as $item)
                                            <option value="{{$item->id}}" @if($product->sub_category && $product->sub_category->id == $item->id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputName">{{ __('product.product_new_price') }}</label>
                                    <input type="number" id="inputName" class="form-control  @error('new_price') is-invalid @enderror" value="{{$product->new_price?$product->new_price:0}}" name="new_price" placeholder="{{ __('product.product_new_price') }}">
                                    @error('new_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('product.product_categories') }}</label>
                                    <select class="form-control select2" style="width: 100%;" name="category_id">
                                        <option selected="selected" disabled>{{ __('product.product_categories_select') }}</option>
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}" @if($product->category->id == $item->id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputName">{{ __('product.product_quantity') }}</label>
                                    <input type="number" id="inputName" class="form-control  @error('quantity') is-invalid @enderror" value="{{$product->quantity}}" name="quantity" placeholder="{{ __('product.product_quantity') }}">
                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputFile">{{ __('product.product_img') }}</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image[]" multiple="multiple">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch4" name="status" @if($product->status ==1) checked  @endif>
                                            <label class="custom-control-label" for="customSwitch4">{{ __('product.product_status_change') }}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch3" name="sale" @if($product->sale ==1) checked  @endif>
                                            <label class="custom-control-label" for="customSwitch3">{{ __('product.product_sale_change') }}</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div>
                    <input type="submit" value="{{ __('product.edit_product') }}" class="btn btn-success float-right">
                </div>
            </div>
        </section>
    </form>

    <section class="content" style="margin-top: 50px">
    <div class="row">
        @foreach($product->images as $img)
            <div class="col-md-3">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"> @if ($img->status == 1) Main @endif</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-success-{{$img->id}}" data-value="{{$img->id}}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button"  data-toggle="modal" data-target="#modal-danger-{{$img->id}}" data-value="{{$img->id}}"  class="btn btn-tool"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0px!important;">
                        <img src="{{$img->img}}" style="width: 100%!important;">
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-success-{{$img->id}}">
                <div class="modal-dialog">
                    <div class="modal-content bg-success">
                        <div class="modal-header">
                            <h4 class="modal-title"> Want to change the picture? </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <form action="{{ route('image_update', ['prod_id' => $product->id, 'img_id' =>$img->id])}}"
                                  method="post" class="px-0 mx-0 w-100" id="form" enctype="multipart/form-data">
                                @csrf
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"
                                           id="exampleInputFile"
                                           name="main_img">
                                    <label class="custom-file-label"
                                           for="exampleInputFile">Choose
                                        file</label>
                                </div>
                                @error('image')
                                <div class="">
                                                                <span role="alert" style="color:#dc3545">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                </div>
                                @enderror

                                <div class="pt-2">
                                    <button type="submit" class="btn btn-outline-light float-right">
                                        Send
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-danger-{{$img->id}}">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-header">
                            <h4 class="modal-title">Do you really want to delete </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                <form action="{{ route('image_destroy', ['prod_id' => $product->id, 'img_id' =>$img->id])}}" method="post" class="px-0 mx-0" id="form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-light">Yes</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </section>
@endsection

@push('js')

@endpush




