
@php
    $firstName = 'Edward';
    $lastName  = 'Landung Pramudya';
@endphp

<section id="hero" style="min-height: 100vh; display: flex; align-items: center; padding-top: 64px;">
    <div class="container">
        <div class="hero-grid reveal" style="display: grid; grid-template-columns: 1fr 280px; gap: 60px; align-items: center;">
            <div style="max-width: 720px;">

                <p style="font-size: 15px; font-weight: 500; color: var(--blue-600); margin-bottom: 16px;">Hello there 👋</p>

                <h1 style="margin-bottom: 24px; color: var(--text-primary);">
                    I'm <span id="edwardName" style="transition: color 0.6s ease, font-family 0.4s ease;">{{ $firstName }}</span> {{ $lastName }}
                </h1>

                <p style="font-size: 18px; max-width: 560px; margin-bottom: 40px; color: var(--text-muted);">
                    Web Developer specializing in <strong style="color: var(--text-body);">high-performance IT tech</strong>. 
                    I craft clean, scalable, and interactive digital experiences that deliver real results.
                </p>

                <div class="hero-actions" style="display: flex; gap: 16px; flex-wrap: wrap;">
                    <a href="#projects" class="btn-primary">
                        List Pekerjaan Saya
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="#contact" class="btn-outline">CV Saya</a>
                </div>

            </div>

            {{-- Avatar / Visual --}}
            <div style="position: relative;" class="hero-avatar">
                <div style="width: 100%; aspect-ratio: 1; background: linear-gradient(135deg, var(--blue-50), var(--blue-100)); border-radius: var(--radius-xl); display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; box-shadow: var(--shadow-md); border: 1px solid var(--border-color);">
                    {{-- Eevee as the avatar --}}
                    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/133.png" 
                         style="width: 140px; height: 140px; image-rendering: pixelated; cursor: pointer; transition: transform 0.2s;" 
                         alt="Eevee" onclick="playCry('eevee')" onmouseover="this.style.transform='scale(1.2) translateY(-10px)'" onmouseout="this.style.transform='scale(1) translateY(0)'">
                </div>
                <div style="text-align: center; margin-top: 16px;">
                 
                </div>
            </div>
        </div>
    </div>
    <style>
        @media (max-width: 900px) {
            .hero-grid { grid-template-columns: 1fr !important; text-align: center; gap: 40px; }
            .hero-actions { justify-content: center; }
            .hero-avatar { max-width: 280px; margin: 0 auto; }
            #hero h1, #hero p { margin-left: auto; margin-right: auto; }
        }
    </style>
</section>

    {{-- Edward Name: Font & Eeveelution Color Cycler --}}
    <script>
    (function() {
        const el = document.getElementById('edwardName');
        if (!el) return;

        // Eeveelution-inspired color palette (no RGB rainbow)
        const eeveColors = [
            '#6390F0', // Vaporeon — water blue
            '#F7D02C', // Jolteon — electric yellow
            '#EE8130', // Flareon — fire orange
            '#C69893', // Eevee — warm brown/beige
            '#F95587', // Espeon — psychic pink
            '#705898', // Umbreon — dark purple
            '#7AC74C', // Leafeon — grass green
            '#96D9D6', // Glaceon — ice teal
            '#D685AD', // Sylveon — fairy pink
        ];

        // Different font families to cycle through
        const fonts = [
            "'Inter', sans-serif",
            "'Playfair Display', serif",
            "'Caveat', cursive",
            "'Permanent Marker', cursive",
            "'Satisfy', cursive",
            "'Orbitron', sans-serif",
            "'Bebas Neue', sans-serif",
            "'Abril Fatface', serif",
            "'Righteous', sans-serif",
            "'Pacifico', cursive",
            "'Cinzel', serif",
            "'JetBrains Mono', monospace",
        ];

        let colorIdx = 0;
        let fontIdx = 0;

        setInterval(() => {
            colorIdx = (colorIdx + 1) % eeveColors.length;
            fontIdx = (fontIdx + 1) % fonts.length;

            el.style.color = eeveColors[colorIdx];
            el.style.fontFamily = fonts[fontIdx];
        }, 2000);
    })();
    </script>


{{-- ═══════════════════════════════════════════════════ --}}
{{-- Eeveelution Physics: They fall, land, & walk on text --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div id="eeveeWorld" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; pointer-events: none; z-index: 999; overflow: hidden;">
</div>

<style>
    .eevee-alive {
        position: absolute;
        image-rendering: pixelated;
        pointer-events: auto;
        cursor: pointer;
        transition: none;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.25));
    }
</style>

