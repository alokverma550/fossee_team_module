<?php

namespace Drupal\emp_form\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Component\Render\FormattableMarkup;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EmpformviewController extends ControllerBase {

	public function content() {

	$asc_img = base_path().'core/misc/icons/004875/twistie-down.svg';
	$desc_img = base_path().'core/misc/icons/004875/twistie-up.svg';

	$emp_id_sort_field = \Drupal::request()->query->get('field');
	$emp_id_sort_soft = \Drupal::request()->query->get('soft');

	
		if(\Drupal::currentUser()->isAnonymous())	{
			
				//**************************** SORT BY EMPLOYEE ID ****************************

				if( $emp_id_sort_field == 'emp_id' && $emp_id_sort_soft == 'ASC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `emp_id` ASC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=DESC">Employee ID <img src=@asc_img ></a>', ['@asc_img' => $asc_img]),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation</a>'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
					];
				}
				if($emp_id_sort_field == 'emp_id' && $emp_id_sort_soft == 'DESC') {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `emp_id` DESC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID <img src=@desc_img ></a>', ['@desc_img' => $desc_img]),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation</a>'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
					];
				}


				//**************************** SORT BY EMPLOYEE NAME ****************************

				if( $emp_id_sort_field == 'emp_name' && $emp_id_sort_soft == 'ASC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `emp_name` ASC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=DESC"">Name <img src=@asc_img ></a>', ['@asc_img' => $asc_img]),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation</a>'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
					];
				}
				if( $emp_id_sort_field == 'emp_name' && $emp_id_sort_soft == 'DESC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `emp_name` DESC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name <img src=@desc_img ></a>', ['@desc_img' => $desc_img]),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation</a>'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
					];
				}

				//**************************** SORT BY EMPLOYEE Designation ****************************

				if( $emp_id_sort_field == 'emp_des' && $emp_id_sort_soft == 'ASC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `emp_des` ASC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=DESC"">Designation <img src=@asc_img ></a>', ['@asc_img' => $asc_img]),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
					];
				}

				if( $emp_id_sort_field == 'emp_des' && $emp_id_sort_soft == 'DESC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `emp_des` DESC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation <img src=@desc_img ></a>', ['@desc_img' => $desc_img]),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
					];
				}

				//**************************** SORT BY EMPLOYEE Team Name ****************************

				if( $emp_id_sort_field == 'team_name' && $emp_id_sort_soft == 'ASC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `team_name` ASC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=DESC"">Team Name <img src=@asc_img ></a>', ['@asc_img' => $asc_img]),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
					];
				}

				if( $emp_id_sort_field == 'team_name' && $emp_id_sort_soft == 'DESC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `team_name` DESC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name <img src=@desc_img ></a>', ['@desc_img' => $desc_img]),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
					];
				}

				//**************************** SORT BY EMPLOYEE Joining Date ****************************

				if( $emp_id_sort_field == 'join_date' && $emp_id_sort_soft == 'ASC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `join_date` ASC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=DESC"">Joining Date <img src=@asc_img ></a>', ['@asc_img' => $asc_img]),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
					];
				}

				if( $emp_id_sort_field == 'join_date' && $emp_id_sort_soft == 'DESC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `join_date` DESC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date <img src=@desc_img ></a>', ['@desc_img' => $desc_img]),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
					];
				}

				//**************************** SORT BY EMPLOYEE Leaving Date ****************************

				if( $emp_id_sort_field == 'leave_date' && $emp_id_sort_soft == 'ASC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `leave_date` ASC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=DESC"">Leaving Date <img src=@asc_img ></a>', ['@asc_img' => $asc_img]),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
					];
				}

				if( $emp_id_sort_field == 'leave_date' && $emp_id_sort_soft == 'DESC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `leave_date` DESC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date <img src=@desc_img ></a>', ['@desc_img' => $desc_img]),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
					];
				}

				//**************************** SORT BY EMPLOYEE Leaving Date ****************************

				if( $emp_id_sort_field == 'status' && $emp_id_sort_soft == 'ASC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `status` ASC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=DESC"">Status <img src=@asc_img ></a>', ['@asc_img' => $asc_img]),
					];
				}

				if( $emp_id_sort_field == 'status' && $emp_id_sort_soft == 'DESC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `status` DESC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status <img src=@desc_img ></a>', ['@desc_img' => $desc_img]),
					];
				}


				if( $emp_id_sort_field == NULL)
				{
					drupal_set_message(t('s'));
					$results = db_query("SELECT * FROM {emp_form_data}");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation</a>'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
					];
				}


				$rows = array();
				foreach($results AS $result) {
					
					$rows[] = [
						'emp_id' => $result->emp_id,
						'emp_name' => $result->emp_name,
						'emp_des' => $result->emp_des,
						'team_name' => $result->team_name,
						'join_date' => $result->join_date,
						'leave_date' => $result->leave_date,
						'status' => $result->status,
					];
				}

				if(!empty($rows)) {

					 $build['config_table'] = [
						'#theme' => 'table',
						'#header' => $header,
						'#rows' => $rows,
					];
					return $build;
				}
				else {
					drupal_set_message(t('There is no Employee Data Please add and upload CSV'),'warning');
				}

		}

		else {
				
				// $emp_id_sort_field = \Drupal::request()->query->get('field');
				// $emp_id_sort_soft = \Drupal::request()->query->get('soft');

				//**************************** SORT BY EMPLOYEE ID ****************************

				if( $emp_id_sort_field == 'emp_id' && $emp_id_sort_soft == 'ASC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `emp_id` ASC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=DESC">Employee ID <img src=@asc_img ></a>', ['@asc_img' => $asc_img]),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation</a>'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
						'edit' => t('Edit'),
						'delete()' => t('Delete'),
					];
				}
				if($emp_id_sort_field == 'emp_id' && $emp_id_sort_soft == 'DESC') {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `emp_id` DESC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID <img src=@desc_img ></a>', ['@desc_img' => $desc_img]),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation</a>'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
						'edit' => t('Edit'),
						'delete()' => t('Delete'),
					];
				}


				//**************************** SORT BY EMPLOYEE NAME ****************************

				if( $emp_id_sort_field == 'emp_name' && $emp_id_sort_soft == 'ASC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `emp_name` ASC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=DESC"">Name <img src=@asc_img ></a>', ['@asc_img' => $asc_img]),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation</a>'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
						'edit' => t('Edit'),
						'delete()' => t('Delete'),
					];
				}
				if( $emp_id_sort_field == 'emp_name' && $emp_id_sort_soft == 'DESC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `emp_name` DESC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name <img src=@desc_img ></a>', ['@desc_img' => $desc_img]),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation</a>'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
						'edit' => t('Edit'),
						'delete()' => t('Delete'),
					];
				}

				//**************************** SORT BY EMPLOYEE Designation ****************************

				if( $emp_id_sort_field == 'emp_des' && $emp_id_sort_soft == 'ASC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `emp_des` ASC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=DESC"">Designation <img src=@asc_img ></a>', ['@asc_img' => $asc_img]),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
						'edit' => t('Edit'),
						'delete()' => t('Delete'),
					];
				}

				if( $emp_id_sort_field == 'emp_des' && $emp_id_sort_soft == 'DESC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `emp_des` DESC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation <img src=@desc_img ></a>', ['@desc_img' => $desc_img]),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
						'edit' => t('Edit'),
						'delete()' => t('Delete'),
					];
				}

				//**************************** SORT BY EMPLOYEE Team Name ****************************

				if( $emp_id_sort_field == 'team_name' && $emp_id_sort_soft == 'ASC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `team_name` ASC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=DESC"">Team Name <img src=@asc_img ></a>', ['@asc_img' => $asc_img]),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
						'edit' => t('Edit'),
						'delete()' => t('Delete'),
					];
				}

				if( $emp_id_sort_field == 'team_name' && $emp_id_sort_soft == 'DESC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `team_name` DESC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name <img src=@desc_img ></a>', ['@desc_img' => $desc_img]),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
						'edit' => t('Edit'),
						'delete()' => t('Delete'),
					];
				}

				//**************************** SORT BY EMPLOYEE Joining Date ****************************

				if( $emp_id_sort_field == 'join_date' && $emp_id_sort_soft == 'ASC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `join_date` ASC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=DESC"">Joining Date <img src=@asc_img ></a>', ['@asc_img' => $asc_img]),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
						'edit' => t('Edit'),
						'delete()' => t('Delete'),
					];
				}

				if( $emp_id_sort_field == 'join_date' && $emp_id_sort_soft == 'DESC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `join_date` DESC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date <img src=@desc_img ></a>', ['@desc_img' => $desc_img]),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
						'edit' => t('Edit'),
						'delete()' => t('Delete'),
					];
				}

				//**************************** SORT BY EMPLOYEE Leaving Date ****************************

				if( $emp_id_sort_field == 'leave_date' && $emp_id_sort_soft == 'ASC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `leave_date` ASC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=DESC"">Leaving Date <img src=@asc_img ></a>', ['@asc_img' => $asc_img]),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
						'edit' => t('Edit'),
						'delete()' => t('Delete'),
					];
				}

				if( $emp_id_sort_field == 'leave_date' && $emp_id_sort_soft == 'DESC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `leave_date` DESC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date <img src=@desc_img ></a>', ['@desc_img' => $desc_img]),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
						'edit' => t('Edit'),
						'delete()' => t('Delete'),
					];
				}

				//**************************** SORT BY EMPLOYEE Leaving Date ****************************

				if( $emp_id_sort_field == 'status' && $emp_id_sort_soft == 'ASC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `status` ASC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=DESC"">Status <img src=@asc_img ></a>', ['@asc_img' => $asc_img]),
						'edit' => t('Edit'),
						'delete()' => t('Delete'),
					];
				}

				if( $emp_id_sort_field == 'status' && $emp_id_sort_soft == 'DESC' ) {
					$results = db_query("SELECT * FROM {emp_form_data} ORDER BY `status` DESC");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status <img src=@desc_img ></a>', ['@desc_img' => $desc_img]),
						'edit' => t('Edit'),
						'delete()' => t('Delete'),
					];
				}


				if( $emp_id_sort_field == NULL)
				{
					$results = db_query("SELECT * FROM {emp_form_data}");
					$header = [
						'emp_id' => t('<a href="view?field=emp_id&soft=ASC">Employee ID</a>'),
						'emp_name' => t('<a href="view?field=emp_name&soft=ASC"">Name</a>'),
						'emp_des' => t('<a href="view?field=emp_des&soft=ASC"">Designation</a>'),
						'team_name' => t('<a href="view?field=team_name&soft=ASC"">Team Name</a>'),
						'join_date' => t('<a href="view?field=join_date&soft=ASC"">Joining Date</a>'),
						'leave_date' => t('<a href="view?field=leave_date&soft=ASC"">Leaving Date</a>'),
						'status' => t('<a href="view?field=status&soft=ASC"">Status</a>'),
						'edit' => t('Edit'),
						'delete()' => t('Delete'),
					];
				}


				$rows = array();
				foreach($results AS $result) {
					
					$rows[] = [
						'emp_id' => $result->emp_id,
						'emp_name' => $result->emp_name,
						'emp_des' => $result->emp_des,
						'team_name' => $result->team_name,
						'join_date' => $result->join_date,
						'leave_date' => $result->leave_date,
						'status' => $result->status,
						'edit' => t('<a href="edit?emp_id=@emp_id">Edit</a>', ['@emp_id' => $result->emp_id]),
						'delete' => t('<a href="delete?emp_id=@emp_id">Delete</a>', ['@emp_id' => $result->emp_id]),
					];
				}

					if(!empty($rows)) {

						 $build['config_table'] = [
							'#theme' => 'table',
							'#header' => $header,
							'#rows' => $rows,
						];

						return $build;
						
					}
					else {
						drupal_set_message(t('There is no Employee Data Please add and upload CSV'),'warning');
						$response = new RedirectResponse(base_path().'/emp_form/add');
						$response->send();
					}

		}

	}
}