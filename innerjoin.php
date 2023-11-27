<?php
require_once('config.php');



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inner Join</title>
    <link rel="stylesheet" href="">

    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">\
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />



</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Inner Join Example
                        </h5>
                    </div>
                    <div class="card-body">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>Order Name</th>
                                    <th>Studen First Name</th>
                                    <th>Student Last Name</th>
                                    <th>email</th>
                                </tr>
                            </thead>
                            <?php

                            $sql = "select * from customer INNER JOIN orders ON customer.customer_id = orders.customer_id
                            INNER JOIN student ON customer.customer_id = student.customer_id";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $stmt->setFetchMode(PDO::FETCH_OBJ);

                            // $row = $stmt->fetch();

                            $row = $stmt->fetchAll();

                            foreach ($row as $rows) {


                            ?>
                                <tbody>
                                    <td><?= $rows->customer_id; ?></td>
                                    <td><?= $rows->customer_name; ?></td>
                                    <td><?= $rows->phone; ?></td>
                                    <td><?= $rows->ordername; ?></td>
                                    <td><?= $rows->fname; ?></td>
                                    <td><?= $rows->lname; ?></td>
                                    <td><?= $rows->email; ?></td>
                                </tbody>
                            <?php
                            }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Inner Join Through ID (Customer_id = 1 )
                        </h5>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>Order Name</th>
                                    <th>Studen First Name</th>
                                    <th>Student Last Name</th>
                                    <th>email</th>
                                </tr>
                            </thead>
                            <?php
                            $customerid = 1;
                            $sql = "select * from customer INNER JOIN orders ON customer.customer_id = orders.customer_id
                            INNER JOIN student ON customer.customer_id = student.customer_id where customer.customer_id = :customerid";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(":customerid", $customerid, PDO::PARAM_INT);
                            $stmt->execute();
                            $stmt->setFetchMode(PDO::FETCH_OBJ);

                            // $row = $stmt->fetch();

                            $row = $stmt->fetchAll();

                            foreach ($row as $rows) {


                            ?>
                                <tbody>
                                    <td><?= $rows->customer_id; ?></td>
                                    <td><?= $rows->customer_name; ?></td>
                                    <td><?= $rows->phone; ?></td>
                                    <td><?= $rows->ordername; ?></td>
                                    <td><?= $rows->fname; ?></td>
                                    <td><?= $rows->lname; ?></td>
                                    <td><?= $rows->email; ?></td>
                                </tbody>
                            <?php
                            }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>
        new DataTable('#example');
    </script>
    <script>
        new DataTable('#example2');
    </script>

</body>

</html>