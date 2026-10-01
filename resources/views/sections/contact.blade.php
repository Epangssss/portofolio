<section id="contact" style="background: var(--bg-alt);">
    <div class="container">
        <div class="section-heading reveal" style="text-align: center;">
            <div class="section-label" style="justify-content: center;">Contact</div>
            <h2>Let's work together</h2>
            <p style="max-width: 480px; margin: 16px auto 0; font-size: 15px;">
                Have a project in mind or just want to say hi? I'd love to hear from you.
            </p>
        </div>

        <div class="reveal" style="max-width: 560px; margin: 0 auto; background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 40px;">
            <form onsubmit="event.preventDefault(); this.querySelector('button').textContent='Sent ✓'; this.querySelector('button').style.background='#16A34A';">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" placeholder="Your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="you@example.com" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" class="form-control" placeholder="Project inquiry">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" class="form-control" placeholder="Tell me about your project..." required></textarea>
                </div>
                <button type="submit" class="btn-primary" style="width: 100%; justify-content: center;">
                    Send message
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M22 2 11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
                </button>
            </form>
        </div>
    </div>
</section>
