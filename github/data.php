<?php
/*
echo "<pre>";
	print_r($_SERVER);
echo "</pre>";
*/

function validatePhoneNumber($phone){
    return preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/', $phone);
}

function validateEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isAdult($birtdate){
    $birtdate = new DateTime($birtdate);
    $today = new DateTime();
    $age = $today->diff($birt)->y;
    return $age >= 18;
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
	$name = htmlspecialchars(trim($_GET['name']));
	$email = htmlspecialchars(trim($_GET['email']));
    $phone = htmlspecialchars(trim($_GET['phone']));
    $phone = htmlspecialchars(($_GET['birthdate']));
	$subject = htmlspecialchars(trim($_GET['subject']));
	$message = htmlspecialchars(trim($_GET['message']));
	$contact_preference = htmlspecialchars(trim($_GET['contact_preference']));


    $errors = [];

    if(!validatePhoneNumber($phone)){
        $error[] = "Numer telefonu musi byc w formacie 111-111-111";
    }


    if (!validateEmail($email)) {
        $errors[] = "Niepoprawny format adresu e-mail.";
    }


    if(!isAdult($birtdate)){
        $error[] = "Musisz mnieć co najmniej 18 lat";
    }

    if (empty($message)) {
        $errors[] = "Wiadomość nie może być pusta.";
    }


    if (count($errors)) {
        echo "<h2>Wystąpiły błędy:</h2><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul><br><a href='form.html'>Wróć do formularza</a>";
    } else {
        echo <<<DATA
        <h2>Dane pobrane z formularza</h2>
        <p><strong>Imię: </strong>$name</p>
        <p><strong>E-mail: </strong>$email</p>
        <p><strong>Numer telefonu: </strong>$phone</p>
        <p><strong>Temat: </strong>$subject</p>
        <p><strong>Preferowany kontakt: </strong>$contact_preference</p>
        <p><strong>Wiadomość: </strong>$message</p>
        <br><a href="form.html">Wróć do formularza</a>
        DATA;
    }

} else {
	echo "Formularz nie został wysłany poprawnie!";
	echo '<br><a href="form.html">Wróć do formularza</a>';
}

// Debugowanie GET
echo "<hr>";
echo "<pre>";
print_r($_GET);
echo "</pre>";
?>
