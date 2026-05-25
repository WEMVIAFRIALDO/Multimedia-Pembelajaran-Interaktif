

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-slate-950 py-10">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="rounded-xl border border-white/10 bg-slate-900/80 p-3 shadow-md backdrop-blur-sm">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('materi.index')); ?>" class="text-slate-200 hover:text-white">Materi</a></li>
                            <li class="breadcrumb-item active text-slate-200">Kelas <?php echo e($kelas); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="rounded-xl border border-white/10 bg-slate-900/80 p-4 shadow-md backdrop-blur-sm">
                    <h1 class="h3 text-white mb-1" style="font-size:1.25rem;">🏢 Pilih Jurusan - Kelas <?php echo e($kelas); ?></h1>
                    <p class="text-slate-300 mb-0">Mood Anda: <strong class="text-white"><?php echo e($selectedMood); ?></strong></p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php $__currentLoopData = $jurusans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jurusan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 mb-4">
                    <a href="<?php echo e(route('materi.mata_pelajaran', [$kelas, $jurusan->jurusan])); ?>" class="text-decoration-none">
                        <div class="rounded-lg border border-white/10 bg-slate-900/80 h-100 p-4 text-center transition duration-200 hover:-translate-y-0.5 hover:bg-slate-900 shadow-sm">
                            <div class="mb-3 text-5xl">
                                <?php if($jurusan->jurusan === 'RPL'): ?>
                                    💻
                                <?php elseif($jurusan->jurusan === 'Multimedia'): ?>
                                    🎨
                                <?php else: ?>
                                    📚
                                <?php endif; ?>
                            </div>
                            <h5 class="fw-semibold text-white" style="font-size:1rem;"><?php echo e($jurusan->jurusan); ?></h5>
                            <small class="text-slate-300">Klik untuk pilih mata pelajaran</small>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($jurusans->isEmpty()): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="rounded-lg border border-white/10 bg-slate-900/80 text-center py-4">
                        <h5 class="text-slate-100">📭 Belum ada jurusan untuk kelas ini</h5>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kuliah\WEMVI\Semester 4\Multimedia Pembelajaran Interaktif\Project\mood-sync\resources\views/materi/jurusan.blade.php ENDPATH**/ ?>