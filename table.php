<?php 
include("check.php");
include ("connection.php");
include ("includes/functions_Class.php");

$dbhost = 'fdb14.biz.nf';
$dbuser = '2103967_base5';
$dbpass = 'GYR697zzc';


 
//echo "Current table is ".$table;
//echo "With tthese columns ".print_r($Columns);


if(isset($_GET['table'])){
echo "Got Table!";
$_SESSION["table"] = "`".$_GET['table']."_".$user_check."`";
echo "showing table ".$_SESSION["table"];
$_SESSION["Columns"]=get_columns($_SESSION["table"],$db);
$_SESSION["gmt_stamp"]=$_GET['gmt_stamp'];
echo "gmt_stamp=".$_SESSION["gmt_stamp"];
}
$table=$_SESSION["table"];
$Columns=$_SESSION["Columns"];
$gmt_stamp=$_SESSION["gmt_stamp"];
$names=get_rows($table,$Columns[0],$db);
$subject_arr=get_rows("`s_".$user_check."`","Subject",$db);
$show = "grades";




if(isset($_POST['table'])||isset($_POST['add'])||isset($_POST['Update'])||isset($_POST['Delete'])||isset($_POST['Average'])||isset($_POST['Grades'])||isset($_POST['Finals'])||isset($_POST['add_col'])||isset($_POST['del_col'])||isset($_POST['add_row'])||isset($_POST['del_row'])){ 


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
$subject_password=stripslashes($_POST['subject_password']);
$subject_password=mysqli_real_escape_string($db,$subject_password);
$subject_password = md5($subject_password);
if(!in_array($subject,$Columns)){
echo "Subject ".$subject."Not defined";
goto present_page;
}else {echo "Correct Subject";}

if(!check_if_present($table,$Columns[0],$name,$db)){
	echo "Name ".$name."-not found ";
	goto present_page;
}else echo "Correct Name";
if($grade >10||$grade <0){

echo "The grade ".$grade."is not correct";
goto present_page;}
else {echo "Correct Grade";}


if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $subject)||preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $subject_password)){
echo "No special characters (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/) allowed !";
}
elseif(empty($subject_password)||$subject_password!=get_column_value( "`"."s_".$user_check."`","Subject",$subject,"Password", $db)){
echo "Incorrect password ";goto present_page;}
else{
$hasfinal=get_column_value( "`"."s_".$user_check."`","Subject", $subject,"Final", $db);
if(isset($_POST['final_grade'])&&$hasfinal=="yes"){
update_table($table,$subject."_final"," ",$grade,"`".$Columns[0]."`",$name,$db);
insert_log("`"."l_".$user_check."`","+f ".$grade." to ".$subject."-".$name." ".str_replace("`","",str_replace("_".$user_check,"",$table)),$db,$gmt_stamp,DB_DATABASE);}
else{
update_table($table,$subject," ",$grade,"`".$Columns[0]."`",$name,$db);
insert_log("`"."l_".$user_check."`","+  ".$grade." to ".$subject."-".$name." ".str_replace("`","",str_replace("_".$user_check,"",$table)),$db,$gmt_stamp,DB_DATABASE);}
}
}

