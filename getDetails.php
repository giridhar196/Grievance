<?php
require_once 'db_connect.php';
if ($_POST) {
    if (isset($_POST['RegNo']) != "") {
        $reg = $_POST['RegNo'];
        $sql = "SELECT * FROM grievance_registration WHERE RegistrationNumber='$reg'";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            echo "Already Registered";
        } 
    }
    else{
        $uniqueId = $_POST['uniqueId'];
        $phoneNumber = $_POST['phoneNumber'];
        $sql = "SELECT * FROM grievance_registration WHERE UniqueId='$uniqueId' AND Phone='$phoneNumber'";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $d = array('name' => $row['Name'], 'gender' => $row['Gender'], 'regno' => $row['RegistrationNumber'], 'address' => $row['Address'], 'email' => $row['EmailId'], 'nationality' => $row['Nationality'], 'phone' => $row['Phone'], 'type' => $row['RegistrationType'], 'previous' => $row['SubjectIfAny'], 'details' => $row['GrievanceDetails']);
                echo json_encode($d);
            }
        }
    }
}
?>
 