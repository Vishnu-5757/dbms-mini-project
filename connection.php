<?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "criminalrecord";

        $conn = mysqli_connect($servername,$username,$password,$dbname);
        if($conn){
            //echo "Connectiom Ok";
        }
        else{
            echo "Connection Failed".mysqli_connect_error();
        }
        $offid=$_POST['officerid'];
        $dcode=$_POST['deptcode'];
        $cc=$_POST['countrycode'];
        $bn=$_POST['badgenumber'];

        $query="INSERT INTO officer VALUES('$offid','$dcode','$cc','$bn')";
        $data=mysqli_query($conn,$query);

        if($data){
            echo "Data inserted into database";
        }
        else{
            echo"Failed to insert Data into Database";
        }
    
?>