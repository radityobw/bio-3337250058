# Penjelasan Teknis PHP Profil (Pertemuan 7)

Dokumen ini berisi penjelasan teknis mengenai implementasi PHP dasar pada halaman profil web kita. Pada pertemuan ini, kita mengubah halaman statis (HTML/CSS murni) menjadi halaman dinamis menggunakan bahasa pemrograman PHP.

---

## 1. Pengenalan PHP dan Perbedaannya dengan HTML/JS

PHP (Hypertext Preprocessor) adalah bahasa pemrograman *server-side*. Berbeda dengan HTML, CSS, atau JavaScript (DOM) yang dieksekusi di komputer pengguna (di dalam *browser*), kode PHP **sepenuhnya dieksekusi di komputer *server***. 

Ketika pengguna meminta halaman `profil.php`, *server* akan menjalankan semua logika PHP yang ada di dalamnya, merakit hasil akhirnya menjadi teks HTML biasa, lalu mengirimkan struktur HTML matang tersebut ke *browser* pengguna. Itulah mengapa kita perlu menjalankan perintah `php -S localhost:8000`—sebagai simulasi bahwa komputer kita bertindak sebagai *server*.

---

## 2. Struktur Data: Variabel dan Array Asosiatif

Pada bagian paling atas file `profil.php`, kita mendefinisikan sebuah struktur data untuk menyimpan seluruh profil mahasiswa di satu tempat.

```php
<?php
// === DATA MAHASISWA ===
$mahasiswa = [
    "nama"       => "Radityo Budi Waskito",
    "nim"        => "3337250058",
    "prodi"      => "Informatika",
    "angkatan"   => 2025,
    "ipk"        => 4.00,
    "email"      => "radityobudiw@gmail.com",
    "github"     => "https://github.com/radityobw",
    "skill"      => ["HTML", "CSS", "JavaScript", "PHP", "Git"],
    "bio"        => "Saya adalah mahasiswa Informatika UNTIRTA yang...",
    "tahunMasuk" => 2025,
    "tahunLulus" => "sekarang",
    "Jenjang"    => "S1 Informatika, UNTIRTA"
];
?>
```

### Penjelasan:
- **`<?php ... ?>`**: Ini adalah blok tag pembuka dan penutup untuk kode PHP. Segala hal di dalamnya akan diproses sebagai logika perhitungan program.
- **Variabel (`$mahasiswa`)**: Di PHP, semua nama variabel wajib diawali dengan simbol dolar (`$`).
- **Array Asosiatif**: Jika *array* biasa menggunakan angka urut (0, 1, 2) sebagai kuncinya (contoh: baris daftar `"skill"`), maka *Array Asosiatif* menggunakan teks/nama *string* sebagai kuncinya (contoh: `"nama"`, `"nim"`). Pasangan kunci (kiri) dan nilai (kanan) ini dihubungkan menggunakan tanda panah `=>`.

---

## 3. Mencetak Data PHP ke HTML (Echo & Sintaks Pendek)

Setelah kumpulan data didefinisikan, tugas selanjutnya adalah menampilkannya (*render*) agar menyatu dengan struktur desain HTML kita.

```html
<title>Profil - <?= $mahasiswa['nama'] ?></title>
...
<h1><?= $mahasiswa['nama'] ?></h1>
<p><?= $mahasiswa['prodi'] ?> • Angkatan <?= $mahasiswa['angkatan'] ?></p>
```

### Penjelasan:
- **`<?= ... ?>`**: Ini adalah *short echo tag* (tag cetak pendek) bawaan PHP. Fungsi utamanya sama dengan memanggil perintah `echo` (mencetak tulisan ke layar HTML). Penulisan `<?= $mahasiswa['nama'] ?>` persis artinya dengan `<?php echo $mahasiswa['nama']; ?>` namun jauh lebih ringkas.
- **Akses Array (`['kunci']`)**: Untuk mengambil nilai dari dalam *array asosiatif* `$mahasiswa`, kita menggunakan tanda kurung siku dan mengisinya dengan nama kunci elemen tersebut (seperti `'nama'`, `'prodi'`, dll).

---

## 4. Fungsi Kustom (Function)

