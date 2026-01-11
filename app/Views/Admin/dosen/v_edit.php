<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('admin/Dosen') ?>" class="btn btn-flat btn-secondary btn-sm">
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

            <form action="<?= base_url('admin/dosen/update/' . $dosen['id_dosen']) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                
                <div class="form-group">
                    <label for="nama_dosen">Nama Dosen</label>
                    <input type="text" class="form-control <?= !empty($validationErrors['nama_dosen']) ? 'is-invalid' : '' ?>" 
                           id="nama_dosen" name="nama_dosen" 
                           placeholder="Masukkan Nama Dosen" 
                           value="<?= !empty($oldInput['nama_dosen']) ? $oldInput['nama_dosen'] : $dosen['nama_dosen'] ?>" required>
                    <?php if (!empty($validationErrors['nama_dosen'])): ?>
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-circle"></i> <?= $validationErrors['nama_dosen'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control <?= !empty($validationErrors['nip']) ? 'is-invalid' : '' ?>" 
                           id="nip" name="nip" 
                           placeholder="Masukkan NIP" 
                           value="<?= !empty($oldInput['nip']) ? $oldInput['nip'] : $dosen['nip'] ?>" required>
                    <?php if (!empty($validationErrors['nip'])): ?>
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-circle"></i> <?= $validationErrors['nip'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                    <input type="text" class="form-control <?= !empty($validationErrors['pendidikan_terakhir']) ? 'is-invalid' : '' ?>" 
                           id="pendidikan_terakhir" name="pendidikan_terakhir" 
                           placeholder="Masukkan Pendidikan Terakhir" 
                           value="<?= !empty($oldInput['pendidikan_terakhir']) ? $oldInput['pendidikan_terakhir'] : $dosen['pendidikan_terakhir'] ?>" required>
                    <?php if (!empty($validationErrors['pendidikan_terakhir'])): ?>
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-circle"></i> <?= $validationErrors['pendidikan_terakhir'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                     <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control <?= !empty($validationErrors['jenis_kelamin']) ? 'is-invalid' : '' ?>" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" <?= (isset($oldInput['jenis_kelamin']) && $oldInput['jenis_kelamin'] == 'Laki_laki') || (!isset($oldInput['jenis_kelamin']) && ($dosen['jenis_kelamin'] == 'Laki_laki' || $dosen['jenis_kelamin'] == 'Laki-laki')) ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="Perempuan" <?= (isset($oldInput['jenis_kelamin']) && $oldInput['jenis_kelamin'] == 'Perempuan') || (!isset($oldInput['jenis_kelamin']) && $dosen['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                    <?php if (!empty($validationErrors['jenis_kelamin'])): ?>
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-circle"></i> <?= $validationErrors['jenis_kelamin'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control <?= !empty($validationErrors['email']) ? 'is-invalid' : '' ?>" 
                           id="email" name="email" 
                           placeholder="Masukkan Email" 
                           value="<?= !empty($oldInput['email']) ? $oldInput['email'] : $dosen['email'] ?>" required>
                    <?php if (!empty($validationErrors['email'])): ?>
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-circle"></i> <?= $validationErrors['email'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="text" class="form-control <?= !empty($validationErrors['no_telp']) ? 'is-invalid' : '' ?>" 
                           id="no_telp" name="no_telp" 
                           placeholder="Masukkan Nomor Telepon" 
                           value="<?= !empty($oldInput['no_telp']) ? $oldInput['no_telp'] : $dosen['no_telp'] ?>" required>
                    <?php if (!empty($validationErrors['no_telp'])): ?>
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-circle"></i> <?= $validationErrors['no_telp'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea type="text" class="form-control <?= !empty($validationErrors['alamat']) ? 'is-invalid' : '' ?>" 
                           id="alamat" name="alamat" 
                           placeholder="Masukkan Alamat" 
                           value="<?= !empty($oldInput['alamat']) ? $oldInput['alamat'] : $dosen['alamat'] ?>" required><?= $dosen['alamat'] ?></textarea>
                    <?php if (!empty($validationErrors['alamat'])): ?>
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-circle"></i> <?= $validationErrors['alamat'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="id_prodi">Nama Prodi <span class="text-danger">*</span></label>
                    <select id="id_prodi" name="id_prodi" class="form-control <?= !empty($validationErrors['id_prodi']) ? 'is-invalid' : '' ?>">
                        <option value="">-- Pilih Prodi --</option>
                        <?php if (!empty($prodi) && is_array($prodi)): ?>
                            <?php foreach ($prodi as $p): ?>
                                <option value="<?= $p['id_prodi'] ?>" <?= ((isset($oldInput['id_prodi']) && $oldInput['id_prodi'] == $p['id_prodi']) || $dosen['id_prodi'] == $p['id_prodi']) ? 'selected' : '' ?>><?= esc($p['nama_prodi'] ?? $p['prodi'] ?? $p['nama']) ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <?php if (!empty($validationErrors['id_prodi'])): ?>
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-circle"></i> <?= $validationErrors['id_prodi'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="foto">Foto Dosen</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= !empty($validationErrors['foto']) ? 'is-invalid' : '' ?>" 
                                   id="foto" name="foto" 
                                   accept="image/*" onchange="previewImage(event)">
                            <label class="custom-file-label" for="foto">Pilih file (Kosongkan jika tidak ingin mengubah)</label>
                        </div>
                    </div>
                    <small class="text-muted d-block mt-2">Format: JPG, PNG, GIF (Ukuran maksimal: 5MB, Rekomendasi: 3x4)</small>
                    <?php if (!empty($validationErrors['foto'])): ?>
                        <div class="text-danger small mt-2">
                            <i class="fas fa-exclamation-circle"></i> <?= $validationErrors['foto'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Gambar Lama -->
                <div class="form-group">
                    <label>Gambar Saat Ini:</label>
                    <div>
                        <img src="<?= base_url('foto/dosen/' . $dosen['foto']) ?>" alt="Foto Dosen" style="max-width: 100%; max-height: 300px; border: 1px solid #ddd; padding: 5px;">
                    </div>
                </div>

                <!-- Preview Gambar Baru -->
                <div class="form-group">
                    <div id="preview-container" style="margin-top: 15px;">
                        <img id="preview" src="" alt="Preview" style="max-width: 100%; max-height: 300px; display: none; border: 1px solid #ddd; padding: 5px;">
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="<?= base_url('admin/dosen') ?>" class="btn btn-secondary">
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
    const fileName = file?.name || 'Pilih file (Kosongkan jika tidak ingin mengubah)';
    
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