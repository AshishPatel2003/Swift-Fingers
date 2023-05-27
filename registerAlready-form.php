<?php
session_start();

if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
    $email = '';
}
?>

<script>
    function newRegistration() {
        $.ajax({
            url: "register.php",
            type: "POST",
            success: function(data) {
                $('#flexcont').html(data);
            }
        })
    }

    function valRegisterAlready() {
        $('#alert').hide().css('background-color', '#ff6e6ead');
        if ($('#al-email').val() == '') {
            $('#alert').html("Please Fill the Email...").slideDown().delay(2000).slideUp();
            return false;
        } else if ($('#volunteer_name').val() == "") {
            $('#alert').html("Please Fill the Volunteer Name...").slideDown().delay(2000).slideUp();
            return false;
        } else if ($('#volunteer_password').val() == "") {
            $('#alert').html("Please Fill the Volunteer Password...").slideDown().delay(2000).slideUp();
            return false;
        }
        return true
    }

    $(document).ready(function() {
        console.log('ready')
        let emailid = '<?php echo $email ?>';

        if (emailid != '') {
            $('#al-email').val(emailid);
        }

        $('#registeralreadyform').on('submit', function(e) {
            e.preventDefault();
            $('#registerAlreadyform').addClass('was-validated');

            if (valRegisterAlready()) {
                $.ajax({
                    url: "db/registerAlready-DB.php",
                    type: "POST",
                    data: {
                        email: $('#al-email').val(),
                        vol_name: '<?php $_SESSION['Name']?>',
                        amount: $('#amount').val()
                    },
                    success: function(result) {
                        console.log(result);
                        $('#alert').css('background-color', '#ff6e6ead');
                        if (result == 'Password Wrong') {
                            $('#alert').html("Incorrect Volunteer Password");
                            $('#vol_password').html('').focus();
                        } else if (result == 'Not Registered') {
                            $('#alert').html("!! Not Registered\nRegistered First...");
                            $.ajax({
                                url: "register-form.php",
                                type: "POST",
                                success: function(registerform) {
                                    $('#flexcont').html(registerform);
                                }
                            })
                        } else if (result == 'Already Registered') {
                            $('#alert').html("! Participant is already Registered.");
                        } else if (result == "Failed") {
                            $('#alert').html("! 404 Error.");
                        } else {
                            $('#alert').css('background-color', '#55fa55b6');
                            $('#alert').html(result);
                            $('#registerform').removeClass('was-validated');
                            $('#registerform').trigger("reset");
                        }
                        $('#alert').slideDown().delay(2000).slideUp();
                    }
                })
            }


        })
    })
</script>



<section class="container mt-0 py-5" style="min-height: 100vh; background-color: rgba(0,0,0,0.8)">
    <div class="row mt-0 py-5">
        <div class="col-12 my-auto mt-0 py-5">
            <div class="row text-center mt-0 py-5">

                <div class="" id="registrationalreadyForm" tabindex="-1" style="margin: auto; width: 50vw; min-width: 300px; background-color: rgba(0,0,0,0);">
                    <div class="-dialog -dialog-centered -dialog-scrollable">
                        <div class="-content" style="overflow-x: hidden; box-shadow:  1px 1px 10px 1px #b7ccff; background-color: rgb(0,0,0); padding: 5vh;">
                            <div class="-header">
                                <h1 class="-title section-title pb-0" style="color: #f0f0f0">REGISTER NOW</h1>
                            </div>
                            <form class="needs-validation" id="registeralreadyform" style="margin: 0 auto;" novalidate>
                                <div class="-body mt-5">
                                    <div class="row mx-auto">
                                        <div class="col-lg-6 form-group">
                                            <input type="email" class="form-control" name="al-email" id="al-email" placeholder="Participant Email ID" required>
                                            <label class="col-form-label">Participant Email Id</label>
                                        </div>
                                        <div class="col-lg-6 form-group" style="display: inline-block;">
                                            <select name="amount" id="amount" required class="custom-select" required>
                                                <option value="25" selected>Rs. 25</option>
                                                <option value="20">Rs. 20</option>
                                            </select>
                                            <label class="col-form-label">Payment Amount</label>
                                        </div>
                                    </div>

                                <div class="-footer row mx-3 mt-4">
                                    <button type="submit" class="btn btn-primary pt-1 mt-0 pb-2 mr-3">Register</button>
                                    <a class="ml-3 pt-2 pb-1" style="bottom: 0; right: 0; font-size: small; color: #17A2B8; cursor: pointer; text-decoration: underline;" onclick="newRegistration()">New Registration?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

