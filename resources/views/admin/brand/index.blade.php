@extends('admin.layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="mx-auto w-75">
            <a href="{{ route('brand_create') }}">
                <button type="button" class="btn btn-dark btn-lg mb-5 " data-toggle="modal" data-target="#modal-secondary">
                    {{ __('brand.new_brand_create') }}
                </button>
            </a>
        </div>


        <div class="card mx-auto w-75">
            <div class="card-header">
                <h3 class="card-title">{{ __('brand.brands') }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            <table class="table table-striped projects w-100">
                <thead>
                <tr>
                    <th style="width: 15%">
                        # Id
                    </th>
                    <th style="width:20%">
                        {{ __('brand.name') }}
                    </th >
                    <th style="width: 20%">
                        {{ __('brand.created_at') }}
                    </th>
                    <th style="width: 20%">
                        {{ __('brand.updated_at') }}
                    </th>
                    <th style="width: 25%">
                        {{ __('brand.action') }}
                    </th>
                </tr>

                </thead>
                    <tbody>
                    @foreach($brands as $item )
                    <tr>
                        <td>
                            # {{$item->id}}
                        </td>
                        <td>
                              {{$item->name}}
                        </td>
                        <td >
                            {{$item->created_at}}
                        </td>
                        <td>
                            {{$item->updated_at	}}
                        </td >
                            <td class="project-actions">
                                <a class="btn btn-primary" href="{{ route('brand_edit',$item->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    {{ __('brand.edit') }}
                                </a>
                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-danger-{{$item->id}}" data-value="{{$item->id}}">
                                    <i class="fas fa-trash">
                                    </i>
                                    {{ __('brand.delete') }}
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
                                                <form action="{{ route('brand_destroy', $item->id)}}" method="post" class="px-0 mx-0" id="form">
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


