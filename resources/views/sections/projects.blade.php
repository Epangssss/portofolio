<section id="projects" style="overflow: hidden; padding-bottom: 60px;">
    <div class="container">
        <div class="section-heading reveal">
            <div class="section-label">Portfolio</div>
            <h2>Selected projects</h2>
        </div>
    </div>

    @if($projects->count() > 0)
        <div class="projects-carousel-container reveal" id="projectsCarousel">
            <div class="projects-carousel-track" id="projectsTrack">
                @php
                    // Jika project lebih dari 4, gandakan agar bisa infinite scroll loop
                    // Jika 4 atau kurang, cukup tampilkan aslinya (tidak di-loop)
                    $loopCount = $projects->count() > 4 ? 4 : 1;
                @endphp
                
                @for($i = 0; $i < $loopCount; $i++)
                    @foreach($projects as $project)
                        <div class="project-card">
                            @if($project->image)
                                <div class="project-img-wrapper" onclick="openLightbox('{{ asset('storage/' . $project->image) }}')">
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" draggable="false">
                                    <div class="zoom-hint">🔍 Klik untuk perbesar</div>
                                </div>
                            @endif
                            
                            <div class="project-details">
                                <h3>{{ $project->title }}</h3>
                                <p>{{ $project->description }}</p>
                                
                                <div class="project-tags">
                                    @foreach(explode(',', $project->technologies) as $tech)
                                        <span class="tag">{{ trim($tech) }}</span>
                                    @endforeach
                                </div>

                                @if($project->link)
                                    <a href="{{ $project->link }}" target="_blank" class="project-link" draggable="false">Lihat Project ↗</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endfor
            </div>
        </div>
    @else
        <div class="container" style="text-align: center; color: var(--text-muted);">
            <p>Belum ada project yang diupload.</p>
        </div>
    @endif

    {{-- Lightbox Modal --}}
    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
        <span class="lightbox-close">&times;</span>
        <img class="lightbox-content" id="lightbox-img">
    </div>

    <style>
        .projects-carousel-container {
            width: 100%;
            overflow-x: auto;
            position: relative;
            padding: 20px 0;
            margin-top: 20px;
            cursor: grab;
            scroll-behavior: auto; /* Dikelola JS */
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        .projects-carousel-container::-webkit-scrollbar {
            display: none;
        }
        .projects-carousel-container:active {
            cursor: grabbing;
        }
        
        .projects-carousel-track {
            display: flex;
            width: max-content;
            gap: 24px;
            padding: 0 24px;
        }

        .project-card {
            width: 320px;
            flex-shrink: 0;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            user-select: none;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: var(--blue-200);
        }

        .project-img-wrapper {
            width: 100%;
            height: 200px;
            position: relative;
            cursor: pointer;
            overflow: hidden;
            background: var(--bg-alt);
        }

        .project-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .project-img-wrapper:hover img {
            transform: scale(1.05);
        }

        .zoom-hint {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            background: rgba(0,0,0,0.6);
            color: #fff;
            text-align: center;
            font-size: 12px;
            padding: 8px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .project-img-wrapper:hover .zoom-hint {
            transform: translateY(0);
        }

        .project-details {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .project-details h3 {
            margin: 0 0 12px;
            color: var(--text-primary);
            font-size: 18px;
        }

        .project-details p {
            font-size: 14px;
            color: var(--text-body);
            margin: 0 0 20px;
            line-height: 1.5;
            flex-grow: 1;
        }

        .project-tags {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 16px;
        }

        .tag {
            font-size: 12px; font-weight: 500;
            padding: 4px 12px;
            background: var(--blue-50); color: var(--blue-600);
            border-radius: 20px;
        }

        .project-link {
            font-size: 14px;
            font-weight: 600;
            color: var(--blue-600);
            text-decoration: none;
            display: inline-block;
        }
        
        .project-link:hover { text-decoration: underline; }

        /* Lightbox Styles */
        .lightbox {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0; top: 0; width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.85);
            backdrop-filter: blur(5px);
            align-items: center; justify-content: center;
        }
        .lightbox-content {
            max-width: 90%; max-height: 90vh;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            animation: zoomIn 0.3s ease;
        }
        @keyframes zoomIn {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .lightbox-close {
            position: absolute;
            top: 20px; right: 30px;
            color: #fff; font-size: 40px; font-weight: bold;
            cursor: pointer; transition: color 0.3s;
        }
        .lightbox-close:hover { color: var(--blue-400); }

    </style>

    <script>
        // --- Lightbox ---
        function openLightbox(imgSrc) {
            const lb = document.getElementById('lightbox');
            const lbImg = document.getElementById('lightbox-img');
            lbImg.src = imgSrc;
            lb.style.display = 'flex';
        }

        function closeLightbox() {
            document.getElementById('lightbox').style.display = 'none';
        }

        // --- Draggable & Auto Loop Carousel ---
        document.addEventListener('DOMContentLoaded', () => {
            const carousel = document.getElementById('projectsCarousel');
            if (!carousel) return;

            let isDown = false;
            let startX;
            let scrollLeft;
            let isHovered = false;
            
            // Mouse Events
            carousel.addEventListener('mousedown', (e) => {
                isDown = true;
                carousel.style.cursor = 'grabbing';
                startX = e.pageX - carousel.offsetLeft;
                scrollLeft = carousel.scrollLeft;
            });
            carousel.addEventListener('mouseleave', () => {
                isDown = false;
                carousel.style.cursor = 'grab';
                isHovered = false;
            });
            carousel.addEventListener('mouseup', () => {
                isDown = false;
                carousel.style.cursor = 'grab';
            });
            carousel.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - carousel.offsetLeft;
                const walk = (x - startX) * 2; // Kecepatan geser
                carousel.scrollLeft = scrollLeft - walk;
            });
            
            // Touch Events
            carousel.addEventListener('touchstart', (e) => {
                isDown = true;
                startX = e.touches[0].pageX - carousel.offsetLeft;
                scrollLeft = carousel.scrollLeft;
            });
            carousel.addEventListener('touchend', () => {
                isDown = false;
            });
            carousel.addEventListener('touchmove', (e) => {
                if (!isDown) return;
                const x = e.touches[0].pageX - carousel.offsetLeft;
                const walk = (x - startX) * 2;
                carousel.scrollLeft = scrollLeft - walk;
            });

            // Hover Pause for Auto Loop
            carousel.addEventListener('mouseenter', () => {
                isHovered = true;
            });

            // Auto Scroll Infinite Loop
            const autoScrollSpeed = 1; // pixel per frame
            const isLooping = {{ $projects->count() > 4 ? 'true' : 'false' }};
            
            function autoScroll() {
                if (isLooping && !isDown && !isHovered) {
                    carousel.scrollLeft += autoScrollSpeed;
                    
                    // Reset to beginning seamlessly if reached halfway (since we multiplied output by 4)
                    if (carousel.scrollLeft >= (carousel.scrollWidth / 2)) {
                        carousel.scrollLeft = 0;
                    }
                }
                if (isLooping) {
                    requestAnimationFrame(autoScroll);
                }
            }
            
            if (isLooping) {
                autoScroll();
            }
        });
    </script>
</section>
