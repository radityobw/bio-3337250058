# Penjelasan Teknis Kode Profil (Pertemuan 6)

Dokumen ini berisi penjelasan teknis dan rinci mengenai kode HTML dan CSS yang digunakan untuk membangun halaman profil.

---

## 1. Penjelasan `index.html` (Struktur Halaman)

File `index.html` bertugas sebagai kerangka atau struktur utama dari halaman web. HTML (*HyperText Markup Language*) mendefinisikan elemen-elemen apa saja yang ada di halaman (seperti teks, tabel, link, dll).

### Bagian `<head>` (Informasi Meta & Eksternal)

```html
<!DOCTYPE html>
```
- Menandakan bahwa dokumen ini menggunakan standar HTML5 terbaru.

```html
<html lang="id">
```
- Tag pembuka utama untuk halaman web. Atribut `lang="id"` memberi tahu browser dan mesin pencari (seperti Google) bahwa bahasa utama halaman ini adalah Bahasa Indonesia.

```html
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Radityo Budi Waskito</title>
    <meta name="description" content="Profil pribadi Radityo Budi Waskito, Mahasiswa Informatika UNTIRTA.">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
```
- `<head>`: Bagian ini tidak terlihat langsung oleh pengguna, melainkan berisi "informasi di balik layar".
- `<meta charset="UTF-8">`: Memastikan browser dapat membaca semua jenis karakter teks (termasuk simbol dan emoji) dengan benar tanpa menjadi teks acak.
- `<meta name="viewport" ...>`: Sangat penting untuk **responsivitas**. Ini memastikan ukuran halaman menyesuaikan dengan lebar layar perangkat (misalnya saat dibuka di HP, tampilannya tidak terlalu kecil/besar).
- `<title>`: Teks yang akan muncul di tab browser pengguna.
- `<meta name="description" ...>`: Deskripsi singkat tentang halaman ini. Biasanya digunakan oleh mesin pencari (SEO) untuk menampilkan ringkasan di hasil pencarian.
- `<link href="...bootstrap.min.css"...>`: Mengimpor framework CSS **Bootstrap** agar kita bisa menggunakan komponen dan utilitas yang sudah disediakan oleh Bootstrap, menghemat waktu penataan gaya (styling).
- `<link rel="stylesheet" href="style.css">`: Menghubungkan file HTML ini dengan file `style.css` buatan sendiri. CSS buatan kita dipanggil *setelah* Bootstrap agar bisa menimpa gaya bawaan Bootstrap jika terjadi konflik (Override).

### Bagian `<body>` (Konten Terlihat)

```html
<body>
```
- Membungkus semua konten yang benar-benar akan dilihat oleh pengunjung halaman.

#### Bagian `<header>`
```html
    <header class="header-content position-relative">
        <button id="theme-toggle" class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-3">
            ☀️ Light Mode
        </button>
        <div>
            <h1>Radityo Budi Waskito</h1>
            <p>Mahasiswa Informatika, UNTIRTA</p>
        </div>
    </header>
```
- `<header>`: Elemen semantik untuk bagian "kepala" halaman. Menggunakan utilitas `position-relative` dari Bootstrap agar tombol di dalamnya bisa diposisikan secara mutlak (absolut) bersandar pada area header ini.
- `<button id="theme-toggle">`: Sebuah tombol yang berfungsi sebagai saklar (*toggle*) untuk mengubah tema.
- Class Bootstrap pada tombol (`btn btn-sm btn-outline-light position-absolute top-0 end-0 m-3`): Menjadikan tombol bergaya outline tipis berwarna terang, berukuran kecil (`btn-sm`), selalu berada di pojok kanan atas (`top-0 end-0`), dan diberi batas jarak/margin (`m-3`).
- `class="header-content"`: Memberikan kelas khusus agar konten di dalamnya bisa ditata secara spesifik di CSS dengan Flexbox rata tengah.
- `<h1>`: Heading level 1 (Judul paling utama dan paling besar).
- `<p>`: Paragraph, digunakan untuk teks biasa.

