<?php
/**
* Login_controller
*/
class Login_controller extends AppController
{
	public function index($id = null){

		$user = new User();
		if ($this->data && isset($this->data['email']) && isset($this->data['password'])) {
			if ($user->login($this->data['email'], $this->data['password'])) {
				
				// Set user data in session
				$this->session['login'] = true;

				// Redirect to dashboard
				$this->redirect('users/dashboard');
			}
		}

		$this->view->user = $user;
		$this->render();
	}

	public function logout(){
		$this->session->destroy();
	}
}
?>