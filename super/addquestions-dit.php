<?php
session_start();
require './_cred.php';
if(isset($_POST['jsonGot']) && isset($_SESSION['username'])){
    $jsonGot = urldecode($_POST['jsonGot']);
    //echo $jsonGot;
    $user = $_SESSION['username'];
    $sql  = "INSERT INTO ditself(json_values, date_modified, modified_by) VALUES ('$jsonGot',NOW(),'$user')";
    if ($conn->query($sql) === TRUE) {
        echo '<div style="margin-top:10px" class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> The questions to serve have been saved!
        </div>';
    } else {
        echo '<div style="margin-top:10px" class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Couldn\'t Complete request!</strong> An error occured. '.$conn->error.'
        </div>';
    }
}
else{
    echo '<div style="margin-top:80px" class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Couldn\'t Complete request!</strong> An error occured. You might need to sign in or not all details were not provided.
</div>';
}
