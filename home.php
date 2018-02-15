<?php
	include("check.php");	
        //include("includes/functions.php");
        include("includes/functions_Class.php");
$table_arr=array();
$subject_arr=array();

$table_arr=get_rows("`t_".$user_check."`","Table",$db);
$subject_arr=get_rows("`s_".$user_check."`","Subject",$db);
$log_date_arr=get_rows("`l_".$user_check."`","Date",$db);
$log_action_arr=get_rows("`l_".$user_check."`","Log",$db);


$timezone = $_SESSION['time'];
$gmt_stamp = filter_var($timezone, FILTER_SANITIZE_NUMBER_INT);
$_SESSION['current_table']=current(array_filter($table_arr));

$_SESSION['view']="table";



if(isset($_POST['newtable'])){



if(empty($_POST['new_table_name'])||empty($_POST['new_table_pass'])){
echo "Empty field!";
}elseif(in_array($_POST['new_table_name'],$table_arr)){
echo "table already present ";}
elseif(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['new_table_name'])||preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['new_table_pass'])){
echo "No special characters (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/) allowed !";
}elseif(strlen($_POST['new_table_pass'])<10){
echo "Password must contain a minimum of 10 characters ";}
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

}
if(isset($_POST['deltable'])){
if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['table_name'])||preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['table_pass'])){
echo "No special characters (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/) allowed !";
}else{
$table_name=stripslashes($_POST['table_name']);
$table_name=mysqli_real_escape_string($db,$table_name);


$table_pass=stripslashes($_POST['table_pass']);
$table_pass=mysqli_real_escape_string($db,$table_pass);
$table_pass = md5($table_pass);
if(empty($table_name)||empty($table_pass)){
echo "Empty field";
}
else {

if($table_pass!=get_column_value( "`"."t_".$user_check."`","Table",$table_name,"Password", $db)){
echo "Incorrect password ";}
 elseif(delete_table($table_name."_".$user_check,$db)){
 echo "deleted table !";
 
 delete_row("`"."t_".$user_check."`","`Table`",$table_name,$db);


 $index = array_search($table_name, $table_arr);
	if ( $index !== false ) {
           
		unset( $table_arr[$index] );
	}
insert_log("`"."l_".$user_check."`","deleted table - ".$table_name,$db,$gmt_stamp,DB_DATABASE);
 echo "table ".$table_name." was deleted succesfully ";}

}

}

}
if(isset($_POST['newsubject'])){



if(empty($_POST['subject_name'])||empty($_POST['subject_pass'])){
echo "Empty field";
}elseif(in_array($_POST['subject_name'],$subject_arr)){
echo "subject already present ";}
elseif(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['subject_name'])||preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['subject_pass'])){
echo "No special characters (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/) allowed !";
}elseif (strpos($_POST['subject_name'], 'final') !== false) {
    echo "Cannot use `final` as part of a subject name ";
}elseif(strlen($_POST['subject_pass'])<10){
echo "Password must contain a minimum of 10 characters ";}
else {
$subject_name=stripslashes($_POST['subject_name']);
$subject_name=mysqli_real_escape_string($db,$subject_name);
$subject_pass=stripslashes($_POST['subject_pass']);
$subject_pass=mysqli_real_escape_string($db,$subject_pass);
$subject_pass = md5($subject_pass);
$subject_header=array("Subject","Password","Final");
if(isset($_POST['final'])){
$subject_values=array($subject_name,$subject_pass,"yes");
}
else{$subject_values=array($subject_name,$subject_pass,"no");}
add_row("`"."s_".$user_check."`",$subject_header,$subject_values,$db,$gmt_stamp,DB_DATABASE);
insert_log("`"."l_".$user_check."`","created subject - ".$subject_name,$db,$gmt_stamp,DB_DATABASE);
$subject_arr[]=$subject_name;
}

}


