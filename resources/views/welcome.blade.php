<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Edward Landung Pramudya - Web Developer specializing in high-performance IT tech">
    <title>Edward Landung Pramudya — Web Developer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500&family=Playfair+Display:wght@700;900&family=Caveat:wght@700&family=Permanent+Marker&family=Satisfy&family=Orbitron:wght@700&family=Bebas+Neue&family=Abril+Fatface&family=Righteous&family=Pacifico&family=Cinzel:wght@700&display=swap" rel="stylesheet">
    <style>
        /* ─── Design Tokens (Light) ─── */
        :root {
            --blue-50: #EFF6FF;
            --blue-100: #DBEAFE;
            --blue-200: #BFDBFE;
            --blue-500: #3B82F6;
            --blue-600: #2563EB;
            --blue-700: #1D4ED8;
            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-400: #9CA3AF;
            --gray-500: #6B7280;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-800: #1F2937;
            --gray-900: #111827;
            --gray-1000: #040508ff;

            --bg-body: #FFFFFF;
            --bg-half-body: #FFFFFF;
            --bg-card: #FFFFFF;
            --bg-alt: var(--gray-50);
            --bg-navbar: rgba(255,255,255,0.85);
            --border-color: var(--gray-200);
            --text-primary: var(--gray-900);
            --text-body: var(--gray-800);
            --text-muted: var(--gray-500);

            --circuit-color: rgba(59,130,246,0.08);
            --circuit-glow: rgba(59,130,246,0.25);
            --noise-opacity: 0.025;

            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.07), 0 2px 4px -2px rgba(0,0,0,0.05);
            --shadow-lg: 0 10px 25px -3px rgba(0,0,0,0.08), 0 4px 6px -4px rgba(0,0,0,0.04);
            --shadow-xl: 0 20px 50px -12px rgba(0,0,0,0.12);

            --transition-theme: background-color 0.4s ease, color 0.4s ease, border-color 0.4s ease, box-shadow 0.4s ease;
        }

        /* ─── Dark Theme Overrides ─── */
        [data-theme="dark"] {
            --gray-50: #1a1a2e;
            --gray-100: #16213e;
            --gray-200: #293548;
            --gray-300: #3b4a5e;
            --gray-400: #6B7280;
            --gray-500: #9CA3AF;
            --gray-600: #D1D5DB;
            --gray-700: #E5E7EB;
            --gray-800: #F3F4F6;
            --gray-900: #F9FAFB;
            --blue-50: rgba(59,130,246,0.08);
            --blue-100: rgba(59,130,246,0.15);
            --blue-200: rgba(59,130,246,0.25);

            --bg-body: #0d1117;
            --bg-card: #161b22;
            --bg-alt: #0d1117;
            --bg-navbar: rgba(13,17,23,0.9);
            --border-color: #21262d;
            --text-primary: #f0f6fc;
            --text-body: #c9d1d9;
            --text-muted: #8b949e;

            --circuit-color: rgba(59,130,246,0.12);
            --circuit-glow: rgba(59,130,246,0.5);
            --noise-opacity: 0.04;
        }

        /* ─── Reset & Base ─── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: var(--text-body);
            background-color: var(--bg-body);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            line-height: 1.6;
            transition: var(--transition-theme);
        }

        /* ─── Subtle noise texture ─── */
        body::before {
            content: '';
            position: fixed; inset: 0; z-index: -2;
            background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><filter id="n"><feTurbulence type="fractalNoise" baseFrequency="0.9" numOctaves="4" stitchTiles="stitch"/></filter><rect width="100%" height="100%" filter="url(%23n)" opacity="0.025"/></svg>');
            opacity: var(--noise-opacity);
            pointer-events: none;
        }

        /* ─── Circuit Trace Canvas (behind everything) ─── */
        #circuitCanvas {
            position: fixed; top: 0; left: 0;
            width: 100vw; height: 100vh;
            z-index: -1; pointer-events: none;
        }

        /* ─── Scrollbar ─── */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--bg-alt); }
        ::-webkit-scrollbar-thumb { background: var(--gray-300); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--gray-400); }

        /* ─── Layout ─── */
        .container { max-width: 1100px; margin: 0 auto; padding: 0 24px; }

        /* ─── Typography ─── */
        h1 { font-size: clamp(2.2rem, 5vw, 3.5rem); font-weight: 800; letter-spacing: -0.03em; line-height: 1.1; color: var(--text-primary); }
        h2 { font-size: clamp(1.6rem, 3vw, 2rem); font-weight: 700; letter-spacing: -0.02em; color: var(--text-primary); }
        h3 { font-size: 1.15rem; font-weight: 600; color: var(--text-primary); }
        p  { color: var(--text-muted); line-height: 1.7; }

        /* ─── Section ─── */
        section { padding: 100px 0; position: relative; transition: var(--transition-theme); }

        .section-label {
            display: inline-flex; align-items: center; gap: 8px;
            font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em;
            color: var(--blue-600); margin-bottom: 12px;
        }
        .section-label::before {
            content: ''; width: 20px; height: 2px; background: var(--blue-600); border-radius: 1px;
        }
        .section-heading { margin-bottom: 60px; }
        .section-heading h2 { color: var(--text-primary); }

        /* ─── Navbar ─── */
        .navbar {
            position: fixed; top: 0; left: 0; width: 100%; z-index: 1000;
            padding: 0 24px; height: 64px;
            display: flex; align-items: center; justify-content: center;
            background: var(--bg-navbar);
            backdrop-filter: saturate(180%) blur(16px);
            -webkit-backdrop-filter: saturate(180%) blur(16px);
            border-bottom: 1px solid var(--border-color);
            transition: var(--transition-theme), box-shadow 0.3s;
        }
        .navbar.scrolled { box-shadow: var(--shadow-md); }
        .nav-inner {
            max-width: 1100px; width: 100%;
            display: flex; align-items: center; justify-content: space-between;
        }
        .nav-brand { font-weight: 800; font-size: 18px; color: var(--text-primary); text-decoration: none; letter-spacing: -0.02em; transition: var(--transition-theme); }
        .nav-brand span { color: var(--blue-600); }
        .nav-links { display: flex; gap: 32px; align-items: center; }
        .nav-links a {
            font-size: 14px; font-weight: 500; color: var(--text-muted);
            text-decoration: none; transition: color 0.25s; position: relative;
        }
        .nav-links a:hover { color: var(--text-primary); }
        .nav-links a::after {
            content: ''; position: absolute; bottom: -4px; left: 0; width: 0; height: 2px;
            background: var(--blue-600); border-radius: 1px; transition: width 0.25s;
        }
        .nav-links a:hover::after { width: 100%; }

        /* ─── Buttons ─── */
        .btn-primary {
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--blue-600); color: #FFF;
            padding: 14px 28px; border-radius: var(--radius-md);
            font-family: inherit; font-size: 15px; font-weight: 600;
            text-decoration: none; border: none; cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 1px 3px rgba(37,99,235,0.3), 0 4px 12px rgba(37,99,235,0.15);
        }
        .btn-primary:hover {
            background: var(--blue-700);
            transform: translateY(-1px);
            box-shadow: 0 2px 6px rgba(37,99,235,0.35), 0 8px 20px rgba(37,99,235,0.2);
        }
        .btn-outline {
            display: inline-flex; align-items: center; gap: 8px;
            background: transparent; color: var(--text-body);
            padding: 14px 28px; border-radius: var(--radius-md);
            font-family: inherit; font-size: 15px; font-weight: 600;
            text-decoration: none; border: 1.5px solid var(--border-color); cursor: pointer;
            transition: all 0.25s ease;
        }
        .btn-outline:hover {
            border-color: var(--blue-500); color: var(--blue-600);
            background: var(--blue-50);
        }

        /* ─── Card ─── */
        .card {
            background: var(--bg-card); border: 1px solid var(--border-color);
            border-radius: var(--radius-lg); padding: 32px;
            transition: all 0.3s ease;
        }
        .card:hover {
            border-color: var(--blue-200);
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
        }

        /* ─── Form ─── */
        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block; font-size: 13px; font-weight: 600; color: var(--text-body);
            margin-bottom: 6px;
        }
        .form-control {
            width: 100%; padding: 14px 16px;
            background: var(--bg-alt); border: 1.5px solid var(--border-color);
            border-radius: var(--radius-md);
            font-family: inherit; font-size: 15px; color: var(--text-body);
            transition: all 0.25s;
        }
        .form-control:focus {
            outline: none; border-color: var(--blue-500); background: var(--bg-card);
            box-shadow: 0 0 0 3px rgba(59,130,246,0.12);
        }
        textarea.form-control { resize: vertical; min-height: 120px; }

        /* ─── Eeveelution Sprites ─── */
        .eevee-sprite {
            width: 56px; height: 56px;
            image-rendering: pixelated;
            cursor: pointer;
            transition: transform 0.2s ease;
            animation: eeveeFloat 3s ease-in-out infinite;
            animation-delay: var(--d, 0s);
        }
        .eevee-sprite:hover { transform: scale(1.35) translateY(-6px) !important; }
        @keyframes eeveeFloat {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-6px); }
        }

        /* ─── Responsive ─── */
        @media (max-width: 768px) {
            section { padding: 70px 0; }
            .nav-links { gap: 16px; }
            .nav-links a { font-size: 13px; }
            .eevee-sprite { width: 40px; height: 40px; }
            .hero-actions { flex-direction: column; align-items: stretch; }
        }
        @media (max-width: 480px) {
            .nav-brand { font-size: 15px; }
            .nav-links { gap: 10px; }
            .nav-links a { font-size: 11px; }
        }

        /* ─── Scroll Reveal ─── */
        .reveal { opacity: 0; transform: translateY(30px); transition: opacity 0.7s ease, transform 0.7s ease; }
        .revealed { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body>
    {{-- Circuit Board Background Canvas --}}
    <canvas id="circuitCanvas"></canvas>

    @include('sections.navbar')
    @include('sections.hero')
    @include('sections.about')
    @include('sections.skills')
    @include('sections.projects')
    @include('sections.contact')
    @include('sections.footer')

    <script>
        /* ─── Theme Toggle ─── */
        function toggleTheme() {
            const html = document.documentElement;
            const current = html.getAttribute('data-theme');
            const next = current === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-theme', next);
            localStorage.setItem('theme', next);
            // Redraw circuit traces for new colors
            initCircuit();
        }
        // Apply saved theme on load
        (function() {
            const saved = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', saved);
        })();

        /* ─── Navbar scroll effect ─── */
        window.addEventListener('scroll', () => {
            document.querySelector('.navbar').classList.toggle('scrolled', window.scrollY > 10);
        });

        /* ─── Eeveelution Cry Audio ─── */
        function playCry(name) {
            const file = (name === 'eevee') ? 'eevee-starter' : name;
            const audio = new Audio(`https://play.pokemonshowdown.com/audio/cries/${file}.mp3`);
            audio.volume = 0.5;
            audio.play().catch(() => {});
        }

        /* ─── Scroll-reveal ─── */
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('revealed'); observer.unobserve(e.target); } });
        }, { threshold: 0.15 });
        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

        /* ─── Circuit Board / Motherboard Traces Canvas ─── */
        const canvas = document.getElementById('circuitCanvas');
        const ctx = canvas.getContext('2d');
        let traces = [];
        let particles = [];
        let animId;

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }

        function getCircuitColor() {
            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
            return {
                line: isDark ? 'rgba(59,130,246,0.12)' : 'rgba(59,130,246,0.06)',
                glow: isDark ? 'rgba(59,130,246,0.6)' : 'rgba(59,130,246,0.3)',
                dot: isDark ? 'rgba(59,130,246,0.3)' : 'rgba(59,130,246,0.12)',
                particle: isDark ? 'rgba(59,130,246,0.9)' : 'rgba(59,130,246,0.5)',
            };
        }

        function generateTraces() {
            traces = [];
            const w = canvas.width;
            const h = canvas.height;
            const count = Math.floor((w * h) / 40000); // density based on screen

            for (let i = 0; i < count; i++) {
                const segments = [];
                let x = Math.random() * w;
                let y = Math.random() * h;
                const numSeg = 3 + Math.floor(Math.random() * 6);

                for (let s = 0; s < numSeg; s++) {
                    const dir = Math.floor(Math.random() * 4); // 0=right, 1=down, 2=left, 3=up
                    const len = 30 + Math.random() * 120;
                    let nx = x, ny = y;

                    if (dir === 0) nx += len;
                    else if (dir === 1) ny += len;
                    else if (dir === 2) nx -= len;
                    else ny -= len;

                    segments.push({ x1: x, y1: y, x2: nx, y2: ny });
                    x = nx; y = ny;
                }
                traces.push(segments);
            }
        }

        function generateParticles() {
            particles = [];
            const count = Math.floor(traces.length * 0.4);
            for (let i = 0; i < count; i++) {
                const traceIdx = Math.floor(Math.random() * traces.length);
                const trace = traces[traceIdx];
                particles.push({
                    traceIdx,
                    segIdx: 0,
                    progress: 0,
                    speed: 0.005 + Math.random() * 0.015,
                });
            }
        }

        function drawCircuit() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            const colors = getCircuitColor();

            // Draw traces (static lines)
            ctx.lineWidth = 1;
            ctx.strokeStyle = colors.line;
            traces.forEach(segs => {
                ctx.beginPath();
                segs.forEach((s, i) => {
                    if (i === 0) ctx.moveTo(s.x1, s.y1);
                    ctx.lineTo(s.x2, s.y2);
                });
                ctx.stroke();

                // Draw junction dots
                ctx.fillStyle = colors.dot;
                segs.forEach(s => {
                    ctx.beginPath();
                    ctx.arc(s.x2, s.y2, 2, 0, Math.PI * 2);
                    ctx.fill();
                });
            });

            // Animate particles along traces
            particles.forEach(p => {
                const trace = traces[p.traceIdx];
                if (!trace || !trace[p.segIdx]) return;

                const seg = trace[p.segIdx];
                const x = seg.x1 + (seg.x2 - seg.x1) * p.progress;
                const y = seg.y1 + (seg.y2 - seg.y1) * p.progress;

                // Glow
                ctx.beginPath();
                ctx.arc(x, y, 6, 0, Math.PI * 2);
                ctx.fillStyle = colors.glow;
                ctx.fill();

                // Core
                ctx.beginPath();
                ctx.arc(x, y, 2, 0, Math.PI * 2);
                ctx.fillStyle = colors.particle;
                ctx.fill();

                // Advance
                p.progress += p.speed;
                if (p.progress >= 1) {
                    p.progress = 0;
                    p.segIdx++;
                    if (p.segIdx >= trace.length) {
                        // Reset to a new random trace
                        p.traceIdx = Math.floor(Math.random() * traces.length);
                        p.segIdx = 0;
                    }
                }
            });

            animId = requestAnimationFrame(drawCircuit);
        }

        function initCircuit() {
            if (animId) cancelAnimationFrame(animId);
            resizeCanvas();
            generateTraces();
            generateParticles();
            drawCircuit();
        }

        window.addEventListener('resize', () => {
            initCircuit();
        });

        // Start the circuit animation
        initCircuit();
    </script>
</body>
</html>
