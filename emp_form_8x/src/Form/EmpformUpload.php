<?php

namespace Drupal\emp_form\Form;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

use Symfony\Component\HttpFoundation\RedirectResponse;
require_once(DRUPAL_ROOT.'/'.drupal_get_path('module', 'emp_form').'/parsecsv-for-php/parsecsv.lib.php');

class EmpformUpload extends FormBase {

	public function getFormId() {
		return 'EmpformUpload';
	}

	public function buildForm(array $form, FormStateInterface $form_state) {

		$form['csv_file'] = array(
		'#type' => 'file',
		'#name' => 'files[csv_file]',
		'#title' => t('Choose a csv file'),
		'#title_display' => 'invisible',
		'#size' => 22,
		// '#upload_validators' => array('file_clean_name' => array()),
		);

		$form['upload'] = array(
			'#type' => 'submit',
			'#value' => 'Upload',
		);

		return $form;

	}

	public function validateForm(array &$form, FormStateInterface $form_state) {



		if(!isset($_FILES['files']['name']['csv_file']))
			drupal_set_message(t("ERROR upload CSV File"),'error');

		$file_path = $_FILES['files']['tmp_name']['csv_file'];
		// max_upload_code

		$csv = new \ParseCsv\Csv($file_path);
		
		// Check CSV HEADER
		$std_header = array('emp_id' => 0, 'emp_name' => 0, 'emp_des' => 0, 'team_name' => 0, 'join_date' => 0, 'leave_date' => 0, 'status' => 0);

		$user_header = array_keys($csv->data[0]);

	foreach($user_header as $i=>$value)
    {
        if(!in_array($value, array_keys($std_header))) {
        	drupal_set_message(t('Field '.'"'.$value.'"'.' does not match any expected field'), 'error');
        	$form_state['csv_error_flag'] = TRUE;
        }
        else
            $std_header[$value]++;
    }
    foreach($std_header as $key=>$value)
    {
        if($value > 1) {
        	drupal_set_message(t("Multiple values for field ".$key), 'error');
        	$form_state['csv_error_flag'] = TRUE;
        }
        else if($value == 0 and !in_array($key, array('emp_team', 'join_date', 'leave_date', 'emp_des')))
           { drupal_set_message(t("Field ".$key." is missing"), 'error'); $form_state['csv_error_flag'] = TRUE; }
    }

    if(null !== $form_state->get('csv_error_flag'))
    	return;

    // Check CSV DATA

    foreach($csv->data as $rno=>$row)
    {
        foreach($row as $key=>$value)
        {
            if( !in_array($key, array('emp_team', 'join_date', 'leave_date', 'emp_des')) and ($value == '' or $value == NULL)) {
            	drupal_set_message(t("Missing value for field '".$key."' in row ".($rno+1)), 'error');
            	$form_state['csv_error_flag'] = TRUE;
            }
        }
    }

	}

	public function submitForm(array &$form, FormStateInterface $form_state) {


		if(null !== $form_state->get('csv_error_flag'))
        return;

    $file_path = $_FILES['files']['tmp_name']['csv_file'];
    $csv = new \ParseCsv\Csv($file_path);
    $fields = array_keys($csv->data[0]);
    $insertquery = db_insert('emp_form_data')->fields($fields);

    $count = count( $csv->data );
   
  	for($i = 0; $i<=($count - 2); $i++) {

  		for($j = $i + 1; $j<=($count - 1); $j++) {
  			if($csv->data[$i] == $csv->data[$j] ) {
  				$i = $i +1;
  				$j = $j +1;
  				drupal_set_message(t("Repeat Employee DATA in  $i and $j row"), 'error');
  				return;
  			}


  		}
  	}

  	foreach($csv->data as $i=>$record) {
  		$cl[] = $record['emp_id'];
  	}

  	for($i = 0; $i<=($count - 2); $i++) {

  		for($j = $i + 1; $j<=($count - 1); $j++) {
  			if($cl[$i] == $cl[$j] ) {
  				$i = $i +1;
  				$j = $j +1;
  				drupal_set_message(t("Repeat Employee ID in  $i and $j row"), 'error');
  				return;
  			}


  		}
  	}


    foreach($csv->data as $i=>$record)
    {   
    	
    	$cl = $record['emp_id'];					// Check employee data after the upload
    	$emp_id = NULL;
    	$rows =array();
    	$results = db_query("select * from {emp_form_data} where emp_id = '$cl'");
    		foreach ($results as $result) {
			$rows[] = array(
			$emp_id = $result->emp_id,
			);
		}
    	if($emp_id == $cl) {
        	drupal_set_message(t("Employee ID $cl Already Exists in Employee List"),'error');
            return;
        }

        if($record['emp_id'] == NULL or $record['emp_id'] == '') {
        	drupal_set_message(t('No Employee Name in CSV'),'error');
            return;
        }	// $record['starttime'] = "00:00";
        else if($record['emp_name'] == NULL or $record['emp_name'] == '') {
            drupal_set_message(t('No Employee Name in CSV'),'warning');
            return;	// $record['endtime'] = "00:00";
        }
        $insertquery->values($record);
    }
    $insertquery->execute();
    drupal_set_message(t("Successfully submitted"));
		
	}


}