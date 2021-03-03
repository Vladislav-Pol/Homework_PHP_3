<?php
//1. Сделайте функцию, которая возвращает куб числа. Число передается
//параметром.
echo "<hr>";

function cube($a){
    return $a ** 3;
}

echo cube(9);

//2. Сделайте функцию, которая возвращает сумму двух чисел. Числа
//передаются параметрами функции.
echo "<hr>";

function sum($a, $b){
    return $a + $b;
}

echo sum(5, 6) . "<hr>";

//3. Сделайте функцию, которая принимает параметром число от 1 до 7, а
//возвращает день недели на русском языке.
echo "<hr>";

function get_day_name($a){
     switch ($a){
         case 1:
             return "понедельник";
             break;
         case 2:
             return "вторник";
             break;
         case 3:
             return "среда";
             break;
         case 4:
             return "четверг";
             break;
         case 5:
             return "пятница";
             break;
         case 6:
             return "суббота";
             break;
         case 7:
             return "воскресенье";
             break;
         default:
             return false;
     }
}

?>
    <form action="" method="get">
        <input type="number" min="1" max="7" placeholder="1 - 7" name="day_number" style="min-width: 70px;" value="<? if(isset($_GET["day_number"])) echo $_GET["day_number"]?>">
        <button type="submit">вывести название дня недели</button>
        <span><? if(isset($_GET["day_number"])) echo get_day_name($_GET["day_number"])?></span>
    </form>
<?php

//4. Сделайте функцию, которая параметром принимает число и проверяет -
//отрицательное оно или нет. Если отрицательное - пусть функция вернет true,
//а если нет - false.
echo "<hr>";

function is_negative($a){
    return is_numeric($a) && $a < 0;
}

echo is_negative("-4") ? "true" : "false" . "<br/>";

//5. Сделайте функцию getDigitsSum (digit - это цифра), которая параметром
//принимает целое число и возвращает сумму его цифр.
echo "<hr>";

function getDigitsSum($a){
    if(!is_int($a))
        return false;
    else
        $a = abs($a);
    return countSum($a);
}
function countSum($a, $sum = 0){
    if($a == 0) return $sum;
    $sum += $a % 10;
    $a = intval($a / 10);
    return countSum($a, $sum);
}

$number_length = 10;
$rand_number = rand((-10 ** $number_length) - 1, (10 ** $number_length) - 1);
echo $rand_number . " сумма цифр равна " . getDigitsSum($rand_number);

//6. Найдите все года от 1 до 2020, сумма цифр которых равна 13. Для этого
//используйте вспомогательную функцию getDigitsSum из предыдущей задачи.
echo "<hr>";

for($i = 1; $i <= 2020; $i++){
    if(getDigitsSum($i) == 13) echo "$i ";
}

//7. Сделайте функцию isEven() (even - это четный), которая параметром
//принимает целое число и проверяет: четное оно или нет. Если четное - пусть
//функция возвращает true, если нечетное - false.
echo "<hr>";

function isEven($a){
    return !boolval($a % 2);
}

var_dump(isEven(0), isEven(1), isEven(2), isEven(3), isEven(-4), isEven(5));

//8. Сделайте функцию, которая принимает строку на русском языке, а
//возвращает ее транслит.
echo "<hr>"; //todo

//9. Сделайте функцию, которая возвращает множественное или единственное
//число существительного. Пример: 1 яблоко, 2 (3, 4) яблока, 5 яблок. Функция
//первым параметром принимает число, а следующие 3 параметра — форма
//для единственного числа, для чисел два, три, четыре и для чисел, больших
//четырех, например, func(3, 'яблоко', 'яблока', 'яблок').
echo "<hr>";

function get_word($number, $word_form1, $word_form2, $word_form3){
    $new_number = abs($number % 100);
    $text = strval($number) . " ";
    if($new_number == 0 || $new_number % 10 >=5 && $new_number % 10 <= 20 || $new_number >=5 && $new_number <= 20)
        $text .= $word_form3;
    elseif($number % 10 == 1)
        $text .= $word_form1;
    else
        $text .= $word_form2;

    return $text;
}

echo get_word(2, "слово", "слова", "слов");

//10. Дан массив с числами. Выведите последовательно его элементы
//используя рекурсию и не используя цикл.
echo "<hr>";

$arr = [23, 453, 36, 45, 56722, 23522];