#### Bagian `<main>`
```html
    <main>
```
- `<main>`: Membungkus konten utama dari halaman tersebut. Hanya boleh ada satu `<main>` dalam sebuah halaman HTML untuk praktik aksesibilitas yang baik.

**Bagian Tentang Saya**
```html
        <section id="tentang">
            <h2>Tentang Saya</h2>
            <p><strong>NIM:</strong> 3337250058</p>
            <p>Hobi saya adalah <span class="highlight">Belajar Hal-Hal Baru</span>, untuk saat ini mendalami <strong>Cyber Security</strong>.</p>
        </section>
```
- `<section>`: Mengelompokkan konten yang memiliki tema yang sama.
- `id="tentang"`: Memberikan identitas unik pada elemen ini. Berguna jika nanti kita ingin memberikan *style* khusus dari CSS atau menautkannya.
- `<h2>`: Heading level 2 (Sub-judul).
- `<strong>`: Membuat teks menjadi tebal (*bold*), sekaligus memberi tahu mesin pembaca layar bahwa kata ini penting.
- `<span>`: Pembungkus teks sebaris (inline) tanpa memberikan garis baru. Di sini kita menggunakan atribut `class="highlight"` agar kata tersebut bisa kita beri warna/gaya khusus dari CSS nanti.

**Bagian Skill / Bahasa Pemrograman**
```html
        <section id="skill">
            <h2>Bahasa Pemrograman Favorit</h2>
            <ul class="skill-list">
                <li>JavaScript</li>
                <li>PHP</li>
                <li>Python</li>
            </ul>
        </section>
```
- `<ul class="skill-list">` (*Unordered List*): Membuat daftar item yang tidak berurutan (biasanya menggunakan titik/bullet). Class `skill-list` ditambahkan agar elemen list ini memiliki ruang khusus untuk penerapan Flexbox tanpa memengaruhi elemen `<ul...>` lainnya di halaman ini.
- `<li>` (*List Item*): Mendefinisikan setiap butir/item dari dalam daftar tersebut.

**Bagian Riwayat Pendidikan**
```html
        <section id="riwayat">
            <h2>Riwayat Pendidikan</h2>
            <table>
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Jenjang</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2025 - sekarang</td>
                        <td>S1 Informatika, UNTIRTA</td>
                    </tr>
                </tbody>
            </table>
        </section>
```
- `<table>`: Membuat struktur tabel.
- `<thead>`: Bagian kepala dari tabel.
- `<tr>` (*Table Row*): Mendefinisikan baris dalam tabel.
- `<th>` (*Table Header*): Sel tabel yang menjadi judul/header kolom (secara otomatis teksnya akan tebal dan rata tengah secara default HTML).
- `<tbody>`: Membungkus data inti tabel.
- `<td>` (*Table Data*): Sel yang berisi data biasa di dalam tabel.

**Bagian Fakta Hari Ini**
```html
        <section id="fakta">
            <h2>⚔️ Fakta Hari Ini</h2>
            <p id="isi-fakta">Memuat fakta...</p>
            <button id="btnRefresh">Ambil Fakta Baru</button>
        </section>
```
- `<section id="fakta">`: Menambahkan bagian (section) baru khusus untuk menampilkan fakta acak yang ditarik secara dinamis dari internet.
- `<p id="isi-fakta">`: Elemen paragraf yang ditandai dengan ID unik agar JavaScript dapat dengan mudah menemukan dan menyuntikkan teks fakta ke dalamnya.
- `<button id="btnRefresh">`: Tombol yang disiapkan untuk memicu pengambilan fakta baru saat diklik.

#### Bagian `<footer>`
```html
    <footer class="text-center mt-5 mb-4">
        <p class="mb-2">Hubungi saya:</p>
        <a href="mailto:radityobudiw@gmail.com" class="btn btn-outline-info rounded-pill px-4">radityobudiw@gmail.com</a>
    </footer>
```
- `<footer>`: Elemen semantik untuk bagian penutup/kaki halaman.
- Class Bootstrap (`text-center`, `mt-5`, `mb-4`, `mb-2`): Merupakan **utilitas Bootstrap** untuk memberikan margin dan meratakan teks ke tengah secara instan tanpa perlu menuliskannya di file `style.css`.
- `<a>` (*Anchor*): Digunakan untuk membuat tautan (link). `href="mailto:..."` menjadikan teks sebagai link email yang jika diklik akan membuka aplikasi email.
- Class Bootstrap `btn btn-outline-info rounded-pill px-4`: Adalah **Komponen Bootstrap**. Kelas-kelas ini menyulap tautan teks biasa menjadi tombol modern *(Button)* bergaya *outline*, memiliki warna info (biru muda), dan dengan pinggiran sangat melengkung *(pill)*.

