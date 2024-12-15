<?php
session_start();
include("connect.php");
$islogin = isset($_SESSION['username']);

if ($islogin) {
  $username=$_SESSION['username'];
}else {
  $username = NULL;
}

// Cek apakah user sudah login
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Ambil jabatan dari database
    $query = "SELECT jabatan FROM user WHERE username = '$username'";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $jabatan = $row['jabatan'];
    } else {
        $jabatan = null;
    }
} else {
    $username = null;
    $jabatan = null;
}





if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

// Ambil data senjata dari database
$sql = "SELECT * FROM senjata";
$result = $connect->query($sql);
$weapons = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $weapons[] = $row;
    }
}


$sql = "SELECT * FROM carousel";
$result = $connect->query($sql);

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link
      href="https://fonts.googleapis.com/css2?family=Castoro+Titling&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Teko&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Sorts+Mill+Goudy:ital@0;1&family=Teko&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Jomolhari&family=Sorts+Mill+Goudy:ital@0;1&family=Teko&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Alike&family=Jomolhari&family=Sorts+Mill+Goudy:ital@0;1&family=Teko&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="homepage.css" />
  </head>
  <body>
    
    <div class="container">
      <div class="section">
        <nav class="navbar">
          <div class="navbar-nav">
            <a href="#topics">Topics</a>
            <a href="#story">Story</a>
            <a href="#character">Character</a>
            <a href="#location">Location</a>
            <a href="#gameplay">Gameplay</a>
            <?php if ($jabatan === 'admin'): ?>
              <a href="download.php">Download</a>
              <a href="dashboard.php">Dashboard</a>
            <?php elseif ($jabatan === 'AI_visitor'): ?>
              <a href="download.php">Download</a>
            <?php else: ?>
              <a href="#" onclick="alert('Anda harus login terlebih dahulu untuk mendownload!');">Download</a>
            <?php endif; ?>
          </div>

          <?php if ($islogin):?>
          <div class="navbar-extra">
            <button><a href="?logout=true"><?= htmlspecialchars($username) ?></a></button>
          </div>
          <?php else :?>
          <div class="navbar-extra">
            <button><a href="login.php">Login</a></button>
          </div>
          <?php endif; ?>
        </nav>

        <div class="title">
          <h1>
            Welcome to the <br />
            <img src="logo-re.svg" alt="Logo" />
          </h1>
        </div>
      </div>
      
      <div id="topics" class="section2">
        <div class="header">
          <h1>TOPICS</h1>
          <div class="red-line"></div>
        </div>
        <div class="carousel-container">
          <div class="carousel-track">
            <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<div class='carousel-item'>";
                  echo "<div class='carousel-img1' style='background-image: url(" . $row['image_url'] . ");'></div>";
                  echo "<h2>" .$row['title'] ."</h2>";
                  echo "<p>" . $row['description'] . "</p>";
                  echo "<div class='footer-line'></div>";
                  echo "</div>";
              }
          }
            ?>

          </div>
        </div>
      </div>
      <div id="trailer" class="section3">
        <div class="carousel-container">
          <div class="carousel-buttons">
            <h1>TRAILER</h1>
            <button class="carousel-button" id="prevBtn">&lt;</button>
            <div class="red-line"></div>
            <div class="active-segment"></div>
            <button class="carousel-button" id="nextBtn">&gt;</button>
          </div>
          <div class="carousel-track">
            <div class="carousel-item1"><div class="logo-yt" data-url="https://youtu.be/Zb3iOQdeR9c?si=o1cDEFiD34ua8nm1"></div></div>
            <div class="carousel-item2">
              <div
                class="logo-yt"
                data-url="https://youtu.be/Hv-o8TnJW0k?si=S82wBW1Ur9MB9Xzq"
              ></div>
            </div>
            <div class="carousel-item3">
              <div
                class="logo-yt"
                data-url="https://youtu.be/tK_7dnU5OCU?si=zmXZhbeUSK-SMqqb"
              ></div>
            </div>
            <div class="carousel-item4"><div class="logo-yt" data-url="https://youtu.be/wBO511lW_3g?si=tl-lRx7Np9Vil-0E"></div></div>
            <div class="carousel-item5"><div class="logo-yt" data-url="https://youtu.be/4-rbWvdHvxY?si=VK2jFoxWwJyCx8C0"></div></div>
            <!-- Tambahkan elemen lainnya sesuai kebutuhan -->
          </div>
        </div>
      </div>
      <div id="story" class="section4">
        <div class="header">
          <h1>STORY</h1>
          <div class="red-line"></div>
        </div>
        <div class="container">
          <img src="asset/STORY/ST1.png" alt="Image 1" />
          <div class="row">
            <img src="asset/STORY/ST2.jpg" alt="Image 2" />
            <img src="asset/STORY/ST3.jpg" alt="Image 3" />
            <img src="asset/STORY/ST4.jpg" alt="Image 4" />
          </div>
          <div class="text-overlay-container">
            <img src="asset/STORY/ST5.jpg" alt="Image 5" />
            <div class="text-content">
              <p>
                Sudah 6 tahun berlalu sejak bencana biologis di Raccoon City.
                <br /><br />
                Leon S. Kennedy, salah satu penyintas insiden tersebut, telah
                direkrut sebagai agen yang langsung melapor kepada presiden
                Amerika Serikat.
                <br /><br />
                Dengan pengalaman dari berbagai misi di belakangnya, Leon
                dikirim untuk menyelamatkan putri presiden yang diculik.
                <br /><br />
                Dia melacaknya ke sebuah desa terpencil di Eropa, di mana
                penduduk desa berperilaku aneh dan mengerikan.
              </p>
              <p>Kisah penyelamatan yang penuh bahaya dan horor pun dimulai.</p>
            </div>
          </div>
        </div>
      </div>
      <div id="story2" class="section5"></div>
      <div id="character" class="section6">
        <div class="header">
          <h1>CHARACTER</h1>
          <div class="red-line"></div>
        </div>
        <div class="character-container">
          <div class="character-item">
            <img src="asset/KARAKTER/LEON.png" alt="Leon S. Kennedy" />
            <div class="name">Leon S. Kennedy</div>
          </div>
          <div class="character-item">
            <img src="asset/KARAKTER/ASHLEY.png" alt="Ashley Graham" />
            <div class="name">Ashley Graham</div>
          </div>
          <div class="character-item">
            <img src="asset/KARAKTER/LUIS.png" alt="Luis Serra" />
            <div class="name">Luis Serra</div>
          </div>
          <div class="character-item">
            <img src="asset/KARAKTER/ADA WONG.png" alt="Ada Wong" />
            <div class="name">Ada Wong</div>
          </div>
          <div class="character-item">
            <img src="asset/KARAKTER/ALBERT.png" alt="Albert Wesker" />
            <div class="name">Albert Wesker</div>
          </div>
          <div class="character-item">
            <img src="asset/KARAKTER/HUNK.png" alt="Hunk" />
            <div class="name">Hunk</div>
          </div>
          <div class="character-item">
            <img src="asset/KARAKTER/INGRID.png" alt="Ingrid Hunnigan" />
            <div class="name">Ingrid Hunnigan</div>
          </div>
          <div class="character-item">
            <img src="asset/KARAKTER/MERCHANT.png" alt="Merchant" />
            <div class="name">Merchant</div>
          </div>
          <div class="character-item">
            <img src="asset/KARAKTER/BITORES.png" alt="Bitores Mendez" />
            <div class="name">Bitores Mendez</div>
          </div>
          <div class="character-item">
            <img src="asset/KARAKTER/OSMUND.png" alt="Osmund Saddler" />
            <div class="name">Osmund Saddler</div>
          </div>
          <div class="character-item">
            <img src="asset/KARAKTER/CHAINSAW.png" alt="Chainsaw Villagers" />
            <div class="name">Chainsaw Villagers</div>
          </div>
          <div class="character-item">
            <img src="asset/KARAKTER/JACK.png" alt="Jack Krauser" />
            <div class="name">Jack Krauser</div>
          </div>
          <div class="character-item"></div>
          <div class="character-item">
            <img src="asset/KARAKTER/VILLAGERS.png" alt="Villagers" />
            <div class="name">Villagers</div>
          </div>
          <div class="character-item">
            <img src="asset/KARAKTER/RAMON.png" alt="Ramon Salazar" />
            <div class="name">Ramon Salazar</div>
          </div>
        </div>
      </div>
      <div id="location" class="section7">
        <h1>LOCATIONS</h1>
        <div class="description">
          <p>
            Sebuah desa terpencil di Eropa yang dikelilingi hutan, yang konon
            katanya menjadi tempat persembunyian sebuah sekte misterius.
          </p>
        </div>
        <div class="carousel">
          <div class="image-container">
            <img src="asset/LOCATIONS/LOC1.jpg" alt="Image 1" />
            <img src="asset/LOCATIONS/LOC2.jpg" alt="Image 2" />
            <img src="asset/LOCATIONS/LOC3.jpg" alt="Image 3" />
            <img src="asset/LOCATIONS/LOC4.jpg" alt="Image 4" />
            <img src="asset/LOCATIONS/LOC5.jpg" alt="Image 5" />
          </div>
        </div>
        <div class="nav-arrows">
          <button id="prevButton">&lt;</button>
          <button id="nextButton">&gt;</button>
        </div>
      </div>
      <div id="gameplay" class="section8">
        <div class="gameplay-container">
          <h1>GAMEPLAY</h1>
          <p class="desc">
            Hadapi teror yang mengintai dengan senjata api yang mematikan,
            hancurkan musuh dengan serangan tangan kosong yang brutal, atau
            lakukan serangan balik mematikan dengan pisau. Kecerdasan dan
            keberanianmu akan menjadi kunci untuk bertahan hidup. Kelola sumber
            daya dengan hati-hati dan tingkatkan senjata untuk menghadapi
            ancaman yang semakin mengerikan.
          </p>
          <div class="carousel-container">
            <div class="carousel-item">
              <div class="gameplay-img1"><div class="play" data-url="https://www.youtube.com/watch?v=xZ7R4f0Txew"></div></div>
              <div class="gp-description">
                <p>
                  Knife Actions <br /><br />Pisaumu bukan hanya untuk menyerang.
                  Gunakan untuk menangkis serangan, menghabis musuh yang sudah
                  terluka, atau memberikan serangan terakhir. Tapi ingat, setiap
                  penggunaan akan membuatnya semakin tumpul. Gunakan dengan
                  bijak.
                </p>
              </div>
            </div>
            <div class="carousel-item">
              <div class="gameplay-img2"><div class="play" data-url="https://www.youtube.com/watch?v=gi5fF78eM4A"></div></div>
              <div class="gp-description">
                <p>
                  Ranged Combat<br /><br />
                  Gunakan sudut pandang orang ketiga untuk membidik musuh secara akurat.
                  Tembakan tepat ke kepala atau kaki akan membuat musuh
                  kesulitan bergerak, memberikanmu kesempatan untuk menyerang
                  secara langsung tanpa perlu menembak lagi.
                </p>
              </div>
            </div>
            <div class="carousel-item">
              <div class="gameplay-img3"><div class="play" data-url="https://www.youtube.com/watch?v=wg41CShnlfo"></div></div>
              <div class="gp-description">
                <p>
                  Third Person View<br /><br />Rasakan tantangan bertahan hidup
                  yang lebih intens dengan kontrol modern. Setiap keputusan yang
                  kamu ambil akan sangat berpengaruh pada kelangsungan hidup
                  Leon.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="konten" class="section9">
        <div class="konten">
            <div id="weapon-gallery">
                <?php foreach ($weapons as $index => $weapon): ?>
                    <div class="weapon-item" id="weapon-<?= $index; ?>" style="display: <?= $index === 0 ? 'block' : 'none'; ?>">
                        <h3><?= $weapon['nama_senjata']; ?></h3>
                        <img src="<?= $weapon['gambar_senjata']; ?>" alt="<?= $weapon['nama_senjata']; ?>" />
                        <p><?= $weapon['deskripsi'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

          </div>
          <div id="navigation">
              <button id="prev-btn" onclick="prev-btn">&lt;</button>
              <button id="next-btn" onclick="next-btn" >&gt;</button>
          </div>
        <div class="footer">
            <p>&copy; 2024 CAPCOM. All Rights Reserved.</p>
            <img src="asset/logo/capcom.png" alt="Capcom Logo" />
        </div>
    </div>
    </div>

    <script>
      document.querySelectorAll(".navbar-nav a").forEach((link) => {
  link.addEventListener("click", function (e) {
    e.preventDefault();

    
    const href = this.getAttribute("href");
    if (href.includes("#")) {
      const target = document.querySelector(href);
      target.scrollIntoView({ behavior: "smooth" });
    } else {
      window.location.href = href;
    }
  });
});

document.querySelectorAll(".logo-yt, .play").forEach(function (logo) {
  logo.addEventListener("click", function () {
    var url = logo.getAttribute("data-url");
    window.open(url, "_blank");
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const track = document.querySelector("#trailer .carousel-track");
  const prevBtn = document.getElementById("prevBtn");
  const nextBtn = document.getElementById("nextBtn");
  const activeSegment = document.querySelector(".active-segment");
  let currentIndex = 0;

  function updateCarousel() {
    track.style.transform = `translateX(-${currentIndex * 250}px)`; 
    if (activeSegment) {
      activeSegment.style.left = `${40 + currentIndex * 8}%`; 
    }
  }

  if (prevBtn && nextBtn) {
    prevBtn.addEventListener("click", () => {
      if (currentIndex > 0) {
        currentIndex--;
        updateCarousel();
      }
    });

    nextBtn.addEventListener("click", () => {
      const maxIndex = track.children.length - 1; 
      if (currentIndex < maxIndex) {
        currentIndex++;
        updateCarousel();
      }
    });
  } else {
    console.error("Tombol prevBtn atau nextBtn tidak ditemukan.");
  }

});



const imgTrack = document.querySelector("#location .image-container");
const prevButton = document.getElementById("prevButton");
const nextButton = document.getElementById("nextButton");
let imgIndex = 0;

function carouselUpdate() {
  imgTrack.style.transform = `translateX(${imgIndex * 200}px)`;
  imgTrack.style.transition = "transform 0.5s ease";
}

function carouselUpdate2() {
  imgTrack.style.transform = `translateX(${imgIndex * 350}px)`;
  imgTrack.style.transition = "transform 0.5s ease";
}

prevButton.addEventListener("click", () => {
  if (imgIndex < 2) {
    imgIndex++;
    carouselUpdate();
  }
});

nextButton.addEventListener("click", () => {
  if (imgIndex > 0) {
    imgIndex--;
    carouselUpdate();
  } else if (imgIndex == 0) {
    imgIndex--;
    carouselUpdate2();
  }
});
      /*location end*/

      let currentIndex = 0;
        const weapons = <?= json_encode($weapons); ?>;
        const weaponGallery = document.getElementById('weapon-gallery');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');

        function showWeapon(index) {
            const allWeapons = document.querySelectorAll('.weapon-item');
            allWeapons.forEach(weapon => weapon.style.display = 'none');
            document.getElementById('weapon-' + index).style.display = 'block';
        }

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                showWeapon(currentIndex);
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentIndex < weapons.length - 1) {
                currentIndex++;
                showWeapon(currentIndex);
            }
        });

    </script>
    <script src="sound-character.js"></script>

  </body>
</html>
