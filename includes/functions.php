<?php
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function login($username, $password) {
    global $conn;
    $username = mysqli_real_escape_string($conn, $username);
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        // Dalam produksi gunakan password_verify, namun ini untuk tugas sekolah sederhana
        if ($password === $row['password']) {
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['nama'] = $row['nama_lengkap'];
            return true;
        }
    }
    return false;
}

function checkLogin() {
    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
        exit;
    }
}

function checkAdmin() {
    if ($_SESSION['role'] !== 'admin') {
        header("Location: index.php");
        exit;
    }
}
?>