#### Memuat JavaScript
```html
    <script src="script.js"></script>
</body>
```
- `<script src="script.js">`: Digunakan untuk mengimpor dan menjalankan kode dari file JavaScript eksternal. Tag ini diletakkan tepat di atas `</body>` (penutup *body*) dengan sengaja. Hal ini bertujuan agar browser memuat semua tampilan tombol dan struktur HTML terlebih dahulu secara utuh sebelum JavaScript mencoba mengenali tombol tersebut.

---

## 2. Penjelasan `style.css` (Desain & Tampilan)

CSS (*Cascading Style Sheets*) digunakan untuk mengatur bagaimana HTML ditampilkan (warna, posisi, animasi, jarak, dll).

### Import Font dan Variabel

```css
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');
```
- Mengambil jenis huruf (font) `Inter` langsung dari server Google Fonts secara otomatis.

:root {
    --bg-color: #0f1115;
    --card-bg: rgba(255, 255, 255, 0.03);
    --card-border: rgba(255, 255, 255, 0.08);
    --primary-color: #00d2ff;
    --secondary-color: #3a7bd5;
    --text-main: #e2e8f0;
    --text-muted: #94a3b8;
}

body.light-mode {
    --bg-color: #f8fafc;
    --card-bg: rgba(255, 255, 255, 0.7);
    --card-border: rgba(0, 0, 0, 0.1);
    --primary-color: #0284c7;
    --secondary-color: #0369a1;
    --text-main: #0f172a;
    --text-muted: #475569;
}
```
- `:root`: Mendefinisikan **variabel CSS** utama yang merupakan palet warna untuk tema gelap (Dark Mode). Ini adalah tampilan awal (*default*).
- `body.light-mode`: Kumpulan variabel alternatif untuk tema terang. Karena nama variabel-variabelnya sama, CSS akan otomatis menimpa *(overwrite)* warna gelap dari `:root` menjadi warna terang setiap kali *class* `light-mode` disematkan ke tag `<body>` oleh JavaScript. Konsep ini sangat mempermudah pembuatan fitur banyak tema.

### Gaya Global (Body)

```css
body {
    font-family: 'Inter', sans-serif;
    background: var(--bg-color);
    background-image: radial-gradient(circle at top right, rgba(58, 123, 213, 0.15), transparent 40%),
                      radial-gradient(circle at bottom left, rgba(0, 210, 255, 0.15), transparent 40%);
    background-attachment: fixed;
    color: var(--text-main);
    margin: 0;
    padding: 0;
    line-height: 1.6;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
```
- `font-family`: Menetapkan font `Inter` ke seluruh teks di halaman.
- `background-image: radial-gradient(...)`: Membuat efek pendaran cahaya (*glow*) berbentuk lingkaran di pojok kanan atas dan kiri bawah latar belakang. Inilah yang memberikan kesan modern dan premium.
- `display: flex`, `flex-direction: column`, `min-height: 100vh`: Ini adalah teknik CSS Modern (Flexbox) untuk memastikan `<footer>` akan selalu berada di paling bawah layar, meskipun konten di atasnya sedikit (tinggi minimal = 100% tinggi layar).
- `transition: background-color 0.4s ease, color 0.4s ease`: Memberikan efek animasi transisi (peralihan) yang sangat mulus selama 0.4 detik ketika tema berganti warna dari gelap ke terang, maupun sebaliknya.

### Header

```css
.header-content {
    background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
    padding: 60px 20px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    margin-bottom: 40px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
```
- `.header-content`: Memanggil tag HTML yang memiliki *class* tersebut.
- `linear-gradient(...)`: Membuat warna gradasi pada background judul atas.
- `padding`: Jarak ruang *di dalam* elemen (antara teks dan batas kotak).
- `box-shadow`: Memberikan bayangan pada kotak header agar terlihat melayang.
- `display: flex`, `flex-direction: column`, `align-items: center`, `justify-content: center`: **Penerapan Flexbox** pada Header. Semua elemen anak dari header disusun berjejer satu kolom dari atas ke bawah dan diselaraskan secara pas di tengah-tengah *(Center)*.
- `transition: background 0.4s ease, box-shadow 0.4s ease`: Membuat pergantian warna latar *(background)* pada saat tombol tema ditekan terlihat memudar dengan mulus.

### Main Content (Kerangka Tengah)

```css
main {
    flex: 1;
    max-width: 800px;
    margin: 0 auto;
    padding: 0 20px;
    display: flex;
    flex-direction: column;
    gap: 30px;
}
```
- `max-width: 800px` dan `margin: 0 auto`: Menjaga agar konten tidak meluber ke ujung layar di laptop/PC (maksimal 800 pixel lebarnya) dan memposisikannya tepat di tengah halaman.
- `gap: 30px`: Jarak otomatis antar *section*.

### Desain Kartu (Section) & Glassmorphism

```css
section {
    background-color: var(--card-bg);
    padding: 30px;
    border: 1px solid var(--card-border);
    border-radius: 16px;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
}
```
- `border-radius: 16px`: Melengkungkan sudut-sudut setiap bagian (tidak kaku/kotak).
- `backdrop-filter: blur(10px)`: Memberikan efek "kaca buram" (Glassmorphism) yang mengambil warna background bercahaya di belakangnya lalu memburamkannya.
- `transition: ... background-color 0.4s ease`: Mengatur agar setiap perubahan warna kartu saat pergantian tema terang/gelap (serta efek kartu terangkat saat mouse menyorot/hover) berjalan mulus secara visual tanpa ada perubahan warna instan yang mengagetkan mata.

```css
section:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
    border-color: rgba(255, 255, 255, 0.15);
}
```
- `:hover`: *Pseudo-class* yang aktif saat pointer mouse berada di atas elemen.
- `transform: translateY(-5px)`: Mengangkat kotak (kartu) tersebut sejauh 5 pixel ke atas, memberi kesan interaktif dan hidup.

### Daftar / List / Skill Badge

```css
.skill-list {
    list-style-type: none;
    padding: 0;
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.skill-list li {
    background: var(--card-border);
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.95rem;
    color: var(--text-main);
    transition: background 0.3s ease, color 0.3s ease;
}

.skill-list li:hover {
    background: var(--primary-color);
    color: #000;
    cursor: default;
}
```
- `list-style-type: none`: Menghilangkan titik (bullet) bawaan dari HTML pada list.
- `display: flex` dan `flex-wrap: wrap`: **Penerapan Flexbox** untuk menjajarkan *badge skill*. Jika baris layar (misal HP) tidak muat atau penuh, *badge* bahasa pemrograman di ujung akan tergulung secara otomatis turun ke baris bawahnya berkat atribut `wrap`.
- `border-radius: 20px`: Membuat list menjadi bulat menyerupai *pill/badge*.

### Tabel Desain

```css
table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid var(--card-border);
}

tr:hover td {
    background: rgba(255, 255, 255, 0.02);
}
```
- `width: 100%`: Mengatur agar lebar tabel menyesuaikan dan mengisi penuh bagian kartu.
- `border-collapse: collapse`: Menyatukan garis ganda bawaan tabel HTML menjadi satu garis yang rapi.
- `tr:hover td`: Memberikan efek kilau/sorot ketika pengguna mengarahkan mouse ke baris pada tabel.

### Desain Bagian Fakta & Tombol Refresh

```css
section#fakta {
    ...
    text-align: center;
    margin: 0 auto;
    width: 100%;
    max-width: 1200px;
}
```
- `text-align: center`: Membuat semua isi (judul, teks, dan tombol) di dalam kotak fakta berada di posisi tengah secara horizontal.
- `margin: 0 auto` dan `max-width: 1200px`: Memastikan bahwa **kotak section itu sendiri** terposisikan tepat di tengah-tengah layar induknya. Dengan batas lebar maksimal 1200px, tampilan kotaknya akan tetap proporsional (tidak meregang terlalu panjang) saat dibuka di monitor beresolusi sangat besar.

```css
#btnRefresh, #theme-toggle {
    border-radius: 50px;
    padding: 10px 24px;
    ...
}
```
- `border-radius: 50px`: Mengubah tombol yang tadinya kaku menjadi tombol membulat sempurna di setiap ujungnya, sering disebut desain *pill-shaped button*.
- `transform: scale(1.05)` (saat `#btnRefresh:hover`): Memberikan efek membesar sedikit ketika *mouse* pengguna menyorot tombol, menciptakan sensasi interaksi yang responsif dan memuaskan.

