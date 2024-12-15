function changePlatform(selectedPlatform) {
    // Objek data untuk setiap platform
    const platformData = {
        ps4: {
            activeImg: "asset/logo/button-merahps4.png",
            inactiveImg: "asset/logo/button-hitamps4.png",
            gameImage: "asset/logo/re-ps4.jpg",
            storeLink: "https://store.playstation.com/ps4",
            storeText: "PlayStation@Store (PS4)"
        },
        ps5: {
            activeImg: "asset/logo/button-merahps5.png",
            inactiveImg: "asset/logo/button-hitamps5.png",
            gameImage: "asset/logo/re-ps5.jpg",
            storeLink: "https://store.playstation.com/ps5",
            storeText: "PlayStation@Store (PS5)"
        },
        steam: {
            activeImg: "asset/logo/button-merahsteam.png",
            inactiveImg: "asset/logo/button-hitamsteam.png",
            gameImage: "asset/logo/re-steam.jpg",
            storeLink: "https://store.steampowered.com",
            storeText: "Steam Store"
        },
        xbox: {
            activeImg: "asset/logo/button-merahxbox.png",
            inactiveImg: "asset/logo/button-hitamxbox.png",
            gameImage: "asset/logo/re-xbox.jpg",
            storeLink: "https://www.microsoft.com/xbox",
            storeText: "Microsoft Store (Xbox)"
        },
        pc: {
            activeImg: "asset/logo/button-merahpcsx.png",
            inactiveImg: "asset/logo/button-hitampcsx.png",
            gameImage: "asset/logo/re-pcsx2.png",
            storeLink: "https://www.gog.com",
            storeText: "GOG Store (PC)"
        }
    };

    // Reset semua tombol menjadi hitam
    for (let platform in platformData) {
        const imgElement = document.getElementById(platform);
        imgElement.src = platformData[platform].inactiveImg;
    }

    // Set tombol platform yang dipilih menjadi merah
    const selectedImg = document.getElementById(selectedPlatform);
    selectedImg.src = platformData[selectedPlatform].activeImg;

    // Update game-box: gambar game dan tombol download
    document.getElementById("game-image").src = platformData[selectedPlatform].gameImage;
    const storeLink = document.getElementById("store-link");
    storeLink.href = platformData[selectedPlatform].storeLink;
    storeLink.textContent = platformData[selectedPlatform].storeText;
}
