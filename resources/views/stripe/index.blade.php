<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Stripe Payment
    </title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
        h1{
            text-align: center;
        }
        .hide {
            display: none;
        }
        label{
            font-size: 1.25rem;
        }
        input {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
        }

        .alert{
            color: rgb(255, 0, 0);
            font-size: 1.2rem;
            font-weight: bold;
        }
        .btn {
                
                background-color: rgb(0, 0, 0);
                font-size: 1rem;
                font-weight: bold;
                border-radius: 5px;
                color: white;
            }
        .btn:hover{
            cursor: pointer;
            background-color: rgb(38, 38, 38);
        }
        @media (width < 700px) {
            body {
                color: white;
                background-color: rgb(161, 135, 255);
            }
            h1{
                font-size: 2rem;
            }
            .required {
                display: flex;
                flex-direction: column;
                margin-bottom: 1rem; 
            }
            form {
                margin-inline: 0.5rem;
                
            }
            .btn {
                width: 100%;
            }
            
        }
        @media (width > 700px) {
                h1{
                    font-size: 5rem;
                    color: rgb(161, 135, 255);
                }
                .required {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    margin-bottom: 1rem;
                    
                }
                input{
                    width: 500px;
                }
                form {
                    background-color: rgb(161, 135, 255);
                    width: 600px;
                    padding: 1rem;
                    border-radius: 10px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }
                body{
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }
                .btn {
                    width: 300px;
                }
            }
        }

    </style>

</head>
<body>            
    <div class="miform">
        <h1>Pago por Stripe</h1>

    </div>
   
    <form
            role="form"
            action="{{ route('stripe.post') }}"
            method="post"
            class="require-validation"
            data-cc-on-file="false"
            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
            id="payment-form">
        @csrf


            <div class=' required'>
                <label class='control-label'>Nombre en Tarjeta</label> 
                <input class='form-control' size='4' type='text'>
            </div>



            <div class=' card required'>
                <label class='control-label'>Card Number</label> <input
                    autocomplete='off' class='form-control card-number' size='20'
                    type='text'>
            </div>



            <div class=' cvc required'>
                <label class='control-label'>CVC</label> <input autocomplete='off'
                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                    type='text'>
            </div>
            <div class=' expiration required'>
                <label class='control-label'>Expiration Month</label> <input
                    class='form-control card-expiry-month' placeholder='MM' size='2'
                    type='text'>
            </div>
            <div class=' expiration required'>
                <label class='control-label'>Expiration Year</label> <input
                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                    type='text'>
            </div>



            <div class='col-md-12 error form-group hide'>
                <div class='alert-danger alert'>Please correct the errors and try
                    again.</div>
            </div>



            <button class="btn btn-primary btn-lg btn-block" type="submit">Pagar</button>
 
            
    </form>



   
</body>
   
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
   
<script type="text/javascript">
$(function() {
    
    var $form         = $(".require-validation");
    
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
   
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
    
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
   
  });
   
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
                
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
    
});
</script>
</html>