<script>
(function() {
    // ─── Eeveelution Data ─── 
    const eeveelutions = [
        { name: 'vaporeon', id: 134 },
        { name: 'jolteon',  id: 135 },
        { name: 'flareon',  id: 136 },
        { name: 'eevee',    id: 133 },
        { name: 'espeon',   id: 196 },
        { name: 'umbreon',  id: 197 },
        { name: 'leafeon',  id: 470 },
        { name: 'glaceon',  id: 471 },
        { name: 'sylveon',  id: 700 },
    ];

    const SPRITE_SIZE = 38;
    const GRAVITY = 0.45;
    const BOUNCE = -3;
    const WALK_SPEED = 0.6;
    const JUMP_VEL = -6;

    const world = document.getElementById('eeveeWorld');
    const sprites = [];
    let lastScrollY = window.scrollY;
    let platforms = [];

    // ─── Create Sprite Elements ───
    eeveelutions.forEach((ev, i) => {
        const img = document.createElement('img');
        // Use Gen V animated GIFs for walking feel
        img.src = `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/versions/generation-v/black-white/animated/${ev.id}.gif`;
        img.alt = ev.name;
        img.className = 'eevee-alive';
        img.style.width = SPRITE_SIZE + 'px';
        img.style.height = SPRITE_SIZE + 'px';
        // ─── Drag and Drop / Jump ───
        let isDragging = false;
        let startX, startY;

        const onPointerDown = (clientX, clientY) => {
            if (typeof playCry === 'function') playCry(ev.name);
            const s = sprites[i];
            s.isDragging = true;
            s.grounded = false;
            s.vy = 0;
            s.vx = 0;
            s.dragOffsetX = clientX - s.x;
            s.dragOffsetY = clientY - s.y;
            isDragging = false;
            startX = clientX;
            startY = clientY;
        };

        const onPointerMove = (clientX, clientY) => {
            const s = sprites[i];
            if (!s.isDragging) return;
            // If moved more than 5px, it's a drag
            if (Math.abs(clientX - startX) > 5 || Math.abs(clientY - startY) > 5) {
                isDragging = true;
            }
            s.x = clientX - s.dragOffsetX;
            s.y = clientY - s.dragOffsetY;
        };

        const onPointerUp = () => {
            const s = sprites[i];
            if (s.isDragging) {
                s.isDragging = false;
                if (!isDragging) {
                    // It was just a click, make it jump!
                    s.vy = JUMP_VEL;
                } else {
                    // Let it fall naturally from where it was dropped
                    s.state = 'falling';
                }
            }
        };

        // Mouse Events
        img.addEventListener('mousedown', (e) => {
            e.preventDefault();
            e.stopPropagation();
            onPointerDown(e.clientX, e.clientY);

            const onMouseMove = (moveEvent) => onPointerMove(moveEvent.clientX, moveEvent.clientY);
            const onMouseUp = () => {
                onPointerUp();
                document.removeEventListener('mousemove', onMouseMove);
                document.removeEventListener('mouseup', onMouseUp);
            };

            document.addEventListener('mousemove', onMouseMove);
            document.addEventListener('mouseup', onMouseUp);
        });

        // Touch Events
        img.addEventListener('touchstart', (e) => {
            e.preventDefault();
            e.stopPropagation();
            onPointerDown(e.touches[0].clientX, e.touches[0].clientY);

            const onTouchMove = (moveEvent) => {
                moveEvent.preventDefault(); // Prevent scrolling while dragging
                onPointerMove(moveEvent.touches[0].clientX, moveEvent.touches[0].clientY);
            };
            const onTouchEnd = () => {
                onPointerUp();
                document.removeEventListener('touchmove', onTouchMove);
                document.removeEventListener('touchend', onTouchEnd);
            };

            document.addEventListener('touchmove', onTouchMove, { passive: false });
            document.addEventListener('touchend', onTouchEnd);
        });

        world.appendChild(img);

        sprites.push({
            el: img,
            x: 80 + i * 90 + Math.random() * 40,
            y: -60 - i * 40, // Start above screen
            vx: (Math.random() - 0.5) * 2,
            vy: 0,
            grounded: false,
            direction: Math.random() > 0.5 ? 1 : -1,
            platform: null,
            walkTimer: 0,
            idleTimer: 0,
            state: 'falling', // falling, walking, idle
            stateTimer: 0,
        });
    });

    // ─── Scan for text/card platforms ───
    function scanPlatforms() {
        platforms = [];
        // Select all text-like elements and cards as "platforms"
        const selectors = 'h1, h2, h3, p, .btn-primary, .btn-outline, .card, .modern-card, .skill-item, .badge, .section-label, .nav-brand, .nav-links a, .tag, .form-group label, button, .section-heading, footer';
        document.querySelectorAll(selectors).forEach(el => {
            if (el.closest('#eeveeWorld')) return; // skip our own elements
            const rect = el.getBoundingClientRect();
            // Only include visible elements with reasonable size
            if (rect.width > 20 && rect.height > 8 && rect.bottom > 0 && rect.top < window.innerHeight) {
                platforms.push({
                    left: rect.left,
                    right: rect.right,
                    top: rect.top,
                    bottom: rect.bottom,
                    width: rect.width,
                });
            }
        });
        // Add ground (bottom of viewport)
        platforms.push({
            left: 0,
            right: window.innerWidth,
            top: window.innerHeight - 4,
            bottom: window.innerHeight,
            width: window.innerWidth,
        });
        // Sort by top position (highest first)
        platforms.sort((a, b) => a.top - b.top);
    }

    // ─── Physics Loop ───
    function update() {
        sprites.forEach(s => {
            // Apply transform for dragged sprites, skip physics
            if (s.isDragging) {
                s.el.style.transform = `translate(${s.x}px, ${s.y}px) scaleX(${s.direction})`;
                return;
            }

            // Apply gravity if not grounded
            if (!s.grounded) {
                s.vy += GRAVITY;
                s.y += s.vy;
                s.x += s.vx;
                s.state = 'falling';

                // Check platform collisions
                for (const plat of platforms) {
                    // Is sprite above the platform and falling onto it?
                    const spriteBottom = s.y + SPRITE_SIZE;
                    const spriteCenterX = s.x + SPRITE_SIZE / 2;

                    if (
                        s.vy > 0 && // falling down
                        spriteBottom >= plat.top && 
                        spriteBottom <= plat.top + 20 && // within landing zone
                        spriteCenterX >= plat.left - 10 && 
                        spriteCenterX <= plat.right + 10
                    ) {
                        s.y = plat.top - SPRITE_SIZE;
                        s.vy = 0;
                        s.vx = 0;
                        s.grounded = true;
                        s.platform = plat;
                        s.state = 'idle';
                        s.stateTimer = 30 + Math.random() * 60; // idle before walking
                        break;
                    }
                }

                // Bounce off walls
                if (s.x < 0) { s.x = 0; s.vx = Math.abs(s.vx); s.direction = 1; }
                if (s.x > window.innerWidth - SPRITE_SIZE) { s.x = window.innerWidth - SPRITE_SIZE; s.vx = -Math.abs(s.vx); s.direction = -1; }

                // Reset if falls below screen
                if (s.y > window.innerHeight + 100) {
                    s.y = -SPRITE_SIZE - Math.random() * 100;
                    s.x = Math.random() * (window.innerWidth - SPRITE_SIZE);
                    s.vy = 0;
                    s.vx = (Math.random() - 0.5) * 2;
                }

            } else {
                // Grounded behavior
                s.stateTimer--;

                if (s.state === 'idle') {
                    if (s.stateTimer <= 0) {
                        s.state = 'walking';
                        s.direction = Math.random() > 0.5 ? 1 : -1;
                        s.stateTimer = 80 + Math.random() * 160;
                    }
                } else if (s.state === 'walking') {
                    s.x += WALK_SPEED * s.direction;

                    if (s.stateTimer <= 0) {
                        s.state = 'idle';
                        s.stateTimer = 40 + Math.random() * 80;
                    }

                    // Check if still on platform
                    if (s.platform) {
                        const cx = s.x + SPRITE_SIZE / 2;
                        if (cx < s.platform.left - 5 || cx > s.platform.right + 5) {
                            // Walk off the edge — fall!
                            s.grounded = false;
                            s.vy = 0.5;
                            s.vx = WALK_SPEED * s.direction * 0.5;
                            s.platform = null;
                        }
                    }

                    // Bounce at screen edges
                    if (s.x <= 0) { s.direction = 1; }
                    if (s.x >= window.innerWidth - SPRITE_SIZE) { s.direction = -1; }
                }

                // Random chance to jump
                if (Math.random() < 0.002) {
                    s.vy = JUMP_VEL * 0.7;
                    s.grounded = false;
                    s.platform = null;
                    s.vx = (Math.random() - 0.5) * 3;
                }
            }

            // ─── Render ───
            s.el.style.transform = `translate(${s.x}px, ${s.y}px) scaleX(${s.direction})`;
            
            // Walking bob animation
            if (s.state === 'walking' && s.grounded) {
                const bob = Math.sin(Date.now() * 0.012) * 2;
                s.el.style.transform = `translate(${s.x}px, ${s.y + bob}px) scaleX(${s.direction})`;
            }
        });

        requestAnimationFrame(update);
    }

    // ─── Scroll: shake them off! ───
    let scrollTimeout;
    window.addEventListener('scroll', () => {
        const delta = Math.abs(window.scrollY - lastScrollY);
        lastScrollY = window.scrollY;

        if (delta > 5) {
            // Rescan platforms after scroll settles
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => {
                scanPlatforms();
            }, 150);

            // Shake grounded sprites off their platforms
            sprites.forEach(s => {
                if (s.grounded && delta > 15) {
                    s.grounded = false;
                    s.vy = -2 - Math.random() * 3;
                    s.vx = (Math.random() - 0.5) * 4;
                    s.platform = null;
                }
            });
        }
    });

    // ─── Resize ───
    window.addEventListener('resize', () => {
        scanPlatforms();
    });

    // ─── Init ───
    scanPlatforms();
    // Rescan periodically (in case of lazy-loaded content or reveal animations)
    setInterval(scanPlatforms, 3000);
    update();
})();
</script>
