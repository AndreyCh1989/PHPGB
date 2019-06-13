<?php
    const BR = '<br/>';
?>

<?php
//    1 task

    culc(4,3);
    culc(-3, -5);
    culc(-3, 4);
    culc(2,-9);

    function culc($a, $b) {
        if ($a >= 0 && $b >= 0) {
            echo ($a - $b).BR;
        } else if ($a<0 && $b<0) {
            echo ($a * $b).BR;
        } else if (($a >= 0 && $b < 0) || ($a < 0 && $b >= 0)) {
            echo ($a + $b).BR;
        }
    }
?>

<?php
//    2 task
    echo swch(5).BR;

    function swch($a) {
        $result = '';

        switch($a) {
            case(0): $result .= ' 0';
            case(1): $result .= ' 1';
            case(2): $result .= ' 2';
            case(3): $result .= ' 3';
            case(4): $result .= ' 4';
            case(5): $result .= ' 5';
            case(6): $result .= ' 6';
            case(7): $result .= ' 7';
            case(8): $result .= ' 8';
            case(9): $result .= ' 9';
            case(10): $result .= ' 10';
            case(11): $result .= ' 11';
            case(12): $result .= ' 12';
            case(13): $result .= ' 13';
            case(14): $result .= ' 14';
            case(15): $result .= ' 15'; break;
            default: $result = 'Out of range';
        }

        return $result;
    }
?>

<?php
//    3 task
    echo sum(5, 4).BR;
    echo diff(5, 4).BR;
    echo mult(5, 4).BR;
    echo div(5, 4).BR;

    function sum($a, $b) {
        return $a + $b;
    }
    function diff($a, $b) {
        return $a - $b;
    }
    function mult($a, $b) {
        return $a * $b;
    }
    function div($a, $b) {
        if ($b == 0)
            return NULL;
        else
            return $a / $b;
    }
?>

<?php
//    4 task
    echo arif(5, 4, '+').BR;
    echo arif(5, 4, '-').BR;
    echo arif(5, 4, '/').BR;
    echo arif(5, 4, '*').BR;

    function arif($a, $b, $operand) {
        switch ($operand) {
            case('+'): return sum($a, $b);
            case('-'): return diff($a, $b);
            case('*'): return mult($a, $b);
            case('/'): return div($a, $b);
            default: return NULL;
        }
    }
?>

<?php
//    6 task
    echo power(2, 4).BR;
    echo power(2, 6).BR;

    function power($val, $pow) {
        return _power($val, --$pow, $val);
    }

    function _power($val, $pow, $result) {
        if ($pow == 0)
            return $result;
        else
            return _power($val, --$pow, $result*$val);
    }
?>

<?php
//    6 task
    $today = getDate();
    $hour = $today['hours'];
    $min = $today['minutes'];

    function pluralize($val, $single, $plural, $form3) {
        if ($val < 20 && $val>=10) return $form3;

        $lastNumber = $val[strlen($val)-1];
        switch($lastNumber) {
            case(1): return $single;
            case(2):case(3):case(4): return $plural;
            default: return $form3;
        }
    }
?>

<h1>Текущее время: <?=$hour?> <?=pluralize($hour, 'час', 'часа', 'часов')?> <?=$min?> <?=pluralize($hour, 'минута', 'минуты', 'минут')?><h1/><br/>
