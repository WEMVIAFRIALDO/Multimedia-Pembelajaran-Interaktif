# 🎯 Advanced Implementation & Customization Guide

Panduan untuk customization dan implementasi fitur advanced di Mood-Sync.

---

## 🎨 Customization Guide

### 1. Mengubah Warna Mood

**Option A: Langsung di CSS**

Edit file `public/css/mood-system.css`:

```css
:root {
    /* Ubah warna Fokus */
    --color-focus-primary: #FF0000;      /* Ubah dari #1e3a5f */
    --color-focus-secondary: #FF5555;    /* Ubah dari #2c5282 */
    --color-focus-light: #FFE0E0;        /* Ubah dari #eaf2f8 */
    --color-focus-accent: #FF8888;       /* Ubah dari #5a9fd4 */
    
    /* Ubah warna Santai */
    --color-relax-primary: #00AA00;      /* Ubah dari #4a9b8e */
    --color-relax-secondary: #00DD00;    /* Ubah dari #6db3a3 */
    --color-relax-light: #AAFF88;        /* Ubah dari #e8f5f0 */
    --color-relax-accent: #88FF88;       /* Ubah dari #81c7b8 */
    
    /* Ubah warna Capek */
    --color-tired-primary: #0000FF;      /* Ubah dari #c97e3f */
    --color-tired-secondary: #5555FF;    /* Ubah dari #d4925f */
    --color-tired-light: #E0E0FF;        /* Ubah dari #f5e9e0 */
    --color-tired-accent: #8888FF;       /* Ubah dari #e8a876 */
}
```

**Option B: Update di JavaScript**

Edit file `public/js/mood-system.js`:

```javascript
this.moods = {
    focus: {
        colors: {
            primary: '#FF0000',      // Warna utama
            secondary: '#FF5555',    // Warna secondary
            light: '#FFE0E0',        // Warna terang
            accent: '#FF8888'        // Warna accent
        }
    },
    // ... dst
};
```

---

### 2. Mengubah Jadwal Dark Mode

Edit `public/js/mood-system.js`:

```javascript
checkTimeForDarkMode() {
    const now = new Date();
    const hour = now.getHours();
    
    // Ubah dari 19:00-06:00 ke jadwal custom
    // Contoh: 22:00 (10 malam) - 07:00 (7 pagi)
    const isDarkTime = hour >= 22 || hour < 7;
    
    if (isDarkTime && !this.darkMode) {
        this.enableDarkMode();
    } else if (!isDarkTime && this.darkMode) {
        this.disableDarkMode();
    }
}
```

---

### 3. Mengganti Animasi Lottie

Edit `public/js/mood-system.js`:

```javascript
this.lottieAnimations = {
    focus: 'https://lottie.host/your-focus-animation.json',
    relax: 'https://lottie.host/your-relax-animation.json',
    tired: 'https://lottie.host/your-tired-animation.json'
};
```

**Cara mendapatkan Lottie URL:**
1. Buka https://lottiefiles.com/
2. Cari animasi yang sesuai
3. Klik "Get JSON" atau salin embed URL
4. Ganti di code

Contoh animasi populer:
- **Studying/Fokus:** Animated character studying
- **Relaxing/Santai:** Character meditating or relaxing
- **Tired/Capek:** Character sleeping or resting

---

### 4. Menambah Mood Baru

**Step 1: Update Database**
```php
// Migration baru jika perlu, atau edit validasi

// Di MoodController@store:
$request->validate([
    'mood' => 'required|in:focus,relax,tired,energetic', // Tambah mood baru
]);
```

**Step 2: Update CSS**
```css
:root {
    --color-energetic-primary: #FFD700;
    --color-energetic-secondary: #FFA500;
    --color-energetic-light: #FFFF99;
    --color-energetic-accent: #FFD700;
}

body.mood-energetic {
    --current-primary: var(--color-energetic-primary);
    --current-secondary: var(--color-energetic-secondary);
    --current-light: var(--color-energetic-light);
    --current-accent: var(--color-energetic-accent);
    background: linear-gradient(135deg, #FFFF99 0%, #FFD700 100%);
}
```

**Step 3: Update JavaScript**
```javascript
this.moods = {
    focus: { /* ... */ },
    relax: { /* ... */ },
    tired: { /* ... */ },
    energetic: {
        name: 'Energik',
        emoji: '⚡',
        description: 'Mode energik dengan warna cerah',
        colors: {
            primary: '#FFD700',
            secondary: '#FFA500',
            light: '#FFFF99',
            accent: '#FFD700'
        }
    }
};

this.lottieAnimations = {
    focus: '...',
    relax: '...',
    tired: '...',
    energetic: 'https://lottie.host/energetic-animation.json'
};
```

