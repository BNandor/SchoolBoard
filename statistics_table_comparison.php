<?php
include("check.php");
include ("connection.php");
include ("includes/functions_Class.php");

$table_arr=array();
$subject_arr=array();
$table_arr=get_rows("`t_".$user_check."`","Table",$db);
$subject_arr=get_rows("`s_".$user_check."`","Subject",$db);


function get_subject_class_average($table,$subject,$connection,$user){
$avg=0;
$grades=array();
$names=get_rows($table,$_SESSION["Columns"][0],$connection);
 foreach ($names as $key =>$name){
                  $hasfinal=get_column_value( "`"."s_".$user."`","Subject", $subject,"Final", $connection);
                
                    
                  $grades[]=get_average( $table,$_SESSION["Columns"][0], $name,$subject,$hasfinal ,$connection);
                
             }


if(sizeof($grades)!=0){
$avg=array_sum($grades)/sizeof($grades); }
return $avg;
}
$class_subject_avg=array();
$class_average=array();
foreach($table_arr as $element){

$table_columns=array_slice(get_columns("`".$element."_".$user_check."`",$db),1);

        foreach($table_columns as $subject_element){
                 if (strpos( $subject_element, '_final') == false) {
  
$class_subject_avg[]=get_subject_class_average("`".$element."_".$user_check."`",$subject_element,$db,$user_check)."<br>";
                                                        }
                                                }
                                                
 
if(sizeof($class_subject_avg)!=0){
$class_average[]=array_sum($class_subject_avg)/sizeof($class_subject_avg); } 
else{
$class_average[]=0;
}
$class_subject_avg=array();
}


$counter = count($class_average);?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Table', 'Average'],
           <?php foreach ($class_average as $key =>$name):?>
           
           <?php /*if the key is equal to the counter-1 it means we've reached
    the end of our array in that case the javascript array,
    won't have a comma at the end, or else it'll give a
    unexpected identifier error*/
                     if(($counter-1)==$key):?>
          ['<?=$table_arr[$key]?>', <?=$name?>]
                      <?php else:?>
          ['<?=$table_arr[$key]?>', <?=$name?>],
          <?php endif;?>
                <?php endforeach;?>
        ]);

        var options = {
          
          chart: {
            title: 'Tables average comparison',
            //subtitle: 'distance on the left, brightness on the right'
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          series: {
            0: { axis: 'average' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            x: {
              distance: {label: 'average'}, // Bottom x-axis.
              brightness: {side: 'top', label: 'apparent magnitude'} // Top x-axis.
            }
          }
        };

      var chart = new google.charts.Bar(document.getElementById('dual_x_div'));
      chart.draw(data, options);
    };
    </script>
  </head>
  <body>
    <div id="dual_x_div" style="width: 100%; height: 100%;"></div>
  </body>
</html>

<?php ?>