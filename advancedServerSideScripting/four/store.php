<?php require('./dbconnection.php');

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            
           $inputFieldValue = $_POST["thought"];

            $sqlStatement = "INSERT INTO `randomthoughts`(`thought`) VALUES ('$inputFieldValue')";
            if($conn->query($sqlStatement) === TRUE){
                 $statusResult = array("status"=>"success");
                 echo json_encode($statusResult);
            }else{
                $statusResult = array("status","fail");
                echo json_encode($statusResult);
            }

           
        }
    


?>