if(isset($_POST['delsubject'])){

$subject_name=stripslashes($_POST['subject_name']);
$subject_name=mysqli_real_escape_string($db,$subject_name);
$subject_pass=stripslashes($_POST['subject_pass']);
$subject_pass=mysqli_real_escape_string($db,$subject_pass);
$subject_pass = md5($subject_pass);
if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['subject_name'])||preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['subject_pass'])){
echo "No special characters (/[\'^£$%&*()}{@#~?><>,|=_+¬-]/) allowed !";
}elseif(empty($subject_name)||!in_array($subject_name,$subject_arr)){
echo "Incorrect subject name!";
}
else {

if(empty($subject_pass)||$subject_pass!=get_column_value( "`"."s_".$user_check."`","Subject",$subject_name,"Password", $db)){
echo "Incorrect password ";
}
elseif(delete_row("`"."s_".$user_check."`","`Subject`",$subject_name,$db)){

 
 $index = array_search($subject_name, $subject_arr);
	if ( $index !== false ) {
           
		unset( $subject_arr[$index] );
                                }
 insert_log("`"."l_".$user_check."`","deleted subject - ".$subject_name,$db,$gmt_stamp,DB_DATABASE);
 echo "Subject ".$subject_name." deleted succesfuly";
                            }                
     }
}if(isset($_POST['table'])){
$_SESSION['current_table']=$_POST['table'];}
if(isset($_POST['statistics'])){
$_SESSION['view']="statistics";
$_SESSION['current_table']=$_POST['statistics'];
}                        
                        
                        
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blueprint: Multi-Level Menu</title>
	<meta name="description" content="Grades,Tables,Review Card,School,interactive,Subject,Classes" />
	<meta name="keywords" content="blueprint, template, html, css, menu, responsive, mobile-friendly" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="favicon.ico">
	<!-- food icons -->
	<link rel="stylesheet" type="text/css" href="css/organicfoodicons.css" />
	<!-- demo styles -->
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<!-- menu styles -->
	<link rel="stylesheet" type="text/css" href="css/component_menu.css" />
	<script src="js/modernizr-custom.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                if("<?php echo $timezone; ?>".length==0){
                    var visitortime = new Date();
                    var visitortimezone = "GMT " + -visitortime.getTimezoneOffset()/60;
                    $.ajax({
                        type: "GET",
                        url: "http://picklejars.co.nf/timezone.php",
                        data: 'time='+ visitortimezone,
                        success: function(){
                            location.reload();
                                }
                            });
                        }
                    });
        </script>
