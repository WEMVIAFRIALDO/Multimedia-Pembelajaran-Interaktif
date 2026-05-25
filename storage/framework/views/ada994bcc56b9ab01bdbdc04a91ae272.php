

<?php $__env->startSection('title', 'Pilih Mood Kamu Hari Ini'); ?>

<?php $__env->startSection('content'); ?>
<style>
  /* Override parent container padding to allow full-width background */
  .max-w-7xl.mx-auto { max-width: none; padding: 0; margin: 0; }
  body > main { padding: 0; margin: 0; }
</style>
<link rel="stylesheet" href="<?php echo e(asset('css/mood-selection.css')); ?>">
<div class="mood-page" role="main">
  <div class="mood-page__bg" aria-hidden="true"></div>

  <header class="mood-header">
    <p class="kicker">PILIH MOOD KAMU HARI INI</p>
    <h1 class="title">Pilih Mood Kamu Hari Ini</h1>
    <p class="subtitle">Pilih suasana belajar yang paling cocok untukmu hari ini. Setiap mood menghadirkan pengalaman pembelajaran adaptif dengan nuansa visual yang berbeda.</p>
  </header>

  <section class="mood-grid" aria-label="Pemilihan mood">
    <!-- Fokus Card -->
    <button class="mood-card mood-card--fokus" data-mood="fokus" data-bg="radial-gradient(circle at top, rgba(255,230,205,0.55), transparent 55%)" data-border="#f59e0b" data-text="#111827" aria-pressed="false">
      <div class="mood-card__art mood-card__art--fokus">
        <!-- Image: user dapat upload ke public/images/mood/fokus.png -->
        <img src="<?php echo e(asset('images/mood/fokus.png')); ?>" alt="Fokus mood illustration" class="mood-card__image" onerror="this.style.display='none'">
        <!-- Fallback CSS art jika image tidak ada -->
        <div class="art-glass-panel"></div>
        <div class="art-stack"></div>
        <div class="art-bulb"></div>
        <div class="art-glow"></div>
      </div>
      <div>
        <div class="mood-card__label">Fokus</div>
      </div>
    </button>

    <!-- Santai Card -->
    <button class="mood-card mood-card--santai" data-mood="santai" data-bg="radial-gradient(circle at top, rgba(219,234,254,0.55), transparent 55%)" data-border="#0ea5e9" data-text="#0f172a" aria-pressed="false">
      <div class="mood-card__art mood-card__art--santai">
        <!-- Image: user dapat upload ke public/images/mood/santai.png -->
        <img src="<?php echo e(asset('images/mood/santai.png')); ?>" alt="Santai mood illustration" class="mood-card__image" onerror="this.style.display='none'">
        <!-- Fallback CSS art jika image tidak ada -->
        <div class="art-glass-panel"></div>
        <div class="art-pond"></div>
        <div class="art-stone art-stone--one"></div>
        <div class="art-stone art-stone--two"></div>
        <div class="art-stream"></div>
      </div>
      <div>
        <div class="mood-card__label">Santai</div>
      </div>
    </button>

    <!-- Lelah Card -->
    <button class="mood-card mood-card--lelah" data-mood="lelah" data-bg="radial-gradient(circle at top, rgba(237,233,254,0.55), transparent 55%)" data-border="#8b5cf6" data-text="#111827" aria-pressed="false">
      <div class="mood-card__art mood-card__art--lelah">
        <!-- Image: user dapat upload ke public/images/mood/lelah.png -->
        <img src="<?php echo e(asset('images/mood/lelah.png')); ?>" alt="Lelah mood illustration" class="mood-card__image" onerror="this.style.display='none'">
        <!-- Fallback CSS art jika image tidak ada -->
        <div class="art-glass-panel"></div>
        <div class="art-sofa"></div>
        <div class="art-pillows"></div>
        <div class="art-zz">
          <span>Z</span><span>z</span>
        </div>
      </div>
      <div>
        <div class="mood-card__label">Lelah</div>
      </div>
    </button>
  </section>

  <div class="mood-actions">
    <button type="button" class="btn btn--primary" id="confirmMood">Pilih Mood</button>
  </div>

</div>

<script src="<?php echo e(asset('js/mood-selection.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kuliah\WEMVI\Semester 4\Multimedia Pembelajaran Interaktif\Project\mood-sync\resources\views/mood_selection.blade.php ENDPATH**/ ?>