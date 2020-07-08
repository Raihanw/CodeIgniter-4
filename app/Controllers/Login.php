<?php namespace App\Controllers;
use App\Models\Usermodel;
class Login extends BaseController
{
	public function index()
	{
		return view('login_view');
	}
	
	public function act()
	{
		$model = new Usermodel();

		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
		$cek = $model->getData($email, $password);
		if (($cek['user_email'] == $email) && ($cek['password'] == $password)) 
		{
			session()->set('user_id', $cek['user_id']);
			session()->set('user_nama', $cek['user_nama']);
			return redirect()->to(base_url('main'));
		}
		else 
		{
			return redirect()->to(base_url('login'));
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url('login'));
	}

}
