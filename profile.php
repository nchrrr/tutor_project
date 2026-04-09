<?php
/**
 * 1. OOP SECTION
 */
class Tutor {
    public $id, $name, $rating, $reviewCount, $expYear, $subjects, $style, $price, $edu, $matchPercent;
    public function __construct($id, $name, $rating, $reviews, $exp, $subs, $style, $price, $edu, $match) {
        $this->id = $id; $this->name = $name; $this->rating = $rating;
        $this->reviewCount = $reviews; $this->expYear = $exp; $this->subjects = $subs;
        $this->style = $style; $this->price = $price; $this->edu = $edu; $this->matchPercent = $match;
    }
}

$tutor = new Tutor(1, "Tutor Name", 4.9, 13, 2, "ฟิสิกส์, เคมี", "Visual", 200, "วิศวกรรมศาสตร์ จุฬาฯ", 93);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - <?= $tutor->name ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --orange-grad: linear-gradient(180deg, #FF6B6B 0%, #FEB47B 100%);
            --soft-red: #FF8585;
            --bg-color: #F8F9FA;
        }

        * { box-sizing: border-box; font-family: 'Prompt', sans-serif; }
        body { margin: 0; background-color: #333; display: flex; justify-content: center; }

        .container {
            width: 100%; max-width: 414px; background-color: var(--bg-color);
            min-height: 100vh; position: relative; padding-bottom: 110px;
        }

        /* Header: มนเหมือนหน้า Index และไม่บัง Card */
        .header {
            background: var(--orange-grad);
            height: 180px;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            color: white; border-radius: 0 0 45px 45px;
            position: relative; z-index: 1;
        }
        .back-btn { position: absolute; left: 20px; top: 40px; color: white; text-decoration: none; }

        .profile-circle {
            width: 70px; height: 70px; background: white; border-radius: 50%;
            display: flex; align-items: center; justify-content: center; margin-bottom: 8px;
        }
        .profile-circle i { font-size: 35px; color: var(--soft-red); }

        /* Match Card: ปรับ Margin ให้เห็นเปอร์เซ็นต์ชัดเจน */
        .match-card {
            background: white; margin: -20px 25px 20px; border-radius: 20px;
            padding: 18px; display: flex; align-items: center; gap: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.06);
            border-left: 6px solid var(--soft-red);
            position: relative; z-index: 10;
        }
        .match-circle {
            width: 55px; height: 55px; border-radius: 50%; background: var(--soft-red);
            color: white; display: flex; align-items: center; justify-content: center;
            font-size: 18px; font-weight: bold; flex-shrink: 0;
        }
        .m-tag { background: #FFE4E4; color: #FF8585; font-size: 9px; padding: 3px 8px; border-radius: 10px; margin: 2px; display: inline-block; }

        /* General Section Card */
        .section-card { background: white; margin: 0 20px 15px; border-radius: 20px; padding: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.02); }
        .section-card h4 { margin: 0 0 12px; font-size: 14px; color: #444; }
        
        .row { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #f5f5f5; font-size: 12px; }
        .row:last-child { border: none; }
        .label { color: #999; }
        .val { color: #444; font-weight: 500; }

        /* Time Pill Selection */
        .time-pill-container { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 5px; }
        .time-pill {
            background: #fff; color: var(--soft-red); padding: 8px 12px;
            border-radius: 20px; font-size: 11px; cursor: pointer;
            border: 1.5px solid #FFE4E4;
        }
        .time-pill.active { background: var(--soft-red); color: white; border-color: var(--soft-red); }

        /* --- REVIEW SECTION: เพิ่มกลับมาให้แล้ว --- */
        .review-item { display: flex; gap: 12px; margin-top: 15px; padding-top: 10px; border-top: 1px solid #f5f5f5; }
        .review-avatar { 
            width: 35px; height: 35px; border-radius: 50%; background: #FFB0B0; 
            display: flex; align-items: center; justify-content: center; color: white; font-size: 18px;
        }
        .review-avatar.orange { background: #FEB47B; }
        .review-details p { margin: 0; line-height: 1.4; }
        .reviewer-name { font-size: 12px; font-weight: bold; color: #444; }
        .stars { font-size: 10px; color: #FFD700; margin: 2px 0; }
        .review-text { font-size: 11px; color: #777; }

        /* Footer Action */
        .footer {
            position: fixed; bottom: 0; width: 100%; max-width: 414px;
            background: white; padding: 15px 25px 30px; display: flex; gap: 15px;
            box-shadow: 0 -5px 15px rgba(0,0,0,0.05); border-radius: 30px 30px 0 0;
        }
        .btn-fav { width: 55px; height: 55px; border: 2px solid var(--soft-red); border-radius: 15px; color: var(--soft-red); background: white; font-size: 20px; }
        .btn-book { flex: 1; background: var(--soft-red); color: white; border: none; border-radius: 15px; font-size: 17px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <a href="index.php" class="back-btn"><i class="fa-solid fa-chevron-left"></i></a>
        <div class="profile-circle"><i class="fa-solid fa-user"></i></div>
        <h2 style="margin:0; font-size:18px;"><?= $tutor->name ?></h2>
        <div style="font-size:11px; opacity:0.9;">★ <?= $tutor->rating ?> (13 รีวิว) • ประสบการณ์ <?= $tutor->expYear ?> ปี</div>
    </div>

    <div class="match-card">
        <div class="match-circle"><?= $tutor->matchPercent ?>%</div>
        <div>
            <div class="m-tag">วิชา 30%</div> <div class="m-tag">ระดับ 20%</div>
            <div class="m-tag">สไตล์ 20%</div> <div class="m-tag">เวลา 20%</div>
            <div class="m-tag">งบ 10%</div>
        </div>
    </div>

    <div class="section-card">
        <h4>ข้อมูลการสอน</h4>
        <div class="row"><span class="label">วิชา</span><span class="val"><?= $tutor->subjects ?></span></div>
        <div class="row"><span class="label">สไตล์การสอน</span><span class="val"><?= $tutor->style ?></span></div>
        <div class="row"><span class="label">ราคา</span><span class="val"><?= $tutor->price ?>฿/ชม.</span></div>
        <div class="row"><span class="label">การศึกษา</span><span class="val"><?= $tutor->edu ?></span></div>
    </div>

    <div class="section-card">
        <h4>ข้อมูลการสอน (เลือกเวลาเรียน)</h4>
        <div class="time-pill-container">
            <div class="time-pill" onclick="pickT(this, 'จ. 15:00-18:00')">จ. 15:00-18:00</div>
            <div class="time-pill" onclick="pickT(this, 'พ. 14:00-17:00')">พ. 14:00-17:00</div>
            <div class="time-pill" onclick="pickT(this, 'ศ. 16:00-18:00')">ศ. 16:00-18:00</div>
            <div class="time-pill" onclick="pickT(this, 'ส. 15:00-18:00')">ส. 15:00-18:00</div>
        </div>
    </div>

    <div class="section-card">
        <h4>รีวิวจากนักเรียน</h4>
        
        <div class="review-item" style="border:none; padding-top:0;">
            <div class="review-avatar"><i class="fa-solid fa-user"></i></div>
            <div class="review-details">
                <p class="reviewer-name">น้องโป้งเหน่ง</p>
                <div class="stars">★★★★★</div>
                <p class="review-text">สอนดีเลยค่ะ ตีที่ยังไม่ตาย</p>
            </div>
        </div>

        <div class="review-item">
            <div class="review-avatar orange"><i class="fa-solid fa-user"></i></div>
            <div class="review-details">
                <p class="reviewer-name">น้องกิ๊กกี้</p>
                <div class="stars">★★★★☆</div>
                <p class="review-text">สอนเข้าใจมากเลยครับ แต่ออกจากห้องมาก็ลืมเลยครับ</p>
            </div>
        </div>
    </div>

    <div class="footer">
        <button class="btn-fav"><i class="fa-regular fa-heart"></i></button>
        <button class="btn-book" onclick="book(<?= $tutor->id ?>)">จองเรียน ———></button>
    </div>
</div>

<script>
    let st = "";
    function pickT(el, t) {
        document.querySelectorAll('.time-pill').forEach(p => p.classList.remove('active'));
        el.classList.add('active');
        st = t;
    }
    function book(id) {
        if(!st) { alert("กรุณาเลือกเวลาเรียน"); return; }
        window.location.href = `booking.php?id=${id}&time=${encodeURIComponent(st)}`;
    }
</script>

</body>
</html>
