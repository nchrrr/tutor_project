<?php
session_start();

/**
 * OOP SECTION: คลาสสำหรับจัดการข้อมูลคลาสเรียนของผู้ใช้งาน
 */
class StudentCourse {
    public $id, $subject, $tutorName, $progress, $totalSessions, $nextSchedule, $status, $color;

    public function __construct($id, $subject, $tutor, $current, $total, $schedule, $status, $color) {
        $this->id = $id;
        $this->subject = $subject;
        $this->tutorName = $tutor;
        $this->progress = $current;
        $this->totalSessions = $total;
        $this->nextSchedule = $schedule;
        $this->status = $status; // 'active', 'pending', 'history'
        $this->color = $color;
    }

    public function getProgressPercent() {
        return ($this->progress / $this->totalSessions) * 100;
    }
}

// จำลองข้อมูลคลาสเรียนของผู้ใช้
$allCourses = [
    new StudentCourse(1, "ฟิสิกส์", "Tutor Name", 3, 8, "พรุ่งนี้ 15:00", "active", "#FF9A9E"),
    new StudentCourse(2, "แคลคูลัส", "Tutor Name", 1, 6, "ศุกร์ 17:00", "active", "#FFB0B0"),
    new StudentCourse(3, "แคลคูลัส", "Tutor Name", 0, 0, "วันพฤหัส 16:00", "pending", "#FFB0B0"),
    new StudentCourse(4, "ฟิสิกส์", "Tutor Name", 8, 8, "เสร็จ 15 ก.พ. 2569", "history", "#FF9A9E")
];

// รับค่า Tab ที่เลือก (Default เป็น active)
$currentTab = $_GET['tab'] ?? 'active';

// กรองข้อมูลตาม Tab
$filteredCourses = array_filter($allCourses, function($c) use ($currentTab) {
    return $c->status === $currentTab;
});
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คลาสของฉัน</title>
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
            background: var(--orange-grad); height: 160px;
            padding: 40px 25px; color: white; border-radius: 0 0 0 0;
        }
        .header-title { font-size: 24px; font-weight: 500; margin-top: 20px; }

        /* Tabs Navigation */
        .tabs-nav {
            display: flex; background: white; border-radius: 25px 25px 0 0;
            margin-top: -30px; padding: 15px 5px; justify-content: space-around;
            box-shadow: 0 -5px 15px rgba(0,0,0,0.02);
        }
        .tab-item {
            font-size: 14px; color: #aaa; text-decoration: none; padding-bottom: 5px;
            border-bottom: 2px solid transparent; transition: 0.3s;
        }
        .tab-item.active { color: var(--soft-red); border-bottom-color: var(--soft-red); font-weight: 600; }

        /* Course Cards */
        .content { padding: 20px; }
        .course-card {
            background: white; border-radius: 20px; padding: 18px;
            margin-bottom: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            position: relative;
        }
        .card-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
        .subject-badge {
            padding: 3px 12px; border-radius: 12px; color: white; font-size: 11px;
        }
        .status-text { font-size: 11px; color: #2ECC71; font-weight: 500; }

        .tutor-name { font-size: 16px; font-weight: 600; color: #444; margin: 0; }
        .schedule-info { font-size: 11px; color: #999; margin: 5px 0 15px; }

        /* Progress Bar */
        .progress-container { background: #F0F0F0; height: 6px; border-radius: 10px; margin-bottom: 15px; overflow: hidden; }
        .progress-fill { background: var(--soft-red); height: 100%; border-radius: 10px; transition: 0.5s; }

        /* Buttons */
        .btn-action {
            width: 100%; padding: 10px; border-radius: 12px; font-size: 14px; font-weight: 500;
            cursor: pointer; text-align: center; text-decoration: none; display: block;
        }
        .btn-chat { border: 1.5px solid var(--soft-red); color: var(--soft-red); background: white; }
        .btn-wait { border: 1.5px solid #DDD; color: #BBB; background: white; cursor: default; }

        /* Bottom Nav */
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
    <div class="header-orange">
        <div class="header-title">คลาสของฉัน</div>
    </div>

    <nav class="tabs-nav">
        <a href="?tab=active" class="tab-item <?= $currentTab == 'active' ? 'active' : '' ?>">กำลังเรียน</a>
        <a href="?tab=pending" class="tab-item <?= $currentTab == 'pending' ? 'active' : '' ?>">รอยืนยัน</a>
        <a href="?tab=history" class="tab-item <?= $currentTab == 'history' ? 'active' : '' ?>">ประวัติ</a>
    </nav>

    <div class="content">
        <?php if (empty($filteredCourses)): ?>
            <div style="text-align:center; color:#ccc; margin-top:50px;">ไม่มีข้อมูลคลาสในส่วนนี้</div>
        <?php endif; ?>

        <?php foreach ($filteredCourses as $course): ?>
        <div class="course-card">
            <div class="card-top">
                <span class="subject-badge" style="background: <?= $course->color ?>"><?= $course->subject ?></span>
                <span class="status-text" style="color: <?= $course->status == 'pending' ? '#FFA500' : ($course->status == 'history' ? '#2ECC71' : '#2ECC71') ?>">
                    <?= $course->status == 'pending' ? 'รอยืนยัน' : ($course->status == 'history' ? 'เสร็จสิ้น' : 'กำลังเรียน') ?>
                </span>
            </div>

            <h3 class="tutor-name"><?= $course->tutorName ?></h3>
            
            <?php if($course->status == 'active'): ?>
                <p class="schedule-info">เรียนแล้ว <?= $course->progress ?>/<?= $course->totalSessions ?> ครั้ง - ครั้งต่อไป: <?= $course->nextSchedule ?></p>
                <div class="progress-container">
                    <div class="progress-fill" style="width: <?= $course->getProgressPercent() ?>%"></div>
                </div>
                <a href="#" class="btn-action btn-chat">แชทสนทนา</a>
            
            <?php elseif($course->status == 'pending'): ?>
                <p class="schedule-info">ลงคำขอ: 24 มี.ค. | เวลาเรียน: <?= $course->nextSchedule ?></p>
                <div class="btn-action btn-wait">รอยืนยัน</div>

            <?php elseif($course->status == 'history'): ?>
                <p class="schedule-info">เรียนครบ <?= $course->progress ?>/<?= $course->totalSessions ?> ครั้ง - <?= $course->nextSchedule ?></p>
                <div class="progress-container">
                    <div class="progress-fill" style="width: 100%; background: #FF6B6B; box-shadow: 0 2px 5px rgba(255,107,107,0.4)"></div>
                </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="nav-bar">
        <a href="index.php" class="nav-link"><i class="fa-solid fa-house"></i></a>
        <a href="preference.php" class="nav-link"><i class="fa-solid fa-magnifying-glass"></i></a>
        <a href="my_classes.php" class="nav-link active"><i class="fa-solid fa-book-open"></i></a>
        <a href="student_profile.php" class="nav-link"><i class="fa-solid fa-user"></i></a>
    </div>
</div>

</body>
</html>
