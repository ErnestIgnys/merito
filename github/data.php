<?php
/*
echo "<pre>";
	print_r($_SERVER);
echo "</pre>";
*/

if ($_SERVER['REQUEST_METHOD'] == "GET") {
	$name = htmlspecialchars(trim ($_GET['name']));
	$email = htmlspecialchars(trim ($_GET['email']));
    $phone = htmlspecialchars(trim($_GET['phone']));
	$message = htmlspecialchars(trim ($_GET['subject']));
	$message = htmlspecialchars(trim ($_GET['message']));
	$contact_preference = htmlspecialchars(trim ($_GET['contact_preference']));

    $errors = [];

    if(count($errors)){
        echo count($errors);
    }else{
        
        echo <<< DATA
        <h2>Dane pobranie z formularza</h2>
        <p><strong>Imię: </strong>$name</p>
        <p><strong>E-mail: </strong>$email</p>
        <p><strong>Wiadomość: </strong>$message</p>
        DATA;


    }

	
}else {
	echo "Formularz nie został wysłany poprawnie!";
	echo '<br><a href="form.html">Wróć do formularza</a>';
}


/*
    echo "<pre>";
    var_dump($_GET);
    echo "</pre>";
*/
    echo "<hr>";
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    