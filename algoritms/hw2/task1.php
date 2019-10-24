<?php
    const SMALLEST_DIVISOR = 2;

    // сначала нашел алгоритм и пытался реализовать ситом Эратосфена
    // после 1000000 вычисления уходили в бесконечность
    // потом нашел идею вот такова супер крутого алгоритма

    //Example: Let's find the largest prime factor of 105.
    //Let (A) = 105. (B) = 2 (we always start with 2), and we don't have a value for (C) yet.
    //Is (A) divisible by (B)? No. Increment (B) by +1: (B) = 3. Is Is (A) divisible by (B)?
    //Yes. (105/3 = 35). The largest divisor found so far is 3. Let (C) = 3. Update (A) = 35. Reset (B) = 2...

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
