<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Shalat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Cormorant+Garamond:wght@500;600;700&family=Jost:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --emerald-deep: #06251d;
            --emerald: #0b3d30;
            --emerald-soft: rgba(18, 86, 67, 0.35);
            --gold: #c9a24b;
            --gold-light: #e8cf8f;
            --ivory: #f3ecd9;
            --ivory-dim: #b9b6a4;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            font-family: 'Jost', system-ui, sans-serif;
            color: var(--ivory);
            background-color: var(--emerald-deep);
            background-image:
                radial-gradient(ellipse at top, #0f4a3a 0%, transparent 60%),
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='none' stroke='%23c9a24b' stroke-opacity='.10' stroke-width='1'%3E%3Crect x='20' y='20' width='40' height='40'/%3E%3Crect x='20' y='20' width='40' height='40' transform='rotate(45 40 40)'/%3E%3C/g%3E%3C/svg%3E");
        }

        /* ---------- Header ---------- */
        .hero {
            text-align: center;
            padding: 3.5rem 1.5rem 2rem;
        }

        .bismillah {
            font-family: 'Amiri', serif;
            font-size: clamp(1.5rem, 4vw, 2rem);
            color: var(--gold-light);
            margin-bottom: 1.25rem;
        }

        .hero h1 {
            font-family: 'Amiri', serif;
            font-size: clamp(2.5rem, 8vw, 4.5rem);
            font-weight: 700;
            line-height: 1.15;
            background: linear-gradient(180deg, #f5e3a8 0%, #c9a24b 55%, #8f6e22 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero .subtitle {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.25rem, 3vw, 1.6rem);
            font-weight: 500;
            letter-spacing: .12em;
            color: var(--ivory);
            margin-top: .25rem;
        }

        .divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin: 1.5rem auto 0;
            max-width: 360px;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold));
        }
        .divider::after { transform: scaleX(-1); }
        .divider i {
            width: 12px; height: 12px;
            border: 1px solid var(--gold);
            transform: rotate(45deg);
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 1.5rem 1.5rem 4rem;
        }

        /* ---------- Filter Form ---------- */
        .filter-card {
            background: linear-gradient(135deg, rgba(18, 86, 67, .55), rgba(6, 37, 29, .85));
            border: 1px solid rgba(201, 162, 75, .3);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        }

        .filter-form {
            display: flex;
            flex-wrap: wrap;
            gap: 1.25rem;
            align-items: flex-end;
        }

        .form-group {
            flex: 1;
            min-width: 220px;
        }

        .form-group label {
            display: block;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.15rem;
            color: var(--gold-light);
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            font: inherit;
            color: var(--ivory);
            background: rgba(6, 37, 29, 0.8);
            border: 1px solid rgba(201, 162, 75, 0.4);
            border-radius: 6px;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: var(--gold-light);
        }

        .btn-submit {
            padding: 0.75rem 1.75rem;
            font: inherit;
            font-weight: 600;
            color: var(--emerald-deep);
            background: linear-gradient(180deg, #f5e3a8 0%, #c9a24b 100%);
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .btn-submit:hover {
            opacity: 0.9;
        }

        /* ---------- Hari Ini Banner ---------- */
        .today-banner {
            background: linear-gradient(135deg, rgba(201, 162, 75, 0.15), rgba(11, 61, 48, 0.8));
            border: 1px solid var(--gold);
            border-radius: 8px;
            padding: 1.75rem;
            margin-bottom: 2.5rem;
            text-align: center;
            position: relative;
        }

        .today-banner h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            color: var(--gold-light);
            margin-bottom: 1.25rem;
        }

        .today-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
            gap: 1rem;
        }

        .today-item {
            background: rgba(6, 37, 29, 0.6);
            border: 1px solid rgba(201, 162, 75, 0.25);
            border-radius: 6px;
            padding: 0.85rem 0.5rem;
        }

        .today-item .label {
            font-size: 0.9rem;
            color: var(--ivory-dim);
            text-transform: capitalize;
            margin-bottom: 0.35rem;
        }

        .today-item .time {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--gold-light);
        }

        /* ---------- Tabel Month ---------- */
        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.75rem;
            color: var(--gold-light);
            margin-bottom: 1rem;
        }

        .table-container {
            overflow-x: auto;
            background: linear-gradient(135deg, rgba(18, 86, 67, .4), rgba(6, 37, 29, .8));
            border: 1px solid rgba(201, 162, 75, .25);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 0.9rem 1rem;
            border-bottom: 1px solid rgba(201, 162, 75, 0.15);
        }

        th {
            background: rgba(6, 37, 29, 0.9);
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.15rem;
            color: var(--gold-light);
        }

        tr:hover {
            background: rgba(201, 162, 75, 0.08);
        }

        tr.active-day {
            background: rgba(201, 162, 75, 0.2);
            font-weight: 600;
        }

        @media (max-width: 600px) {
            .filter-form {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>
<body>

    <header class="hero">
        <p class="bismillah">بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ</p>
        <h1>مواقيت الصلاة</h1>
        <p class="subtitle">Jadwal Shalat {{ $kabkota ?? '' }}</p>
        <div class="divider"><i></i></div>
    </header>

    <main class="container">
        <!-- Filter Lokasi -->
        <div class="filter-card">
            <form action="{{ route('jadwal.index') }}" method="GET" class="filter-form">
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <select name="provinsi" id="provinsi" class="form-control" onchange="this.form.submit()">
                        @if($daftarProvinsi)
                            @foreach($daftarProvinsi as $prov)
                                <option value="{{ $prov }}" {{ $provinsi == $prov ? 'selected' : '' }}>
                                    {{ $prov }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="kabkota">Kabupaten / Kota</label>
                    <select name="kabkota" id="kabkota" class="form-control">
                        @if($daftarKabkota)
                            @foreach($daftarKabkota as $kab)
                                <option value="{{ $kab }}" {{ $kabkota == $kab ? 'selected' : '' }}>
                                    {{ $kab }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <button type="submit" class="btn-submit">Tampilkan Jadwal</button>
            </form>
        </div>

        @if($hariIni)
            <!-- Banner Hari Ini -->
            <section class="today-banner">
                <h2>Jadwal Shalat Hari Ini (TGL {{ $hariIni['tanggal'] }})</h2>
                <div class="today-grid">
                    <div class="today-item">
                        <div class="label">Imsak</div>
                        <div class="time">{{ $hariIni['imsak'] }}</div>
                    </div>
                    <div class="today-item">
                        <div class="label">Subuh</div>
                        <div class="time">{{ $hariIni['subuh'] }}</div>
                    </div>
                    <div class="today-item">
                        <div class="label">Terbit</div>
                        <div class="time">{{ $hariIni['terbit'] }}</div>
                    </div>
                    <div class="today-item">
                        <div class="label">Dhuha</div>
                        <div class="time">{{ $hariIni['dhuha'] }}</div>
                    </div>
                    <div class="today-item">
                        <div class="label">Dzuhur</div>
                        <div class="time">{{ $hariIni['dzuhur'] }}</div>
                    </div>
                    <div class="today-item">
                        <div class="label">Ashar</div>
                        <div class="time">{{ $hariIni['ashar'] }}</div>
                    </div>
                    <div class="today-item">
                        <div class="label">Maghrib</div>
                        <div class="time">{{ $hariIni['maghrib'] }}</div>
                    </div>
                    <div class="today-item">
                        <div class="label">Isya</div>
                        <div class="time">{{ $hariIni['isya'] }}</div>
                    </div>
                </div>
            </section>
        @endif

        @if($data && isset($data['jadwal']))
            <!-- Tabel Jadwal Bulanan -->
            <h2 class="section-title">Jadwal Sebulan ({{ $data['kabkota'] ?? $kabkota }})</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Tgl</th>
                            <th>Hari</th>
                            <th>Imsak</th>
                            <th>Subuh</th>
                            <th>Terbit</th>
                            <th>Dhuha</th>
                            <th>Dzuhur</th>
                            <th>Ashar</th>
                            <th>Maghrib</th>
                            <th>Isya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['jadwal'] as $j)
                            <tr class="{{ isset($hariIni['tanggal']) && $j['tanggal'] == $hariIni['tanggal'] ? 'active-day' : '' }}">
                                <td>{{ $j['tanggal'] }}</td>
                                <td>{{ $j['hari'] ?? '-' }}</td>
                                <td>{{ $j['imsak'] }}</td>
                                <td>{{ $j['subuh'] }}</td>
                                <td>{{ $j['terbit'] }}</td>
                                <td>{{ $j['dhuha'] }}</td>
                                <td>{{ $j['dzuhur'] }}</td>
                                <td>{{ $j['ashar'] }}</td>
                                <td>{{ $j['maghrib'] }}</td>
                                <td>{{ $j['isya'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div style="text-align: center; padding: 2rem; color: var(--ivory-dim);">
                <p>Data jadwal shalat tidak ditemukan atau gagal dimuat.</p>
            </div>
        @endif
    </main>

</body>
</html>
