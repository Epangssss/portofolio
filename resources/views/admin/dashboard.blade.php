<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Portfolio</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-body: #0F172A;
            --bg-card: #1E293B;
            --bg-alt: #0B1120;
            --text-primary: #F8FAFC;
            --text-body: #CBD5E1;
            --text-muted: #94A3B8;
            --border-color: #334155;
            --blue-500: #3B82F6;
            --blue-600: #2563EB;
            --blue-700: #19336bff;
            --radius-md: 12px;
            --radius-mm: 22px;
        }

        body {
            margin: 0; font-family: 'Inter', sans-serif;
            background: var(--bg-body); color: var(--text-body);
        }
        
        .navbar {
            background: var(--bg-card); border-bottom: 1px solid var(--border-color);
            padding: 16px 32px; display: flex; justify-content: space-between; align-items: center;
        }
        .navbar h1 { margin: 0; font-size: 20px; color: var(--text-primary); }
        .logout-btn {
            background: transparent; border: 1px solid var(--border-color);
            color: #ef4444; padding: 8px 16px; border-radius: 8px; cursor: pointer;
            font-weight: 600;
        }
        
        .container { max-width: 1100px; margin: 40px auto; padding: 0 20px; display: grid; grid-template-columns: 1fr 2fr; gap: 40px; }
        
        @media (max-width: 768px) {
            .container { grid-template-columns: 1fr; }
        }

        .card {
            background: var(--bg-card); border: 1px solid var(--border-color);
            border-radius: var(--radius-md); padding: 24px;
        }
        
        .form-group { margin-bottom: 16px; }
        .form-group label { display: block; font-size: 13px; font-weight: 600; margin-bottom: 8px; color: var(--text-primary); }
        .form-control {
            width: 100%; padding: 12px; box-sizing: border-box;
            background: var(--bg-alt); border: 1px solid var(--border-color);
            border-radius: 8px; color: var(--text-primary); font-family: inherit;
        }
        .form-control:focus { outline: none; border-color: var(--blue-500); }
        
        .btn-primary {
            width: 100%; padding: 12px; background: var(--blue-600); color: #fff;
            border: none; border-radius: 8px; font-weight: 600; cursor: pointer;
        }

        .project-list { display: flex; flex-direction: column; gap: 16px; }
        .project-item {
            background: var(--bg-alt); border: 1px solid var(--border-color);
            border-radius: var(--radius-md); overflow: hidden; display: flex;
        }
        .project-img { width: 140px; height: 100px; object-fit: cover; background: #000; }
        .project-info { padding: 16px; flex-grow: 1; }
        .project-info h3 { margin: 0 0 4px; font-size: 16px; color: var(--text-primary); }
        .project-info p { margin: 0 0 8px; font-size: 13px; color: var(--text-muted); }
        .tags { font-size: 11px; font-weight: 600; color: var(--blue-500); }
        
        .delete-form { margin-top: 8px; }
        .delete-btn { background: #fee2e2; color: #b91c1c; border: none; padding: 4px 8px; border-radius: 4px; font-size: 12px; cursor: pointer; font-weight: 600; }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1>Admin Dashboard</h1>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button class="logout-btn" type="submit">Logout</button>
        </form>
    </nav>

    <div class="container">
        <!-- Add Project Form -->
        <div>
            <div class="card">
                <h2 style="margin-top:0; color:var(--text-primary);">Add New Project</h2>
                
                @if(session('success'))
                    <div style="padding: 12px; background: #dcfce3; color: #15803d; border-radius: 8px; margin-bottom: 16px; font-size: 13px;">
                        {{ session('success') }}
                    </div>
                @endif
                
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Judul Project</label>
                        <input type="text" name="title" class="form-control" required placeholder="Ex: E-Commerce Web">
                    </div>
                    <div class="form-group">
                        <label>Teknologi / Tools</label>
                        <input type="text" name="technologies" class="form-control" required placeholder="Ex: Laravel, Vue, Tailwind">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi (Bisa panjang)</label>
                        <textarea name="description" class="form-control" rows="4" required placeholder="Ceritakan tentang project ini..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar Project (1 Gambar)</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label>Link Selengkapnya (URL) - Opsional</label>
                        <input type="url" name="link" class="form-control" placeholder="https://github.com/kamu/project">
                    </div>
                    <button type="submit" class="btn-primary">Upload Project</button>
                </form>
            </div>
        </div>

        <!-- Project List -->
        <div>
            <h2 style="margin-top:0; color:var(--text-primary);">List Project Kamu</h2>
            <div class="project-list">
                @forelse($projects as $project)
                    <div class="project-item">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" class="project-img" alt="{{ $project->title }}">
                        @else
                            <div class="project-img" style="display:flex; align-items:center; justify-content:center; color:#555; font-size:12px;">No Image</div>
                        @endif
                        
                        <div class="project-info">
                            <h3>{{ $project->title }}</h3>
                            <p>{{ Str::limit($project->description, 60) }}</p>
                            <div class="tags">{{ $project->technologies }}</div>
                            
                            @if($project->link)
                                <div style="margin-top:6px;">
                                    <a href="{{ $project->link }}" target="_blank" style="font-size:12px; color:var(--text-primary);">[Lihat Selengkapnya]</a>
                                </div>
                            @endif

                            <form action="{{ route('admin.projects.delete', $project->id) }}" method="POST" class="delete-form" onsubmit="return confirm('Yakin hapus project ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p style="text-align: center; color: var(--text-muted); margin-top: 40px;">Belum ada project yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>
