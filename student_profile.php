<?php
session_start();

// OOP: ดึงข้อมูลนักเรียน (สมมติว่าดึงมาจาก Database หรือ Session)
class Student {
    public $name = "สมชาย ใจดี";
    public $id = "STU-67001";
    public $level = "ม.ปลาย";
    public $subject = "เคมี";
    public $style = "เน้นโจทย์";
    public $budget = 250;
}
$user = new Student();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์นักเรียน</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --orange-grad: linear-gradient(180deg, #FF6B6B 0%, #FEB47B 100%);
            --soft-red: #FF6B6B;
            --bg-light: #F9F9F9;
        }
        * { box-sizing: border-box; font-family: 'Prompt', sans-serif; }
        body { margin: 0; background-color: #333; display: flex; justify-content: center; }

        .mobile-container {
            width: 100%; max-width: 414px; min-height: 100vh;
            background-color: var(--bg-light); position: relative; padding-bottom: 110px;
        }

        /* Header สีส้มคลีนๆ ตามสั่ง */
        .header-bg {
            background: var(--orange-grad);
            height: 240px;
            border-radius: 0 0 50px 50px;
            display: flex; flex-direction: column; align-items: center;
            padding-top: 45px; color: white;
            text-align: center;
        }
        
        .profile-img {
            width: 90px; height: 90px; background: white; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .profile-img i { font-size: 45px; color: #E5E5E5; }

        .display-name { font-size: 22px; font-weight: 600; margin: 0; }
        .display-id { font-size: 14px; opacity: 0.9; margin-top: 5px; }

        /* รายการข้อมูล (คลิกเพื่อไปหน้าแก้ไขได้) */
        .setting-list { padding: 30px 25px 0; }
        .menu-item {
            background: white; border-radius: 20px; padding: 16px 20px;
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 12px; border: 1px solid #F0F0F0;
            text-decoration: none; color: inherit;
            transition: 0.2s;
        }
        .menu-item:active { background: #fdfdfd; transform: scale(0.98); }
        
        .label-group { display: flex; align-items: center; gap: 12px; font-size: 15px; color: #555; }
        .label-group i { color: var(--soft-red); width: 20px; text-align: center; }
        .val-text { font-weight: 600; color: #333; }

        /* ปุ่มออกจากระบบล่างสุด */
        .btn-logout {
            width: calc(100% - 50px); 
            background: white; color: var(--soft-red); 
            border: 1.5px solid var(--soft-red);
            padding: 16px; border-radius: 18px; 
            font-size: 16px; font-weight: 600;
            margin: 20px 25px; 
            cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px;
            text-decoration: none;
        }

        /* Nav ล่าง */
        .nav-bar {
            position: fixed; bottom: 0; width: 100%; max-width: 414px;
            background: white; display: flex; justify-content: space-around;
            padding: 15px 0; border-radius: 25px 25px 0 0; box-shadow: 0 -5px 20px rgba(0,0,0,0.03);
        }
        .nav-link { color: #ddd; font-size: 22px; text-decoration: none; }
        .nav-link.active { color: var(--soft-red); }
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="header-bg">
        <div class="profile-img"><i class="fa-solid fa-user"></i></div>
        <p class="display-name"><?= $user->name ?></p>
        <p class="display-id">ID: <?= $user->id ?></p>
    </div>

    <div class="setting-list">
        <a href="edit_preference.php" class="menu-item">
            <div class="label-group"><i class="fa-solid fa-graduation-cap"></i> <span>ระดับชั้น</span></div>
            <div class="val-text"><?= $user->level ?> <i class="fa-solid fa-chevron-right" style="font-size:10px; margin-left:5px; color:#ccc;"></i></div>
        </a>

        <a href="edit_preference.php" class="menu-item">
            <div class="label-group"><i class="fa-solid fa-book"></i> <span>วิชาที่เรียน</span></div>
            <div class="val-text"><?= $user->subject ?> <i class="fa-solid fa-chevron-right" style="font-size:10px; margin-left:5px; color:#ccc;"></i></div>
        </a>

        <a href="edit_preference.php" class="menu-item">
            <div class="label-group"><i class="fa-solid fa-bolt"></i> <span>สไตล์ที่ชอบ</span></div>
            <div class="val-text"><?= $user->style ?> <i class="fa-solid fa-chevron-right" style="font-size:10px; margin-left:5px; color:#ccc;"></i></div>
        </a>

        <a href="logout.php" class="btn-logout">
            <i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ
        </a>
    </div>

    <div class="nav-bar">
        <a href="index.php" class="nav-link"><i class="fa-solid fa-house"></i></a>
        <a href="edit_preference.php" class="nav-link"><i class="fa-solid fa-sliders"></i></a>
        <a href="#" class="nav-link"><i class="fa-solid fa-comment-dots"></i></a>
        <a href="student_profile.php" class="nav-link active"><i class="fa-solid fa-user"></i></a>
        <a href="my_classes.php" class="nav-link"><i class="fa-solid fa-book-open"></i></a>
    </div>
</div>

</body>
</html>
