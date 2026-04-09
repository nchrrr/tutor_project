<?php
/**
 * === 1. OOP LOGIC SECTION ===
 */
class BookingProcessor {
    public $tutorName;
    public $subject;
    public $pricePerHour;
    public $bookingDate;
    public $bookingTime;

    public function __construct($name, $subject, $price, $date, $time) {
        $this->tutorName = $name;
        $this->subject = $subject;
        $this->pricePerHour = $price;
        $this->bookingDate = $date;
        $this->bookingTime = $time;
    }

    public function calculateTotal($hours = 2) {
        return $this->pricePerHour * $hours;
    }

    public function getServiceFee() {
        return 20.00; 
    }
}

// 2. Mock Data สำหรับดึงข้อมูลติวเตอร์
$data = [
    0 => ["name" => "Tutor Name", "subject" => "ฟิสิกส์, เคมี", "price" => 140], // ปรับราคาให้ยอดรวมใกล้เคียง 300
    1 => ["name" => "Tutor Name", "subject" => "บาลี, ชีวะ", "price" => 180],
    2 => ["name" => "Tutor Name", "subject" => "อังกฤษ, TOEIC", "price" => 150],
    3 => ["name" => "Tutor Name", "subject" => "แคลคูลัส, Stat", "price" => 150]
];

// 3. รับค่าจากหน้า Profile
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$selectedTime = isset($_GET['time']) ? $_GET['time'] : "15:00 - 17:00";
$selectedDate = isset($_GET['date']) ? $_GET['date'] : "14 เมษายน 2569";

$info = isset($data[$id]) ? $data[$id] : $data[0];

// สร้าง Object และคำนวณเงิน
$booking = new BookingProcessor($info['name'], $info['subject'], $info['price'], $selectedDate, $selectedTime);
$totalAmount = $booking->calculateTotal(2) + $booking->getServiceFee();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบการจอง</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --orange-grad: linear-gradient(90deg, #FF6B6B 0%, #FEB47B 100%);
            --soft-red: #FF6B6B;
            --bg: #F8F9FD;
        }

        * { box-sizing: border-box; font-family: 'Prompt', sans-serif; }
        body { margin: 0; background-color: #333; display: flex; justify-content: center; min-height: 100vh; }

        .mobile-container {
            width: 100%; max-width: 414px; min-height: 100vh;
            background-color: var(--bg); position: relative; display: flex; flex-direction: column;
        }

        /* Header */
        .header-orange {
            background: var(--orange-grad); height: 120px; border-radius: 0 0 40px 40px;
            display: flex; align-items: center; padding: 0 20px; color: white;
        }
        .back-btn { color: white; text-decoration: none; font-size: 20px; margin-right: 15px; }

        /* Step Indicator */
        .step-bar {
            background: white; margin: -25px 20px 20px; padding: 15px 0;
            border-radius: 20px; display: flex; justify-content: center; align-items: center; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.03);
        }
        .step { width: 25px; height: 25px; border-radius: 50%; background: #eee; color: #aaa; display: flex; align-items: center; justify-content: center; font-size: 11px; }
        .step.active { background: var(--soft-red); color: white; font-weight: bold; }
        .step-line { width: 40px; height: 2px; background: #eee; margin: 0 5px; }
        .step-line.fill { background: var(--soft-red); }

        /* Detail Card */
        .booking-card {
            background: white; margin: 0 20px 20px; border-radius: 25px; padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .booking-card h3 { margin: 0 0 15px; color: var(--soft-red); font-size: 17px; }
        .detail-item { margin-bottom: 12px; }
        .detail-label { font-size: 12px; color: #aaa; display: block; }
        .detail-value { font-size: 14px; color: #444; font-weight: 500; }
        .dashed-line { border-top: 1px dashed #eee; margin: 15px 0; }
        .total-row { display: flex; justify-content: space-between; align-items: center; }
        .total-price { font-size: 24px; font-weight: bold; color: var(--soft-red); }

        /* Payment Option */
        .payment-option {
            background: white; margin: 0 20px; padding: 15px; border-radius: 18px;
            display: flex; align-items: center; gap: 15px; border: 2px solid var(--soft-red);
        }
        .pay-icon { width: 40px; height: 40px; background: #FFF4F4; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--soft-red); }

        /* Footer Button */
        .footer { margin-top: auto; padding: 20px; }
        .btn-confirm {
            width: 100%; background: var(--soft-red); color: white; border: none;
            border-radius: 15px; padding: 18px; font-size: 18px; font-weight: bold;
            cursor: pointer; display: flex; justify-content: center; align-items: center; gap: 10px;
        }
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="header-orange">
        <a href="profile.php?id=<?= $id ?>" class="back-btn"><i class="fa-solid fa-chevron-left"></i></a>
        <h2 style="margin:0; font-size:18px;">ตรวจสอบการจอง</h2>
    </div>

    <div class="step-bar">
        <div class="step active"><i class="fa-solid fa-check"></i></div>
        <div class="step-line fill"></div>
        <div class="step active">2</div>
        <div class="step-line"></div>
        <div class="step">3</div>
    </div>

    <div class="booking-card">
        <h3>สรุปรายละเอียดการจอง</h3>
        <div class="detail-item">
            <span class="detail-label">ชื่อติวเตอร์</span>
            <span class="detail-value"><?= $booking->tutorName ?></span>
        </div>
        <div class="detail-item">
            <span class="detail-label">วิชา</span>
            <span class="detail-value"><?= $booking->subject ?></span>
        </div>
        <div class="detail-item">
            <span class="detail-label">วันที่และเวลา</span>
            <span class="detail-value"><?= $booking->bookingDate ?> | <?= $booking->bookingTime ?></span>
        </div>
        <div class="dashed-line"></div>
        <div class="total-row">
            <span style="color:#666">ยอดชำระสุทธิ</span>
            <span class="total-price">฿<?= number_format($totalAmount, 2) ?></span>
        </div>
    </div>

    <div style="padding: 0 20px 10px;"><span style="font-size: 14px; color: #666;">ช่องทางการชำระเงิน</span></div>
    <div class="payment-option">
        <div class="pay-icon"><i class="fa-solid fa-qrcode"></i></div>
        <div style="flex:1">
            <div style="font-size:14px; font-weight:500;">Thai QR / PromptPay</div>
            <div style="font-size:11px; color:#aaa;">ไม่มีค่าธรรมเนียมเพิ่มเติม</div>
        </div>
        <i class="fa-solid fa-circle-check" style="color:var(--soft-red)"></i>
    </div>

    <div class="footer">
        <button class="btn-confirm" onclick="goToPayment()">
            ยืนยันการจองเรียน <i class="fa-solid fa-arrow-right-long"></i>
        </button>
    </div>
</div>

<script>
function goToPayment() {
    const id = "<?= $id ?>";
    const amt = "<?= $totalAmount ?>";
    // ส่งข้อมูลไปยังหน้า payment.php
    window.location.href = `payment.php?id=${id}&amt=${amt}`;
}
</script>

</body>
</html>