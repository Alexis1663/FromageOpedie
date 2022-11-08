<?php

class	Connection	extends PDO	{	
	private $stmt;
	
	
	/*	*	Constructeur de Connection
		* Prend un parametres :
			*	un DSN (Data Source Name)
				* de forme : <database>:host=<host>;dbname=<dbname>
				* avec :
					*<database> : le type de base de données (comme "mysql")
					*<host> : l endroit où est stocké la bdd (peut etre localhost)
					*<dbname> : le nom de la base de données

			*	un nom d utilisateur
			*	un mot de passe utilisateur
	*/

	public	function __construct(string	$dsn,	string	$username,	string	$password)	
	{	
		parent::__construct($dsn,$username,$password);	
		$this->setAttribute(PDO::ATTR_ERRMODE,	PDO::ERRMODE_EXCEPTION);	
	}
	
	/**	
	*	@param string	$query
	*	@param array $parameters *	
	*	@return	bool Returns `true`	on	success,	`false`	otherwise 
	*/	
	
	/*	*	Permet d'executer une requete
		*Prend en parametres :
			*	une querry (requete)
				* 'SELECT unTruc FROM uneTable WHERE id=:i AND bidule=:b'

			*	un tableau de parametres pour la requete (utilisés dans le WHERE)
				
				*	Un parametre est presente de cette maniere :
					*	Un nom : dans la requete au dessus : "i" et "b" pour les deux paramètres
					*	Une premiere valeur : la valeur qui sera cherchée (120125 pour "i" par exemple)
					*	Une seconde valeur : elle viendra préciser le type du parametre (PDO::PARAM_STR pour un string)

					* A voir plus bas l exemple,  le tableau de parametres utilise des array pour les valeurs

		*	Retourne un booleen en fonction de si la requete s'est executee sans probleme ou non

	*/
	public	function executeQuery(string	$query,	array $parameters =	[])	:bool 
	{	
		$this->stmt =	parent::prepare($query);	
		foreach ($parameters as	$name =>	$value)	
		{	
			$this->stmt->bindValue($name,	$value[0],	$value[1]);	
		}	
			
		return	$this->stmt->execute();	
		
	}


	// Pour avoir le résultat d'une requete
	public	function getResults():	array 
	{	
		return	$this->stmt->fetchall();
	}
}


/*
*	Utilisation de la classe
*	Construire une nouvelle Connection
			$con=new	Connection('mysql:host=localhost;dbname=test’, $user, $pass)

			* On initie deux variables qui vont servir de parametres a la requete
			$id=1;	$name=‘toto’;

			* On defini la requete a executer
			$query =	'UPDATE	news	SET	name =	:name WHERE	id	=	:id';
			

			* On execute la requete via la fonction executeQuery. On lui donne pour ça, la querry et les parametres

			$con->executeQuery($query,	array(':id'	=>	array($id,PDO::PARAM_STR), ':name' => array($name,PDO::PARAM_STR)));

			
			* On recupere les resultats de la requete si besoin (comme apres un SELECT par exemple)
			$results=$con->	getResults();


*/
?>
