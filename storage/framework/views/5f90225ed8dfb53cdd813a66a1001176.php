

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-slate-950 py-10">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="rounded-xl border border-white/10 bg-slate-900/80 p-3 shadow-md backdrop-blur-sm">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('materi.index')); ?>" class="text-slate-200 hover:text-white">Materi</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('materi.jurusan', $kelas)); ?>" class="text-slate-200 hover:text-white">Kelas <?php echo e($kelas); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('materi.mata_pelajaran', [$kelas, $jurusan])); ?>" class="text-slate-200 hover:text-white"><?php echo e($jurusan); ?></a></li>
                            <li class="breadcrumb-item active text-slate-200"><?php echo e($mataPelajaran); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="rounded-xl border border-white/10 bg-slate-900/80 p-4 shadow-md backdrop-blur-sm">
                    <h1 class="h3 text-white mb-1" style="font-size:1.35rem;">📖 <?php echo e($mataPelajaran); ?></h1>
                    <p class="text-slate-300 mb-0" style="font-size:0.95rem;">Kelas <?php echo e($kelas); ?> | Jurusan: <?php echo e($jurusan); ?> | Mood: <strong class="text-white"><?php echo e($selectedMood); ?></strong></p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php $__currentLoopData = $materis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 mb-4">
                    <a href="<?php echo e(route('materi.show', $materi->id)); ?>" class="text-decoration-none">
                        <div class="rounded-lg border border-white/10 bg-slate-900/80 h-100 p-4 transition duration-200 hover:-translate-y-0.5 hover:bg-slate-900 shadow-sm">
                            <h5 class="fw-semibold text-white mb-2" style="font-size:1rem;">📝 <?php echo e($materi->title); ?></h5>
                            <p class="text-slate-300" style="font-size: 0.9rem;"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($materi->ringkasan), 100)); ?></p>
                            <div class="mt-2">
                                <small class="text-emerald-300">Baca Materi →</small>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($materis->isEmpty()): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="rounded-lg border border-white/10 bg-slate-900/80 text-center py-4">
                        <h5 class="text-slate-100">📭 Belum ada materi untuk mata pelajaran ini</h5>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kuliah\WEMVI\Semester 4\Multimedia Pembelajaran Interaktif\Project\mood-sync\resources\views/materi/materi.blade.php ENDPATH**/ ?>