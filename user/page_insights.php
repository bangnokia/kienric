<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<div class="main-panel">
<!-- Navbar -->
<?php include 'nav.php'; ?>
<?php include 'getPageInsights.php'; 

?>

  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pages Insights
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <?php  
                    $area_chart_lables = array();
                    $area_chart_dataset = array();
                    $color = rand(0,255).','.rand(0,255).','.rand(0,255);
                    $area_chart_dataset[]  = '{label: "'.$page_info['name'].'",
                      fillColor: "rgba('.$color.',1)",
                      strokeColor: "rgba('.$color.',1)",
                      pointColor: "rgba('.$color.',1)",
                      pointStrokeColor: "rgba('.$color.',1)",
                      pointHighlightFill: "rgba('.$color.',1)",
                      pointHighlightStroke: "rgba('.$color.',1)",
                      data: ['.implode(',',$page_total_likes).']}';
                     foreach($page_total_likes as $key => $value){
                          $area_chart_lables[] = "'".$key."'";
                      }
                    
                ?>
                
                <!-- DONUT CHART -->
                  <div class="card card-danger">
                    <div class="card-header with-border">
                      <h3 class="card-title">Month Wise Likes Of Page <strong><?php echo $page_info['name'] ?></strong></h3>
                      
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="areaChart" style="height:250px"></canvas>
                        </div>
                    </div>
                    
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php  
                    $line_chart_lables = array();
                    $line_chart_dataset = array();
                    $color = rand(0,255).','.rand(0,255).','.rand(0,255);
                    $line_chart_dataset[]  = '{label: "'.$page_info['name'].'",
                      fillColor: "rgba('.$color.',1)",
                      strokeColor: "rgba('.$color.',1)",
                      pointColor: "rgba('.$color.',1)",
                      pointStrokeColor: "rgba('.$color.',1)",
                      pointHighlightFill: "rgba('.$color.',1)",
                      pointHighlightStroke: "rgba('.$color.',1)",
                      data: ['.implode(',',$page_total_view).']}';
                     foreach($page_total_view as $key => $value){
                          $line_chart_lables[] = "'".$key."'";
                      }
                    
                ?>
                <!-- DONUT CHART -->
                  <div class="card card-danger">
                    <div class="card-header with-border">
                      <h3 class="card-title">Month Wise Views Of Page <strong><?php echo $page_info['name'] ?></strong></h3>
                      
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="lineChart" style="height:250px"></canvas>
                        </div>
                    </div>
                    
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
        </div>
       <?php /* <div class="row">
            <div class="col-sm-12">
                
                <!-- DONUT CHART -->
                  <div class="card card-danger">
                    <div class="card-header with-border">
                      <h3 class="card-title">Gender Wise Total Likes Of <strong><?php echo $page_info['name'] ?></strong></h3>
                      
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <?php  
                                $dataset = array('Male' => 0, 'Female'=>0);
                                $pie_chart_dataset = array();
                                
                                 foreach($page_total_likes_gender_wise as $key => $value){
                                      if (strpos($key, 'M') !== false) {
                                            $dataset['Male'] += $value;
                                        }
                                        else{
                                            $dataset['Female'] += $value;
                                        }
                                  }
                                  foreach($dataset as $key => $data){
                                        $color = rand(0,255).','.rand(0,255).','.rand(0,255);
                                        $pie_chart_dataset[]  = '
                                          {
                                            value    : '.$data.',
                                            color    : "rgba('.$color.',1)",
                                            highlight: "rgba('.$color.',1)",
                                            label    : "'.$key.'"
                                          }
                                          ';
                                    ?>
                                    <li>
                                         <i class="fa fa-stop" style="color:rgba(<?php echo $color ?>,1);">
                                         </i>
                                         <span><?php echo $key ?></span>
                                     </li>
                                    <?php
                                    
                                  }
                                
                            ?>
                        </ul>
                        <div class="chart">
                            <canvas id="pieChart" style="height:250px"></canvas>
                        </div>
                    </div>
                    
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
         </div>
        <div class="row">
            <div class="col-sm-12">
                
                <!-- DONUT CHART -->
                  <div class="card card-danger">
                    <div class="card-header with-border">
                      <h3 class="card-title">City Wise Total Likes Of <strong><?php echo $page_info['name'] ?></strong></h3>
                      
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <?php  
                                function toHex($n) {
                                    $n = intval($n);
                                    if (!$n)
                                        return '00';

                                    $n = max(0, min($n, 255)); // make sure the $n is not bigger than 255 and not less than 0
                                    $index1 = (int) ($n - ($n % 16)) / 16;
                                    $index2 = (int) $n % 16;

                                    return substr("0123456789ABCDEF", $index1, 1) 
                                        . substr("0123456789ABCDEF", $index2, 1);
                                }
                                $donut_chart_dataset = array();
                                $donut_chart_colors = array();
                                
                                  foreach($page_total_likes_country_wise as $key => $value){
                                       $color = "#".toHex(rand(0,255)).toHex(rand(0,255)).toHex(rand(0,255))."";
                                        $donut_chart_colors[] = "'".$color."'";
                                        $donut_chart_dataset[]  = '
                                          {
                                            label    : "'.$key.'",
                                            value    : '.$value.'
                                          }
                                          ';
                                    ?>
                                    <li>
                                         <i class="fa fa-stop" style="color:<?php echo $color ?>;">
                                         </i>
                                         <span><?php echo $key ?></span>
                                     </li>
                                    <?php
                                    
                                  }
                                
                            ?>
                        </ul>
                        <div class="chart">
                            <div class="chart" id="sales-chart" style="height: 600px; position: relative;"></div>
                        </div>
                    </div>
                    
                    
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
        </div>
        */ ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>
  