   <link rel="stylesheet" href="<?php print $GLOBALS['base_url']; ?>/sites/all/themes/software_responsive_theme/css/fossee.css">
  <div class="container" style="line-height:2em">
  FOSSEE (Free and Open Source Software in Education) project promotes the use of FOSS tools to improve the quality of education in our country. We aim to reduce dependency on proprietary software in educational institutions. We encourage the use of FOSS tools through various activities to ensure commercial software is replaced by equivalent FOSS tools. We also develop new FOSS tools and upgrade existing tools to meet requirements in academia and research. </br>
  The FOSSEE project is part of the National Mission on Education through Information and Communication Technology (ICT), Ministry of Human Resources and Development, Government of India. <hr>
  
  <h4>Active Members</h4>
  <?php
  include_once "includes/bootstrap.inc";
  drupal_bootstrap(DRUPAL_BOOTSTRAP_DATABASE);


  $queryResult = db_query("SELECT emp_name, emp_des, profile_url FROM {emp_form_data} WHERE status = 'Active' AND emp_des = 'Professor'");
  $j = 0;
  $query_des_row = array();
  $query_name_row = array();
  $query_pro_url = array();

    foreach ($queryResult as $result) {
      $emp_name = $result->emp_name;
      $emp_des = $result->emp_des;
      $profile_url = $result->profile_url;
      $query_des_row[$j] = $emp_des;
      $query_name_row[$j] = $emp_name;
      $query_pro_url[$j] = $profile_url;
      $j++;
    }
    // drupal_set_message(t($emp_name),'error');

  echo "<table class = 'table table-bordered'>";
  echo "<tbody>";
  $tab_row_color = array('success', 'info', 'warning', 'active',);
  $tab = 0;
  $n = 0;
  if(!($j%2==0))
  {
    $j++;
  }

  for($i = 1; $i <= $j/2; $i++){
      if($tab > 3)
        $tab = 0;
      echo "<tr class = '$tab_row_color[$tab]'>";
        
          for($k = 1; $k<=2; $k++) {

            if($k % 2 == 0) 
            {
              echo "<td>";
              echo "<td width='50%'>$query_name_row[$n] <a href=$query_pro_url[$n] target = '_blank'><i class='fa fa-eye' style='float:right'></i></a></td>";
            }
            if(!($k % 2 == 0))
            {
              echo "<td width='50%'>$query_name_row[$n] <a href=$query_pro_url[$n] target = '_blank'><i class='fa fa-eye' style='float:right'></i></a></td>";
              echo "</td>";
            }
            $n++;

          }
      echo "</tr>";
      $tab++;
    }
  echo "<tbody>";
  echo "</table>";
  // $conn->close();
  ?>
  <hr>

  <h4>Team Members</h4>

  <?php
  include_once "includes/bootstrap.inc";
  drupal_bootstrap(DRUPAL_BOOTSTRAP_DATABASE);


  $queryResult = db_query("SELECT emp_name, emp_des, profile_url FROM {emp_form_data} WHERE status = 'Active' AND emp_des != 'Professor'");
  $j = 0;
  $query_des_row = array();
  $query_name_row = array();
  $query_pro_url = array();

    foreach ($queryResult as $result) {
      $emp_name = $result->emp_name;
      $emp_des = $result->emp_des;
      $profile_url = $result->profile_url;
      $query_des_row[$j] = $emp_des;
      $query_name_row[$j] = $emp_name;
      $query_pro_url[$j] = $profile_url;
      $j++;
    }

  echo "<table class = 'table table-bordered'>";
  echo "<tbody>";
  $tab_row_color = array('success', 'info', 'warning', 'active',);
  $tab = 0;
  $n = 0;
  if(!($j%2==0))
  {
    $j++;
  }

  for($i = 1; $i <= $j/2; $i++){
      if($tab > 3)
        $tab = 0;
      echo "<tr class = '$tab_row_color[$tab]'>";
        
          for($k = 1; $k<=2; $k++) {

            if($k % 2 == 0) 
            {
              echo "<td>";
              echo "<td width='50%'>$query_name_row[$n] <sub>[$query_des_row[$n]]</sub></td>";
            }
            if(!($k % 2 == 0))
            {
              echo "<td width='50%'>$query_name_row[$n] <sub>[$query_des_row[$n]]</sub></td>";
              echo "</td>";
            }
            $n++;

          }
      echo "</tr>";
      $tab++;
    }
  echo "<tbody>";
  echo "</table>";
  ?>
  <hr>

  <h4>Past Team Members</h4>

  <?php
  include_once "includes/bootstrap.inc";
  drupal_bootstrap(DRUPAL_BOOTSTRAP_DATABASE);


  $queryResult = db_query("SELECT emp_name, emp_des, profile_url FROM {emp_form_data} WHERE status = 'Inactive' AND emp_des != 'Professor' ORDER BY update_emp_data_time DESC");
  $j = 0;
  $query_des_row = array();
  $query_name_row = array();
  $query_pro_url = array();

    foreach ($queryResult as $result) {
      $emp_name = $result->emp_name;
      $emp_des = $result->emp_des;
      $profile_url = $result->profile_url;
      $query_des_row[$j] = $emp_des;
      $query_name_row[$j] = $emp_name;
      $query_pro_url[$j] = $profile_url;
      $j++;
    }

  echo "<table class = 'table table-bordered'>";
  echo "<tbody>";
  $tab_row_color = array('success', 'info', 'warning', 'active',);
  $tab = 0;
  $n = 0;
  if(!($j%2==0))
  {
    $j++;
  }

  for($i = 1; $i <= $j/2; $i++){
      if($tab > 3)
        $tab = 0;
      echo "<tr class = '$tab_row_color[$tab]'>";
        
          for($k = 1; $k<=2; $k++) {

            if($k % 2 == 0) 
            {
              echo "<td>";
              echo "<td width='50%'>$query_name_row[$n] <sub>[$query_des_row[$n]]</sub></td>";
            }
            if(!($k % 2 == 0))
            {
              echo "<td width='50%'>$query_name_row[$n] <sub>[$query_des_row[$n]]</sub></td>";
              echo "</td>";
            }
            $n++;

          }
      echo "</tr>";
      $tab++;
    }
  echo "<tbody>";
  echo "</table>";
  ?>

  <div class="container">
    <div class="row"> 
  <h4>What our former employees say..</h4> </br>
   <div class="col-sm-4">
   <h5>Rakhi Warrier</h5>
  <div class="embed-responsive embed-responsive-4by3">
      <video controls="true" poster="<?php print drupal_get_path('theme', 'software')?>/img/portfolios/data/rakhi.png">
  <source src="https://fossee.in/data/videos/Rakhi.ogv" />
  </video>
  </div>
  </div>
      <div class="col-sm-4">
   <h5>Mukul Kulkarni</h5>
  <div class="embed-responsive embed-responsive-4by3">
      <video controls="true" poster="<?php print drupal_get_path('theme', 'software')?>/img/portfolios/data/mukul.png">
  <source src="https://fossee.in/data/videos/Mukul.ogv" />
  </video>
  </div>
  </div>
     <div class="col-sm-4">
   <h5>Aviral Chandra</h5>
  <div class="embed-responsive embed-responsive-4by3">
      <video controls="true" poster="<?php print drupal_get_path('theme', 'software')?>/img/portfolios/data/aviral.png">
  <source src="https://fossee.in/data/videos/Aviral.ogv" />
  </video>
  </div>
  </div>
      </div>
    </div>
  </div>
    </div>