<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al-Qur'an Pesat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Cormorant+Garamond:wght@500;600;700&family=Jost:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --emerald-deep: #06251d;
            --emerald: #0b3d30;
            --emerald-soft: #12564334;
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
            /* pola geometris islami (bintang segi delapan) */
            background-image:
                radial-gradient(ellipse at top, #0f4a3a 0%, transparent 60%),
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='none' stroke='%23c9a24b' stroke-opacity='.10' stroke-width='1'%3E%3Crect x='20' y='20' width='40' height='40'/%3E%3Crect x='20' y='20' width='40' height='40' transform='rotate(45 40 40)'/%3E%3C/g%3E%3C/svg%3E");
        }

        /* ---------- Header ---------- */
        .hero {
            text-align: center;
            padding: 4.5rem 1.5rem 3rem;
        }

        .bismillah {
            font-family: 'Amiri', serif;
            font-size: clamp(1.5rem, 4vw, 2rem);
            color: var(--gold-light);
            margin-bottom: 1.5rem;
        }

        .hero h1 {
            font-family: 'Amiri', serif;
            font-size: clamp(3.5rem, 11vw, 6.5rem);
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
            margin: 1.75rem auto 0;
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

        /* ---------- Pencarian ---------- */
        .search {
            display: block;
            width: min(100% - 3rem, 460px);
            margin: 2.5rem auto 0;
            padding: .9rem 1.4rem;
            font: inherit;
            color: var(--ivory);
            background: rgba(6, 37, 29, .7);
            border: 1px solid rgba(201, 162, 75, .45);
            border-radius: 999px;
            text-align: center;
        }
        .search::placeholder { color: var(--ivory-dim); }
        .search:focus-visible {
            outline: 2px solid var(--gold-light);
            outline-offset: 3px;
        }

        /* ---------- Daftar surat ---------- */
        .list {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
            gap: 1.1rem;
            max-width: 1180px;
            margin: 0 auto;
            padding: 3rem 1.5rem 5rem;
        }

        .surah {
            position: relative;
            display: flex;
            align-items: center;
            gap: 1.1rem;
            padding: 1.1rem 1.3rem;
            background: linear-gradient(135deg, rgba(18, 86, 67, .55), rgba(6, 37, 29, .85));
            border: 1px solid rgba(201, 162, 75, .28);
            border-radius: 6px;
            transition: border-color .2s, background .2s;
        }
        /* bingkai emas bagian dalam */
        .surah::before {
            content: '';
            position: absolute;
            inset: 4px;
            border: 1px solid rgba(201, 162, 75, .12);
            border-radius: 3px;
            pointer-events: none;
        }
        .surah:hover,
        .surah:focus-within {
            border-color: var(--gold);
            background: linear-gradient(135deg, rgba(18, 86, 67, .8), rgba(6, 37, 29, .9));
        }

        /* nomor dalam bintang (dua persegi, diputar 45°) */
        .num {
            position: relative;
            flex: none;
            width: 54px; height: 54px;
            display: grid;
            place-items: center;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--gold-light);
        }
        .num::before,
        .num::after {
            content: '';
            position: absolute;
            inset: 9px;
            border: 1px solid var(--gold);
        }
        .num::after { transform: rotate(45deg); }
        .num span { position: relative; z-index: 1; }

        .names { flex: 1; min-width: 0; }

        .latin {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.35rem;
            font-weight: 600;
            line-height: 1.2;
        }

        .link {
            display: inline-block;
            margin-top: .25rem;
            font-size: .85rem;
            color: var(--gold);
            text-decoration: none;
        }
        /* seluruh kartu bisa diklik */
        .link::after {
            content: '';
            position: absolute;
            inset: 0;
        }
        .link:focus-visible {
            outline: 2px solid var(--gold-light);
            outline-offset: 4px;
        }

        .arab {
            font-family: 'Amiri', serif;
            font-size: 1.9rem;
            line-height: 1.4;
            color: var(--gold-light);
            text-align: right;
        }

        .empty {
            grid-column: 1 / -1;
            text-align: center;
            color: var(--ivory-dim);
            padding: 2rem 0;
        }

        @media (max-width: 480px) {
            .hero { padding-top: 3rem; }
            .list { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <header class="hero">
        <p class="bismillah">بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ</p>
        <h1>القرآن الكريم</h1>
        <p class="subtitle">Al-Qur'an Pesat</p>
        <div class="divider"><i></i></div>

        <input class="search" type="search" id="search"
               placeholder="Cari nama surat…" aria-label="Cari nama surat" autocomplete="off">
    </header>

    <main>
        <ul class="list" id="list">
            @foreach ($quran as $surat)
                <li class="surah" data-name="{{ strtolower($surat['namaLatin']) }}">
                    <div class="num"><span>{{ $surat['nomor'] }}</span></div>

                    <div class="names">
                        <p class="latin">{{ $surat['namaLatin'] }}</p>
                        <a class="link" href="{{ route('quran.show', $surat['nomor']) }}">
                            Baca surat {{ $surat['namaLatin'] }}
                        </a>
                    </div>

                    <p class="arab" lang="ar" dir="rtl">{{ $surat['nama'] }}</p>
                </li>
            @endforeach
            <li class="empty" id="empty" hidden>Surat tidak ditemukan. Coba ejaan lain.</li>
        </ul>
    </main>

    <script>
        const input = document.getElementById('search');
        const items = document.querySelectorAll('.surah');
        const empty = document.getElementById('empty');

        input.addEventListener('input', () => {
            const q = input.value.trim().toLowerCase();
            let shown = 0;
            items.forEach(el => {
                const match = el.dataset.name.includes(q);
                el.hidden = !match;
                if (match) shown++;
            });
            empty.hidden = shown !== 0;
        });
    </script>
</body>
</html>