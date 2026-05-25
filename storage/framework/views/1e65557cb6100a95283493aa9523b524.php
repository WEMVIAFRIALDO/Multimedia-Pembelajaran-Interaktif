

<?php $__env->startSection('title', 'CP & TP - Capaian dan Tujuan Pembelajaran'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-slate-950 py-10">
    <div class="container max-w-6xl mx-auto px-4">
        <div class="rounded-3xl border border-slate-800 bg-slate-900/95 shadow-2xl overflow-hidden">
            <div class="p-8 border-b border-slate-800">
                <h2 class="text-3xl font-bold text-white"><i class="fas fa-book"></i> CP & TP Kurikulum Merdeka</h2>
                <p class="text-slate-400 mt-2">Capaian Pembelajaran dan Tujuan Pembelajaran Kurikulum Merdeka</p>
            </div>
            <div class="p-6">
                <ul class="nav nav-tabs border-b border-slate-800 mb-6" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-slate-100 bg-slate-900/90 border-slate-700" id="rpl-tab" data-bs-toggle="tab" data-bs-target="#rpl-content" type="button" role="tab" aria-controls="rpl-content" aria-selected="true">
                            <i class="fas fa-code me-2"></i> RPL - Hardware
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-slate-100 bg-slate-900/90 border-slate-700" id="multimedia-tab" data-bs-toggle="tab" data-bs-target="#multimedia-content" type="button" role="tab" aria-controls="multimedia-content" aria-selected="false">
                            <i class="fas fa-palette me-2"></i> Multimedia - Grafika
                        </button>
                    </li>
                </ul>

                <div class="tab-content">
                    <?php $__currentLoopData = $kiKdData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jurusan => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $jurusanSlug = str_replace(' ', '-', strtolower($jurusan));
                        ?>
                        <div class="tab-pane fade <?php echo e($loop->first ? 'show active' : ''); ?>" id="<?php echo e($jurusanSlug); ?>-content" role="tabpanel" aria-labelledby="<?php echo e($jurusanSlug); ?>-tab">
                            <div class="grid gap-6">
                                <div class="rounded-3xl border border-slate-800 bg-slate-950/80 p-6">
                                    <h4 class="text-xl font-semibold text-white mb-4"><i class="fas fa-star"></i> Kompetensi Inti (KI)</h4>
                                    <div class="accordion kikd-accordion" id="accordion-ki-<?php echo e($jurusanSlug); ?>">
                                        <?php $__currentLoopData = $data['kompetensi_inti']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ki => $deskripsi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $collapseId = 'collapse-ki-' . $jurusanSlug . '-' . $loop->index;
                                            ?>
                                            <div class="accordion-item kikd-accordion-item rounded-3xl border border-slate-800 bg-slate-900/90 mb-4 overflow-hidden">
                                                <h2 class="accordion-header" id="heading-<?php echo e($collapseId); ?>">
                                                    <button class="accordion-button <?php echo e($loop->first ? '' : 'collapsed'); ?> bg-slate-900/90 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo e($collapseId); ?>" aria-expanded="<?php echo e($loop->first ? 'true' : 'false'); ?>" aria-controls="<?php echo e($collapseId); ?>">
                                                        <span class="ki-badge"><?php echo e($ki); ?></span>
                                                        <span class="ki-title">Kompetensi Inti <?php echo e(str_replace('KI ', '', $ki)); ?></span>
                                                    </button>
                                                </h2>
                                                <div id="<?php echo e($collapseId); ?>" class="accordion-collapse collapse <?php echo e($loop->first ? 'show' : ''); ?>" data-bs-parent="#accordion-ki-<?php echo e($jurusanSlug); ?>">
                                                    <div class="accordion-body rounded-b-3xl bg-slate-950/90 text-slate-300">
                                                        <p class="ki-text"><?php echo e($deskripsi); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>

                                <div class="rounded-3xl border border-slate-800 bg-slate-950/80 p-6">
                                    <h4 class="text-xl font-semibold text-white mb-4"><i class="fas fa-bullseye"></i> Kompetensi Dasar (KD)</h4>
                                    <div class="accordion kikd-accordion" id="accordion-kd-<?php echo e($jurusanSlug); ?>">
                                        <?php $__currentLoopData = $data['kompetensi_dasar']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $collapseId = 'collapse-kd-' . $jurusanSlug . '-' . $loop->index;
                                            ?>
                                            <div class="accordion-item kikd-accordion-item rounded-3xl border border-slate-800 bg-slate-900/90 mb-4 overflow-hidden">
                                                <h2 class="accordion-header" id="heading-<?php echo e($collapseId); ?>">
                                                    <button class="accordion-button <?php echo e($loop->first ? '' : 'collapsed'); ?> bg-slate-900/90 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo e($collapseId); ?>" aria-expanded="<?php echo e($loop->first ? 'true' : 'false'); ?>" aria-controls="<?php echo e($collapseId); ?>">
                                                        <span class="kd-badge"><?php echo e($kd['kode']); ?></span>
                                                        <span class="kd-title"><?php echo e($kd['deskripsi']); ?></span>
                                                        <?php if($kd['slug'] && isset($userProgress[$kd['slug']]) && $userProgress[$kd['slug']]): ?>
                                                            <span class="progress-status progress-completed ms-auto">
                                                                <i class="fas fa-check-circle"></i> Selesai
                                                            </span>
                                                        <?php elseif($kd['slug']): ?>
                                                            <span class="progress-status progress-pending ms-auto">
                                                                <i class="fas fa-circle"></i> Belum
                                                            </span>
                                                        <?php endif; ?>
                                                    </button>
                                                </h2>
                                                <div id="<?php echo e($collapseId); ?>" class="accordion-collapse collapse <?php echo e($loop->first ? 'show' : ''); ?>" data-bs-parent="#accordion-kd-<?php echo e($jurusanSlug); ?>">
                                                    <div class="accordion-body rounded-b-3xl bg-slate-950/90 text-slate-300">
                                                        <p class="kd-description"><?php echo e($kd['deskripsi']); ?></p>
                                                        <h6 class="kd-detail-title">Materi Pembelajaran:</h6>
                                                        <ul class="kd-detail-list list-disc pl-5 mt-2 text-slate-300">
                                                            <?php $__empty_1 = true; $__currentLoopData = $kd['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                <li><?php echo e($detail); ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                <li class="text-slate-500">Tidak ada detail materi</li>
                                                            <?php endif; ?>
                                                        </ul>
                                                        <?php if($kd['slug']): ?>
                                                            <div class="mt-3">
                                                                <?php if(isset($userProgress[$kd['slug']]) && $userProgress[$kd['slug']]): ?>
                                                                    <span class="badge bg-emerald-500/15 text-emerald-200 border border-emerald-500/20">
                                                                        <i class="fas fa-check"></i> Sudah Ditandai Selesai
                                                                    </span>
                                                                <?php else: ?>
                                                                    <span class="badge bg-slate-700 text-slate-200 border border-slate-600/40">
                                                                        <i class="fas fa-clock"></i> Belum Ditandai Selesai
                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="rounded-3xl border border-slate-800 bg-slate-950/80 p-6 mt-6">
                    <h5 class="text-lg font-semibold text-white mb-3"><i class="fas fa-info-circle"></i> Informasi Penting</h5>
                    <p class="text-slate-400">Halaman ini menampilkan Kompetensi Inti (KI) dan Kompetensi Dasar (KD) sesuai dengan Kurikulum Merdeka. Status progress diperbarui secara otomatis ketika Anda menyelesaikan pembelajaran materi terkait.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kuliah\WEMVI\Semester 4\Multimedia Pembelajaran Interaktif\Project\mood-sync\resources\views/ki-kd.blade.php ENDPATH**/ ?>