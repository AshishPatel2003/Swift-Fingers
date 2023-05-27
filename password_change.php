<?php
session_start();

if (!isset($_SESSION['Username'])) {
    echo "<script>
        window.location.href = 'login.php';
    </script>";
}
?>

<script>
    function validatepasswordinp() {
        old_pass = $('#old');
        new_pass = $('#new');
        con_new_pass = $('#con_new');
        $('#alert').css('background-color', "#fa8686c2");
        if (old_pass.val().length<6) {
            $('#alert').html('Please Correct Old Password');
            old_pass.focus();
            $('#alert').slideDown().delay(2000).slideUp();
            return false;
        }
        else if (new_pass.val().length<6) {
            $('#alert').html('New Password must be of atleast 6 characters.');
            new_pass.focus();
            $('#alert').slideDown().delay(2000).slideUp();
            return false;
        }
        else if (con_new_pass.val()!=new_pass.val()) {
            $('#alert').html('Confirm Password Field doesn\'t match..');
            con_new_pass.val('');
            con_new_pass.focus();
            $('#alert').slideDown().delay(2000).slideUp();
            return false;
        }
        return true;
    }

    $(document).ready(function() {

        $('#change_password').on('submit', function(e) {
            e.preventDefault();
            valid = validatepasswordinp();

            if (valid) {
                $.ajax({
                    url: "db/update_new_password.php",
                    type: "POST",
                    data: {
                        user: '<?php echo $_SESSION['Username']?>',
                        old: $('#old').val(),
                        new: $('#new').val()
                    },
                    success: function(result) {
                        $('#alert').css('background-color', '#ff6e6ead');
                        if (result == 'Done') {
                            $('#alert').html("Password Changed successfully...");
                            $('#alert').css('background-color', "#55fa55b6");
                            $(this).trigger('reset');
                        } 
                        else if (result == "wrong old") {
                            $('#alert').html("Please provide Correct Old Password");
                            $('#old').val('');
                            $('#old').focus();
                        }
                        else if (result == "Failed") {
                            $('#alert').html("Can't Change Password...");
                        }
                        else{
                            console.log(result);
                        }
                        $('#alert').slideDown().delay(2000).slideUp();

                    }
                })
            }
        })
    })
</script>

<div>
    <div class="" id="changepassswordform" tabindex="-1" style="margin: auto; width: 45vw; min-width: 300px; background-color: rgba(0,0,0,0); margin-top: 10vh;">
        <div class="-dialog -dialog-centered -dialog-scrollable">
            <div class="-content" style="overflow-x: hidden; box-shadow:  1px 1px 10px 1px #b7ccff; background-color: rgb(0,0,0); padding: 5vh;">
                <div class="-header">
                    <h1 class="-title section-title pb-0" style="color: #f0f0f0">Change Password</h1>
                </div>
                <form class="needs-validation" id="change_password" style="margin: 0 auto;" novalidate>
                    <div class="-body mt-5">
                        <div class="row mx-auto">
                            <div class="col-12 form-group">
                                <input type="password" class="form-control" id='old' placeholder="Old Password" required>
                                <label class="col-form-label">Old Password</label>
                            </div>
                            <div class="col-12 form-group">
                                <input type="password" class="form-control" id='new' placeholder="New Password" required>
                                <label class="col-form-label">New Password</label>
                            </div>
                            <div class="col-12 form-group">
                                <input type="password" id="con_new" class="form-control" placeholder="Confirm New Password" required>
                                <label class="col-form-label">Confirm New Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="-footer row mt-2 mb-2 ml-2">
                        <button type="submit" class="btn btn-primary pt-1 mt-3 pb-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>