</head>
<body>
	<!-- Main container -->
	<div class="container">
		<!-- Blueprint header -->
		<header class="bp-header cf">
			<div class="dummy-logo">
		          <nav class="bp-nav">
                                <a class="bp-nav__item bp-icon bp-icon--prev" href="logout.php" data-info="Exit &nbsp;&nbsp;"><span>Exit</span></a>
                          </nav>
                        </div>   
		</header>
		<button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
		<nav id="ml-menu" class="menu">
			<button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
			<div class="menu__wrap">
				<ul data-menu="main" class="menu__level">
                                        <form id ="view_statistics_form" method="post" action ="home.php" >
                                                       <input name="statistics" type="hidden" id="statistics"  value="" >
                                            </form> 
                                            
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-1" href="#">Tables</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-2" href="#">Subjects</a></li>
					<li class="menu__item"><a class="menu__link" href="javascript:{}" onclick="document.getElementById('view_statistics_form').submit(); return false;">Statistics</a></li>
                                         <?php if(count($log_date_arr)) {?>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-4" href="#">Log </a></li>
                                        <?php }?>
                                       
				</ul> 
				<!-- Submenu 1 -->
				<ul data-menu="submenu-1" class="menu__level">
					 <?php foreach($table_arr as $t_table){?>
     <form id ="<?php echo htmlspecialchars('view_table_form'.$t_table); ?>" method="post" action ="home.php" >
                                                       <input name="table" type="hidden" id="table"  value="<?php echo htmlspecialchars($t_table); ?>" >
                                            </form> 
                                            <li class="menu__item"><a class="menu__link" href="javascript:{}" onclick="document.getElementById('<?php echo htmlspecialchars('view_table_form'.$t_table); ?>').submit(); return false;"><?php echo htmlspecialchars($t_table); ?></a></li>
                                            <?php } ?>
                                         <li class="menu__item"><a class="menu__link" data-submenu="submenu-1-1" href="#">Create</a></li>
                                         <li class="menu__item"><a class="menu__link" data-submenu="submenu-1-2" href="#">Delete</a></li>
				</ul>
				<!-- Submenu 1-1 -->
				<ul data-menu="submenu-1-1" class="menu__level">
					<form id ="create_table" method="post" action ="home.php">
                                                                                                       <p class="menu__paragraph">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Table name</p>
                                                                                                       <li class="menu__input"><input   name="new_table_name" type="text" id="new_table_name"   ></li>
                                                                                                       <p class="menu__paragraph">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Table password (min 10 char ) </p>
                                                                                                        <p class="menu__paragraph">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- and no special ones</p>
                                                                                                      <li class="menu__input"> <input   name="new_table_pass" type="password" id="new_table_pass"   ></li>
                                                                                                        
                                                                                                         <input  name="newtable" type="hidden" id="newtable"   >
                                                                                                         <li class="menu__item"><a   href="javascript:{}" onclick="document.getElementById('create_table').submit(); return false;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;create</a></li>    
                                                                                        </form> 
				</ul>
                                <!-- Submenu 1-2 -->
				<ul data-menu="submenu-1-2" class="menu__level">
					<form id ="delete_table" method="post" action ="home.php">
                                                                                                       <p class="menu__paragraph">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Table name</p>
                                                                                                       <li class="menu__input"><input   name="table_name" type="text" id="table_name"   ></li>
                                                                                                        <p class="menu__paragraph">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Table password</p>
                                                                                                      <li class="menu__input"> <input   name="table_pass" type="password" id="table_pass"   ></li>
                                                                                                         <input name="deltable" type="hidden" id="deltable"   >
                                                                                                         <li class="menu__item"><a  href="javascript:{}" onclick="document.getElementById('delete_table').submit(); return false;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;delete</a></li>
                                                                                        </form> 
				</ul>
				<!-- Submenu 2 -->
				<ul data-menu="submenu-2" class="menu__level">
					<?php foreach($subject_arr as $s_element){ ?>
                                         <p class="menu__paragraph">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "$s_element";?></p>
                                         <?php } ?>
                                         <li class="menu__item"><a class="menu__link" data-submenu="submenu-2-1" href="#">Create </a></li>
                                         <li class="menu__item"><a class="menu__link" data-submenu="submenu-2-2" href="#">Delete  </a></li>
				</ul>
				<!-- Submenu 2-1 -->
				<ul data-menu="submenu-2-1" class="menu__level">
					<form id ="create_subject" method="post" action ="home.php">
                                                                                                       <p class="menu__paragraph">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subject name</p>
                                                                                                       <li class="menu__input"><input  name="subject_name" type="text" id="subject_name"   ></li>
                                                                                                        <p class="menu__paragraph">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subject password (min 10 char ) </p>
                                                                                                        <p class="menu__paragraph">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- and no special ones</p>
                                                                                                       <li class="menu__input"><input  name="subject_pass" type="password" id="subject_pass"   ></li>
                                                                                                      <label for="final" class="menu__paragraph"><input type="checkbox" name="final" value="final" id="final">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-has final attribute</label>
                                                                                                         <input name="newsubject" type="hidden" id="newsubject"   >
                                                                                                         <li class="menu__item"><a href="javascript:{}" onclick="document.getElementById('create_subject').submit(); return false;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;create</a></li>        
                                                                                        </form> 
				</ul>
                                <!-- Submenu 2-2 -->
				<ul data-menu="submenu-2-2" class="menu__level">
					<form id ="delete_subject" method="post" action ="home.php">
                                                                                                       <p class="menu__paragraph">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subject name</p>
                                                                                                      <li class="menu__input"> <input style = "css/component_form.css" name="subject_name" type="text" id="subject_name"   ></li>
                                                                                                        <p class="menu__paragraph">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subject password</p>
                                                                                                       <li class="menu__input"><input style = "css/component_form.css" name="subject_pass" type="password" id="subject_pass"   ></li>
                                                                                                         <input name="delsubject" type="hidden" id="delsubject"   >
                                                                                                         
                                                                                                         <li class="menu__item"><a href="javascript:{}" onclick="document.getElementById('delete_subject').submit(); return false;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;delete</a></li> 
                                                                                                             
                                                                                        </form> 
				</ul>
				<!-- Submenu 3 -->
				<!--<ul data-menu="submenu-3" class="menu__level">
                                         <h4 class="menu__item">Under Construction</h4>
					 <?php foreach($table_arr as $t_table){?>
                                         <form id ="<?php echo htmlspecialchars('view_statistics_form'.$t_table); ?>" method="post" action ="home.php" >
                                                       <input name="statistics" type="hidden" id="statistics"  value="<?php echo htmlspecialchars($t_table); ?>" >
                                            </form> 
                                            <li class="menu__item"><a class="menu__link" href="javascript:{}" onclick="document.getElementById('<?php echo htmlspecialchars('view_statistics_form'.$t_table); ?>').submit(); return false;"><?php echo htmlspecialchars($t_table); ?></a></li>
                                            <?php } ?>
				</ul>-->
				<!-- Submenu 3-1 -->
				<ul data-menu="submenu-3-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Starter Kit</a></li>
					<li class="menu__item"><a class="menu__link" href="#">The Essential 8</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Bolivian Secrets</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Flour Packs</a></li>
				</ul>
				<!-- Submenu 4 -->
				<ul data-menu="submenu-4" class="menu__level">
                                        <?php for($i=0; $i<count($log_date_arr); $i++) { ?>
                                        <div class="menu__item" style =" border-radius: 25px;
                                                    border: 2px solid #afdefa;
                                                    padding: 20px; 
                                                     ">
                                                    
                                          <li class="menu__item"><p class="menu__paragraph"><?php echo htmlspecialchars($log_date_arr[$i].":"); ?></p></li>
                                          <li class="menu__item"><p class="menu__paragraph"><?php echo htmlspecialchars($log_action_arr[$i]); ?></p></li>
                                        </div>
                                        <?php } ?>
				</ul>
				<!-- Submenu 4-1 -->
				<ul data-menu="submenu-4-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Nut Mylk Packs</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Amino Acid Heaven</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Allergy Free</a></li>
				</ul>
			</div>
		</nav>
		<div class="content">
			<!-- Ajax loaded content here -->
                        <?php if($_SESSION['view']=="table"){?>
                        <?php if($_SESSION['current_table']!=''){?>
                        <iframe src="table.php?table=<?php echo $_SESSION['current_table']; ?>&gmt_stamp=<?php echo $gmt_stamp; ?>" width="100%" style="height: 100vh;"></iframe>
                        <?php }else {?>
                        <p>No tables to show! </p>
                        <?php }
                                                }
                        if($_SESSION['view']=="statistics"){?>
                        
                        <iframe src="statistics.php " width="100%" style="height: 100vh;"></iframe>
                        
                        <?php }?>  
		</div>
	</div>
	<!-- /view -->
	<script src="js/classie.js"></script>
