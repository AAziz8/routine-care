@extends('weblayouts.app')
@section('title', 'Cart')

@section('content')
    <style>
        body {
            background-color: #f8f9fa;
            margin-bottom: 50px; /* Add some space at the bottom of the body */
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px; /* Add some space at the bottom of the container */
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #007bff;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            margin-top: 15px;
        }

        table th,
        table td {
            text-align: center;
        }

        @media (max-width: 767px) {
            .card {
                margin-bottom: 20px;
            }

            table th,
            table td {
                text-align: left;
            }
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <img src="{{ asset('images/detail.jpg') }}">

    {{--    <img src="{{ asset('image/'.'1695200543.jpg') }}" style="max-height: 400px; width: 100%; height: auto;">--}}

    <div class="container">
        <div class="row">
            <!-- Form Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Information</h5>
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
                        <form role="form" action="{{route('place-order')}}" method="post" class="require-validation"
                              data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                            @csrf

                            <div class="form-group">
                                <label for="phone_number">Phone Number:</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>

                            <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>

                            <div class="form-group">
                                <label for="zip_code">Zip Code:</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code" required>
                            </div>

                            <!--<div class='form-row row'>-->
                            <!--    <div class='col-xs-12 col-md-6 form-group required'>-->
                            <!--        <label class='control-label'>Name on Card</label>-->
                            <!--        <input class='form-control' size='4' type='text' name='name-on-card' required>-->
                            <!--    </div>-->
                            <!--    <div class='col-xs-12 col-md-6 form-group required'>-->
                            <!--        <label class='control-label'>Card Number</label> <input autocomplete='off'-->
                            <!--                                                                class='form-control card-number'-->
                            <!--                                                                size='20' type='text' required>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <!--<div class='form-row row'>-->
                            <!--    <div class='col-xs-12 col-md-4 form-group cvc required'>-->
                            <!--        <label class='control-label'>CVC</label> <input autocomplete='off'-->
                            <!--                                                        class='form-control card-cvc'-->
                            <!--                                                        placeholder='ex. 311' size='4' type='text'-->
                            <!--                                                        required>-->
                            <!--    </div>-->
                            <!--    <div class='col-xs-12 col-md-4 form-group expiration required'>-->
                            <!--        <label class='control-label'>Expiration Month</label> <input-->
                            <!--            class='form-control card-expiry-month' placeholder='MM' size='2' type='text'-->
                            <!--            required>-->
                            <!--    </div>-->
                            <!--    <div class='col-xs-12 col-md-4 form-group expiration required'>-->
                            <!--        <label class='control-label'>Expiration Year</label> <input-->
                            <!--            class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'-->
                            <!--            required>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <div class="col-xs-12">
                                <p>Total Amount: $<span id="total-amount">{{ $cartTotal }}</span></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Place order</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($orderItems as $order)
                                    @if(is_array($order))
                                    <tr>
                                        <td>{{ $order['name'] }}</td>
                                        <td>${{ $order['price'] }}</td>
                                        <td>{{ $order['quantity'] }}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td>{{ $order->product->name }}</td>
                                        <td>${{ $order->product->price }}</td>
                                        <td>{{ $order->quantity }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <!--<script type="text/javascript">-->
    <!--    $(function() {-->
    <!--        var $form = $(".require-validation");-->
    <!--        $('form.require-validation').bind('submit', function(e) {-->
    <!--            var $form = $(".require-validation"),-->
    <!--                inputSelector = ['input[type=email]', 'input[type=password]',-->
    <!--                    'input[type=text]', 'input[type=file]',-->
    <!--                    'textarea'-->
    <!--                ].join(', '),-->
    <!--                $inputs = $form.find('.required').find(inputSelector),-->
    <!--                $errorMessage = $form.find('div.error'),-->
    <!--                valid = true;-->
    <!--            $errorMessage.addClass('hide');-->
    <!--            $('.has-error').removeClass('has-error');-->
    <!--            $inputs.each(function(i, el) {-->
    <!--                var $input = $(el);-->
    <!--                if ($input.val() === '') {-->
    <!--                    $input.parent().addClass('has-error');-->
    <!--                    $errorMessage.removeClass('hide');-->
    <!--                    e.preventDefault();-->
    <!--                }-->
    <!--            });-->
    <!--            if (!$form.data('cc-on-file')) {-->
    <!--                e.preventDefault();-->
    <!--                Stripe.setPublishableKey($form.data('stripe-publishable-key'));-->
    <!--                Stripe.createToken({-->
    <!--                    number: $('.card-number').val(),-->
    <!--                    cvc: $('.card-cvc').val(),-->
    <!--                    exp_month: $('.card-expiry-month').val(),-->
    <!--                    exp_year: $('.card-expiry-year').val()-->
    <!--                }, stripeResponseHandler);-->
    <!--            }-->
    <!--        });-->
    <!--        function stripeResponseHandler(status, response) {-->
    <!--            if (response.error) {-->
    <!--                $('.error')-->
    <!--                    .removeClass('hide')-->
    <!--                    .find('.alert')-->
    <!--                    .text(response.error.message);-->
    <!--            } else {-->
                    
    <!--                var token = response['id'];-->
    <!--                $form.find('input[type=text]').empty();-->
    <!--                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");-->
    <!--                $form.get(0).submit();-->
    <!--            }-->
    <!--        }-->
    <!--    });-->
    <!--</script>-->

@endsection
