<?php
/**
 * 1. OOP SECTION: รับค่าที่ส่งมาจากหน้าจอง
 */
class PaymentStatus {
    public $bookingId;
    public $amount;
    public $tutorName;

    public function __construct($id, $amt, $name) {
        $this->bookingId = "BK-" . str_pad($id, 5, "0", STR_PAD_LEFT) . "-" . date('is');
        $this->amount = $amt;
        $this->tutorName = $name;
    }
}

// Mock Data ชุดเดิมเพื่อหาชื่อติวเตอร์
$data = [
    0 => ["name" => "Tutor Name"],
    1 => ["name" => "Tutor Name"],
    2 => ["name" => "Tutor Name"],
    3 => ["name" => "Tutor Name"]
];

$id = $_GET['id'] ?? 0;
$amt = $_GET['amt'] ?? 0;
$name = $data[$id]['name'] ?? "Tutor Name";

$payment = new PaymentStatus($id, $amt, $name);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชำระเงินสำเร็จ</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* CSS เดิมที่ผมเคยให้ไว้ (สวยอยู่แล้ว) */
        :root { --orange-grad: linear-gradient(180deg, #FF6B6B 0%, #FEB47B 100%); --success-green: #2ECC71; --bg: #F8F9FD; }
        * { box-sizing: border-box; font-family: 'Prompt', sans-serif; }
        body { margin: 0; background-color: #333; display: flex; justify-content: center; min-height: 100vh; }
        .mobile-container { width: 100%; max-width: 414px; min-height: 100vh; background-color: var(--bg); display: flex; flex-direction: column; align-items: center; }
        .header-orange { background: var(--orange-grad); width: 100%; height: 200px; border-radius: 0 0 50px 50px; display: flex; flex-direction: column; align-items: center; justify-content: center; color: white; }
        .success-circle { width: 80px; height: 80px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 20px rgba(0,0,0,0.1); margin-bottom: 10px; }
        .success-circle i { font-size: 40px; color: var(--success-green); }
        .step-bar { background: white; margin: -25px 20px 30px; padding: 15px 30px; border-radius: 20px; display: flex; justify-content: center; align-items: center; box-shadow: 0 10px 25px rgba(0,0,0,0.03); width: 85%; }
        .step { width: 25px; height: 25px; border-radius: 50%; background: #eee; color: #aaa; display: flex; align-items: center; justify-content: center; font-size: 11px; }
        .step.active { background: #FF8585; color: white; font-weight: bold; }
        .step-line { width: 40px; height: 2px; background: #eee; margin: 0 5px; }
        .step-line.fill { background: #FF8585; }
        .receipt-card { background: white; width: 85%; border-radius: 25px; padding: 30px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .amount { font-size: 32px; font-weight: bold; color: #444; margin: 10px 0; }
        .info-grid { margin-top: 20px; border-top: 1px dashed #eee; padding-top: 20px; }
        .info-row { display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 13px; }
        .btn-group { width: 85%; margin-top: 30px; display: flex; flex-direction: column; gap: 15px; }
        .btn-main { background: #FF8585; color: white; border: none; padding: 18px; border-radius: 18px; font-size: 16px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="header-orange">
        <div class="success-circle"><i class="fa-solid fa-check"></i></div>
        <h2 style="margin:0; font-size:20px;">ชำระเงินสำเร็จ</h2>
    </div>

    <div class="step-bar">
        <div class="step active"><i class="fa-solid fa-check"></i></div>
        <div class="step-line fill"></div>
        <div class="step active"><i class="fa-solid fa-check"></i></div>
        <div class="step-line fill"></div>
        <div class="step active">3</div>
    </div>

    <div class="receipt-card">
        <div style="font-size: 12px; color: #bbb;">เลขที่รายการ: <?= $payment->bookingId ?></div>
        <div class="amount">฿<?= number_format($payment->amount, 2) ?></div>
        <div style="font-size:13px; color: #2ECC71;">ชำระสำเร็จ</div>

        <div class="info-grid">
            <div class="info-row">
                <span style="color:#999">ผู้สอน</span>
                <span style="font-weight:500"><?= $payment->tutorName ?></span>
            </div>
            <div class="info-row">
                <span style="color:#999">วันที่</span>
                <span style="font-weight:500"><?= date('d/m/Y') ?></span>
            </div>
        </div>
    </div>

    <div class="btn-group">
        <button class="btn-main" onclick="location.href='index.php'">กลับสู่หน้าหลัก</button>
    </div>
</div>

</body>
</html>
