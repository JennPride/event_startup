

<script>
$(document).ready(function() {
    Stripe.setPublishableKey('pk_test_OEgWzqXCsEAK9EqXD3Ixtv20');

    $('#submit-payment').on('click', function(e) {
        alert('YAS');
        var form = $('#payment-form');
        var submit = form.find('button');
        var submitInitialText = submit.text();

        submit.attr('disabled', 'disabled').text('Just one moment...');
        e.preventDefault();

        Stripe.card.createToken(form, function(status, response) {
            var token;
            if(response.error) {
                form.find('.stripe-errors').text(response.error.message).show();
                submit.removeAttr('disabled');
                submit.text(submitInitialText);
            } else {
                token = response.id;
                form.append($('<input type="hidden" name="token">').val(token));
                form.submit();
            }

        });
    });
});
</script>