elseif(isset($_POST['Delete'])){
$subject_password=stripslashes($_POST['subject_password']);
$subject_password=mysqli_real_escape_string($db,$subject_password);
$subject_password = md5($subject_password);
if(!in_array($subject,$Columns)){
echo "Subject ".$subject."Not defined";
goto present_page;
}else {echo "Correct Subject";}

if(!check_if_present($table,$Columns[0],$name,$db)){
	echo "Name ".$name."-not found ";
	goto present_page;
}else echo "Correct Name";
if($grade >10||$grade <0){

echo "The grade ".$grade."is not correct";
goto present_page;}
else {echo "Correct Grade";}



if(empty($subject_password)||$subject_password!=get_column_value( "`"."s_".$user_check."`","Subject",$subject,"Password", $db)){
echo "Incorrect password ";goto present_page;}
else{
$hasfinal=get_column_value( "`"."s_".$user_check."`","Subject", $subject,"Final", $db);
if(isset($_POST['final_grade'])&&$hasfinal=="yes"){
if(delete_from_table($table,$subject."_final",$grade,$Columns[0],$name,$db)){
echo "Grade ".$grade." Deleted Succesfully";
insert_log("`"."l_".$user_check."`","-f ".$grade." from ".$subject."-".$name." ".str_replace("`","",str_replace("_".$user_check,"",$table)),$db,$gmt_stamp,DB_DATABASE);
}
else {echo "Grade ".$grade." was not deleted ):";}

goto present_page;}
elseif(delete_from_table($table,$subject,$grade,$Columns[0],$name,$db)){
echo "Grade ".$grade." Deleted Succesfully";
insert_log("`"."l_".$user_check."`","- ".$grade." from ".$subject."-".$name." ".str_replace("`","",str_replace("_".$user_check,"",$table)),$db,$gmt_stamp,DB_DATABASE);
goto present_page;
}else {echo "Grade ".$grade." was not deleted ):";}


}

}
elseif(isset($_POST['Average'])){
$show="averages";

goto present_page;
}
elseif(isset($_POST['Finals'])){
$show="finals";

goto present_page;
}
elseif(isset($_POST['Grades'])){
$show="grades";

goto present_page;
}
elseif(isset($_POST['add_col'])){

$column_name= $_POST['column'];


if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['table_pass_col'])){echo "No special characters allowed (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/)";}
else{
$table_pass=stripslashes($_POST['table_pass_col']);
$table_pass=mysqli_real_escape_string($db,$table_pass);
$table_pass=md5($table_pass);

if(empty($table_pass)){
echo "Empty field";
}
}
if($table_pass!=get_column_value( "`"."t_".$user_check."`","Table",str_replace("`","",str_replace("_".$user_check,"",$table)),"Password", $db)){
echo "Incorrect password ";}
elseif(in_array($column_name,$Columns)){
echo "Column ".$column_nam." is already present in the table ";
}
elseif(add_column($table,$column_name,"text",$db)){
//echo "Column ".$column_name." added succesfully";
$hasfinal=get_column_value( "`"."s_".$user_check."`","Subject", $column_name,"Final", $db);
if($hasfinal=="yes"){
add_column($table,$column_name."_final","text",$db);
}
insert_log("`"."l_".$user_check."`","added column - ".$column_name."   in ".str_replace("`","",str_replace("_".$user_check,"",$table)),$db,$gmt_stamp,DB_DATABASE);
$Columns=get_columns($table,$db);
$_SESSION["Columns"]=$Columns;
//goto present_page;

}else{echo " Something went wrong when trying to add column ";}


}
elseif(isset($_POST['del_col'])){

$column_name= $_POST['column'];
if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['table_pass_col'])){echo "No special characters allowed (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/)";}
else{
 $table_pass=$_POST['table_pass_col'];

$table_pass=md5($table_pass);


if(empty($table_pass)){
echo "Empty field";
}
}
if($table_pass!=get_column_value( "`"."t_".$user_check."`","Table",str_replace("`","",str_replace("_".$user_check,"",$table)),"Password", $db)){
echo "Incorrect password ";}
elseif(!in_array($column_name,$Columns)){
echo "Column ".$column_nam." is not present in the table ";
}
elseif(delete_column($table,$column_name,$db)){
echo "Column ".$column_name." deleted succesfully";
$hasfinal=get_column_value( "`"."s_".$user_check."`","Subject", $column_name,"Final", $db);
if($hasfinal=="yes"){
delete_column($table,$column_name."_final",$db);
}
insert_log("`"."l_".$user_check."`","deleted column - ".$column_name."   from ".str_replace("`","",str_replace("_".$user_check,"",$table)),$db,$gmt_stamp,DB_DATABASE);
$Columns=get_columns($table,$db);
$_SESSION["Columns"]=$Columns;
goto present_page;
}else{echo " Something went wrong when trying to delete column ";}
}


elseif(isset($_POST['add_row'])){
if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['table_pass'])){echo "No special characters allowed (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/)";}
else{
$table_pass=stripslashes($_POST['table_pass']);
$table_pass=mysqli_real_escape_string($db,$table_pass);
$table_pass=md5($table_pass);

if(empty($table_pass)){
echo "Empty field";
}
}
if($table_pass!=get_column_value( "`"."t_".$user_check."`","Table",str_replace("`","",str_replace("_".$user_check,"",$table)),"Password", $db)){
echo "Incorrect password ";}
else{
$row_name= stripslashes($_POST['row']);
$row_name=mysqli_real_escape_string($db,$row_name);
if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $row_name)){echo "No special characters allowed (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/)";}


elseif(check_if_present($table, $Columns[0],$row_name , $db)){

echo "Row already present in table ";

goto present_page;
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
}elseif(isset($_POST['del_row'])){

if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['table_pass'])){echo "No special characters allowed (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/)";}
else{
$table_pass=stripslashes($_POST['table_pass']);
$table_pass=mysqli_real_escape_string($db,$table_pass);
$table_pass=md5($table_pass);

if(empty($table_pass)){
echo "Empty field";
}
}
if($table_pass!=get_column_value( "`"."t_".$user_check."`","Table",str_replace("`","",str_replace("_".$user_check,"",$table)),"Password", $db)){
echo "Incorrect password ";}
else{
$row_name= stripslashes($_POST['row']);
$row_name=mysqli_real_escape_string($db,$row_name);
if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $row_name)){echo "No special characters allowed (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/)";}


elseif(!check_if_present($table, $Columns[0],$row_name , $db)){

echo "Coludn't fetch row to delete ";

goto present_page;
}else 
{

echo "Present ";




if(delete_row($table,$Columns[0],$row_name,$db)){
echo "Successfully deleted row ";
insert_log("`"."l_".$user_check."`","deleted row - ".$row_name."   in ".str_replace("`","",str_replace("_".$user_check,"",$table)),$db,$gmt_stamp,DB_DATABASE);
}
}
}

}
goto present_page;

}


