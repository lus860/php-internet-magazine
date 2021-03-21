<div class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><h3 id="getTotalQty">Qty: {{\Cart::session(session('cart_id'))->getTotalQuantity()}} </h3></li><br>
            <li><h3 id="getTotal">Total: {{\Cart::session(session('cart_id'))->getTotal()}}</h3></li><br>
        </ol>
    </div>
    <div class="table-responsive cart_info">
        <table class="table table-condensed">
            <thead>
            <tr class="cart_menu">
                <td class="image">Item</td>
                <td class="description"></td>
                <td class="price">Price</td>
                <td class="quantity">Quantity</td>
                <td class="total">Total</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach(\Cart::session(session('cart_id'))->getContent() as $row)
                <tr>
                    <td class="cart_product">
                        <a href=""><img src="{{$row->attributes->img}}" alt="" style="width: 100px"></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="">{{$row->name}}</a></h4>
                        <p>Web ID: {{$row->id}}</p>
                    </td>
                    <td class="cart_price">
                        <p>${{$row->price}}</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href="{{ route('update_up_cart',['id'=>$row->id]) }}"> + </a>
                            <input class="cart_quantity_input" type="text" name="quantity" value="{{$row->quantity}}" autocomplete="off" size="2">
                            <a class="cart_quantity_down" href="{{ route('update_down_cart',['id'=>$row->id]) }}"> - </a>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">${{ \Cart::get($row->id)->getPriceSum() }}</p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{ route('remove_cart',['id'=>$row->id]) }}"><i class="fa fa-times"></i></a>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
</div>
