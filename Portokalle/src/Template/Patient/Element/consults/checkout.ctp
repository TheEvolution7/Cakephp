<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<div class="form-container">
    <div class="box-checkout">
        <div class="box-content edit-form">
            <h2>Your payment details</h2>
            <table class="detail-payment">
                <tbody>
                    <tr>
                        <th scope="row">Overnight consultation</th>
                        <td><?php echo $this->Number->currency($services->price, 'USD'); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tax:</th>
                        <td><?php echo $this->Number->currency(0, 'USD'); ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-total">Total:</th>
                        <td class="total-price"><?php echo $this->Number->currency($services->price, 'USD'); ?></td>
                    </tr>
                </tbody>
            </table>
            <p>Your credit card will be charged for the amount above.</p>
            <div id="paypal-button"></div>
            <!-- <?php echo $this->Form->create(null, ['id' => 'payment-form']); ?>
                <div id="card-element"></div>
                <button id="submit">
                    <div class="spinner hidden" id="spinner"></div>
                    
                    <?= $this->Form->button(__('Pay now'), ['class' => 'btn btn_blue __next', 'id' => 'button-text']) ?>
                </button>
                <p id="card-error" role="alert"></p>
                <p class="result-message hidden">
                    Payment succeeded, see the result in your
                    <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.
                </p>
            <?php echo $this->Form->end() ?> -->

            
            <!-- <div class="strip-text">
                <div class="icon">
                    <svg class="icon fa-credit-card">
                        <use xlink:href="<?= $webroot ?>img/sprite.svg#fa-credit-card"></use>
                    </svg>
                </div>
                <p>Payments are handled with <a href="#"> Stripe</a>.</p>
            </div> -->

            <!-- <button type="submit" class="btn btn_blue __purple">Add Credit Card</button>

            <div class="button-pay">
                <a href="#" class="btn-apple">
                    <img src="<?= $webroot ?>img/ap-pay.svg" alt="" />
                </a>
                <a href="#" class="gg-pay">
                    <img src="<?= $webroot ?>img/gg-btn.svg" alt="" />
                </a>

                <a href="#" class="paypal-btn">
                    <img src="<?= $webroot ?>img/paypal.svg" alt="PayPal" />
                </a>
            </div> -->
        </div>
    </div>
</div>


    
<div class="flex justify-center">
    <?= $this->Html->link(__('Back to Dashboard'), ['controller' => 'Dashboards', 'action' => 'index'], ['class' => 'btn btn_blue __back']) ?>
</div>

<script>
paypal.Button.render({
    // Configure environment
    env: '<?php echo $paypalEnv; ?>',
    client: {
        sandbox: '<?php echo $paypalClientID; ?>',
        production: '<?php echo $paypalClientID; ?>'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
        size: 'small',
        color: 'gold',
        shape: 'pill',
    },
    // Set up a payment
    payment: function (data, actions) {
        return actions.payment.create({
            transactions: [{
                amount: {
                    total: '<?= $services->price ?>',
                    currency: 'USD'
                }
            }]
      });
    },
    // Execute the payment
    onAuthorize: function (data, actions) {
        return actions.payment.execute()
        .then(function () {
            // Show a confirmation message to the buyer
            //window.alert('Thank you for your purchase!');
            
            // Redirect to the payment process page
            window.location = "<?= $this->Url->build(['action' => 'process']) ?>?paymentID="+data.paymentID+"&token="+data.paymentToken+"&payerID="+data.payerID+"&pid=<?php echo $order->id; ?>";
        });
    }
}, '#paypal-button');
</script>
<!-- <script src="https://js.stripe.com/v3/"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
<script>
    // A reference to Stripe.js initialized with a fake API key.
    // Sign in to see examples pre-filled with your key.
    var stripe = Stripe("pk_test_51INSz7HvEEpwZjF0hCGn7DU0IdLnK1VZE6sVEB1sXPV2dzXylbrbYHu0Ms091zx2aOaOOSApH0RoqqU6VdzGBRNp00hQxTEgJL", {
        locale: "en",
    });

    // The items the customer wants to buy
    var purchase = {
        items: [{ id: "prod_IzZ8vd3eMxHz6j" }],
    };

    // Disable the button until we have Stripe set up on the page
    document.querySelector("button").disabled = true;
    fetch("<?= $this->Url->build(['action' => 'stripe']) ?>", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(purchase),
    })
        .then(function (result) {
            return result.json();
        })
        .then(function (data) {
            var elements = stripe.elements();

            var style = {
                base: {
                    iconColor: "#666EE8",
                    color: "#333",
                    lineHeight: "40px",
                    fontWeight: 300,
                    fontFamily: "Helvetica Neue",
                    fontSize: "15px",

                    "::placeholder": {
                        color: "#777777",
                    },
                },
                invalid: {
                    fontFamily: "Arial, sans-serif",
                    color: "#fa755a",
                    iconColor: "#fa755a",
                },
            };

            var card = elements.create("card", { style: style });
            // Stripe injects an iframe into the DOM
            card.mount("#card-element");

            card.on("change", function (event) {
                // Disable the Pay button if there are no card details in the Element
                document.querySelector("button").disabled = event.empty;
                document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
            });

            var form = document.getElementById("payment-form");
            form.addEventListener("submit", function (event) {
                event.preventDefault();
                // Complete payment when the submit button is clicked
                payWithCard(stripe, card, data.clientSecret);
            });
        });

    // Calls stripe.confirmCardPayment
    // If the card requires authentication Stripe shows a pop-up modal to
    // prompt the user to enter authentication details without leaving your page.
    var payWithCard = function (stripe, card, clientSecret) {
        loading(true);
        stripe
            .confirmCardPayment(clientSecret, {
                payment_method: {
                    card: card,
                },
            })
            .then(function (result) {
                if (result.error) {
                    // Show error to your customer
                    showError(result.error.message);
                } else {
                    // The payment succeeded!
                    orderComplete(result.paymentIntent.id);
                }
            });
    };

    /* ------- UI helpers ------- */

    // Shows a success message when the payment is complete
    var orderComplete = function (paymentIntentId) {
        loading(false);
        document.querySelector(".result-message a").setAttribute("href", "https://dashboard.stripe.com/test/payments/" + paymentIntentId);
        document.querySelector(".result-message").classList.remove("hidden");
        document.querySelector("button").disabled = true;
    };

    // Show the customer the error from Stripe if their card fails to charge
    var showError = function (errorMsgText) {
        loading(false);
        var errorMsg = document.querySelector("#card-error");
        errorMsg.textContent = errorMsgText;
        setTimeout(function () {
            errorMsg.textContent = "";
        }, 4000);
    };

    // Show a spinner on payment submission
    var loading = function (isLoading) {
        if (isLoading) {
            // Disable the button and show a spinner
            document.querySelector("button").disabled = true;
            document.querySelector("#spinner").classList.remove("hidden");
            document.querySelector("#button-text").classList.add("hidden");
        } else {
            document.querySelector("button").disabled = false;
            document.querySelector("#spinner").classList.add("hidden");
            document.querySelector("#button-text").classList.remove("hidden");
        }
    };
</script> -->