**Step 4: Update HTML**
```html
<button data-mood="energetic" class="mood-option">
    <div class="mood-icon">⚡</div>
    <h3 class="mood-title">Energik</h3>
    <p class="mood-description">Mode energik untuk produktivitas maksimal</p>
</button>
```

---

### 5. Menambah Sound Effects

**Create file:** `public/sounds/mood-change.mp3`

**Edit:** `public/js/mood-system.js`

```javascript
setMood(mood) {
    if (!this.moods[mood]) {
        console.error('❌ Invalid mood:', mood);
        return;
    }

    this.currentMood = mood;
    localStorage.setItem('mood', mood);
    
    // Tambahkan sound effect
    const audio = new Audio('/sounds/mood-change.mp3');
    audio.volume = 0.3;
    audio.play();
    
    // ... rest of code
}
```

---

## 🚀 Advanced Features

### 1. Analytics & Mood Tracking

**Tambahkan di Controller:**

```php
// MoodController.php
public function getMoodStatistics()
{
    $stats = Mood::where('user_id', Auth::id())
        ->selectRaw('mood, COUNT(*) as count')
        ->groupBy('mood')
        ->get();
    
    return response()->json([
        'success' => true,
        'stats' => $stats
    ]);
}
```

**Gunakan di Dashboard:**

```html
<div id="mood-stats">
    <p>Fokus: <span id="focus-count">0</span> times</p>
    <p>Santai: <span id="relax-count">0</span> times</p>
    <p>Capek: <span id="tired-count">0</span> times</p>
</div>

<script>
fetch('/api/mood/statistics')
    .then(r => r.json())
    .then(data => {
        data.stats.forEach(stat => {
            document.getElementById(`${stat.mood}-count`).textContent = stat.count;
        });
    });
</script>
```

---

### 2. Mood Recommendations

**Tambahkan di JavaScript:**

```javascript
class MoodRecommendation {
    getRecommendedMood() {
        const hour = new Date().getHours();
        
        if (hour >= 6 && hour < 12) {
            return 'focus';  // Pagi untuk fokus
        } else if (hour >= 12 && hour < 18) {
            return 'relax';  // Siang untuk santai
        } else {
            return 'tired';  // Malam untuk istirahat
        }
    }
    
    showRecommendation() {
        const mood = this.getRecommendedMood();
        const moods = window.moodSystem.moods;
        
        alert(`Rekomendasi: Coba mood ${moods[mood].name} untuk efisiensi maksimal`);
    }
}
```

---

### 3. Persistent Theme Preferences

**Update localStorage:**

```javascript
// Save custom preferences
localStorage.setItem('moodPreferences', JSON.stringify({
    autoDarkMode: true,
    defaultMood: 'focus',
    soundEnabled: true,
    animationSpeed: 1
}));

// Load preferences
const prefs = JSON.parse(localStorage.getItem('moodPreferences') || '{}');
if (!prefs.autoDarkMode) {
    // Skip dark mode auto-activation
}
```

---

### 4. Multi-language Support

**Update ke Indonesian & English:**

```javascript
const translations = {
    id: {
        focus: 'Fokus',
        relax: 'Santai',
        tired: 'Capek',
        darkModeActive: 'Dark Mode Aktif'
    },
    en: {
        focus: 'Focus',
        relax: 'Relax',
        tired: 'Tired',
        darkModeActive: 'Dark Mode Active'
    }
};

const lang = localStorage.getItem('language') || 'id';

// Gunakan translations[lang].focus
```

---

### 5. Export Analytics

**Tambahkan button:**

```html
<button id="export-mood-data">Export Data</button>

<script>
document.getElementById('export-mood-data').addEventListener('click', () => {
    fetch('/api/mood/export')
        .then(r => r.blob())
        .then(blob => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'mood-data.csv';
            a.click();
        });
});
</script>
```

---

## 📊 Advanced Styling

### 1. Gradient Backgrounds

```css
body.mood-focus {
    background: linear-gradient(135deg, 
        rgba(30, 58, 95, 0.05) 0%, 
        rgba(94, 157, 212, 0.05) 100%);
}

body.mood-relax {
    background: linear-gradient(135deg, 
        rgba(74, 155, 142, 0.05) 0%, 
        rgba(109, 179, 163, 0.05) 100%);
}
```

### 2. Custom Font Pairing

