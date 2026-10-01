<nav class="navbar">
    <div class="nav-inner">
        <a href="#hero" class="nav-brand">E<span>.</span>LP</a>
        <div class="nav-links">
            <a href="#about">About</a>
            <a href="#skills">Skills</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
        </div>
        {{-- Theme Toggle --}}
        <button id="themeToggle" class="theme-toggle" aria-label="Toggle theme" onclick="toggleTheme()">
            <svg class="icon-sun" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
            <svg class="icon-moon" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
        </button>
    </div>
</nav>

<style>
    .theme-toggle {
        background: none; border: 1.5px solid var(--gray-200);
        border-radius: 50%; width: 38px; height: 38px;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer; color: var(--gray-500);
        transition: all 0.3s ease;
        flex-shrink: 0;
    }
    .theme-toggle:hover {
        border-color: var(--blue-500); color: var(--blue-600);
        background: var(--blue-50);
    }
    /* Light mode: show moon, hide sun */
    .icon-sun  { display: none; }
    .icon-moon { display: block; }
    /* Dark mode: show sun, hide moon */
    [data-theme="dark"] .icon-sun  { display: block; }
    [data-theme="dark"] .icon-moon { display: none; }
</style>
