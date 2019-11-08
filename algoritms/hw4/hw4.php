<?php
function calc(string $sentence) {
    $numbers = [];
    $actions = [];

    $number = '';
    $iterObj = new \ArrayObject(str_split($sentence));
    $iter = $iterObj->getIterator();
    while($iter->valid()) {
        $char = $iter->current();
        //var_dump($char);

        if (preg_match('/[0-9]/', $char)) {
            // if current char is number concatenate it to $number
            $number .= $char;
        } else {
            if ($number != '') {
                // if current char is not number, but $number is not empty, push $number in $numbers
                array_push($numbers, $number);
                $number = '';

                if (preg_match('/[\*\/\^]/', end($actions))) {
                    // if last action * or \ or ^ do action with last two numbers
                    $n2 = array_pop($numbers);
                    $n1 = array_pop($numbers);
                    array_push($numbers, doAction($n1, $n2, array_pop($actions)));
                }
            }

            if (preg_match('/[\-\+\*\/\^\(]/', $char)) {
                // if current char is action or parentheses, push $char in $actions
                array_push($actions, $char);
            } elseif (preg_match('/[\)]/', $char)) {
                // if current char is ), calculate all actions till (
                calculate($numbers, $actions, true);
            }
        }

        $iter->next();
    }

    if ($number != '') {
        // if $iter has no items more but $number is not empty, push $number in $numbers
        array_push($numbers, $number);
        $number = '';

        if (preg_match('/[\*\/\^]/', end($actions))) {
            // if last action * or \ or ^ do action with last two numbers
            $n2 = array_pop($numbers);
            $n1 = array_pop($numbers);
            array_push($numbers, doAction($n1, $n2, array_pop($actions)));
        }
    }

    // calculating all actions from $actions
    calculate($numbers, $actions);

    return $numbers[0];
}

function calculate(&$numbers, &$actions, $parentheses = false) {
    foreach ($actions as $action) {
        if ($parentheses && preg_match('/\(/', end($actions))) {
            array_pop($actions);
            return;
        }

        $n2 = array_pop($numbers);
        $n1 = array_pop($numbers);
        array_push($numbers, doAction($n1, $n2, array_pop($actions)));
    }
}

function doAction($n1, $n2, $a) {
    switch($a) {
        case '+': return (float)$n1 + (float)$n2;
        case '-': return (float)$n1 - (float)$n2;
        case '*': return (float)$n1 * (float)$n2;
        case '/': return (float)$n1 / (float)$n2;
        case '^': return pow((float)$n1, (float)$n2);
    }
}

var_dump('Result = '.calc('(2+42)^2+7*3-6'));

