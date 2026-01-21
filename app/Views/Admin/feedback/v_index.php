<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><?= $judul ?></h3>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <?php
      //notif insert data
      if (session()->getFlashdata('insert')) {
        echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('insert');
        echo '</h5></div>';
      }

      //notif update data
      if (session()->getFlashdata('delete')) {
        echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('delete');
        echo '</h5></div>';
      }

      ?>
      <table id="example2" class="table table-bordered table-striped">
        <thead>
          <tr class="text-center">
            <th width="50px">No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Keluhan</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th>Keterangan</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($feedback) && is_array($feedback)) {
            $no = 1;
            foreach ($feedback as $key => $value) {
          ?>
              <tr class="text-center">
                <td><?= $no++ ?></td>
                <td><?= $value['nama'] ?></td>
                <td><?= $value['jenis_kelamin'] ?></td>
                <td><?= $value['keluhan'] ?></td>
                <td>
                  <?= htmlspecialchars($value['alamat']) ?>,
                  <?= htmlspecialchars($value['desa']) ?>,
                  <?= htmlspecialchars($value['kecamatan']) ?>,
                  <?= htmlspecialchars($value['kabupaten']) ?>,
                  <?= htmlspecialchars($value['provinsi']) ?>
                </td>
                <td><?php if (!empty($value['foto']) && file_exists(FCPATH . 'uploads/feedback/' . $value['foto'])): ?>
                    <img src="<?= base_url('uploads/feedback/' . esc($value['foto'])) ?>" width="150">
                  <?php else: ?>
                    <span class="text-muted">Tidak ada foto</span>
                  <?php endif ?>
                </td>
                <td><?= $value['keterangan'] ?></td>
                <td>
                  <a href="<?= base_url('admin/feedback/edit/' . $value['id_feedback']) ?>" class="btn btn-sm btn-warning btn-flat"><i class="fas fa-edit"></i></a>
                  <a href="<?= base_url('admin/feedback/delete/' . $value['id_feedback']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-sm btn-danger btn-flat"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
          <?php
            }
          } else {
            echo '<tr><td colspan="8" class="text-center">Tidak ada data Feedback</td></tr>';
          }
          ?>
        </tbody>
      </table>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>