<?php
echo "Bài 1 <br>";
$arrs = [2, 5, 6, 9, 2, 5, 6, 12 ,5];

function tinhTong($arr){
    return array_sum($arr);
}
function tinhHieu($arr){
    $result = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        $result -= $arr[$i];
    }
    return $result;
}
function tinhTich($arr){
    return array_product($arr);
}

function tinhThuong($arr){
    $result = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        $result /= $arr[$i];
    }
    return $result;
}
$tong= tinhTong($arrs);
$hieu=tinhHieu($arrs);
$tich=tinhTich($arrs);
$thuong=tinhThuong($arrs);

echo "Tổng các phần tử = 2 + 5 + 6 + 9 + 2 + 5 + 6 + 12 + 5 = $tong <br>";
echo "Hiệu các phần tử = 2 - 5 - 6 - 9 - 2 - 5 - 6 - 12 - 5 = $hieu <br>";
echo "Tích các phần tử = 2 * 5 * 6 * 9 * 2 * 5 * 6 * 12 * 5 = $tich <br>";
echo "Thương các phần tử = 2 / 5 / 6 / 9 / 2 / 5 / 6 / 12 / 5 = $thuong <br>";


echo "<br><br> Bài 2<br>";
$arrs = ['đỏ', 'xanh', 'cam', 'trắng'];

$names = ['Anh', 'Sơn', 'Thắng', 'tôi'];

$count = min(count($arrs), count($names));

// Tạo chuỗi kết quả
$result = "";
for ($i = 0; $i < $count; $i++) {
    if ($i == 1){
        $result .= "Màu <span style='color: red; font-weight: bold;'>" . $arrs[3] . " </span>là màu yêu thích của " . $names[$i]."";
    }else{
        $result .= "Màu <span style='color: red; font-weight: bold;'>" . $arrs[$i] . " </span>là màu yêu thích của " . $names[$i]."";
    }
    
    if ($i < $count - 1) {
        $result .= ", ";
    } else {
        $result .= ".";
    }
}

echo "<em>" . $result . "</em><br><br><br>";

echo"<br><br> Bài 3 <br>";
$arrs = ['PHP', 'HTML', 'CSS', 'JS'];

echo "<table style=\"border-collapse: collapse;\">";
echo "<tr><th style=\"border: 3px solid black;\">Tên khóa học</th></tr>";

$i = 1;
foreach ($arrs as $subject) {
    echo "<tr>";
    echo "<td style=\"border: 3px solid black;\">" . $subject . "</td>";
    echo "</tr>";
    $i++;
}

echo "</table>";

echo"<br><br> Bài 4 <br>";
$arrs = array(
    "Italy" => "Rome",
    "Luxembourg" => "Luxembourg",
    "Belgium" => "Brussels",
    "Denmark" => "Copenhagen",
    "Finland" => "Helsinki",
    "France" => "Paris",
    "Slovakia" => "Bratislava",
    "Slovenia" => "Ljubljana",
    "Germany" => "Berlin",
    "Greece" => "Athens",
    "Ireland" => "Dublin",
    "Netherlands" => "Amsterdam",
    "Portugal" => "Lisbon",
    "Spain" => "Madrid",
    "Sweden" => "Stockholm",
    "United Kingdom" => "London",
    "Cyprus" => "Nicosia",
    "Lithuania" => "Vilnius",
    "Czech Republic" => "Prague",
    "Estonia" => "Tallinn",
    "Hungary" => "Budapest",
    "Latvia" => "Riga",
    "Malta" => "Valletta",
    "Austria" => "Vienna",
    "Poland" => "Warsaw"
);

foreach ($arrs as $country => $capital) {
    echo "Thủ đô của $country là $capital<br>";
}

echo "<br><br> Bài 5 <br>";
$a = [
    'a' => [
    'b' => 0,
    'c' => 1
    ],
    'b' => [
    'e' => 2,
    'o' => [
    'b' => 3
    ]
    ]
   ];
   $valueB = $a['b']['o']['b'];
   echo "Giá trị = $valueB với key là 'b'<br>";   
   $valueC = $a['a']['c'];
   echo "Giá trị = $valueC với key là 'c'<br>";
   $infoA = $a['a'];
   echo "Thông tin của phần tử có key là 'a':<br>";
print_r($infoA);

echo "<br><br> Bài 6 <br>";
$keys = array(
    "field1" => "first",
    "field2" => "second",
    "field3" => "third"
);

$values = array(
    "field1value" => "dinosaur",
    "field2value" => "pig",
    "field3value" => "platypus"
);

$keysAndValues = array();

foreach ($keys as $key => $value) {
    $keysAndValues[$value] = $values[$key . 'value'];
}
print_r($keysAndValues);

