<div id="form-section" class="container mt-5 hidden pb-5">
    <div class="mb-4 text-center">
        <h3 class="fw-bold text-white mb-1">New Applicant Form</h3>
        <p class="text-muted small">Silakan lengkapi profil kandidat di bawah ini beserta file audisi.</p>
    </div>
    
    <div class="glass-card p-4 p-md-5 mx-auto" style="max-width: 800px;">
        <form id="formPendaftaran" action="proses_simpan.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="nama" class="form-control" placeholder="Sesuai kartu identitas..." required>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label">Talent Category</label>
                    <select name="bakat" class="form-select">
                        <option value="Acting">Acting / Peran</option>
                        <option value="Vocal / Menyanyi">Vocal / Menyanyi</option>
                        <option value="Dancing">Dancing / Menari</option>
                    </select>
                </div>
            </div>
            
            <div class="mb-4 p-4 rounded" style="background: rgba(0,0,0,0.15); border: 1px dashed var(--glass-border);">
                <div class="mb-4">
                    <label class="form-label text-white">Portfolio (Foto / Dokumen)</label>
                    <p class="text-muted small mb-2">Upload pas foto atau CV Anda (Format: JPG, PNG, PDF).</p>
                    <input type="file" name="berkas" class="form-control" accept=".jpg, .jpeg, .png, .pdf" required>
                </div>
                
                <div class="mb-4">
                    <label class="form-label text-white">Video Casting</label>
                    <p class="text-muted small mb-2">Upload video penampilan bakat Anda (Format: MP4).</p>
                    <input type="file" name="video" class="form-control" accept="video/mp4" required>
                </div>

                <div class="mb-2">
                    <label class="form-label text-white">Audio Sample</label>
                    <p class="text-muted small mb-2">Upload sampel rekaman suara Anda (Format: MP3).</p>
                    <input type="file" name="audio" class="form-control" accept="audio/mpeg" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Digital Signature</label>
                <p class="text-muted small mb-2">Gunakan kursor atau sentuhan layar untuk membubuhkan tanda tangan persetujuan.</p>
                <canvas id="signature-pad"></canvas>
                <div class="text-end mt-2">
                    <button type="button" class="btn btn-glass btn-sm" onclick="clearCanvas()">Clear Signature</button>
                </div>
            </div>

            <input type="hidden" name="signature_data" id="signature_data">
            
            <hr class="border-secondary my-4">
            <div class="d-flex justify-content-end gap-3">
                <button type="button" class="btn btn-glass px-4" onclick="showDashboard()">Cancel</button>
                <button type="button" class="btn btn-premium px-5" onclick="submitForm()">Submit Registration</button>
            </div>
        </form>
    </div>
</div>