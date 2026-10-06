<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $doa['nama'] }} - Kumpulan Doa</title>
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
            width: min(100% - 2rem, 760px);
            margin: 0 auto;
            padding: 2rem 0 5rem;
        }

        .back {
            display: inline-block;
            font-size: .9rem;
            color: var(--gold);
            text-decoration: none;
            padding: .4rem .2rem;
        }
        .back:hover { color: var(--gold-light); }
        .back:focus-visible {
            outline: 2px solid var(--gold-light);
            outline-offset: 4px;
        }

        /* ---------- Judul ---------- */
        .head {
            text-align: center;
            padding: 2.5rem 0 1rem;
        }

        .head h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2rem, 6vw, 3rem);
            font-weight: 700;
            line-height: 1.2;
            background: linear-gradient(180deg, #f5e3a8 0%, #c9a24b 60%, #8f6e22 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .grup {
            display: inline-block;
            margin-top: 1rem;
            padding: .2rem .85rem;
            font-size: .85rem;
            color: var(--gold-light);
            border: 1px solid rgba(201, 162, 75, .4);
            border-radius: 999px;
        }

        .divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin: 1.75rem auto 0;
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

        /* ---------- Isi doa ---------- */
        .card {
            position: relative;
            margin-top: 2rem;
            padding: 2.5rem 2rem;
            background: linear-gradient(135deg, rgba(18, 86, 67, .55), rgba(6, 37, 29, .85));
            border: 1px solid rgba(201, 162, 75, .35);
            border-radius: 6px;
        }
        .card::before {
            content: '';
            position: absolute;
            inset: 5px;
            border: 1px solid rgba(201, 162, 75, .14);
            border-radius: 3px;
            pointer-events: none;
        }

        .arab {
            font-family: 'Amiri', serif;
            font-size: clamp(2rem, 6vw, 2.9rem);
            line-height: 2.2;
            text-align: right;
            color: var(--ivory);
        }

        .section {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(201, 162, 75, .22);
        }

        .section h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--gold);
            margin-bottom: .5rem;
        }

        .latin {
            font-family: 'Amiri', serif;
            font-style: italic;
            font-size: 1.2rem;
            line-height: 1.9;
            color: var(--gold-light);
        }

        .arti {
            line-height: 1.8;
            color: var(--ivory);
        }

        @media (max-width: 480px) {
            .card { padding: 1.75rem 1.25rem; }
        }
    </style>
</head>
<body>
    <div class="wrap">
        <a class="back" href="{{ url('/doa') }}">&larr; Daftar doa</a>

        <header class="head">
            <h1>{{ $doa['nama'] }}</h1>
            <span class="grup">{{ $doa['grup'] }}</span>
            <div class="divider"><i></i></div>
        </header>

        <main class="card">
            <p class="arab" lang="ar" dir="rtl">{{ $doa['ar'] }}</p>

            <section class="section">
                <h2>Bacaan latin</h2>
                <p class="latin">{{ $doa['tr'] }}</p>
            </section>

            <section class="section">
                <h2>Artinya</h2>
                <p class="arti">{{ $doa['idn'] }}</p>
            </section>
        </main>
    </div>
</body>
</html>