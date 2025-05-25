<?php
require_once "koneksi.php";

class Mahasiswa
{
    public function get_mahasiswa($id = 0)
    {
        global $koneksi;
        $query = "SELECT * FROM mahasiswa";
        if ($id != 0) $query .= " WHERE id = $id LIMIT 1";
        $result = $koneksi->query($query);
        $data = [];
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        echo json_encode(['status' => 1, 'data' => $data]);
    }

    public function insert_mahasiswa()
    {
        global $koneksi;
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $jurusan = $_POST['jurusan'];

        $result = mysqli_query($koneksi, "INSERT INTO mahasiswa(nama,nim,jurusan) VALUES('$nama','$nim','$jurusan')");
        echo json_encode(['status' => $result ? 1 : 0]);
    }

    public function update_mahasiswa($id)
    {
        global $koneksi;
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $jurusan = $_POST['jurusan'];

        $result = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan' WHERE id=$id");
        echo json_encode(['status' => $result ? 1 : 0]);
    }

    public function delete_mahasiswa($id)
    {
        global $koneksi;
        $result = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id=$id");
        echo json_encode(['status' => $result ? 1 : 0]);
    }
}
