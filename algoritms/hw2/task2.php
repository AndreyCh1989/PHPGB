<?php
    class Substr {
        public $string;
        public $length;

        public function __construct(string $string, int $len) {
            $this->string = $string;
            $this->length = $len;
        }
    }

    function getMaxSubstring(string $string) {
        $stringSize = strlen($string);
        $results = [];

        for ($k = 0; $k < $stringSize; $k++) {
            for ($j = 1; $j <= $stringSize-$k; $j++) {
                $substr = substr($string, $k, $j);
                if (array_key_exists($substr, $results)) continue;

                if (checkForRepeats($substr)) {
                    $results[] = new Substr($substr, strlen($substr));
                } else {
                    break;
                }
            }
        }

        $maxItem;
        foreach ($results as $result) {
            if (!$maxItem || $maxItem->length < $result->length) {
                $maxItem = $result;
            }
        }

        return $maxItem;
    }

    function checkForRepeats(string $string, bool $backward = false) {
        $stringSize = strlen($string);
        if ($stringSize <= 1) return true;

        if ($backward) {
            $startChar = substr($string, $stringSize-1, 1);
            for ($i = 0; $i < $stringSize-1; $i++) {
                $char = substr($string, $i, 1);
                if ($startChar == $char) return false;
            }

            return checkForRepeats(substr($string, 0, $stringSize-1), false);
        } else {
            $startChar = substr($string, 0, 1);
            for ($i = $stringSize-1; $i > 0; $i--) {
                $char = substr($string, $i, 1);
                if ($startChar == $char) return false;
            }

            return checkForRepeats(substr($string, 1, $stringSize-1), true);
        }
    }

    $start = microtime(true);
    print_r(getMaxSubstring('bbbbb'));
    print_r(sprintf('%.12f', microtime(true) - $start));
