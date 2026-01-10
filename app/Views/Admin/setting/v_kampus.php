<div class="col-md-12">
    <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $judul ?></h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php 
              session();
              $validation = \Config\Services::validation();
              ?>
              <?php echo form_open_multipart('admin/setting/update_kampus') ?>

               <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <label>Nama Kampus</label>
                    <input type="text" name="nama_kampus" value="<?= $setting['nama_kampus'] ?? '' ?>" placeholder="Nama Kampus" class="form-control <?= isset(session('errors')['nama_kampus']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['nama_kampus'] ?? '' ?>
                    </div>
                  </div>
                  </div>
                  </div>
                <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <label>Alamat Kampus</label>
                    <input type="text" name="alamat" value="<?= $setting['alamat'] ?? '' ?>" placeholder="Alamat" class="form-control <?= isset(session('errors')['alamat']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['alamat'] ?? '' ?>
                    </div>
                  </div>                        
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" value="<?= $setting['no_telp'] ?? '' ?>" placeholder="Nomor Telepon" class="form-control <?= isset(session('errors')['no_telp']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['no_telp'] ?? '' ?>
                    </div>
                  </div>                        
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" value="<?= $setting['email'] ?? '' ?>" placeholder="Email" class="form-control <?= isset(session('errors')['email']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['email'] ?? '' ?>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                    <div class="form-group">
                    <label>Jam Opasional</label>
                    <input type="text" name="operasional" value="<?= $setting['operasional'] ?? '' ?>" placeholder="Jam Opasional" class="form-control <?= isset(session('errors')['operasional']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['operasional'] ?? '' ?>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                    <label>Link Youtube Kapmpus</label>
                    <input type="text" name="youtube" value="<?= $setting['youtube'] ?? '' ?>" placeholder="Link Youtube" class="form-control <?= isset(session('errors')['youtube']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['youtube'] ?? '' ?>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                    <div class="form-group">
                    <label>Link Instagram Kampus</label>
                    <input type="text" name="instagram" value="<?= $setting['instagram'] ?? '' ?>" placeholder="Link Instagram" class="form-control <?= isset(session('errors')['instagram']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['instagram'] ?? '' ?>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                    <label>Link Facebook Kampus</label>
                    <input type="text" name="facebook" value="<?= $setting['facebook'] ?? '' ?>" placeholder="Link Facebook" class="form-control <?= isset(session('errors')['facebook']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['facebook'] ?? '' ?>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                    <label>Link Twitter Kampus</label>
                    <input type="text" name="twiter" value="<?= $setting['twiter'] ?? '' ?>" placeholder="Link Twitter" class="form-control <?= isset(session('errors')['twiter']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['twiter'] ?? '' ?>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                    <label>Link Linkedin Kampus</label>
                    <input type="text" name="linkedin" value="<?= $setting['linkedin'] ?? '' ?>" placeholder="Link Linkedin" class="form-control <?= isset(session('errors')['linkedin']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['linkedin'] ?? '' ?>
                    </div>
                  </div>
                  </div>
                </div>        
            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('admin/user') ?>"class="btn btn-success btn-flat">Kembali</a>

              <?php echo form_close() ?>

        </div>
    </div>
</div>