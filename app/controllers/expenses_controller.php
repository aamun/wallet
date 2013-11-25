<?php
/**
 * Expenses_controller
 * 
 * @method index($pag = null)
 * @method create()
 */
class Expenses_controller extends AppController {

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
        $this->view->setLayout('panel');
    }

    /**
     * Expenses List 
     * 
     * @param int $pag
     * @return void
     */
    public function index($page = null){
        
        // Calculate pagination
        $page = is_null($page) || !is_numeric($page) ? 1 : $page;
        $limit = 10;
        $offset = (($page-1) * $limit);
        $limitQuery = $offset.",".$limit;
        $targetpage = $this->path.'incomes/';

        // Get expenses
        $expense = new Expense();
        $this->view->expenses = $expense->findAll(null, null, $limitQuery, "WHERE idUser = {$this->session['idUser']} ORDER BY expense_date");

        // Init pagination
        $this->view->pagination = $this->pagination->init($expense->getTotal(), $page, $limit, $targetpage);
        $this->render();
    }

    /**
     * Create expenses
     *
     * @return void
     */
    public function create(){

        $expense = new Expense();

        if ($this->data) {
            $expense->prepareFromArray($this->data);
            $expense['idUser'] = $this->session['idUser'];
            if ($expense->save()) {
                $this->messages->addMessage(Message::SUCCESS, "Expense saved.");
                $this->redirect("expenses");
            } else {
                $this->messages->addMessage(Message::ERROR, "Ups somethings is wrong with my bag.");
            }
        }

        $this->view->expense = $expense;
        $this->render();
    }

    /**
     * View details of an Expense
     * 
     * @param int $idExpense
     * @return void
     */
    public function view($idExpense = null){
        $expense = new Expense();
        $expense->find($idExpense);

        if ($expense->isNEw() || is_null($idExpense)) {
            $this->messages->addMessage(Message::WARNING, "I don't find the Expense: {$idExpense} ");
            $this->redirect('expenses');
        }

        $this->view->expense = $expense;
        $this->render();
    }

    /**
     * Update an Expense
     *
     * @param int $idExpense
     * @return void
     */
    public function update($idExpense = null){

        $expense = new Expense();
        $expense->find($idExpense);

        if ($expense->isNEw() || is_null($idExpense)) {
            $this->messages->addMessage(Message::WARNING, "I don't find the expense: {$idExpense}.");
            $this->redirect('expenses');
        }

        if ($this->data) {
            $expense->prepareFromArray($this->data);
            if ($expense->save()) {
                $this->messages->addMessage(Message::SUCCESS, "Expense saved.");
            } else {
                $this->messages->addMessage(Message::ERROR, "Ups somethings is wrong with my bag.");
            }
        }

        $this->view->expense = $expense;
        $this->render();
    }

    /**
     * Delete an Expense
     *
     * @param int $idExpense
     * @return void
     */
    public function delete($idExpense = null){
        
        $expense = new Expense();
        $expense->find($idExpense);

        if ($expense->isNew() || is_null($idExpense)) {
            $this->messages->addMessage(Message::WARNING, "I don't find the expense: {$idExpense}.");
            $this->redirect('expenses');
        } else {
            if ($expense->delete()) {
                $this->messages->addMessage(Message::SUCCESS, "Ok, One less expense.");
            } else {
                $this->messages->addMessage(Message::ERROR, "Ups, something was wrong. Try again please.");
            }
        }

        $this->redirect('expenses');
    }
}
?>