let zar_usd = 0.0808279;
let zar_gbp = 0.0527032;
let zar_eur = 0.0718710;
let zar_kes = 7.81498;

let usd_zar = 14.68;
let gbp_zar = 20.19;
let eur_zar = 17.31;
let kes_zar = 0.13;

$( "#payment_selection" ).change(function() {
    if(this.value == 'foreign'){
        $('#currency_foreign').removeClass( "hide" );
        $('#currency_zar').addClass( "hide" );
    }else if(this.value == 'zar'){
        $('#currency_foreign').addClass( "hide" );
        $('#currency_zar').removeClass( "hide" );
    }
});

$( "#currency_selected" ).change(function() {
    if(this.value == 'USD'){
        document.getElementById("surcharge_percentage").value = "7.5";
    }
    if(this.value == 'GBP'){
        document.getElementById("surcharge_percentage").value = "5";
    }
    if(this.value == 'EUR'){
        document.getElementById("surcharge_percentage").value = "5";
    }
    if(this.value == 'KES'){
        document.getElementById("surcharge_percentage").value = "2.5";
    }
});


$('#foreign_amount').on('input',function() {
    let currency = $('#currency_selected').val();
    let amount = 0;
    let foreignPurchase = 0;

    if (currency == 'USD') {
        let price = parseFloat($('#foreign_amount').val());
        foreignPurchase = price * usd_zar;
        document.getElementById("exchange_rate").value = usd_zar.toFixed(2);
        document.getElementById("foreign_currency_purchased").value = foreignPurchase.toFixed(2);
        let surcharge = parseFloat($('#surcharge_percentage').val());
        let surcharge_amount = (surcharge / 100) * foreignPurchase;
        document.getElementById("surcharge_amount").value = surcharge_amount.toFixed(2);
        amount = foreignPurchase + surcharge_amount;
        document.getElementById("payment").value = amount.toFixed(2);
    }

    if (currency == 'GBP') {
        let price = parseFloat($('#foreign_amount').val());
        foreignPurchase = price * gbp_zar;
        document.getElementById("exchange_rate").value = gbp_zar.toFixed(2);
        document.getElementById("foreign_currency_purchased").value = foreignPurchase.toFixed(2);
        let surcharge = parseFloat($('#surcharge_percentage').val());
        let surcharge_amount = (surcharge / 100) * foreignPurchase;
        document.getElementById("surcharge_amount").value = surcharge_amount.toFixed(2);
        amount = foreignPurchase + surcharge_amount;
        document.getElementById("payment").value = amount.toFixed(2);
    }

    if (currency == 'EUR') {
        let price = parseFloat($('#foreign_amount').val());
        foreignPurchase = price * eur_zar;
        document.getElementById("exchange_rate").value = eur_zar.toFixed(2);
        document.getElementById("foreign_currency_purchased").value = foreignPurchase.toFixed(2);
        let surcharge = parseFloat($('#surcharge_percentage').val());
        let surcharge_amount = (surcharge / 100) * foreignPurchase;
        document.getElementById("surcharge_amount").value = surcharge_amount.toFixed(2);
        amount = foreignPurchase + surcharge_amount;
        document.getElementById("payment").value = amount.toFixed(2);
    }

    if (currency == 'KES') {
        let price = parseFloat($('#foreign_amount').val());
        foreignPurchase = price * kes_zar;
        document.getElementById("exchange_rate").value = kes_zar.toFixed(2);
        document.getElementById("foreign_currency_purchased").value = foreignPurchase.toFixed(2);
        let surcharge = parseFloat($('#surcharge_percentage').val());
        let surcharge_amount = (surcharge / 100) * foreignPurchase;
        document.getElementById("surcharge_amount").value = surcharge_amount.toFixed(2);
        amount = foreignPurchase + surcharge_amount;
        document.getElementById("payment").value = amount.toFixed(2);
    }
});

$('#zar_amount').on('input',function() {
    let currency = $('#currency_selected').val();
    let amount = 0;
    let foreignPurchase = 0;

    if (currency == 'USD') {
        let price = parseFloat($('#zar_amount').val());
        foreignPurchase = price * zar_usd;
        document.getElementById("exchange_rate").value = zar_usd.toFixed(2);
        document.getElementById("foreign_currency_purchased").value = foreignPurchase.toFixed(2);
        let surcharge = parseFloat($('#surcharge_percentage').val());
        let surcharge_amount = (surcharge / 100) * price;
        document.getElementById("surcharge_amount").value = surcharge_amount.toFixed(2);
        amount = price + surcharge_amount;
        document.getElementById("payment").value = amount.toFixed(2);
    }

    if (currency == 'GBP') {
        let price = parseFloat($('#zar_amount').val());
        foreignPurchase = price * zar_gbp;
        document.getElementById("exchange_rate").value = zar_gbp.toFixed(2);
        document.getElementById("foreign_currency_purchased").value = foreignPurchase.toFixed(2);
        let surcharge = parseFloat($('#surcharge_percentage').val());
        let surcharge_amount = (surcharge / 100) * price;
        document.getElementById("surcharge_amount").value = surcharge_amount.toFixed(2);
        amount = price + surcharge_amount;
        document.getElementById("payment").value = amount.toFixed(2);
    }

    if (currency == 'EUR') {
        let price = parseFloat($('#zar_amount').val());
        foreignPurchase = price * zar_eur;
        document.getElementById("exchange_rate").value = zar_eur.toFixed(2);
        document.getElementById("foreign_currency_purchased").value = foreignPurchase.toFixed(2);
        let surcharge = parseFloat($('#surcharge_percentage').val());
        let surcharge_amount = (surcharge / 100) * price;
        document.getElementById("surcharge_amount").value = surcharge_amount.toFixed(2);
        amount = price + surcharge_amount;
        document.getElementById("payment").value = amount.toFixed(2);
    }

    if (currency == 'KES') {
        let price = parseFloat($('#zar_amount').val());
        foreignPurchase = price * zar_kes;
        document.getElementById("exchange_rate").value = zar_kes.toFixed(2);
        document.getElementById("foreign_currency_purchased").value = foreignPurchase.toFixed(2);
        let surcharge = parseFloat($('#surcharge_percentage').val());
        let surcharge_amount = (surcharge / 100) * price;
        document.getElementById("surcharge_amount").value = surcharge_amount.toFixed(2);
        amount = price + surcharge_amount;
        document.getElementById("payment").value = amount.toFixed(2);
    }
});

