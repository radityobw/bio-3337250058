document.addEventListener('DOMContentLoaded', () => {
    const themeToggleBtn = document.getElementById('theme-toggle');
    const body = document.body;

    // Cek preferensi tema sebelumnya di localStorage
    const currentTheme = localStorage.getItem('theme');
    if (currentTheme === 'light') {
        body.classList.add('light-mode');
        themeToggleBtn.innerHTML = '🌙 Dark Mode';
        themeToggleBtn.classList.replace('btn-outline-light', 'btn-outline-dark');
    }

    // Event listener untuk tombol toggle
    themeToggleBtn.addEventListener('click', () => {
        body.classList.toggle('light-mode');

        if (body.classList.contains('light-mode')) {
            localStorage.setItem('theme', 'light');
            themeToggleBtn.innerHTML = '🌙 Dark Mode';
            themeToggleBtn.classList.replace('btn-outline-light', 'btn-outline-dark');
        } else {
            localStorage.setItem('theme', 'dark');
            themeToggleBtn.innerHTML = '☀️ Light Mode';
            themeToggleBtn.classList.replace('btn-outline-dark', 'btn-outline-light');
        }
    });
});


// ===== FETCH API: FAKTA KUCING =====

const isiFakta = document.querySelector("#isi-fakta");
const btnRefresh = document.querySelector("#btnRefresh");

async function ambilFakta() {
    // Tampilkan loading indicator
    isiFakta.textContent = "⏳ Memuat fakta...";

    try {
        const response = await fetch("https://api.ryocantsleep.com/api/facts");

        // Cek apakah HTTP response OK (status 200-299)
        if (!response.ok) {
            throw new Error("HTTP Error: " + response.status);
        }

        const data = await response.json();

        // Tampilkan fakta ke DOM
        isiFakta.textContent = data.fact;

    } catch (error) {
        // Tampilkan pesan error yang ramah
        isiFakta.textContent = "⚠️ Gagal memuat fakta. Cek koneksi internet Anda.";
        console.error("Error:", error.message);
    }
}

// Jalankan saat halaman pertama kali dimuat
ambilFakta();

// Jalankan ulang saat tombol diklik
btnRefresh.addEventListener("click", ambilFakta);