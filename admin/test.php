<script>
    var thongKe = [];
    var arrayLabel = [];
    var chonLoai = document.getElementById('chonloai').value;
    var thongKeTheo = document.getElementById('thongke').value;

    if (chonLoai == "doanhThuBacSi") {
      selectDoctor.style.display = 'block';
    }
    else {
      selectDoctor.style.display = 'none';
    }

    if (thongKeTheo == "thongKeThang") {
      selectMonth.style.display = 'block';
      selectYear.style.display = 'none';
    }
    else if (thongKeTheo == "thongKeNam") {
      selectMonth.style.display = 'none';
      selectYear.style.display = 'block';
    }
    else {
      selectMonth.style.display = 'none';
      selectYear.style.display = 'none';
    }   

    if (chonLoai == "doanhThu") {
      if(thongKeTheo == "thongKeNam") {       
        nameLabel = 'DOANH THU THEO THÁNG';   
        <?php
          date_default_timezone_set('Asia/Ho_Chi_Minh');
          $yearCurrent = date("Y");
          for($i = 1; $i <= 12; $i++) {
            $doanhthu = "SELECT SUM(tongchiphi) tongdoanhthu FROM phieukhambenh WHERE MONTH(ngaylapphieu) = $i AND YEAR(ngaylapphieu) = $yearCurrent";
            $query_doanhthu = mysqli_query($mysqli, $doanhthu);
            $tong_doanhthu = mysqli_fetch_array(($query_doanhthu));
            $doanhthu_thang = round($tong_doanhthu['tongdoanhthu'] / 1000000, 0); 
            ?>
              thongKe.push(<?php echo $doanhthu_thang ?>);
            <?php 
          }
            ?>
        arrayLabel = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
      }
      else if (thongKeTheo == "thongKeThang") {
        nameLabel = 'DOANH THU THEO NGÀY';
        var nameDay = 1;       
        var chonThang = document.getElementById('chonThang').value;
        document.cookie = "thang=" + Number(chonThang);
        document.getElementById('test').innerHTML = <?php 
          if (isset($_COOKIE['thang'])) {
            echo $_COOKIE['thang'];
          }
          else {
            echo "";
          }
          ?>;
        // document.cookie = "thang=''"
        var chonNam = document.getElementById('chonNam').value;
        
          <?php
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            function lastday($month_ld = '', $year_ld = '') {
              if (empty($month_ld)) {
                  $month_ld = date('m');
              }
              if (empty($year_ld)) {
                  $year_ld = date('Y');
              }
              $result = strtotime("{$year_ld}-{$month_ld}-01");
              $result = strtotime('-1 second', strtotime('+1 month', $result));
              return date('d', $result);
            }
            $monthCurrent = date("m");
            $yearCurrent = date("Y");
            $lastday = lastday($monthCurrent,$yearCurrent);
            for($i = 1; $i <= $lastday; $i++) {
              $doanhthu = "SELECT SUM(tongchiphi) tongdoanhthu FROM phieukhambenh WHERE DAY(ngaylapphieu) = $i AND MONTH(ngaylapphieu) = $monthCurrent AND YEAR(ngaylapphieu) = $yearCurrent";
              $query_doanhthu = mysqli_query($mysqli, $doanhthu);
              $tong_doanhthu = mysqli_fetch_array(($query_doanhthu));
              $doanhthu_ngay = round($tong_doanhthu['tongdoanhthu'] / 1000000, 0);
              ?>
                thongKe.push(<?php echo $doanhthu_ngay ?>);
                arrayLabel.push(nameDay);
                nameDay++;
                <?php 
            }
            ?>
        }
    }

    var myLineChart = new Chart(ctxL, {
      type: 'line',
      data: {
        labels: arrayLabel,
        datasets: [{
            label: nameLabel,
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            backgroundColor: [
              'rgba(255, 255, 255, 0.2)',
              'rgba(255, 255, 255, 0.2)',
              'rgba(255, 255, 255, 0.2)',
              'rgba(255, 255, 255, 0.2)',
              'rgba(255, 255, 255, 0.2)',
              'rgba(255, 255, 255, 0.2)'
            ],
            borderColor: [
              'rgba(255, 255, 255, 1)',
              'rgba(255, 255, 255, 1)',
              'rgba(255, 255, 255, 1)',
              'rgba(255, 255, 255, 1)',
              'rgba(255, 255, 255, 1)',
              'rgba(255, 255, 255, 1)'
            ],
            borderWidth: 1,
            
            data: thongKe
          }
        ]
      },
      options: {
        responsive: true
      }
    });
</script>