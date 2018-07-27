<link rel="stylesheet" href="<?php print $GLOBALS['base_url']; ?>/sites/all/themes/software_responsive_theme/css/fossee.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">

<div class="container" style="line-height:2em">
  FOSSEE (Free and Open Source Software in Education) project promotes the use of FOSS tools to improve the quality of education in our country. We aim to reduce dependency on proprietary software in educational institutions. We encourage the use of FOSS tools through various activities to ensure commercial software is replaced by equivalent FOSS tools. We also develop new FOSS tools and upgrade existing tools to meet requirements in academia and research. </br>
  The FOSSEE project is part of the National Mission on Education through Information and Communication Technology (ICT), Ministry of Human Resources and Development, Government of India. <hr>
<hr>

<!-- **********************  Active Members  ********************** -->

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
  echo "<div id='accordion-resizer' style='border:0px solid #000;margin:auto;float:left;'>";
  echo "<div id='accordion' >";
  echo "<h3>Active Members</h3>";
  $n = 0;
      echo "<div>";
      echo "<ul>";
  for($i = 1; $i <= $j; $i++){
              echo "<li>$query_name_row[$n] <a href=$query_pro_url[$n] target = '_blank'><i class='fa fa-eye' style='float:right'></i></a></li>";
              $n++;
    }
      echo "</ul>";
      echo "</div>";
  echo "</div>";
  echo "</div>";
?>

<!--  ********************** Team Members  **********************  -->

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
  echo "<div id='accordion-resizer1' style='border:0px solid #000;margin:auto;float:left;'>";
  echo "<div id='accordion1' >";
  echo "<h3>Team Members</h3>";
  $n = 0;
      echo "<div>";
        echo "<ul>";
  for($i = 1; $i <= $j; $i++){
            echo "<li>$query_name_row[$n] <sub>[$query_des_row[$n]]</sub></li>";
            $n++;
    }
        echo "<ul>";
      echo "</div>";
  echo "</div>";
  echo "</div>";
?>

<!--  **********************  Past Team Member  **********************  -->
  
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
  echo "<div id='accordion-resizer2' style='border:0px solid #000;margin:auto;float:left;'>";
  echo "<div id='accordion2' >";
  echo "<h3>Past Members</h3>";
  $n = 0;
    echo "<div>";
        echo "<ul>";
  for($i = 1; $i <= $j; $i++){
              echo "<li>$query_name_row[$n] <sub>[$query_des_row[$n]]</sub></li>";
            $n++;
    }
        echo "<ul>";
      echo "</div>";
  echo "</div>";
  echo "</div>";
?>

<style>
  #accordion-resizer {
    padding: 10px;
    width: 330px;
    height: 250px;
  }
  #accordion-resizer1 {
    padding: 10px;
    width: 330px;
    height: 250px;
  }
  #accordion-resizer2 {
    padding: 10px;
    width: 330px;
    height: 250px;
  }
  .ui-accordion .ui-accordion-content {
    padding: 1em 0.3em;
    border-top: 0;
    overflow: auto;
  }
  .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {
    border: 1px solid #5a5a5a;
    background: #5a5a5a;
    font-weight: normal;
    color: #ffffff;
}
.content h3, .media h3 {
    margin-top: 0;
    color: #ffffff;
    font-size: 20px;
}
</style>
<script>
    $( "#accordion" ).accordion({collapsible: true,heightStyle: "fill"});
    $( "#accordion1" ).accordion({collapsible: true,heightStyle: "fill"});
    $( "#accordion2" ).accordion({collapsible: true,heightStyle: "fill"});
  </script>
<hr>
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