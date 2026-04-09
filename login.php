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
        }

        * { box-sizing: border-box; font-family: 'Prompt', sans-serif; }
        body { margin: 0; background-color: #333; display: flex; justify-content: center; min-height: 100vh; }

        .mobile-container {
            width: 100%; max-width: 414px; min-height: 100vh;
            background-color: #F9F9F9; position: relative;
            display: flex; flex-direction: column; overflow: hidden;
        }

        /* Header สีส้มมนๆ บังส่วนขาวตาม UI ใหม่ */
        .header-orange {
            background: var(--orange-grad);
            height: 250px;
            border-radius: 0 0 50px 50px;
            display: flex; 
            flex-direction: column;
            align-items: center; 
            justify-content: center;
            color: white; 
            position: relative;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            z-index: 2;
        }

        .back-btn { 
            position: absolute; left: 20px; top: 40px; color: white; 
            font-size: 22px; text-decoration: none; 
        }

        .header-title { 
            font-size: 26px; font-weight: 500;
            margin-top: 20px;
        }

        /* ส่วนเนื้อหา */
        .content {
            flex: 1;
            padding: 40px 30px;
            width: 100%;
            background-color: #F9F9F9;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-form { width: 100%; margin-top: 10px; }
        
        .input-label {
            display: block; margin-bottom: 8px; font-size: 15px;
            color: #555; font-weight: 400;
        }

        .input-group { margin-bottom: 20px; }

        .input-field {
            width: 100%;
            padding: 15px 20px;
            border-radius: 12px;
            border: 1px solid #E0E0E0;
            background-color: white;
            font-size: 15px;
        }

        .forgot-link {
            display: block; text-align: right; margin-top: -10px;
            color: #FF8585; text-decoration: none; font-size: 14px;
        }

        /* ปุ่มเข้าสู่ระบบ */
        .btn-login {
            width: 100%;
            background-color: #FF6B6B;
            color: white; border: none;
            padding: 16px; border-radius: 12px;
            font-size: 20px; font-weight: 500;
            margin-top: 30px; cursor: pointer;
            box-shadow: 0 4px 10px rgba(255, 107, 107, 0.2);
        }

        .register-text {
            margin-top: 20px; font-size: 14px; color: #888; text-align: center;
        }
        .register-text a { color: #FF8585; text-decoration: none; font-weight: 500; }

        #error-msg {
            color: #FF6B6B; font-size: 13px; text-align: center;
            margin-top: 10px; display: none;
        }
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="header-orange">
        <a href="javascript:history.back()" class="back-btn"><i class="fa-solid fa-arrow-left"></i></a>
        <div class="header-title">เข้าสู่ระบบ</div>
    </div>

    <div class="content">
        <form class="login-form" id="loginForm">
            <div class="input-group">
                <label class="input-label">อีเมล</label>
                <input type="email" id="email" class="input-field" placeholder="กรอกอีเมลของคุณ" required>
            </div>
            
            <div class="input-group">
                <label class="input-label">รหัสผ่าน</label>
                <input type="password" id="password" class="input-field" placeholder="........" required>
            </div>

            <a href="#" class="forgot-link">ลืมรหัสผ่าน?</a>

            <div id="error-msg">อีเมลหรือรหัสผ่านไม่ถูกต้อง!</div>

            <button type="submit" class="btn-login">เข้าสู่ระบบ</button>
            
            <div class="register-text">
                ยังไม่มีบัญชี? <a href="#">สมัครสมาชิก</a>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const pass = document.getElementById('password').value;
    const errorMsg = document.getElementById('error-msg');

    // ตรวจสอบ Login ตามที่กำหนด
    if (email === 'user@gmail.com' && pass === '1234') {
        window.location.href = 'matching.php';
    } else if (email === 'admin@gmail.com' && pass === '4321') {
        window.location.href = 'admin_dashboard.php';
    } else {
        errorMsg.style.display = 'block';
    }
});
</script>

</body>
</html>