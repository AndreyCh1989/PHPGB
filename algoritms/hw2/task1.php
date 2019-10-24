<?php
    const SMALLEST_DIVISOR = 2;

    // сначала нашел алгоритм и пытался реализовать ситом Эратосфена
    // после 1000000 вычисления уходили в бесконечность
    // потом нашел идею вот такова супер крутого алгоритма
    function getMaxPrimeDivisor(int $number) {
        $a = $number;
        $b = SMALLEST_DIVISOR;

        while ($b != $a) {
            if ($a % $b == 0) {
                return getMaxPrimeDivisor($a / $b, $b);
            } else {
                $b += 1;
            }
        }

        return $a;
    }

    print_r(getMaxPrimeDivisor(600851475143));
