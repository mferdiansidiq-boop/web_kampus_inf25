<!-- inner page banner -->
<div class="dlab-bnr-inr bg-pt" style="background-image:url(<?= base_url('uploads/foto/banner.jpeg') ?>); min-height: 250px; display: flex; align-items: center; position: relative;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.4);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="dlab-bnr-inr-entry text-center">
            <h1 class="text-white">Struktur Organisasi</h1>
            
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row mt-3">
                <ul class="list-inline text-white">
                    <li><a href="<?= base_url() ?>">Profile</a> > Struktur Organisasi</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>
<!-- inner page banner END -->
 <p>

 
 </p>


<!-- Content -->
<div class="section-full bg-white content-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <h2 class="m-b20">Struktur Organisasi <?= $setting_front['nama_kampus'] ?></h2>
                <div class="dlab-separator-outer">
                    <div class="dlab-separator bg-primary style-skew mx-auto" style="width:80px"></div>
                </div>

                <div class="pt-4 text-justify">
                    <img src="<?= base_url('uploads/kampus/'. $setting_front['organisasi']) ?>" width="100%" alt="">
                </div>
            </div>
        </div>
    </div>
</div>