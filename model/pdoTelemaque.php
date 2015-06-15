<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application GSB
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoTelemaque qui contiendra l'unique instance de la classe
 
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoTelemaque{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=telemaque';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
        private static $monPdo;
        private static $pdoTelemaque=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	PdoTelemaque::$monPdo = new PDO(PdoTelemaque::$serveur.';'.PdoTelemaque::$bdd, PdoTelemaque::$user, PdoTelemaque::$mdp); 
		PdoTelemaque::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoTelemaque::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoTelemaque = PdoTelemaque::getPdoTelemaque();
 
 * @return l'unique objet de la classe PdoTelemaque
 */
	public  static function getPdoTelemaque(){
		if(PdoTelemaque::$pdoTelemaque==null){
			PdoTelemaque::$pdoTelemaque= new PdoTelemaque();
		}
		return PdoTelemaque::pdoTelemaque;  
	}
/**
 * Retourne les informations d'un visiteur
 
 * @param $login 
 * @param $mdp
 * @return l'id, le nom et le prénom sous la forme d'un tableau associatif 
*/
	public function getArticle(){
		$req = "select * from article";
		$rs = PdoTelemaque::$monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}


 
}


      
?>