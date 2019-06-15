<?php
    const BR = '<br/>';
?>

<?php
    // 1 task
    loopDiv3(0, 100);

    function loopDiv3($min, $max) {
        for ($i = $min; $i <= $max; $i++) {
            if (($i % 3) == 0) {
                echo $i.' ';
            } else
                continue;
        }

        echo BR;
    }
?>

<?php
    // 2 task
    loopNumberWithDescription(0, 10);

    function loopNumberWithDescription($min, $max) {
        for ($i = $min; $i <= $max; $i++) {
            if ($i == 0) {
                $text = "ноль";
            } else {
                switch($i % 2) {
                    case(0):
                        $text = "четное число";
                        break;
                    default:
                        $text = "нечетное число";
                }
            }

            echo "$i - $text.".BR;
        }
    }
?>

<?php
    // 3 task
    $regions = [
        'Московская область' => [ 'Москва', 'Зеленоград', 'Клин' ],
        'Ленинградская область' => [ 'Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт' ],
        'Рязанская область' => [ 'Рязань', 'Касимов', 'Петелоино', 'Сасово' ],
        'Самарская область' => [ 'Самара', 'Новокуйбышевск', 'Тольятти' ]
    ];

    function cityPrint($array) {
        foreach($array as $region => $cities) {
            echo "$region:".BR.implode( ", ", $cities ).BR;
        }
    }

    cityPrint($regions);
?>

<?php
    // 4 task
    function translit($string) {
        $array = [
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'g',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'e',
            'ж' => 'zh',
            'з' => 'z',
            'и' => 'i',
            'й' => 'j',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'h',
            'ц' => 'ts',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => 'shch',
            'ь' => '',
            'ы' => 'y',
            'ъ' => '',
            'э' => 'e',
            'ю' => 'yu',
            'я' => 'ya'
        ];

        $result = '';

        $words = explode(" ", $string);
        foreach(preg_split('//u', $string) as $symbol) {
            $translitSymbol = $array[$symbol];
            $result .= $translitSymbol != '' ? $translitSymbol : $symbol;
        }

        return $result;
    }

    echo translit('кашу ела маша').BR;
?>

<?php
    // 5 task
    function spaceToUnderscore($string) {
        return preg_replace ( '/ /' , '_' , $string);
    }

    echo spaceToUnderscore('кашу ела маша').BR;
?>


// task 6
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown link
      </a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <?php foreach ($regions as $key => $value): ?>
            <a class="dropdown-item" href="#"><?=$key?></a>
            <div class="city">
                 <?php foreach ($value as $city): ?>
                    <a class="dropdown-item" href="#"><?=$city?></a>
                 <?php endforeach;?>
            </div>
        <?php endforeach;?>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

  <style>
    .city {
        margin-left: 35px;
        background-color: lightgray;
    }
  </style>
</html>

<?php
    // 7 task
    //поидее должно быть как-то так
    //for ($i = 0; $i < 10; echo ($i++)) {}
?>

<?php
    // 8 task
    function kCityPrint($array) {
        foreach($array as $region => $cities) {
            echo "$region:".BR.implode( ", ",
                    array_filter($cities, function($v, $k) {
                        $symbol = mb_substr($v, 0, 1);
                        return $symbol == 'К' ? true : false;
                    }, ARRAY_FILTER_USE_BOTH )
                ).BR;
        }
    }

    kCityPrint($regions);
?>


<?php
    // 9 task
    function twoFunctionsOnOne($string) {
        $array = [
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'g',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'e',
            'ж' => 'zh',
            'з' => 'z',
            'и' => 'i',
            'й' => 'j',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'h',
            'ц' => 'ts',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => 'shch',
            'ь' => '',
            'ы' => 'y',
            'ъ' => '',
            'э' => 'e',
            'ю' => 'yu',
            'я' => 'ya'
        ];

        $result = '';

        $words = explode(" ", $string);
        foreach(preg_split('//u', $string) as $symbol) {
            $translitSymbol = $array[$symbol];
            $result .= $translitSymbol != '' ? $translitSymbol : $symbol;
        }

        return preg_replace ( '/ /' , '_' , $result);
    }

    echo twoFunctionsOnOne('кашу ела маша').BR;
?>
