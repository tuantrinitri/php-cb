<?php

// get <=> Read

function index()
{
    global $connect;
    $sql = "SELECT * FROM students";
    $result = $connect->query($sql); // db
    $students = []; // lưu trữ student hứng db
// bỏ qua TH sai

    if (!$result) {
        return null;
    }

// tinh trong TH đúng
    if (($result->num_rows) > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;

        }
        return $students; // tra ve danh sahc sinh vien
    }
    return null; // rong
}

