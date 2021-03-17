@extends('admin.layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="">
            <a href="{{ route('category_create') }}">
                <button type="button" class="btn btn-dark btn-lg mb-5 " data-toggle="modal" data-target="#modal-secondary">
                    {{ __('category.new_category_create') }}
                </button>
            </a>
        </div>


        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">{{ __('category.categories') }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <table class="table table-striped projects w-100">
                    <thead>
                    <tr>
                        <th style="width: 10%">
                            # Id
                        </th>
                        <th style="width:15%">
                            {{ __('category.name') }}
                        </th >
                        <th style="width:20%">
                            {{ __('category.subcategories') }}
                        </th >
                        <th style="width: 15%">
                            {{ __('category.created_at') }}
                        </th>
                        <th style="width: 15%">
                            {{ __('category.updated_at') }}
                        </th>
                        <th style="width: 25%">
                            {{ __('category.action') }}
                        </th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($categories as $item )
                        <tr>
                            <td>
                                # {{$item->id}}
                            </td>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>
                                {{$item->getSubcategoriesName()?$item->getSubcategoriesName():'N/A'}}
                            </td>
                            <td >
                                {{$item->created_at}}
                            </td>
                            <td>
                                {{$item->updated_at	}}
                            </td >
                            <td class="project-actions">
                                <a class="btn btn-primary" href="{{ route('category_edit',$item->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    {{ __('category.edit') }}
                                </a>
                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-danger-{{$item->id}}" data-value="{{$item->id}}">
                                    <i class="fas fa-trash">
                                    </i>
                                    {{ __('category.delete') }}
                                </button>
                                <div class="modal fade" id="modal-danger-{{$item->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                                <h4 class="modal-title">@if ($item->products()->count() >0) You cannot remove this substitution @else Do you really want to delete @endif </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @if ($item->products()->count() ==0)
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                    <form action="{{ route('category_destroy', $item->id)}}" method="post" class="px-0 mx-0" id="form">
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

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </section>

@endsection
@push('css')
@endpush
@push('js')

@endpush


