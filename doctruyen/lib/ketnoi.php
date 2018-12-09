<?php

function kiemtradangnhap($tendangnhap,$matkhau) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT taikhoan.hoten,taikhoan.tendangnhap FROM `taikhoan` WHERE taikhoan.tendangnhap='$tendangnhap' AND taikhoan.matkhau='$matkhau'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function get5theloai() {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT * FROM theloai LIMIT 0,5";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function get5tacgia() {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT * FROM tacgia LIMIT 0,5";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function doimatkhau($tendangnhap,$matkhaumoi) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "UPDATE `taikhoan` SET `matkhau`='$matkhaumoi' WHERE tendangnhap='$tendangnhap'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function gettruyentimkiem($txttimkiem) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT truyen.*,tacgia.tentacgia,theloai.tentheloai "
            . "FROM truyen INNER JOIN theloai ON truyen.matheloai = theloai.matheloai INNER JOIN tacgia ON truyen.matacgia = tacgia.matacgia "
            . "WHERE truyen.tentruyen LIKE '%$txttimkiem%' "
            . "ORDER BY truyen.matruyen DESC";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function gettruyentimkiem_phantrang($txttimkiem,$from,$sotruyen1trang) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT truyen.*,tacgia.tentacgia,theloai.tentheloai "
            . "FROM truyen INNER JOIN theloai ON truyen.matheloai = theloai.matheloai INNER JOIN tacgia ON truyen.matacgia = tacgia.matacgia "
            . "WHERE truyen.tentruyen REGEXP '$txttimkiem' "
            . "ORDER BY truyen.matruyen DESC"
            . "LIMIT $from,$sotruyen1trang";
    echo $sql;
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function gettheloai() {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT * FROM `theloai` WHERE 1";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function gettacgia() {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT * FROM `tacgia` WHERE 1";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function gettentruyen($mt) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT tentruyen FROM `truyen` WHERE matruyen=$mt";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function gettruyentheoloai($ml) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT truyen.*,tacgia.tentacgia,theloai.tentheloai "
            . "FROM truyen INNER JOIN theloai ON truyen.matheloai = theloai.matheloai INNER JOIN tacgia ON truyen.matacgia = tacgia.matacgia "
            . "WHERE truyen.matheloai='$ml' "
            . "ORDER BY truyen.matruyen DESC";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function gettruyentheoloai_phantrang($ml, $from, $sotruyen1trang) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT truyen.*,tacgia.tentacgia,theloai.tentheloai "
            . "FROM truyen INNER JOIN theloai ON truyen.matheloai = theloai.matheloai INNER JOIN tacgia ON truyen.matacgia = tacgia.matacgia "
            . "WHERE truyen.matheloai='$ml' "
            . "ORDER BY truyen.matruyen DESC "
            . "LIMIT $from,$sotruyen1trang";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function gettruyentheotacgia_phantrang($mtg, $from, $sotruyen1trang) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT truyen.*,tacgia.tentacgia,theloai.tentheloai "
            . "FROM truyen INNER JOIN theloai ON truyen.matheloai = theloai.matheloai INNER JOIN tacgia ON truyen.matacgia = tacgia.matacgia "
            . "WHERE truyen.matacgia='$mtg' "
            . "ORDER BY truyen.matruyen DESC "
            . "LIMIT $from,$sotruyen1trang";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function gettruyentheotacgia($mtg) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT truyen.*,tacgia.tentacgia,theloai.tentheloai "
            . "FROM truyen INNER JOIN theloai ON truyen.matheloai = theloai.matheloai INNER JOIN tacgia ON truyen.matacgia = tacgia.matacgia "
            . "WHERE truyen.matacgia='$mtg' "
            . "ORDER BY truyen.matruyen DESC";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function getsochuong($mt) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT chuong FROM `truyen_chuong` WHERE matruyen='$mt'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function getnoidungtruyen($mt, $chuong) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT noidung FROM `truyen_chuong` WHERE matruyen='$mt' AND chuong='$chuong'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function soluongtruyen() {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT count(*) AS soluongtruyen FROM truyen";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    mysqli_close($conn);
    return $row["soluongtruyen"];
}

function  soluongtruyentheotheloai($ml){
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT count(*) AS soluongtruyen FROM truyen WHERE truyen.matheloai='$ml'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    mysqli_close($conn);
    return $row["soluongtruyen"];
}

function  soluongtruyentheotacgia($mtg){
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT count(*) AS soluongtruyen FROM truyen WHERE truyen.matacgia='$mtg'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    mysqli_close($conn);
    return $row["soluongtruyen"];
}

function gettruyen() {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT truyen.*,tacgia.tentacgia,theloai.tentheloai "
            . "FROM truyen INNER JOIN theloai ON truyen.matheloai = theloai.matheloai INNER JOIN tacgia ON truyen.matacgia = tacgia.matacgia "
            . "ORDER BY truyen.matruyen DESC";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}


function gettruyen_phantrang($from, $sotruyen1trang) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT truyen.*,tacgia.tentacgia,theloai.tentheloai "
            . "FROM truyen INNER JOIN theloai ON truyen.matheloai = theloai.matheloai INNER JOIN tacgia ON truyen.matacgia = tacgia.matacgia "
            . "ORDER BY truyen.matruyen DESC "
            . "LIMIT $from,$sotruyen1trang ";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function themtheloai($tentheloai) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "INSERT INTO `theloai`(`tentheloai`) VALUES ('$tentheloai')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function xoatheloai($ml) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $truyencanxoa= gettruyentheoloai($ml);
    while($row_truyen = mysqli_fetch_array($truyencanxoa)){
        xoatruyen($row_truyen['matruyen']);
    }
    $sql = "DELETE FROM `theloai` WHERE matheloai=$ml";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function gettheloaisua($ml) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT * FROM theloai WHERE matheloai=$ml";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function suatheloai($matheloai,$tentheloai) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "UPDATE `theloai` SET `tentheloai`='$tentheloai' WHERE matheloai='$matheloai'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function themtacgia($tentacgia) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "INSERT INTO `tacgia`(`tentacgia`) VALUES ('$tentacgia')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function xoatacgia($mtg) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $truyencanxoa=gettruyentheotacgia($mtg);
    while ($row_truyen = mysqli_fetch_array($truyencanxoa)){
        xoatruyen($row_truyen['matruyen']);
    }
    $sql = "DELETE FROM `tacgia` WHERE matacgia=$mtg";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function gettacgiasua($mtg) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT * FROM tacgia WHERE matacgia=$mtg";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function suatacgia($matacgia,$tentacgia) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "UPDATE `tacgia` SET `tentacgia`='$tentacgia' WHERE matacgia='$matacgia'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function themtruyen($tentruyen,$tomtat,$tacgia,$theloai) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "INSERT INTO `truyen`(`tentruyen`, `tomtat`, `matheloai`, `matacgia`) VALUES ('$tentruyen','$tomtat','$theloai','$tacgia')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function xoatruyen($mt) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "DELETE FROM `truyen_chuong` WHERE truyen_chuong.matruyen='$mt' ORDER BY truyen_chuong.chuong";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM `truyen` WHERE truyen.matruyen='$mt'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function gettruyensua($mt) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT truyen.*,tacgia.tentacgia,theloai.tentheloai"
            . " FROM truyen INNER JOIN theloai ON truyen.matheloai = theloai.matheloai INNER JOIN tacgia ON truyen.matacgia = tacgia.matacgia"
            . " WHERE truyen.matruyen='$mt'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function suatruyen($matruyen,$tentruyen,$tomtat,$theloai,$tacgia){
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "UPDATE `truyen` SET `tentruyen`='$tentruyen',`tomtat`='$tomtat',`matheloai`='$theloai',`matacgia`='$tacgia' "
            . "WHERE truyen.matruyen='$matruyen' ";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function getchitiettruyen($mt) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT * FROM `truyen_chuong` WHERE matruyen='$mt'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function themchuong($mt,$mc,$noidung){
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "INSERT INTO `truyen_chuong`(`matruyen`, `chuong`, `noidung`) VALUES ('$mt','$mc','$noidung')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function xoachuong($mt,$mc){
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "DELETE FROM `truyen_chuong` WHERE truyen_chuong.matruyen = '$mt' AND truyen_chuong.chuong='$mc'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function getchuongsua($mt,$mc) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT truyen_chuong.*,truyen.tentruyen"
            . " FROM truyen_chuong INNER JOIN truyen ON truyen_chuong.matruyen = truyen.matruyen"
            . " WHERE truyen_chuong.matruyen='$mt' AND truyen_chuong.chuong='$mc'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function suachuong($mt,$mc,$noidung){
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "UPDATE `truyen_chuong` SET `noidung`='$noidung' WHERE matruyen='$mt' AND chuong = '$mc'";
    echo $sql;
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function getchuongmoinhat($mt) {
    $conn = mysqli_connect('localhost', 'root', '', 'doctruyen');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT MAX(truyen_chuong.chuong) FROM truyen_chuong WHERE truyen_chuong.matruyen='$mt'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    mysqli_close($conn);
    return $row['MAX(truyen_chuong.chuong)'];
}

?>

