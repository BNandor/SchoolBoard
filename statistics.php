<?php 

include("check.php");
include ("connection.php");
include ("includes/functions_Class.php");


$_SESSION["view"]="table";

if(isset($_POST['table'])){
$_SESSION["view"]="subject";
$_SESSION["table"] = "`".$_POST['table']."_".$user_check."`";

$_SESSION["Columns"]=get_columns($_SESSION["table"],$db);


}
if(isset($_GET['subject_forward'])){
if(array_search($_SESSION["selected_subject"],$_SESSION["Columns"])+1<count($_SESSION["Columns"])){

$_SESSION["selected_subject"]=$_SESSION["Columns"][array_search($_SESSION["selected_subject"],$_SESSION["Columns"])+1];
}
if(array_search($_SESSION["selected_subject"],$_SESSION["Columns"])==count($_SESSION["Columns"])-1){
$_SESSION["selected_subject"]=$_SESSION["Columns"][array_search($_SESSION["selected_subject"],$_SESSION["Columns"])-1];
}
while(strpos($_SESSION["selected_subject"],"_final")!==false && array_search($_SESSION["selected_subject"],$_SESSION["Columns"])!=count($_SESSION["Columns"])-1){
if(array_search($_SESSION["selected_subject"],$_SESSION["Columns"])+1<count($_SESSION["Columns"])){

$_SESSION["selected_subject"]=$_SESSION["Columns"][array_search($_SESSION["selected_subject"],$_SESSION["Columns"])+1];

$avg=0;
$grades=array();
$names=get_rows($_SESSION["table"],$_SESSION["Columns"][0],$db);
 foreach ($names as $key =>$name){
                  $hasfinal=get_column_value( "`"."s_".$user_check."`","Subject", $_SESSION["selected_subject"],"Final", $db);
                
                    
                  $grades[]=get_average( $_SESSION["table"],$_SESSION["Columns"][0], $name,$_SESSION["selected_subject"],$hasfinal ,$db);
                
             }


if(sizeof($grades)!=0){
$avg=array_sum($grades)/sizeof($grades); }
$_SESSION["class_average"]=$avg;

}
}$_SESSION["view"]="selected_subject";
}
if(isset($_GET['subject_back'])){
if(array_search($_SESSION["selected_subject"],$_SESSION["Columns"])>1){

$_SESSION["selected_subject"]=$_SESSION["Columns"][array_search($_SESSION["selected_subject"],$_SESSION["Columns"])-1];
}
while(strpos($_SESSION["selected_subject"],"_final")!==false){
if(array_search($_SESSION["selected_subject"],$_SESSION["Columns"])>1){

$_SESSION["selected_subject"]=$_SESSION["Columns"][array_search($_SESSION["selected_subject"],$_SESSION["Columns"])-1];


$avg=0;
$grades=array();
$names=get_rows($_SESSION["table"],$_SESSION["Columns"][0],$db);
 foreach ($names as $key =>$name){
                  $hasfinal=get_column_value( "`"."s_".$user_check."`","Subject", $_SESSION["selected_subject"],"Final", $db);
                
                    
                  $grades[]=get_average( $_SESSION["table"],$_SESSION["Columns"][0], $name,$_SESSION["selected_subject"],$hasfinal ,$db);
                
             }


if(sizeof($grades)!=0){
$avg=array_sum($grades)/sizeof($grades); }
$_SESSION["class_average"]=$avg;
}
}$_SESSION["view"]="selected_subject";
}
if(isset($_POST['subject'])){
$_SESSION["view"]="selected_subject";
$_SESSION["selected_subject"]=$_POST['subject'];
$avg=0;
$grades=array();
$names=get_rows($_SESSION["table"],$_SESSION["Columns"][0],$db);
 foreach ($names as $key =>$name){
                  $hasfinal=get_column_value( "`"."s_".$user_check."`","Subject", $_SESSION["selected_subject"],"Final", $db);
                
                    
                  $grades[]=get_average( $_SESSION["table"],$_SESSION["Columns"][0], $name,$_SESSION["selected_subject"],$hasfinal ,$db);
                
             }


if(sizeof($grades)!=0){
$avg=array_sum($grades)/sizeof($grades); }
$_SESSION["class_average"]=$avg;


}if(isset($_POST['classes_average'])){

$_SESSION["view"]="tables_comparison";



}
$table=$_SESSION["table"];
$table_arr=array();
$subject_arr=array();
$names=array();
$hasfinal="";
$Columns=$_SESSION["Columns"];

if($table!=""){
$names=get_rows($table,$Columns[0],$db);
$subject_arr=get_rows("`s_".$user_check."`","Subject",$db);

$table_arr=get_rows("`t_".$user_check."`","Table",$db);



 
 
 

$hasfinal=get_column_value( "`"."s_".$user_check."`","Subject", $current_subject,"Final", $db);
}
$current_subject=$_SESSION["selected_subject"];
$hasfinal=get_column_value( "`"."s_".$user_check."`","Subject", $current_subject,"Final", $db);
$view=$_SESSION["view"];
?>
 <html>
  <head>



<?php
	
   
  

