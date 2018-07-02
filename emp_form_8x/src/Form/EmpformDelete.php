<?php

namespace Drupal\emp_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

use Symfony\Component\HttpFoundation\RedirectResponse;

class EmpformDelete extends FormBase {

	public function getFormId() {
		return 'emp_form';
	}

	public function buildForm(array $form, FormStateInterface $form_state) {

		$get_emp_id = \Drupal::request()->query->get('emp_id');				// Get the Employee ID for Query
		$emp_id ='';

		$results = db_query("select * from {emp_form_data} where emp_id = '$get_emp_id'");
			foreach ($results as $result) {
				$emp_name = $result->emp_name;
				$tid = $result->tid;
				$emp_des = $result->emp_des;
				$emp_id = $result->emp_id;
			}

		if( $emp_id == $get_emp_id ) {

			drupal_set_message(t("Do you want to delete *$emp_name* $emp_des Employee?"),'warning');

			$form['tid'] = array(
				'#title' => t('Primary Key'),
				'#description' => t('Serial Number'),
				'#type' => 'hidden',
				'#required' => FALSE,
				'#default_value' => $tid,
			);

			$form['submit'] = array(
				'#type' => 'submit',
				'#value' => t('Delete'),
			);

			$form['cancel'] = array(
				'#type' => 'submit',
				'#value' => t('Cancel'),
				'#submit' => array('::emp_form_delete_cancel'),
			);

		return $form;

		}
		else{
			drupal_set_message(t('Please Enter valid Employee ID'),'error');
			$response = new RedirectResponse(base_path().'/emp_form/view');
			$response->send();
		}
	
	}

	function emp_form_delete_cancel() {
		drupal_get_messages();
		$response = new RedirectResponse(base_path().'/emp_form/view');
		$response->send();
	}

	public function validateForm(array &$form, FormStateInterface $form_state) {

	}

	public function submitForm(array &$form, FormStateInterface $form_state) {
		
		$tid = $form_state->getValue('tid');
			db_delete('emp_form_data')
				->condition('tid', $tid)
				->execute();

			drupal_get_messages();
			drupal_set_message(t('Employee is deleted'));
			$response = new RedirectResponse(base_path().'/emp_form/view');
			$response->send();
		}

}