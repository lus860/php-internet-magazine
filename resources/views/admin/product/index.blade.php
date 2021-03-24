@extends('admin.layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <a href="{{ route('product_create') }}">
            <button type="button" class="btn btn-dark btn-lg mb-5" data-toggle="modal" data-target="#modal-secondary">
                {{ __('product.new_product_create') }}
            </button>
        </a>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('product.product') }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body p-0">

                <table class="table table-striped projects">
                    <thead>

                    <tr>
                        <th>
                            # Id
                        </th>
                        <th>
                            {{ __('product.name') }}
                        </th>
                        <th>
                            {{ __('product.image') }}
                        </th>
                        <th>
                            {{ __('product.price') }}
                        </th>
                        <th>
                            {{ __('product.new_price') }}
                        </th>
                        <th>
                            {{ __('product.quantity') }}
                        </th>
                        <th>
                            {{ __('product.status') }}
                        </th>
                        <th>
                            {{ __('product.sale') }}
                        </th>
                        <th>
                            {{ __('product.active') }}
                        </th>
                        <th>
                            {{ __('product.category') }}
                        </th>
                        <th>
                            {{ __('product.subcategory') }}
                        </th>
                        <th>
                            {{ __('product.brand') }}
                        </th>
                        <th>
                            {{ __('product.updated_at') }}
                        </th>
                        <th>
                            {{ __('product.created_at') }}
                        </th>
                        <th>
                            {{ __('menu.action') }}
                        </th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($products as $item )
                        <tr>
                            <td>
                                # {{$item->id}}
                            </td>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>
                                <img src="@if($item->mainImg()) {{$item->mainImg()}}
                                @elseif($item->images()->first()->img) {{$item->images()->first()->img}}
                                @else {{asset('/admin/dist/img/product/no-image.png')}} @endif" style="width: 100px">
                            </td>
                            <td>
                                {{$item->price}}
                            </td>
                            <td>
                                {{$item->new_price}}
                            </td>
                            <td>
                                {{$item->quantity}}
                            </td>
                            <td class="project-state">
                                @if($item->status == 1)
                                    <span class="badge badge-success">OLD</span>
                                @else
                                    <span class="badge badge-danger">NEW</span>
                                @endif
                            </td>
                            <td class="project-state">
                                @if($item->sale == 1)
                                    <span class="badge badge-success">Sale</span>
                                @else
                                    <span class="badge badge-danger">No Sale</span>
                                @endif
                            </td>
                            <td class="project-state">
                                @if($item->active == 1)
                                    <span class="badge badge-success">Enabled</span>
                                @else
                                    <span class="badge badge-danger">Disable</span>
                                @endif
                            </td>
                            <td>
                                {{$item->category->name}}
                            </td>
                            <td>
                                {{$item->sub_category?$item->sub_category->name:'--'}}
                            </td>
                            <td>
                                {{$item->brand->name}}
                            </td>

                            <td>
                                {{$item->created_at}}
                            </td>
                            <td>
                                {{$item->updated_at	}}
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary" href="{{ route('product_edit',$item->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    {{ __('product.edit') }}
                                </a>
                                <button class="btn btn-danger" type="button" data-toggle="modal"
                                        data-target="#modal-danger-{{$item->id}}" data-value="{{$item->id}}">
                                    <i class="fas fa-trash">
                                    </i>
                                    {{ __('product.delete') }}
                                </button>
                                <div class="modal fade" id="modal-danger-{{$item->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Do you really want to delete</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <form action="{{ route('product_destroy', $item->id)}}" method="post"
                                                      class="px-0 mx-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-light">Yes</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>

    {{ $products->links() }}
        <!-- /.card -->
    </section>

@endsection
@push('css')
@endpush
@push('js')
    <script>
    </script>
@endpush