### Media Query (Layout Responsif)

```css
/* Media Query untuk Layout Responsif */
@media (min-width: 768px) {
    main {
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    #tentang {
        flex: 1 1 100%;
    }

    #skill, #riwayat {
        flex: 1 1 calc(50% - 15px);
    }
}
```
- `@media (min-width: 768px)`: Kode CSS di dalamnya **hanya akan dieksekusi/dijalankan** jika lebar layar perangkat pengguna berukuran minimal 768 pixel (ukuran tablet hingga layar desktop).
- `flex-direction: row` pada `main`: Mengubah letak susunan setiap elemen *section* di dalamnya, yang sebelumnya memanjang ke bawah menjadi berjejer ke samping.
- `flex: 1 1 100%`: Mengatur agar elemen/kartu "Tentang Saya" tetap panjang mengambil lebar satu baris penuh (100% lebar layar).
- `flex: 1 1 calc(50% - 15px)`: Membuat bagian/kartu "Bahasa Pemrograman" dan "Riwayat Pendidikan" untuk berbagi tempat di satu baris yang sama. Masing-masing akan memakan porsi 50% lebar layar dikurangi jarak sela/gap yang sebelumnya 15px. Ini akan menghasilkan sebuah struktur *two-column layout* yang rapi dan elegan saat di layar lebar.