```css
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

body {
    font-family: 'Poppins', sans-serif;
}

/* Mood-specific fonts */
body.mood-focus {
    letter-spacing: 0.5px;  /* Formal */
}

body.mood-relax {
    letter-spacing: 1px;    /* Relaxed */
}
```

### 3. Custom Scrollbar

```css
::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-track {
    background: var(--color-default-light);
}

::-webkit-scrollbar-thumb {
    background: var(--current-primary);
    border-radius: 5px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--current-secondary);
}
```

---

## 🔧 Integration dengan Backend

### 1. Mood History Tracking

```php
// MoodHistory migration
Schema::create('mood_history', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained();
    $table->string('mood');
    $table->timestamp('started_at');
    $table->timestamp('ended_at')->nullable();
    $table->timestamps();
});
```

### 2. Mood Impact on Progress

```php
// Jika user fokus, progress loading lebih cepat
$boost = $currentMood?->mood === 'focus' ? 1.2 : 1;
$progressSpeed = 100 * $boost;
```

### 3. Mood-based Recommendations

```php
public function getMoodBasedRecommendations()
{
    $mood = Auth::user()->currentMood()?->mood;
    
    return Materi::where('difficulty', $mood === 'focus' ? 'hard' : 'easy')
        ->get();
}
```

---

## 🎬 Animation Customization

### 1. Transition Duration

```css
/* Default: 0.3s */
.glass-card {
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
}

/* Ubah ke custom */
.glass-card {
    transition: all 0.5s ease-out;  /* Lebih lambat */
}
```

### 2. Glow Animation Speed

```css
/* Default: 3s */
@keyframes glow {
    0%, 100% { box-shadow: 0 0 20px rgba(94, 157, 212, 0.3); }
    50% { box-shadow: 0 0 40px rgba(94, 157, 212, 0.6); }
}

.glass-card.glow-effect {
    animation: glow 3s ease-in-out infinite;
    /* Ubah 3s ke custom duration */
}
```

---

## 📱 Mobile Optimization

### 1. Touch-friendly Buttons

```css
button {
    min-height: 44px;    /* iOS recommendation */
    min-width: 44px;
    padding: 12px 16px;  /* Comfortable touch target */
}
```

### 2. Mobile Dark Mode

```css
@media (prefers-color-scheme: dark) {
    body {
        background: #111827;
        color: #f3f4f6;
    }
}
```

---

## 🧪 Testing Advanced Features

### 1. Unit Test

```javascript
// test/mood-system.test.js
describe('MoodSystem', () => {
    it('should change mood correctly', () => {
        const mood = new MoodSystem();
        mood.setMood('focus');
        
        expect(mood.currentMood).toBe('focus');
        expect(localStorage.getItem('mood')).toBe('focus');
    });
});
```

### 2. Integration Test

```php
// tests/Feature/MoodTest.php
public function test_user_can_update_mood()
{
    $response = $this->post('/api/mood/update', [
        'mood' => 'focus'
    ]);
    
    $response->assertJson(['success' => true]);
    $this->assertDatabaseHas('moods', ['mood' => 'focus']);
}
```

---

## 🚀 Deployment Checklist

- [ ] Minify CSS dan JS
- [ ] Enable caching headers
- [ ] Setup CDN untuk static files
- [ ] Optimize images
- [ ] Setup error logging
- [ ] Monitor performance
- [ ] Test di production
- [ ] Backup database

---

## 🎓 Pembelajaran Lanjutan

**Topics untuk explore:**
1. WebSocket untuk real-time updates
2. Service Worker untuk offline support
3. Progressive Web App (PWA)
4. Advanced animations dengan Three.js
5. Machine learning untuk mood prediction

---

## 📞 Troubleshooting Advanced

**Q: Mood tidak ter-sync antar tab?**
A: Gunakan `storage` event listener:
```javascript
window.addEventListener('storage', (e) => {
    if (e.key === 'mood') {
        location.reload();
    }
});
```

**Q: Dark mode conflict dengan custom theme?**
A: Prioritize custom theme:
```javascript
if (this.darkMode) {
    body.classList.add('dark-mode');
} else {
    body.classList.add(`mood-${this.currentMood}`);
}
```

---

## 🎉 Final Tips

1. **Keep it simple** - Jangan over-complicate
2. **Test thoroughly** - Semua browser dan device
3. **Monitor performance** - Gunakan DevTools
4. **Gather feedback** - Dari users
5. **Iterate continuously** - Improvement berkelanjutan

---

**Happy customizing! 🚀**
