<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/cthp.css">
    <title>Trường đại học Quy Nhơn</title>
</head>
<body>
  <?php include("header.php"); ?>

  <div class="content">
    <?php include("sidebar.php"); ?>

    <div class="content__main">
      <header>
        <h1>Tài chính sinh viên</h1>
      </header>
      <div class="main__table">
        <table class="table">
          <!-- Header -->
          <thead class="chitiet">
            <tr class="table__head-row">
              <th class="chitiet-cell" rowspan="7">Mã phí</th>
              <th class="chitiet-cell" rowspan="4">Tên phí</th>
              <th class="chitiet-cell" rowspan="3">Phải đóng</th>
              <th class="chitiet-cell" rowspan="2">Đã đóng</th>
              <th class="chitiet-cell" rowspan="5">Ngày đóng</th>
              <th class="chitiet-cell" rowspan="3">Còn nợ</th>
            </tr>
          </thead>

          <tbody class="hocphi">
            <tr class="hocphi-row">
              <td class="hocphi-cell" colspan="13">Năm học: 2024-2025, Học kỳ: HK02</td>
            </tr>

            <?php
              include("connectSQL.php");

              $sql = "SELECT MaPhi, TenPhi, PhaiDong, DaDong, NgayDong, ConNo FROM ChiTietHocPhi";
              $result = $conn->query($sql);

              if (!$result) {
                  die("Lỗi truy vấn: " . $conn->error);
              }

              while ($row = $result->fetch_assoc()) :
            ?>
              <tr class="hocphi-row">
                <td class="hocphi-cell"><?= $row['MaPhi'] ?></td>
                <td class="hocphi-cell"><?= $row['TenPhi'] ?></td>
                <td class="hocphi-cell"><?= $row['PhaiDong'] ?></td>
                <td class="hocphi-cell"><?= $row['DaDong'] ?></td>
                <td class="hocphi-cell"><?= $row['NgayDong'] ?></td>
                <td class="hocphi-cell"><?= $row['ConNo'] ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php include("footer.php"); ?>
</body>
</html>
