
<?php 
 //include ("check.php");


function check_if_present( $table, $Search_Column, $Search_term, $connection){
$SQL = "SELECT * FROM $table";
//Result of query
$result = mysqli_query($connection,$SQL);



while ( $db_field = mysqli_fetch_assoc($result) ){


if( $db_field[$Search_Column] ==$Search_term){
return true;
		}
	}
return false;
}
function insert_into_table($table,$Columns,$Values,$connection,$database_name){
$imploded_col=implode(",",$Columns);
$imploded_val=implode(",",$Values);
$sql = "INSERT INTO $table ".
       "($imploded_col) ".
       "VALUES ".
       "($imploded_val)";
       
mysqli_select_db($connection,$database_name);

//Insert into database


return $retval = mysqli_query( $connection,$sql );



}

function echo_table_grades($table,$Columns,$connection){
$table_name_without_username=str_replace("_".$_SESSION['username'],"",$table);

//Select the table
$SQL = "SELECT * FROM $table";
//Result of query
$result = mysqli_query($connection,$SQL);

//Print coulmns
?>


<br>
<div class="table-title">
<h2><?php echo "$table_name_without_username  ";?> -Grades</h2>
</div>

<table class="table-fill">

<thead>
<tr>
<?php foreach($Columns as $element){ 

         if (strpos($element, '_final') == false) { ?>
              <th class="text-left"><?php echo" $element"; ?></th>
                                              
                                              <?php }  
                                              } ?>    
</tr>
</thead>


                <tbody class="table-hover">
                        <?php while ( $db_field = mysqli_fetch_assoc($result) ){ ?>

                        <tr>

                            <?php foreach($Columns as $element){ 
                              if (strpos($element, '_final') == false) { ?>
    
                                <td class="text-left"><?php echo "$db_field[$element]"; ?></td>
                               <?php } }?>
   
                         </tr>      
 
                         <?php } ?>
                </tbody>
        </table>


<?php
        
}
function echo_table_finals($table,$Columns,$connection){
$table_name_without_username=str_replace("_".$_SESSION['username'],"",$table);

//Select the table
$SQL = "SELECT * FROM $table";
//Result of query
$result = mysqli_query($connection,$SQL);

//Print coulmns
?>


<br>
<div class="table-title">
<h2><?php echo "$table_name_without_username  ";?> -Finals</h2>
</div>

<table class="table-fill">

<thead>
<tr>
<?php foreach($Columns as $element){ 

         if (strpos($element, '_final') !== false||strpos($element, 'Name') !== false) { ?>
              <th class="text-left"><?php echo" $element"; ?></th>
                                              
                                              <?php }  
                                              } ?>    
</tr>
</thead>


                <tbody class="table-hover">
                        <?php while ( $db_field = mysqli_fetch_assoc($result) ){ ?>

                        <tr>

                            <?php foreach($Columns as $element){ 
                              if (strpos($element, '_final') !== false||strpos($element, 'Name') !== false) { ?>
    
                                <td class="text-left"><?php echo "$db_field[$element]"; ?></td>
                               <?php } }?>
   
                         </tr>      
 
                         <?php } ?>
                </tbody>
        </table>


<?php
        
}
function echo_table_average($table,$Columns,$connection){
$SQL = "SELECT * FROM $table";
$table_name_without_username=str_replace("_".$_SESSION['username'],"",$table);
//Result of query
$result = mysqli_query($connection,$SQL);
?>

<br>
<div class="table-title">
<h2><?php echo "$table_name_without_username ";?> -Average</h2>
</div>

<table class="table-fill">

<thead>
<tr>
<?php foreach($Columns as $element){ 
if (strpos($element, '_final') == false) { ?>
              <th class="text-left"><?php echo" $element"; ?></th>
<?php } }?>    
</tr>
</thead>


                <tbody class="table-hover">
                        <?php while ( $db_field = mysqli_fetch_assoc($result) ){ ?>
                         
                        <tr>
                          <td class="text-left"><?php echo htmlspecialchars($db_field[$Columns[0]]);?></td>
                            <?php foreach(array_slice($Columns,1) as $element){
                            if (strpos($element, '_final') == false) { 
                                      $hasfinal=get_column_value( "`"."s_".$_SESSION['username']."`","Subject", $element,"Final", $connection);
                                        if($hasfinal=="yes"){
                                        $arr = array_filter(explode(' ',$db_field[$element]));
                                        $avg=0;
                                        if(sizeof($arr)!=0 && array_sum(array_filter(explode(' ',$db_field[$element."_final"])))!=0){
                                        $avg=((array_sum($arr)/sizeof($arr))*3+array_sum(array_filter(explode(' ',$db_field[$element."_final"]))))/4;
                                         }else $avg="---";}
                                         else{
                                         $arr = array_filter(explode(' ',$db_field[$element]));
                                        $avg=0;
                                        if(sizeof($arr)!=0){
                                        $avg=array_sum($arr)/sizeof($arr);
                                         }else $avg="---";}
                                         ?> 
    
                             <td class="text-left"> <?php  echo htmlspecialchars($avg); ?></td>
                               <?php }}?>
                           
                         </tr>      
 
                         <?php } ?>
                </tbody>
        </table>
  

  




<?php
if (!$result) {
        echo 'MySQL Error: ' . mysqli_error($result);
        exit;
    }
    

}
function update_table($table,$Update_Column,$spacer,$Update_value,$Where_Column,$search_value,$connection){

$sql = "UPDATE $table SET $Update_Column=CONCAT(trim($Update_Column),'"."$spacer".$Update_value."') WHERE $Where_Column='$search_value'";
$result = mysqli_query($connection,$sql);

if($result){
echo $table."-updated succesfully";
}
else{echo "Something went wrong with the update_table";}
}



