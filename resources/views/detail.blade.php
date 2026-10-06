<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quran['namaLatin'] }} - Al-Qur'an Pesat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Cormorant+Garamond:wght@500;600;700&family=Jost:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --emerald-deep: #06251d;
            --emerald: #0b3d30;
            --gold: #c9a24b;
            --gold-light: #e8cf8f;
            --ivory: #f3ecd9;
            --ivory-dim: #b9b6a4;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            min-height: 100vh;
            font-family: 'Jost', system-ui, sans-serif;
            color: var(--ivory);
            background-color: var(--emerald-deep);
            background-image:
                radial-gradient(ellipse at top, #0f4a3a 0%, transparent 60%),
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='none' stroke='%23c9a24b' stroke-opacity='.10' stroke-width='1'%3E%3Crect x='20' y='20' width='40' height='40'/%3E%3Crect x='20' y='20' width='40' height='40' transform='rotate(45 40 40)'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
        }

        .wrap {
            width: min(100% - 2rem, 820px);
            margin: 0 auto;
        }

        /* ---------- Header ---------- */
        .hero {
            text-align: center;
            padding: 2rem 0 2.5rem;
        }

        .back {
            display: inline-block;
            font-size: .9rem;
            color: var(--gold);
            text-decoration: none;
            padding: .4rem .2rem;
        }
        .back:hover { color: var(--gold-light); }
        .back:focus-visible,
        .to-top:focus-visible {
            outline: 2px solid var(--gold-light);
            outline-offset: 4px;
        }

        .bismillah {
            font-family: 'Amiri', serif;
            font-size: clamp(1.4rem, 4vw, 1.8rem);
            color: var(--gold-light);
            margin-top: 2rem;
        }

        .hero h1 {
            font-family: 'Amiri', serif;
            font-size: clamp(3.5rem, 12vw, 6rem);
            font-weight: 700;
            line-height: 1.3;
            margin-top: .5rem;
            background: linear-gradient(180deg, #f5e3a8 0%, #c9a24b 55%, #8f6e22 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .latin-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.4rem, 4vw, 1.9rem);
            font-weight: 600;
            letter-spacing: .06em;
        }

        .meta {
            margin-top: .35rem;
            color: var(--ivory-dim);
            font-size: .95rem;
        }

        .divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin: 1.5rem auto;
            max-width: 340px;
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

        /* ---------- Audio ---------- */
        audio {
            display: block;
            width: 100%;
            height: 40px;
            color-scheme: dark;
        }

        .player-full {
            position: relative;
            max-width: 520px;
            margin: 0 auto;
            padding: 1rem 1.2rem 1.1rem;
            background: linear-gradient(135deg, rgba(18, 86, 67, .55), rgba(6, 37, 29, .85));
            border: 1px solid rgba(201, 162, 75, .35);
            border-radius: 6px;
            text-align: left;
        }
        .player-full::before {
            content: '';
            position: absolute;
            inset: 4px;
            border: 1px solid rgba(201, 162, 75, .12);
            border-radius: 3px;
            pointer-events: none;
        }
        .player-full p {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--gold-light);
            margin-bottom: .6rem;
        }

        /* ---------- Ayat ---------- */
        .ayat-list {
            list-style: none;
            padding-bottom: 5rem;
        }

        .ayat {
            padding: 2rem .25rem 1.75rem;
            border-bottom: 1px solid rgba(201, 162, 75, .22);
        }
        .ayat:last-child { border-bottom: 0; }

        .ayat-head {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            margin-bottom: 1.25rem;
        }

        .num {
            position: relative;
            flex: none;
            width: 48px; height: 48px;
            display: grid;
            place-items: center;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--gold-light);
        }
        .num::before,
        .num::after {
            content: '';
            position: absolute;
            inset: 8px;
            border: 1px solid var(--gold);
        }
        .num::after { transform: rotate(45deg); }
        .num span { position: relative; z-index: 1; }

        .ayat-head::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, rgba(201, 162, 75, .5), transparent);
        }

        .arab {
            font-family: 'Amiri', serif;
            font-size: clamp(1.9rem, 5.5vw, 2.6rem);
            font-weight: 400;
            line-height: 2.15;
            color: var(--ivory);
            text-align: right;
        }

        .latin {
            margin-top: .9rem;
            font-family: 'Amiri', serif;
            font-style: italic;
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--gold-light);
            max-width: 70ch;
        }

        .arti {
            margin-top: .6rem;
            line-height: 1.75;
            color: var(--ivory-dim);
            max-width: 70ch;
        }

        .ayat audio {
            margin-top: 1.25rem;
            max-width: 420px;
        }

        .to-top {
            position: fixed;
            right: 1.25rem;
            bottom: 1.25rem;
            width: 44px; height: 44px;
            display: grid;
            place-items: center;
            color: var(--gold-light);
            text-decoration: none;
            font-size: 1.2rem;
            background: rgba(6, 37, 29, .92);
            border: 1px solid var(--gold);
            border-radius: 50%;
        }

        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
        }
    </style>
</head>
<body>
    <div class="wrap" id="atas">

        <header class="hero">
            <a class="back" href="{{ url('/') }}">&larr; Daftar surat</a>

            <p class="bismillah">بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ</p>
            <h1 lang="ar">{{ $quran['nama'] }}</h1>
            <p class="latin-title">{{ $quran['namaLatin'] }}</p>
            <p class="meta">
                Surat ke-{{ $quran['nomor'] }}
                @isset($quran['arti']) &mdash; {{ $quran['arti'] }} @endisset
                @isset($quran['jumlahAyat']) &mdash; {{ $quran['jumlahAyat'] }} ayat @endisset
            </p>

            <div class="divider"><i></i></div>

            <div class="player-full">
                <p>Dengarkan surat lengkap</p>
                <audio src="{{ $quran['audioFull']['02'] }}" controls preload="none" type="audio/mpeg"></audio>
            </div>
        </header>

        <main>
            <ol class="ayat-list">
                @foreach ($quran['ayat'] as $ayat)
                    <li class="ayat" id="ayat-{{ $ayat['nomorAyat'] }}">
                        <div class="ayat-head">
                            <div class="num" title="Ayat {{ $ayat['nomorAyat'] }}"><span>{{ $ayat['nomorAyat'] }}</span></div>
                        </div>

                        <p class="arab" lang="ar" dir="rtl">{{ $ayat['teksArab'] }}</p>
                        <p class="latin">{{ $ayat['teksLatin'] }}</p>
                        @isset($ayat['teksIndonesia'])
                            <p class="arti">{{ $ayat['teksIndonesia'] }}</p>
                        @endisset

                        <audio src="{{ $ayat['audio']['02'] }}" controls preload="none" type="audio/mpeg"></audio>
                    </li>
                @endforeach
            </ol>
        </main>
    </div>

    <a class="to-top" href="#atas" aria-label="Kembali ke atas">&uarr;</a>
</body>
</html>