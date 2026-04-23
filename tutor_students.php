<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>นักเรียนของฉัน</title>
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
            width: 100%; max-width: 414px; min-height: 100vh;
            background-color: var(--bg-light); position: relative; padding-bottom: 90px;
        }

        /* --- Header: เพิ่มเงาให้เห็นความมนชัดขึ้น --- */
        .header-bg {
            background: var(--orange-grad);
            height: 160px;
            border-radius: 0 0 40px 40px;
            display: flex; align-items: center; padding: 0 30px;
            position: relative;
            z-index: 10; /* ให้อยู่เหนือส่วน Tabs */
        }
        .header-title { color: white; font-size: 24px; font-weight: 500; margin-top: 10px; }

        /* --- Tabs & Filters: แก้ไขไม่ให้บัง Header --- */
        .tabs-section {
            background: white; border-radius: 30px 30px 0 0;
            margin-top: -35px; /* ดึงขึ้นไปเชื่อมกับ Header */
            padding: 45px 10px 10px; /* เพิ่ม padding-top เพื่อไม่ให้บังส่วนโค้งของสีส้ม */
            position: relative;
            z-index: 5;
        }
        .tab-nav { display: flex; justify-content: space-around; margin-bottom: 15px; }
        .tab-item { color: #888; text-decoration: none; font-size: 14px; padding-bottom: 5px; }
        .tab-item.active { color: var(--soft-red); border-bottom: 2px solid var(--soft-red); font-weight: 600; }

        .filter-scroll {
            display: flex; overflow-x: auto; gap: 8px; padding: 5px 15px;
            scrollbar-width: none;
        }
        .filter-scroll::-webkit-scrollbar { display: none; }
        
        .filter-btn {
            padding: 5px 15px; border-radius: 18px; border: 1px solid #EEE;
            background: white; color: #AAA; font-size: 11px; white-space: nowrap;
        }
        .filter-btn.active { background: var(--soft-red); color: white; border-color: var(--soft-red); }

        /* --- Student Cards: ปรับขนาดให้เล็กลงตามที่ต้องการ --- */
        .content { padding: 10px 20px; }
        .student-card {
            background: white; border-radius: 20px; 
            padding: 12px 15px; /* ลด padding ลง */
            margin-bottom: 12px; 
            box-shadow: 0 3px 10px rgba(0,0,0,0.04);
            position: relative; overflow: hidden;
            display: flex; align-items: center; justify-content: space-between;
        }

        .card-left { display: flex; align-items: center; gap: 12px; }
        
        .student-img {
            width: 50px; height: 50px; /* ลดขนาดรูปโปรไฟล์ */
            background: var(--soft-red);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
        }
        .student-img i { color: white; font-size: 28px; }

        .info-text h3 { font-size: 15px; margin: 0; color: #444; }
        .info-text p { font-size: 10px; color: #999; margin: 2px 0; }

        /* ปรับตำแหน่ง Badge */
        .progress-badge {
            padding: 4px 12px; border-radius: 10px; font-size: 11px; font-weight: 500;
        }
        .bg-red-light { background: #FFE5E5; color: var(--soft-red); }
        .bg-green-light { background: #E5FFF0; color: #2ECC71; }

        /* Progress Bar บางลง */
        .progress-bar-wrap {
            position: absolute; bottom: 0; left: 0; width: 100%;
            height: 4px; background: #F0F0F0;
        }
        .progress-fill { height: 100%; background: var(--soft-red); }
        .fill-complete { background: #2ECC71; }

        /* Nav Bar */
        .nav-bar {
            position: fixed; bottom: 0; width: 100%; max-width: 414px;
            background: white; display: flex; justify-content: space-around;
            padding: 15px 0; box-shadow: 0 -5px 15px rgba(0,0,0,0.02);
            border-radius: 25px 25px 0 0;
        }
        .nav-item { color: #FFCDCD; font-size: 24px; text-decoration: none; }
        .nav-item.active { color: var(--soft-red); }
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="header-bg">
        <div class="header-title">นักเรียนของฉัน</div>
    </div>

    <div class="tabs-section">
        <div class="tab-nav">
            <a href="#" class="tab-item active">กำลังสอน</a>
            <a href="#" class="tab-item">รอยืนยัน</a>
            <a href="#" class="tab-item">ประวัติ</a>
        </div>
        <div class="filter-scroll">
            <button class="filter-btn active">ทั้งหมด</button>
            <button class="filter-btn">คณิตศาสตร์</button>
            <button class="filter-btn">ฟิสิกส์</button>
            <button class="filter-btn">เคมี</button>
            <button class="filter-btn">อังกฤษ</button>
        </div>
    </div>

    <div class="content">
        <div class="student-card">
            <div class="card-left">
                <div class="student-img"><i class="fa-solid fa-user"></i></div>
                <div class="info-text">
                    <h3>Student Name</h3>
                    <p>ฟิสิกส์, เคมี | ครั้งต่อไป: พรุ่งนี้ 15:00</p>
                </div>
            </div>
            <div class="progress-badge bg-red-light">5/10</div>
            <div class="progress-bar-wrap">
                <div class="progress-fill" style="width: 50%;"></div>
            </div>
        </div>

        <div class="student-card">
            <div class="card-left">
                <div class="student-img"><i class="fa-solid fa-user"></i></div>
                <div class="info-text">
                    <h3>Student Name</h3>
                    <p>คณิตศาสตร์ | ครั้งต่อไป: ส. 10:00</p>
                </div>
            </div>
            <div class="progress-badge bg-green-light">10/10</div>
            <div class="progress-bar-wrap">
                <div class="progress-fill fill-complete" style="width: 100%;"></div>
            </div>
        </div>
    </div>

    <nav class="nav-bar">
        <a href="index.php" class="nav-item"><i class="fa-solid fa-house"></i></a>
        <a href="tutor_students.php" class="nav-item active"><i class="fa-solid fa-user-group"></i></a>
        <a href="#" class="nav-item"><i class="fa-solid fa-chart-simple"></i></a>
        <a href="tutor_profile.php" class="nav-item"><i class="fa-solid fa-user"></i></a>
    </nav>
</div>

</body>
</html>