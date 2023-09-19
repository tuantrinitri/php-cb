<?php
$arr1 = [1, "43", 434, "45", 24, 6, 23, 6, 1, 5, 6, 2];
$arr2 = [5, 6, 8, 4, 248, 5815, 9, 16, 1541, 15, 458, 321, 5, 6, 16, 698, 78, "88", "27889", 815, 997, "assaca"];

$evenArr1 = [];
$oddArr2 = [];

// Tạo mảng chẵn từ $arr1
for ($i = 0; $i < count($arr1); $i++) {
    $value = $arr1[$i];
    if (is_numeric($value) && $value % 2 == 0) {
        $evenArr1[] = $value;
    }
}

// Tạo mảng lẻ từ $arr2
for ($i = 0; $i < count($arr2); $i++) {
    $value = $arr2[$i];
    if (is_numeric($value) && $value % 2 != 0) {
        $oddArr2[] = $value;
    }
}

// In ra mảng $evenArr1 và $oddArr2
echo "Mảng chẵn từ \$arr1: " . implode(", ", array_unique($evenArr1)). "<br>";
echo "Mảng lẻ từ \$arr2: " . implode(", ", array_unique($oddArr2)) . "<br>";

// Gộp mảng chẵn của $arr1 và mảng lẻ của $arr2 thành mảng mới
$newArray = array_merge($evenArr1, $oddArr2);

// Xóa bỏ phần tử trùng của mảng mới
$newArray = array_unique($newArray);

// Sắp xếp mảng mới theo thứ tự tăng dần
sort($newArray);

// Lấy key lớn nhất của mảng $arr1
$maxKeyArr1 = max(array_keys($evenArr1));

// Tìm số nhỏ nhất và lớn nhất trong 2 mảng
$minValue = min(min($evenArr1), min($oddArr2));
$maxValue = max(max($evenArr1), max($oddArr2));

// Tính trung bình cộng của 3 số nhỏ nhất trong mảng $arr1 và mảng $arr2
// $sortedArr1 = $evenArr1;
// sort($sortedArr1);
// $sortedArr2 = $oddArr2;
// sort($sortedArr2);
// $threeMinValues = array_merge(array_slice($sortedArr1, 0, 3), array_slice($sortedArr2, 0, 3));
// sort($threeMinValues);
// $average = array_sum(array_slice($threeMinValues,0,3)) / count(array_slice($threeMinValues,0,3));
$average = array_sum(array_slice($newArray,0,3)) / count(array_slice($newArray,0,3));

// In kết quả
echo "Mảng mới sau khi gộp, xóa bỏ phần tử trùng nhau và sắp xếp tăng dần: " . implode(", ", $newArray) . "<br>";
echo "Key lớn nhất của mảng \$arr1: " . $maxKeyArr1 . "<br>";
echo "Số nhỏ nhất trong cả hai mảng: " . $minValue . "<br>";
echo "Số lớn nhất trong cả hai mảng: " . $maxValue . "<br>";
echo "Trung bình cộng của 3 số nhỏ nhất: " . round($average,2) . "<br>";

