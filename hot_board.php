<?php
session_start();

/**
 * OOP SECTION: คลาสสำหรับจัดการข้อมูลอันดับ
 */
class RankItem {
    public $name, $subjects, $score;

    public function __construct($name, $subjects, $score) {
        $this->name = $name;
        $this->subjects = $subjects;
        $this->score = $score;
    }
}

// รับค่าประเภทการจัดอันดับ (Default เป็นนักศึกษา)
$type = $_GET['type'] ?? 'student';

// จำลองข้อมูลอันดับ (ในอนาคตดึงจาก Database)
$rankList = [];
if ($type === 'student') {
    for ($i = 1; $i <= 10; $i++) {
        $rankList[] = new RankItem("Student Name $i", "ฟิสิกส์, เคมี", 400);
    }
} else {
    for ($i = 1; $i <= 10; $i++) {
        $rankList[] = new RankItem("Tutor Name $i", "คณิตศาสตร์, อังกฤษ", 550);
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HoT Board - Tutorlink</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --orange-grad: linear-gradient(180deg, #FF6B6B 0%, #FEB47B 100%);
            --soft-red: #FF6B6B;
            --bg-gray: #F9F9F9;
        }
        * { box-sizing: border-box; font-family: 'Prompt', sans-serif; }
        body { margin: 0; background-color: #333; display: flex; justify-content: center; }

        .mobile-container {
            width: 100%; max-width: 414px; min-height: 100vh;
            background-color: var(--bg-gray); position: relative; padding-bottom: 80px;
        }

        /* Header */
        .header-orange {
            background: var(--orange-grad); height: 180px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 0 0 0 0;
        }
        .logo-text { font-family: 'serif'; font-size: 42px; color: white; font-weight: bold; }

        /* Board Title & Toggle */
        .board-title { text-align: center; font-size: 32px; font-weight: 700; margin: 25px 0 15px; color: #333; }
        
        .toggle-container {
            display: flex; justify-content: center; gap: 10px; margin-bottom: 25px;
        }
        .btn-toggle {
            padding: 8px 35px; border-radius: 20px; text-decoration: none;
            font-size: 14px; font-weight: 500; border: 1.5px solid var(--soft-red);
            transition: 0.3s;
        }
        .btn-toggle.active { background: var(--soft-red); color: white; }
        .btn-toggle.inactive { background: white; color: var(--soft-red); }

        /* Ranking List Card */
        .rank-card {
            background: white; margin: 0 20px; border-radius: 25px; padding: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .rank-header { font-size: 14px; color: #333; font-weight: 600; margin-bottom: 15px; }

        .rank-item {
            display: flex; justify-content: space-between; align-items: center;
            padding: 12px 0; border-bottom: 1px solid #f1f1f1;
        }
        .rank-item:last-child { border: none; }

        .item-info { display: flex; flex-direction: column; }
        .item-name { font-size: 13px; color: #bbb; }
        .item-sub { font-size: 12px; color: #444; font-weight: 500; }

        .item-score { display: flex; align-items: center; gap: 5px; font-size: 13px; color: #444; }
        .item-score i { color: #333; font-size: 12px; }

        /* Bottom Nav */
        .nav-bar {
            position: fixed; bottom: 0; width: 100%; max-width: 414px;
            background: white; display: flex; justify-content: space-around;
            padding: 15px 0; border-radius: 25px 25px 0 0; box-shadow: 0 -5px 20px rgba(0,0,0,0.03);
        }
        .nav-link { color: #ddd; font-size: 24px; text-decoration: none; }
        .nav-link.active { color: var(--soft-red); }
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="header-orange">
        <div class="logo-text">Tutorlink</div>
    </div>

    <h1 class="board-title">HoT Board</h1>

    <div class="toggle-container">
        <a href="?type=student" class="btn-toggle <?= $type == 'student' ? 'active' : 'inactive' ?>">นักศึกษา</a>
        <a href="?type=tutor" class="btn-toggle <?= $type == 'tutor' ? 'active' : 'inactive' ?>">ติวเตอร์</a>
    </div>

    <div class="rank-card">
        <div class="rank-header">อันดับ</div>
        
        <?php foreach ($rankList as $item): ?>
        <div class="rank-item">
            <div class="item-info">
                <span class="item-name"><?= $item->name ?></span>
                <span class="item-sub"><?= $item->subjects ?></span>
            </div>
            <div class="item-score">
                <i class="fa-solid fa-fire-flame-curved"></i>
                <span><?= $item->score ?></span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="nav-bar">
        <a href="index.php" class="nav-link"><i class="fa-solid fa-house"></i></a>
        <a href="preference.php" class="nav-link"><i class="fa-solid fa-magnifying-glass"></i></a>
        <a href="hot_board.php" class="nav-link active"><i class="fa-solid fa-chart-simple"></i></a>
        <a href="student_profile.php" class="nav-link"><i class="fa-solid fa-user"></i></a>
    </div>
</div>

</body>
</html>
