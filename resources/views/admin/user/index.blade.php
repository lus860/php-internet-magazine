@extends('admin.layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="mx-auto">
            <a href="{{ route('user_create') }}">
                <button type="button" class="btn btn-dark btn-lg mb-5 " data-toggle="modal"
                        data-target="#modal-secondary">
                    {{ __('user.new_user_create') }}
                </button>
            </a>
        </div>


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('user.users') }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <table class="table table-striped projects w-100">
                    <thead>
                    <tr>
                        <th>
                            # Id
                        </th>
                        <th>
                            {{ __('user.firstname') }}
                        </th>
                        <th>
                            {{ __('user.lastname') }}
                        </th>
                        <th>
                            {{ __('user.email') }}
                        </th>
                        <th>
                            {{ __('user.role') }}
                        </th>
                        <th>
                            {{ __('user.image') }}
                        </th>
                        <th>
                            {{ __('user.phone') }}
                        </th>
                        <th>
                            {{ __('user.address') }}
                        </th>
                        <th>
                            {{ __('user.email_verified_at') }}
                        </th>
                        {{--                    <th>--}}
                        {{--                        {{ __('user.password') }}--}}
                        {{--                    </th>--}}
                        <th>
                            {{ __('user.created_at') }}
                        </th>
                        <th>
                            {{ __('user.updated_at') }}
                        </th>
                        <th>
                            {{ __('user.action') }}
                        </th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($users as $item )
                        <tr>
                            <td>
                                # {{$item->id}}
                            </td>
                            <td>
                                {{$item->firstname}}
                            </td>
                            <td>
                                {{$item->lastname}}
                            </td>
                            <td>
                                {{$item->email}}
                            </td>
                            <td>
                                {{$item->role==0?'User':'Admin'}}
                            </td>
                            <td>
                                <img src="{{$item->image?$item->image: asset('admin/dist/img/difulte/avatar.jpg')}}"
                                     style="width: 100px">
                            </td>
                            <td>
                                {{$item->phone}}
                            </td>
                            <td>
                                {{$item->address}}
                            </td>
                            <td>
                                {{$item->email_verified_at}}
                            </td>
                            <td>
                                {{$item->created_at}}
                            </td>
                            <td>
                                {{$item->updated_at	}}
                            </td>
                            <td class="project-actions">
                                <a class="btn btn-primary" href="{{ route('user_edit',$item->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    {{ __('user.edit') }}
                                </a>
                                <button class="btn btn-danger" type="button" data-toggle="modal"
                                        data-target="#modal-danger-{{$item->id}}" data-value="{{$item->id}}">
                                    <i class="fas fa-trash">
                                    </i>
                                    {{ __('user.delete') }}
                                </button>
                                <div class="modal fade" id="modal-danger-{{$item->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Do you really want to delete </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <form action="{{ route('user_destroy', $item->id)}}" method="post"
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

    </section>

@endsection
@push('css')
@endpush
@push('js')

@endpush


