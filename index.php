<?php

session_start();

require_once "config.php";

if (isset($_POST['submit'])) {

    $customername = $_POST['customer_name'];
    $phone = $_POST['phone'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    try {

        $sql = "insert into customer(customer_name,phone) values(:customer_name,:phone)";
        $stmt = $conn->prepare($sql);

        // $data = [
        //     ':customername' => $customername,
        //     ':phone' => $phone,       
        // ];
        // $stmt_execute = $stmt->execute($data);

        $stmt->bindParam(":customer_name", $customername);
        $stmt->bindParam(":phone", $phone);
        $stmt->execute();



        // Get last insert ID
        $last_id = $conn->lastInsertId();

        $ordername = $_POST['ordername'];

        //Insert data into orders table

        $sql1 = "insert into orders(ordername,customer_id) values(:ordername,:customer_id)";

        $stmt = $conn->prepare($sql1);
        $stmt->bindParam(":ordername", $ordername);
        $stmt->bindParam(":customer_id", $last_id);
        $stmt->execute();

        //Insert Data into student Table

        $stmt = $conn->prepare("insert into student(fname,lname,customer_id,email) 
            values(:fname,:lname,:last_id,:email)");
        $stmt->bindParam(":fname", $fname);
        $stmt->bindParam(":lname", $lname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":last_id", $last_id);

        $stmt->execute();

        if ($stmt->execute()) {
            $_SESSION['message'] = "inserted successfully";
            //  echo $_SESSION['message'].$last_id;
            //  header('Refresh:5, url=index.php');
            header('location:index.php');
            exit();
        } else {
            $_SESSION['message'] = "inserted failed";
            header('Location:index.php');
            // echo "Inserted Failed";
            exit();
        }
    } catch (PDOException $e) {
        echo "My Error Type:" . $e->getMessage();
    }
}





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

        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title text-ceter">Insert Multiple Table</h2>

                <?php if (isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                <?php
                    unset($_SESSION['message']);
                endif;
                ?>

                <form action="" method="post">
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
                        </div>
                    </div>
                    <div class="checkbox pb-2">
                        <label><input type="checkbox" name="remember"> Remember me</label>
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