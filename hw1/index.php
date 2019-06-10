<?php
    const BR = '<br/>';
?>

<?php
    $a = 5;
    $b = '05';
    var_dump($a == $b);         // Почему true? начение переменной b приводиться к int (происходит сравнение только по значению)
    var_dump((int)'012345');     // Почему 12345? начение переменной приводиться к int
    var_dump((float)123.0 === (int)123.0); // Почему false? происходит сравнение не только по значению но и по типу
    var_dump((int)0 === (int)'hello, world'); // Почему true? при переводе строки в int получаем 0
    echo BR;
?>

<?php
    $today = getDate();
//    var_dump($today);
    $hour = $today['hours'];
    $min = $today['minutes'];
    $sec = $today['seconds'];
?>

<h1>Текущее время: <?=$hour?>часов <?=$min?>минут <?=$sec?>секунд<h1/><br/>

<?php
    $a = 5;
    $b = 1;
    echo 'a='.$a.BR;
    echo 'b='.$b.BR;

    $a+=+$b-$b=$a;
    echo 'a='.$a.BR;
    echo 'b='.$b.BR;

    //нашел в интернете, осталось разобраться как работает :)
?>
