@extends('admin.layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <a href="{{ route('menu_create') }}">
        <button type="button" class="btn btn-dark btn-lg mb-5" data-toggle="modal" data-target="#modal-secondary">
            {{ __('menu.add_new_menu') }}
        </button>
        </a>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('menu.menu') }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <table class="table table-striped projects">
                <thead>

                <tr>
                    <th style="display:inline-block;width: 15%">
                        # Id
                    </th>
                    <th style="display:inline-block;width: 15%">
                        {{ __('menu.name') }}
                    </th >
                    <th style="display:inline-block;width: 15%">
                        {{ __('menu.menu_url') }}
                    </th>
                    <th style="display:inline-block;width: 15%">
                        {{ __('menu.status') }}
                    </th>
                    <th style="display:inline-block;width: 15%">
                        {{ __('menu.created_at') }}
                    </th>
                    <th style="display:inline-block;width: 15%">
                        {{ __('menu.updated_at') }}
                    </th>
                    <th style="display:inline-block;width: 10%">
                        {{ __('menu.action') }}
                    </th>
                </tr>

                </thead>
            </table>
            <div class="card-body p-0">
                <div class="dd" id="nestable-wrapper" style="width: 100%!important;">
                    <ol class="dd-list list-group">
                        @foreach($submenu as $item)
                            @if($item->parent_id == 0)
                        <li class="dd-item list-group-item" data-id="{{$item->id}}" title="id">
                            <div class="dd-handle"># {{$item->id}}</div>
                            <div class="dd-option-handle row">
                                    <div class="col-2" title="{{ __('menu.name') }}">{{$item->name}}</div>
                                    <div class="col-3" title="{{ __('menu.menu_url') }}">{{$item->url}}</div>
                                    <div class="col-1"  title="{{ __('menu.status') }}">
                                        @if($item->status == 1)
                                            <span class="badge badge-success">Enabled</span>
                                        @else
                                            <span class="badge badge-danger">Disable</span>
                                        @endif</div>
                                    <div class="col-2" title="{{ __('menu.created_at') }}">{{$item->created_at}}</div>
                                    <div class="col-2"  title="{{ __('menu.updated_at') }}">{{$item->updated_at}}</div>
                                <div class="col-2 project-actions text-right ">
                                     <a href="{{ route('menu_edit',$item->id)}}" class="btn btn-primary btn-sm">
                                         <i class="fas fa-pencil-alt"></i>Edit
                                     </a>
                                     <a href="" class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modal-danger-{{$item->id}}" data-value="{{$item->id}}">
                                         <i class="fas fa-trash"></i>Delete
                                     </a>
                                </div>
                                <div class="modal fade" id="modal-danger-{{$item->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                                <h4 class="modal-title">@if (count($item->childrens) >0) You cannot remove this substitution @else Do you really want to delete @endif </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @if (count($item->childrens) == 0)
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                    <form action="{{ route('menu_destroy', $item->id)}}" method="post" class="px-0 mx-0" id="form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-light">Yes</button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(count($item->childrens) >0)
                                @include('admin/includes.submenu_list',['submenu'=>$item->childrens])
                            @endif
                            @endif
                        </li>
                        @endforeach
                    </ol>
                </div>
{{--                <table class="table table-striped projects">--}}
{{--                    <thead>--}}

{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            # Id--}}
{{--                        </th>--}}
{{--                        <th>--}}
{{--                            {{ __('menu.name') }}--}}
{{--                        </th>--}}
{{--                        <th>--}}
{{--                            {{ __('menu.menu_url') }}--}}
{{--                        </th>--}}
{{--                        <th>--}}
{{--                            {{ __('menu.submenu_parent') }}--}}
{{--                        </th>--}}
{{--                        <th>--}}
{{--                            {{ __('menu.status') }}--}}
{{--                        </th>--}}
{{--                        <th>--}}
{{--                            {{ __('menu.created_at') }}--}}
{{--                        </th>--}}
{{--                        <th>--}}
{{--                            {{ __('menu.updated_at') }}--}}
{{--                        </th>--}}
{{--                    </tr>--}}

{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($submenu as $item )--}}
{{--                    <tr>--}}
{{--                        <td>--}}
{{--                            # {{$item->id}}--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                              {{$item->name}}--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                              {{$item->url}}--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            {{$item->parent_id==0?__('menu.main_submenu'):$item->parent->name}}--}}
{{--                        </td>--}}
{{--                        <td class="project-state">--}}
{{--                            @if($item->status == 1)--}}
{{--                            <span class="badge badge-success">Enabled</span>--}}
{{--                            @else--}}
{{--                                <span class="badge badge-danger">Disable</span>--}}
{{--                            @endif--}}
{{--                        </td>--}}
{{--                        <td >--}}
{{--                            {{$item->created_at}}--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            {{$item->updated_at	}}--}}
{{--                        </td>--}}
{{--                            <td class="project-actions text-right">--}}
{{--                                <a class="btn btn-primary" href="{{ route('menu_edit',$item->id)}}">--}}
{{--                                    <i class="fas fa-pencil-alt">--}}
{{--                                    </i>--}}
{{--                                    {{ __('menu.edit') }}--}}
{{--                                </a>--}}
{{--                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-danger-{{$item->id}}" data-value="{{$item->id}}">--}}
{{--                                    <i class="fas fa-trash">--}}
{{--                                    </i>--}}
{{--                                    {{ __('menu.delete') }}--}}
{{--                                </button>--}}
{{--                                <div class="modal fade" id="modal-danger-{{$item->id}}">--}}
{{--                                    <div class="modal-dialog">--}}
{{--                                        <div class="modal-content bg-danger">--}}
{{--                                            <div class="modal-header">--}}
{{--                                                <h4 class="modal-title">@if (count($item->childrens) >0) You cannot remove this substitution @else Do you really want to delete @endif </h4>--}}
{{--                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            @if (count($item->childrens) == 0)--}}
{{--                                            <div class="modal-footer justify-content-between">--}}
{{--                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>--}}
{{--                                                <form action="{{ route('menu_destroy', $item->id)}}" method="post" class="px-0 mx-0" id="form">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button type="submit" class="btn btn-outline-light">Yes</button>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                                @else--}}
{{--                                                <div class="modal-footer justify-content-between">--}}
{{--                                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </td>--}}
{{--                    </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
            </div>
            <!-- /.card-body -->
        </div>
        <div class="text-right">
            <form method="POST" action="{{ route('menu_sorting') }}" >
                @csrf
                <textarea style="display: none;" name="nested_menu_array" id="nestable-output"></textarea>
                <button type="submit" class="btn btn-success" style="margin:15px 0;" >{{ __('menu.save_sorting') }}</button>
            </form>
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


