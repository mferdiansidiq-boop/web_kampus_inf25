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

            <form action="<?= base_url('admin/prodi/insert') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                
                <div class="form-group">
                    <label for="nama_prodi">Nama Prodi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= !empty($validationErrors['nama_prodi']) ? 'is-invalid' : '' ?>" 
                           id="nama_prodi" name="nama_prodi" 
                           placeholder="Masukkan Nama Prodi" 
                           value="<?= $oldInput['nama_prodi'] ?? '' ?>" >
                    <?php if (!empty($validationErrors['nama_prodi'])): ?>
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-circle"></i> <?= $validationErrors['nama_prodi'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="row">
              <div class="col-md-12">
                <div class="card card-outline card-info">
                  <div class="card-header">
                    <h3 class="card-title">
                      Deskripsi Prodi
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <textarea class="summernote" name="deskripsi_prodi">
                      <?= $prodi['deskripsi_prodi'] ?? '' ?>
                    </textarea>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              <!-- /.col-->
            </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="<?= base_url('admin/prodi') ?>" class="btn btn-secondary">
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