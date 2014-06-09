<?php
class WebUser extends CWebUser
{
	/**
	 * Overrides a Yii method that is used for roles in controllers (accessRules).
	 *
	 * @param string $operation Name of the operation required (here, a role).
	 * @param mixed $params (opt) Parameters for this operation, usually the object to access.
	 * @return bool Permission granted?
	 */
	public function checkAccess($operation, $params=array())
	{
		if (empty($this->id)) {
			// Not identified => no rights
			return true;
		}
		$role = $this->getState("roles");

		if($operation==='ponudi_pomoc') {
			if($role === User::USER_ROLE_VOLONTER OR $role === User::USER_ROLE_KOMPLETAN OR User::USER_ROLE_ADMIN){
				return false;
			}
			return true;
		}

		if($operation==='profile') {
			if($role === User::USER_ROLE_VOLONTER OR $role === User::USER_ROLE_KOMPLETAN){
				return true;
			}
			return false;
		}

		if($operation==='admin') {
			if($role === User::USER_ROLE_ADMIN)
				return true;
			return false;
		}

		if ($role === 'akcija') {
			return 'akcija'; // admin role has access to everything
		}
		if ($role === 'pomoc') {
			return 'pomoc'; // admin role has access to everything
		}
		if ($role === 'sve') {
			return 'sve'; //Regular Teaching Professor, has limited access
		}
		if ($role === 'admin') {
			return 'admin'; //Regular Teaching Professor, has limited access
		}
		// allow access if the operation request is the current user's role
		return ($operation === $role);
	}
	public function isAdmin() {
		if (empty($this->id)) {
			// Not identified => no rights
			return false;
		}
		$role = $this->getState("roles");
		if($role === User::USER_ROLE_ADMIN)
			return true;
		return false;
	}
	public function haveHelp() {
		if (empty($this->id)) {
			// Not identified => no rights
			return false;
		}
		$role = $this->getState("roles");
		if($role === User::USER_ROLE_POKRETAC)
			return false;
		return true;
	}
	public function haveAction() {
		if (empty($this->id)) {
			// Not identified => no rights
			return false;
		}
		$role = $this->getState("roles");
		if($role === User::USER_ROLE_VOLONTER)
			return false;
		return true;
	}
}