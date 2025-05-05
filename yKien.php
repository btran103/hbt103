<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/ykien.css">
    <title>Trường đại học Quy Nhơn</title>
</head>
<body>
<?php include("header.php"); ?>
<div class="content">
    <?php include("sidebar.php"); ?>
    <div class="content__main">
        <h1>Ý kiến - Thảo luận sinh viên</h1>

        <!-- Form gửi ý kiến -->
        <form method="POST" action="">
            <input type="text" name="tieude" placeholder="Tiêu đề ý kiến" required>
            <textarea name="noidung" rows="4" placeholder="Nội dung ý kiến..." required></textarea>
            <button type="submit">Gửi ý kiến</button>
        </form>

        <?php
        include("connectSQL.php");

        // Gửi ý kiến
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tieude = $conn->real_escape_string($_POST['tieude']);
            $noidung = $conn->real_escape_string($_POST['noidung']);
            $sql = "INSERT INTO YKien (TieuDe, NoiDung, ThoiGian) VALUES ('$tieude', '$noidung', NOW())";
            $conn->query($sql);
        }

        // Hiển thị danh sách ý kiến
        $sql = "SELECT * FROM YKien ORDER BY ThoiGian DESC";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='ykien-box'>";
                    echo "<strong>" . htmlspecialchars($row['TieuDe']) . "</strong><br>";
                    echo "<p>" . nl2br(htmlspecialchars($row['NoiDung'])) . "</p>";
                    echo "<div class='time'>Gửi lúc: " . $row['ThoiGian'] . "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>Không có ý kiến nào được gửi.</p>";
            }
        } else {
            echo "<p>Lỗi truy vấn: " . $conn->error . "</p>";
        }
        ?>
    </div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
