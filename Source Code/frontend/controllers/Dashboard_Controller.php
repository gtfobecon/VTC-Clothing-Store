<?php
class Dashboard_Controller extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $this->layout->set('auth_layout');
        $money_by_month = $this->model->dashboard->select_quantity_each_category();
        $money = $this->model->dashboard->select_money_each_category();
        $this->view->load("dashboard/index", [
            'money_by_month' => $money_by_month,
            'money' => $money,
        ]);
    }
}
