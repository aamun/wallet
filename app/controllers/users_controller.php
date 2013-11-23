<?php
/**
 * Users_controller
 * 
 * @method index($pag = null)
 * @method create()
 */
class Users_controller extends AppController {

    /**
     * Users List 
     * 
     * @param int $pag
     * @return void
     */
    public function index($pag = null){
        // TODO: Add pagination
        $user = new User();
        $this->view->users = $user->findAll();
        $this->render();
    }

    /**
     * Create user
     *
     * @return void
     */
    public function create(){

        $user = new User();

        if ($this->data) {
            $user->prepareFromArray($this->data);
            if ($user->save()) {
                $this->messages->addMessage(Message::SUCCESS, "User saved.");
            } else {
                // $this->messages->addMessage(Message::ERROR, "Ups somethings is wrong.");
            }
        }

        $this->view->user = $user;
        $this->render();
    }

    /**
     * View details of an User
     * 
     * @param int $idUser
     * @return void
     */
    public function view($idUser = null){
        $user = new User();
        $user->find($idUser);

        if ($user->isNEw() || is_null($idUser)) {
            $this->messages->addMessage(Message::WARNING, "I don't find the user: {$idUser} ");
            $this->redirect('users');
        }

        $this->view->user = $user;
        $this->render();
    }

    /**
     * Update an User
     *
     * @param int $idUser
     * @return void
     */
    public function update($idUser = null){

        $user = new User();
        $user->find($idUser);

        if ($user->isNEw() || is_null($idUser)) {
            $this->messages->addMessage(Message::WARNING, "I don't find the user: {$idUser}.");
            $this->redirect('users');
        }

        if ($this->data) {
            $user->prepareFromArray($this->data);
            if ($user->save()) {
                $this->messages->addMessage(Message::SUCCESS, "user saved.");
            } else {
                $this->messages->addMessage(Message::ERROR, "Ups somethings is wrong with my bag.");
            }
        }

        $this->view->user = $user;
        $this->render();
    }

    /**
     * Delete an User
     *
     * @param int $idUser
     * @return void
     */
    public function delete($idUser = null){
        
        $user = new User();
        $user->find($idUser);

        if ($user->isNew() || is_null($idUser)) {
            $this->messages->addMessage(Message::WARNING, "I don't find the user: {$idUser}.");
            $this->redirect('users');
        } else {
            if ($user->delete()) {
                $this->messages->addMessage(Message::SUCCESS, "Ok, One less user.");
            } else {
                $this->messages->addMessage(Message::ERROR, "Ups, something was wrong. Try again please.");
            }
        }

        $this->redirect('users');
    }

    public function dashboard(){
        $this->render();
    }
}
?>