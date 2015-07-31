<?php
trait UserTrait {
	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getAuthIdentifier() {
		return $this->getKey();
	}
	
	public function getRememberToken()
	{
	return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	return 'remember_token';
	}
}
?>
