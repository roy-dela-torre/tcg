<?php
/* Template Name: Sign Up */
if (is_user_logged_in()) {
    header('Location: ' . get_home_url() . '/my-account/');
    exit; // Make sure to exit to prevent further execution
}

get_header();
?>

<section class="signup">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                
                <div class="col-xxl-8 col-xl-9 col-lg-12 px-sm-0">
                    <div class="content">
                        <div class="content-container">
                            <div class="form">
                                <div class="text-uppercase text-white" id="header"><h1>Create an Account</h1></div>
                                <p class="text-white sub-header-text">Worem ipsum dolor sit amet consectetur adipiscing elit</p>
                                <?php echo do_shortcode('[registration_form]'); ?>
                                <div class="signup-link">
                                <p class="text-center text-white">Already have an account?<a href="<?php echo get_home_url()?>/my-account/" rel="noopener noreferrer">Log in</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-12">
                    <div class="image-container">
                       
                    </div>
                </div>

            </div>
            
        </div>
    </div>
</section>

<?php
get_footer();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<!-- Your JavaScript code here -->

<script>
  $(document).ready(function() {
    $("#togglePassword").on("click", function() {
      const passwordField = $("#reg_password");
      const toggleIcon = $(this);
      if (passwordField.attr("type") === "password") {
        passwordField.attr("type", "text");
        toggleIcon.removeClass("fa-eye").addClass("fa-eye-slash");
      } else {
        passwordField.attr("type", "password");
        toggleIcon.removeClass("fa-eye-slash").addClass("fa-eye");
      }
    });
  });
</script>

<script>
// $(document).ready(function() {
//   $('button.woocommerce-Button.button').click(function(e){
//     e.preventDefault();
//     var errorMessages = [];

//     function addErrorMessage(field, message) {
//       errorMessages.push(message);
//       field.addClass('error');
//     }

//     function clearErrorMessages() {
//       errorMessages = [];
//       $('input').removeClass('error');
//     }

//     clearErrorMessages();

//     var regUsername = $('input#reg_username');
//     var regEmail = $('input#reg_email');
//     var regPassword = $('input#reg_password');
    
//     // Validation for Username
//     if (regUsername.val() === "") {
//       addErrorMessage(regUsername, "Username is required.");
//     }

//     // Validation for Email
//     if (regEmail.val() === "") {
//       addErrorMessage(regEmail, "Email is required.");
//     } else if (!isValidEmail(regEmail.val())) {
//       addErrorMessage(regEmail, "Invalid email address.");
//     }

//     // Validation for Password
//     if (regPassword.val() === "") {
//       addErrorMessage(regPassword, "Password is required.");
//     }

//     if (errorMessages.length > 0) {
//       var errorMessage = errorMessages.join("\n");
//       swal("Error", errorMessage, "error");
//     } 
//     else {
//       $('form.woocommerce-form.woocommerce-form-register.register').submit();
//     }
//   });

//   function isValidEmail(email) {
//     // Regular expression for email validation
//     var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
//     return emailPattern.test(email);
//   }
// });
</script>
