<!--
1. Есть две переменные $n и $x, найти их сумму, разницу, деление, произведение, остаток от деления,
возведение $n в степень $x, конкатенацию, сравнение, точное сравнение, инверсию. Вывести результаты на экран.-->
<?php
$n = 5;
$x = 10;
$sum = $n + $x;
$diff = $n - $x;
$quotient = $n / $x;
$product = $n * $x;
$modul = $n % $x;
$pow = $n ** $x;
$conc = $n . $x;
echo 'Переменная $n равна ' . $n . "<br>\n";
echo 'Переменная $x равна ' . $x . "<br>\n";
echo 'Сумма этих переменных равна ' . $sum . "<br>\n";
echo 'Разница этих переменных равна ' . $diff . "<br>\n";
echo 'Частное от деления этих переменных равно ' . $quotient . "<br>\n";
echo 'Произведение этих переменных равно ' . $product . "<br>\n";
echo 'Остаток от деления составляет ' . $modul . "<br>\n";
echo '$n в степени $x составляет ' . $pow . "<br>\n";
echo 'Конкатенация этих переменных: ' . $conc . "<br>\n";
if ($n == $x) {
    echo 'Переменная $n равна переменной $x' . "<br>\n";
} else {
    echo 'Переменная $n не равна переменной $x' . "<br>\n";
}
if ($n !== $x) {
    echo 'Переменная $n тождественно не равна переменной $x' . "<br>\n";
} else {
    echo 'Переменная $n тождественно равна переменной $x' . "<br>\n";
}
?>

<!--
2. Найти решение выражения -->
<?php
function work($x, $y)
{
    return (2 * $x) ** 4 + sin($y) - (($x + $y) / (7 - $x)) * (sqrt($x ** 2 + $y));
}

?>

<!--
3. В данном трехзначном числе переставьте цифры так, чтобы новое число оказалось наибольшим из возможных. -->
<?php
$x = 345;
$num1 = $x % 10;
$x = (int)$x / 10;
$num2 = $x % 10;
$x = (int)$x / 10;
$num3 = $x % 10;
$result1 = $num1 . $num2 . $num3;
$result2 = $num1 . $num3 . $num2;
$result3 = $num2 . $num3 . $num1;
$result4 = $num2 . $num1 . $num3;
$result5 = $num3 . $num1 . $num2;
$result6 = $num3 . $num2 . $num1;
$maxNumber = [$result1, $result2, $result3, $result4, $result5, $result6];
echo "Максимально возможное число из комбинации цифр $num3, $num2, $num1: " . max($maxNumber) . "<br>\n";
?>

<!--
4. Есть два массива $arr1 и $arr2, создать третий массив $arr3,
который будет содержать элементы массивов $arr1 и $arr2 -->
<?php
$array1 = [10, 20, 30, 40, 'Hello'];
$array2 = [15, 25, 35, 'World'];
$array3 = array_merge($array1, $array2);
?>

<!--
5. Дан массив размера n. Удалить каждый нулевой элемент (значение “0”).
Каждый элемент который делится на 5 без остатка возвести в квадрат.-->
<?php
$arrayWithZero = [4, 6, 3, 7, 0, 4, 10, 15, 20, 34, 56, 3, 0, 'hello', 'world', 0, 9];
$arrayWithoutZero = [];
foreach ($arrayWithZero as $value) {
    if ($value !== 0) {
        array_push($arrayWithoutZero, $value);
    }
    if ($value % 5 === 0) {
        $result = $value ** 2;
        echo $result . "<br>\n";
    }
}
?>

<!--
6. Пользователь выбирает название курса из трех вариантов и видит его стоимость и имя куратора.-->
<?php
$study = ['PHP' => ['Иванов', 500], 'HTML' => ['Петров', 400], 'Java' => ['Сидоров', 400]];
?>
<form method="post">
    <select name="selectCourse">
        <?php foreach ($study as $course => $data) {
            echo '<option>' . $course . '</option>';
        }
        ?>
    </select>
    <input type="submit" value="Просмотреть"/>
</form>
<?php
if (!empty($_POST['selectCourse'])) {
    //echo implode(" ", $study[$_POST['selectCourse']]);
    echo $study[$_POST['selectCourse']][0] . " " . $study[$_POST['selectCourse']][1] . "<br>\n";
}
?>

