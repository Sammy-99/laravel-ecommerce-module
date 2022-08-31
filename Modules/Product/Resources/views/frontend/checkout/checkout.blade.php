@extends('product::frontend.layout.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 border rounded p-4 m-4 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row text-center">
                            <h3 class="panel-heading">Payment Details</h3>
                        </div>
                    </div>
                    <div class="panel-body">

                        {{-- @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif --}}

                        <form 
                                role="form" 
                                action="{{ route('stripe-payment') }}" 
                                method="post" 
                                class="validation"
                                data-cc-on-file="false" 
                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" 
                                id="payment-form">

                            @csrf

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> <input class='form-control'
                                        size='4' type='text' name="name">
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Email</label> <input class='form-control'
                                        size='4' type='email' name="email">
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Address</label> <input class='form-control'
                                        size='4' type='text' name='address'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Card Number</label> <input autocomplete='off'
                                        class='form-control card-num' size='20' type='text' name="card_number">
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label>
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='e.g 415'
                                        size='4' type='text' name="cvc">
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                        type='text' name="expiry_month">
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        type='text' name="expiry_year">
                                </div>
                            </div>

                            {{-- <div class='form-row row'>
                                <div class='col-md-12 hide error form-group'>
                                    <div class='alert-danger alert'>Fix the errors before you begin.</div>
                                </div>
                            </div> --}}

                            <div class="row">
                                @if(session()->has('success'))
                                    <div class="text-success">{{ session('success') }}</div>
                                @endif
                                <div class="col-xs-12">
                                    <button class="btn btn-danger btn-lg btn-block" type="submit">Pay Now
                                        {{ env('CURRENCY') }}{{ $totalCartPrice }} .00</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script>
        $(function() {
            var $form = $(".validation");
            $('form.validation').bind('submit', function(e) {
                var $form = $(".validation"),
                    inputVal = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputVal),
                    $errorStatus = $form.find('div.error'),
                    valid = true;
                $errorStatus.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorStatus.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    // console.log(Stripe);
                    Stripe.createToken({
                        number: $('.card-num').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeHandleResponse);
                }

            });

            function stripeHandleResponse(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
@endsection
