<?php

session_start();

if (!isset($_SESSION['Username'])) {
?><script>
        window.location.href = "login.php";
    </script> <?php
            }

            require("db/dbconnect.php");

            if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];
                // echo "<script>console.log('$id')</script>";
                $selectQuery = 'SELECT * FROM participants where ID=' . $id;
                $result = mysqli_query($conn, $selectQuery);
                $data = mysqli_fetch_assoc($result);
                $name = $data['Name'];
                $email = $data['Email'];
                $phone = (int)$data['Phone_no'];
                $gender = $data['Gender'];
                $university = $data['University'];
                $city = $data['City'];
                $paymentType = $data['Paymenttype'];
                $volunteer = $data['Volunteer_name'];
                $count = (int)$data['Count'];
                $status = $data['Status'];
                $amount = (int)$data['Amount'];
                $timeStamp = $data['TiimeStamp'];
            }
                ?>

<script>
    $(document).ready(function(){
        $('#editform').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: "db/participant_detailEdit.php",
                type: "POST",
                data:{
                    id: '<?php echo $id; ?>',
                    name: $('#name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    gender: $('#gender').val(),
                    university: $('#university').val(),
                    city: $('#city').val(),
                    paymenttype: $('#paymenttype').val(),
                    amount: $('#amount').val(),
                    count: $('#count').val(),
                    status: $('#status').val()
                },
                success: function(data){
                    if (data=='1'){
                        alert('Updation success!!!');
                        window.location.href = 'dashboard.php';
                    }
                    else{
                        alert("Failed!!!");
                    }
                }
            })
        })
    });
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
                                    <h1 class="-title section-title pb-0" style="color: #f0f0f0">Edit Details</h1>
                                </div>
                                <form class="needs-validation" id="editform" style="margin: 0 auto;" novalidate>
                                    <div class="-body">
                                        <div class="col-md-12 form-group mt-3">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?php echo $name; ?>" required>
                                            <label class="col-form-label">Your Name</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo $email; ?>" required>
                                            <label class="col-form-label">Your Email</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3">
                                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Your Phone Number" value="<?php echo $phone; ?>" required>
                                            <label class="col-form-label">Your Phone Number</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 autocomplete">
                                            <input type="text" name="university" class="form-control" id="university" placeholder="Institute Name" value="<?php echo $university; ?>" required>
                                            <label class="col-form-label">Institute Name</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3">
                                            <input type="text" name="city" class="form-control" id="city" placeholder="City" value="<?php echo $city; ?>" required>
                                            <label class="col-form-label">City</label>
                                        </div>
                                        <div class="row mx-auto mt-3">
                                            <div class="col-md-6 form-group" style="display: inline-block;">
                                                <select name="gender" id="gender" required class="custom-select" value="<?php echo $gender; ?>" required>
                                                    <option value="" disabled selected>Select Gender</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                </select>
                                                <label class="col-form-label">Select Gender</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <select name="paymenttype" id="paymenttype" required class="custom-select" value="<?php echo $paymentType; ?>" required>
                                                    <option value="" disabled selected>Payment method</option>
                                                    <option value="Online" selected>Online</option>
                                                    <option value="Cash">Cash</option>
                                                </select>
                                                <label class="col-form-label">Payment Method</label>
                                            </div>
                                        </div>
                                            <div class="row mx-auto">
                                                <div class="col-md-4 form-group mb-3">
                                                    <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount" value="<?php echo $amount; ?>" required>
                                                    <label class="col-form-label">Amount</label>
                                                </div>
                                                <div class="col-md-4 form-group mb-3">
                                                    <input type="text" name="count" class="form-control" id="count" placeholder="count" value="<?php echo $count; ?>" required>
                                                    <label class="col-form-label">Count</label>
                                                </div>
                                            <!-- </div>
                                            <div class="row mx-auto mt-3"> -->
                                                <div class="col-md-4 form-group mb-3">
                                                    <input type="text" name="status" class="form-control" id="status" placeholder="Status" value="<?php echo $status; ?>" required>
                                                    <label class="col-form-label">Status</label>
                                                </div>
                                            </div>
                                        <div class="-footer row mx-1 p-2" style="justify-content: space-between;">
                                            <button type="submit" class="btn btn-primary pt-1 mt-3 pb-2">Update</button>

                                            <a href = 'dashboard.php' class="btn btn-primary pt-1 mt-3 pb-2">Cancel</a>
                                            
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