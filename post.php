<?php
require_once 'db_connect.php';
if ($_POST) {
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        //your site secret key
        $secret = '6LfvFi8UAAAAABZiQq7ds14IdpGqfQxNm7Jao5Z4';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success) {
            $title = $_POST['sleTitle'];
            $name = $_POST['inptName'];
            $gender = $_POST['sleGender'];
            $regId = $_POST['txtRegNo'];
            $RegistrationId = $regId;
            $address = $_POST['txtAddress'];
            $Email = $_POST['inptEmail'];
            $Nationality = $_POST['inptNationality'];
            $Phone = $_POST['inptPhone'];
            $GerivanceType = $_POST['gtype'];
            $ifAny = $_POST['txtIfAny'];
            $gDetails = $_POST['txtGrivanceDetails'];
            $uniqeId = uniqid();
           $sql = "SELECT * FROM grievance_registration WHERE RegistrationNumber='$RegistrationId'";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                $sql = "INSERT INTO grievance_registration (TitlePrefex,Name,Gender, RegistrationNumber,Address, EmailId, Nationality, Phone,RegistrationType,SubjectIfAny,GrievanceDetails,UniqueId) VALUES ('$title', '$name','$gender','$RegistrationId', '$address', '$Email','$Nationality' ,'$Phone','$GerivanceType','$ifAny','$gDetails','$uniqeId')";
                $query = $connect->query($sql);
                if ($query === TRUE) {
                    $validator['success'] = true;
                    $validator['messages'] = "Successfully Added";
                } else {
                    $validator['success'] = false;
                    $validator['messages'] = "Error while adding the member information";
                }
                echo $_SERVER['SERVER_ADDR'];
                echo $validator;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Submitted</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Form Submitted Sucessfully</h2>
 
  <div class="alert alert-info">
    <strong>Unique Id:</strong>
    <?php
echo $uniqeId;
?>
 </div>
  
</div>
</body>
</html>
<?php
                // Configuration option.
                // Enter the email address that you want to emails to be sent to.
                // Example $address = "joe.doe@yourdomain.com";
                //$address = "example@websiteurl.com";
                $address = "khitguntur@gmail.com";
                // Configuration option.
                // i.e. The standard subject will appear as, "You've been contacted by John Doe."
                // Example, $e_subject = '$name . ' has contacted you via Your Website.';
                $e_subject = 'Registration Form';
                // Configuration option.
                // You can change this if you feel that you need to.
                // Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.
                $e_body = "You have been Registered To GRIEVANCE" . PHP_EOL . PHP_EOL;
                $e_content = "\"$uniqeId\"" . PHP_EOL . PHP_EOL;
                $e_reply = "You can check registration using UniqueId";
                $msg = wordwrap($e_body . $e_content . $e_reply, 70);
                $headers = "From: $address" . PHP_EOL;
                $headers.= "Reply-To: $Email" . PHP_EOL;
                $headers.= "MIME-Version: 1.0" . PHP_EOL;
                $headers.= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
                $headers.= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
                if (mail($address, $e_subject, $msg, $headers)) {
                    // Email has sent successfully, echo a success page.
                    echo "<div class='alert alert-success'>";
                    echo "<h3>Email Sent Successfully.</h3><br>";
                    echo "<p>Thank you <strong>$name</strong>,</p>";
                    echo "</div>";
                } else {
                    echo 'ERROR!';
                    // close the database connection
                    $connect->close();
                    echo json_encode($validator);
                }
            } else {
                echo "Already Subbmitted";
            }
        }
    } else {
        echo "Go and submit recaptcha";
    }
} else {
    echo "Error in Form";
}
?>