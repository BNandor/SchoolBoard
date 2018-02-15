<?php
include("connection.php");
include ('includes/functions_Class.php');
$table='`XII.B_test_user@gmail.com`';
$columns=get_columns($table,$db);



foreach($columns as $column){
                 
      if (strpos($column, 'Name') === false && strpos($column, 'final') === false ){
              
         
         
        $sql="SELECT `Name` FROM $table ";

        $result_names = mysqli_query($db,$sql);

         while ($row = mysqli_fetch_assoc($result_names)) {
                 $random_grade=rand(5,10);
                 update_table($table,$column," ",$random_grade,'`Name`',$row['Name'],$db);
                
                
                
                
                 /*if(strpos($column, 'Name') !== false){
                                 $new_name=preg_replace('/[0-9]+/', ' ', $row['Name']);
                                 
                                 $sql="UPDATE $table SET `Name`= '".$new_name."'WHERE `Name`='".$row['Name']."'";
                                echo $sql."<br>";
                 mysqli_query($db,$sql);
                 
                 }*/
                                                         }
         }
                                }

?>