<?php
    include("config.php");

    /* Set internal character encoding to UTF-8 */
    mb_internal_encoding("UTF-8");

    //$data = array();

    //$data['status'] = 'err';
    //$data['result'] = 'varmland';

    //returns data as JSON format
    //echo json_encode($data);

    //get user data from the database
    //$sql = "SELECT * FROM todos";
    //$result = mysqli_query($db,$sql);

    //$todos = array();
    //while($row =mysqli_fetch_assoc($result))
    //{
     //   $todos[] = $row;
    //}

    //echo json_encode($todos);

    $myObj = new stdClass();

    $myObj->name = "John Öåäman";
    $myObj->age = 30;
    $myObj->city = "New York";

    $myJSON = json_encode($myObj);

    echo $myJSON;
?>