<!--
7. В файле text.txt записаны слова (разделены пробелом), найти каждое слово которое начинается на "aba" и записать
в файл aba.txt, а также найти слова которые содержат "abc",  и записать их в файл abc.txt.-->
<?php
$text = fopen("text.txt", "r");
$words = fgetcsv($text, null, " ");
fclose($text);
foreach ($words as $word) {
    if (strpos($word, "aba") === 0) {
        $aba = fopen("aba.txt", "a+");
        fwrite($aba, $word);
        fclose($aba);
    }
    if (strpos($word, 'abc') !== false) {
        $abc = fopen("abc.txt", "a+");
        fwrite($abc, $word);
        fclose($abc);
    }
}
?>

<!--
8.	Дана строка, состоящая из слов, разделенных символами, которые перечислены во второй строке.
Показать все слова.-->
<?php
$stringWord = 'word1;word2:word3/word4,word5.word6$word7';
$stringSymbol = ':;/,.';
$replaceSymbol = substr($stringSymbol, 0, 1);
$stringSymbolArr = str_split($stringSymbol);
$stringWord = str_replace($stringSymbolArr, $replaceSymbol, $stringWord);
$words = explode($replaceSymbol, $stringWord);
foreach ($words as $key=>$value){
    echo $value.'<br>';
}
?>

<!--9.	Пользователь вводит названия городов через пробел (форма + валидация ;)).
Переставьте названия так (одна строка), чтобы названия были упорядочены по алфавиту.-->
<form method="post">
    <p>Введите названия городов через пробел</p>
    <input type="text" name="city"/>
    <input type="submit">
</form>
<?php
if (!empty($_POST['city'])) {
    $stringCity = implode(" ", $_POST);
    $arrayCity = explode(" ", $stringCity);
    sort($arrayCity);
    $stringCity = implode(" ", $arrayCity);
    echo $stringCity . "<br>\n";
}
?>

<!--10.	Создать форму которая считает стоимость пиццы + доставка.
Форма содержит select - тип пиццы (с ветчиной, говядиной, салями, грибная, веганская),
каждый тип пиццы имеет свою стоимость в гривнах (придумайте сами).
Так же селект напитка: coca cola, fanta, sprite, не выбрано. У каждого своя цена, не выбрано - 0.
Чекбокс - промокод (-10 % стоимости).
Текстовый инпут дальность доставки в километрах, каждый километр имеет тоимость 3грн.
Если введено некоррекнтное значение дальности доставки - вывести сообщение об ошибке,
а все значения других полей должны сохранятся.
В случае успеха, должна посчитаться стоимость заказа.-->
<?php
$pizzaType = ["С ветчиной" => 30, "С говядиной" => 35, "С салями" => 40, "С грибами" => 25, "Вегетарианская" => 20];
$drinkType = ["Без напитка" => 0, "Coca cola" => 12, "Fanta" => 14, "Sprite" => 14];
?>
<form method="post">
    <p>Выберите пиццу</p>
    <select name="pizza">
        <?php
        foreach ($pizzaType as $typePizza => $costP) {
            echo '<option>' . "$typePizza" . '</option>';
        }
        ?>
    </select>
    <p>Выберите напиток</p>
    <select name="drink">
        <?php
        foreach ($drinkType as $typeDrink => $costD) {
            echo '<option>' . "$typeDrink" . '</option>';
        }
        ?>
    </select>
    <p>Укажите наличие промо-кода</p>
    <input type="checkbox" name="promo"/>
    <p>Доставка, расстояние в км.</p>
    <input type="text" name="delivery">
    <input type="submit" name="submit" value="Рассчитать стоимость">
</form>
<?php
$cost = 0;
if (
    isset($_POST['submit']) &&
    isset($_POST['pizza']) &&
    isset($_POST['drink'])
) {
    $costPizza = $pizzaType[$_POST['pizza']];
    $costDrink = $drinkType[$_POST['drink']];
    if (is_numeric($_POST['delivery']) !== false) {
        $costDelivery = abs($_POST['delivery']) * 3;
    } else {
        echo 'Некорректно указано расстояние доставки' . "<br>\n";
        $costDelivery = 0;
    }
    if (!isset($_POST['promo'])) {
        $cost = $costPizza + $costDrink + $costDelivery;
        echo 'Стоимость заказа: ' . $cost . ' грн.';
    } else {
        $cost = ($costPizza + $costDrink + $costDelivery) * 0.9;
        echo 'Стоимость заказа: ' . $cost . ' грн.';
    }
}
?>