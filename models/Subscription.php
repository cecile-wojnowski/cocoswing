<?php
class Subscription extends Model{
  protected $id;
  protected $typeDance;
  protected $description;
  protected $lowerPrice; // Booléen
  protected $installmentPayment; // Booléen
  protected $price;
  protected $helloassoLink;
  protected $formSlug;

  public function __construct()
  {
    $this->table = "subscriptions";
    $this->getConnection();
  }

  public function choisirFormule($userChoice){
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

    // Remplit la table users_subscriptions grâce à l'id de la formule récupérée
   $subscription = $this->_connection->prepare("INSERT INTO users_subscriptions
      (id_user, id_subscription) VALUES (?, ?)");

    $subscription->execute([
      $_SESSION['id'], // id de l'utilisateur stocké en session
      $resultat['id'] // id de la formule
    ]);

    return $resultat['helloasso_link'];
  }

  public function ajouterFormule(){
    $formSlug = explode("/", $this->helloassoLink);
    $this->setFormSlug($formSlug[6]);

    $ajoutFormule = $this->_connection->prepare("INSERT INTO subscriptions
      (type_dance, lower_price, installment_payment, price, description, formSlug, helloasso_link)
      VALUES (?, ?, ?, ?, ?, ?, ?)");

    $ajoutFormule->execute([
      $this->typeDance,
      $this->lowerPrice,
      $this->installmentPayment,
      $this->price,
      $this->description,
      $this->formSlug,
      $this->helloassoLink
    ]);
  }

  public function modifierFormule(){
    $updateSubscription = $this->_connection->prepare("UPDATE subscriptions
      SET type_dance = $this->typeDance,
      lower_price = $this->lowerPrice,
      installment_payment = $this->installmentPayment,
      price = $this->price,
      description = $this->description,
      formSlug = $this->formSlug,
      helloasso_link = $this->helloassoLink
      WHERE id = $this->id");

    $updateSubscription->execute();
  }

  public function formatFormules($resultat){
    for($i = 0; $i < count($resultat); $i++) {
      if($resultat[$i]['lower_price'] == 1){
        $resultat[$i]['lower_price'] = "Oui";
      }else{
        $resultat[$i]['lower_price'] = "Non";
      }

      if($resultat[$i]['installment_payment'] == 1){
        $resultat[$i]['installment_payment'] = "Oui";
      }else{
        $resultat[$i]['installment_payment'] = "Non";
      }

      $resultat[$i]['price'] = $resultat[$i]['price'] . " " . "euros";

      $year = new Datetime($resultat[$i]['year']);
      $resultat[$i]['year'] = $year->format('Y');
    }
    return $resultat;
  }

  public function afficherFormulesSolo(){
    $formules = $this->_connection->prepare("SELECT * FROM subscriptions
      WHERE type_dance LIKE '%solo' AND type_dance NOT LIKE '%lindy%' ");
    $formules->execute();
    $resultat = $formules->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatFormules($resultat);

    return $resultat;
  }

  public function afficherFormulesLindy(){
    $formules = $this->_connection->prepare("SELECT * FROM subscriptions
      WHERE type_dance LIKE '%lindy' AND type_dance NOT LIKE '%solo%' ");
    $formules->execute();
    $resultat = $formules->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatFormules($resultat);

    return $resultat;
  }

  public function afficherFormulesSoloLindy(){
    $formules = $this->_connection->prepare("SELECT * FROM subscriptions
      WHERE type_dance LIKE '%lindy%' AND type_dance LIKE '%solo%' ");
    $formules->execute();
    $resultat = $formules->fetchAll(PDO::FETCH_ASSOC);

    $resultat = $this->formatFormules($resultat);

    return $resultat;
  }

  public function hydrater($donnees = null)
  {
    if (isset($donnees['id']))
      $this->setId($donnees['id']);

    if (isset($donnees['type_dance']))
      $this->setTypeDance($donnees['type_dance']);

    if (isset($donnees['lower_price']))
      $this->setLowerPrice($donnees['lower_price']);

    if (isset($donnees['price']))
      $this->setPrice($donnees['price']);

    if (isset($donnees['installment_payment']))
      $this->setInstallmentPayment($donnees['installment_payment']);

    if (isset($donnees['helloasso_link']))
      $this->setHelloassoLink($donnees['helloasso_link']);

    if (isset($donnees['description']))
      $this->setDescription($donnees['description']);
    }


  public function setId($id){
    $id = (int) $id;
    if ($id > 0)
      $this->id = $id;
  }
  public function setTypeDance($typeDance){
    if (is_string($typeDance))
      $this->typeDance = $typeDance;
  }
  public function setLowerPrice($lowerPrice){
    $lowerPrice = (int) $lowerPrice;
    if($lowerPrice == 0 OR $lowerPrice == 1)
      $this->lowerPrice = $lowerPrice;
  }
  public function setInstallmentPayment($installmentPayment){
    $installmentPayment = (int) $installmentPayment;
    if($installmentPayment == 0 OR $installmentPayment == 1)
      $this->installmentPayment = $installmentPayment;
  }
  public function setPrice($price){
    $price = (int) $price;
    if ($price > 0)
      $this->price = $price;
  }
  public function setHelloassoLink($helloassoLink){
    if (is_string($helloassoLink))
      $this->helloassoLink = $helloassoLink;
  }

  public function setFormSlug($formSlug){
    if (is_string($formSlug))
      $this->formSlug = $formSlug;
  }

  public function setDescription($description){
    if (is_string($description))
      $this->description = $description;
  }
} ?>
