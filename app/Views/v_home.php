 <div class="card-body p-0">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <?php if (!empty($sliders) && is_array($sliders)): ?>
                        <?php foreach($sliders as $index => $a): ?>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $index ?>" class="<?= $index == 0 ? 'active' : '' ?>" aria-current="true"></button>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true"></button>
                    <?php endif; ?>
                  </div>
                  <div class="carousel-inner">
                    <?php if (!empty($sliders) && is_array($sliders)): ?>
                        <?php $counter = 0; ?>
                        <?php foreach($sliders as $key => $a): $counter++; ?>
                        <div class="carousel-item <?= $counter == 1 ? 'active' : '' ?>">
                          <img class="d-block w-100" src="<?= base_url('uploads/slider/'.$a['gambar_slider']) ?>" alt="<?= esc($a['judul_slider']) ?>" style="height: 500px; object-fit: cover;">
                          <div class="carousel-caption d-none d-md-block">
                            <h5><?= esc($a['judul_slider']) ?></h5>
                            <a href="<?= esc($a['url_terkait']) ?>" class="btn btn-sm btn-light">Learn More</a>
                          </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="https://via.placeholder.com/1200x500/667eea/ffffff?text=No+Slider" alt="No Slider" style="height: 500px; object-fit: cover;">
                          <div class="carousel-caption d-none d-md-block">
                            <h5>Tidak Ada Slider</h5>
                          </div>
                        </div>
                    <?php endif; ?>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
<!-- Welcome / Intro Section -->
<section class="welcome-section py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-4 text-center mb-3 mb-md-0">
        <div class="card shadow-sm" style="border:0;">
          <img src="<?= base_url('uploads/foto/'.$setting['foto_pimpinan']) ?>" class="img-fluid" alt="Foto Pimpinan" style="border-radius:4px;">
          <div class="mt-3" style="background:#fff; padding:6px 10px; border-top:3px solid #0f7a3a;">
            <strong><?= $setting['nama_pimpinan'] ?></strong>
            <div class="text-muted small">Rektor</div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <h2>Selamat Datang di <span style="color:#0f7a3a"><?= $setting['nama_kampus'] ?></span></h2>
        <p class="text-justify"> <?= $setting['sambutan'] ?>
        </p>
      </div>
    </div>
  </div>
</section>

<script>
// Initialize Bootstrap Carousel
document.addEventListener('DOMContentLoaded', function() {
    const carouselElement = document.getElementById('carouselExampleIndicators');
    if (carouselElement) {
        const carousel = new bootstrap.Carousel(carouselElement, {
            interval: 5000,  // Auto-slide setiap 5 detik
            wrap: true,      // Loop carousel
            keyboard: true   // Support keyboard navigation
        });
    }
});
</script>