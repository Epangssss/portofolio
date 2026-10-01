<section id="about">
    <div class="container">
        <div class="section-heading reveal">
            <div class="section-label">About</div>
            <h2>A bit about me</h2>
        </div>

        <div class="reveal" style="display: grid; grid-template-columns: 280px 1fr; gap: 60px; align-items: start;">
            {{-- Profil & Stats --}}
            <div style="display: flex; flex-direction: column; gap: 32px;">
                
                {{-- Bio Pendek --}}
                <div>
                    <h3 style="font-size: 20px; font-weight: 700; color: var(--text-primary); margin-bottom: 12px;">Profil Saya</h3>
                    <p style="font-size: 15px; color: var(--text-muted); line-height: 1.6;">
                        Lulusan Manajemen Informatika dengan minat mendalam pada pengembangan Web dan Mobile Dev.
                    </p>
                </div>

                {{-- Quick facts --}}
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                    <div style="text-align: center; padding: 20px 12px; background: var(--bg-alt); border: 1px solid var(--border-color); border-radius: var(--radius-md);">
                        <p style="font-size: 28px; font-weight: 800; color: var(--blue-600); margin-bottom: 4px;">3+</p>
                        <p style="font-size: 12px; font-weight: 600; color: var(--text-muted);">Years Exp</p>
                    </div>
                    <div style="text-align: center; padding: 20px 12px; background: var(--bg-alt); border: 1px solid var(--border-color); border-radius: var(--radius-md);">
                        <p style="font-size: 28px; font-weight: 800; color: var(--blue-600); margin-bottom: 4px;">20+</p>
                        <p style="font-size: 12px; font-weight: 600; color: var(--text-muted);">Projects Built</p>
                    </div>
                </div>

                {{-- Soft Skills --}}
                <div>
                    <h4 style="font-size: 14px; font-weight: 700; color: var(--text-primary); margin-bottom: 12px;">Soft Skills</h4>
                    <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                        <span style="font-size: 12px; font-weight: 500; padding: 6px 14px; background: var(--blue-50); color: var(--blue-600); border-radius: 16px;">Mau Belajar Hal Baru</span>
                        <span style="font-size: 12px; font-weight: 500; padding: 6px 14px; background: var(--blue-50); color: var(--blue-600); border-radius: 16px;">Problem Solving</span>
                        <span style="font-size: 12px; font-weight: 500; padding: 6px 14px; background: var(--blue-50); color: var(--blue-600); border-radius: 16px;">Teamwork</span>
                        <span style="font-size: 12px; font-weight: 500; padding: 6px 14px; background: var(--blue-50); color: var(--blue-600); border-radius: 16px;">Leadership</span>
                    </div>
                </div>

            </div>

            {{-- Work Experience --}}
            <div>
                <h3 style="font-size: 20px; font-weight: 700; color: var(--text-primary); margin-bottom: 24px;">Pengalaman Kerja</h3>
                
                <div style="display: flex; flex-direction: column; gap: 32px; border-left: 2px solid var(--border-color); padding-left: 24px; margin-left: 8px;">
                    
                    {{-- Experience 1 --}}
                    <div style="position: relative;">
                        <div style="position: absolute; left: -31px; top: 20px; width: 14px; height: 14px; border-radius: 50%; background: var(--blue-600); border: 3px solid var(--bg-body);"></div>
                        <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 20px; box-shadow: var(--shadow-sm); transition: transform 0.2s ease, box-shadow 0.2s ease;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                            <p style="font-size: 12px; font-weight: 600; color: var(--blue-600); margin-bottom: 4px;">Juli 2025 - Nov 2025</p>
                            <h4 style="font-size: 16px; font-weight: 700; color: var(--text-primary);">IT Support</h4>
                            <p style="font-size: 14px; font-weight: 500; color: var(--text-body); margin-bottom: 8px;">Brilliant English Course, Kampung Inggris Pare</p>
                            <p style="font-size: 14px; color: var(--text-muted); line-height: 1.6; margin-bottom: 0;">
                                Memberikan pengalaman terbaik kepada klien dengan membuat ulang alur kerja (case flow) untuk mengelola 3 data website guna meminimalisir kebocoran data. Menangani penerimaan murid kursus dengan baik serta mengelola troubleshooting driver PC dan printer.
                            </p>
                        </div>
                    </div>

                    {{-- Experience 2 --}}
                    <div style="position: relative;">
                        <div style="position: absolute; left: -31px; top: 20px; width: 14px; height: 14px; border-radius: 50%; background: var(--gray-400); border: 3px solid var(--bg-body);"></div>
                        <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 20px; box-shadow: var(--shadow-sm); transition: transform 0.2s ease, box-shadow 0.2s ease;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                            <p style="font-size: 12px; font-weight: 600; color: var(--gray-500); margin-bottom: 4px;">Jan 2025 - Jun 2025</p>
                            <h4 style="font-size: 16px; font-weight: 700; color: var(--text-primary);">Frontend Website Developer</h4>
                            <p style="font-size: 14px; font-weight: 500; color: var(--text-body); margin-bottom: 8px;">Teaching Factory JTINOVA, Jember</p>
                            <p style="font-size: 14px; color: var(--text-muted); line-height: 1.6; margin-bottom: 0;">
                                Bertanggung jawab mengelola website JTINOVA dan Ukerma selama masa magang. Mengembangkan fitur pengelolaan penggunaan sertifikat di JTINOVA dan memperbaiki bug yang ada pada website Ukerma.
                            </p>
                        </div>
                    </div>

                    {{-- Experience 3 --}}
                    <div style="position: relative;">
                        <div style="position: absolute; left: -31px; top: 20px; width: 14px; height: 14px; border-radius: 50%; background: var(--gray-400); border: 3px solid var(--bg-body);"></div>
                        <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 20px; box-shadow: var(--shadow-sm); transition: transform 0.2s ease, box-shadow 0.2s ease;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                            <p style="font-size: 12px; font-weight: 600; color: var(--gray-500); margin-bottom: 4px;">Jul 2024 - Des 2024</p>
                            <h4 style="font-size: 16px; font-weight: 700; color: var(--text-primary);">Backend & Frontend Developer</h4>
                            <p style="font-size: 14px; font-weight: 500; color: var(--text-body); margin-bottom: 8px;">Teaching Factory (TEFA) JTINOVA, Jember</p>
                            <p style="font-size: 14px; color: var(--text-muted); line-height: 1.6; margin-bottom: 0;">
                                Mempelajari dan menerapkan kepemimpinan serta kerja sama tim dalam menyelesaikan masalah pengembangan sistem, dengan dedikasi penuh pada setiap tugas yang diberikan.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
        @media (max-width: 768px) {
            #about .reveal > div:first-child { margin-bottom: 40px; }
            #about [style*="grid-template-columns: 280px"] { grid-template-columns: 1fr !important; }
        }
    </style>
</section>
