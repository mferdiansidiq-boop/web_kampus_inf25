<!-- inner page banner -->
<div class="dlab-bnr-inr bg-pt" style="background-image:url(<?= base_url('uploads/foto/banner.jpeg') ?>); min-height: 250px; display: flex; align-items: center; position: relative;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.4);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="dlab-bnr-inr-entry text-center">
            <h1 class="text-white">Prodi <?= $prodi['nama_prodi'] ?></h1>
            <div class="breadcrumb-row mt-3">
                <ul class="list-inline text-white">
                    <li><a href="<?= base_url() ?>">Profile</a> > Prodi <?= $prodi['nama_prodi'] ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- inner page banner END -->

<!-- Content -->
<div class="section-full bg-white content-inner" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <h2 class="m-b20" data-aos="zoom-in" data-aos-delay="200">Prodi <?= $prodi['nama_prodi'] ?></h2>
                <div class="dlab-separator-outer" data-aos="zoom-in" data-aos-delay="300">
                    <div class="dlab-separator bg-primary style-skew mx-auto" style="width:80px"></div>
                </div>

                <div class="pt-4 text-justify" data-aos="fade-up" data-aos-delay="400">
                    <p><?= $prodi['deskripsi_prodi'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Dosen Section -->
<div class="section-full bg-light content-inner" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center m-b30" data-aos="zoom-in">Tim Pengajar - <?= $prodi['nama_prodi'] ?></h3>
                <div class="dlab-separator-outer text-center" data-aos="zoom-in" data-aos-delay="200">
                    <div class="dlab-separator bg-primary style-skew mx-auto" style="width:80px"></div>
                </div>

                <?php if (!empty($dosen) && is_array($dosen)): ?>
                    <div class="row m-t30">
                        <?php $delay = 300; foreach ($dosen as $d): ?>
                            <div class="col-lg-4 col-md-6 m-b30" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                                <div class="card card-dosen shadow-sm h-100">
                                    <div class="card-img-wrapper" style="height: 250px; overflow: hidden; background: #f0f0f0;">
                                        <?php if (!empty($d['foto'])): ?>
                                            <img src="<?= base_url('foto/dosen/' . esc($d['foto'])) ?>" alt="<?= esc($d['nama_dosen']) ?>" class="card-img-top" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                                        <?php else: ?>
                                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: #e9ecef;">
                                                <i class="fas fa-user-tie" style="font-size: 60px; color: #ccc;"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= esc($d['nama_dosen']) ?></h5>
                                        <p class="card-text small text-muted">
                                            <strong>NIP:</strong> <?= esc($d['nip']) ?><br>
                                            <strong>Pendidikan:</strong> <?= esc($d['pendidikan_terakhir']) ?><br>
                                            <strong>Jenis Kelamin:</strong> <?= $d['jenis_kelamin'] == 'Laki-laki' ? 'Laki-laki' : 'Perempuan' ?>
                                        </p>
                                        <p class="card-text small">
                                            <strong>Email:</strong> <a href="mailto:<?= esc($d['email']) ?>"><?= esc($d['email']) ?></a><br>
                                            <strong>Telp:</strong> <?= esc($d['no_telp']) ?>
                                        </p>
                                        <p class="card-text small">
                                            <strong>Alamat:</strong><br><?= esc($d['alamat']) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php $delay += 100; endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info text-center m-t30" data-aos="fade-up">
                        <p>Belum ada data dosen untuk program studi ini</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>