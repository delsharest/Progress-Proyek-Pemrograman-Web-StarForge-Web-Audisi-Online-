<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarForge - Virtual Casting | Premium SaaS Edition</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --navy-dark: #050814;
            --navy-mid: #0B132B;
            --navy-light: #1A2A54;
            --accent-blue: #3B82F6;
            --accent-glow: rgba(59, 130, 246, 0.4);
            --text-main: #F9FAFB;
            --text-muted: #cbd5e1;
            --glass-bg: rgba(11, 19, 43, 0.4);
            --glass-border: rgba(255, 255, 255, 0.08);
            --glass-border-hover: rgba(255, 255, 255, 0.15);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --font-main: 'Inter', sans-serif;
        }

        body { 
            margin: 0; 
            font-family: var(--font-main); 
            color: var(--text-main); 
            background-color: var(--navy-dark);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        .text-muted { color: var(--text-muted) !important; }

        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: var(--navy-dark); }
        ::-webkit-scrollbar-thumb { background: var(--navy-light); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--accent-blue); }

        body::before, body::after {
            content: '';
            position: fixed;
            width: 50vw;
            height: 50vw;
            border-radius: 50%;
            filter: blur(140px);
            z-index: -1;
            animation: floatBlob 20s infinite alternate cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0.5;
            pointer-events: none;
        }
        body::before { background: radial-gradient(circle, var(--navy-light) 0%, transparent 70%); top: -10%; left: -10%; }
        body::after { background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, transparent 70%); bottom: -10%; right: -10%; animation-delay: -10s; }

        @keyframes floatBlob { 0% { transform: translate(0, 0) scale(1); } 100% { transform: translate(10%, 15%) scale(1.1); } }

        .glass-card { background: var(--glass-bg); backdrop-filter: blur(20px); border: 1px solid var(--glass-border); box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4); border-radius: 16px; transition: var(--transition); }
        .glass-card:hover { border-color: var(--glass-border-hover); transform: translateY(-4px); box-shadow: 0 16px 50px rgba(0, 0, 0, 0.5); }
        .navbar-glass { background: rgba(5, 8, 20, 0.7) !important; backdrop-filter: blur(16px); border-bottom: 1px solid var(--glass-border); transition: var(--transition); }
        .modal-content { background: var(--glass-bg); backdrop-filter: blur(24px); border: 1px solid var(--glass-border); border-radius: 16px; box-shadow: 0 24px 60px rgba(0, 0, 0, 0.6); }

        .btn-premium { background: linear-gradient(135deg, var(--accent-blue), #2563EB); color: #fff; font-weight: 500; letter-spacing: 0.5px; border: none; border-radius: 8px; padding: 10px 24px; transition: var(--transition); box-shadow: 0 4px 15px var(--accent-glow); }
        .btn-premium:hover { background: linear-gradient(135deg, #2563EB, #1D4ED8); color: #fff; transform: translateY(-2px); box-shadow: 0 8px 25px var(--accent-glow); }
        .btn-glass { background: rgba(255, 255, 255, 0.05); color: var(--text-main); border: 1px solid var(--glass-border); border-radius: 8px; transition: var(--transition); }
        .btn-glass:hover { background: rgba(255, 255, 255, 0.1); color: #fff; border-color: var(--glass-border-hover); }
        .btn-danger-glass { background: rgba(239, 68, 68, 0.1); color: #FCA5A5; border: 1px solid rgba(239, 68, 68, 0.3); border-radius: 8px; transition: var(--transition); }
        .btn-danger-glass:hover { background: rgba(239, 68, 68, 0.2); color: #fff; border-color: rgba(239, 68, 68, 0.6); }
        .btn-success-glass { background: rgba(16, 185, 129, 0.1); color: #6EE7B7; border: 1px solid rgba(16, 185, 129, 0.3); border-radius: 8px; transition: var(--transition); }
        .btn-success-glass:hover { background: rgba(16, 185, 129, 0.2); color: #fff; border-color: rgba(16, 185, 129, 0.6); }

        .form-control, .form-select { background: rgba(0, 0, 0, 0.2) !important; color: var(--text-main) !important; border: 1px solid var(--glass-border); border-radius: 8px; padding: 12px 16px; transition: var(--transition); }
        .form-control::placeholder { color: #94a3b8 !important; }
        .form-control:focus, .form-select:focus { background: rgba(0, 0, 0, 0.4) !important; border-color: var(--accent-blue); box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15); outline: none; }
        .form-label { color: var(--text-muted); font-size: 0.85rem; font-weight: 500; margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }

        .table { color: var(--text-main); margin-top: 15px; border-collapse: separate; border-spacing: 0 8px; }
        .table th { background-color: transparent !important; color: #e2e8f0 !important; font-weight: 600; border-bottom: 1px solid rgba(255, 255, 255, 0.15) !important; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.5px; }
        .table td { background-color: rgba(255, 255, 255, 0.02) !important; border-top: 1px solid var(--glass-border) !important; border-bottom: 1px solid var(--glass-border) !important; vertical-align: middle; }
        .table tr td:first-child { border-left: 1px solid var(--glass-border) !important; border-top-left-radius: 8px; border-bottom-left-radius: 8px; }
        .table tr td:last-child { border-right: 1px solid var(--glass-border) !important; border-top-right-radius: 8px; border-bottom-right-radius: 8px; }
        .table-hover tbody tr:hover td { background-color: rgba(255, 255, 255, 0.05) !important; }

        .text-gradient { background: linear-gradient(to right, #60A5FA, #3B82F6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 700; }
        .badge-soft { background: rgba(16, 185, 129, 0.15); color: #34D399; padding: 6px 12px; border-radius: 20px; font-weight: 500; }
        #signature-pad { background-color: #F9FAFB; border-radius: 12px; cursor: crosshair; width: 100%; height: 180px; box-shadow: inset 0 2px 10px rgba(0,0,0,0.1); border: 2px dashed #E5E7EB; }
        .hidden { display: none !important; }
        .animate-fade-up { animation: fadeUp 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards; }
        @keyframes fadeUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body>