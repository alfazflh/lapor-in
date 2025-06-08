<?php
ini_set('session.cookie_path', '/'); 
session_start();
include 'koneksi.php';

if (!isset($_SESSION['id_user'])) {
    $_SESSION['alert'] = 'Login Dulu Yaa!';
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id_user'];
$username = $_SESSION['username'];

if (isset($_POST['submit'])) {
    $keluhan = $_POST['keluhan'];
    $penyebab = $_POST['penyebab'];
    $lokasi   = $_POST['lokasi'];
    $lo       = $_POST['lo'];
    $la       = $_POST['la'];

    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];
    $folderUpload = "uploads/";

    if (!is_dir($folderUpload)) {
        mkdir($folderUpload, 0755, true);
    }

    $path = $folderUpload . basename($foto);
    if (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO laporan (id_user, keluhan, penyebab, lokasi, lo, la, foto)
                  VALUES ('$id_user', '$keluhan', '$penyebab', '$lokasi', '$lo', '$la', '$foto')";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            $_SESSION['laporan_success'] = true;
            header("Location: tambahlapor.php");
            exit;
        } else {
            echo "Gagal menyimpan ke database: " . mysqli_error($mysqli);
        }
    } else {
        echo "Gagal upload foto.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Lapor-in - Laporkan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/png" href="assets/logoweb.png" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function toggleMenu() {
            document.querySelector('.navbar-links').classList.toggle('active');
            document.querySelector('.navbar-auth').classList.toggle('active');
        }

        window.onload = function () {
            const currentLocation = location.href;
            const menuItem = document.querySelectorAll('.nav-link');
            menuItem.forEach(item => {
                if (item.href === currentLocation) {
                    item.classList.add('active');
                }
            });
        };
    </script>
<style>
:root {
        --white: #ffffff;
        --form-bg: #f7f9f4;
        --border-color: #ddd;
        --text-muted: #777;
        --primary: #7db855;
    }
    body {
        background-color: #D9FFBF;
        min-height: 100vh;
        overflow-x: hidden;
        overflow-y: auto;
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin: 0;
        padding: 0;
    }

    .navbar {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: var(--white);
        padding: 1rem 2rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    h2 {
        text-align: center;
        margin-top: 2rem;
    }

    form {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 2rem;
    max-width: 1350px;
    margin: 3rem auto;
    padding: 2rem;
    background-color: #fff;
    border-radius: 1rem;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.5s forwards;
    transition: all 0.3s ease-in-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


.form-kiri {
    flex: 1 1 60%;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.form-kanan {
    flex: 1 1 35%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

label {
    font-weight: 600;
    margin-bottom: 0.25rem;
    display: block;
    color: #333;
}

textarea, input[type="text"] {
    width: 100%;
    padding: 0.7rem;
    border-radius: 0.5rem;
    border: 1px solid #ccc;
    font-size: 1rem;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

input[type="file"] {
    display: none;
}

#drop-area {
    border: 2px dashed var(--primary);
    padding: 2rem;
    text-align: center;
    border-radius: 0.75rem;
    background-color: #f8fff8;
    font-size: 0.95rem;
    cursor: pointer;
    min-height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
}

#fileLabel {
    margin: 0;
    color: #555;
    font-weight: 500;
}

input[type="submit"] {
    padding: 1rem;
    font-size: 1.2rem;
    background-color: var(--primary);
    color: white;
    border: none;
    border-radius: 2rem;
    cursor: pointer;
    transition: background 0.3s ease;
    width: 100%;
    margin-top: 2rem;
    max-width: 100%;
}

input[type="submit"]:hover {
    background-color: #43a047;
}

@media (max-width: 768px) {
    form {
        padding: 1.5rem 2rem;
        margin: 2rem 1rem;
  }

  .form-kiri, .form-kanan {
    flex: 1 1 100%;
    width: 100%;
  }

  .form-two-columns {
    flex-direction: column;
    gap: 1rem;
  }

  .form-column {
    width: 100%;
  }

  input[type="submit"], .btn-submit {
    width: 100%;
    font-size: 1.1rem;
    padding: 0.9rem;
  }

  #drop-area {
    padding: 1.5rem 1rem;
    font-size: 0.9rem;
  }

  .riwayat-container {
    padding: 1.5rem 1rem;
  }

  .riwayat-laporan {
    padding: 1rem 0.75rem;
    font-size: 0.9rem;
  }

  .navbar, .sticky-navbar {
    padding: 1rem;
  }

  h2 {
    font-size: 1.5rem;
    margin-top: 1.5rem;
  }

  label {
    font-size: 0.95rem;
  }

  textarea, input[type="text"], select {
    font-size: 1rem;
    padding: 0.65rem;
  }

  .form-header, .riwayat-header {
    font-size: 1.15rem;
  }
}


    .riwayat-container {
        max-width: 1350px;
        margin: 2rem auto;
        padding: 2rem;
        background: #ffffff;
        border-radius: 1rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .riwayat-laporan {
        border: 1px solid #ddd;
        background: #fdfdfd;
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 0.75rem;
        font-size: 0.95rem;
        color: #333;
    }

    .riwayat-laporan img {
        max-width: 100%;
        height: auto;
        margin-top: 10px;
        border-radius: 0.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .form-header, .riwayat-header {
        font-weight: 700;
        font-size: 1.3rem;
        margin-bottom: 1rem;
        color: #333;
        text-align: left;
    }

    @media (max-width: 768px) {
        .riwayat-container {
        padding: 1.5rem 2rem;
        margin: 2rem 1rem;
  }
    }


    .form-two-columns {
        display: flex;
        gap: 1.5rem;
    }

    .form-column {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    textarea, input[type="text"], select {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .btn-submit {
        background-color: var(--primary);
        color: white;
        border: none;
        padding: 1rem 2.5rem;
        font-size: 1.25rem;
        border-radius: 2rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
        align-self: center;
        margin-top: 2rem;
    }

    .btn-submit:hover {
        background-color: #388e3c;
    }
    .navbar {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: var(--white);
        padding: 1rem 2rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }
</style>


</head>
<body>

<nav class="navbar">
<div class="navbar-logo">
      <a href="index.php">
      <img src="assets/logo.jpg" alt="Logo Laporin" />
      </a>
    </div>

    <div class="hamburger" onclick="toggleMenu()">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>

    <ul class="navbar-links">
      <li><a href="index.php" class="nav-link">Beranda</a></li>
      <li><a href="tambahlapor.php" class="nav-link">Laporkan</a></li>
      <li><a href="berita.php" class="nav-link">Berita</a></li>

      <?php if (isset($_SESSION['username'])): ?>
        <li><a href="logout.php" class="btn-logout">Logout</a></li>
      <?php else: ?>
        <li><a href="login.php" class="btn-login">Log in</a></li>
        <li><a href="register.php" class="btn-signup">Sign up</a></li>
      <?php endif; ?>
    </ul>

    <div class="navbar-auth">
      <?php if (isset($_SESSION['username'])): ?>
        <span class="user-welcome">Hi, <?= htmlspecialchars($_SESSION['username']) ?></span>
        <a href="logout.php" class="btn-logout">Logout</a>
      <?php else: ?>
        <a href="login.php" class="btn-login">Log in</a>
        <a href="register.php" class="btn-signup">Sign up</a>
      <?php endif; ?>
    </div>
  </nav>


<?php if (isset($_SESSION['laporan_success'])): ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            toast: true,
            position: 'top',
            icon: 'success',
            title: 'Laporan berhasil dikirim!',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
            background: '#d4f5e1',
            color: '#1b5e20',
            iconColor: '#2e7d32'
        });
    });
</script>
<?php unset($_SESSION['laporan_success']); endif; ?>


<form action="" method="post" enctype="multipart/form-data">
  <div style="width:100%">
    <h1 style="font-size:2.2rem; font-weight:800; margin:0;">Laporkan!</h1>
    <p style="font-size:1rem; color:var(--text-muted); margin:0 0 1rem 0;">Apa aja yang terjadi di lingkunganmu</p>
  </div>

  <div class="form-kiri">
    <label for="keluhan">Ceritakan ada keluhan masalah lingkungan apa hari ini</label>
    <textarea name="keluhan" id="keluhan" rows="5" required></textarea>

    <label for="penyebab">Apa yang menyebabkan hal tersebut terjadi?</label>
    <input type="text" name="penyebab" id="penyebab" required />

    <label for="alamat_auto">Sertakan titik Alamat Lokasi Lingkungan yang kamu ceritakan!</label>
    <input type="text" name="lokasi" id="alamat_auto" required />

    <input type="hidden" name="lo" id="longitude" required />
    <input type="hidden" name="la" id="latitude" required />
  </div>

  <div class="form-kanan">
    <label for="fileElem">Foto Lingkunganmu <br><small>Sisipkan bukti berupa foto dibawah!</small></label>
    <div id="drop-area">
      <p id="fileLabel">Add or drag photos here</p>
      <input type="file" name="foto" id="fileElem" accept="image/*" required />
    </div>
  </div>

  <div style="width:100%; display:flex; justify-content:center;">
    <input type="submit" name="submit" value="Laporkan" />
  </div>
</form>



<script>
    function reverseGeocode(lat, lon) {
        const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                document.getElementById('alamat_auto').value = data.display_name;
            })
            .catch(err => {
                console.error("Gagal mengambil alamat:", err);
            });
    }

    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;
            reverseGeocode(lat, lon);
        }, function(error) {
            alert("Gagal mengambil lokasi: " + error.message);
        });
    } else {
        alert("Browser tidak mendukung GPS");
    }

    const dropArea = document.getElementById("drop-area");
    const fileInput = document.getElementById("fileElem");

    dropArea.addEventListener("click", () => fileInput.click());

    dropArea.addEventListener("dragover", e => {
        e.preventDefault();
        dropArea.style.borderColor = "#34a853";
    });

    dropArea.addEventListener("dragleave", () => {
        dropArea.style.borderColor = "#4CAF50";
    });

    dropArea.addEventListener("drop", e => {
        e.preventDefault();
        dropArea.style.borderColor = "#4CAF50";
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            dropArea.querySelector("p").innerText = files[0].name;
        }
    });
