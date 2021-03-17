<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        @foreach($categories as $item)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        @if(count($item->sub_categories()->get()) >0)
                            <a data-toggle="collapse" data-parent="#accordian" href="#{{$item->name }}">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                <a href="{{ route('category_product' ,$item->id) }}"> {{$item->name }}</a>
                            </a>
                        @else
                            <h4 class="panel-title"><a href="{{ route('category_product' ,$item->id) }}"> {{$item->name }}</a></h4>
                        @endif
                    </h4>
                </div>
                @if(count($item->sub_categories()->get()) >0)
                    <div id="{{$item->name }}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach($item->sub_categories as $subcategory)
                                    <li><a href="{{ route('subcategory_product' ,$subcategory->id) }}">{{$subcategory->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach

    </div><!--/category-products-->

    <div class="brands_products"><!--brands_products-->
        <h2>Brands</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach($brands as $item)
                    <li><a href="{{ route('brand_product' ,$item->id) }}"> <span class="pull-right">({{count($item->products()->get())}})</span>{{$item->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div><!--/brands_products-->

    <div class="price-range"><!--price-range-->
        <h2>Price Range</h2>
        <div class="well text-center">
            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="6000" data-slider-step="50" data-slider-value="[250,450]" id="sl2" name="range"><br />
            <b class="pull-left">$ 0</b> <b class="pull-right">$ 6000</b>
        </div>
    </div><!--/price-range-->

    <div class="shipping text-center"><!--shipping-->
        <img src="{{ asset('user/images/home/shipping.jpg')}}" alt="" />
    </div><!--/shipping-->

</div>

