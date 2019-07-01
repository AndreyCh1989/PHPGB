<?php
    $operations = json_decode(file_get_contents('php://input'), true);

    $result = 0;
    $prevAction = '';
    foreach ($operations as $key => $op) {
        switch($prevAction) {
            case('+'):
                $result += $op['input'];
                break;
            case('-'):
                $result -= $op['input'];
                break;
            case('/'):
                if ($op['input'] === '0') {
                    echo json_encode([ 'error' => 'Division by 0!!!' ]);
                    die();
                } else {
                    $result /= $op['input'];
                }
                break;
            case('*'):
                $result *= $op['input'];
                break;
            default:
                $result = $op['input'];
                break;
        }
        $prevAction = $op['action'];
        $operations[$key]['result'] = $result;
    }

    echo json_encode($operations);
    die();
