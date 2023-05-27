<?php

session_start();

if (!isset($_SESSION['Username'])) {
    echo "<script>
        window.location.href = 'login.php';
    </script>";
}
?>

<script>
    function validatekey() {
        if ($('#key').val() != $('#con_key').val()) {
            $('#alert').css('background-color', "#fa8686c2");
            $('#alert').html('Confirm Password Field doesn\'t match..');
            $('#con_key').val('');
            // $('#con_key').focus();
            $('#alert').slideDown().delay(2000).slideUp();
            return false;
        }
        return true;
    }
    $(document).ready(function() {
        $('#con_key').on('blur', function() {
            validatekey();
        });

        $('#secretkeyform').on('submit', function(e) {
            e.preventDefault();
            valid = validatekey();

            if (valid) {
                $.ajax({
                    url: "db/update_secret_key.php",
                    type: "POST",
                    data: {
                        key: $('#key').val()
                    },
                    success: function(result) {
                        console.log(result);
                        $('#alert').css('background-color', '#ff6e6ead');
                        if (result=='New Key Updated'){
                            $('#alert').html("Key Updated");
                            $('#alert').css('background-color',"#55fa55b6");
                            $(this).trigger('reset');
                        }
                        else if (result=="Key Upation failed."){
                            $('#alert').html("Key Updated");
                        }
                        $('#alert').slideDown().delay(2000).slideUp();
                        
                    }
                })
            }
        })
    })
</script>

<div>
    <div class="" id="secretKeyUpdateForm" tabindex="-1" style="margin: auto; width: 45vw; min-width: 300px; background-color: rgba(0,0,0,0); margin-top: 10vh;">
        <div class="-dialog -dialog-centered -dialog-scrollable">
            <div class="-content" style="overflow-x: hidden; box-shadow:  1px 1px 10px 1px #b7ccff; background-color: rgb(0,0,0); padding: 5vh;">
                <div class="-header">
                    <h1 class="-title section-title pb-0" style="color: #f0f0f0">Update Secret Key</h1>
                </div>
                <form class="needs-validation" id="secretkeyform" style="margin: 0 auto;" novalidate>
                    <div class="-body mt-5">
                        <div class="row mx-auto">
                            <div class="col-12 form-group">
                                <input type="password" class="form-control" id='key' placeholder="Secret Key" required>
                                <label class="col-form-label">Secret Key</label>
                            </div>
                            <div class="col-12 form-group">
                                <input type="password" id="con_key" class="form-control" placeholder="Confirm Secret Key" required>
                                <label class="col-form-label">Confirm Secret Key</label>
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