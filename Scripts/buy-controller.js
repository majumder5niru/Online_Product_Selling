function stripeResponseHandler(status, response)
{
    if (response.error) 
    {
        alert(response.error.message);
    } 
    else
    {   
        var token = response.id;
        var firstName = $("#first-name").val();
        var lastName = $("#last-name").val();
        var email = $("#email").val();
        var price = 20;

        var request = $.ajax ({
            type: "POST",
            url: "pay.php",
            dataType: "html",
            data: {
                "stripeToken" : token,
                "firstName" : firstName,
                "lastName" : lastName,
                "email" : email,
                "price" : price
                }
        });
 
        request.done(function(msg)
        {
            if (msg.result === 0)
            {
                alert("The credit card was charged successfully!");
            }
            else
            {
                alert("The user's credit card failed.");
            }
        });
 
        request.fail(function(jqXHR, textStatus)
        {
            alert("Error: failed to call pay.php to process the transaction.");
        });
    }
}

function showErrorDialogWithMessage(message)
{
    alert(message);
    $('#buy-submit-button').removeAttr("disabled");
}
 
$(document).ready(function() 
{
    $('#buy-form').submit(function(event)
    {
        
        $('#buy-submit-button').attr("disabled", "disabled");
         
        var fName = $('#first-name').val();
        var lName = $('#last-name').val();
        var email = $('#email').val();
        var cardNumber = $('#card-number').val();
        var cardCVC = $('#card-security-code').val();
         
        if (fName === "") {
            showErrorDialogWithMessage("Please enter your first name.");
            return;
        }
        if (lName === "") {
            showErrorDialogWithMessage("Please enter your last name.");
            return;
        }
         
        var emailFilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (email === "") {
            showErrorDialogWithMessage("Please enter your email address.");
            return;
        } else if (!emailFilter.test(email)) {
            showErrorDialogWithMessage("Your email address is not valid.");
            return;
        }
          
        if (cardNumber === "") {
            showErrorDialogWithMessage("Please enter your card number.");
            return;
        }
        if (cardCVC === "") {
            showErrorDialogWithMessage("Please enter your card security code.");
            return;
        }
        
        Stripe.createToken({
            number: cardNumber,
            cvc: cardCVC,
            exp_month: $('#expiration-month').val(),
            exp_year: $('#expiration-year').val()
        }, stripeResponseHandler);
         
        return false;
         
    });
});


