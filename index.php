<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Lapor-in</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" type="image/png" href="assets/logoweb.png" />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    
  :root {
      --green: #ffff;
      --dark-green: #114B1A;
      --white: #fff;
      --black: #000;
      --gray: #666;
      --light-gray: #f9f9f9;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-color: var(--green);
      color: #000;
      overflow-x: hidden;
      overflow-y: auto;
    }

    .btn-login, .btn-signup {
      padding: 6px 16px;
      border-radius: 20px;
      border: 1px solid #1B9200;
      text-decoration: none;
      font-size: 14px;
    }

    .btn-login { background: transparent; color: #1B9200; }
    .btn-signup { background: #1B9200; color: white; }

    .hero {
  position: relative;
  width: 100vw;
  height: 93vh;
  background-image: url('assets/tentang-kami.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  padding: 50px;
  box-sizing: border-box;
  color: white;
  font-family: 'Plus Jakarta Sans', sans-serif;
  display: flex;
  align-items: flex-start;
  justify-content: flex-start;
  background-size: cover;
  background-position: top;

}

.hero-text {
  max-width: 520px;
}

.hero-text h1 {
  font-weight: 700;
  font-size: 56px; 
  margin: 0 0 18px 0;
  line-height: 1.2;
}

.hero-text p {
  font-weight: 600;
  font-size: 22px; 
  margin: 0 0 28px 0;
}

.btn-cta {
  display: inline-flex;
  justify-content: center;
  align-items: center;
  width: 100%; 
  padding: 14px 24px;
  background: #33551C;
  border-radius: 30px;
  border: none;
  color: white;
  font-weight: 700;
  font-size: 22px;
  font-family: 'Plus Jakarta Sans', sans-serif;
  text-decoration: none;
  transition: background 0.3s;
  text-align: center;
}

.btn-cta:hover {
  background: #2a4518;
}

.section {
  padding: 60px 24px;
  background-color: #ffffff;
  font-family: 'Plus Jakarta Sans', sans-serif;
  max-width: 1350px;
  margin: 0 auto; 
}

.highlight {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  gap: 30px;
  flex-wrap: wrap;
}

.highlight img {
  width: 400px;
  height: 340px;
  object-fit: cover;
  border-radius: 24px;
  flex-shrink: 0;
}

.highlight > div {
  max-width: calc(100% - 430px); 
  padding-right: 24px; 
  box-sizing: border-box;
}

.highlight h2 {
  font-size: 32px;
  font-weight: 700;
  color: #000000;
  margin-bottom: 20px;
  line-height: 1.4;
}

.highlight p {
  font-size: 18px;
  line-height: 1.8;
  color: #333333;
}

.sectdes {
  background-color: #DDFFC5;
  padding: 40px 24px;
  font-family: 'Plus Jakarta Sans', sans-serif;
  max-width: 1280px;
  margin: 0 auto; 
  border-radius: 16px;
  box-sizing: border-box;
}

.isisectdes {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.isisectdes h2 {
  font-size: 32px;
  font-weight: 700;
  line-height: 1.3;
  margin-bottom: 13px;
  max-width: 100%;
}

.bawah {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 30px;
  flex-wrap: wrap;
}

.teksisi {
  max-width: calc(100% - 350px);
  font-size: 18px;
  line-height: 1.8;
  color: #333333;
}

.gambarisi {
  width: 320px;
  flex-shrink: 0;
}

.gambarisi img {
  width: 110%;
  height: auto;
  border-radius: 20px;
  object-fit: cover;
}


.solusi {
  max-width: 1310px;
  margin: 0 auto;
  padding: 60px 24px;
  font-family: 'Plus Jakarta Sans', sans-serif;
  text-align: center;
}

.solusi h2 {
  font-size: 32px;
  font-weight: 700;
  margin-bottom: 16px;
  line-height: 1.3;
}

.solusi-container {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 32px;
}

.card {
  background-color: #fff;
  border-radius: 16px;
  padding: 24px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
  display: flex;
  align-items: flex-start;
  gap: 16px;
}

.card img {
  .card img {
  width: 40px;
  height: 40px;
  object-fit: contain;
  flex-shrink: 0;
  margin-top: 4px;
  padding: 4px;
  background-color: transparent;
  box-sizing: content-box;
  }
}

.card:first-child img {
  transform: scale(1.10);
}


.card-content {
  display: flex;
  flex-direction: column;
  text-align: left;
}

.card h3 {
  font-size: 20px;
  font-weight: 700;
  margin-bottom: 8px;
  color: #1d1d1d;
  line-height: 1.3;
}

.card p {
  font-size: 16px;
  line-height: 1.6;
  color: #444;
}



.dampak {
  max-width: 900px;
  margin: 0 auto;
  padding: 40px 24px;
  font-family: 'Plus Jakarta Sans', sans-serif;
  text-align: center;
  position: relative;
  z-index: 1;
}

.dampak h2 {
  font-size: 32px;
  font-weight: 700;
  margin-bottom: 16px;
  line-height: 1.3;
}

.impact {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 24px;
  
  width: 100vw; 
  position: relative;
  left: 50%;
  transform: translateX(-50%);
  
  max-width: 1280px; 
  margin-bottom: 40px;
}

.impact > div {
  position: relative;
  overflow: hidden;
  border-radius: 20px;
  width: 100%;
  height: 250px;
}

.impact > div img {
  width: 100%;
  height: 90%;
  object-fit: cover;
  display: block;
  border-radius: 20px;
}

.impact > div span {
  position: absolute;
  top: 45%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  font-weight: 700;
  font-size: 28px;
  text-shadow: 0 0 8px rgba(0,0,0,0.7);
  pointer-events: none;
}

.ajakan {
  background-color: #ddffc5;
  padding: 40px 24px;
  font-family: 'Plus Jakarta Sans', sans-serif;
  max-width: 1280px;
  margin: 0 auto;
  border-radius: 16px;
  position: relative;
  overflow: visible;
}

.isiajakan {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 30px;
  position: relative;
  z-index: 1;
  flex-wrap: wrap;
}

.teksajakan {
  max-width: calc(100% - 430px);
  z-index: 2;
}

.teksajakan h2 {
  font-size: 32px;
  font-weight: 700;
  line-height: 1.3;
  margin-bottom: 16px;
}

.teksajakan p {
  font-size: 18px;
  line-height: 1.8;
  color: #333333;
}

.gambarajakan {
  position: absolute;
  top: -100px;
  right: -40px;
  z-index: 0;
}

.gambarajakan img {
  width: 420px;
  height: auto;
  object-fit: cover;
  display: block;
  border-radius: 0;
  pointer-events: none;
}


.fade-in-up {
  opacity: 0;
  transform: translateY(20px);
  animation: fadeInUp 0.8s ease-out forwards;
}

@keyframes fadeInUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@media (max-width: 768px) {
  .hero {
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 20px;
  }

  .hero-text {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .hero-text button,
  .hero-text a {
    margin: 0 auto;
    display: block;
  }

  .hero-text,
  .hero img {
    max-width: 100%;
  }

  .section,
  .solusi,
  .sectdes,
  .dampak,
  .ajakan {
    padding: 40px 20px;
    margin: 0 12px;
    border-radius: 12px;
    box-sizing: border-box;
  }

  .isisectdes,
  .highlight {
    flex-direction: column;
    align-items: flex-start;
    gap: 40px;
    text-align: left;
  }

  .highlight img {
    width: 100%;
    height: auto;
  }

  .highlight > div {
    max-width: 100%;
    padding-right: 0;
  }

  .isisectdes *,
  .highlight * {
    text-align: left;
    align-items: flex-start;
  }

  .bawah,
  .isiajakan {
    flex-direction: column;
    align-items: center;
    gap: 20px;
  }

  .teksisi,
  .teksajakan {
    max-width: 100%;
    text-align: center;
  }

  .gambarisi,
  .gambarajakan {
    text-align: center;
    transform: none;
    margin-top: 20px;
  }

  .gambarisi img,
  .gambarajakan img {
    width: 100%;
    max-width: 320px;
    height: auto;
    margin: 0 auto;
    display: block;
  }

  .solusi-container {
    grid-template-columns: 1fr;
    gap: 24px;
  }

  .card {
    flex-direction: row;
    align-items: flex-start;
    padding: 20px;
    border-radius: 12px;
  }

  .card-content {
    text-align: left;
  }

  .dampak {
  padding: 48px 20px;
  margin: 40px 0 24px;
  text-align: center;
}

.impact {
  display: flex;
  flex-direction: column;
  gap: 16px;
  padding: 0 20px;
  box-sizing: border-box;
}

.impact > div {
  position: relative;
  width: 100%;
  border-radius: 12px;
  overflow: hidden;
  height: 200px;
}

.impact > div img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.impact > div span {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 22px;
  font-weight: 600;
  color: white;
  text-shadow: 0 0 6px rgba(0, 0, 0, 0.5);
  text-align: center;
}

/* Bagian ajakan */
.ajakan {
  position: relative;
  background-color: #DDFFC5;
  padding: 80px 20px 40px;
  margin: 24px 20px 40px; 
  text-align: center;
  border-radius: 12px;
  overflow: visible;
}

.gambarajakan {
  position: absolute;
  top: -70px; 
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  max-width: 300px;
  z-index: 10;
  text-align: center;
}

.gambarajakan img {
  width: 100%;
  height: auto;
  display: block;
}

.teksajakan {
  order: 1;
  margin-top: 40px;
}






  </style>

  <script>
    function toggleMenu() {
      document.querySelector('.navbar-links').classList.toggle('active');
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

<section class="hero fade-in-up">
  <div class="hero-text">
    <h1>Kami rajin<br>mendaur ulang</h1>
    <p>#jadilebihbaikdanbersih</p>
    <a href="tambahlapor.php" class="btn-cta">Ayo Bergabung</a>
  </div>
</section>


  <section class="section fade-in-up">
    <div class="highlight">
      <img src="assets/tentang-kami-inner.png" alt="Pickup" />
      <div>
        <h2>Tujuan Website Lapor-in sebagai Platform Pelaporan sampah & Daur Ulang</h2>
        <p>Website Lapor-in hadir sebagai platform digital yang bertujuan untuk memudahkan masyarakat dalam melaporkan keberadaan sampah di lingkungan sekitar sekaligus memberikan ruang untuk berbagi informasi terkait kegiatan daur ulang. Melalui platform ini, kami ingin mendorong partisipasi aktif masyarakat dalam menjaga kebersihan lingkungan serta menciptakan ekosistem yang lebih peduli terhadap pengelolaan sampah.<br/><br/></p>
      </div>
    </div>
</section>

<section class="sectdes fade-in-up">
  <div class="isisectdes">
    <h2>
      Lapor-in di desain untuk menangkap sampah dari sumbernya, dengan ukuran paling kecil sekalipun
    </h2>
    <div class="bawah">
      <div class="teksisi">
        <p>
        Kami memanfaatkan jejaring pengepul dan pemulung lokal sebagai fondasi infrastruktur daur ulang digital yang setara dengan sistem fisik di negara-negara maju. Dengan membawa sektor informal ini ke dalam ekosistem digital, kami menciptakan sistem pengelolaan sampah yang lebih inklusif, efisien, dan transparan. Langkah ini memungkinkan pelacakan sampah secara real-time, insentif yang adil, serta peningkatan kesejahteraan pelaku lapangan. Kami percaya kolaborasi antara teknologi dan komunitas lokal dapat mempercepat tercapainya lingkungan bebas polusi sampah pada 2025.
        </p>
      </div>
      <div class="gambarisi">
        <img src="assets/volunter.png" alt="Pemulung" />
      </div>
    </div>
  </div>
</section>





<section class="solusi fade-in-up">
  <h2>Solusi Kami</h2>
  <br/>
  <div class="solusi-container">
    <div class="card">
      <img src="assets/symbols-light-report.svg" alt="Laporin" />
      <div class="card-content">
        <h3>Laporin</h3>
        <p>Menciptakan solusi dengan fitur Laporin agar semua orang bisa melaporkan keadaan lingkungan sekitar yang menjadi keluhan masyarakat.</p>
      </div>
    </div>
    <div class="card">
      <img src="assets/solar-box-bold.svg" alt="Pick Up" />
      <div class="card-content">
        <h3>Pick Up</h3>
        <p>Foto sampah daur ulang, upload ke Mallsampah, kolektor terdekat akan datang menjemput, menimbang dan membayar sampahmu.</p>
      </div>
    </div>
    <div class="card">
      <img src="assets/solar-case-round-bold.svg" alt="Company" />
      <div class="card-content">
        <h3>Company</h3>
        <p>Teknologi Kami membantu perusahaan/brand untuk mengumpulkan dan memulihkan produk pasca konsumsi mereka.</p>
      </div>
    </div>
    <div class="card">
      <img src="assets/fontistobus.svg" alt="Drop Off" />
      <div class="card-content">
        <h3>Drop Off</h3>
        <p>Antar langsung sampahmu ke Recycling Centre terdekat, kamu bisa mendaur ulang dengan ukuran kecil seperti satu botol plastik.</p>
      </div>
    </div>
  </div>
</section>




  <section class="dampak fade-in-up">
  <h2>Lapor-in menciptakan berbagai dampak bagi</h2>
  <br/>
  <div class="impact">
    <div>
      <img src="assets/frame-5.png" alt="Lingkungan" />
      <span>Lingkungan</span>
    </div>
    <div>
      <img src="assets/kesehatan.png" alt="Kesehatan" />
      <span>Kesehatan</span>
    </div>
    <div>
      <img src="assets/ekonomi.png" alt="Ekonomi" />
      <span>Ekonomi</span>
    </div>
    <div>
      <img src="assets/sosial.jpg" alt="Sosial" />
      <span>Sosial</span>
    </div>
  </div>
</section>

<br/>

<section class="ajakan fade-in-up">
  <div class="isiajakan">
    <div class="teksajakan">
      <h2>Bergabunglah dengan gerakan kami</h2>
      <p>
        Setiap laporan yang kamu kirimkan membantu kami menciptakan lingkungan
        yang lebih bersih dan ramah untuk generasi mendatang. Jangan biarkan
        sampah menumpuk — <strong>laporkan</strong> sekarang,
        <strong>daur ulang</strong> besok, wujudkan bumi lestari bersama.
      </p>
    </div>
    <div class="gambarajakan">
      <img src="assets/vector.png" alt="Gerakan" />
    </div>
  </div>
</section>



<br/>
<br/>
<br/>
<br/>

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
            <li><a href="https://wa.me/"><img src="assets/wa.svg" alt="WA">Whatsapp</a></li>
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

  <script>
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if(entry.isIntersecting){
        entry.target.classList.add('fade-in-up');
        observer.unobserve(entry.target);
      }
    });
  });

  document.querySelectorAll('.fade-in-up').forEach(el => {
    el.classList.remove('fade-in-up');
    observer.observe(el);
  });
</script>


</body>
</html>
