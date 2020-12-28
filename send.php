<?php 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $officerid = $_POST['officerid'];
        $deptcode = $_POST['deptcode'];
        $countrycode = $_POST['countrycode'];
        $badgenumber = $_POST['badgenumber'];
        if(!empty($officerid) || !empty($deptcode) || !empty($countrycode) || !empty($badgenumber)){
            $host = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbname = "criminalrecord";

            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

            if(mysqli_connect_error()){
                die('Connetion Error('.mysqli_connect_error().')' .mysqli_connect_error());
            }
            else{
                $SELECT = "SELECT officerid from criminalrecord where officerid =? Limit 1";
            
                $INSERT= "INSERT INTO `officer` (`OfficerId`, `DeptCode`, `CountryCode`, `BadgeNo`) VALUES ('$officerid','$deptcode', '$countrycode','$badgenumber')";

                $stmt = $conn->prepare($SELECT);
                $stmt->bind_param("i",$officerid);
                $stmt->execute();
                $stmt->bind_result($officerid);
                $stmt->store_result();
                $rnum = $stmt->num_rows;

                if($rnum==0){
                    $stmt->close();
                    $stmt= $conn->prepare($INSERT);
                    $stmt->bind_param("issi",$officerid,$deptcode,$countrycode,$badgenumber);
                    $stmt->execute();
                    echo "Signin Sucessfull";
                }
                else{
                    echo "Your account already exists!!";
                }
                $stmt->close();
                $conn->close();
            }
        }
    
    }


    
?>