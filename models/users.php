<?php

/* MODELE - MODEL */
/*
 * Je crée ma classe clients (objet) dans un dossier models
 * Je crée une classe par table dans ma base de données
 */

class users {
   /*
    * Je crée mes attributs en fonction des champs de ma table clients
    * dans ma base de donnée
    * 1 attribut = 1 champs
    */

   //Mon attribut db est privé, car je ne l'utilise qu'à l'intérieur de la classe
   private $db = '';
   //Mes autres attributs sont publics car je veux pouvoir les afficher (donc les appeler en dehors de ma classe)
   public $id = 0;
   public $lastname = '';
   public $firstname = '';
   public $birthDate = '1970-01-01';
   public $civility = '';
   public $enterprise = '';
   public $address = '';
   public $country = '';
   public $region = '';
   public $city = '';
   public $postalCode = 0;
   public $phoneNumber = 0;
   public $mail = '';
   public $password = '';

   //La méthode magique contruct s'éxecute à l'instanciation de l'objet ($clients = new clients())
   public function __construct() {
      /*
       * J'utilise un try catch pour essayer (try) de me connecter à ma base de données.
       * S'il y a une erreur (Exception) je l'attrappe (catch), j'arrête le code (die) et j'affiche l'erreur (getMessage)
       */
      try {
         /*
          * Mon attribut db devient un objet PDO, il va me permettre de me connecter à ma base de données.
          * Il a besoin d'une "phrase de connexion" :
          * host = localhost - il s'agit de l'hôte sur lequel est héberge mon site
          * dbname=colyseum - c'est la base de données que je vais utiliser
          * charset=utf8 - permet de conserver les caractères spéciaux qui sont récupérés de la base de données
          * Les deux autres paramètres de PDO sont :
          * le nom d'utilisateur permettant de se connecter à la base (admin_colyseum) et son mot de passe (pwd_colyseum)
          */
         $this->db = new PDO('mysql:host=localhost;dbname=foodcharity;charset=utf8', 'hassen', '12345678');
      } catch (Exception $e) {
         die('Erreur : ' . $e->getMessage());
      }
   }

   /**
    * Méthode permettant de récupérer les noms et prénoms de tous les clients
    * @return objet
    */
   public function insertUsers() {
      /*
       * Je prépare ma requête et je la stocke dans une variable
       * Attention : ne pas oublier l'espace à la fin de ma première ligne
       */
        $query = 'INSERT INTO `_ag4_users`(`lastname`, `firstname`, `birthDate`, `civility`, `enterprise`, `address`, `country`, `region`, `city`, `postalCode`, `phoneNumber`, `mail`, `password`) '
                    . 'VALUES(:lastname, :firstname, :birthDate, :civility, :enterprise, :address, :country, :region, :city, :postalCode, :phoneNumber, :mail, :password) ';
        
      //$this->db->query($query) me permet d'executer ma requête (query($query)) dans ma base de données ($this->db)
      $queryExecute = $this->db->prepare($query);
      /*
       * fetchAll me permet de récupérer tous les résultats en objet (PDO::FETCH_OBJ)
       * Attention : fetchAll récupère un tableau de résultats
       */
      
      $queryExecute->execute([
                'civility' => $this->civility,
                'lastname' => $this->lastname,
                'firstname' => $this->firstname,
                'birthDate' => $this->birthDate,
                'enterprise' => $this->enterprise,
                'address' => $this->address,
                'country' => $this->country,
                'region' => $this->region,
                'city' => $this->city,
                'postalCode' => $this->postalCode,
                'phoneNumber' => $this->phoneNumber,
                'mail' => $this->mail,
                'password' => $this->password
      ]);
      return $queryExecute;
   }

   public function __destruct() {
      $this->db = NULL;
   }

}
