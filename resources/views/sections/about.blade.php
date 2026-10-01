<section id="about">
    <div class="container">
        <div class="section-heading reveal">
            <div class="section-label">About</div>
            <h2>A bit about me</h2>
        </div>

        <div class="reveal" style="display: grid; grid-template-columns: 280px 1fr; gap: 60px; align-items: start;">
            {{-- Avatar / Visual --}}
            <div style="position: relative;">
                <div style="width: 100%; aspect-ratio: 1; background: linear-gradient(135deg, var(--blue-50), var(--blue-100)); border-radius: var(--radius-xl); display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                    {{-- Eevee as the avatar --}}
                    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/133.png" 
                         style="width: 140px; height: 140px; image-rendering: pixelated; cursor: pointer;" 
                         alt="Eevee" onclick="playCry('eevee')">
                </div>
                <div style="text-align: center; margin-top: 16px;">
                    <p style="font-size: 13px; font-weight: 600; color: var(--gray-800);">Edward Landung Pramudya</p>
                    <p style="font-size: 12px; color: var(--gray-400); font-family: 'JetBrains Mono', monospace;">@edwardlp</p>
                </div>
            </div>

            {{-- Bio Content --}}
            <div>
                <p style="font-size: 16px; margin-bottom: 24px;">
                    I'm a Web Developer passionate about building things for the web. 
                    I specialize in crafting high-performance applications with clean code and modern architectures.
                </p>
                <p style="font-size: 16px; margin-bottom: 32px;">
                    Like Eevee who can adapt and evolve into many forms, I believe in versatility — 
                    continuously learning new technologies and adapting to different challenges to deliver the best solutions.
                </p>

                {{-- Quick facts --}}
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                    <div style="text-align: center; padding: 20px; background: var(--gray-50); border-radius: var(--radius-md);">
                        <p style="font-size: 28px; font-weight: 800; color: var(--blue-600); margin-bottom: 4px;">3+</p>
                        <p style="font-size: 12px; font-weight: 500; color: var(--gray-500);">Years Experience</p>
                    </div>
                    <div style="text-align: center; padding: 20px; background: var(--gray-50); border-radius: var(--radius-md);">
                        <p style="font-size: 28px; font-weight: 800; color: var(--blue-600); margin-bottom: 4px;">20+</p>
                        <p style="font-size: 12px; font-weight: 500; color: var(--gray-500);">Projects Built</p>
                    </div>
                    <div style="text-align: center; padding: 20px; background: var(--gray-50); border-radius: var(--radius-md);">
                        <p style="font-size: 28px; font-weight: 800; color: var(--blue-600); margin-bottom: 4px;">9</p>
                        <p style="font-size: 12px; font-weight: 500; color: var(--gray-500);">Eeveelutions </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media (max-width: 768px) {
            #about .reveal > div:first-child { display: none; }
            #about [style*="grid-template-columns: 280px"] { grid-template-columns: 1fr !important; }
        }
    </style>
</section>