<script src="js/dummydata.js"></script>
<script src="js/main.js"></script>
<script>
(function() {
	var menuEl = document.getElementById('ml-menu'),
		mlmenu = new MLMenu(menuEl, {
			// breadcrumbsCtrl : true, // show breadcrumbs
			// initialBreadcrumb : 'all', // initial breadcrumb text
			backCtrl : false, // show back button
			// itemsDelayInterval : 60, // delay between each menu item sliding animation
			onItemClick: loadDummyData // callback: item that doesn´t have a submenu gets clicked - onItemClick([event], [inner HTML of the clicked item])
		});

	// mobile menu toggle
	var openMenuCtrl = document.querySelector('.action--open'),
		closeMenuCtrl = document.querySelector('.action--close');
        function openMenu() {
		classie.add(menuEl, 'menu--open');
	}

	function closeMenu() {
		classie.remove(menuEl, 'menu--open');
	}
	openMenuCtrl.addEventListener('click', openMenu);
	closeMenuCtrl.addEventListener('click', closeMenu);

	

	// simulate grid content loading
	var gridWrapper = document.querySelector('.content');

	function loadDummyData(ev, itemName) {
		ev.preventDefault();

		closeMenu();
		gridWrapper.innerHTML = '';
		classie.add(gridWrapper, 'content--loading');
		setTimeout(function() {
			classie.remove(gridWrapper, 'content--loading');
			gridWrapper.innerHTML = '<ul class="products">' + dummyData[itemName] + '<ul>';
		}, 700);
	}
})();
</script>
</body>

</html>
<?php ?>