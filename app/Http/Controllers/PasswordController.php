<?php namespace App\Http\Controllers;

use App\API\API;

use App\API\Connectors\APIUser;
use App\API\Connectors\APIConfig;
use App\API\Connectors\APISendMail;

use Input, Session, Redirect, Auth, Socialite, Validator, App, BalinMail;

/**
 * Used for Password Controller
 * 
 * @author cmooy
 */
class PasswordController extends BaseController 
{
	protected $controller_name 				= 'Password';

	public function __construct()
	{
		parent::__construct();

		Session::set('API_token', Session::get('API_token_private'));
		
		$this->page_attributes->title		= 'BALIN.ID';
	}

	/**
	 * function to get forgot link
	 *
	 * @param email
	 */
	public function forgot()
	{
		/* set api token use token public */
		Session::set('API_token', Session::get('API_token_public'));
	
		$breadcrumb										= 	[
																'Lupa Password' => ''
															];

		$email 											= Input::Get('email');

		$API_me 										= new APIUser;
		$whoami 										= $API_me->postForgot([
																'email'	=> $email,
															]);
		//check if reset password fail
		if ($whoami['status'] != 'success')
		{
			return Redirect::route('balin.home.index')->withErrors($whoami['message'])->with('msg-type', 'danger');
		}
		else
		{
			//send reset password mail
			$infos 								= [];
			foreach ($this->balin['info'] as $key => $value) 
			{
				$infos[$value['type']]			= $value['value'];
			}

			$infos['action']					= route(env('ROUTE_BALIN_RESET_PASSWORD'), $whoami['data']['reset_password_link']);

			//generate view
			$this->page_attributes->data 				= 	[
																'me'	=> $whoami['data'],
															];

			$this->page_attributes->subtitle 			= 'Lupa Password';
			$this->page_attributes->breadcrumb			= array_merge($breadcrumb);
			$this->page_attributes->source 				= 'web_v2.pages.profile.password.forgot';

			return $this->generateView();
		}
	}

	/**
	 * function to get form of reset password
	 *
	 * @param reset link
	 */
	public function reset($link = null)
	{
		/* set api token use token public */
		Session::set('API_token', Session::get('API_token_public'));

		$API_me 										= new APIUser;
		$result 										= $API_me->getReset([
																'link'	=> $link,
															]);
		if (isset($result['message']))
		{
			return Redirect::route('balin.home.index')->withErrors($result['message'])->with('msg-type', 'danger');
		}
		else
		{
			Session::put('reset_password_mail', $result['data']['email']);

			$this->page_attributes->data 				= 	[
																'me'	=> $result['data'],
															];

			$this->page_attributes->subtitle 			= 'Lupa Password';
			$this->page_attributes->breadcrumb			= [];
			$this->page_attributes->source 				= 'web_v2.pages.profile.password.reset';

			return $this->generateView();
		}
	}

	/**
	 * function to post reseted password
	 *
	 * @param new password
	 */
	public function change()
	{
		/* set api token use token public */
		Session::set('API_token', Session::get('API_token_public'));
	
		$breadcrumb									= 	[
															'Reset Password' => ''
														];
		if(Input::has('password'))
		{
			$rules 									= ['password' => 'min:8|confirmed'];

			$validator 								= Validator::make(Input::only('password', 'password_confirmation'), $rules);

			if(!$validator->passes())
			{
				return Redirect::route('balin.home.index')->withErrors($validator->errors())->with('msg-type', 'danger');
			}

			$password 								= Input::get('password');
		}
		else
		{
			\App::abort(404);
		}

		$email 										= Session::get('reset_password_mail');

		$API_me 									= new APIUser;
		$result 									= $API_me->postChangePassword([
																'email'	=> $email,
																'password' => $password,
															]);

		if (isset($result['message']))
		{
			return Redirect::route('balin.home.index')->withErrors($result['message'])->with('msg-type', 'danger');
		}
		else
		{
			$this->page_attributes->data 				= 	[
																'me'	=> $result['data'],
															];

			$this->page_attributes->subtitle 			= 'Reset Password';
			$this->page_attributes->breadcrumb			= array_merge($breadcrumb);
			$this->page_attributes->source 				= 'web_v2.pages.profile.password.changed';

			return $this->generateView();
		}
	}
}