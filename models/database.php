<?php

class Database {

    public $db;

    /**
     * L'attribut $instance contiendra mon objet Database
     * L'attribut $instance est en privé afin qu'il ne soit pas accessible en dehors de la class Database
     */
    private static $instance = NULL;

    /**
     * Je mets la méthode magique en privée pour qu'elle ne soit pas utilisé en dehors de la classe.
     * Donc l'objet ne peut être créé en dehors de la classe.
     */
    private function __construct() {
        $this->db = new PDO('mysql:host=localhost; dbname=titrepro; charset=utf8', 'lamanu', 'hassenhad', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    /**
     * La méthode getInstance() est en public afin de l'appelé en dehors de ma classe.
     * Déclarer la méthode static pour ne pas l'instancier
     */
    public static function getInstance() {
        /**
         * Je vérifie si l'attribut $instance de la objet Database existe
         * Dans le cas contraire je la crée
         */
        if (is_null(self::$instance)) {
            /**
             * S'il est égal à NULL alors $instance est égal à l'instanciation de Database
             */
            self::$instance = new Database();
        }
        /**
         * Je retourne l'instance. Si elle existait je la prend sinon je l'ai créé juste avant.
         */
        return self::$instance;
    }

}
