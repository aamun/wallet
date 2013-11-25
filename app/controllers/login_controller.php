<?php
/**
* Login_controller
*/
class Login_controller extends AppController {	

	public function beforeRender(){
		$this->view->setLayout('index');
	}
	/**
	 * Log in user
	 * @return void
	 */
	public function index($id = null){

		// if user is sign in
		if ($this->session->check('login')) {
			// Redirect to dashboard
			$this->redirect("users/dashboard");
		}

		$user = new User();
		if ($this->data && isset($this->data['email']) && isset($this->data['password'])) {
			if ($user->login($this->data['email'], $this->data['password'])) {
				
				// Set user data in session
				$this->session['login'] = true;
				$this->session['idUser'] = $user['idUser'];

				// Redirect to dashboard
				$this->redirect('users/dashboard');
			} else {
				$this->messages->addMessage(Message::WARNING, "Wrong Username/Email and password combination.");
			}
		}

		$this->view->user = $user;
		$this->render();
	}

	/**
	 * Log out user
	 *
	 * @return void
	 */
	public function logout(){

		// Destroy session
		$this->session->destroy('login');
		$this->session->destroy('idUser');

		// Redirect to index page
		$this->redirect('index');
	}
}
?>