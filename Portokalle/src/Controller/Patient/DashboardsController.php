<?php
namespace App\Controller\Patient;

use App\Controller\Patient\AppController;

class DashboardsController extends AppController
{
	public function index() {
		$session = $this->getRequest()->getSession();
		$order = null;
		if ($session->check('Booking')) {
			$this->loadModel('Orders');
			$order = $this->Orders
				->find()
				->where(['Orders.appointment_id' => $session->read('Booking.id'), 'Orders.payment_status' => 0])
				->contain(['Appointments'])
				->first();
		}

		$this->set(compact('order'));
    }
}
