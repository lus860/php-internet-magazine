<ul class=" dropdown-menu sub-menu submenu">
    @foreach($items as $item)
        @if(count($item->childrens()->where('status', 1)->get())==0)
            <li><a class="dropdown-item" href="{{$item->url}}"> {{$item->name}} </a>
            </li>
        @else
            <li><a class="dropdown-item" href="{{$item->url}}"> {{$item->name}} <i class="fa fa-angle-down"></i></a>
                @include('user/includes.dropdown_menu',['items'=>$item->childrens()->where('status', 1)->get()])
            </li>
        @endif
    @endforeach
</ul>
