<section id="skills" style="background: var(--bg-alt);">
    <div class="container">
        <div class="section-heading reveal" style="text-align: center;">
            <div class="section-label" style="justify-content: center;">Skills</div>
            <h2>Technologies I work with</h2>
        </div>

        <div class="reveal" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 16px; max-width: 800px; margin: 0 auto;">
            <div class="skill-item">
                <div class="skill-icon">🌐</div>
                <span>HTML5 & CSS3</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">⚡</div>
                <span>JavaScript</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">🐘</div>
                <span>PHP</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">🔺</div>
                <span>Laravel</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">💚</div>
                <span>Vue.js</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">⚛️</div>
                <span>React</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">🎨</div>
                <span>TailwindCSS</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">🗄️</div>
                <span>MySQL</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">📦</div>
                <span>Git / GitHub</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">🔌</div>
                <span>REST APIs</span>
            </div>
        </div>
    </div>

    <style>
        .skill-item {
            display: flex; flex-direction: column; align-items: center; gap: 10px;
            padding: 24px 16px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            font-size: 13px; font-weight: 600; color: var(--gray-700);
            transition: all 0.25s ease;
            cursor: default;
        }
        .skill-item:hover {
            border-color: var(--blue-200);
            box-shadow: var(--shadow-md);
            transform: translateY(-3px);
        }
        .skill-icon { font-size: 28px; }
    </style>
</section>
