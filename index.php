<?php
require_once 'MatchEngine.class.php';

// 1. ข้อมูลติวเตอร์จำลอง (Mock Data) อ้างอิงจากลักษณะใน UI
$tutorsRaw = [
    [
        "id" => 1,
        "name" => "Tutor Somchai",
        "rating" => 4.9,
        "subjects" => "ฟิสิกส์, เคมี",
        "type" => "Visual",
        "price" => 200,
        "tags" => ["ใจดี", "สอนสนุก", "เน้นเนื้อหา"]
    ],
    [
        "id" => 2,
        "name" => "Tutor Somsak",
        "rating" => 4.9,
        "subjects" => "เคมี, ชีวะ",
        "type" => "Lecture",
        "price" => 180,
        "tags" => ["เน้นโจทย์", "เนื้อหาแน่น", "ใจเย็น"]
    ],
    [
        "id" => 3,
        "name" => "Tutor Somying",
        "rating" => 4.8,
        "subjects" => "อังกฤษ, TOEIC",
        "type" => "Visual",
        "price" => 150,
        "tags" => ["สอนสนุก", "สำเนียงดี", "ใจดี"]
    ],
    [
        "id" => 4,
        "name" => "Tutor Alice",
        "rating" => 4.7,
        "subjects" => "แคลคูลัส, Stat",
        "type" => "Lecture",
        "price" => 150,
        "tags" => ["เนื้อหาแน่น", "ใจเย็น", "เน้นโจทย์"]
    ]
];

// 2. รับค่า Matching จากหน้า Preference
$userPref = isset($_POST['user_features']) ? array_filter($_POST['user_features']) : [];

// 3. ใช้ OOP ในการคำนวณและเรียงลำดับ (Match Engine)
$engine = new MatchEngine($tutorsRaw);
$tutorList = $engine->getMatchedTutors($userPref);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Matching - หน้าหลัก</title>
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
            display: flex; flex-direction: column; padding-bottom: 80px;
            overflow: hidden;
        }

        /* --- Header สีส้มโค้งมน (ปรับตามหน้าอื่น) --- */
        .header-orange {
            background: var(--orange-grad);
            height: 180px;
            border-radius: 0 0 50px 50px; /* โค้งมนลงมาบังส่วนขาว */
            padding: 35px 25px;
            color: white;
            position: relative;
            z-index: 10;
        }
        .header-title { font-size: 24px; font-weight: 500; margin-bottom: 12px; }

        /* ส่วนค้นหาใน Header */
        .search-wrap { position: relative; }
        .search-wrap i {
            position: absolute; left: 15px; top: 15px;
            color: rgba(255, 255, 255, 0.8); font-size: 18px;
        }
        .search-input {
            width: 100%; padding: 15px 15px 15px 45px;
            border-radius: 12px; border: none;
            background-color: rgba(255, 255, 255, 0.35); /* ขาวใสตาม UI */
            color: white; font-size: 14px; outline: none;
        }
        .search-input::placeholder { color: rgba(255, 255, 255, 0.7); }

        /* --- เนื้อหาหลัก --- */
        .content { flex: 1; padding: 25px 20px; }

        /* แถบวิชา */
        .subject-filter {
            display: flex; gap: 10px; margin-bottom: 20px;
            overflow-x: auto; padding-bottom: 5px;
        }
        .subject-tag {
            padding: 6px 15px; border-radius: 15px;
            background-color: white; color: #888;
            font-size: 11px; border: 1px solid #eee; white-space: nowrap;
        }
        .subject-tag.active { background-color: var(--soft-red); color: white; border-color: var(--soft-red); }

        .info-text { font-size: 12px; color: #999; margin-bottom: 15px; }

        /* --- การ์ดติวเตอร์ (UI เป๊ะตามรูป) --- */
        .tutor-card {
            background: white; border-radius: 20px; padding: 15px;
            display: flex; align-items: center; gap: 15px;
            margin-bottom: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            border: 1px solid #f0f0f0; transition: 0.2s;
        }

        /* รูปโปรไฟล์สีส้มแดง */
        .profile-img {
            width: 70px; height: 70px;
            background-color: #FF6B6B; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: white; font-size: 35px;
        }

        .tutor-detail { flex: 1; }
        .tutor-name { font-weight: 600; font-size: 16px; color: #333; margin-bottom: 2px; }
        .rating-box { display: flex; align-items: center; gap: 4px; font-size: 12px; color: #555; }
        .rating-box i { color: #555; font-size: 10px; }

        .tag-row { display: flex; gap: 6px; margin-top: 8px; }
        .tag-badge {
            font-size: 10px; padding: 3px 10px; border-radius: 8px;
            background-color: #FFF0F0; color: #FF6B6B;
        }

        /* วงกลม Match Score */
        .match-badge { text-align: center; min-width: 65px; }
        .score-circle {
            width: 58px; height: 58px; background-color: #FF6B6B;
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            color: white; font-weight: bold; font-size: 14px;
            box-shadow: 0 4px 10px rgba(255, 107, 107, 0.2);
        }
        .score-label { font-size: 9px; color: #bbb; margin-top: 4px; text-transform: uppercase; }

        /* --- Bottom Nav --- */
        .bottom-nav {
            position: absolute; bottom: 0; left: 0; width: 100%; height: 70px;
            background: white; border-top: 1px solid #eee;
            display: flex; justify-content: space-around; align-items: center;
        }
        .nav-item { color: #ccc; font-size: 24px; text-decoration: none; }
        .nav-item.active { color: #FFB0B0; }
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="header-orange">
        <div class="header-title">ค้นหาติวเตอร์</div>
        <div class="search-wrap">
            <i class="fa-solid fa-search"></i>
            <input type="text" class="search-input" placeholder="ค้นหาวิชา หรือชื่อติวเตอร์......">
        </div>
    </div>

    <div class="content">
        <div class="subject-filter">
            <div class="subject-tag active">ทั้งหมด</div>
            <div class="subject-tag">คณิตศาสตร์</div>
            <div class="subject-tag">ฟิสิกส์</div>
            <div class="subject-tag">เคมี</div>
            <div class="subject-tag">อังกฤษ</div>
        </div>

        <div class="info-text">พบ <?= count($tutorList) ?> ติวเตอร์ - เรียงตาม Match score</div>

        <?php foreach($tutorList as $t): ?>
        <div class="tutor-card" onclick="location.href='profile.php?id=<?= $t['id'] ?>'">
            <div class="profile-img"><i class="fa-solid fa-user"></i></div>
            
            <div class="tutor-detail">
                <div class="tutor-name"><?= $t['name'] ?></div>
                <div class="rating-box">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <span><?= $t['rating'] ?></span>
                    <span style="color:#aaa; margin-left:5px;"><?= $t['subjects'] ?></span>
                </div>
                <div class="tag-row">
                    <span class="tag-badge"><?= $t['type'] ?></span>
                    <span class="tag-badge" style="background:#FFE4E4; font-weight:600;"><?= $t['price'] ?>บาท/ชม.</span>
                </div>
            </div>

            <div class="match-badge">
                <div class="score-circle"><?= $t['score'] ?>%</div>
                <div class="score-label">Match</div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="bottom-nav">
        <a href="index.php" class="nav-item"><i class="fa-solid fa-home"></i></a>
        <a href="preference.php" class="nav-item active"><i class="fa-solid fa-search"></i></a>
        <a href="my_classes.php" class="nav-item"><i class="fa-solid fa-book-open"></i></a>
        <a href="#" class="nav-item"><i class="fa-solid fa-user"></i></a>
    </div>
</div>

</body>
</html>
