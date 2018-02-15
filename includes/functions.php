<?php 
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
function insert_into_table($table,$Column_1,$Column_2,$value_1,$value_2,$connection,$database_name){

$sql = "INSERT INTO $table ".
       "($Column_1,$Column_2) ".
       "VALUES ".
       "('$value_1','$value_2')";
       
mysqli_select_db($connection,$database_name);

//Insert into database


$retval = mysqli_query( $connection,$sql );

return $retval;

}

function echo_table($table,$column_1,$column_2,$connection){
$SQL = "SELECT * FROM $table";
//Result of query
$result = mysqli_query($connection,$SQL);
?>
<br>
<table border="5" cellspacing="2" cellpadding="2">
<tr>
        <td width=250>
              <?php print  $column_1; ?>
        </td>
        <td width=250>
              <?php print  $column_2; ?>
        </td>
</tr>
</table>


<?php

while ( $db_field = mysqli_fetch_assoc($result) ){
?>
<table border="2" cellspacing="2" cellpadding="2">
<tr>
        <td width=250>
                <?php print  $db_field[$column_1]; ?>
        </td>
        <td width=250>
                <?php print $db_field[$column_2]; ?>
        </td>
</tr>
</table>

<?php
        }
}

function update_table($table,$Update_Column,$Update_value,$Where_Column,$search_value,$connection){

$sql = "UPDATE $table SET $Update_Column='$Update_value' WHERE $Where_Column='$search_value'";
$result = mysqli_query($connection,$sql);

if($result){
echo $table."-updated succesfully";
}
else{echo "Something went wrong";}
}
function delete_from_table($table,$Delete_column,$where_value,$connection){

$sql = "DELETE FROM $table WHERE $Delete_column='$where_value'";
return $result=mysqli_query($connection,$sql);

}
?>
