<?php
require('dbconfig.php');

function getUserList() {
    global $db;
    $sql = "SELECT * FROM users;";
    $result = mysqli_query($db, $sql);

    $rows = array();
    while ($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return $rows;
}

function verifyLogin($username, $password) {
    global $db;

    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);
    

    // 在實際應用中應該使用安全的密碼雜湊函數，例如 password_hash
    $hashedPassword = $password; // 這只是簡單的例子，不安全

    $query = "SELECT * FROM users WHERE username='$username' AND password='$hashedPassword'";
    $result = mysqli_query($db, $query);


}

if ($_SERVER["REQUEST_METHOD"] == "POST123") {
    $data = json_decode(file_get_contents("php://input"));

    $username = mysqli_real_escape_string($db, $data->username);
    $password = mysqli_real_escape_string($db, $data->password);

    // 在實際應用中應該使用安全的密碼雜湊函數，例如 password_hash
    // 這裡僅是簡單的例子，不安全
    $hashedPassword = $password;

    $query = "SELECT * FROM users WHERE username='$username' AND password='$hashedPassword'";
    $result = mysqli_query($db, $query);
    
    if ($result) {
        $user = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {
            // 登入成功
            $userType = $user['type'];
            $userId = $user['id'];
            session_start();
            $_SESSION['user_id'] = $userId;
            
            if ($userType == 1) {
                echo "登入成功1";           
            } elseif ($userType == 2) {
                echo "登入成功2";
            } else {
                echo "未知用戶類型";
            }
            return $userId;
        } else {
            // 登入失敗
            echo "無效的使用者名稱或密碼";
        }
    } else {
        // 查詢失敗
        echo "登入失敗";
    }
} else {
    // 不是 POST 請求
    echo "非法請求";
}



?>
