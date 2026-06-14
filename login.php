<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="glass-card p-5 animate-fade-up" style="width: 100%; max-width: 440px;">
        <div class="text-center mb-5">
            <div class="mb-3">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
            </div>
            <h2 class="text-gradient mb-2">StarForge</h2>
            <p class="text-muted small">Virtual Casting Management System</p>
        </div>
        
        <form method="POST" action="">
            <div class="mb-4 text-start">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
            </div>
            <div class="mb-4 text-start">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            <div class="mb-5 text-start">
                <label class="form-label">Access Role</label>
                <select name="role" class="form-select">
                    <option value="peserta">Peserta Audisi</option>
                    <option value="admin">Juri / Admin</option>
                </select>
            </div>
            <button type="submit" name="btn_login" class="btn btn-premium w-100 py-2">Sign In to Workspace</button>
        </form>
    </div>
</div>