---

## 3. Penjelasan `script.js` (Interaktivitas & Logika)

File JavaScript ini memberikan otak dan logika bagi halaman web, memungkinkan elemen HTML dimanipulasi secara dinamis saat pengguna berinteraksi (menekan tombol).

```javascript
document.addEventListener('DOMContentLoaded', () => { ... });
```
- Perintah ini memastikan peramban (browser) telah memuat seluruh konten HTML sepenuhnya sebelum menjalankan kumpulan perintah di dalamnya. Ini mencegah kode JavaScript error akibat mencari tombol yang belum muncul.

```javascript
const themeToggleBtn = document.getElementById('theme-toggle');
const body = document.body;
```
- Mendeklarasikan konstanta untuk menyimpan rujukan (referensi) elemen HTML agar bisa dikendalikan. Di sini kita memanggil tombol berdasarkan `id="theme-toggle"`, serta memanggil keseluruhan `<body>`.

```javascript
const currentTheme = localStorage.getItem('theme');
if (currentTheme === 'light') {
    body.classList.add('light-mode');
    ...
}
```
- **Sistem Penyimpanan (Local Storage):** Kode ini mengecek apakah sebelumnya pengguna pernah memilih mode terang (`theme = light`) di memori browser. Jika iya, maka tampilan akan **otomatis terang** tanpa menunggu pengguna mengeklik tombol. Ini sangat penting untuk menjaga kenyamanan pengalaman pengguna (*User Experience*).

```javascript
themeToggleBtn.addEventListener('click', () => {
    body.classList.toggle('light-mode');
    ...
});
```
- **Event Listener:** Menempelkan sensor pendeteksi ketukan klik ke tombol tersebut.
- `classList.toggle('light-mode')`: Ini adalah perintah kuncinya. Fungsi `toggle` ibarat saklar lampu; jika tag `<body>` *belum punya* class `light-mode`, maka ditambahkan (berubah terang). Jika *sudah punya*, maka dilepaskan (kembali gelap).

