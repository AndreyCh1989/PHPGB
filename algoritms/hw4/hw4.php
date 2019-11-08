<?php
function calc(string $sentence) {
    $numbers = [];
    $actions = [];

    $number = '';
    $iterObj = new \ArrayObject(str_split($sentence));
    $iter = $iterObj->getIterator();
    while($iter->valid()) {
        $char = $iter->current();
        var_dump($char);

        if (preg_match('/[0-9]/', $char)) {
            $number .= $char;
        } else {
            if ($number != '') {
                array_push($numbers, $number);
                $number = '';

                if (preg_match('/[\*\/]/', end($actions))) {
                    $n2 = array_pop($numbers);
                    $n1 = array_pop($numbers);
                    array_push($numbers, doAction($n1, $n2, array_pop($actions)));
                }
            }

            if (preg_match('/[\-\+\*\/]/', $char)) {
                array_push($actions, $char);
            }
        }

        if (preg_match('/\(/', $char)) continue;

        $iter->next();
    }

    if ($number != '') {
        array_push($numbers, $number);
        $number = '';

        if (preg_match('/[\*\/]/', end($actions))) {
            $n2 = array_pop($numbers);
            $n1 = array_pop($numbers);
            array_push($numbers, doAction($n1, $n2, array_pop($actions)));
        }
    }

    foreach ($actions as $action) {
        $n2 = array_pop($numbers);
        $n1 = array_pop($numbers);
        array_push($numbers, doAction($n1, $n2, array_pop($actions)));
    }

    var_dump($numbers);
    var_dump($actions);

    return $numbers[0];
}

function doAction($n1, $n2, $a) {
    switch($a) {
        case '+': return (float)$n1 + (float)$n2;
        case '-': return (float)$n1 - (float)$n2;
        case '*': return (float)$n1 * (float)$n2;
        case '/': return (float)$n1 / (float)$n2;
    }
}

var_dump('Result = '.calc('123+1/2-3*7'));

