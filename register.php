<?php 
session_start();

// 1. ส่วนของ Logic การสมัครสมาชิก
if (isset($_POST['reg_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    // ตรวจสอบเงื่อนไขเบื้องต้น (งานจริงต้องเช็คกับ Database SQL)
    if ($password_1 != $password_2) {
        echo "<script>alert('รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง');</script>";
    } else {
        // จำลองการบันทึกข้อมูล (ในโปรเจกต์จริงคุณจะใช้ SQL INSERT ที่นี่)
        $_SESSION['registered_email'] = $email;
        $_SESSION['success_msg'] = "สมัครสมาชิกสำเร็จ! กรุณาเข้าสู่ระบบ";
        
        // ใช้ JavaScript เพื่อย้อนกลับไปหน้า Login ทันที
        echo "<script>
            alert('สมัครสมาชิกสำเร็จ!');
            window.location.href = 'login.php';
        </script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก - Tutor Matching</title>
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

        /* --- Header สีส้มไล่เฉด พร้อมขอบล่างโค้งมน --- */
        .header-orange {
            background: var(--orange-grad); 
            height: 180px;
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center;
            color: white; 
            position: relative;
            
            /* --- เพิ่มความโค้งมนที่ขอบล่าง --- */
            border-radius: 0 0 50px 50px; 
        }
        .back-link { position: absolute; left: 20px; top: 25px; color: white; font-size: 22px; text-decoration: none; }
        .header-title { font-size: 24px; font-weight: 500; margin-top: 15px; }

        /* ฟอร์มสมัครสมาชิก */
        .reg-body { padding: 30px; flex: 1; }
        .input-group { margin-bottom: 18px; }
        .label { display: block; font-size: 14px; color: #888; margin-bottom: 8px; }
        .input {
            width: 100%; padding: 14px; border-radius: 12px;
            border: 1px solid #ddd; background: white; font-size: 14px; outline: none;
        }
        .input:focus { border-color: var(--soft-red); }

        /* ปุ่มกดสมัครสมาชิก */
        .btn-reg {
            width: 100%; background: var(--soft-red); color: white;
            border: none; border-radius: 12px; padding: 15px;
            font-size: 18px; font-weight: 500; cursor: pointer;
            box-shadow: 0 4px 15px rgba(255,107,107,0.3); margin-top: 10px; margin-bottom: 20px;
        }

        .login-text { text-align: center; font-size: 14px; color: #888; }
        .login-text b { color: var(--soft-red); cursor: pointer; }

        .footer-back {
            display: flex; align-items: center; justify-content: center;
            gap: 10px; color: #bbb; text-decoration: none; font-size: 15px; margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="header-orange">
        <a href="login.php" class="back-link"><i class="fa-solid fa-arrow-left"></i></a>
        <div class="header-title">สมัครสมาชิก</div>
    </div>

    <div class="reg-body">
        <form method="POST" action="register.php">
            <div class="input-group">
                <label class="label">ชื่อผู้ใช้งาน</label>
                <input type="text" name="username" class="input" placeholder="ระบุชื่อผู้ใช้งาน" required>
            </div>

            <div class="input-group">
                <label class="label">อีเมล</label>
                <input type="email" name="email" class="input" placeholder="example@email.com" required>
            </div>

            <div class="input-group">
                <label class="label">รหัสผ่าน</label>
                <input type="password" name="password_1" class="input" placeholder="........" required>
            </div>

            <div class="input-group">
                <label class="label">ยืนยันรหัสผ่าน</label>
                <input type="password" name="password_2" class="input" placeholder="........" required>
            </div>

            <button type="submit" name="reg_user" class="btn-reg">สมัครสมาชิก</button>

            <div class="login-text">เป็นสมาชิกอยู่แล้ว? <b onclick="location.href='login.php'">เข้าสู่ระบบ</b></div>

            <a href="login.php" class="footer-back"><i class="fa-solid fa-arrow-left"></i> กลับ</a>
        </form>
    </div>
</div>

</body>
</html>