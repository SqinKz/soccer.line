<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>soccer.line</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <!-- Navbar -->
    <div class="navbar">
      <img
        src="img/logo-removebg-preview.png"
        alt="logo"
        width="20%"
        height="20%"
      />

      <div class="navbar-nav">
        <a href="#home">Home</a>
        <a href="#categories">Categories</a>
        <a href="#about">About us</a>
      </div>

      <div class="navbar-extra">
        <a href="login.php" id="user"><i data-feather="user"></i></a>
        <a href="#menu" id="menu"><i data-feather="menu"></i></a>
      </div>
    </div>

    <!-- Hero Section -->
    <section class="hero" id="home">
      <main class="content">
        <h1>TRAINING FOOTBAL FOR BEGINS</h1>
        <h3>TIME TO UP YOUR SKILL TO BE A CHAMPOIN</h3>
        <a href="#categories" class="btn">GET NOW</a>
      </main>
    </section>

    <!-- Menu Pilihan -->
    <section id="categories" class="categories">
      <h1>Categories</h1>
      <div class="row" id="categories-list">
        <div class="card">
          <div class="card-img">
            <img src="img/keeper.jpg" alt="keeper" />
          </div>
          <div class="card-content">
            <h2>KEEPER</h2>
            <h3>Rp 50.000</h3>
            <button class="item-detail-button">Beli</button>
          </div>
        </div>
        <div class="card">
          <div class="card-img">
            <img src="img/skill.jpg" alt="skill" />
          </div>
          <div class="card-content">
            <h2>SKILL</h2>
            <h3>Rp 50.000</h3>
            <button class="item-detail-button">Beli</button>
          </div>
        </div>
        <div class="card">
          <div class="card-img">
            <img src="img/kick.jpg" alt="kick" />
          </div>
          <div class="card-content">
            <h2>KICK</h2>
            <h3>Rp 50.000</h3>
            <button class="item-detail-button">Beli</button>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal Box untuk Keeper -->
    <div class="modal" id="keeper-modal">
      <div class="modal-container">
        <a href="#" class="close-icon"><i data-feather="x"></i></a>
        <div class="modal-content">
          <img src="img/keeper.jpg" alt="Keeper" />
          <div class="product-content">
            <h2>KEEPER</h2>
            <h3>Rp 50.000</h3>
            <button class="buy-button">Beli</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Box untuk Skill -->
    <div class="modal" id="skill-modal">
      <div class="modal-container">
        <a href="#" class="close-icon"><i data-feather="x"></i></a>
        <div class="modal-content">
          <img src="img/skill.jpg" alt="Skill" />
          <div class="product-content">
            <h2>SKILL</h2>
            <h3>Rp 50.000</h3>
            <button class="buy-button">Beli</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Box untuk Kick -->
    <div class="modal" id="kick-modal">
      <div class="modal-container">
        <a href="#" class="close-icon"><i data-feather="x"></i></a>
        <div class="modal-content">
          <img src="img/kick.jpg" alt="Kick" />
          <div class="product-content">
            <h2>KICK</h2>
            <h3>Rp 50.000</h3>
            <button class="buy-button">Beli</button>
          </div>
        </div>
      </div>
    </div>

    <!-- About Us -->
    <section id="about" class="about">
      <h1>About Us</h1>
      <p>
        Our company was founded in 2010 with the goal of providing high-quality
        training
      </p>
    </section>

    <!-- Feather Icon -->
    <script>
      feather.replace();
    </script>

    <!-- My javascript -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const itemDetailButtons = document.querySelectorAll(
          ".item-detail-button"
        );
        const modals = {
          keeper: document.querySelector("#keeper-modal"),
          skill: document.querySelector("#skill-modal"),
          kick: document.querySelector("#kick-modal"),
        };

        itemDetailButtons.forEach((button, index) => {
          button.onclick = (e) => {
            e.preventDefault(); // Mencegah perilaku default
            const modalKey = ["keeper", "skill", "kick"][index]; // Mengambil kunci modal berdasarkan index
            modals[modalKey].style.display = "flex"; // Menampilkan modal yang sesuai
          };
        });

        // klik tombol close modal
        document.querySelectorAll(".modal .close-icon").forEach((closeIcon) => {
          closeIcon.onclick = (e) => {
            e.preventDefault();
            closeIcon.closest(".modal").style.display = "none"; // Menutup modal yang sesuai
          };
        });

        // klik diluar modal
        window.onclick = (e) => {
          Object.values(modals).forEach((modal) => {
            if (e.target === modal) {
              modal.style.display = "none"; // Menutup modal jika klik di luar modal
            }
          });
        };
      });

      // Fungsi untuk mensimulasikan proses pembelian dengan Promise
      function purchaseItem(item) {
        return new Promise((resolve) => {
          setTimeout(() => {
            resolve(`You have successfully purchased ${item} for Rp 50.000!`);
          }, 1500); // Simulasi delay 1.5 detik
        });
      }

      // Event listener untuk semua tombol buy-button
      document.querySelectorAll(".buy-button").forEach((button) => {
        button.onclick = function () {
          const itemName = this.parentElement.querySelector("h2").innerText; // Ambil nama item
          purchaseItem(itemName).then((message) => {
            alert(message); // Tampilkan pesan sukses
          });
        };
      });
    </script>
  </body>
</html>