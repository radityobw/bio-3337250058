# Penjelasan Teknis Kode Profil (Pertemuan 3)

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
    <link rel="stylesheet" href="style.css">
</head>
```
- `<head>`: Bagian ini tidak terlihat langsung oleh pengguna, melainkan berisi "informasi di balik layar".
- `<meta charset="UTF-8">`: Memastikan browser dapat membaca semua jenis karakter teks (termasuk simbol dan emoji) dengan benar tanpa menjadi teks acak.
- `<meta name="viewport" ...>`: Sangat penting untuk **responsivitas**. Ini memastikan ukuran halaman menyesuaikan dengan lebar layar perangkat (misalnya saat dibuka di HP, tampilannya tidak terlalu kecil/besar).
- `<title>`: Teks yang akan muncul di tab browser pengguna.
- `<meta name="description" ...>`: Deskripsi singkat tentang halaman ini. Biasanya digunakan oleh mesin pencari (SEO) untuk menampilkan ringkasan di hasil pencarian.
- `<link rel="stylesheet" href="style.css">`: Menghubungkan file HTML ini dengan file `style.css` agar desain/gayanya bisa diterapkan.

### Bagian `<body>` (Konten Terlihat)

```html
<body>
```
- Membungkus semua konten yang benar-benar akan dilihat oleh pengunjung halaman.

#### Bagian `<header>`
```html
    <header>
        <h1>Radityo Budi Waskito</h1>
        <p>Mahasiswa Informatika, UNTIRTA</p>
    </header>
```
- `<header>`: Elemen semantik untuk bagian "kepala" halaman. Biasanya berisi judul utama atau navigasi.
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
            <ul>
                <li>JavaScript</li>
                <li>PHP</li>
                <li>Python</li>
            </ul>
        </section>
```
- `<ul>` (*Unordered List*): Membuat daftar item yang tidak berurutan (biasanya menggunakan titik/bullet).
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

#### Bagian `<footer>`
```html
    <footer>
        <p>Hubungi saya: <a href="mailto:radityobudiw@gmail.com" ...>radityobudiw@gmail.com</a></p>
    </footer>
```
- `<footer>`: Elemen semantik untuk bagian penutup/kaki halaman.
- `<a>` (*Anchor*): Digunakan untuk membuat tautan (link).
- `href="mailto:..."`: Menjadikan teks sebagai link email yang jika diklik akan langsung membuka aplikasi email pengguna.
- Terdapat sedikit kode bergaya sebaris (`style="..."` dan `onmouseover="..."`) yang digunakan hanya khusus untuk membuat efek teks menyala pada email tersebut.

---

## 2. Penjelasan `style.css` (Desain & Tampilan)

CSS (*Cascading Style Sheets*) digunakan untuk mengatur bagaimana HTML ditampilkan (warna, posisi, animasi, jarak, dll).

### Import Font dan Variabel

```css
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');
```
- Mengambil jenis huruf (font) `Inter` langsung dari server Google Fonts secara otomatis.

```css
:root {
    --bg-color: #0f1115;
    --card-bg: rgba(255, 255, 255, 0.03);
    --card-border: rgba(255, 255, 255, 0.08);
    --primary-color: #00d2ff;
    --secondary-color: #3a7bd5;
    --text-main: #e2e8f0;
    --text-muted: #94a3b8;
}
```
- `:root`: Mendefinisikan **variabel CSS**. Ini sangat berguna agar kita tidak perlu mengingat-ingat kode warna (hex code). Jika kita ingin mengubah skema warna website, kita hanya perlu mengubah di satu tempat ini saja.

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

### Header

```css
header {
    background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
    padding: 60px 20px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    margin-bottom: 40px;
}
```
- `linear-gradient(...)`: Membuat warna gradasi pada background judul atas.
- `padding`: Jarak ruang *di dalam* elemen (antara teks dan batas kotak).
- `box-shadow`: Memberikan bayangan pada kotak header agar terlihat melayang.

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
- `transition`: Mengatur durasi dan kehalusan animasi (selama 0.3 detik) saat terjadi perubahan bentuk atau warna.

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
ul {
    list-style-type: none;
    padding: 0;
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

ul li {
    background: var(--card-border);
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.95rem;
    color: var(--text-main);
    transition: background 0.3s ease, color 0.3s ease;
}

ul li:hover {
    background: var(--primary-color);
    color: #000;
}
```
- `list-style-type: none`: Menghilangkan titik (bullet) bawaan dari HTML pada list.
- `flex-wrap: wrap`: Jika baris sudah penuh, item (nama bahasa pemrograman) akan otomatis turun ke baris bawahnya.
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
