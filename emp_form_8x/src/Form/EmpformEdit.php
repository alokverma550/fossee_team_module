<?php


namespace Drupal\emp_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

use Symfony\Component\HttpFoundation\RedirectResponse;


class EmpformEdit extends FormBase {
	public function getFormId() {
		return 'emp_form';
	}

	public function buildForm(array $form, FormStateInterface $form_state) {


		$get_emp_id = \Drupal::request()->query->get('emp_id');				// Get the Employee ID for Query
		$emp_id ='';

		$results = db_query("select * from {emp_form_data} where emp_id = '$get_emp_id'");
			foreach ($results as $result) {
				$emp_name = $result->emp_name;
				$emp_des = $result->emp_des;
				$tid = $result->tid;
				$emp_id = $result->emp_id;
				$team_name = $result->team_name;
				$join_date = $result->join_date;
				$leave_date = $result->leave_date;
				$status = $result->status;
			}

		if( $emp_id == $get_emp_id ) {

			$form['tid'] = array(
				'#title' => t('Primary Key'),
				'#description' => t('Serial Number'),
				'#type' => 'hidden',
				'#required' => FALSE,
				'#default_value' => $tid,
			);
	
			$form['emp_id'] = array(
				'#title' => t('Employee ID'),
				'#description' => t('The Employee\'s ID'),
				'#type' => 'textfield',
				'#required' => TRUE,
				'#default_value' => $emp_id,
			);

			$form['emp_name'] = array(
				'#title' => t('Employee Name'),
				'#description' => t('The Employee\'s name'),
				'#type' => 'textfield',
				'#required' => TRUE,
				'#default_value' => $emp_name,
			);

			$form['emp_des'] = array(
				'#title' => t('Employee Designation'),
				'#description' => t('The Employee\'s Designation'),
				'#type' => 'textfield',
				'#required' => TRUE,
				'#default_value' => $emp_des,
			);

			$form['team_name'] = array(
				'#title' => t('Team Name'),
				'#description' => t('The Team\'s Name'),
				'#type' => 'textfield',
				'#required' => FALSE,
				'#default_value' => $team_name,
			);

			$form['join_date'] = array(
				'#type' => 'date',
				'#date_format' => 'j F Y',
				'#title' => t('Joining Date'),
				'#default_value' => $join_date,
			);

			$form['leave_date'] = array(
				'#type' => 'date',
				'#date_format' => 'j F Y',
				'#title' => t('Leaving Date'),
				'#default_value' => $leave_date,
			);

			$form['status'] = array(
				'#title' => t('Employee Status'),
				'#type' => 'radios',
				'#description' => t('Employee Status'),
				'#required' => TRUE,
				'#default_value' => $status,
				'#options' =>array('Active' => t('Active'),'Inactive' => t('Inactive'),),
			);

			$form['update_emp_data_time'] = array(
				'#title' => t('Update Time and date'),
				'#type' => 'hidden',
				'#default_value' => format_date(strtotime('now'), 'custom', 'Y-m-d H:i:s'),
			);

			$form['submit'] = array(
				'#type' => 'submit',
				'#value' => t('Save'),
			);

			$form['cancel'] = array(
				'#type' => 'submit',
				'#value' => t('Cancel'),
				'#submit' => array('::emp_form_edit_cancel'),
			);

		return $form;

		}
		else{
			drupal_set_message(t('Please Enter valid Employee ID'),'error');
			$response = new RedirectResponse(base_path().'/emp_form/view');
			$response->send();
		}
	
	}

	function emp_form_edit_cancel() {
		$response = new RedirectResponse(base_path().'/emp_form/view');
		$response->send();
	}

	public function validateForm(array &$form, FormStateInterface $form_state) {

	}


	public function submitForm(array &$form, FormStateInterface $form_state) {
		
		$tid = $form_state->getValue('tid');
			db_merge('emp_form_data')
				->key(array('tid' => $tid))
				->fields(array(
					'emp_name' => $form_state->getValue('emp_name'),
					'emp_des' => $form_state->getValue('emp_des'),
					'emp_id' => $form_state->getValue('emp_id'),
					'team_name' => $form_state->getValue('team_name'),
					'join_date' => $form_state->getValue('join_date'),
					'leave_date' => $form_state->getValue('leave_date'),
					'status' => $form_state->getValue('status'),
					'update_emp_data_time' => $form_state->getValue('update_emp_data_time'),
				))
				->execute();

			drupal_set_message(t('Employee Details is edited'));
			$response = new RedirectResponse(base_path().'/emp_form/view');
			$response->send();
		}
}