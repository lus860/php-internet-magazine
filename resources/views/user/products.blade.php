@extends('user/layouts.app')

@section('content')
    <section id="advertisement">
        <div class="container">
            <img src="images/shop/advertisement.jpg" alt="" />
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('user/includes.left_sidebar')
                </div>

                <div class="col-sm-9 padding-right" id="products">
                    @include('user/includes.products')

                </div>
            </div>
        </div>
    </section>
@endsection
@push('css')
@endpush
@push('js')
    <script>



    </script>
@endpush


