@component('mail::message')
# Introduction

Currency Purchased:
{{$mailData['currency_purchased'] }}

Exchange Rate:
{{$mailData['exchange_rate'] }}

Surcharge Percentage:
{{$mailData['surcharge'] }}

Amount Purchased:
{{$mailData['amount_purchased'] }}

ZAR Amount Paid:
{{$mailData['zar_amount_paid'] }}

Surcharge Amount:
{{$mailData['surcharge_amount'] }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
