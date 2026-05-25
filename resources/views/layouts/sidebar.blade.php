<div class="card sidebar-card">
    <div class="card-header">
        <h5 class="mb-0">Menu Video</h5>
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ route('video.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('video.index') ? 'active' : '' }}">
            <i class="fas fa-video me-2"></i> Semua Video
        </a>
        @if(request()->routeIs('video.jurusan'))
            <a href="{{ route('video.index') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-arrow-left me-2"></i> Kembali ke Kelas
            </a>
        @endif
        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="{{ route('materi.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('materi.*') ? 'active' : '' }}">
            <i class="fas fa-book me-2"></i> Materi
        </a>
        <a href="{{ route('kuis.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('kuis.*') ? 'active' : '' }}">
            <i class="fas fa-question-circle me-2"></i> Kuis
        </a>
        <a href="{{ route('progress.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('progress.index') ? 'active' : '' }}">
            <i class="fas fa-chart-line me-2"></i> Progress
        </a>
        <a href="{{ route('bantuan') }}" class="list-group-item list-group-item-action {{ request()->routeIs('bantuan') ? 'active' : '' }}">
            <i class="fas fa-life-ring me-2"></i> Bantuan
        </a>
        <a href="{{ route('profil.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('profil.index') ? 'active' : '' }}">
            <i class="fas fa-user me-2"></i> Profil
        </a>
    </div>
</div>