function delete_from_table($table,$Delete_column,$Delete_value,$Where_Column,$search_value,$connection){
$srchstr="NOTFOUND";
$sql = "SELECT * FROM  $table ";
$result1 = mysqli_query($connection,$sql);

while($db_field = mysqli_fetch_assoc($result1)){

if($db_field[$Where_Column]==$search_value){
$srchstr=$db_field[$Delete_column];
}
}
$srchstr_copy=$srchstr;
$delete_vaue_with_spacer=" ".$Delete_value;
$srchstr=implode(' ', explode($Delete_value, $srchstr, 2));
if($srchstr_copy==$srchstr){echo "Error not found ";return false;}
$srchstr=preg_replace('/\s+/', ' ',$srchstr);
$sql2 = "UPDATE $table SET  $Delete_column='$srchstr' WHERE $Where_Column='$search_value'";


$result2 = mysqli_query($connection,$sql2);
if($result2){
return true;
}
else{echo "Something went wrong with the delete_from_table";return false;}
}


function get_columns($table,$connection){
$result_column_names = mysqli_query($connection,"SHOW COLUMNS FROM $table");
$t_column=array();
//if (mysql_num_rows($result_column_names) > 0) {
    while ($row = mysqli_fetch_assoc($result_column_names)) {
       array_push($t_column,$row['Field']);
    }
    
    
//}

return $t_column;
}
function add_column($table,$column_name,$datatype,$connection){

$sql="ALTER TABLE $table ADD $column_name $datatype ";
$result = mysqli_query($connection,$sql);
mysqli_query($connection,"UPDATE $table SET $column_name = ' '");
return $result;
}
function delete_column($table,$column_name,$connection){

$sql="ALTER TABLE $table DROP COLUMN $column_name  ";
return $result = mysqli_query($connection,$sql);

}
function add_row($table,$Columns,$Values,$connection,$database_name){

$imploded_col=implode("`,`",$Columns);
$imploded_val=implode("','",$Values);



$sql = "INSERT INTO $table ("."`".$imploded_col."`".") VALUES ("."'".$imploded_val."'".")";
       
mysqli_select_db($connection,$database_name);

//Insert into database


return $retval = mysqli_query( $connection,$sql  );


}
function delete_row($table,$Where_Column,$Where_Value,$connection){




$sql = "DELETE FROM $table WHERE $Where_Column='$Where_Value' ";
       


//Insert into database


return $retval = mysqli_query( $connection,$sql  );


}
function create_table($table_name,$connection,$DB_USERNAME){

$sql="CREATE TABLE `$DB_USERNAME`.`$table_name` ( `Name` TEXT NOT NULL   ) ENGINE = MyISAM";
 $result = mysqli_query($connection,$sql);
 mysqli_query($connection,"INSERT INTO `$table_name` (`name`) VALUES ('name')");
return $result;
}
function make_user_s_table($table_name,$connection,$DB_USERNAME){

$sql="CREATE TABLE `$DB_USERNAME`.`$table_name` ( `Subject` TEXT NOT NULL , `Password` TEXT NOT NULL , `Final` TEXT NOT NULL  ) ENGINE = MyISAM";
 $result = mysqli_query($connection,$sql);
 //mysqli_query($connection,"INSERT INTO `$table_name` (`Subject`, `Password`) VALUES ('sample', 'sample1234')");
return $result;
}
function make_user_t_table($table_name,$connection,$DB_USERNAME){

$sql="CREATE TABLE `$DB_USERNAME`.`$table_name` ( `Table` TEXT NOT NULL , `Password` TEXT NOT NULL  ) ENGINE = MyISAM";
 $result = mysqli_query($connection,$sql);
 //mysqli_query($connection,"INSERT INTO `$table_name` (`Table`, `Password`) VALUES ('sample', 'sample1234')");
return $result;
}
function make_user_l_table($table_name,$connection,$DB_USERNAME){

$sql="CREATE TABLE `$DB_USERNAME`.`$table_name` ( `Date` DATE NOT NULL , `Log` TEXT NOT NULL  ) ENGINE = MyISAM";
 $result = mysqli_query($connection,$sql);
 //mysqli_query($connection,"INSERT INTO `$table_name` (`Table`, `Password`) VALUES ('sample', 'sample1234')");
return $result;
}
function delete_table($table_name,$connection){


return $result=mysqli_query($connection,"DROP TABLE `$table_name`");

}
function get_rows($table,$Where_Column,$connection){
$row=array();
$sql = "SELECT * FROM  $table ";
$result1 = mysqli_query($connection,$sql);

while($db_field = mysqli_fetch_assoc($result1)){

$row[]=$db_field[$Where_Column];


}
return $row;
}
function get_column_value( $table, $Search_Column, $Search_term,$Return_Column, $connection){
$SQL = "SELECT * FROM $table";
//Result of query
$result = mysqli_query($connection,$SQL);



while ( $db_field = mysqli_fetch_assoc($result) ){


if( $db_field[$Search_Column] ==$Search_term){
return $db_field[$Return_Column];
		}
	}
 

}
function insert_log($table,$action,$connection,$GMT,$database_name){

$timezones = array( 
        '-12'=>'Pacific/Kwajalein', 
        '-11'=>'Pacific/Samoa', 
        '-10'=>'Pacific/Honolulu', 
        '-9'=>'America/Juneau', 
        '-8'=>'America/Los_Angeles', 
        '-7'=>'America/Denver', 
        '-6'=>'America/Mexico_City', 
        '-5'=>'America/New_York', 
        '-4'=>'America/Caracas', 
        '-3.5'=>'America/St_Johns', 
        '-3'=>'America/Argentina/Buenos_Aires', 
        '-2'=>'Atlantic/Azores',// no cities here so just picking an hour ahead 
        '-1'=>'Atlantic/Azores', 
        '0'=>'Europe/London', 
        '1'=>'Europe/Paris', 
        '2'=>'Europe/Helsinki', 
        '3'=>'Europe/Moscow', 
        '3.5'=>'Asia/Tehran', 
        '4'=>'Asia/Baku', 
        '4.5'=>'Asia/Kabul', 
        '5'=>'Asia/Karachi', 
        '5.5'=>'Asia/Calcutta', 
        '6'=>'Asia/Colombo', 
        '7'=>'Asia/Bangkok', 
        '8'=>'Asia/Singapore', 
        '9'=>'Asia/Tokyo', 
        '9.5'=>'Australia/Darwin', 
        '10'=>'Pacific/Guam', 
        '11'=>'Asia/Magadan', 
        '12'=>'Asia/Kamchatka' 
    ); 
date_default_timezone_set($timezones[$GMT]);

$time=date("Y:m:d:h:i:sa");
echo $time;

$sql = "INSERT INTO $table (`Date`, `Log`) VALUES ('$time', '$action')";
       
mysqli_select_db($connection,$database_name);

//Insert into database


return $retval = mysqli_query( $connection,$sql  );
}
function get_average( $table, $NAMES_COLUMN, $name,$subject,$hasfinal, $connection){

if($hasfinal=="no"){

$SQL = "SELECT * FROM $table";
//Result of query
$result = mysqli_query($connection,$SQL);
$grades_string="not found";


while ( $db_field = mysqli_fetch_assoc($result) ){


if( $db_field[$NAMES_COLUMN] ==$name){
 $grades_string=$db_field[$subject];
		}
	}
$arr = array_filter(explode(' ', $grades_string));
$avg=0;
 if(sizeof($arr)!=0){
$avg=array_sum($arr)/sizeof($arr);        
        }
 return $avg;     

 }
 else{
 $SQL = "SELECT * FROM $table";
//Result of query
$result = mysqli_query($connection,$SQL);
$grades_string="not found";
$final_string="not found";

while ( $db_field = mysqli_fetch_assoc($result) ){


if( $db_field[$NAMES_COLUMN] ==$name){
 $grades_string=$db_field[$subject];
 $final_string=$db_field[$subject."_final"];
		}
	}
  $arr = array_filter(explode(' ',$grades_string));
  $avg=0;
  if(sizeof($arr)!=0 && array_sum(array_filter(explode(' ',$final_string)))!=0){
   $avg=((array_sum($arr)/sizeof($arr))*3+array_sum(array_filter(explode(' ',$final_string))))/4;
                                        }
 
 return $avg;
 
 
 
 
 
 }

}
function registered($username,$password,$db){
if(empty($username) || empty($password))
		{
			return false;
		}
		else{
			
			

			// To protect from MySQL injection
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($db, $username);
			$password = mysqli_real_escape_string($db, $password);
			//$password = md5($password);
			
			//Check username and password from database
			$sql="SELECT uid FROM users WHERE username='$username' and password='$password'";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			
			if(mysqli_num_rows($result) == 1)
			{
				return true; // Redirecting To Other Page
			}else
			{
				return false;
			}

		}
                
                }
?>
