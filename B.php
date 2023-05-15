<?php
    //method permintaan post
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //mengambil nilai numData dan textData
    $numData = $_POST['numData'];
    $textData = $_POST['textData'];
    //array untuk menyimpan data
    $dataArray = array();
    //perulangan data yang diinput
    for ($i = 1; $i <= $numData; $i++) {
        $dataArray[] = $textData . ' ' . $i;
    }
    //header untuk tipe konten sebagai JSON
    header('Content-Type: application/json');
    //mengembalikan data dalam format JSON
    echo json_encode($dataArray);
    }
?>
