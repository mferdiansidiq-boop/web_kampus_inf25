<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('admin/slider') ?>" class="btn btn-flat btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <?php 
            session();
            $validation = \Config\Services::validation();
            $validationErrors = session()->getFlashdata('validation_errors') ?? [];
            $oldInput = session()->getFlashdata('old_input') ?? [];
            ?>
            
            <!-- Alert untuk error validasi -->
            <?php if (!empty($validationErrors)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="alert-heading">
                        <i class="fas fa-exclamation-triangle"></i> Validasi Gagal
                    </h5>
                    <hr>
                    <ul class="mb-0">
                        <?php foreach ($validationErrors as $field => $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('admin/slider/store') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                
                <div class="form-group">
                    <label for="judul_slider">Judul Slider <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= !empty($validationErrors['judul_slider']) ? 'is-invalid' : '' ?>" 
                           id="judul_slider" name="judul_slider" 
                           placeholder="Masukkan Judul Slider" 
                           value="<?= $oldInput['judul_slider'] ?? '' ?>" >
                    <?php if (!empty($validationErrors['judul_slider'])): ?>
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-circle"></i> <?= $validationErrors['judul_slider'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="url_terkait">URL Terkait <span class="text-danger">*</span></label>
                    <input type="url" class="form-control <?= !empty($validationErrors['url_terkait']) ? 'is-invalid' : '' ?>" 
                           id="url_terkait" name="url_terkait" 
                           placeholder="https://example.com" 
                           value="<?= $oldInput['url_terkait'] ?? '' ?>" >
                    <?php if (!empty($validationErrors['url_terkait'])): ?>
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-circle"></i> <?= $validationErrors['url_terkait'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="gambar_slider">Gambar Slider <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= !empty($validationErrors['gambar_slider']) ? 'is-invalid' : '' ?>" 
                                   id="gambar_slider" name="gambar_slider" 
                                   accept="image/*"  onchange="previewImage(event)">
                            <label class="custom-file-label" for="gambar_slider">Pilih file</label>
                        </div>
                    </div>
                    <small class="text-muted d-block mt-2">Format: JPG, PNG, GIF (Ukuran maksimal: 5MB, Rekomendasi: 1920x600px)</small>
                    <?php if (!empty($validationErrors['gambar_slider'])): ?>
                        <div class="text-danger small mt-2">
                            <i class="fas fa-exclamation-circle"></i> <?= $validationErrors['gambar_slider'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <div id="preview-container" style="margin-top: 15px;">
                        <img id="preview" src="" alt="Preview" style="max-width: 100%; max-height: 300px; display: none; border: 1px solid #ddd; padding: 5px;">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="<?= base_url('admin/slider') ?>" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    const fileName = file?.name || 'Pilih file';
    
    // Update file label
    document.querySelector('.custom-file-label').textContent = fileName;
    
    // Show preview
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('preview');
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
}
</script>