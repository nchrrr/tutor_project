<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหาติวเตอร์</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --orange-grad: linear-gradient(180deg, #FF6B6B 0%, #FEB47B 100%); --soft-red: #FF6B6B; }
        * { box-sizing: border-box; font-family: 'Prompt', sans-serif; }
        body { margin: 0; background-color: #333; display: flex; justify-content: center; min-height: 100vh; }

        .mobile-container {
            width: 100%; max-width: 414px; min-height: 100vh;
            background-color: #F9F9F9; position: relative; display: flex; flex-direction: column;
        }

        /* Header โค้งมนบดบังส่วนขาว */
        .header-orange {
            background: var(--orange-grad); height: 180px; border-radius: 0 0 50px 50px;
            padding: 30px 25px; color: white; position: relative; z-index: 2;
        }
        .header-title { font-size: 24px; font-weight: 500; margin-top: 10px; }
        
        .search-box {
            background: rgba(255,255,255,0.3); border-radius: 12px; margin-top: 15px;
            display: flex; align-items: center; padding: 12px 15px;
        }
        .search-box i { color: white; margin-right: 10px; }
        .search-box input { background: none; border: none; color: white; outline: none; width: 100%; }
        .search-box input::placeholder { color: rgba(255,255,255,0.7); }

        /* Content */
        .content { flex: 1; padding: 25px; }
        .subject-bar { display: flex; gap: 10px; overflow-x: auto; padding-bottom: 20px; }
        .sub-tag { 
            padding: 6px 18px; background: white; border-radius: 20px; 
            font-size: 13px; color: #888; border: 1px solid #eee; white-space: nowrap;
        }
        .sub-tag.active { background: var(--soft-red); color: white; border-color: var(--soft-red); }

        .section-title { font-size: 15px; color: #555; margin-bottom: 15px; display: block; }

        /* Preference Cards */
        .filter-card {
            background: white; border-radius: 20px; padding: 15px;
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.02);
        }
        .custom-select {
            border: 1px solid var(--soft-red); border-radius: 25px;
            padding: 8px 15px; width: 180px; color: #FF6B6B; font-size: 14px;
            background: white; outline: none; cursor: pointer;
        }
        .match-circle {
            width: 65px; height: 65px; background: #FFB0B0; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: white; font-size: 11px; font-weight: 500;
        }

        .btn-plus {
            width: 45px; height: 45px; border-radius: 50%; border: 1.5px solid var(--soft-red);
            background: white; color: var(--soft-red); font-size: 20px;
            display: flex; align-items: center; justify-content: center;
            margin: 10px auto 25px; cursor: pointer;
        }

        .btn-submit {
            width: 100%; background: var(--soft-red); color: white; border: none;
            padding: 16px; border-radius: 12px; font-size: 18px; font-weight: 500;
            cursor: pointer; box-shadow: 0 4px 15px rgba(255,107,107,0.3);
        }

        /* Bottom Nav */
        .nav-bar {
            height: 70px; background: white; border-top: 1px solid #eee;
            display: flex; justify-content: space-around; align-items: center;
        }
        .nav-bar i { font-size: 22px; color: #ddd; cursor: pointer; }
        .nav-bar i.active { color: #FFB0B0; }
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="header-orange">
        <div class="header-title">ค้นหาติวเตอร์</div>
        <div class="search-box">
            <i class="fa-solid fa-search"></i>
            <input type="text" placeholder="ค้นหาวิชา หรือชื่อติวเตอร์......">
        </div>
    </div>

    <div class="content">
        <div class="subject-bar">
            <div class="sub-tag">ทั้งหมด</div>
            <div class="sub-tag">คณิตศาสตร์</div>
            <div class="sub-tag">ฟิสิกส์</div>
            <div class="sub-tag active">เคมี</div>
            <div class="sub-tag">อังกฤษ</div>
        </div>

        <span class="section-title">กรองลักษณะของติวเตอร์</span>

        <form action="index.php" method="POST">
            <?php 
            $options = ["ใจดี", "เน้นโจทย์", "สอนสนุก", "เนื้อหาแน่น", "ใจเย็น"];
            for($i=0; $i<3; $i++): 
            ?>
            <div class="filter-card">
                <select name="user_features[]" class="custom-select">
                    <option value="">ลักษณะที่ต้องการ</option>
                    <?php foreach($options as $opt) echo "<option value='$opt'>$opt</option>"; ?>
                </select>
                <div class="match-circle">% Match</div>
            </div>
            <?php endfor; ?>

            <button type="button" class="btn-plus"><i class="fa-solid fa-plus"></i></button>
            <button type="submit" class="btn-submit">เสร็จสิ้น</button>
        </form>
    </div>

    <div class="nav-bar">
        <i class="fa-solid fa-home"></i>
        <i class="fa-solid fa-search active"></i>
        <i class="fa-solid fa-book-open"></i>
        <i class="fa-solid fa-user"></i>
    </div>
</div>

</body>
</html>