```javascript
    if (body.classList.contains('light-mode')) {
        localStorage.setItem('theme', 'light');
        themeToggleBtn.innerHTML = '🌙 Dark Mode';
        themeToggleBtn.classList.replace('btn-outline-light', 'btn-outline-dark');
    } else {
        localStorage.setItem('theme', 'dark');
        ...
```
- Setelah saklar ditekan, muncul percabangan kondisi logika (`if / else`):
  1. Jika kini berubah menjadi tema terang: Aplikasi akan merekam data ke *Local Storage* agar diingat kelak, lalu mengganti tulisan dan lambang tombol menjadi 🌙 Dark Mode. Kode `.replace()` juga ikut bekerja untuk mengubah warna pinggiran tombol (`outline`) agar teks hitam tombol lebih jelas terbaca di atas *background* terang.
  2. Begitu juga sebaliknya ketika kembali berubah ke mode gelap.

### Fetch API: Mengambil Data dari Luar

Di pertemuan 6, halaman web tidak lagi sekadar dokumen statis. Web ini kini mampu melakukan komunikasi untuk mengambil data secara langsung (*live*) dari API eksternal.

```javascript
const isiFakta = document.querySelector("#isi-fakta");
const btnRefresh = document.querySelector("#btnRefresh");
```
- Menggunakan `querySelector` untuk menangkap tag paragraf dan tombol yang ada di HTML ke dalam konstanta JavaScript.

```javascript
async function ambilFakta() {
    isiFakta.textContent = "⏳ Memuat fakta...";
    ...
```
- `async function`: Mendeklarasikan bahwa fungsi ini bersifat *Asynchronous* (berjalan di latar belakang di luar urutan eksekusi normal). Ini sangat vital! Karena pengambilan data dari internet memakan waktu, sifat *async* memungkinkan peramban tidak "membeku" (*freeze*) saat menunggu data tersebut datang.
- `textContent = "⏳ Memuat fakta..."`: Segera memperbarui tulisan di layar untuk memberikan *feedback* instan ke pengguna bahwa sistem sedang bekerja memanggil data (Loading state).

```javascript
    try {
        const response = await fetch("https://api.ryocantsleep.com/api/cysecfacts");
        if (!response.ok) { throw new Error("HTTP Error..."); }
        
        const data = await response.json();
        isiFakta.textContent = data.fact;
    } catch (error) { ... }
```
- `try...catch`: Struktur keamanan yang wajib ada saat menggunakan komunikasi eksternal. Blok `try` "mencoba" menjalankan perintah ambil data, namun jika koneksi putus atau server tujuan mati, program akan melompat ke blok `catch` untuk menampilkan pesan *error* yang ramah kepada pengguna tanpa membuat seluruh aplikasi *crash*.
- `await fetch(...)`: Inti pertukaran data! Melakukan panggilan HTTP Request (GET) ke *endpoint* API (Cyber Security Facts API). Perintah ini akan "menunggu" (*await*) sampai server memberikan balasan.
- `await response.json()`: Mengubah teks balasan (*response*) mentah dari server yang formatnya JSON (JavaScript Object Notation) menjadi objek struktur JavaScript asli agar isinya bisa dibaca.
- `data.fact`: Mengekstrak nilai teks fakta spesifik yang ada di dalam objek tersebut dan menayangkannya ke layar HTML menggantikan tulisan "Memuat...".

```javascript
ambilFakta();
btnRefresh.addEventListener("click", ambilFakta);
```
- Baris pertama: Mengeksekusi/memanggil fungsi pengambil fakta **secara otomatis** sebanyak satu kali segera sesudah website berhasil dimuat (agar kotak faktanya tidak kosong/berisi *placeholder* saja).
- Baris kedua: Menempelkan **Event Listener** ke tombol *Refresh*, sehingga kini setiap kali tombol itu ditekan (*click*), peramban akan kembali menjalankan fungsi ambil data ke server untuk menyuntikkan teks fakta yang baru.
