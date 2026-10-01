<section id="skills" style="background: var(--bg-alt);">
    <div class="container">
        <div class="section-heading reveal" style="text-align: center;">
            <div class="section-label" style="justify-content: center;">Skills</div>
            <h2>Technologies I work with</h2>
        </div>

        <div style="overflow: hidden; width: 100%; position: relative; padding: 20px 0;">
            {{-- Marquee Track 1 (Moves Left) --}}
            <div class="marquee-track">
                <div class="marquee-content">
                    {{-- Row 1 Items --}}
                    <div class="skill-item"><div class="skill-icon">🌐</div><span>HTML5 & CSS3</span></div>
                    <div class="skill-item"><div class="skill-icon">⚡</div><span>JavaScript</span></div>
                    <div class="skill-item"><div class="skill-icon">🐘</div><span>PHP</span></div>
                    <div class="skill-item"><div class="skill-icon">🔺</div><span>Laravel</span></div>
                    <div class="skill-item"><div class="skill-icon">💚</div><span>Vue.js</span></div>
                    <div class="skill-item"><div class="skill-icon">⚛️</div><span>React</span></div>
                    <div class="skill-item"><div class="skill-icon">🎨</div><span>TailwindCSS</span></div>
                    <div class="skill-item"><div class="skill-icon">🗄️</div><span>MySQL</span></div>
                    <div class="skill-item"><div class="skill-icon">📦</div><span>Git / GitHub</span></div>
                    <div class="skill-item"><div class="skill-icon">🔌</div><span>REST APIs</span></div>
                </div>
                {{-- Duplicate for seamless loop --}}
                <div class="marquee-content">
                    <div class="skill-item"><div class="skill-icon">🌐</div><span>HTML5 & CSS3</span></div>
                    <div class="skill-item"><div class="skill-icon">⚡</div><span>JavaScript</span></div>
                    <div class="skill-item"><div class="skill-icon">🐘</div><span>PHP</span></div>
                    <div class="skill-item"><div class="skill-icon">🔺</div><span>Laravel</span></div>
                    <div class="skill-item"><div class="skill-icon">💚</div><span>Vue.js</span></div>
                    <div class="skill-item"><div class="skill-icon">⚛️</div><span>React</span></div>
                    <div class="skill-item"><div class="skill-icon">🎨</div><span>TailwindCSS</span></div>
                    <div class="skill-item"><div class="skill-icon">🗄️</div><span>MySQL</span></div>
                    <div class="skill-item"><div class="skill-icon">📦</div><span>Git / GitHub</span></div>
                    <div class="skill-item"><div class="skill-icon">🔌</div><span>REST APIs</span></div>
                </div>
            </div>

            {{-- Marquee Track 2 (Moves Right) --}}
            <div class="marquee-track marquee-reverse" style="margin-top: 16px;">
                <div class="marquee-content">
                    {{-- Row 2 Items (New Skills) --}}
                    <div class="skill-item"><div class="skill-icon">📱</div><span>Flutter (Mobile Dev)</span></div>
                    <div class="skill-item"><div class="skill-icon">🍃</div><span>MongoDB</span></div>
                    <div class="skill-item"><div class="skill-icon">🤖</div><span>Android Studio</span></div>
                    <div class="skill-item"><div class="skill-icon">💻</div><span>VS Code</span></div>
                    <div class="skill-item"><div class="skill-icon">🗂️</div><span>XAMPP</span></div>
                    <div class="skill-item"><div class="skill-icon">📮</div><span>Postman</span></div>
                    <div class="skill-item"><div class="skill-icon">🎥</div><span>OBS Studio</span></div>
                    <div class="skill-item"><div class="skill-icon">🎬</div><span>CapCut</span></div>
                    <div class="skill-item"><div class="skill-icon">🖌️</div><span>Canva</span></div>
                    <div class="skill-item"><div class="skill-icon">📝</div><span>Word & Excel</span></div>
                </div>
                {{-- Duplicate for seamless loop --}}
                <div class="marquee-content">
                    <div class="skill-item"><div class="skill-icon">📱</div><span>Flutter (Mobile Dev)</span></div>
                    <div class="skill-item"><div class="skill-icon">🍃</div><span>MongoDB</span></div>
                    <div class="skill-item"><div class="skill-icon">🤖</div><span>Android Studio</span></div>
                    <div class="skill-item"><div class="skill-icon">💻</div><span>VS Code</span></div>
                    <div class="skill-item"><div class="skill-icon">🗂️</div><span>XAMPP</span></div>
                    <div class="skill-item"><div class="skill-icon">📮</div><span>Postman</span></div>
                    <div class="skill-item"><div class="skill-icon">🎥</div><span>OBS Studio</span></div>
                    <div class="skill-item"><div class="skill-icon">🎬</div><span>CapCut</span></div>
                    <div class="skill-item"><div class="skill-icon">🖌️</div><span>Canva</span></div>
                    <div class="skill-item"><div class="skill-icon">📝</div><span>Word & Excel</span></div>
                </div>
            </div>
            
            {{-- Gradient Overlays for smooth fading effect at edges --}}
            <div style="position: absolute; top: 0; left: 0; width: 60px; height: 100%; background: linear-gradient(to right, var(--bg-alt), transparent); z-index: 2; pointer-events: none;"></div>
            <div style="position: absolute; top: 0; right: 0; width: 60px; height: 100%; background: linear-gradient(to left, var(--bg-alt), transparent); z-index: 2; pointer-events: none;"></div>
        </div>
    </div>

    <style>
        .marquee-track {
            display: flex;
            width: fit-content;
            animation: scroll 30s linear infinite;
        }
        
        /* Pause animation on hover */
        .marquee-track:hover {
            animation-play-state: paused;
        }

        .marquee-reverse {
            animation: scroll-reverse 35s linear infinite;
        }

        .marquee-content {
            display: flex;
            gap: 16px;
            padding-right: 16px; /* Must match the gap */
        }

        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        @keyframes scroll-reverse {
            0% { transform: translateX(-50%); }
            100% { transform: translateX(0); }
        }

        .skill-item {
            display: flex; flex-direction: row; align-items: center; gap: 12px;
            padding: 12px 20px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 30px;
            font-size: 14px; font-weight: 600; color: var(--gray-700);
            transition: all 0.25s ease;
            white-space: nowrap;
            cursor: pointer;
        }
        .skill-item:hover {
            border-color: var(--blue-400);
            background: var(--blue-50);
            color: var(--blue-600);
            transform: scale(1.05);
        }
        .skill-icon { font-size: 20px; }
    </style>
</section>
