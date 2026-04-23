<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --orange-grad: linear-gradient(180deg, #FF6B6B 0%, #FEB47B 100%);
            --soft-red: #FF6B6B;
            --bg-light: #F2F2F2;
        }

        * { box-sizing: border-box; font-family: 'Prompt', sans-serif; }
        body { margin: 0; background-color: #333; display: flex; justify-content: center; }

        .mobile-container {
            width: 100%;
            max-width: 414px;
            min-height: 100vh;
            background-color: var(--bg-light);
            position: relative;
            padding-bottom: 100px;
        }

        /* --- จุดที่แก้ไข: เพิ่ม border-radius ให้มุมล่างมนๆ --- */
        .header-bg {
            background: var(--orange-grad);
            height: 220px;
            border-radius: 0 0 40px 40px; /* ปรับค่าความมนตรงนี้ (ซ้ายล่าง ขวาล่าง) */
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            color: white;
            position: relative;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 20px;
            cursor: pointer;
        }

        .profile-img-wrap {
            width: 90px;
            height: 90px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .profile-img-wrap i { font-size: 50px; color: #DDD; }

        .tutor-name { font-size: 20px; font-weight: 600; margin: 0; }
        .tutor-email { font-size: 13px; opacity: 0.9; margin-top: 4px; }

        .content { padding: 25px; }
        .section-title { 
            font-size: 16px; 
            font-weight: 500; 
            margin-bottom: 15px; 
            display: block; 
            color: #333; 
        }

        .info-card {
            background: white;
            border-radius: 20px;
            padding: 10px 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 25px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #EEE;
            font-size: 14px;
        }
        .info-row:last-child { border-bottom: none; }

        .label { color: #AAA; }
        .value { color: #333; font-weight: 500; }
        .value i { color: #FFD700; margin-right: 4px; }

        .btn-schedule {
            width: 100%;
            background: #FF6B6B;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 15px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(255,107,107,0.3);
            margin-bottom: 20px;
        }

        .btn-logout {
            width: 100%;
            background: white;
            color: #FF6B6B;
            border: 1.5px solid #FF6B6B;
            padding: 14px;
            border-radius: 15px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: block;
        }

        .nav-bar {
            position: fixed;
            bottom: 0;
            width: 100%;
            max-width: 414px;
            background: white;
            display: flex;
            justify-content: space-around;
            padding: 15px 0;
            box-shadow: 0 -5px 15px rgba(0,0,0,0.02);
            border-radius: 20px 20px 0 0;
        }
        .nav-item { color: #FFCDCD; font-size: 26px; text-decoration: none; }
        .nav-item.active { color: #FF6B6B; }
    </style>
</head>
<body>

<div class="mobile-container">
    <header class="header-bg">
        <i class="fa-solid fa-arrow-left back-btn"></i>
        <div class="profile-img-wrap">
            <i class="fa-solid fa-user"></i>
        </div>
        <h2 class="tutor-name">Tutor</h2>
        <span class="tutor-email">weirgnsorgnrg123@gmail.com</span>
    </header>

    <div class="content">
        <span class="section-title">ข้อมูล</span>
        
        <div class="info-card">
            <div class="info-row">
                <span class="label">วิชาที่สอน</span>
                <span class="value">ฟิสิกส์, เคมี ></span>
            </div>
            <div class="info-row">
                <span class="label">สไตล์การสอน</span>
                <span class="value">Visual, Problem-solving ></span>
            </div>
            <div class="info-row">
                <span class="label">ราคา</span>
                <span class="value">200 ฿ / ชม.></span>
            </div>
            <div class="info-row">
                <span class="label">เรตติ้ง</span>
                <span class="value"><i class="fa-solid fa-star"></i> 4.9</span>
            </div>
            <div class="info-row">
                <span class="label">นักเรียนของฉัน</span>
                <span class="value">24 คน</span>
            </div>
        </div>

        <button class="btn-schedule">ตารางสอน</button>
        <a href="logout.php" class="btn-logout">ออกจากระบบ</a>
    </div>

    <nav class="nav-bar">
        <a href="index.php" class="nav-item"><i class="fa-solid fa-house"></i></a>
        <a href="#" class="nav-item"><i class="fa-solid fa-user-group"></i></a>
        <a href="#" class="nav-item"><i class="fa-solid fa-chart-simple"></i></a>
        <a href="tutor_profile.php" class="nav-item active"><i class="fa-solid fa-user"></i></a>
    </nav>
</div>

</body>
</html>