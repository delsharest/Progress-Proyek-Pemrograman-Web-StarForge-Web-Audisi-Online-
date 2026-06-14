<div id="dashboard-section" class="container mt-5 pb-5 animate-fade-up">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h3 class="fw-bold text-white mb-1">Casting Database</h3>
            <p class="text-muted small mb-0">Kelola dan tinjau data peserta audisi yang masuk.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="cetak_pdf.php" target="_blank" class="btn btn-danger-glass btn-sm d-flex align-items-center gap-2">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                Export PDF
            </a>
            <a href="https://docs.google.com/spreadsheets/d/1nLK4p2Kd6rDnszqbz_pn3JNE4oROWszoDHFjG7qXDc0/edit?usp=sharing" target="_blank" class="btn btn-success-glass btn-sm d-flex align-items-center gap-2">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                Live Spreadsheet
            </a>
        </div>
    </div>

    <div class="glass-card p-4">
        <form method="GET" action="">
            <div class="row mb-4">
                <div class="col-md-6 col-lg-5 d-flex gap-2">
                    <input type="text" name="cari" class="form-control" placeholder="Search by name or talent..." value="<?= isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : '' ?>">
                    <button type="submit" class="btn btn-premium px-4">Search</button>
                    <?php if(isset($_GET['cari']) && $_GET['cari'] != '') { echo '<a href="index.php" class="btn btn-danger-glass d-flex align-items-center px-3">Reset</a>'; } ?>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th width="30%">Nama Peserta</th>
                        <th width="20%">Kategori Bakat</th>
                        <th width="15%">Status File</th>
                        <th width="30%" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query_str = "SELECT * FROM peserta ORDER BY id DESC";
                    if(isset($_GET['cari'])) {
                        $cari = mysqli_real_escape_string($conn, $_GET['cari']);
                        $query_str = "SELECT * FROM peserta WHERE nama LIKE '%$cari%' OR bakat LIKE '%$cari%' ORDER BY id DESC";
                    }
                    $query_peserta = mysqli_query($conn, $query_str);

                    while($row = mysqli_fetch_array($query_peserta)) {
                    ?>
                    <tr>
                        <td class="text-muted fw-bold">#<?= sprintf("%03d", $no++) ?></td>
                        <td class="fw-medium text-white"><?= htmlspecialchars($row['nama']) ?></td>
                        <td><span class="text-muted"><?= htmlspecialchars($row['bakat']) ?></span></td>
                        <td><span class="badge-soft">Complete</span></td>
                        <td class="text-end">
                            <button class="btn btn-glass btn-sm px-3" data-bs-toggle="modal" data-bs-target="#detailModal<?= $row['id'] ?>">Review</button>
                            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger-glass btn-sm ms-2 px-3" onclick="return confirm('Hapus data peserta ini secara permanen?')">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
if(mysqli_num_rows($query_peserta) > 0) {
    mysqli_data_seek($query_peserta, 0); 
    while($row = mysqli_fetch_array($query_peserta)) {
?>
<div class="modal fade" id="detailModal<?= $row['id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header border-bottom border-secondary border-opacity-25 pb-3">
                <div>
                    <h5 class="modal-title fw-bold text-white mb-1"><?= htmlspecialchars($row['nama']) ?></h5>
                    <p class="text-accent mb-0 small text-muted"><?= htmlspecialchars($row['bakat']) ?> Applicant</p>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body p-4">
                <h6 class="text-muted text-uppercase small fw-bold mb-3">Portfolio (Foto/PDF)</h6>
                <div class="mb-4">
                    <?php 
                    if(!empty($row['berkas'])) {
                        $ext = strtolower(pathinfo($row['berkas'], PATHINFO_EXTENSION));
                        if(in_array($ext, ['jpg','jpeg','png'])) {
                            echo "<img src='uploads/".htmlspecialchars($row['berkas'])."' alt='Berkas' class='rounded shadow-sm' style='max-width: 100%; height: auto; max-height: 300px; object-fit: contain; border: 1px solid rgba(255,255,255,0.1);'>";
                        } else {
                            echo "<a href='uploads/".htmlspecialchars($row['berkas'])."' target='_blank' class='btn btn-glass d-flex flex-column justify-content-center align-items-center' style='width: fit-content; padding: 10px 20px;'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='mb-1'><path d='M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z'></path><polyline points='14 2 14 8 20 8'></polyline></svg><span style='font-size: 0.8rem;'>View Document</span></a>";
                        }
                    } else {
                        echo "<span class='text-muted small'>No portfolio file attached.</span>";
                    }
                    ?>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <h6 class="text-muted text-uppercase small fw-bold mb-3">Video Casting</h6>
                        <?php if(!empty($row['video'])): ?>
                            <video width="100%" height="200" controls class="rounded shadow-sm" style="background: #000; border: 1px solid var(--glass-border);">
                                <source src="uploads/<?= htmlspecialchars($row['video']) ?>" type="video/mp4">
                            </video>
                        <?php else: ?>
                            <div class="p-3 rounded d-flex align-items-center justify-content-center h-100" style="background: rgba(0,0,0,0.2); border: 1px dashed var(--glass-border); height: 200px !important;">
                                <span class="text-muted small">No video uploaded</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 mb-4">
                        <h6 class="text-muted text-uppercase small fw-bold mb-3">Audio Sample</h6>
                        <div class="p-3 rounded d-flex align-items-center justify-content-center h-100" style="background: rgba(0,0,0,0.2); border: 1px dashed var(--glass-border); height: 200px !important;">
                            <?php if(!empty($row['audio'])): ?>
                                <audio controls class="w-100"><source src="uploads/<?= htmlspecialchars($row['audio']) ?>" type="audio/mpeg"></audio>
                            <?php else: ?>
                                <span class="text-muted small">No audio uploaded</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <h6 class="text-muted text-uppercase small fw-bold mb-3">Digital Signature Verification</h6>
                <div class="p-2 rounded bg-white" style="width: fit-content;">
                    <img src="uploads/<?= htmlspecialchars($row['ttd']) ?>" alt="Tanda Tangan" style="height: 80px; object-fit: contain;">
                </div>
            </div>

            <div class="modal-footer border-top border-secondary border-opacity-25 pt-3">
                <button type="button" class="btn btn-glass px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php } } ?>