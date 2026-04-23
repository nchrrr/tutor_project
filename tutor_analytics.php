<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics - Tutor</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --orange-grad: linear-gradient(180deg, #FF6B6B 0%, #FEB47B 100%);
            --bar-grad: linear-gradient(180deg, #FF7B54 0%, #FFD26F 100%);
            --soft-red: #FF6B6B;
            --bg-light: #F2F2F2;
        }

        * { box-sizing: border-box; font-family: 'Prompt', sans-serif; }
        body { margin: 0; background-color: #333; display: flex; justify-content: center; }

        .mobile-container {
            width: 100%; max-width: 414px; min-height: 100vh;
            background-color: var(--bg-light); position: relative; padding-bottom: 100px;
        }

        /* Header หัวมน */
        .header-bg {
            background: var(--orange-grad); height: 160px;
            border-radius: 0 0 40px 40px; display: flex;
            align-items: center; padding: 0 30px; position: relative; z-index: 10;
        }
        .header-title { color: white; font-size: 28px; font-weight: 500; margin-top: 10px; }

        /* Content Area */
        .content {
            background: white; border-radius: 30px 30px 0 0;
            margin-top: -35px; padding: 40px 20px 20px; position: relative; z-index: 5;
            min-height: 100vh;
        }

        .section-title { font-size: 16px; font-weight: 600; color: #333; margin: 10px 0 15px; }

        /* Card Style */
        .stat-card {
            background: white; border-radius: 20px; padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06); margin-bottom: 25px;
            border: 1px solid #F8F8F8;
        }

        /* --- กราฟแท่ง (Bar Chart) --- */
        .chart-container {
            display: flex; justify-content: space-between; align-items: flex-end;
            height: 140px; padding: 10px 5px;
        }
        .bar-group { display: flex; flex-direction: column; align-items: center; width: 30px; }
        
        .bar {
            width: 15px; border-radius: 10px;
            background: var(--bar-grad) !important; /* บังคับให้สี Gradient ขึ้น */
            position: relative; display: block;
            box-shadow: 0 4px 8px rgba(255, 123, 84, 0.2);
        }
        
        /* ตัวเลขบนหัวแท่งกราฟ */
        .bar::after {
            content: attr(data-value); position: absolute; top: -22px;
            left: 50%; transform: translateX(-50%);
            font-size: 10px; color: #888; font-weight: 500;
        }
        .day-label { font-size: 11px; color: #888; margin-top: 10px; }

        /* --- รายได้รายเดือน (Income List) --- */
        .income-row {
            display: flex; justify-content: space-between; align-items: center;
            padding: 12px 0; border-bottom: 1px solid #F5F5F5; font-size: 14px;
        }
        .income-row:last-child { border-bottom: none; }
        .month { color: #555; }
        .amount { font-weight: 600; color: #444; flex-grow: 1; text-align: right; margin-right: 15px; }
        .trend { color: #2ECC71; font-weight: 600; min-width: 45px; text-align: right; }

        /* --- อัตราการจับคู่ (Success Rate) --- */
        .rate-container { text-align: center; padding: 10px 0; }
        .rate-value { font-size: 38px; font-weight: 700; color: #FF7B54; margin: 0; }
        .rate-desc { font-size: 12px; color: #AAA; margin-top: 5px; }
        
        .rate-bar-bg { background: #F0F0F0; height: 10px; border-radius: 10px; margin-top: 25px; overflow: hidden; }
        .rate-bar-fill { height: 100%; background: var(--bar-grad); border-radius: 10px; transition: width 1s ease-in-out; }

        /* Bottom Navigation */
        .nav-bar {
            position: fixed; bottom: 0; width: 100%; max-width: 414px;
            background: white; display: flex; justify-content: space-around;
            padding: 15px 0; border-radius: 25px 25px 0 0; box-shadow: 0 -5px 20px rgba(0,0,0,0.03);
            z-index: 100;
        }
        .nav-item { color: #FFCDCD; font-size: 24px; text-decoration: none; }
        .nav-item.active { color: var(--soft-red); }
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="header-bg">
        <div class="header-title">Analytics</div>
    </div>

    <div class="content">
        <div class="section-title">สถิติรายสัปดาห์</div>
        <div class="stat-card">
            <div class="chart-container">
                <div class="bar-group">
                    <div class="bar" style="height: 65%;" data-value="65"></div>
                    <div class="day-label">จ</div>
                </div>
                <div class="bar-group">
                    <div class="bar" style="height: 45%;" data-value="45"></div>
                    <div class="day-label">อ</div>
                </div>
                <div class="bar-group">
                    <div class="bar" style="height: 80%;" data-value="80"></div>
                    <div class="day-label">พ</div>
                </div>
                <div class="bar-group">
                    <div class="bar" style="height: 55%;" data-value="55"></div>
                    <div class="day-label">พฤ</div>
                </div>
                <div class="bar-group">
                    <div class="bar" style="height: 90%;" data-value="90"></div>
                    <div class="day-label">ศ</div>
                </div>
                <div class="bar-group">
                    <div class="bar" style="height: 70%;" data-value="70"></div>
                    <div class="day-label">ส</div>
                </div>
                <div class="bar-group">
                    <div class="bar" style="height: 85%;" data-value="85"></div>
                    <div class="day-label">อา</div>
                </div>
            </div>
        </div>

        <div class="section-title">รายได้รายเดือน</div>
        <div class="stat-card">
            <div class="income-row">
                <span class="month">มี.ค. 69</span>
                <span class="amount">342,000 ฿</span>
                <span class="trend">+22%</span>
            </div>
            <div class="income-row">
                <span class="month">ก.พ. 69</span>
                <span class="amount">280,000 ฿</span>
                <span class="trend">+15%</span>
            </div>
            <div class="income-row">
                <span class="month">ม.ค. 69</span>
                <span class="amount">243,000 ฿</span>
                <span class="trend">+8%</span>
            </div>
        </div>

        <div class="section-title">อัตราการจับคู่สำเร็จ</div>
        <div class="stat-card">
            <div class="rate-container">
                <h1 class="rate-value">78 %</h1>
                <p class="rate-desc">จากคำขอจองทั้งหมด 450 ครั้ง</p>
                <div class="rate-bar-bg">
                    <div class="rate-bar-fill" style="width: 78%;"></div>
                </div>
            </div>
        </div>
    </div>

    <nav class="nav-bar">
        <a href="index.php" class="nav-item"><i class="fa-solid fa-house"></i></a>
        <a href="tutor_students.php" class="nav-item"><i class="fa-solid fa-user-group"></i></a>
        <a href="tutor_analytics.php" class="nav-item active"><i class="fa-solid fa-chart-simple"></i></a>
        <a href="tutor_profile.php" class="nav-item"><i class="fa-solid fa-user"></i></a>
    </nav>
</div>

</body>
</html>