echo "<br><br> Bài 7 <br>";
$array = [12, 5, 200, 10, 125, 60, 90, 345, -123, 100, -125, 0];

foreach ($array as $number) {
    if ($number >= 100 && $number <= 200 && $number % 5 === 0) {
        echo $number . "<br>";
    }
}

echo "<br><br> Bài 8 <br>";
$array = ['programming', 'php', 'basic', 'dev', 'is', 'program is PHP'];
$maxLength = 0;
$minLength = 100;
$maxLengthString = "";
$minLengthString = "";

foreach ($array as $string) {
    $length = strlen($string);

    if ($length > $maxLength) {
        $maxLength = $length;
        $maxLengthString = $string;
    }

    if ($length < $minLength) {
        $minLength = $length;
        $minLengthString = $string;
    }
}

echo "Chuỗi lớn nhất là $maxLengthString, độ dài = $maxLength<br>";
echo "Chuỗi nhỏ nhất là $minLengthString, độ dài = $minLength<br>";

echo "<br><br> Bài 9 <br>";
function convertToLowercase($arr) {
    foreach ($arr as &$value) {
        if (is_string($value)) {
            $value = strtolower($value);
        }
    }
    unset($value);
    return $arr;
}

$arr1 = ['a', 'b', 'ABC'];
$arr2 = ['1', 'B', 'C', 'E'];
$arr3 = ['a', 0, null, false];

$result1 = convertToLowercase($arr1);
$result2 = convertToLowercase($arr2);
$result3 = convertToLowercase($arr3);

echo "Kết quả arr1: ";
print_r($result1);

echo "<br>Kết quả arr2: ";
print_r($result2);

echo "<br>Kết quả arr3: ";
print_r($result3);

echo "<br><br> Bài 10 <br>";
function convertToUppercase($arr) {
    foreach ($arr as &$value) {
        if (is_string($value)) {
            $value = strtoupper($value);
        }
    }
    unset($value);
    return $arr;
}

$arr1 = ['a', 'b', 'ABC'];
$arr2 = ['1', 'b', 'c', 'd'];
$arr3 = ['a', 0, null, false];

$result1 = convertToUppercase($arr1);
$result2 = convertToUppercase($arr2);
$result3 = convertToUppercase($arr3);

echo "Kết quả arr1: ";
print_r($result1);

echo "<br>Kết quả arr2: ";
print_r($result2);

echo "<br>Kết quả arr3: ";
print_r($result3);

echo "<br><br> Bài 11 <br>";
$array = array(1, 2, 3, 4, 5);

array_splice($array, 2, 1);

$array = array_values($array);

print_r($array);

echo "<br><br> Bài 12 <br>";
$numbers = [
    'key1' => 12, 
    'key2' => 30, 
    'key3' => 4, 
    'key4' => -123, 
    'key5' => 1234, 
    'key6' => -12565,];
    $firstElement = reset($numbers);
    $lastElement = end($numbers);
    
    echo "Phần tử đầu tiên: $firstElement<br>";
    echo "Phần tử cuối cùng: $lastElement<br>";
    $maxValue = max($numbers);
    $minValue = min($numbers); 
    $sum = array_sum($numbers);

    echo "Số lớn nhất: $maxValue<br>";
    echo "Số nhỏ nhất: $minValue<br>";
    echo "Tổng các giá trị: $sum<br>";

    asort($numbers);
    echo "Sắp xếp tăng giá trị: ";
    print_r($numbers);
    arsort($numbers);
    echo "<br>Sắp xếp giảm giá trị: ";
    print_r($numbers);

    ksort($numbers);
    echo "<br>Sắp xếp tăng key: ";
    print_r($numbers);
    krsort($numbers);
    echo "<br>Sắp xếp giảm key: ";
    print_r($numbers);
    
echo "<br><br> Bài 13 <br>";
    $numbers = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];

    $average = array_sum($numbers) / count($numbers);

    echo "Giá trị trung bình của mảng là: $average<br>";

    echo "Các số lớn hơn giá trị trung bình: ";
    foreach ($numbers as $number) {
        if ($number > $average) {
        echo $number . " ";
    }
    }
    echo "<br>";

    echo "Các số nhỏ hơn hoặc bằng giá trị trung bình: ";
    foreach ($numbers as $number) {
        if ($number <= $average) {
        echo $number . " ";
    }
    }
echo "<br><br> Bài 14 <br>";
    $array1 = [
        [77, 87],
        [23, 45]
    ];

    $array2 = [
        'giá trị 1',
        'giá trị 2'
    ];

    $result = [];

    foreach ($array1 as $key => $value) {
        $result[$key] = array_merge([$array2[$key]], $value);
    }

    print_r($result);