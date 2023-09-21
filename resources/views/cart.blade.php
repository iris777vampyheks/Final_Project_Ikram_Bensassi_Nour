@extends('layouts.index')
@section('content')
    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Cart Products</h2>
                            <p>Home <span>-</span>Cart Products</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Cart Area =================-->
    <section class="cart_area padding_top">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/single-product/cart-1.jpg" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <p>Minimalistic shop for multipurpose use</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>$360.00</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                                        <input class="input-number" type="text" value="1" min="0"
                                            max="10">
                                        <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <h5>$720.00</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/single-product/cart-1.jpg" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <p>Minimalistic shop for multipurpose use</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>$360.00</h5>
                                </td>
                                <td>
                                    <div class="product_count m-5 d-flex gap-5">
                                        <!-- <input type="text" value="1" min="0" max="10" title="Quantity:"
                                  class="input-text qty input-number" />
                                <button
                                  class="increase input-number-increment items-count" type="button">
                                  <i class="ti-angle-up"></i>
                                </button>
                                <button
                                  class="reduced input-number-decrement items-count" type="button">
                                  <i class="ti-angle-down"></i>
                                </button> -->
                                        <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                                        <input class="input-number" type="text" value="1" min="0"
                                            max="10">
                                        <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <h5>$720.00</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/single-product/cart-1.jpg" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <p>Minimalistic shop for multipurpose use</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>$360.00</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                                        <input class="input-number" type="text" value="1" min="0"
                                            max="10">
                                        <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <h5>$720.00</h5>
                                </td>
                            </tr>
                            <tr class="bottom_button">
                                <td>
                                    <a class="btn_1" href="#">Update Cart</a>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="cupon_text float-right">
                                        <a class="btn_1" href="#">Close Coupon</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>$2160.00</h5>
                                </td>
                            </tr>
        
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="category">Continue Shopping</a>
                        <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
                    </div>
                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->

@endsection
@push('scripts')





<script>
    // JavaScript to handle quantity increment and decrement
    document.querySelectorAll('.input-number').forEach(function(input) {
        input.addEventListener('change', function() {
            updateTotal();
        });

        input.nextElementSibling.addEventListener('click', function() {
            input.stepDown();
            updateTotal();
        });

        input.previousElementSibling.addEventListener('click', function() {
            input.stepUp();
            updateTotal();
        });
    });

    // JavaScript to update the total price for each product
    function updateTotal() {
        let total = 0;
        document.querySelectorAll('.table tbody tr').forEach(function(row) {
            const price = parseFloat(row.querySelector('td:nth-child(2) h5').textContent.replace('$', ''));
            const quantity = parseInt(row.querySelector('.input-number').value);
            const rowTotal = price * quantity;
            row.querySelector('td:nth-child(4) h5').textContent = '$' + rowTotal.toFixed(2);
            total += rowTotal;
        });
        document.querySelector('.subtotal').textContent = '$' + total.toFixed(2);
    }

    // JavaScript to handle "Continue Shopping" button
    document.querySelector('.continue-shopping').addEventListener('click', function(e) {
        e.preventDefault();
        // Add your logic to redirect or handle continuing shopping
        console.log('Continue Shopping clicked');
    });

    // JavaScript to handle "Proceed to checkout" button
    document.querySelector('.checkout_btn_1').addEventListener('click', function(e) {
        e.preventDefault();
        // Add your logic to proceed to checkout
        console.log('Proceed to Checkout clicked');
    });

    // JavaScript to handle "Update Cart" button
    document.querySelector('.update-cart').addEventListener('click', function(e) {
        e.preventDefault();
        // Add your logic to update the cart
        console.log('Update Cart clicked');
    });
</script>



@endpush
