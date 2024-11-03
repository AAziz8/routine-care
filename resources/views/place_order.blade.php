@extends('weblayouts.app')
@section('title', 'Cart')

@section('content')
    <style>
        .form-check-input {
            margin-right: 8px;
            transform: scale(1.3);
            cursor: pointer;
        }
        .form-check-label {
            display: inline-block;
            font-size: 1.1rem;
            margin-bottom: 0;
            cursor: pointer;
        }
        .form-check {
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }
        .form-check:hover {
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
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

        .required-field {
            color: red;
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
                              data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                              id="payment-form">
                            @csrf

                            <div class="form-group">
                                <label for="name">Full Name:</label>
                                @if(\Illuminate\Support\Facades\Auth::user())
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->name }}">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Mobile number:<span class="required-field">*</span></label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address:<span class="required-field">*</span></label>
                                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="city">City:<span class="required-field">*</span></label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="payment-method" class="form-label"><strong>Select Payment Method:</strong></label>
                                <div class="d-flex justify-content-between">
                                    <div class="form-check p-3 border rounded shadow-sm" style="flex: 1; margin-right: 10px;">
                                        <input type="radio" id="cashOnDelivery" name="paymentMethod" value="cash"
                                               class="form-check-input" onclick="showPaymentDescription()">
                                        <label for="cashOnDelivery" class="form-check-label">
                                            <i class="fa fa-money-bill-wave" style="color: green;"></i> Cash on Delivery
                                        </label>
                                    </div>
                                    <div class="form-check p-3 border rounded shadow-sm" style="flex: 1;">
                                        <input type="radio" id="onlinePayment" name="paymentMethod" value="online"
                                               class="form-check-input" onclick="showPaymentDescription()">
                                        <label for="onlinePayment" class="form-check-label">
                                            <i class="fa fa-credit-card" style="color: blue;"></i> Online Payment
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="cashDescription" class="mt-3 alert alert-info" style="display: none;">
                                <p>Please provide any special delivery instructions:</p>
                                <textarea class="form-control" name="delivery_instruction" rows="3" placeholder="Write your instructions here..."></textarea>
                            </div>

                            <div id="onlineDescription" class="mt-3 alert alert-warning" style="display: none;">
                                <p>You can contact us on WhatsApp for more information: <a href="https://wa.me/00923302065791" target="_blank">0092-330-2065791</a></p>
                            </div>

                            <div class="col-xs-12">
                                <b><p>Total Amount: $<span id="total-amount">{{ $cartTotal }}</span></p></b>
                            </div>
                            <div>

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
    <script type="text/javascript">
        function showPaymentDescription() {
            const cashDesc = document.getElementById('cashDescription');
            const onlineDesc = document.getElementById('onlineDescription');
            const cashRadio = document.getElementById('cashOnDelivery');
            const onlineRadio = document.getElementById('onlinePayment');

            if (cashRadio.checked) {
                cashDesc.style.display = 'block';
                onlineDesc.style.display = 'none';
            } else if (onlineRadio.checked) {
                cashDesc.style.display = 'none';
                onlineDesc.style.display = 'block';
            }
        }
    </script>
@endsection
