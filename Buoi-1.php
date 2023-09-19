<?php
#KHAI BÁO BIẾN
$a = "Chào mừng buổi học PHP cơ bản"; // tương đương 1 địa chỉ ô nhớ, 1 biến
#kỹ thuật debug
//die
#KHAI BÁO HẰNG
// define(‘ten_hang’, ‘gia_tri’); khai báo hằng CO
define('_MSV', 15);

#Các kiểu dữ liệu trong php
//1. kiểu int
$int = 1;
#-số thập phân
$so_thap_phan = 12345;
#- số âm
$so_am = -5;
#- so bat phân 
$so_bat_phan = 00015; // rất ít gặp, chỗ này tìm hiểu thêm
# - số thập lục phân
$thap_luc_phan = 0x1A; // rất ít gặp, chỗ này tìm hiểu thêm
# ép kiểu dữ liệu
$chuoi = "95";
$tuoi = (int)$chuoi; // chuyen tu chuỗi sang số;
is_int($chuoi); // kiem tra bien co phai kieu int khonog

# Kiểu boolean ( logic ) TRUE || FALSE

#Kiểu số phức (float), (double)  
$do_dai = (float) 5; // kiểu số thực
$do_rong = (float) 5; // kiểu số thức;
is_double($do_dai);  // true or false
#Kiểu chuỗi
$chuoi = "text";  // khai báo kiểu này luôn cho tiện và gọn

$test = (string) "test";
# Kiểu mảng (quan trọng) luôn luôn sử dụng
$mang = array(); // khởi tạo 1 mảng rỗng
$mang = []; // khởi tạo 1 mảng rỗng

$mang_phan_tu = array("1", '2', '3'); // mảng không chỉ mục

$sinhvien = array(
    0 => 'Nguyễn Văn A',
    1 => 'Nguyễn Văn B'
); // mảng có chỉ mục
# mảng kết hợp
$sinh_vien = [
    'sinh_vien1' => "Trần Quang Tuấn",
    'sinh_vien2'                  => "Trần Thanh an"
];
#Mảng lồng nhau

$sinhVien = [
    1 => [
        'ten' => "Trần Quang Tuấn",
        'tuoi' => 27,
        'dia_chi' =>
        [
            'nha_rieng' => 'Ha Noi',
            'co_quan' => 'Nha Trang',
        ]
    ],

    2 => [
        'ten' => "Trần Thanh An",
        'tuoi' => 18
    ]
];

var_dump($sinhVien);
// print $; // sinh_vien biến động string ngoài || echo