<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('admin/dosen') ?>" class="btn btn-flat btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <?php if (!empty($dosen)): ?>
                <div class="row">
                    <div class="col-md-4">
                        <?php if (!empty($dosen['foto'])): ?>
                            <img src="<?= base_url('foto/dosen/' . esc($dosen['foto'])) ?>" alt="Foto Dosen" class="img-fluid" style="max-width: 100%; border: 1px solid #ddd; padding: 5px;">
                        <?php else: ?>
                            <div class="alert alert-info">Tidak ada foto</div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tr>
                                <td style="width: 35%;"><strong>Nama Dosen</strong></td>
                                <td><?= esc($dosen['nama_dosen']) ?></td>
                            </tr>
                            <tr>
                                <td><strong>NIP</strong></td>
                                <td><?= esc($dosen['nip']) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Pendidikan Terakhir</strong></td>
                                <td><?= esc($dosen['pendidikan_terakhir']) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Jenis Kelamin</strong></td>
                                <td><?= $dosen['jenis_kelamin'] == 'Laki-laki' ? 'Laki-laki' : 'Perempuan' ?></td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td><?= esc($dosen['email']) ?></td>
                            </tr>
                            <tr>
                                <td><strong>No. Telepon</strong></td>
                                <td><?= esc($dosen['no_telp']) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Alamat</strong></td>
                                <td><?= esc($dosen['alamat']) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Program Studi</strong></td>
                                <td><?= esc($dosen['nama_prodi'] ?? 'N/A') ?></td>
                            </tr>
                        </table>

                        <div class="mt-3">
                            <a href="<?= base_url('admin/dosen/edit/' . $dosen['id_dosen']) ?>" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= base_url('admin/dosen/delete/' . $dosen['id_dosen']) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                            <a href="<?= base_url('admin/dosen') ?>" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Tutup
                            </a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-warning">Data dosen tidak ditemukan</div>
            <?php endif; ?>
        </div>
    </div>
</div>
