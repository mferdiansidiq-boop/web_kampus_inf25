
<div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $judul ?></h3>

                <div class="card-tools">
                  <a href="<?= base_url('admin/dosen/input') ?>" class="btn btn-flat btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                //notif insert data
                if(session()->getFlashdata('insert')){
                  echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                  echo session()->getFlashdata('insert');
                  echo '</h5></div>';
                }

                 //notif update data
                 if(session()->getFlashdata('delete')){
                  echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                  echo session()->getFlashdata('delete');
                  echo '</h5></div>';
                }

                ?>
              <table class="table table-bordered table-sm">
                <tr class="text-center">
                    <th width="50px">No</th>
                    <th>Nama Dosen</th>
                    <th>NIP</th>
                    <th>Program Studi</th>
                    <th>Aksi</th>
                </tr>
                <?php $no = 1;
                foreach ($dosen as $key => $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $value['nama_dosen'] ?></td>
                        <td class="text-center"><?= $value['nip'] ?></td>
                        <td class="text-center"><?= $value['nama_prodi'] ?></td>
                        <td class="text-center" width="250px">
                          <a href="<?= base_url('Admin/Dosen/detail/'.$value['id_dosen']) ?>" class="btn btn-flat btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-flat btn-warning btn-sm" href="<?= base_url('Admin/Dosen/edit/'.$value['id_dosen']) ?>"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-flat btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ?')" href="<?= base_url('Admin/Dosen/delete/'.$value['id_dosen']) ?>"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
              
            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
