

<?php $__env->startSection('title', 'Video: ' . $material->title); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-slate-950 py-10">
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-12">
                <div class="card mood-<?php echo e(session('user_mood', 'biasa')); ?> video-page-card bg-slate-900/80 border border-white/10 shadow-2xl">
                    <div class="card-header border-0 bg-transparent px-0 pb-0">
                        <h2 class="card-title text-white">
                            <i class="fas fa-video"></i> <?php echo e($material->title); ?>

                        </h2>
                        <p class="card-subtitle text-slate-400"><?php echo e($material->ringkasan); ?></p>
                        <div class="breadcrumb-nav">
                            <a href="<?php echo e(route('video.index')); ?>" class="breadcrumb-link text-slate-200 hover:text-white">
                                <i class="fas fa-home"></i> Video
                            </a>
                            <span class="breadcrumb-separator">></span>
                            <a href="<?php echo e(route('video.jurusan', $kelas)); ?>" class="breadcrumb-link text-slate-200 hover:text-white">Kelas <?php echo e($kelas); ?></a>
                            <span class="breadcrumb-separator">></span>
                            <a href="<?php echo e(route('video.mataPelajaran', ['kelas' => $kelas, 'jurusan' => $jurusan])); ?>" class="breadcrumb-link text-slate-200 hover:text-white"><?php echo e($jurusan); ?></a>
                            <span class="breadcrumb-separator">></span>
                            <span class="breadcrumb-current text-slate-400"><?php echo e($material->mata_pelajaran); ?></span>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Video Player -->
                        <div class="video-container mb-4">
                            <?php if($material->video_url): ?>
                                <?php
                                    $videoId = '';
                                    if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $material->video_url, $matches)) {
                                        $videoId = $matches[1];
                                    }
                                ?>

                                <?php if($videoId): ?>
                                    <div class="ratio ratio-16x9 rounded-3xl overflow-hidden border border-white/10 shadow-lg">
                                        <iframe src="https://www.youtube.com/embed/<?php echo e($videoId); ?>"
                                                title="<?php echo e($material->title); ?>"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>
                                        </iframe>
                                    </div>
                                <?php else: ?>
                                    <div class="alert alert-warning bg-slate-800 border border-white/10 text-slate-100">
                                        <i class="fas fa-exclamation-triangle"></i> URL video tidak valid atau tidak didukung.
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="alert alert-info bg-slate-800 border border-white/10 text-slate-100">
                                    <i class="fas fa-info-circle"></i> Video belum tersedia untuk materi ini.
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Navigation -->
                        <div class="video-navigation mb-4">
                            <div class="d-flex justify-content-between">
                                <?php if($previousMaterial): ?>
                                    <a href="<?php echo e(route('video.show', ['kelas' => $kelas, 'jurusan' => $jurusan, 'mataPelajaran' => $previousMaterial->mata_pelajaran, 'slug' => $previousMaterial->slug])); ?>" class="btn btn-outline-secondary">
                                        <i class="fas fa-chevron-left"></i> Video Sebelumnya
                                    </a>
                                <?php else: ?>
                                    <div></div>
                                <?php endif; ?>

                                <?php if($nextMaterial): ?>
                                    <a href="<?php echo e(route('video.show', ['kelas' => $kelas, 'jurusan' => $jurusan, 'mataPelajaran' => $nextMaterial->mata_pelajaran, 'slug' => $nextMaterial->slug])); ?>" class="btn btn-primary">
                                        Video Selanjutnya <i class="fas fa-chevron-right"></i>
                                    </a>
                                <?php else: ?>
                                    <div></div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Material Content removed per request (hide lengthy text under video) -->

                        <!-- Progress Button -->
                        <?php if(auth()->check()): ?>
                            <div class="progress-section mt-4">
                                <form method="POST" action="<?php echo e(route('progress.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="materi_id" value="<?php echo e($material->id); ?>">
                                    <input type="hidden" name="type" value="video">
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="fas fa-check"></i> Selesai Menonton Video
                                    </button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kuliah\WEMVI\Semester 4\Multimedia Pembelajaran Interaktif\Project\mood-sync\resources\views/video/video.blade.php ENDPATH**/ ?>