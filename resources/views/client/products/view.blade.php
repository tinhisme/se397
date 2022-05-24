@extends('layouts.client')
@section('title', $product->name)

@section('content')
<div class="super_container">
    <div class="single_product productData">
        <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
            <div class="row">
                <div class="col-lg-4 order-lg-2 order-1">
                    <div class="image_selected"><img src="{{ asset('assets/uploads/products/' . $product->image) }}"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-6 order-3">
                    <div class="product_description">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ $category->name }}</a></li>
                                <li class="breadcrumb-item"><a href="#">{{ $product->name }}</a></li>
                            </ol>
                        </nav>
                        <hr class="singleline">
                        <div class="product_name">{{ $product->name }}</div>
                        <div> <span class="product_price">Giá {{$product->selling_price}}</span> <strike
                                class="product_discount"> <span style='color:black'>{{$product->original_price}}<span>
                            </strike> </div>
                        <hr class="singleline">
                        <p class="mt-3">
                            {{$product->description}}
                        </p>

                    </div>
                    <hr class="singleline">
                    {{-- <div class="row">
                        <div class="col-xs-6" style="margin-left: 13px;">
                            <div class="product_quantity"> <span>QTY: </span> <input id="quantity_input" type="text"
                                    pattern="[0-9]*" value="1">
                                <div class="quantity_buttons">
                                    <div id="quantity_inc_button" class="quantity_inc quantity_control"><i
                                            class="fas fa-chevron-up"></i></div>
                                    <div id="quantity_dec_button" class="quantity_dec quantity_control"><i
                                            class="fas fa-chevron-down"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <button type="button" class="btn btn-primary shop-button">
                                Add to Cart</button>
                            <button type="button" class="btn btn-success shop-button">Buy
                                Now</button>
                        </div>
                    </div> --}}

                    <div class="row mt-2">
                        <div class="">
                            <input type="text" value="{{$product->id}}" class="productID">
                            <label for="quantity">Quantity</label>
                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                <span class="input-group-btn input-group-prepend">
                                    <button class="btn btn-primary bootstrap-touchspin-down decrement"
                                        type="button">-</button>
                                </span>
                                <input data-toggle="touchspin" type="text" name="quantity" value="1"
                                    class="form-control quantity">
                                <span class="input-group-btn input-group-append">
                                    <button class="btn btn-primary bootstrap-touchspin-up increment"
                                        type="button">+</button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br>
                            <button type="button" class="btn btn-success  btn-rounded me-3">Yêu Thích</button>
                            <button type="button" class="btn btn-primary addToCart btn-rounded me-3">Thêm Vào Giỏ
                                Hàng</button>
                            <button type="button" class="btn btn-info btn-rounded me-3">Mua</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {

        $('.addToCart').click(function (e) { 
            e.preventDefault();
            var productID = $(this).closest('.productData').find('.productID').val();
            var productQuantity = $(this).closest('.productData').find('.quantity').val();
        
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method :"post" ,
                url: "/add-to-cart",
                data: {
                    'productID' : productID,
                    'productQuantity' : productQuantity,
                },
                success: function (response) {
                    swal(response.status);
                }
            });
        });

        
        
        $('.increment').click(function (e) { 
           e.preventDefault();

           var incrementValue = $('.quantity').val();
           var value = parseInt(incrementValue,10);
           value = isNaN(value) ? 0 : value;
           if (value < 5) {
               value++;
               $('.quantity').val(value);
           }
        }); 

        $('.decrement').click(function (e) { 
           e.preventDefault();

           var decrementValue = $('.quantity').val();
           var value = parseInt(decrementValue,10);
           value = isNaN(value) ? 0 : value;
           if (value > 1) {
               value--;
               $('.quantity').val(value);
           }
        }); 
    });
</script>
@endsection