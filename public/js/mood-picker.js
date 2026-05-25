(function(){
    const body = document.body;
    const cards = Array.from(document.querySelectorAll('.mood-card'));
    const loading = document.getElementById('loading');

    const backgrounds = {
        fokus: getComputedStyle(document.documentElement).getPropertyValue('--bg-fokus') || '#D1E8E2',
        santai: getComputedStyle(document.documentElement).getPropertyValue('--bg-santai') || '#FEFCE8',
        lelah: getComputedStyle(document.documentElement).getPropertyValue('--bg-lelah') || '#F0F9FF'
    };

    // Ensure body transition is applied (redundant guard)
    body.style.transition = 'background-color 0.5s ease-in-out';

    // Hover / focus preview
    function preview(mood){
        if(!mood) return body.style.backgroundColor = '';
        body.style.backgroundColor = backgrounds[mood];
    }

    cards.forEach(card=>{
        const mood = card.dataset.mood;

        card.addEventListener('mouseenter',()=> preview(mood));
        card.addEventListener('mouseleave',()=> preview(null));
        card.addEventListener('focus',()=> preview(mood));
        card.addEventListener('blur',()=> preview(null));

        // keyboard activation
        card.addEventListener('keydown', (e)=>{
            if(e.key === 'Enter' || e.key === ' '){ e.preventDefault(); card.click(); }
        });

        card.addEventListener('click', ()=> selectMood(mood, card));
    });

    // Click handler: shows loading then posts to server
    function selectMood(mood, element){
        loading.style.display = 'flex';
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/mood-picker/update',{
            method:'POST',
            headers:{'Content-Type':'application/json','X-CSRF-TOKEN':token},
            body: JSON.stringify({mood:mood})
        })
        .then(r=>r.json())
        .then(res=>{
            // hide overlay
            loading.style.display = 'none';
            if(res && res.success){ window.location.href = '/dashboard'; }
            else { alert('Terjadi kesalahan saat menyimpan mood.'); }
        })
        .catch(()=>{
            loading.style.display = 'none';
            alert('Terjadi kesalahan jaringan. Silakan coba lagi.');
        });
    }

    // Allow quick selection via 1/2/3
    document.addEventListener('keydown', (e)=>{
        if(['1','2','3'].includes(e.key)){
            const idx = parseInt(e.key,10)-1;
            if(cards[idx]) cards[idx].focus();
        }
    });
})();
