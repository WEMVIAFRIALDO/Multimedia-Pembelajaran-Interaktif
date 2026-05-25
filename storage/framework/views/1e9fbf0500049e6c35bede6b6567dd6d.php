

<?php $__env->startSection('title', 'Progress - Mood-Sync'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-slate-950 py-8 md:py-12">
    <div class="container max-w-6xl mx-auto px-4 md:px-8">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between mb-8">
            <div>
                <p class="text-amber-400 text-sm font-semibold uppercase tracking-wide mb-2">📈 Tracking Belajar</p>
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-3">Progress Pembelajaran Anda</h1>
                <p class="text-slate-400"><?php echo e(Auth::user()->name); ?> | Email: <?php echo e(Auth::user()->email ?? 'N/A'); ?></p>
            </div>
            <a href="<?php echo e(route('dashboard')); ?>" class="inline-flex items-center justify-center rounded-2xl bg-slate-900 border border-slate-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                ← Kembali ke Dashboard
            </a>
        </div>

        <div class="grid gap-6 lg:grid-cols-3 mb-8">
            <div class="rounded-3xl border border-slate-800 bg-slate-900/95 p-6 shadow-2xl">
                <p class="text-sm uppercase tracking-[0.24em] text-slate-400 mb-3">Kompetensi Dasar Selesai</p>
                <h2 class="text-3xl font-bold text-white mb-2"><?php echo e($progressPercentage); ?>%</h2>
                <div class="h-3 overflow-hidden rounded-full bg-slate-800 mb-4">
                    <div class="h-full rounded-full bg-gradient-to-r from-emerald-400 to-blue-500" style="width: <?php echo e($progressPercentage); ?>%"></div>
                </div>
                <p class="text-slate-400 text-sm">Anda telah menyelesaikan <span class="font-semibold text-white"><?php echo e($completedMateri); ?> dari <?php echo e($totalMateri); ?></span> kompetensi dasar.</p>
            </div>
            <div class="rounded-3xl border border-slate-800 bg-slate-900/95 p-6 shadow-2xl flex items-center gap-4">
                <div class="text-4xl">📚</div>
                <div>
                    <p class="text-slate-400 text-sm">Total Materi</p>
                    <p class="text-3xl font-bold text-white"><?php echo e($totalMateri); ?></p>
                </div>
            </div>
            <div class="rounded-3xl border border-slate-800 bg-slate-900/95 p-6 shadow-2xl flex items-center gap-4">
                <div class="text-4xl">✅</div>
                <div>
                    <p class="text-slate-400 text-sm">Selesai</p>
                    <p class="text-3xl font-bold text-emerald-400"><?php echo e($completedMateri); ?></p>
                </div>
            </div>
            <div class="rounded-3xl border border-slate-800 bg-slate-900/95 p-6 shadow-2xl flex items-center gap-4 lg:col-span-2">
                <div class="text-4xl">🎯</div>
                <div>
                    <p class="text-slate-400 text-sm">Rata-rata Kuis</p>
                    <p class="text-3xl font-bold text-sky-400"><?php echo e($averageQuizScore !== null ? number_format($averageQuizScore, 1) . '%' : 'N/A'); ?></p>
                </div>
            </div>
        </div>

        <div class="rounded-3xl border border-slate-800 bg-slate-900/95 p-6 shadow-2xl mb-8">
            <h3 class="text-2xl font-bold text-white mb-4">📋 Ringkasan Progress</h3>
            <?php if($progresses->isEmpty()): ?>
                <div class="rounded-3xl border border-slate-800 bg-slate-950/90 p-10 text-center">
                    <div class="text-5xl mb-4">📭</div>
                    <p class="text-slate-400 mb-6">Belum ada progress yang tercatat. Ayo mulai pelajari materi dan kerjakan kuismu!</p>
                    <a href="<?php echo e(route('materi.index')); ?>" class="inline-flex items-center justify-center rounded-2xl bg-amber-400 px-6 py-3 text-sm font-semibold text-slate-950 transition hover:bg-amber-300">
                        Mulai Belajar →
                    </a>
                </div>
            <?php else: ?>
                <div class="space-y-4 max-h-[28rem] overflow-y-auto pr-1">
                    <?php $__currentLoopData = $progresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $progress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="rounded-3xl border border-slate-800 bg-slate-950/80 p-5 hover:border-slate-700 transition">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <div>
                                    <h4 class="text-lg font-semibold text-white mb-2"><?php echo e($progress->materi?->judul ?? ($progress->material?->judul ?? 'Materi Tidak Diketahui')); ?></h4>
                                    <div class="flex flex-wrap gap-4 text-sm text-slate-400">
                                        <span>Status: <strong class="text-white"><?php echo e(ucfirst($progress->status)); ?></strong></span>
                                        <?php if($progress->score !== null): ?>
                                            <span>Nilai: <strong class="text-sky-300"><?php echo e($progress->score); ?>%</strong></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div>
                                    <?php if($progress->status === 'completed'): ?>
                                        <span class="inline-flex rounded-full bg-emerald-500/15 px-3 py-1 text-sm font-semibold text-emerald-300">✓ Selesai</span>
                                    <?php else: ?>
                                        <span class="inline-flex rounded-full bg-amber-500/15 px-3 py-1 text-sm font-semibold text-amber-300">⏳ Proses</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="flex flex-col gap-4 sm:flex-row sm:justify-center">
            <a href="<?php echo e(route('materi.index')); ?>" class="inline-flex items-center justify-center rounded-2xl border border-emerald-500/30 bg-slate-900/90 px-6 py-3 text-white font-semibold transition hover:bg-slate-800">
                📚 Lanjutkan Belajar
            </a>
            <a href="<?php echo e(route('kuis.index')); ?>" class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-blue-500 to-cyan-500 px-6 py-3 text-white font-semibold transition hover:opacity-95">
                ❓ Ikuti Kuis
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kuliah\WEMVI\Semester 4\Multimedia Pembelajaran Interaktif\Project\mood-sync\resources\views/progress/index.blade.php ENDPATH**/ ?>