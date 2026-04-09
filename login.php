<?php 
session_start();

// 1. ตรวจสอบการกดปุ่มเข้าสู่ระบบ
if (isset($_POST['login_user'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ตรวจสอบว่ากรอกข้อมูลครบหรือไม่
    if (!empty($email) && !empty($password)) {
        // บันทึก Session พื้นฐาน
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";

        /* แก้ไขจาก matching.php เป็น preference.php
           ใช้ JavaScript ในการเปลี่ยนหน้าเพื่อความแน่นอน 
        */
        echo "<script>
            alert('เข้าสู่ระบบสำเร็จ!');
            window.location.href = 'preference.php';
        </script>";
        exit(); 
    } else {
        echo "<script>alert('กรุณากรอกอีเมลและรหัสผ่านให้ครบถ้วน');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - Tutor Matching</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --orange-grad: linear-gradient(180deg, #FF6B6B 0%, #FEB47B 100%);
            --soft-red: #FF6B6B;
            --bg-gray: #F9F9F9;
        }
        * { box-sizing: border-box; font-family: 'Prompt', sans-serif; }
        body { margin: 0; background-color: #333; display: flex; justify-content: center; min-height: 100vh; }

        .mobile-container {
            width: 100%; max-width: 414px; min-height: 100vh;
            background-color: var(--bg-gray); position: relative;
            display: flex; flex-direction: column;
        }

        .header-orange {
            background: var(--orange-grad); height: 200px;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            color: white; position: relative;
        }
        .back-link { position: absolute; left: 20px; top: 25px; color: white; font-size: 22px; }
        .header-title { font-size: 24px; font-weight: 500; margin-top: 15px; }

        .login-body { padding: 40px 30px; flex: 1; }
        .input-group { margin-bottom: 25px; }
        .label { display: block; font-size: 14px; color: #888; margin-bottom: 10px; }
        .input {
            width: 100%; padding: 16px; border-radius: 12px;
            border: 1px solid #ddd; background: white; font-size: 14px; outline: none;
        }
        .input:focus { border-color: var(--soft-red); }

        .forgot { text-align: right; margin-top: -15px; margin-bottom: 35px; }
        .forgot a { font-size: 12px; color: var(--soft-red); text-decoration: none; }

        .btn-login {
            width: 100%; background: var(--soft-red); color: white;
            border: none; border-radius: 12px; padding: 16px;
            font-size: 18px; font-weight: 500; cursor: pointer;
            box-shadow: 0 4px 15px rgba(255,107,107,0.3); margin-bottom: 20px;
        }

        .reg-text { text-align: center; font-size: 14px; color: #888; margin-bottom: 30px; }
        .reg-text b { color: var(--soft-red); cursor: pointer; }

        .footer-back {
            display: flex; align-items: center; justify-content: center;
            gap: 10px; color: #bbb; text-decoration: none; font-size: 15px;
        }
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="header-orange">
        <a href="#" class="back-link"><i class="fa-solid fa-arrow-left"></i></a>
        <div class="header-title">เข้าสู่ระบบ</div>
    </div>

    <div class="login-body">
        <form method="POST" action="login.php">
            <div class="input-group">
                <label class="label">อีเมล</label>
                <input type="email" name="email" class="input" placeholder="กรอกอีเมลของคุณ" required>
            </div>

            <div class="input-group">
                <label class="label">รหัสผ่าน</label>
                <input type="password" name="password" class="input" placeholder="........" required>
            </div>

            <div class="forgot"><a href="#">ลืมรหัสผ่าน?</a></div>

            <button type="submit" name="login_user" class="btn-login">เข้าสู่ระบบ</button>

            <div class="reg-text">ยังไม่มีบัญชี? <b onclick="location.href='register.php'">สมัครสมาชิก</b></div>

            <a href="#" class="footer-back"><i class="fa-solid fa-arrow-left"></i> กลับ</a>
        </form>
    </div>
</div>

</body>
</html>
