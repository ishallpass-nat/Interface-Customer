<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Form | JavaScript Browser Lab</title>
    <style>
        :root { --green: #0f6a4a; --dark-green: #0b543b; --bg: #f4f7f5; --border: #d8e2dc; }
        * { box-sizing: border-box; }
        body { margin: 0; padding: 28px 16px; background: var(--bg); color: #203129; font: 16px/1.5 Arial, sans-serif; }
        main { max-width: 720px; margin: 0 auto; }
        .eyebrow { color: var(--green); text-transform: uppercase; letter-spacing: .1em; font-size: .78rem; font-weight: 700; }
        .card { background: #fff; border: 1px solid var(--border); border-radius: 14px; padding: 24px; margin-top: 18px; box-shadow: 0 8px 24px rgba(15, 60, 40, .06); }
        h1 { margin: 8px 0; font-size: clamp(1.8rem, 4vw, 2.5rem); }
        h2 { margin-top: 0; font-size: 1.2rem; }
        .muted { color: #5c6d63; }
        label { display: block; font-weight: 700; margin: 16px 0 6px; }
        input { width: 100%; border: 1px solid #bbc9c0; border-radius: 8px; padding: 11px 12px; font: inherit; }
        input:focus, button:focus, a:focus { outline: 3px solid rgba(20, 184, 166, .28); outline-offset: 2px; }
        button { cursor: pointer; border: 0; border-radius: 8px; padding: 11px 16px; font: inherit; font-weight: 700; }
        .primary { background: var(--green); color: white; }
        .primary:hover { background: var(--dark-green); }
        .secondary { background: #eef4f0; color: var(--dark-green); border: 1px solid var(--border); }
        .row { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; margin-top: 16px; }
        .tips { border-left: 4px solid #14b8a6; background: #f0faf7; padding: 12px 14px; margin-top: 12px; border-radius: 5px; }
        .feedback { min-height: 1.3em; margin: 5px 0 0; font-size: .92rem; color: #8b1e1e; }
        .status { margin-top: 14px; }
        .required { color: #b42318; }
        footer { color: #65756b; font-size: .9rem; text-align: center; margin-top: 22px; }
        code { background: #eef3ef; padding: 2px 4px; border-radius: 4px; }
        textarea {width: 100%; box-sizing: border-box; padding: 14px 16px;font-family: inherit;font-size: 1rem;border: 1px solid #b8c4c2;border-radius: 10px;background: #fff;resize: vertical; min-height: 90px;}
        select {width: 100%;box-sizing: border-box;padding: 14px 44px 14px 16px;   /* ruang kanan buat panah */font-family: inherit;font-size: 1rem;color: #1f2d2b;background-color: #fff;border: 1px solid #b8c4c2;border-radius: 10px;cursor: pointer;}
    </style>
    <script src="app.js" defer></script>
</head>
<body>
<main>
    <p class="eyebrow">Session 15 · JavaScript & Browser Essentials</p>
    <h1>Customer Registration Form</h1>
    <p class="muted">Form dari sesi sebelumnya, sekarang ditambahkan interaksi browser dengan JavaScript.</p>

    <section class="card" aria-labelledby="tipsHeading">
        <h2 id="tipsHeading">Sebelum mengisi formulir</h2>
        <p class="muted">Coba tombol di bawah dan perhatikan perubahan halaman serta output di Console.</p>
        <button type="button" class="secondary" id="toggleTips">Tampilkan Petunjuk</button>
        <div id="formTips" class="tips" hidden>
            Isi nama customer dan alamat email dan nomor telepon dengan benar. Browser memberi umpan balik awal, tetapi server tetap memeriksa data yang diterima.
        </div>
    </section>

    <section class="card" aria-labelledby="formHeading">
        <h2 id="formHeading">Informasi customer</h2>
        <p class="muted">Tanda <span class="required">*</span> menunjukkan field wajib.</p>

        <form id="customerForm" action="submit.php" method="POST" novalidate>
            <label for="name">Nama customer <span class="required">*</span></label>
            <input type="text" id="name" name="name" autocomplete="name" placeholder="Contoh: Nadia Putri" required>
            <p id="nameFeedback" class="feedback" aria-live="polite"></p>

            <label for="email">Email <span class="required">*</span></label>
            <input type="email" id="email" name="email" autocomplete="email" placeholder="nadia@example.com" required>
            <p id="emailFeedback" class="feedback" aria-live="polite"></p>

            <label for="number">Nomor <span class="required">*</span></label>
            <input type="number" id="number" name="number" autocomplete="number" placeholder="+6283812345678" required>
            <p id="numberFeedback" class="feedback" aria-live="polite"></p>

            <label for="nik">NIK <span class="required">*</span></label>
            <input type="text" id="nik" name="nik" autocomplete="off" inputmode="numeric" maxlength="16" pattern="\d{16}" placeholder="16 digit NIK" required>
            <p id="nikFeedback" class="feedback" aria-live="polite"></p>

            <label for="address">Alamat <span class="required">*</span></label>
            <textarea id="address" name="address" autocomplete="Alamat" rows="3" placeholder="Jalan, RT/RW, kelurahan, kecamatan" required></textarea>
            <p id="addressFeedback" class="feedback" aria-live="polite"></p>

            <label for="province">Provinsi <span class="required">*</span></label>
            <select id="province" name="province" autocomplete="address-level1" required>
            <option value="">Pilih provinsi</option>
            <option value="DKI Jakarta">DKI Jakarta</option>
            <option value="Jawa Barat">Jawa Barat</option>
            <option value="Banten">Banten</option>
            <option value="Jawa Tengah">Jawa Tengah</option>
            <option value="Jawa Timur">Jawa Timur</option>
            <option value="Sumatera Utara">Sumatera Utara</option>
            <option value="Kalimantan Timur">Kalimantan Timur</option>
            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
            <option value="Bali">Bali</option>
            </select>
            <p id="provinceFeedback" class="feedback" aria-live="polite"></p>

            <label for="city">Kota/Kabupaten <span class="required">*</span></label>
            <select id="city" name="city" autocomplete="address-level2" required>
            <option value="">Pilih kota/kabupaten</option>
            <option value="Jakarta Pusat">Jakarta Pusat</option>
            <option value="Jakarta Utara">Jakarta Utara</option>
            <option value="Jakarta Barat">Jakarta Barat</option>
            <option value="Jakarta Selatan">Jakarta Selatan</option>
            <option value="Jakarta Timur">Jakarta Timur</option>

            <option value="Bandung">Bandung</option>
            <option value="Bogor">Bogor</option>
            <option value="Depok">Depok</option>
            <option value="Bekasi">Bekasi</option>
            <option value="Cirebon">Cirebon</option>

            <option value="Tangerang">Tangerang</option>
            <option value="Tangerang Selatan">Tangerang Selatan</option>
            <option value="Serang">Serang</option>
            <option value="Cilegon">Cilegon</option>

            <option value="Semarang">Semarang</option>
            <option value="Surakarta">Surakarta</option>
            <option value="Salatiga">Salatiga</option>
            <option value="Tegal">Tegal</option>

            <option value="Surabaya">Surabaya</option>
            <option value="Malang">Malang</option>
            <option value="Sidoarjo">Sidoarjo</option>
            <option value="Kediri">Kediri</option>

            <option value="Medan">Medan</option>
            <option value="Binjai">Binjai</option>
            <option value="Pematangsiantar">Pematangsiantar</option>

            <option value="Samarinda">Samarinda</option>
            <option value="Balikpapan">Balikpapan</option>
            <option value="Bontang">Bontang</option>

            <option value="Makassar">Makassar</option>
            <option value="Parepare">Parepare</option>
            <option value="Gowa">Gowa</option>

            <option value="Denpasar">Denpasar</option>
            <option value="Badung">Badung</option>
            <option value="Gianyar">Gianyar</option>
            </select>
            <p id="cityFeedback" class="feedback" aria-live="polite"></p>

            <label for="postal_code">Kode POS <span class="required">*</span></label>
            <input type="text" id="postal_code" name="postal_code" autocomplete="postal-code" inputmode="numeric" maxlength="5" placeholder="12345" required>
            <p id="postalCodeFeedback" class="feedback" aria-live="polite"></p>

            <label for="birth_place">Tempat Lahir <span class="required">*</span></label>
            <input type="text" id="birth_place" name="birth_place" autocomplete="off" placeholder="Contoh: Cirebon" required>
            <p id="birthPlaceFeedback" class="feedback" aria-live="polite"></p>

            <label for="birth_date">Tanggal Lahir <span class="required">*</span></label>
            <input type="date" id="birth_date" name="birth_date" autocomplete="bday" required>
            <p id="birthDateFeedback" class="feedback" aria-live="polite"></p>

            <label for="parent_name">Nama Orang Tua <span class="required">*</span></label>
            <input type="text" id="parent_name" name="parent_name" autocomplete="off" placeholder="Nama lengkap orang tua" required>
            <p id="parentNameFeedback" class="feedback" aria-live="polite"></p>
            <div class="row">
                <button type="submit" class="primary">Submit Customer</button>
                <button type="reset" class="secondary">Reset Form</button>
            </div>
            <p id="formMessage" class="status muted" aria-live="polite"></p>
        </form>
    </section>

    <section class="card">
        <h2>Yang perlu diamati</h2>
        <ul>
            <li>Klik tombol petunjuk: halaman berubah tanpa request baru.</li>
            <li>Ketik pada input: pesan berubah ketika event <code>input</code> terjadi.</li>
            <li>Kirim form yang valid: browser mengirim POST ke <code>submit.php</code>.</li>
            <li>Buka Console untuk melihat pesan dari <code>console.log()</code>.</li>
        </ul>
    </section>

    <footer>Demo lokal untuk belajar JavaScript, DOM, event, dan validasi.</footer>
</main>
</body>
</html>