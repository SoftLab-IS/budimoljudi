<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = User::model()->getUser($this->username, $this->password);

		if ($user == null)
		{
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
			return false;
		}
		else
		{
			$this->id = $user->id;
			Yii::app()->session['id'] = $user->id;
			Yii::app()->session['level'] = $user->type;
			Yii::app()->session['fullname'] = $user->name;
			$this->setState('roles', $user->type);

			$this->errorCode = self::ERROR_NONE;
			return true;
		}
	}
	public function getId(){
		return $this->id;
	}
}