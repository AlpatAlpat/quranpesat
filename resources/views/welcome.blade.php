<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote App</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,500;1,300;1,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --night: #141a33;      /* langit malam */
            --dusk: #2b2f55;       /* senja di cakrawala */
            --moon: #e8e6f2;       /* cahaya bulan */
            --mist: #a3a6c7;       /* kabut tipis */
            --ember: #c9a7a0;      /* semburat fajar */
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        html, body { min-height: 100%; }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 4rem 1.75rem;
            background: linear-gradient(180deg, var(--night) 0%, var(--dusk) 100%);
            color: var(--moon);
            font-family: "Cormorant Garamond", Georgia, "Times New Roman", serif;
            text-align: center;
            overflow-x: hidden;
        }

        /* Bulan: satu-satunya ornamen di halaman */
        .moon {
            position: fixed;
            top: 2.5rem;
            right: 12%;
            width: 3.2rem;
            height: 3.2rem;
            border-radius: 50%;
            background: var(--moon);
            box-shadow: 0 0 60px 14px rgba(232, 230, 242, 0.18);
            opacity: 0.85;
        }

        .moon::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: var(--night);
            transform: translate(0.9rem, -0.35rem);
            clip-path: circle(50% at 40% 50%);
            opacity: 0.0;
        }

        header { margin-bottom: 4.5rem; }

        header h1 {
            font-weight: 300;
            font-size: 1.15rem;
            letter-spacing: 0.18em;
            color: var(--mist);
        }

        header p {
            margin-top: 0.6rem;
            font-style: italic;
            font-weight: 300;
            font-size: 1.05rem;
            color: var(--mist);
            opacity: 0.8;
        }

        figure { max-width: 34rem; }

        blockquote {
            font-style: italic;
            font-weight: 300;
            font-size: clamp(1.9rem, 5.2vw, 3.1rem);
            line-height: 1.4;
            color: var(--moon);
            text-wrap: balance;
            animation: surface 3.6s cubic-bezier(.2, .6, .2, 1) 0.4s both;
        }

        blockquote::before { content: "\201C"; margin-right: 0.08em; color: var(--ember); }
        blockquote::after  { content: "\201D"; margin-left: 0.04em;  color: var(--ember); }

        figcaption {
            margin-top: 2.75rem;
            font-size: 1.2rem;
            font-weight: 400;
            color: var(--ember);
            animation: surface 3s ease-out 1s both;
        }

        figcaption::before {
            content: "";
            display: block;
            width: 2.5rem;
            height: 1px;
            margin: 0 auto 1.25rem;
            background: var(--mist);
            opacity: 0.1;
        }

        /* Satu momen: kata-kata muncul perlahan dari kabut */
        @keyframes surface {
            from { opacity: 0; filter: blur(10px); transform: translateY(0.6rem); letter-spacing: 0.06em; }
            to   { opacity: 1; filter: blur(0);    transform: none;               letter-spacing: normal; }
        }

        @media (max-width: 600px) {
            .moon { right: 1.5rem; top: 1.5rem; width: 2.4rem; height: 2.4rem; }
            header { margin-bottom: 3rem; }
        }

        @media (prefers-reduced-motion: reduce) {
            blockquote, figcaption { animation: none; }
        }
    </style>
</head>
<body>
    <div class="moon" aria-hidden="true"></div>

    <header>
        <h1>welcome to quote app</h1>
        <p>here are some quotes:</p>
    </header>

    <main>
        <figure>
            <blockquote>{{ $quotes['quote'] }}</blockquote>
            <figcaption>{{ $quotes['author'] }}</figcaption>
        </figure>
    </main>
</body>
</html>