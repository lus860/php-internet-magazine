@extends('user.layouts.app')

@section('content')

    @if(!session('cart_id') || \Cart::session(session('cart_id'))->getTotalQuantity() == 0)
        <section id="do_action" style="height: 100%;margin-bottom: 150px!important;">
            <div class="container">
                <div class="breadcrumbs">
                    <h2>Your shopping cart is empty</h2>
                </div>
            </div>
        </section>
    @elseif(session('cart_id') && \Cart::session(session('cart_id'))->getTotalQuantity() > 0)
        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><h3 id="getTotalQty">Qty: {{\Cart::session(session('cart_id'))->getTotalQuantity()}} </h3>
                        </li>
                        <br>
                        <li><h3 id="getTotal">Total: {{\Cart::session(session('cart_id'))->getTotal()}}</h3></li>
                        <br>
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
                                        <a class="cart_quantity_up"
                                           href="{{ route('update_up_cart',['id'=>$row->id]) }}"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity"
                                               value="{{$row->quantity}}" autocomplete="off" size="2"
                                               data-id="{{$row->id}}">
                                        <a class="cart_quantity_down"
                                           href="{{ route('update_down_cart',['id'=>$row->id]) }}"> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price" id="{{$row->id}}">
                                        ${{ \Cart::get($row->id)->getPriceSum() }}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete"
                                       href="{{ route('remove_cart',['id'=>$row->id]) }}"><i
                                            class="fa fa-times"></i></a>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section> <!--/#cart_items-->

        <section id="do_action">
            <div class="container">
                <div class="heading">
                    <h3>Want to place an order?</h3>
                </div>
                <div class="row">
                    <div class="category-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                @guest
                                    <li class="active"><a class="cart-tab" href="#guest_checkout" data-toggle="tab"
                                                          data-href="guest_checkout">Guest Checkout</a></li>
                                    <li><a class="cart-tab" href="#register_account" data-toggle="tab"
                                           data-href="register_account">Register Account</a></li>
                                    <li><a href="{{ route('user_login') }}">Authorize</a></li>

                                @else
                                    <li class="active"><a class="cart-tab" href="#logged_user" data-toggle="tab"
                                                          data-href="guest_checkout">Logged User</a></li>
                                @endguest
                            </ul>
                        </div>
                        <div class="tab-content">
                            @guest
                                <div class="tab-pane fade active in" id="guest_checkout">
                                    <div class="col-sm-6">
                                        <form method="POST" action="{{ route('order_signup') }}">
                                            @csrf
                                            <div class="form-group has-feedback">
                                                <input id="firstname" type="text"
                                                       class="form-control @error('guest_firstname') is-invalid @enderror"
                                                       name="guest_firstname" value="{{ old('guest_firstname') }}"
                                                       autocomplete="firstname"
                                                       autofocus placeholder="{{ __('auth.first_name') }}">

                                                @error('guest_firstname')
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input id="lastname" type="text"
                                                       class="form-control @error('guest_lastname') is-invalid @enderror"
                                                       name="guest_lastname" value="{{ old('guest_lastname') }}"
                                                       autocomplete="lastname"
                                                       autofocus placeholder="{{ __('auth.last_name') }}">

                                                @error('guest_lastname')
                                                <span class="invalid-feedback " role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input type="email"
                                                       class="form-control @error('guest_email') is-invalid @enderror"
                                                       name="guest_email" value="{{ old('guest_email') }}"
                                                       autocomplete="email"
                                                       placeholder="{{ __('auth.email') }}">

                                                @error('guest_email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input type="text"
                                                       class="form-control @error('guest_address') is-invalid @enderror"
                                                       name="guest_address" value="{{ old('guest_address') }}"
                                                       autocomplete="email"
                                                       placeholder="{{ __('auth.address') }}">

                                                @error('guest_address')
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input type="text"
                                                       class="form-control @error('guest_phone') is-invalid @enderror"
                                                       name="guest_phone" value="{{ old('guest_phone') }}"
                                                       autocomplete="email"
                                                       placeholder="{{ __('auth.phone') }}">

                                                @error('guest_phone')
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <button type="submit"
                                                    class="btn btn-success">{{ __('auth.sign_up') }}</button>
                                        </form>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3>You want not to register when placing an order?</h3>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="register_account">
                                    <div class="col-sm-6">
                                        <form method="POST" action="{{ route('order_signup') }}">
                                            @csrf
                                            <div class="form-group has-feedback">
                                                <input id="firstname" type="text"
                                                       class="form-control @error('firstname') is-invalid @enderror"
                                                       name="firstname" value="{{ old('firstname') }}"
                                                       autocomplete="firstname"
                                                       autofocus placeholder="{{ __('auth.first_name') }}">

                                                @error('firstname')
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input id="lastname" type="text"
                                                       class="form-control @error('lastname') is-invalid @enderror"
                                                       name="lastname" value="{{ old('lastname') }}"
                                                       autocomplete="lastname"
                                                       autofocus placeholder="{{ __('auth.last_name') }}">

                                                @error('lastname')
                                                <span class="invalid-feedback " role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       name="email" value="{{ old('email') }}" autocomplete="email"
                                                       placeholder="{{ __('auth.email') }}">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input type="text"
                                                       class="form-control @error('address') is-invalid @enderror"
                                                       name="address" value="{{ old('address') }}"
                                                       autocomplete="address"
                                                       placeholder="{{ __('auth.address') }}">

                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input type="text"
                                                       class="form-control @error('phone') is-invalid @enderror"
                                                       name="phone" value="{{ old('phone') }}" autocomplete="email"
                                                       placeholder="{{ __('auth.phone') }}">

                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input id="password" type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       name="password" autocomplete="new-password"
                                                       placeholder="{{ __('auth.password') }}">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input id="password-confirm" type="password" class="form-control"
                                                       name="password_confirmation" autocomplete="new-password"
                                                       placeholder="{{ __('auth.password_confirmation') }}">
                                            </div>
                                            <button type="submit"
                                                    class="btn btn-success">{{ __('auth.sign_up') }}</button>
                                        </form>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3>You want to register when placing an order?</h3>
                                    </div>
                                </div>
                            @else
                                <div class="tab-pane fade active in" id="logged_user">
                                    <div class="col-sm-6">
                                        <form method="POST" action="{{ route('order_logged') }}">
                                            @csrf

                                            <div class="form-group has-feedback">
                                                <input type="text"
                                                       class="form-control @error('address') is-invalid @enderror"
                                                       name="address"
                                                       value="{{ Auth::user()->address?? old('address') }}"
                                                       autocomplete="email"
                                                       placeholder="{{ __('auth.address') }}">
                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input type="text"
                                                       class="form-control @error('phone') is-invalid @enderror"
                                                       name="phone" value="{{ Auth::user()->phone?? old('phone')}}"
                                                       autocomplete="phone"
                                                       placeholder="{{ __('auth.phone') }}">

                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-success">{{ __('auth.send') }}</button>
                                        </form>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4>You want to use this address and phone number to receive your order?</h4>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
@push('css')
@endpush
@push('js')
    <script>

    </script>
@endpush


