<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตารางสอน</title>
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

        /* Header หัวมนสีส้ม */
        .header-bg {
            background: var(--orange-grad);
            height: 160px;
            border-radius: 0 0 40px 40px;
            display: flex; align-items: center; padding: 0 30px;
            position: relative; z-index: 10;
        }
        .header-title { color: white; font-size: 24px; font-weight: 500; margin-top: 10px; }

        /* Calendar & Filters Section */
        .top-section {
            background: white; border-radius: 30px 30px 0 0;
            margin-top: -35px; padding: 45px 15px 10px;
            position: relative; z-index: 5;
        }

        /* แถบวันที่ (Calendar Strip) */
        .calendar-strip {
            display: flex; justify-content: space-between; gap: 8px;
            overflow-x: auto; padding-bottom: 15px; scrollbar-width: none;
        }
        .calendar-strip::-webkit-scrollbar { display: none; }
        
        .date-item {
            min-width: 45px; height: 65px; border-radius: 12px;
            background: #FFE5E5; color: white;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            font-size: 12px; cursor: pointer;
        }
        .date-item.active { background: var(--soft-red); box-shadow: 0 4px 10px rgba(255,107,107,0.3); }
        .date-item span { font-size: 16px; font-weight: 600; margin-top: 2px; }

        /* ตัวกรองวิชา */
        .filter-scroll {
            display: flex; overflow-x: auto; gap: 8px; padding: 5px 0;
            scrollbar-width: none;
        }
        .filter-btn {
            padding: 5px 15px; border-radius: 18px; border: 1px solid #EEE;
            background: white; color: #AAA; font-size: 11px; white-space: nowrap;
        }
        .filter-btn.active { background: var(--soft-red); color: white; border-color: var(--soft-red); }

        /* Schedule Cards */
        .content { padding: 15px 20px; }
        .schedule-card {
            background: white; border-radius: 20px; padding: 15px;
            margin-bottom: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.04);
            position: relative;
        }

        .card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; }
        .subject-tag {
            background: #FFE5E5; color: var(--soft-red);
            font-size: 11px; padding: 2px 12px; border-radius: 10px;
        }
        .status-online { background: #E5FFF0; color: #2ECC71; font-size: 10px; padding: 2px 10px; border-radius: 8px; }

        .student-name { font-size: 16px; font-weight: 600; color: #444; margin: 0; }
        .time-text { font-size: 11px; color: #AAA; margin: 4px 0 15px; }

        /* ปุ่มแชทตามแบบ */
        .btn-chat-outline {
            display: block; width: 100%; padding: 10px;
            border: 1px solid var(--soft-red); color: var(--soft-red);
            background: white; border-radius: 12px; text-align: center;
            text-decoration: none; font-size: 14px; font-weight: 500;
            transition: 0.2s;
        }
        .btn-chat-outline:active { background: #FFF5F5; }

        /* Nav Bar */
        .nav-bar {
            position: fixed; bottom: 0; width: 100%; max-width: 414px;
            background: white; display: flex; justify-content: space-around;
            padding: 15px 0; border-radius: 25px 25px 0 0; box-shadow: 0 -5px 20px rgba(0,0,0,0.03);
        }
        .nav-item { color: #FFCDCD; font-size: 24px; text-decoration: none; }
        .nav-item.active { color: var(--soft-red); }
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="header-bg">
        <div class="header-title">ตารางสอน</div>
    </div>

    <div class="top-section">
        <div class="calendar-strip">
            <div class="date-item active">จ<span>17</span></div>
            <div class="date-item">อ<span>18</span></div>
            <div class="date-item active">พ<span>19</span></div>
            <div class="date-item">พฤ<span>20</span></div>
            <div class="date-item">ศ<span>21</span></div>
            <div class="date-item">ส<span>22</span></div>
            <div class="date-item">อา<span>23</span></div>
        </div>

        <div class="filter-scroll">
            <button class="filter-btn active">ทั้งหมด</button>
            <button class="filter-btn">คณิตศาสตร์</button>
            <button class="filter-btn">ฟิสิกส์</button>
            <button class="filter-btn">เคมี</button>
        </div>
    </div>

    <div class="content">
        <div class="schedule-card">
            <div class="card-header">
                <span class="subject-tag">แคลคูลัส</span>
                <span class="status-online">ออนไลน์</span>
            </div>
            <h3 class="student-name">User Name</h3>
            <p class="time-text">เวลาเรียน : พุธ 16:00</p>
            <a href="#" class="btn-chat-outline">แชทสนทนา</a>
        </div>

        <div class="schedule-card">
            <div class="card-header">
                <span class="subject-tag">ฟิสิกส์</span>
                <span class="status-online" style="background:#EEE; color:#AAA;">ออฟไลน์</span>
            </div>
            <h3 class="student-name">User Name</h3>
            <p class="time-text">เวลาเรียน : พุธ 16:00</p>
            <a href="#" class="btn-chat-outline">แชทสนทนา</a>
        </div>
    </div>

    <nav class="nav-bar">
        <a href="index.php" class="nav-item"><i class="fa-solid fa-house"></i></a>
        <a href="tutor_students.php" class="nav-item"><i class="fa-solid fa-user-group"></i></a>
        <a href="tutor_schedule.php" class="nav-item active"><i class="fa-solid fa-chart-simple"></i></a>
        <a href="tutor_profile.php" class="nav-item"><i class="fa-solid fa-user"></i></a>
    </nav>
</div>

</body>
</html>