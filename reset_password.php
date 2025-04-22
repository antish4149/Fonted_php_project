<?php
require_once "db_config.php";

$token = $_GET['token'] ?? '';
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    $new_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT id FROM users WHERE reset_token = ? AND reset_expires > NOW()");
    if (!$stmt) {
        die("SQL Prepare Error (SELECT user): " . $conn->error);
    }

    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $user_id = $user["id"];

        // Update password and clear token
        $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_expires = NULL WHERE id = ?");
        if (!$stmt) {
            die("SQL Prepare Error (UPDATE password): " . $conn->error);
        }

        $stmt->bind_param("si", $new_password, $user_id);
        $stmt->execute();

        $message = "Password reset successful! <a href='login.php'>Login now</a>";
    } else {
        $message = "Invalid or expired reset link.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="auth-form-container">
        <h2>Reset Password</h2>
        <?php if ($message): ?>
            <div class="info-message"><?= $message ?></div>
        <?php else: ?>
        <form method="POST">
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>
