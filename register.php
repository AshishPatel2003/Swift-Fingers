<?php

session_start();

if (!isset($_SESSION['Username'])) {
?><script>
        window.location.href = "login.php";
    </script> <?php
            }

                ?>

<script>
    function valRegister() {
        $('#alert').hide().css('background-color', '#ff6e6ead');
        if ($('#name').val() == '') {
            $('#alert').html("Please Fill the Name...").slideDown().delay(2000).slideUp();
            return false;
        } else if ($('#email') == '') {
            $('#alert').html("Please Fill the Email...").slideDown().delay(2000).slideUp();
            return false;
        } else if ($('#phone').val() == '') {
            $('#alert').html("Please Fill the Phone no....").slideDown().delay(2000).slideUp();
            return false;
        } else if ($('#university').val() == "") {
            $('#alert').html("Please Fill the University...").slideDown().delay(2000).slideUp();
            return false;
        } else if ($('#gender').val() == "") {
            $('#alert').html("Please Select Gender...").slideDown().delay(2000).slideUp();
            return false;
        } else if ($('#city').val() == "") {
            $('#alert').html("Please Fill the City...").slideDown().delay(2000).slideUp();
            return false;
        } else if ($('#paymenttype').val() == "") {
            $('#alert').html("Please Select Payment Method...").slideDown().delay(2000).slideUp();
            return false;
        }

        return true;
    }
    $(document).ready(function() {

        $('#alert').hide();
        $('#registerform').on('submit', function(e) {
            e.preventDefault();
            $('#registerform').addClass('was-validated');

            if (valRegister()) {
                console.log('validated')
                $.ajax({
                    url: "db/register-DB.php",
                    type: "POST",
                    data: {
                        name: $('#name').val(),
                        email: $('#email').val(),
                        phone: $('#phone').val(),
                        gender: $('#gender').val(),
                        university: $('#university').val(),
                        city: $('#city').val(),
                        paymenttype: $('#paymenttype').val(),
                        vol_name: '<?php echo $_SESSION['Username']; ?>',
                    },
                    success: function(content) {
                        console.log(content)
                        if (content == 'Password Wrong') {
                            $('#alert').css('background-color', 'ff6e6ead');
                            $('#alert').html("Incorrect Volunteer Password");
                            $('#vol_password').html('').focus();
                        } else if (content == 'Failed') {
                            $('#alercontentt').css('background-color', 'ff6e6ead');
                            $('#alert').html("404 Error...");
                        } else if (content == 'Data Inserted') {
                            $('#alert').css('background-color', '#55fa55b6');
                            $('#alert').html("Registration Successful...");
                            $('#registerform').removeClass('was-validated');
                            $('#registerform').trigger("reset");
                        } else if (content.includes('@')) {
                            $('#alert').css('background-color', '#ff6e6ead');
                            $('#alert').html("! You Have already registered.");
                            $.ajax({
                                async: true,
                                url: "registerAlready-form.php",
                                type: "POST",
                                data: {
                                    email: content
                                },
                                success: function(result) {
                                    $('#flexcont').html(result);
                                    $('#flexcont').slideDown();
                                }
                            });
                        }
                        else{
                            $('#alert').html(content);
                        }

                        $('#alert').slideDown().delay(2000).slideUp();
                    }
                });
            }
        });


    })

    function alreadyRegistered() {
        $('#body').html('');
        $.ajax({
            url: "registerAlready-form.php",
            type: "POST",
            success: function(data) {
                $('#flexcont').html(data);
            }
        })
    }
</script>
    <div style="padding-bottom: 0.9rem;">
        <section class="container mt-0">
            <div class="row mt-0">
                <div class="col-12 my-auto mt-0">
                    <div class="row text-center mt-0" id="registrationform-container">

                        <div id="registrationForm" tabindex="-1" style="margin: auto; width: 50vw; min-width: 300px; background-color: rgba(0,0,0,0);">

                            <div class="-dialog -dialog-centered -dialog-scrollable">
                                <div class="-content" style="overflow-x: hidden; box-shadow:  1px 1px 10px 1px #b7ccff; background-color: rgb(0,0,0); padding: 5vh;">
                                    <div id="alert" style="width: 100%; position:absolute; top:0;"></div>
                                    <div class="-header">
                                        <h1 class="-title section-title pb-0" style="color: #f0f0f0">REGISTER NOW</h1>
                                    </div>
                                    <form class="needs-validation" method="POST" id="registerform" style="margin: 0 auto;" novalidate>
                                        <div class="-body">
                                            <div class="col-md-12 form-group mt-3">
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                                <label class="col-form-label">Your Name</label>
                                            </div>
                                            <div class="col-md-12 form-group mt-3">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                                <label class="col-form-label">Your Email</label>
                                            </div>
                                            <div class="col-md-12 form-group mt-3">
                                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Your Phone Number" required>
                                                <label class="col-form-label">Your Phone Number</label>
                                            </div>
                                            <div class="col-md-12 form-group mt-3 autocomplete">
                                                <input type="text" name="university" class="form-control" id="university" placeholder="Institute Name" required>
                                                <label class="col-form-label">Institute Name</label>
                                            </div>
                                            <div class="col-md-12 form-group mt-3">
                                                <input type="text" name="city" class="form-control" id="city" placeholder="City" required>
                                                <label class="col-form-label">City</label>
                                            </div>
                                            <div class="row mx-auto mt-3">
                                                <div class="col-md-6 form-group" style="display: inline-block;">
                                                    <select name="gender" id="gender" required class="custom-select" required>
                                                        <option value="" disabled selected>Select Gender</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Male">Male</option>
                                                    </select>
                                                    <label class="col-form-label">Select Gender</label>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <select name="paymenttype" id="paymenttype" required class="custom-select" required>
                                                        <option value="" disabled selected>Payment method</option>
                                                        <option value="Online" selected>Online</option>
                                                        <option value="Cash">Cash</option>
                                                    </select>
                                                    <label class="col-form-label">Payment Method</label>
                                                </div>
                                            </div>
                                        <div class="-footer row mx-1 p-2" style="justify-content: space-between;">
                                            <button type="submit" class="btn btn-primary pt-1 mt-3 pb-2">Register</button>
                                            <a class="mt-4 ml-3 text-underline" style="bottom: 0; right:0; font-size:small; color:#17A2B8; cursor: pointer;" onclick="alreadyRegistered()">Already registered before?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>