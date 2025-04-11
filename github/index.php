<?php
    $name = "Janusz";
    echo "Imię: $name ";

    $age = 20;
    if ($age >= 18):
        echo "Pełnoletni";
   
    else:
        echo "Niepełnoletnia";
    endif;

    $tab = ["a", "b", "c"];
    foreach ($tab as $key => $value):
        echo "<hr>". $value . "<br>";
    endforeach;

    function Add($a, $b){
        return $a + $b;
    }
    echo Add(4, 5);

    //heredoc
    $surname = "Nowak";
    echo <<< DATA
        <br>
        Imię: Janusz<br>
        Nazwisko: $surname
    DATA;

    //heredoc
    $surname = "Nowak";
    echo <<< DATA
        <br>
        Imię: Janusz<br>
        Nazwisko: $surname
    DATA;

    $name = "Anna";
    $surname = "Nowak";
    echo "<hr>$name $surname";
    echo '<hr>$name $surname';
?>