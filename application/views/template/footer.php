<!-- Bootstrap core JavaScript-->
<script src="<?=base_url('Assets/sbadmin/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('Assets/sbadmin/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('Assets/sbadmin/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('Assets/sbadmin/')?>js/sb-admin-2.min.js"></script>
  
  <!-- Page level plugins -->
  <script src="<?=base_url('Assets/sbadmin/')?>vendor/chart.js/Chart.min.js"></script>
    
  <script src="<?=base_url('Assets/')?>jquery.js"></script>

  <script>
  var ambilVal;
    // event yang diambil dari tempat view daftar_magang
    $('.cetak').click(function () {
      ambilVal= $(this).attr('data-kelompok');        
      console.log(ambilVal);
      $('.form-cetak').attr('action', $('.form-cetak').attr('action') + '/' + ambilVal)
    });
    // event yang diambil dari tempat view daftar_administrator untuk hapus
    $('.hapusAdmin').click(function () {
      ambilVal= $(this).attr('data-id');        
      console.log(ambilVal);
      $('.form-hapus').attr('action', $('.form-hapus').attr('action') + '/' + ambilVal)
    });
    // event yang diambil dari tempat view daftar_administrator untuk update
    $('.updateAdmin').click(function () {
      ambilVal= $(this).attr('data-id');        
      console.log(ambilVal);
      $('.form-update').attr('action', $('.form-update').attr('action') + '/' + ambilVal)
    });    
    
  // tambah list anggota
    var index = 0;
    $('#tambah').click(function(){
      index++;
      var nameNama = "nama"+index;
      var nameNomor = "nomor"+index;
      var nameJenis = "nomor"+index;
      var namaAnggota = document.getElementById('namaAnggota').value;
      var nomorAnggota = document.getElementById('nomorInduk').value;      
      var jenisKelamin = document.getElementById('jenisKelamin').value;      
      console.log("nama "+namaAnggota);
      console.log("nomor "+nomorAnggota);  
      console.log("jenis "+jenisKelamin);  
      list(nameNama,namaAnggota,nameNomor,nomorAnggota,nameJenis,jenisKelamin);
    });
    // ,nameNomor,valueNomor,nameGender,valueGender
    function list(nameNama,valueNama,nameNomor,valueNomor,nameJenis,valueJenis){      
      $('#listAnggota').append(
      "<div class='row mb-3' id='"+valueNomor+"'>"+        
          "<div class='col'>"+            
              "<input class='form-control-plaintext text-black' name='"+nameNama+ "' value ='"+valueNama+"' readonly>"+                            
          "</div>"+
          "<div class='col'>"+            
              "<input class='form-control-plaintext text-black' name='"+nameNomor+ "' value ='"+valueNomor+"' readonly>"+              
          "</div>"+
          "<div class='col'>"+            
              "<input class='form-control-plaintext text-black' name='"+nameJenis+ "' value ='"+valueJenis+"' readonly>"+                
          "</div>"+          
      "</div>"+
      "<button class='close text-danger' type ='button' data-nomor='"+valueNomor+"' >"+
      "×"+ "</button>");
    }

    $('.close').click(function () {      
      console.log('hapus');      
    });    

  </script>

  <!-- Pie chart -->
  <script>
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';
    var menunggu = <?= $menunggu->jumlah?>;
    var terdaftar = <?= $terdaftar->jumlah?>;
    var tersetujui = <?= $tersetujui->jumlah?>;
    // console.log (menunggu);
    // console.log (terdaftar);
    // console.log (tersetujui);
  // Pie Chart Example
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {    
      labels: ["menunggu", "tersetujui","terdaftar"],
      datasets: [{
        data: [menunggu,tersetujui,terdaftar],
        backgroundColor: ['#ffc107', '#34ad2d', '#007bff'],
        hoverBackgroundColor: ['#e8af05', '#17a673', '#026bdb'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });
  </script>

  <!-- tabel area -->
  <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
      // *     example: number_format(1234.56, 2, ',', ' ');
      // *     return: '1 234,56'
      number = (number + '').replace(',', '').replace(' ', '');
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
          var k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
        };
      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(dec);
    }
    var januari =<?= $total[1]?>;
    var februari =<?= $total[2]?>;
    var maret =<?= $total[3]?>;
    var april =<?= $total[4]?>;
    var mei =<?= $total[5]?>;
    var juni=<?= $total[6]?>;
    var juli =<?= $total[7]?>;
    var agustus =<?= $total[8]?>;
    var september =<?= $total[9]?>;
    var oktober =<?= $total[10]?>;
    var november =<?= $total[11]?>;
    var desember =<?= $total[12]?>;
    // console.log(januari);
    // console.log(februari);
    // console.log(maret);
    // console.log(april);
    // console.log(mei);
    // console.log(juni);
    // console.log(juli);
    // console.log(agustus);
    // console.log(september);
    // console.log(oktober);
    // console.log(november);
    // console.log(desember);
    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt",
         "Nov", "Des"],
        datasets: [{
          label: "Jumlah",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [januari, februari, maret, april, mei, juni, juli, agustus, september, 
          oktober, november, desember],
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function (value, index, values) {
                return  number_format(value);
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function (tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
            }
          }
        }
      }
    });

  </script>
</body>

</html>
