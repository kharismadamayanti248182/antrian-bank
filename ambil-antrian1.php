<?php
// memanggil koneksi di config.php 
include "./config.php";

// get dari db tabel loket
$query = "SELECT * FROM services";

//query dijalanin
$result = $conn->query($query);

$row = $result->fetch_all();


?>

<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <title>Reservasi Antrian BRI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Poppins", sans-serif;
        margin: 0;
        background: #e4eeff;
        animation: fadeIn 0.5s forwards;
      }

      @keyframes fadeIn {
        to {
          opacity: 1;
        }
      }

      .container {
        display: flex;
        height: 1024px;
        width: 1440px;
      }

      /* SIDEBAR */

      .sidebar {
        width: 368px;
        color: white;
        padding: 20px 20px;
        display: flex;
        flex-direction: column;
        background:
          url(batik.png),
          linear-gradient(rgba(96, 149, 240, 0.8), rgba(154, 188, 247, 0.8));

        background-size: cover;
        background-position: center;
      }

      .bri {
        width: 211px;
        margin-bottom: 30px;
        height: 138px;
      }

      .btn {
        width: 313px;
        height: 62px;
        border: none;
        padding: 12px;
        margin-left: 30px;
        margin-right: 30px;
        margin-bottom: 18px;
        border-radius: 6px;
        font-weight: bold;
        font-size: 20px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
        transition: 0.3s ease;
      }

      .btn:hover {
        transform: translateY(-2px);
      }

      .btn-green {
        background: #72b64d;
        color: white;
        border: 2px solid white;
      }

      .btn-blue {
        background: #5b82c5;
        color: white;
        border: 1px solid #2e569b;
      }

      .btn-yellow {
        background: #c4a771;
        color: white;
        border: 1px solid #4657c6;
      }

      .btn-green:hover {
        background: #3da239;

      }

      .btn-blue:hover {
        background: #2e569b;
        border: 2px solid white;
      }

      .btn-yellow:hover {
        background: #967332;
        border: 2px solid white;
      }

      .footer {
        margin-top: auto;
        font-size: 12px;
        opacity: 0.8;
        margin-left: 130px;
      }

      /* area utama */
      .main {
        flex: 1;
        padding: 40px;
      }

      /* card form */
      .form-area {
        width: 670px;
        flex-direction: column;
        display: flex;
        margin-left: 40px;
      }

      .image-area {
        width: 253px;
        text-align: center;
        margin-top: 10px;
      }

      .image-area img {
        width: 253px;
        margin-left: -170px;
        margin-top: -110px;
      }

      .card {
        justify-content: space-between;
        align-items: center;
        background: white;
        border-radius: 8px;
        padding: 25px;
        width: 948px;
        height: 484px;
        margin-top: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        display: flex;
      }

      .card h2 {
        margin-top: 0;
      }

      input,
      select {
        width: 100%;
        padding: 10px;
        margin: 10px 0 20px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      .label {
        font-size: 24px;
      }

      /* tombol */
      .action {
        display: flex;
        gap: 10px;
      }

      .ambil {
        background: #2db34a;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        width: 518px;
        height: 50px;
        font-size: 20px;
      }
      .ambil:hover {
        background: #81C55D;
      }

      .batal {
        background: #F5F5F5;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        width: 128px;
        margin-left: 15px;
        height: 50px;
        font-size: 20px;
      }
      .batal:hover {
        background: #B2B1B1;
      }

      /* ilustrasi */
      .images {
        margin-top: 50px;
        display: flex;
        justify-content: space-around;
      }

      .img1 {
        width: 374px;
        height: 310px;
        margin-left: 10px;
      }

      .img2 {
        width: 356px;
        height: 269px;
        margin-left: 200px;
      }
      .inp {
        width: 495px;
        margin-bottom: 50px;
        height: 25px;
      }
      .dropdown {
        width: 518px;
        margin-bottom: 40px;
        height: 44px;
        padding-right: 50px;
      }
      .hr {
        margin-left: 0px;
        margin-top: 15px;
        margin-bottom: 30px;
      }
      .h2 {
        margin-bottom: -5px;
        font-size: 32px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <!-- SIDEBAR -->
      <div class="sidebar">
        <img class="bri" src="Rectangle 9.png" alt="bri" />

        <button
          class="btn btn-green"
          onclick="location.href = 'ambil-antrian1.php'"
        >
          <img src="ri_train-fill.png" />Ambil Antrian
        </button>
        <button
          class="btn btn-blue"
          onclick="location.href = 'daftar-antrian.php'"
        >
          <img src="pixelarticons_calendar-today.png" />Daftar Antrian
        </button>
        <button
          class="btn btn-yellow"
          onclick="location.href = 'kartu-antrian.php'"
        >
          <img src="Check-Square--Streamline-Ultimate.svg.png" />Kartu Antrian
        </button>

        <div class="footer">Kelompok (1) 2026</div>
      </div>

      <!-- Main Content -->
      <div class="main">
        <div class="card">
          <form action="action_ambil_antrian.php" method="POST">
            <div class="form-area">
              <h2 class="h2">Ambil Antrian</h2>
              <hr width="518px" class="hr" />

              <label class="label">No.Telepon:</label>
              <input class="inp" type="text" name="no_hp" placeholder="08xxxxxxxxxx" />

              <label class="label">Pilih Loket:</label>
              <select class="dropdown" name="layanan" required>
                <?php 
                foreach($row as $opsi){
                  echo "<option value=".$opsi[0].">" .$opsi[1]. "</option>";
                }
                ?>
              </select>

              <div class="action">
                <button
                  class="ambil"
                  type="submit" name="submit"
                >
                  Ambil Antrian
                </button>
                <button type="reset" class="batal">Batal</button>
              </div>
            </form>
          </div>

          <div class="image-area">
            <img src="koin.png" />
          </div>
        </div>

        <!-- gambar bawah -->
        <div class="images">
          <img class="img1" src="data.png" />
          <img class="img2" src="transfer.png" />
        </div>
      </div>
    </div>
  </body>
</html>
