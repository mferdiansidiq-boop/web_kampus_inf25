<div class="col-sm-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i>
                    Tambah
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <?php
            if (session()->getFlashdata('insert')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><i class="icon fas fa-check"></i></strong> ';
                echo session()->getFlashdata('insert');
                echo '</div>';
            }

            if (session()->getFlashdata('update')) {
                echo '<div class="alert alert-primary alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><i class="icon fas fa-sync"></i></strong> ';
                echo session()->getFlashdata('update');
                echo '</div>';
            }

            if (session()->getFlashdata('delete')) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><i class="icon fas fa-trash"></i></strong> ';
                echo session()->getFlashdata('delete');
                echo '</div>';
            }
            ?>

            <table class="table table-bordered table-sm">
                <tr class="text-center">
                    <th width="50px">No</th>
                    <th>Nama App</th>
                    <th>Link App</th>
                    <th>Aksi</th>
                </tr>
                <?php $no = 1;
                foreach ($app as $key => $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $value['nama_app'] ?></td>
                        <td class="text-center"><?= $value['link_app'] ?></td>
                        <td class="text-center" width="250px">
                            <button class="btn btn-flat btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_app'] ?>"><i class="fas fa-pencil-alt"></i></button>
                            <a class="btn btn-flat btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ?')" href="<?= base_url('Admin/App/delete/'.$value['id_app']) ?>"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <?= form_open('Admin/App/insert') ?>
            <div class="modal-header">
                <h4 class="modal-title">Tambah App</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama App</label>
                    <input name="nama_app" class="form-control" placeholder="Nama App" required>
                </div>
                <div class="form-group">
                    <label>Link App</label>
                    <input name="link_app" class="form-control" placeholder="Link App" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Edit -->
<?php foreach ($app as $key => $value) { ?>

    <div class="modal fade" id="edit<?= $value['id_app'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <?= form_open('Admin/App/update/'.$value['id_app']) ?>
                <div class="modal-header">
                    <h4 class="modal-title">Edit App</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama App</label>
                        <input name="nama_app" value="<?= $value['nama_app'] ?>" class="form-control" placeholder="Nama App" required>
                    </div>
                    <div class="form-group">
                        <label>Link App</label>
                        <input name="link_app"value="<?= $value['link_app'] ?>" class="form-control" placeholder="Link App" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
                </div>
                <?= form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<?php } ?>

