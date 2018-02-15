<?php 

include("connection.php");
include ("mobile_functions.php");



if((isset($_POST["add"])||isset($_POST["delete"])||isset($_POST["submit"])||isset($_POST["tellme_table"])||isset($_POST["tellme_names"])||isset($_POST["tellme_subjects"])||isset($_POST["tellme_grades"])||isset($_POST['newtable'])||isset($_POST['deltable'])||isset($_POST['newname'])||isset($_POST['delname'])) && registered($_POST["username"],$_POST["password"],$db)){

if(isset($_POST["submit"])){
echo "in";
}
else{
$user_check=$_POST["username"];
$timezone = $_POST['timezone'];
$gmt_stamp = filter_var($timezone, FILTER_SANITIZE_NUMBER_INT);




if(isset($_POST['table']))$Columns=get_columns("`".$_POST['table']."_".$_POST['username']."`",$db);

$table = "`".$_POST['table']."_".$_POST["username"]."`";
if(! get_magic_quotes_gpc() )
{
  $name = addslashes ($_POST['name']);
   $subject = addslashes ($_POST['subject']);
   $grade =  addslashes ($_POST['grade']);
}

else
{
   $name = $_POST['name'];
   $subject= $_POST['subject'];
   $grade= $_POST['grade'];
}





if(isset($_POST['add'])){
echo "add";

$subject_password=stripslashes($_POST['subject_password']);
$subject_password=mysqli_real_escape_string($db,$subject_password);
$subject_password = md5($subject_password);
if(!in_array($subject,$Columns)){
echo "error:incorrect subject";

}else {echo "Correct Subject";}

if(!check_if_present($table,$Columns[0],$name,$db)){
	echo "error : incorrect name ";
	
}else echo "Correct Name";
if($grade >10||$grade <0){

echo "error:incorrect grade(<0||>10)";
}
else {echo "Correct Grade";}


if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $subject)||preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $subject_password)){
echo "error : No special characters (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/) allowed !";
}
elseif(empty($subject_password)||$subject_password!=get_column_value( "`"."s_".$user_check."`","Subject",$subject,"Password", $db)){
echo "error : Incorrect password ";}
else{
$hasfinal=get_column_value( "`"."s_".$_POST['username']."`","Subject", $subject,"Final", $db);
if(isset($_POST['final_grade'])&&$hasfinal=="yes"){
update_table($table,$subject."_final"," ",$grade,"`".$Columns[0]."`",$name,$db);
insert_log("`"."l_".$_POST['username']."`","+f ".$grade." to ".$subject."-".$name." ".str_replace("`","",str_replace("_".$_POST['username'],"",$table)),$db,$gmt_stamp,DB_DATABASE);}
else{
update_table($table,$subject," ",$grade,"`".$Columns[0]."`",$name,$db);
insert_log("`"."l_".$_POST['username']."`","+  ".$grade." to ".$subject."-".$name." ".str_replace("`","",str_replace("_".$_POST['username'],"",$table)),$db,$gmt_stamp,DB_DATABASE);}
}

}elseif(isset($_POST['delete'])){
$subject_password=stripslashes($_POST['subject_password']);
$subject_password=mysqli_real_escape_string($db,$subject_password);
$subject_password = md5($subject_password);
if(!in_array($subject,$Columns)){
echo "error :Subject ".$subject."Not defined";

}else {echo "Correct Subject";}

if(!check_if_present($table,$Columns[0],$name,$db)){
	echo "error :Name ".$name."-not found ";
	
}else echo "Correct Name";
if($grade >10||$grade <0){

echo "The grade ".$grade."is not correct";
}
else {echo "Correct Grade";}



if(empty($subject_password)||$subject_password!=get_column_value( "`"."s_".$user_check."`","Subject",$subject,"Password", $db)){
echo "error:Incorrect password ";}
else{
$hasfinal=get_column_value( "`"."s_".$user_check."`","Subject", $subject,"Final", $db);
if(isset($_POST['final_grade'])&&$hasfinal=="yes"){
if(delete_from_table($table,$subject."_final",$grade,$Columns[0],$name,$db)){
echo "Grade ".$grade." Deleted Succesfully";
insert_log("`"."l_".$user_check."`","-f ".$grade." from ".$subject."-".$name." ".str_replace("`","",str_replace("_".$user_check,"",$table)),$db,$gmt_stamp,DB_DATABASE);
}
else {echo "error :Grade ".$grade." was not deleted ):";}

}
elseif(delete_from_table($table,$subject,$grade,$Columns[0],$name,$db)){
echo "Grade ".$grade." Deleted Succesfully";
insert_log("`"."l_".$user_check."`","- ".$grade." from ".$subject."-".$name." ".str_replace("`","",str_replace("_".$user_check,"",$table)),$db,$gmt_stamp,DB_DATABASE);

}else {echo "error :Grade ".$grade." was not deleted ):";}


}

}
elseif(isset($_POST["tellme_table"])){

$table_arr=array();
$forjson=array();
$table_arr=get_rows("`t_".$user_check."`","Table",$db);
foreach($table_arr as $table_name ){
$temp=array("name"=>$table_name);
array_push($forjson,$temp);

}
echo json_encode($forjson);
}elseif(isset($_POST["tellme_names"])){

$names_arr=array();
$forjson=array();
$names_arr=get_rows("`".$_POST["tellme_names_from_table"]."_".$user_check."`","Name",$db);
foreach($names_arr as $names_name ){
$temp=array("name"=>$names_name);
array_push($forjson,$temp);
}
echo json_encode($forjson);
}elseif(isset($_POST["tellme_subjects"])){

$subjects_arr=array();
$forjson=array();
$subjects_arr=$Columns;
foreach($subjects_arr as $subject_name ){
$temp=array("name"=>$subject_name);
array_push($forjson,$temp);

}
echo json_encode($forjson);
}elseif(isset($_POST['newtable'])){

$table_arr=get_rows("`t_".$user_check."`","Table",$db);

if(empty($_POST['new_table_name'])||empty($_POST['new_table_pass'])){
echo "error: Empty field!";
}elseif(in_array($_POST['new_table_name'],$table_arr)){
echo "error: table already present ";}
elseif(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['new_table_name'])||preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['new_table_pass'])){
echo "error: No special characters (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/) allowed !";
}elseif(strlen($_POST['new_table_pass'])<10){
echo "error: Password must contain a minimum of 10 characters ";}
else {
$table_name=stripslashes($_POST['new_table_name']);
$table_name=mysqli_real_escape_string($db,$table_name);

$table_pass=stripslashes($_POST['new_table_pass']);
$table_pass=mysqli_real_escape_string($db,$table_pass);
$table_pass = md5($table_pass);
$table_header=array("Table","Password");
$table_values=array($table_name,$table_pass);
add_row("`"."t_".$user_check."`",$table_header,$table_values,$db,$gmt_stamp,DB_DATABASE);
if(create_table($table_name."_".$user_check,$db,DB_DATABASE)){
insert_log("`"."l_".$user_check."`","created table - ".$table_name,$db,$gmt_stamp,DB_DATABASE);
array_push($table_arr,$table_name);
echo "table ".$table_name." created succesfully ";}
}

}elseif(isset($_POST['deltable'])){
$table_arr=get_rows("`t_".$user_check."`","Table",$db);


if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['table_name'])||preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['table_pass'])){
echo "error :No special characters (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/) allowed !";
}else{
$table_name=stripslashes($_POST['table_name']);
$table_name=mysqli_real_escape_string($db,$table_name);


$table_pass=stripslashes($_POST['table_pass']);
$table_pass=mysqli_real_escape_string($db,$table_pass);
$table_pass = md5($table_pass);
if(empty($table_name)||empty($table_pass)){
echo "error:Empty field";
}
else {

if($table_pass!=get_column_value( "`"."t_".$user_check."`","Table",$table_name,"Password", $db)){
echo "error:Incorrect password ";}
 elseif(delete_table($table_name."_".$user_check,$db)){
 echo "deleted table !";
 
 delete_row("`"."t_".$user_check."`","`Table`",$table_name,$db);


 $index = array_search($table_name, $table_arr);
	if ( $index !== false ) {
           
		unset( $table_arr[$index] );
	}
insert_log("`"."l_".$user_check."`","deleted table - ".$table_name,$db,$gmt_stamp,DB_DATABASE);
 echo "\ntable ".$table_name." was deleted succesfully ";}

}

}

}elseif(isset($_POST['newname'])){


$table="`".$_POST["table_name"]."_".$user_check."`";
$Columns=get_columns($table,$db);
if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['table_pass'])){echo "error :No special characters allowed (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/)";}
else{
$table_pass=stripslashes($_POST['table_pass']);
$table_pass=mysqli_real_escape_string($db,$table_pass);
$table_pass=md5($table_pass);

if(empty($table_pass)){
echo "error: Empty field";
}
}
if($table_pass!=get_column_value( "`"."t_".$user_check."`","Table",$_POST["table_name"],"Password", $db)){
echo "error: Incorrect password ";}
else{
$row_name= stripslashes($_POST['newname_name']);
$row_name=mysqli_real_escape_string($db,$row_name);
if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $row_name)){echo "error :No special characters allowed (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/)";}


