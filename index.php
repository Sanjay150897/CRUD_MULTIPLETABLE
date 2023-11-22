<?php

require_once "config.php";




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insert Multiple Table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">\
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">

        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-ceter">Insert Multiple Table</h2>


                <form action="" method="">
                    <div class="row pt-3">
                        <h2>Customer Details</h2>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Customer Name:</label>
                                <input type="text" class="form-control" id="customer_name" placeholder="Enter Customer Name" name="customer_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number:</label>
                                <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" maxlength="10" required>
                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <h2>Order Details</h2>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Order Name:</label>
                                <input type="text" class="form-control" id="ordername" placeholder="Enter Order Name" name="ordername" required>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <h2>Student Details</h2>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Student first Name:</label>
                                <input type="text" class="form-control" id="fname" placeholder="Enter Student first Name" name="fname" required>
                            </div>
                            <div class="form-group">
                                <label>Student Last Name:</label>
                                <input type="text" class="form-control" id="lname" placeholder="Enter Student Last Name" name="lname" required>
                            </div>
                            <div class="form-group">
                                <label>Student Email:</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" required>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="remember"> Remember me</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

</html>