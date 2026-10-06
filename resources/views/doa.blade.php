<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kumpulan Doa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Cormorant+Garamond:wght@500;600;700&family=Jost:wght@400;500&display=swap" rel="stylesheet">
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
            padding: 4.5rem 1.5rem 2.5rem;
        }

        .hero h1 {
            font-family: 'Amiri', serif;
            font-size: clamp(3.5rem, 11vw, 6rem);
            font-weight: 700;
            line-height: 1.3;
            background: linear-gradient(180deg, #f5e3a8 0%, #c9a24b 55%, #8f6e22 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .subtitle {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.25rem, 3vw, 1.6rem);
            font-weight: 500;
            letter-spacing: .12em;
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

        .search {
            display: block;
            width: min(100% - 3rem, 460px);
            margin: 2.5rem auto 0;
            padding: .9rem 1.4rem;
            font: inherit;
            color: var(--ivory);
            text-align: center;
            background: rgba(6, 37, 29, .7);
            border: 1px solid rgba(201, 162, 75, .45);
            border-radius: 999px;
        }
        .search::placeholder { color: var(--ivory-dim); }
        .search:focus-visible {
            outline: 2px solid var(--gold-light);
            outline-offset: 3px;
        }

        /* ---------- Daftar doa ---------- */
        .list {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.1rem;
            max-width: 1180px;
            margin: 0 auto;
            padding: 2.5rem 1.5rem 5rem;
        }

        .doa {
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
        .doa::before {
            content: '';
            position: absolute;
            inset: 4px;
            border: 1px solid rgba(201, 162, 75, .12);
            border-radius: 3px;
            pointer-events: none;
        }
        .doa:hover,
        .doa:focus-within {
            border-color: var(--gold);
            background: linear-gradient(135deg, rgba(18, 86, 67, .8), rgba(6, 37, 29, .9));
        }
        .doa[hidden] { display: none; }

        .num {
            position: relative;
            flex: none;
            width: 54px; height: 54px;
            display: grid;
            place-items: center;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.2rem;
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

        .info { flex: 1; min-width: 0; }

        .nama {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.3rem;
            font-weight: 600;
            line-height: 1.25;
        }

        .grup {
            display: inline-block;
            margin-top: .4rem;
            padding: .15rem .65rem;
            font-size: .8rem;
            color: var(--gold-light);
            border: 1px solid rgba(201, 162, 75, .4);
            border-radius: 999px;
        }

        .link {
            display: block;
            margin-top: .55rem;
            font-size: .88rem;
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
        <h1>الدعاء</h1>
        <p class="subtitle">Kumpulan Doa</p>
        <div class="divider"><i></i></div>

        <input class="search" type="search" id="search"
               placeholder="Cari doa atau jenis doa…" aria-label="Cari doa" autocomplete="off">
    </header>

    <main>
        <ul class="list" id="list">
            @foreach ($doa as $item)
                <li class="doa" data-name="{{ mb_strtolower($item['nama'] . ' ' . $item['grup']) }}">
                    <div class="num"><span>{{ $item['id'] }}</span></div>

                    <div class="info">
                        <p class="nama">{{ $item['nama'] }}</p>
                        <span class="grup">{{ $item['grup'] }}</span>
                        <a class="link" href="{{ route('doa.show', $item['id']) }}">
                            Lihat detail doa
                        </a>
                    </div>
                </li>
            @endforeach
            <li class="empty" id="empty" hidden>Doa tidak ditemukan. Coba kata kunci lain.</li>
        </ul>
    </main>

    <script>
        const input = document.getElementById('search');
        const items = document.querySelectorAll('.doa');
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