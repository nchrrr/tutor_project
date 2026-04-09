<?php
// รับค่าจากหน้า booking.php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$amt = isset($_GET['amt']) ? $_GET['amt'] : 300; 
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชำระเงิน - PromptPay</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --orange-grad: linear-gradient(180deg, #FF6B6B 0%, #FEB47B 100%);
            --main-orange: #FF6B6B;
            --bg-gray: #FBFBFB;
        }

        * { box-sizing: border-box; font-family: 'Prompt', sans-serif; }
        body { margin: 0; background-color: #333; display: flex; justify-content: center; min-height: 100vh; }

        .mobile-container {
            width: 100%; max-width: 414px; min-height: 100vh;
            background-color: #fff; position: relative;
            display: flex; flex-direction: column;
            overflow: hidden;
        }

        /* --- ปรับ Header สีส้มให้โค้งมนเหมือนหน้าอื่น --- */
        .header-orange {
            background: var(--orange-grad);
            height: 180px;
            border-radius: 0 0 45px 45px;
            padding: 40px 25px;
            color: white;
            position: relative;
            z-index: 1;
        }
        .back-btn { color: white; text-decoration: none; font-size: 22px; }
        .header-title { font-size: 24px; font-weight: 500; margin-top: 15px; }

        /* ส่วนเนื้อหา */
        .content {
            flex: 1;
            padding: 0 25px;
            margin-top: -30px; /* ให้เนื้อหาดันขึ้นไปทับ Header เล็กน้อยเพิ่มมิติ */
            text-align: center;
            z-index: 10;
        }

        /* การ์ดครอบ QR Code */
        .qr-card {
            background: white;
            border-radius: 25px;
            padding: 30px 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            margin-bottom: 25px;
        }

        .pay-label {
            text-align: left;
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
            font-weight: 400;
        }

        .qr-wrapper {
            border: 1px solid #eee;
            border-radius: 15px;
            padding: 15px;
            display: inline-block;
            width: 100%;
            max-width: 250px;
            margin-bottom: 20px;
        }
        .promptpay-logo { width: 100px; margin-bottom: 10px; }
        .qr-image { width: 100%; border-radius: 5px; }

        /* รายละเอียดราคา */
        .price-section {
            border-top: 1px dashed #eee;
            padding-top: 20px;
            text-align: left;
        }
        .price-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }
        .price-label { font-size: 18px; color: #444; }
        .price-value { font-size: 28px; font-weight: 600; color: #FF6B6B; }
        .price-unit { font-size: 16px; margin-left: 4px; color: #FF6B6B; }

        .note {
            color: #999;
            font-size: 13px;
            margin-top: 8px;
            line-height: 1.5;
        }

        /* ปุ่มยืนยัน */
        .btn-confirm {
            width: 100%;
            background-color: #FF6B6B;
            color: white;
            border: none;
            border-radius: 18px;
            padding: 18px;
            font-size: 18px;
            font-weight: 600;
            margin-top: 10px;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(255,107,107,0.25);
            transition: 0.3s;
        }
        .btn-confirm:active { transform: scale(0.98); }

        .bottom-logo {
            margin-top: 25px;
            width: 80px;
            opacity: 0.6;
        }
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="header-orange">
        <a href="javascript:history.back()" class="back-btn"><i class="fa-solid fa-chevron-left"></i></a>
        <div class="header-title">ชำระเงิน</div>
    </div>

    <div class="content">
        <div class="qr-card">
            <div class="pay-label">ชำระเงินผ่านพร้อมเพย์ (PromptPay)</div>

            <div class="qr-wrapper">
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/c5/PromptPay-logo.png" class="promptpay-logo">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=PROMPTPAY_0888888888" class="qr-image">
            </div>

            <div class="price-section">
                <div class="price-row">
                    <span class="price-label">ยอดชำระสุทธิ</span>
                    <span class="price-value"><?= number_format($amt) ?><span class="price-unit"> บาท</span></span>
                </div>
                <p class="note">โอนเงินเข้าบัญชีพร้อมเพย์ข้างต้นแล้ว <br>กรุณากดปุ่มด้านล่างเพื่อแจ้งโอนเงิน</p>
            </div>
        </div>

        <button class="btn-confirm" onclick="toSuccess()">
            ยืนยันการชำระเงิน
        </button>
        
        <img src="https://upload.wikimedia.org/wikipedia/commons/c/c5/PromptPay-logo.png" class="bottom-logo">
    </div>
</div>

<script>
function toSuccess() {
    const id = "<?= $id ?>";
    const amt = "<?= $amt ?>";
    // เปลี่ยนหน้าไป success.php
    window.location.href = `success.php?id=${id}&amt=${amt}`;
}
</script>

</body>
</html>
