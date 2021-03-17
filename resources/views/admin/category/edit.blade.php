@extends('admin/layouts.app')

@section('content')
    <form method="POST" action="{{ route('category_update' ,$category->id) }}" class="content">
        @csrf
        <section class="content">
            <div class="row ">

                <div class="col-md-9 mx-auto">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('category.edit_category') }}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">{{ __('category.category_name') }}</label>
                                <input type="text" id="inputName" class="form-control  @error('name') is-invalid @enderror" value="{{ $category->name }}"  name="name" placeholder="{{ __('category.category_name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>{{ __('category.select_subcategory') }}</label>
                                <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="subcategories[]">
                                    @foreach($subcategories as $item)
                                        <option value="{{ $item->id }}" @if($category->inArray($item->id)) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div>
                        <input type="submit" value="{{ __('category.edit_category') }}" class="btn btn-success float-right">
                    </div>
                </div>
            </div>
        </section>

    </form>
@endsection
@push('js')

@endpush




