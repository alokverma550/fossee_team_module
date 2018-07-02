<?php


namespace Drupal\emp_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;


class EmpForm extends FormBase {

	public function getFormId() {
		return 'emp_form';
	}

	public function buildForm(array $form, FormStateInterface $form_state) {
	
		$form['emp_id'] = array(
			'#title' => t('Employee ID'),
			'#description' => t('The Employee\'s ID'),
			'#type' => 'textfield',
			'#required' => TRUE,
		);

		$form['emp_name'] = array(
			'#title' => t('Employee Name'),
			'#description' => t('The Employee\'s name'),
			'#type' => 'textfield',
			'#required' => TRUE,
		);

		$form['emp_des'] = array(
			'#title' => t('Employee Designation'),
			'#description' => t('The Employee\'s Designation'),
			'#type' => 'textfield',
			'#required' => TRUE,
		);

		$form['team_name'] = array(
			'#title' => t('Team Name'),
			'#description' => t('The Team\'s Name'),
			'#type' => 'textfield',
			'#required' => FALSE,
		);

		$form['join_date'] = array(
			'#type' => 'date',
			'#date_format' => 'j F Y',
			'#title' => t('Joining Date'),
		);

		$form['leave_date'] = array(
			'#type' => 'date',
			'#date_format' => 'j F Y',
			'#title' => t('Leaving Date'),
		);

		$form['status'] = array(
			'#title' => t('Employee Status'),
			'#type' => 'radios',
			'#description' => t('Employee Status'),
			'#required' => TRUE,
			'#options' =>array('Active' => t('Active'),'Inactive' => t('Inactive'),),
		);

		$form['submit'] = array(
			'#type' => 'submit',
			'#value' => t('Save'),
		);

		return $form;
	}

	public function validateForm(array &$form, FormStateInterface $form_state) {

	}


	public function submitForm(array &$form, FormStateInterface $form_state) {
		$emp_id_new = $form_state->getValue('emp_id');
		$emp_id = '';
		$rows =array();
		$results = db_query("select * from {emp_form_data} where emp_id = '$emp_id_new'");
			foreach ($results as $result) {
			$rows[] = array(
				$emp_id = $result->emp_id,
				$emp_name = $result->emp_name,
				$emp_des = $result->emp_des,
			);
		}

		if($emp_id_new != $emp_id) {
		db_insert('emp_form_data')
			->fields(array(
				'emp_name' => $form_state->getValue('emp_name'),
				'emp_des' => $form_state->getValue('emp_des'),
				'emp_id' => $form_state->getValue('emp_id'),
				'team_name' => $form_state->getValue('team_name'),
				'join_date' => $form_state->getValue('join_date'),
				'leave_date' => $form_state->getValue('leave_date'),
				'status' => $form_state->getValue('status'),
			))
			->execute();

		drupal_set_message(t('Your Form submitted'));
		}
		else {
		drupal_set_message(t("Employee $emp_id is Already Exists as $emp_name"),'error');
		}

	}
}