<?php 


function get_UserData($user_id)
{
    include('../require/config.php');
        
    $sql = "SELECT * FROM Users WHERE USER_ID = $user_id";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {

            $User_Name = $row["USER_NAME"];

            $Full_Name = $row["FULL_NAME"];

            $Profile_Picture = $row["IMAGE"];

            $user_id = $row["User_ID"];

            $data_array = array($User_Name, $Full_Name, $Profile_Picture,$user_id);

            return $data_array;
        }
    }else 
    {
        return 0;
    }
    
    $conn->close();
    
}
?>