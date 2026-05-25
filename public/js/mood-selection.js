document.addEventListener('DOMContentLoaded', function(){
  const pageBg = document.querySelector('.mood-page__bg');
  const cards = Array.from(document.querySelectorAll('.mood-card'));
  const confirmBtn = document.getElementById('confirmMood');
  let activeMood = null;

  function applyPreview(el){
    const bg = el.dataset.bg || '';
    const border = el.dataset.border || '';
    if(bg){
      pageBg.style.background = bg;
    }
    if(border){
      el.style.borderColor = border;
    }
    // Keep the mood label visible and use CSS defaults for text color.
    el.querySelectorAll('.mood-card__label').forEach(label => {
      label.style.color = '';
    });
  }

  function clearPreview(el){
    pageBg.style.background = '';
    el.style.borderColor = '';
    el.style.color = '';
    const label = el.querySelector('.mood-card__label');
    if(label) label.style.color = '';
  }

  cards.forEach((card, idx) => {
    // set accessible attributes
    card.setAttribute('role','button');
    card.setAttribute('tabindex','0');

    card.addEventListener('mouseenter', () => {
      applyPreview(card);
    });
    card.addEventListener('mouseleave', () => {
      // only clear if not active/selected
      if(!card.classList.contains('is-selected')) clearPreview(card);
    });

    card.addEventListener('focus', () => applyPreview(card));
    card.addEventListener('blur', () => { if(!card.classList.contains('is-selected')) clearPreview(card); });

    card.addEventListener('click', () => {
      // mark selected
      cards.forEach(c => c.classList.remove('is-selected'));
      card.classList.add('is-selected');
      cards.forEach(c => c.setAttribute('aria-pressed','false'));
      card.setAttribute('aria-pressed','true');
      activeMood = card.dataset.mood || null;
      applyPreview(card);
    });

    card.addEventListener('keydown', (e) => {
      if(e.key === 'Enter' || e.key === ' '){
        e.preventDefault();
        card.click();
      }
      // left/right navigation
      if(e.key === 'ArrowRight'){
        const next = cards[(idx+1)%cards.length]; next.focus();
      }
      if(e.key === 'ArrowLeft'){
        const prev = cards[(idx-1+cards.length)%cards.length]; prev.focus();
      }
    });
  });

  // confirm action (send mood to server)
  confirmBtn && confirmBtn.addEventListener('click', () => {
    if(!activeMood){
      // if nothing selected, prefer the currently focused card
      const focused = document.activeElement.closest && document.activeElement.closest('.mood-card');
      if(focused) activeMood = focused.dataset.mood;
    }
    if(activeMood){
      const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
      confirmBtn.disabled = true;
      fetch('/mood-select', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': token,
          'Accept': 'application/json'
        },
        body: JSON.stringify({ mood: activeMood })
      }).then(r => r.json()).then(data => {
        confirmBtn.disabled = false;
        if(data && data.status === 'ok'){
          // if server returns redirect, navigate there
          if(data.redirect){
            window.location.href = data.redirect;
            return;
          }
          confirmBtn.textContent = 'Mood Dipilih ✓';
          setTimeout(()=> confirmBtn.textContent = 'Pilih Mood', 1800);
        } else {
          confirmBtn.textContent = 'Gagal, coba lagi';
          setTimeout(()=> confirmBtn.textContent = 'Pilih Mood', 1800);
        }
      }).catch(err => {
        confirmBtn.disabled = false;
        confirmBtn.textContent = 'Error';
        setTimeout(()=> confirmBtn.textContent = 'Pilih Mood', 1800);
        console.error(err);
      });
    } else {
      // focus first card
      cards[0] && cards[0].focus();
    }
  });

});
