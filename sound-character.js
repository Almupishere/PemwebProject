// Array suara karakter
const characterVoices = {
    "Leon S. Kennedy": "asset/sounds/leon.mp3",
    "Ashley Graham": "asset/sounds/ashley.mp3",
    "Luis Serra": "asset/sounds/luis.mp3",
    "Ada Wong": "asset/sounds/ada.mp3",
    "Albert Wesker": "asset/sounds/albert.mp3",
    "Hunk": "asset/sounds/hunk.mp3",
    "Ingrid Hunnigan": "asset/sounds/ingrid.mp3",
    "Merchant": "asset/sounds/merchant.mp3",
    "Bitores Mendez": "asset/sounds/bitores.mp3",
    "Osmund Saddler": "asset/sounds/osmund.mp3",
    "Chainsaw Villagers": "asset/sounds/chainsaw.mp3",
    "Jack Krauser": "asset/sounds/jack.mp3",
    "Villagers": "asset/sounds/villagers.mp3",
    "Ramon Salazar": "asset/sounds/ramon.mp3",
  };
  
  // Fungsi untuk memutar suara karakter
  function playVoice(characterName) {
    const audioSrc = characterVoices[characterName];
    if (audioSrc) {
      const audio = new Audio(audioSrc);
      audio.play();
    } else {
      console.warn(`Tidak ada suara untuk karakter: ${characterName}`);
    }
  }
  
  // Menambahkan event listener untuk karakter
  const characterItems = document.querySelectorAll(".character-item");
  characterItems.forEach((item) => {
    const characterName = item.querySelector(".name")?.textContent;
    if (characterName) {
      // Event klik untuk memutar suara
      item.addEventListener("click", () => playVoice(characterName));
  
      // Event hover untuk efek
      item.addEventListener("mouseenter", () => {
        item.style.transform = "scale(1.1)"; // Perbesar saat hover
        item.style.transition = "transform 0.3s ease";
      });
  
      item.addEventListener("mouseleave", () => {
        item.style.transform = "scale(1)"; // Kembali ke ukuran normal
      });
    }
  });
  