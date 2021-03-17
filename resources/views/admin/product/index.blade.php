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
                            {{ __('product.quantity') }}
                        </th>
                        <th>
                            {{ __('product.status') }}
                        </th>
                        <th>
                            {{ __('product.sale') }}
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
                        <th >
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
                            <img src="{{$item->img}}" style="width: 100px">
                        </td>
                        <td>
                              {{$item->price}}
                        </td>
                        <td>
                            {{$item->quantity}}
                        </td>
                        <td class="project-state">
                            @if($item->status == 1)
                                <span class="badge badge-success">Enabled</span>
                            @else
                                <span class="badge badge-danger">Disable</span>
                            @endif
                        </td>
                        <td class="project-state">
                            @if($item->sale == 1)
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

                        <td >
                            {{$item->created_at}}
                        </td>
                        <td>
                            {{$item->updated_at	}}
                        </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary" href="{{ route('product_edit',$item->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    {{ __('menu.edit') }}
                                </a>
                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-danger-{{$item->id}}" data-value="{{$item->id}}">
                                    <i class="fas fa-trash">
                                    </i>
                                    {{ __('menu.delete') }}
                                </button>
                                <div class="modal fade" id="modal-danger-{{$item->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Do you really want to delete</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                <form action="{{ route('product_destroy', $item->id)}}" method="post" class="px-0 mx-0" id="form">
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

        <!-- /.card -->
    </section>

@endsection
@push('css')
@endpush
@push('js')
    <script>

        $(document).ready(function()
        {

            var updateOutput = function(e)
            {
                var list   = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };

            // activate Nestable for list 1
            $('#nestable-wrapper').nestable({
                group: 1,
                maxDepth : 10,
            })
                .on('change', updateOutput);

            // output initial serialised data
            updateOutput($('#nestable-wrapper').data('output', $('#nestable-output')));

            $('#nestable-menu').on('click', function(e)
            {
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });


        });

    </script>
@endpush


