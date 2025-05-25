<?php
require_once "method.php";
$mahasiswa = new Mahasiswa();
$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case 'GET':
        if (!empty($_GET["id"])) $mahasiswa->get_mahasiswa(intval($_GET["id"]));
        else $mahasiswa->get_mahasiswa();
        break;
    case 'POST':
        if (!empty($_GET["id"])) $mahasiswa->update_mahasiswa(intval($_GET["id"]));
        else $mahasiswa->insert_mahasiswa();
        break;
    case 'DELETE':
        $mahasiswa->delete_mahasiswa(intval($_GET["id"]));
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
