<!-- <?php
require('dbconfig.php');

function getUserList() {
    global $db;
    $sql = "SELECT * FROM users;";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $rows = array();
    while ($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return $rows;
}

function addUser($username, $password, $type, $userID) {
    global $db;
    if ($userID > 0) {
        $sql = "UPDATE users SET username=?, password=?, type=? WHERE id=?";
    } else {
        $sql = "INSERT INTO users (username, password, type) VALUES (?, ?, ?)";
    }

    $stmt = mysqli_prepare($db, $sql);

    if ($stmt === false) {
        die('Error: ' . mysqli_error($db));
    }

    if ($userID > 0) {
        mysqli_stmt_bind_param($stmt, "ssii", $username, $password, $type, $userID);
    } else {
        mysqli_stmt_bind_param($stmt, "ssi", $username, $password, $type);
    }

    mysqli_stmt_execute($stmt);

    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"));

    $username = mysqli_real_escape_string($db, $data->username);
    $password = mysqli_real_escape_string($db, $data->password);
    $userType = mysqli_real_escape_string($db, $data->userType);

    // 在實際應用中應該使用安全的密碼雜湊函數，例如 password_hash
    $hashedPassword = $password; // 這只是簡單的例子，不安全

    // 調用 addUser 函數進行用戶註冊
    if (addUser($username, $hashedPassword, $userType, 0)) {
        echo "註冊成功";
    } else {
        echo "註冊失敗";
    }
}





?> -->
