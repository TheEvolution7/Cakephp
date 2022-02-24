<?php 
    $banners = $this->getCache('banners_' . $configs['language']); 
?>  
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title><?= $this->fetch('title') . ' | ' .  \Cake\Core\Configure::read('Core.setting.site_title') ?></title>
        <?= $this->fetch('meta') ?> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="<?= $this->Url->build('/uploads/banners/' . $banners[28][0]->id . DS . $banners[28][0]->image ) ?>">
        <link href="<?= $webroot ?>css/flexslider.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?= $webroot ?>css/line-icons.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?= $webroot ?>css/elegant-icons.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?= $webroot ?>css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?= $webroot ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?= $webroot ?>css/theme-aquatica.css" rel="stylesheet" type="text/css" media="all" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?= $webroot ?>css/custom.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700%7CRaleway:700' rel='stylesheet' type='text/css'>
        <script src="<?= $webroot ?>js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    </head>
    <body>
        <div class="loader">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
        <?= $this->element('header') ?>          
        <div class="main-container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
        <?= $this->element('footer') ?>

        <script src="<?= $webroot ?>js/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="<?= $webroot ?>js/jquery.plugin.min.js"></script>
        <script src="<?= $webroot ?>js/bootstrap.min.js"></script>
        <script src="<?= $webroot ?>js/jquery.flexslider-min.js"></script>
        <script src="<?= $webroot ?>js/smooth-scroll.min.js"></script>
        <script src="<?= $webroot ?>js/skrollr.min.js"></script>
        <script src="<?= $webroot ?>js/spectragram.min.js"></script>
        <script src="<?= $webroot ?>js/scrollReveal.min.js"></script>
        <script src="<?= $webroot ?>js/isotope.min.js"></script>
        <script src="<?= $webroot ?>js/twitterFetcher_v10_min.js"></script>
        <script src="<?= $webroot ?>js/lightbox.min.js"></script>
        <script src="<?= $webroot ?>js/jquery.countdown.min.js"></script>
        <script src="<?= $webroot ?>js/scripts.js"></script>
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            $(function() {
                
                $('.quantity button').click(function() {
                    $('#price-total').val($('#passenger').val()* <?= $carts[0]->price ?>)
                });

            });
        </script>
       <script>
// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('<?php echo \Cake\Core\Configure::read('Core.setting.stripe_publishable_key'); ?>');

// Create an instance of elements
var elements = stripe.elements();
var style = {
    base: {
        fontWeight: 400,
        fontFamily: 'Open Sans',
        fontStyle: 'italic',
        borderRadius: '15px',
        fontSize: '14px',
        textTransform: 'uppercase',
        color: '#555',
        backgroundColor: '#fff',
    },
    invalid: {
        borderColor: '#eb1c26'
    }
};
var cardElement = elements.create('cardNumber', {
    style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
    'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
    'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements

var resultContainer = document.getElementById('paymentResponse');

cardElement.addEventListener('change', function(event) {
    if (event.error) {
        $('#paymentResponse').fadeIn();
        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
    } else {
        resultContainer.innerHTML = '';
       
    }
});

// Get payment form element
var form = document.getElementById('paymentFrom');

// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
    e.preventDefault();
    createToken();
});

// Create single-use token to charge the user
function createToken() {
    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
    });
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    
    // Submit the form
    form.submit();
}
</script>
        
    </body>
</html>
