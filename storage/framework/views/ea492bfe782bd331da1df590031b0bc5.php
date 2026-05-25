

<?php $__env->startSection('content'); ?>
<div class="bg-slate-950 min-h-screen py-8 md:py-12">
    <div class="container max-w-4xl mx-auto px-4 md:px-8 text-slate-100">
        <!-- Header dengan Progress -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div>
                    <p class="text-amber-400 text-sm font-semibold uppercase tracking-wide mb-2">Evaluasi</p>
                    <h1 class="text-3xl md:text-4xl font-bold text-white"><?php echo e($kuis->judul); ?></h1>
                </div>
                <div class="text-right mt-4 md:mt-0">
                    <p class="text-sm text-slate-400">Soal</p>
                    <p id="progress-text" class="text-2xl font-bold text-white">1 / <?php echo e(count($kuis->pertanyaan)); ?></p>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="w-full bg-slate-800 rounded-full h-2 overflow-hidden">
                <div id="progress-bar" class="bg-gradient-to-r from-amber-400 to-amber-600 h-full rounded-full transition-all duration-300" style="width: 1%"></div>
            </div>
        </div>

        <!-- Form Kuis -->
        <form method="POST" action="<?php echo e(route('kuis.submit', $kuis->id)); ?>" id="quiz-form" class="space-y-8">
            <?php echo csrf_field(); ?>

            <?php $__currentLoopData = $kuis->pertanyaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pertanyaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="question-container bg-slate-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-8 mb-8 transition-all duration-300" data-question="<?php echo e($index); ?>">
                    <!-- Question Number dan Text -->
                    <div class="mb-8">
                        <div class="inline-block mb-4">
                            <span class="px-4 py-2 bg-amber-400/20 text-amber-300 rounded-full text-sm font-semibold">
                                Pertanyaan <?php echo e($index + 1); ?> dari <?php echo e(count($kuis->pertanyaan)); ?>

                            </span>
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold text-white leading-relaxed">
                            <?php echo e($pertanyaan['pertanyaan']); ?>

                        </h3>
                    </div>

                    <!-- Pilihan Jawaban -->
                    <div class="space-y-3">
                        <?php $__currentLoopData = $pertanyaan['pilihan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pilihan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="relative">
                                <input 
                                    type="radio" 
                                    name="jawaban[<?php echo e($index); ?>]" 
                                    value="<?php echo e($key); ?>" 
                                    id="q<?php echo e($index); ?><?php echo e($key); ?>"
                                    class="sr-only peer"
                                    required>
                                <label 
                                    for="q<?php echo e($index); ?><?php echo e($key); ?>"
                                    class="flex items-center cursor-pointer p-4 border-2 border-slate-700 rounded-xl transition-all duration-200 peer-checked:border-amber-400 peer-checked:bg-amber-400/10 hover:border-slate-500 group">
                                    <div class="flex items-center justify-center w-6 h-6 border-2 border-slate-600 rounded-full group-hover:border-amber-400 peer-checked:border-amber-400 peer-checked:bg-amber-400 transition-all">
                                        <div class="w-2 h-2 bg-white rounded-full opacity-0 peer-checked:opacity-100"></div>
                                    </div>
                                    <span class="ml-4 text-slate-200 font-medium group-hover:text-white transition-colors">
                                        <?php echo e(chr(65 + $key)); ?>. <?php echo e($pilihan); ?>

                                    </span>
                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <!-- Navigation & Submit Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-between mt-10 pt-8 border-t border-white/10">
                <button 
                    type="button" 
                    id="prev-btn"
                    class="px-6 py-3 rounded-xl border border-slate-700 text-slate-200 font-semibold hover:bg-white/5 hover:border-slate-500 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                    ← Soal Sebelumnya
                </button>

                <div class="flex gap-4">
                    <button 
                        type="button" 
                        id="next-btn"
                        class="px-6 py-3 rounded-xl border border-amber-400 text-amber-300 font-semibold hover:bg-amber-400/10 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                        Soal Berikutnya →
                    </button>

                    <button 
                        type="submit" 
                        id="submit-btn"
                        class="px-8 py-3 rounded-xl bg-gradient-to-r from-amber-400 to-amber-600 text-slate-900 font-bold hover:shadow-lg hover:shadow-amber-400/50 transition-all duration-200 hidden">
                        ✓ Selesai
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('quiz-form');
        const questions = document.querySelectorAll('.question-container');
        const totalQuestions = questions.length;
        let currentQuestion = 0;

        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const submitBtn = document.getElementById('submit-btn');
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');

        function showQuestion(index) {
            questions.forEach((q, i) => {
                q.classList.add('hidden');
            });
            if (questions[index]) {
                questions[index].classList.remove('hidden');
            }

            const progress = ((index + 1) / totalQuestions) * 100;
            progressBar.style.width = progress + '%';
            progressText.textContent = `${index + 1} / ${totalQuestions}`;

            prevBtn.disabled = index === 0;
            nextBtn.classList.toggle('hidden', index === totalQuestions - 1);
            submitBtn.classList.toggle('hidden', index !== totalQuestions - 1);

            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        prevBtn.addEventListener('click', () => {
            if (currentQuestion > 0) {
                currentQuestion--;
                showQuestion(currentQuestion);
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentQuestion < totalQuestions - 1) {
                currentQuestion++;
                showQuestion(currentQuestion);
            }
        });

        showQuestion(0);
    });
</script>

<style>
    .hidden {
        display: none;
    }

    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border-width: 0;
    }

    .peer:checked ~ label {
        --tw-bg-opacity: 1;
    }

    input[type="radio"]:checked + label {
        border-color: rgb(251, 146, 60);
        background-color: rgba(251, 146, 60, 0.1);
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kuliah\WEMVI\Semester 4\Multimedia Pembelajaran Interaktif\Project\mood-sync\resources\views/kuis/show.blade.php ENDPATH**/ ?>