function print_arr_elements($arr){
    if($arr) {
        echo array_shift($arr) . "<br/>";
        print_arr_elements($arr);
    }
}

print_arr_elements($arr);

//11. Дано число. Сложите его цифры. Если сумма получилась более 9-ти,
//опять сложите его цифры. И так, пока сумма не станет однозначным числом
//(9 и менее).
echo "<hr>";

$number = rand();

while ($number > 9){
    echo "Сумма цифр числа $number равна ";
    $number = getDigitsSum($number);
    echo "$number <br/>";
}


//12. Рассчитать скорость движения машины и выведите её в удобочитаемом
//виде. Осуществить возможность вывода в км/ч, м/c. Представить решение
//задачи с помощью одной функции.
echo "<hr>";

function get_speed(){
    if (empty($_GET["distance"]) || empty($_GET["time"]))
        return "Вы заполнили не все поля";
    if ($_GET["result_type"] == "kmh")
        $text = ($_GET["distance"] / $_GET["time"] * 60) . " км/ч";
    elseif ($_GET["result_type"] == "ms")
        $text = ($_GET["distance"] * 1000 / $_GET["time"] / 60) . " м/с";

    return $text;
}
?>
    <form action="" method="get">
        <div>Введите расстояние, которое проехала машина (в километрах)</div>
        <input type="number" min="1" name="distance" style="min-width: 70px;" value="<? if(isset($_GET["distance"])) echo $_GET["distance"]?>">
        <div>Введите время движения машины ( в минутах)</div>
        <input type="number" min="1" name="time" style="min-width: 70px;" value="<? if(isset($_GET["time"])) echo $_GET["time"]?>">
        <div>Выберите единицу измерения скорости</div>
        <select name="result_type" >
            <option value="kmh"<? if(isset($_GET["result_type"]) && $_GET["result_type"] == "kmh") echo "selected=\"selected\"";?>>км/ч</option>
            <option value="ms"<? if(isset($_GET["result_type"]) && $_GET["result_type"] == "ms") echo "selected=\"selected\"";?>>м/с</option>
        </select>
        <button type="submit">Рассчитать среднюю скорость движения машины</button>
        <span><?= get_speed()?></span>
    </form>
<?php


//13. Даны 2 слова, определить можно ли из 1ого слова составить 2ое, при
//условии что каждую букву из строки 1 можно использовать только один раз.
echo "<hr>"; //todo

//14. Палиндромом называют последовательность символов, которая читается
//как слева направо, так и справа налево. Напишите функцию по определению
//палиндрома по переданному параметру.
echo "<hr>";

function is_polyindrome($text){
    $arr = [];
    while(strlen($text) > 0){
        array_push($arr, substr($text, 0, 1));
        $text = substr($text, 1);
    }
    return $arr == array_reverse($arr);
}

echo is_polyindrome("заказ") ? "true" : "folse";

//15. Создание функцию создания таблицы умножения в HTML-документе в
//виде таблицы с использованием соотв. тегов.
echo "<hr>";
?>
<style>
td{
    width: 1.5em;
    height: 1.5em;
    text-align: right;
    border: 1px solid gray;
}
table{
    border-collapse: collapse;
}
</style>
<table>
    <tr>
        <? for($i = 0; $i <= 9; $i++):?>
        <td><?= $i;?></td>
        <? endfor;?>
    </tr>
    <? for($i = 1; $i <= 9; $i++):?>
    <tr>
        <? for($j = 0; $j <= 9; $j++):?>
        <td><?= $j == 0 ? $i : $i * $j?></td>
        <?endfor;?>
    </tr>
    <? endfor;?>

</table>
<?php

//16. Дана строка с текстом. Напишите функцию определения самого длинного
//слова.
echo "<hr>"; //todo

//17. Напишите функцию определения суммарного количества единиц в числах
//от 1 до 100.
echo "<hr>";
$count = 0;
for ($i = 1; $i <= 100; $i++){
    $i = strval($i);
    $count += substr_count($i, "1");
//    for($j = null;; $j++, $count++) {
//        $j = strpos($i, "1", $j);
//        if ($j === false) break;
//    }
}

echo $count;

//18. Напишите функцию, которая разбивает длинную строку тегами <br> так,
//чтобы длина каждой подстроки была не более N символов. Новая подстрока
//не должна начинаться с пробела.
echo "<hr>"; //todo