else
{

goto present_page;

}




present_page:
if($show=="grades"){

echo_table_grades($table,$Columns,$db);

}
elseif($show=="averages"){

echo_table_average($table,$Columns,$db);

}
elseif($show=="finals"){

echo_table_finals($table,$Columns,$db);

}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Blueprint: Responsive Multi-Column Form</title>
		<meta name="description" content="Blueprint: Blueprint: Responsive Multi-Column Form" />
		<meta name="keywords" content="responsive form, inputs, html5, responsive, multi-column, fluid, media query, template" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default_form.css" />
		<link rel="stylesheet" type="text/css" href="css/component_form.css" />
		<script src="js/modernizr.custom.form.js"></script>
	</head>
	<body>
		<div class="container">
			<header class="clearfix">
				
				<nav>
                                <form class="cbp-mc-form" method="post" action="table.php">
					<div class="cbp-mc-submit-wrap">
                                                
                                                <?php if($show == "finals"){?>
                                                <input class="cbp-mc-submit" name="Average" id="Average" type="submit" value="Average" />
                                                <input class="cbp-mc-submit" name="Grades" id="Grades" type="submit" value="Grades" />
                                                
                                                <?php }elseif($show== "grades"){?>
                                                <input class="cbp-mc-submit" name="Average" id="Average" type="submit" value="Average" />
                                                <input class="cbp-mc-submit" name="Finals" id="Finals" type="submit" value="Finals" />
                                                
                                                <?php }elseif($show=="averages"){?>
                                                <input class="cbp-mc-submit" name="Average" id="Average" type="submit" value="Average" />
                                                <input class="cbp-mc-submit" name="Grades" id="Grades" type="submit" value="Grades" />
                                                <input class="cbp-mc-submit" name="Finals" id="Finals" type="submit" value="Finals" />
                                                <?php }?>
                                                </div>
                                 </form>
				</nav>
			</header>	
<div class="main">   
<form class="cbp-mc-form" method="post" action="table.php">

<div class="cbp-mc-column">
    <label for="first_name">Name</label>
        
        <td><select id="name" name="name">
	  					<?php foreach($names as $element )	{?><option><?php echo " $element";?></option><?php }?>
	  						
	 </select></td>

         <label for="subject">Subject</label>
        <!--<td><input name="subject" type="text" id="subject"></td>-->
        
	  					<td><select id="subject" name="subject">
	  					<?php foreach(array_slice($Columns,1) as $element )	{if (strpos( $element, '_final') == false) {?><option><?php echo " $element";?></option><?php }}?>
	  						
	  					</select></td>
        <label for="subject">Subject Password</label>
        <input name="subject_password" type="password" id="subject_password">
        <label for="first_name">Grade</label>
                                                <td><select id="grade" name="grade">
                                                <option>10</option>
                                                <option>9</option>
                                                <option>8</option>
	  					<option>7</option>
                                                <option>6</option>
                                                <option>5</option>
                                                <option>4</option>
                                                <option>3</option>
                                                <option>2</option>
                                                <option>1</option>
                                                <option>0</option>
                                                
                                               
	  				       
	  					</select></td>




<div class="cbp-mc-submit-wrap"><label>Final Grade</label><input  name="final_grade"  type="checkbox" value="final" /></div>
<div class="cbp-mc-submit-wrap"><input class="cbp-mc-submit" name="add" id="add" type="submit" value="Send" /></div>
<div class="cbp-mc-submit-wrap"><input class="cbp-mc-submit" name="Delete" id="Delete" type="submit" value="Delete" /></div>
        
        
</div>
<div class="cbp-mc-column">
        <label for="first_name">Column</label>
        <!--<td><input name="column" type="text" id="column"></td>-->
         <td><select id="column" name="column">
                                               <?php foreach ($subject_arr as $subject){?>
                                                <option><?php echo "$subject";?></option>
                                               <?php }?>
	 </select></td>
         <label for="subject">Table Password</label>
        <input name="table_pass_col" type="password" id="table_pass_col">
        <div class="cbp-mc-submit-wrap"><input class="cbp-mc-submit" name="add_col" id="add_col" type="submit" value="Add Column" /></div>
        <div class="cbp-mc-submit-wrap"><input class="cbp-mc-submit" name="del_col" id="del_col" type="submit" value="Delete Column" /></div>
     </div>
<div class="cbp-mc-column">
        <label for="first_name">Row</label>
        <input name="row" type="text" id="row">
        <label for="subject">Table Password</label>
        <input name="table_pass" type="password" id="table_pass">
        <div class="cbp-mc-submit-wrap"><input class="cbp-mc-submit" name="add_row" id="add_row" type="submit" value="Add Row" /></div>
        <div class="cbp-mc-submit-wrap"><input class="cbp-mc-submit" name="del_row" id="del_row" type="submit" value="Delete Row" /></div>
        
</div>       


<?php



?>


