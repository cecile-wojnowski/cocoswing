<?php
class Subscription extends Model{
  private $id;
  private $typeDanse;
  private $frequenceCours;
  private $reduction; // Booléen
  private $estAdherent; // Booléen
  private $paiementMultiple; // Booléen
  private $prix;
  private $lienHelloAsso;

  public function __construct()
  {
    // Nous définissons la table par défaut de ce modèle
    $this->table = "subscriptions";

    // Nous ouvrons la connexion à la base de données
    $this->getConnection();
  }

  public function choisirFormule($userChoice){
    var_dump($userChoice);

    // Sélectionne une formule parmi celles préexistantes en bdd
    // en comparant les données reçues en POST avec la table subscription en bdd
    $subscription_matched = $this->_connection->prepare("SELECT * from subscriptions
    WHERE type_dance = ? AND lower_price = ? AND installment_payment = ?");

    $subscription_matched->execute([
      $userChoice['type_dance'],
      $userChoice['lower_price'],
      $userChoice['installment_payment']
    ]);
    $resultat = $subscription_matched->fetch();

    var_dump($resultat);
    echo $resultat['id'];

    // Remplit la table users_subscriptions grâce à l'id de la formule récupérée
    /*$subscription = $this->_connection->prepare("INSERT INTO users_subscriptions
      (id_user, id_subscription);
      VALUES (?, ?)");

    $subscription->execute([
      // id_user,
      // id_subscription

    ]); */
  }
} ?>