elseif(check_if_present($table, $Columns[0],$row_name , $db)){

echo "error :Name already present ";


}else 
{

echo "-Not present ";
$Values=array_fill(0, count($Columns),' ');
$Values[0]=$row_name;




if(add_row($table,$Columns,$Values,$db,$dbuser)){
$names[]=$row_name;
echo "Successfully added a new row ";
insert_log("`"."l_".$user_check."`","added row - ".$row_name."   in ".str_replace("`","",str_replace("_".$user_check,"",$table)),$db,$gmt_stamp,DB_DATABASE);
}

}}
}elseif(isset($_POST['delname'])){
$table="`".$_POST["table_name"]."_".$user_check."`";
$Columns=get_columns($table,$db);
if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['table_pass'])){echo "No special characters allowed (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/)";}
else{
$table_pass=stripslashes($_POST['table_pass']);
$table_pass=mysqli_real_escape_string($db,$table_pass);
$table_pass=md5($table_pass);

if(empty($table_pass)){
echo "Empty field";
}
}
if($table_pass!=get_column_value( "`"."t_".$user_check."`","Table",$_POST["table_name"],"Password", $db)){
echo "Incorrect password ";}
else{
$row_name= stripslashes($_POST['delname_name']);
$row_name=mysqli_real_escape_string($db,$row_name);
if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $row_name)){echo "No special characters allowed (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/)";}


elseif(!check_if_present($table, $Columns[0],$row_name , $db)){

echo "Coludn't fetch row to delete ";


}else 
{

echo "Present ";




if(delete_row($table,$Columns[0],$row_name,$db)){
echo "Successfully deleted row ";
insert_log("`"."l_".$user_check."`","deleted row - ".$row_name."   in ".str_replace("`","",str_replace("_".$user_check,"",$table)),$db,$gmt_stamp,DB_DATABASE);
}
}
}

}elseif(isset($_POST["tellme_grades"])){

$grades_text=get_column_value( "`".$_POST['table']."_".$_POST['username']."`", "Name", $_POST["name_name"],$_POST["subject"], $db);

echo $grades_text;





}


}}











?>