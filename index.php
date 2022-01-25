<?php

require_once ("../crud/php/component.php");
require_once ("../crud/php/operation.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booster Shot Registration</title>

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/c618366fb6.js" crossorigin="anonymous"></script>
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<main>
    <div class="container text-center">
        <h1 class="py-4 bg-info text-light rounded"><i class="fas fa-shield-virus"></i> COVID-19 Booster Shot Registration </h1>

        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <?php inputElement("<i class='far fa-id-badge'></i>","Patient ID", "patient_id",setID()); ?>
                </div>   
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-user'></i>","Patient Name", "patient_name",""); ?>
                </div> 
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-sort-numeric-down'></i>","Age", "patient_age",""); ?>
                </div>  
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-map-marker-alt'></i>","Address", "address",""); ?>
                </div> 
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-phone'></i>","Contact Number", "mobile_number",""); ?>
                </div> 
                <div class="row pt-2">   
                    <div class="col">
                        <?php inputElement("<i class='fas fa-syringe'></i>","Primary Vaccination", "vaccine_type",""); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("<i class='fas fa-syringe'></i>","Homologous Booster", "booster_type",""); ?>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                        <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                        <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                        <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                        <?php deleteBtn();?>
                </div>
            </form>
        </div>

        <!-- Bootstrap table  -->
        <div class="d-flex table-data">
            <table class="table table-striped table-info">
                <thead class="thead-info">
                    <tr>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Primary Vaccine</th>
                        <th>Homologous Booster</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                   <?php


                   if(isset($_POST['read'])){
                       $result = getData();

                       if($result){

                           while ($row = mysqli_fetch_assoc($result)){ ?>

                               <tr>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['patient_name']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['patient_age']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['address']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['mobile_number']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['vaccine_type']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['booster_type']; ?></td>
                                   <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i></td>
                               </tr>

                   <?php
                           }

                       }
                   }


                   ?>
                </tbody>
            </table>
        </div>


    </div>
</main>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="../crud/php/main.js"></script>

<script src="https://kit.fontawesome.com/c618366fb6.js" crossorigin="anonymous"></script>
</body>
</html>