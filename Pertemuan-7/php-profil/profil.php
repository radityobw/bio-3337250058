<?php
// === DATA MAHASISWA ===
$mahasiswa = [
    "nama"    => "Radityo Budi Waskito",
    "nim"     => "3337250058",
    "prodi"   => "Informatika",
    "angkatan"=> 2025,
    "ipk"     => 4.00,
    "email"   => "radityobudiw@gmail.com",
    "github"  => "https://github.com/radityobw",
    "skill"   => ["HTML", "CSS", "JavaScript", "PHP", "Git"],
    "bio"     => "Saya adalah mahasiswa Informatika UNTIRTA yang
                  bersemangat belajar teknologi web.",
    "tahunMasuk" => 2025,
    "tahunLulus" => "sekarang",
    "Jenjang" => "S1 Informatika, UNTIRTA"
];

// === FUNGSI HELPER ===
function badgeStatus($ipk) {
    if ($ipk >= 3.75) return "Cumlaude 🌟";
    if ($ipk >= 3.00) return "Sangat Memuaskan";
    return "Memuaskan";
}
?>



<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Radityo Budi Waskito</title>
    <meta name="description" content="Profil pribadi Radityo Budi Waskito, Mahasiswa Informatika UNTIRTA.">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header class="header-content position-relative">
        <button id="theme-toggle" class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-3">
            ☀️ Light Mode
        </button>
        <h1><?= $mahasiswa['nama'] ?></h1>
        <p><?= $mahasiswa['prodi'] ?> • Angkatan <?= $mahasiswa['angkatan'] ?></p>
        <span class="badge"><?= badgeStatus($mahasiswa['ipk']) ?></span>
    </header>

    <main>

        <section id="tentang">
            <h2>Tentang Saya</h2>
            <p><?= $mahasiswa['bio'] ?></p>
            <p><strong>NIM:</strong> <?= $mahasiswa['nim'] ?></p>
            <p><strong>IPK:</strong> <?= $mahasiswa['ipk'] ?></p>
            <p><strong>Email:</strong> <?= $mahasiswa['email'] ?></p>
            <p><strong>GitHub:</strong> <?= $mahasiswa['github'] ?></p>
        </section>

    <section id="skill">
        <h2>Skill</h2>
        <ul class="skill-list">
            <?php foreach ($mahasiswa['skill'] as $skill): ?>
                <li><?= $skill ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

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
                        <td><?= $mahasiswa['tahunMasuk'] ?> - <?= $mahasiswa['tahunLulus'] ?></td>
                        <td><?= $mahasiswa['Jenjang'] ?></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="fakta">
            <h2>⚔️ Fakta Hari Ini</h2>
            <p id="isi-fakta">Memuat fakta...</p>
            <button id="btnRefresh">Ambil Fakta Baru</button>
        </section>

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

    </main>

    <footer class="text-center mt-5 mb-4">
        <p class="mb-2">Hubungi saya:</p>
        <a href="mailto:<?= $mahasiswa['email'] ?>"
            class="btn btn-outline-info rounded-pill px-4"><?= $mahasiswa['email'] ?></a>
    </footer>

    <script src="script.js"></script>
</body>

</html>