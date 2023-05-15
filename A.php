<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Form Ajax</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<!-- agar tombol submit terletak pada bagian tengah halaman -->
<style>
   .centered-button {
      display: flex;
      justify-content: center;
    }
</style>

<!-- membuat form untuk input -->
<body>
  <div class="container">
    <form id="myForm" action="B.php" method="POST">
      <div class="mb-3">
        <label for="numberInput" class="form-label">Masukkan jumlah data:</label>
        <input type="number" class="form-control" id="numberInput" name="numberInput" required>
      </div>
      <div class="mb-3">
        <label for="textInput" class="form-label">Masukkan teks:</label>
        <input type="text" class="form-control" id="textInput" name="textInput" required>
      </div>
      <div class="centered-button">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    <div id="tableContainer"></div>
  </div>

  <!-- mengimport jquery dan bootstrap dengan pemangilan melalui link -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
  <script>
    // kode untuk memastikan semua halaman HTML selesai dimuat
    $(document).ready(function () {
      // kode untuk pengiriman formulir
      $('#myForm').submit(function (e) {
        e.preventDefault();
        // kode untuk mengambil nilai input
        var numData = $('#numberInput').val();
        var textData = $('#textInput').val();
        // metode AJAX dari jQuery yang digunakan untuk mengirim permintaan HTTP ke server
        $.ajax({
          type: 'POST',
          url: 'B.php',
          data: { numData: numData, textData: textData },
          dataType: 'json',
          // fungsi yang akan dieksekusi ketika permintaan AJAX berhasil
          success: function (data) {
          //mengembalikan data kembali menjadi bentuk Array
            var table = JSON.parse(JSON.stringify('<table class="table"><thead><tr><th>No.</th><th>Teks</th></tr></thead><tbody>'));
            // menghasilkan tabel dengan data yang diterima
            for (var i = 0; i < data.length; i++) {
              table += '<tr><td>' + (i + 1) + '</td><td>' + data[i] + '</td></tr>';
            }
            table += '</tbody></table>';
            //menampilkan tabel dalam div
            $('#tableContainer').html(table);
            //animasi yang akan dijalankan 
            $('#tableContainer').click(function () {
              var div = $("div");
              div.animate({ height: '280px', opacity: '0.4' }, "slow");
              div.animate({ width: '280px', opacity: '0.8' }, "slow");
              div.animate({ height: '70px', opacity: '0.4' }, "slow");
              div.animate({ width: '250px', opacity: '0.8' }, "slow");
            });
          },
          error: function () {
            alert('Error submitting form!');
          }
        });
      });
    });
  </script>
</body>

</html>