//this counter will be used later on the foreach
$counter = count($names);?>
            <meta charset="utf-8">
            <link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default_icon.css" />
		<link rel="stylesheet" type="text/css" href="css/component_icon.css" />
		<script src="js/modernizr.custom.icon.js"></script>
                
            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
            
            <script type="text/javascript">
              google.load("visualization", "1", {packages:["corechart"]});
              google.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['<?=$current_subject?>','Average', { role: 'style' }],
                 ['Class Average ', <?=$_SESSION["class_average"]?>,'#b87333'],
              <?php foreach ($names as $key =>$name):?>

                <?php /*if the key is equal to the counter-1 it means we've reached
    the end of our array in that case the javascript array,
    won't have a comma at the end, or else it'll give a
    unexpected identifier error*/
                     if(($counter-1)==$key):?>
                  ['<?=$name?>', <?=get_average( $table,$Columns[0], $name,$current_subject,$hasfinal,$db)?>,'#3366cc']
                <?php else:?>
                  ['<?=$name?>', <?=get_average( $table,$Columns[0], $name,$current_subject,$hasfinal,$db)?>,'#3366cc'],
                <?php endif;?>
                <?php endforeach;?>
            ]);

            var options = {
              title: 'Averages of class <?=str_replace("`","",str_replace("_".$user_check,"",$table))?> subject <?=$current_subject?>',
              
              hAxis: {title: '<?=$current_subject?>', titleTextStyle: {color: 'blue'}}
              
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          }
        </script>
      </head>
      <body>
      <?php if( $view=="selected_subject"){?>
      <div class="container">
        <header class="clearfix">
				<!--<span>Blueprint <span class="bp-icon bp-icon-about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span>
				<h1>Responsive Icon Grid</h1>-->
				<nav>
                                <?php if(array_search($_SESSION["selected_subject"],$_SESSION["Columns"])>1){?>
					<a href="statistics.php?subject_back="" " class="bp-icon bp-icon-prev" data-info="previous "><span>Previous </span></a>
				<?php }?>
                                <?php if(array_search($_SESSION["selected_subject"],$_SESSION["Columns"])+1<count($_SESSION["Columns"])){?>
                                        <a href="statistics.php?subject_forward="" " class="bp-icon bp-icon-next" data-info="next "><span>Next </span></a>
                                        <?php }?>
					<!--<a href="http://tympanus.net/codrops/?p=15657" class="bp-icon bp-icon-drop" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>-->
					<a href="statistics.php" class="bp-icon bp-icon-archive" data-info="Choose Table"><span>Choose Table</span></a>
				</nav>
			</header>
                  
        <div id="chart_div" style="width: 100%; height: 100%;">
        </div>
        </div>
        <?php }elseif($view=="subject"){ ?>
        
        
        
        
        
                        <div class="main">
				<ul class="cbp-ig-grid">
                                 
					<?php foreach(array_slice($Columns,1) as $element){
                                                if(strpos($element, '_final') == false){?>
                                                <li>
                                                         <form id ="<?php echo htmlspecialchars('select_subject'.$element); ?>" method="post" action ="statistics.php" >
                                                               <input name="subject" type="hidden" id="subject"  value="<?php echo htmlspecialchars($element); ?>" >
                                                         </form> 
                                                         <a  href="javascript:{}" onclick="document.getElementById('<?php echo htmlspecialchars('select_subject'.$element); ?>').submit(); return false;">
                                                                <?php $icons=array("shoe","milk","whippy","spectacles","doumbek");?>
                                                                <span class="cbp-ig-icon cbp-ig-icon-<?php echo $icons[array_rand($icons)];?>"></span>
                                                                <h3 class="cbp-ig-title"><?php echo "$element";?></h3>
                                                                <span class="cbp-ig-category">subject</span>
                                                        </a>
                                                </li>
                                                <?php }?>
					<?php }?>
				</ul>
			</div>
        <?php }  elseif($view=="table"){ ?>
                        <div class="main">
                                <ul class="cbp-ig-grid">
                                <li>
                                                        
                                                         <a  href="statistics_table_comparison.php" >
                                                                <?php $icons=array("shoe","milk","whippy","spectacles","doumbek");?>
                                                                <span class="cbp-ig-icon cbp-ig-icon-<?php echo $icons[array_rand($icons)];?>"></span>
                                                                <h3 class="cbp-ig-title">Tables comparison</h3>
                                                                <span class="cbp-ig-category">table-comparison</span>
                                                        </a>
                                                </li>
                                
                                </ul>
				<ul class="cbp-ig-grid">
                                 
					<?php foreach($table_arr as $element){?>
                                               
                                                <li>
                                                         <form id ="<?php echo htmlspecialchars('select_table'.$element); ?>" method="post" action ="statistics.php" >
                                                               <input name="table" type="hidden" id="table"  value="<?php echo htmlspecialchars($element); ?>" >
                                                         </form> 
                                                         <a  href="javascript:{}" onclick="document.getElementById('<?php echo htmlspecialchars('select_table'.$element); ?>').submit(); return false;">
                                                                <?php $icons=array("shoe","milk","whippy","spectacles","doumbek");?>
                                                                <span class="cbp-ig-icon cbp-ig-icon-<?php echo $icons[array_rand($icons)];?>"></span>
                                                                <h3 class="cbp-ig-title"><?php echo "$element";?></h3>
                                                                <span class="cbp-ig-category">table</span>
                                                        </a>
                                                </li>
                                                
					<?php }?>
				</ul>
			</div>
        <?php }?>
      </body>
    </html>
    <?php ?>