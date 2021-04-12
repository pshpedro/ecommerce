<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

Class User extends Model{

	const SESSION = "Sessao_do_usuario";

	public static function login($login,$password){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array("LOGIN"=>$login));

		if (count($results) === 0)
		{
			throw new \Exception("Usuário inválido");
			
		}

		$dados = $results[0];

		if (password_verify($password, $dados["despassword"]) === true)
		{
			$user = new User();

			$user->setData($dados);
			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		}else
		{
			throw new \Exception("Senha inválida");
		}
	}

	public static function verifyLogin($inadmin = true)
	{

		if(
			!isset($_SESSION[User::SESSION]) 
			|| !$_SESSION[User::SESSION] 
			|| !(int)$_SESSION[User::SESSION]["iduser"] > 0
			|| (bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin
		  ){

			header("Location: /admin/login");
			exit;
		}
		
	}

	public static function logout()
	{
		$_SESSION[User::SESSION] = NULL;
	}


}

?>