Selain menyimpan data, PHP juga memungkinkan kita merancang fungsi pembantu (*helper function*) mandiri untuk menampung alur logika yang cukup kompleks.

```php
function badgeStatus($ipk) {
    if ($ipk >= 3.75) return "Cumlaude 🌟";
    if ($ipk >= 3.00) return "Sangat Memuaskan";
    return "Memuaskan";
}
```

### Penjelasan:
- **`function badgeStatus($ipk)`**: Mendeklarasikan sebuah fungsi bernama `badgeStatus` yang membutuhkan satu parameter masukan, yaitu `$ipk`.
- Fungsi ini bertugas melakukan evaluasi bertingkat, lalu mengembalikan (*return*) teks predikat kelulusan mahasiswa berdasarkan syarat standar perguruan tinggi.
- Pada HTML, hasil kembalian fungsi ini langsung disuntikkan ke tampilan menggunakan cara: `<?= badgeStatus($mahasiswa['ipk']) ?>`.

---

## 5. Perulangan (Foreach Loop)

Salah satu keunggulan utama dari perancangan web dinamis adalah kemampuan mereplikasi baris kode HTML secara otomatis bergantung pada jumlah data yang disediakan.

```php
<section id="skill">
    <h2>Skill</h2>
    <ul class="skill-list">
        <?php foreach ($mahasiswa['skill'] as $skill): ?>
            <li><?= $skill ?></li>
        <?php endforeach; ?>
    </ul>
</section>
```

### Penjelasan:
- **`foreach ($array as $item)`**: Ini adalah jenis instruksi perulangan di PHP yang didesain spesifik untuk membedah isi sebuah *array*. Perintah ini bermakna: "Untuk setiap data yang ada di dalam kotak `$mahasiswa['skill']`, pindahkan datanya secara berurutan ke dalam keranjang `$skill`, lalu jalankan cetakan blok kode di bawah ini."
- **Keuntungan**: Tag `<li>` akan otomatis tercipta sebanyak jumlah *skill* yang ada di dalam konfigurasi dasar kita. Jika besok Anda menambahkan 10 *skill* baru ke *array*, Anda tidak perlu menyentuh ataupun menambah tag HTML `<li>` ini secara manual lagi.

---

## 6. Pengkondisian Terbuka (If-Else)

Selain menyimpannya ke dalam struktur fungsi (*function*), PHP juga mempersilakan kita menyisipkan logika percabangan `if-else` langsung mengapit tag-tag HTML murni.

```php
<section id="ipk">
    <h2>Kondisional Berdasarkan IPK</h2>
    <?php if ($mahasiswa['ipk'] >= 3.75): ?>
        <p style="color:green;"><strong>Selamat! Anda meraih predikat Cumlaude.</strong></p>
    <?php elseif ($mahasiswa['ipk'] >= 3.0): ?>
        <p>Anda lulus dengan predikat Sangat Memuaskan.</p>
    <?php else: ?>
        <p>Anda lulus dengan predikat Memuaskan.</p>
    <?php endif; ?>
</section>
```

### Penjelasan:
- **Sintaks Alternatif PHP (`:` dan `endif;`)**: Saat kita memadukan struktur kendali program (seperti `if` atau `foreach`) dengan tag HTML murni di tengahnya, sangat direkomendasikan menggunakan simbol titik dua (`:`) dan diakhiri dengan `endif;` (atau `endforeach;`). Gaya penulisan ini membuat kode HTML/PHP Anda jauh lebih rapi dan bisa dibaca ( *readable* ) dibandingkan jika Anda menggunakan kurung kurawal `{ ... }` klasik.
- **Eksekusi Dinamis Server**: Karena diproses di sisi peladen (*server*), dari ketiga blok `<p>` di atas, komputer pengguna hanya akan mengunduh satu blok yang benar-benar mematuhi syarat yang ada. Jika IPK Anda 4.00, maka *browser* pengguna tak akan pernah mendapatkan teks peringatan *"Sangat Memuaskan"* apalagi *"Memuaskan"*. Ini adalah contoh kehebatan hakiki bahasa *server-side* dalam mengendalikan konten yang ditayangkan.
