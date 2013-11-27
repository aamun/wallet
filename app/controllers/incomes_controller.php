<?php
/**
 * Incomes_controller
 * 
 * @method index($pag = null)
 * @method create()
 */
class Incomes_controller extends AppController {

    /**
     *
     *
     */
    public function beforeDispach(){
        if (!$this->session->check('login')) {
            $this->redirect('login');
        }
    }

    public function beforeRender(){
        parent::beforeRender();
        $this->view->activeDashboardMenu = array('', '', 'active');
    }

    /**
     * Incomes List 
     * 
     * @param int $page
     * @return void
     */
    public function index($page = null){

        
        // Pagination
        $page = is_null($page) || !is_numeric($page) ? 1 : $page;
        $limit = 10;
        $offset = (($page-1) * $limit);
        $limitQuery = $offset.",".$limit;
        $targetpage = $this->path.'incomes/';

        $income = new Income();
        $this->view->incomes = $income->findAll(null, null, $limitQuery, "WHERE idUser = '{$this->session['idUser']}' ORDER BY income_date");

        // Total rows
        $totalRows = $income->getTotal();
        $this->view->pagination = $this->pagination->init($totalRows, $page, $limit, $targetpage);

        $this->view->setLayout('panel');
        $this->render();
    }

    /**
     * Create incomes
     *
     * @return void
     */
    public function create(){

        $income = new Income();
        $income['income_date'] = date('Y-m-d');

        if ($this->data) {
            $income->prepareFromArray($this->data);
            // Set user id
            $income['idUser'] = $this->session['idUser'];

            if ($income->save()) {
                $this->messages->addMessage(Message::SUCCESS, "Yay money!!!");
                $this->redirect('incomes');
            } else {
                $this->messages->addMessage(Message::ERROR, "Ups somethings is wrong with my bag.");
            }
        }

        $this->view->income = $income;
        $this->view->setLayout('panel');
        $this->render();
    }

    /**
     * View details of an income
     * 
     * @param int $idIncome
     * @return void
     */
    public function view($idIncome = null){
        $income = new Income();
        $income->find($income);

        if ($income->isNEw() || is_null($idIncome)) {
            $this->messages->addMessage(Message::WARNING, "I don't find the income: {$idIncome} ");
            $this->redirect('incomes');
        }

        $this->view->income = $income;
        $this->view->setLayout('panel');
        $this->render();
    }

    /**
     * Update an income
     *
     * @param int $idIncome
     * @return void
     */
    public function update($idIncome = null){

        $income = new Income();
        $income->find($idIncome);

        if ($income->isNEw() || is_null($idIncome)) {
            $this->messages->addMessage(Message::WARNING, "I don't find the income: {$idIncome} ");
            $this->redirect('incomes');
        }

        if ($this->data) {
            $income->prepareFromArray($this->data);
            if ($income->save()) {
                $this->messages->addMessage(Message::SUCCESS, "Yay money!!!");
                $this->redirect('incomes');
            } else {
                $this->messages->addMessage(Message::ERROR, "Ups somethings is wrong with my bag.");
            }
        }

        $this->view->income = $income;
        $this->view->setLayout('panel');
        $this->render();
    }

    /**
     * Delete an income
     *
     * @param int $idIncome
     * @return void
     */
    public function delete($idIncome = null){
        
        $income = new Income();
        $income->find($idIncome);

        if ($income->isNEw() || is_null($idIncome)) {
            $this->messages->addMessage(Message::WARNING, "I don't find the income: {$idIncome}");
            $this->redirect('incomes');
        } else {
            if ($income->delete()) {
                $this->messages->addMessage(Message::SUCCESS, "We are loosing money :c");
            } else {
                $this->messages->addMessage(Message::ERROR, "Ups, something was wrong. Try again please.");
            }
        }

        $this->redirect('incomes');
    }
}
?>