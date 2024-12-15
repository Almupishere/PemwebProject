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

  document.addEventListener('DOMContentLoaded', () => {
    // Dapatkan semua elemen karakter
    const characterItems = document.querySelectorAll('.character-item');

    // Loop melalui setiap elemen karakter
    characterItems.forEach((item) => {
      item.addEventListener('click', () => {
        const audioFile = item.getAttribute('data-audio'); // Ambil data audio dari atribut
        if (audioFile) {
          const audio = new Audio(audioFile);
          audio.play(); // Mainkan suara
        } else {
          alert('Tidak ada suara yang terhubung dengan karakter ini.');
        }
      });
    });
  });


  
  