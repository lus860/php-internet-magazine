<ol class="dd-list list-group">
    @foreach($submenu as $item)
        <li class="dd-item list-group-item" data-id="{{$item->id}}">
            <div class="dd-handle" title="id"># {{$item->id}}</div>
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

                <div class="col-2 project-actions text-right">
                    <a href="{{ route('menu_edit',$item->id)}}" class="btn btn-primary btn-sm">
                        <i class="fas fa-pencil-alt"></i>Edit
                    </a>
                    <a href="" class="btn btn-danger btn-sm" type="button" data-toggle="modal"
                       data-target="#modal-danger-{{$item->id}}" data-value="{{$item->id}}">
                        <i class="fas fa-trash"></i>Delete
                    </a>
                </div>
                <div class="modal fade" id="modal-danger-{{$item->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                            <div class="modal-header">
                                <h4 class="modal-title">@if (count($item->childrens) >0) You cannot remove this
                                    substitution @else Do you really want to delete @endif </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @if (count($item->childrens) == 0)
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close
                                    </button>
                                    <form action="{{ route('menu_destroy', $item->id)}}" method="post" class="px-0 mx-0"
                                          id="form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-light">Yes</button>
                                    </form>
                                </div>
                            @else
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if(count($item->childrens) >0)
                @include('admin/includes.submenu_list',['submenu'=>$item->childrens])
            @endif
        </li>
    @endforeach
</ol>
