# Penjelasan File PHP Tambahan (Folder "lainnya")

Folder ini berisi tiga file eksperimen dan latihan mandiri untuk memperdalam pemahaman tentang sintaks dasar PHP, manipulasi *array*, dan bagaimana memadukannya dengan struktur tabel HTML dinamis. Berikut adalah rincian fungsionalitas dan konsep yang ada di tiap file:

---

## 1. `latihan.php` (Dasar Variabel dan Kontrol Alur)
File ini mendemonstrasikan fondasi paling dasar dari bahasa PHP, yaitu inisialisasi variabel dan pencetakan data secara murni (menggunakan perintah `echo` biasa).

**Konsep Kunci:**
- **Tipe Data Fundamental**: Mendeklarasikan `$nama` (*String*/teks), `$nim` (*String* angka), `$ipk` (*Float*/desimal), `$aktif` (*Boolean*), dan `$skill` (*Indexed Array*/daftar urut biasa).
- **Interpolasi String**: Menggunakan kutip ganda ganda (`" "`) memungkinkan PHP untuk menyuntikkan variabel langsung ke dalam teks HTML. Contoh: `echo "<h1>Halo, {$nama}!</h1>";`. Penggunaan kurung kurawal `{}` sifatnya opsional, namun sangat direkomendasikan untuk memperjelas dan melindungi batasan nama variabel Anda dari teks di sekitarnya.
- **Kondisional Bertingkat (`if...elseif...else`)**: Mendemonstrasikan evaluasi predikat kelulusan berdasarkan pembacaan satu variabel `$ipk`.
- **Perulangan Standar (`foreach`)**: Mencetak daftar keahlian dari dalam variabel *array* `$skill` dan merakitnya dengan bantuan tag HTML `<li>`.

---

## 2. `mahasiswa.php` (Eksplorasi Array Tingkat Lanjut)
File ini berfokus khusus pada anatomi tipe data *Array* di PHP. Pengetahuan di file ini sangat esensial ketika kita berhadapan dengan data besar atau pemanggilan data dari *database* (seperti MySQL) ke depannya.

**Konsep Kunci:**
- **Array Asosiatif (Pasangan Kunci-Nilai)**: Array yang nama kuncinya ( *key* ) bukan berupa angka urut otomatis (0, 1, 2), melainkan berupa label teks. Contoh: `$mahasiswa["nama"] = "Budi Santoso"`. Struktur ini sangat memudahkan pemrogram saat membaca dan memanggil data spesifik.
- **Array Multidimensi (*Array of Arrays*)**: Direpresentasikan oleh variabel `$daftar`. Ini ibarat sebuah tabel *database*, di mana ada sebuah *array* besar yang di dalamnya berisi tumpukan banyak *array* asosiatif kecil.
- **Akses Data Cepat**: Mendemonstrasikan pemanggilan data individual menggunakan nama kuncinya, misal `echo $mahasiswa["ipk"];`.
- **Iterasi Multidimensi**: Membedah data massal dengan mengulang *array* induk `$daftar`. Pada setiap putaran, variabel `$mhs` akan menampung satu baris profil lengkap yang siap diproses.

---

## 3. `daftar.php` (Studi Kasus: Tabel HTML Dinamis)
File ini adalah tahap integrasi tingkat menengah di mana kita menggabungkan keluwesan logika pengulangan PHP dengan perakitan bentuk tabular (tabel murni HTML `<table border="1">`).

**Konsep Kunci:**
- **Pemisahan Logika Dasar**: Baris paling atas bertugas khusus mendeklarasikan basis data (*array* multidimensi) di zona murni PHP. Setelah `?>` ditutup, baris di bawahnya murni didedikasikan untuk visual HTML. Ini adalah embrio arsitektur desain aplikasi yang bersih (*Separation of Concerns*).
- **Penangkapan Kunci Indeks (`foreach as $key => $value`)**: Sintaks `foreach ($daftar as $i => $mhs)` berguna untuk menangkap nomor baris saat ini secara otomatis ke dalam variabel `$i` (selalu berawal dari angka 0). Pada perakitan kolom "No", kita cetak nomor ini namun ditambah satu `<?= $i + 1 ?>` agar lebih masuk akal bagi manusia.
- **Ternary Operator (Kondisional Satu Baris)**: File ini mendemonstrasikan *jalan pintas* yang sangat elegan untuk menulis percabangan di dalam satu sel tabel saja.
  Kode `<?= $mhs['ipk'] >= 3.75 ? 'Cumlaude 🌟' : 'Reguler' ?>`
  Berarti: **Apakah** IPK >= 3.75? (Tanda Tanya `?`), Jika benar maka cetak `'Cumlaude'`, jika tidak (Tanda Titik Dua `:`), maka cetak `'Reguler'`. 
  Teknik ini membuat baris kode HTML kita jauh lebih ringkas!