</script>

<div class="riwayat-container">
    <div class="riwayat-header">
        Laporan yang pernah kamu buat
    </div>

    <br/>
<?php
$queryLaporan = "SELECT * FROM laporan WHERE id_user = '$id_user' ORDER BY id DESC";
$resultLaporan = mysqli_query($mysqli, $queryLaporan);

if (mysqli_num_rows($resultLaporan) > 0) {
    while ($row = mysqli_fetch_assoc($resultLaporan)) {
        echo "<div class='riwayat-laporan'>";
        echo "<strong>Keluhan:</strong> " . htmlspecialchars($row['keluhan']) . "<br />";
        echo "<strong>Penyebab:</strong> " . htmlspecialchars($row['penyebab']) . "<br />";
        echo "<strong>Lokasi:</strong> " . htmlspecialchars($row['lokasi']) . "<br />";
        echo "<strong>Foto:</strong><br />";
        echo "<img src='uploads/" . htmlspecialchars($row['foto']) . "' alt='Foto Laporan' />";
        echo "</div>";
    }
} else {
    echo "<p style='text-align:center;'>Belum ada laporan yang dikirim.</p>";
}
?>
</div>

<footer class="footer">
    <div class="footer-left">
        <span>© 2025 Lapor-in</span>
    </div>

    <div class="footer-center">
        <div class="footer-logo-title">
            <img src="assets/logo-2.png" alt="Logo Laporin" class="footer-logo" />
            <h2 class="footer-title">Lapor-in</h2>
        </div>

        <div class="footer-right">
            <div class="footer-section">
                <h3>Kontak Kami</h3>
          <ul>
            <li><a href="https://wa.me/6285733530629"><img src="assets/wa.svg" alt="WA">Whatsapp</a></li>
            <li><a href="https://www.instagram.com/morgen08.official/"><img src="assets/ig.svg" alt="IG">Instagram</a></li>
            <li><a href="https://tiktok.com/@pemuda.kartar08"><img src="assets/tt.svg" alt="TT">Tiktok</a></li>
          </ul>
            </div>

            <div class="footer-section">
                <h3>Lapor-in</h3>
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="tambahlapor.php">Laporkan</a></li>
                    <li><a href="berita.php">Berita</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
