<div class="col-sm-12"></div>
    <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Data <?= $judul ?></h3>

                <div class="card-tools">
                <a type="button" class="btn btn-xm btn-flat btn- primary" ><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class=" table table-bordered table-sm">
                    <tr calss="text-center">
                        <th width>No</th>
                        <th>Nama User</th>
                        <th>username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no=1; foreach ($user as $key => $value) { ?>
                        <tr>
                            <td  calss="text-center"><?= $no++ ?></td>
                            <td><?= $value['nama_user'] ?></td>
                            <td  calss="text-center"><?= $value['username'] ?></td>
                            <td  calss="text-center"><?= $value['level'] == 1 ? ' Admin' : 'User'?></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <!-- /.card-body -->
    </div>
</div>