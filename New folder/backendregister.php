<?php
require("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['temail'];
    $nama = $_POST['tnama'];
    $pwd = $_POST['tpwd'];
    $role = $_POST['trole'];

    $response = array();

    if (!empty($email) && !empty($nama) && !empty($pwd) && !empty($role)) {
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        $stmt = $koneksi->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $response["success"] = false;
            $response["message"] = "Email sudah terdaftar!";
        } else {
            $stmt = $koneksi->prepare("INSERT INTO users (email, nama, pwd, role) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $email, $nama, $hashedPwd, $role);

            if ($stmt->execute()) {
                $response["success"] = true;
                $response["message"] = "Akun berhasil terdaftar!";
            } else {
                $response["success"] = false;
                $response["message"] = "Terjadi kesalahan saat mendaftar akun!";
            }
        }
        $stmt->close();
    } else {
        $response["success"] = false;
        $response["message"] = "Harap isi semua data!";
    }

    echo json_encode($response);
}
?>
