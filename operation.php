<?php

require_once ("db.php");
require_once ("component.php");

$con = Createdb();

// create button click
if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}

if(isset($_POST['deleteall'])){
    deleteAll();

}

function createData(){
    $patientname = textboxValue("patient_name");
    $patientage = textboxValue("patient_age");
    $address = textboxValue("address");
    $contactnumber = textboxValue("mobile_number");
    $primvac = textboxValue("vaccine_type");
    $boosvac = textboxValue("booster_type");

    if($patientname && $patientage && $address && $contactnumber &&$primvac && $boosvac){

        $sql = "INSERT INTO books (patient_name, patient_age, address, mobile_number, vaccine_type, booster_type) 
                        VALUES ('$patientname','$patientage', '$address' , '$contactnumber' ,'$primvac','$boosvac')";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record Successfully Inserted!");
        }else{
            echo "Error";
        }

    }else{
            TextNode("error", "Please provide Data in the Textbox!");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}


// messages
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


// get data from mysql database
function getData(){
    $sql = "SELECT * FROM books";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

// update date
function UpdateData(){
    $patientid = textboxValue("patient_id");
    $patientname = textboxValue("patient_name");
    $patientage = textboxValue("patient_age");
    $address = textboxValue("address");
    $contactnumber = textboxValue("mobile_number");
    $primvac = textboxValue("vaccine_type");
    $boosvac = textboxValue("booster_type");

    if($patientname && $patientage && $address && $contactnumber &&$primvac && $boosvac){
        $sql = "
                    UPDATE books SET patient_name='$patientname', , patient_age = '$patientage', address = '$address', mobile_number = '$contactnumber' , vaccine_type = '$primvac', booster_type = '$boosvac' WHERE id='$patientid';                    
        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Data Successfully Updated!");
        }else{
            TextNode("error", "Unable to Update Data!");
        }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }


}


function deleteRecord(){
    $patientid = (int)textboxValue("patient_id");

    $sql = "DELETE FROM books WHERE id=$patientid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","Record Deleted Successfully!");
    }else{
        TextNode("error","Unable to Delete Record!");
    }

}


function deleteBtn(){
    $result = getData();
    $i = 0;
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i > 3){
                buttonElement("btn-deleteall", "btn btn-danger" ,"<i class='fas fa-trash'></i> Delete All", "deleteall", "");
                return;
            }
        }
    }
}


function deleteAll(){
    $sql = "DROP TABLE books";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","All Record deleted Successfully!");
        Createdb();
    }else{
        TextNode("error","Oops, Something Went Wrong. Record cannot deleted!");
    }
}


// set id to textbox
function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['id'];
        }
    }
    return ($id + 1);
}








