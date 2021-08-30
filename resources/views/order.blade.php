<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Currency Purchase</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="container mt-5">

        <!-- Success message -->
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif

        <form method="post" action="{{ route('store') }}">

            <!-- CROSS Site Request Forgery Protection -->
            @csrf

            <input type="hidden" name="foreign_currency_purchased" id="foreign_currency_purchased">
            <input type="hidden" name="exchange_rate" id="exchange_rate">
            <input type="hidden" name="surcharge_percentage" id="surcharge_percentage">
            <input type="hidden" name="surcharge_amount" id="surcharge_amount">

            <div class="form-group">
                <label>Foreign Currency</label>
                <select class="form-control" name="currency_selected" id="currency_selected">
                    <option selected>Please select</option>
                    <option value="USD">USD</option>
                    <option value="GBP">GBP</option>
                    <option value="EUR">EUR</option>
                    <option value="KES">KES</option>
                </select>
                @if ($errors->has('currency_selected'))
                    <span class="text-danger">{{ $errors->first('currency_selected') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Payment Method (foreign or zar currency)</label>
                <select class="form-control" name="payment_selection" id="payment_selection">
                    <option selected>Please select</option>
                    <option value="foreign">Foreign Currency</option>
                    <option value="zar">ZAR Currency</option>
                </select>
                @if ($errors->has('payment_selection'))
                    <span class="text-danger">{{ $errors->first('payment_selection') }}</span>
                @endif
            </div>

            <div class="form-group hide" id="currency_foreign">
                <label>Foreign Amount</label>
                <input type="text" class="form-control" name="foreign_amount" id="foreign_amount" value="">
                @if ($errors->has('foreign_amount'))
                    <span class="text-danger">{{ $errors->first('foreign_amount') }}</span>
                @endif
            </div>

            <div class="form-group hide" id="currency_zar">
                <label>ZAR Amount</label>
                <input type="text" class="form-control" name="zar_amount" id="zar_amount" value="">
                @if ($errors->has('zar_amount'))
                    <span class="text-danger">{{ $errors->first('zar_amount') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Payment Due in ZAR</label>
                <input type="text" class="form-control" name="payment" id="payment" readonly="readonly" value="">
                @if ($errors->has('payment'))
                    <span class="text-danger">{{ $errors->first('payment') }}</span>
                @endif
            </div>

            <input type="submit" name="purchase" value="Purchase" id="purchase" class="btn btn-dark btn-block">
        </form>
    </div>
</body>

</html>
