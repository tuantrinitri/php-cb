<?php
$arr1 = [1, "43", 434, "45", 24, 6, 23, 6, 1, 5, 6, 2];echo "\n";
$arr2 = [5, 6, 8, 4, 248, 5815, 9, 16, 1541, 15, 458, 321, 5, 6, 16, 698, 78, "88", "27889", 815, 997, "assaca"];
$mangchan = [];
$mangle = [];
// Hàm kiểm tra số chẵn
function sochan($number) {
    return is_numeric($number) && $number % 2 == 0;
}
// Hàm kiểm tra số lẻ
function sole($number) {
    return is_numeric($number) && $number % 2 != 0;
}
function duyetmang($inputArray, &$mangchanay, &$mangleay) {
    foreach ($inputArray as $item) {
        if (sochan($item)) {
            $mangchanay[] = (int)$item;
        } elseif (sole($item)) {
            $mangleay[] = (int)$item;
        }
    }
}
duyetmang($arr1, $mangchan, $mangle);
duyetmang($arr2, $mangchan, $mangle);
echo "Mảng số chẵn:\n ";
echo implode(", ", $mangchan);

echo "\nMảng số lẻ: ";
echo implode(", ", $mangle);
// 1. Gộp mảng chẵn của $arr1 và mảng lẻ của $arr2 thành mảng mới
$mangchan1 = array_filter($arr1, 'sochan');
$mangle2 = array_filter($arr2, 'sole');
$kethopmang = array_merge($mangchan1, $mangle2);
echo " Mảng mới sau khi gộp chẵn và lẻ:\n";
echo "[" . implode(", ", $kethopmang) . "]\n";
// 2. Xóa bỏ phần tử trùng của 2 mảng
$del1 = array_unique($arr1);
$del2= array_unique($arr2);
echo "Mảng 1 sau khi xóa phần tử trùng:\n";
echo "[" . implode(", ", $del1) . "]\n";
echo "   Mảng 2 sau khi xóa phần tử trùng:\n";
echo "[" . implode(", ", $del2) . "]\n";
// 3. Sắp xếp mảng trên theo thứ tự tăng dần
sort($kethopmang);
echo " Mảng mới sau khi sắp xếp tăng dần:\n";
echo "[" . implode(", ", $kethopmang) . "\n]\n";
// 4. Lấy key lớn nhất của mảng 1
$maxKeyArr1 = max(array_keys($arr1));
echo " Key lớn nhất của mảng 1: $maxKeyArr1\n";
// 5. Tìm số nhỏ nhất và lớn nhất của 2 mảng
$min = min(min($arr1), min($arr2));
function timmax($array) {
    $numbers = array_filter($array, 'is_numeric');
    return max($numbers);
}
$maxArr1 = timmax($arr1);
$maxArr2 = timmax($arr2);
$max = max($maxArr1, $maxArr2);



echo " Số nhỏ nhất trong cả hai mảng: $min\n";
echo "Số lớn nhất trong cả hai mảng: $max\n";
// 6. Tính trung bình cộng của 3 số nhỏ nhất mảng 1 và mảng 2
$smallestArr1 = array_slice($arr1, 0, 3);
$average = array_sum($smallestArr1) / count($smallestArr1);

echo " Trung bình cộng của 3 số nhỏ nhất trong mảng 1: $average\n";
?>