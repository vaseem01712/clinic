import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

const revealElements = document.querySelectorAll('.reveal');
const revealObserver = new IntersectionObserver((entries) => entries.forEach((entry) => {
  if (entry.isIntersecting) { entry.target.classList.add('is-visible'); revealObserver.unobserve(entry.target); }
}), { threshold: 0.12 });
revealElements.forEach((element) => revealObserver.observe(element));

document.querySelectorAll('[data-review-slider]').forEach((slider) => {
  const track = slider.querySelector('.review-track');
  const cards = [...slider.querySelectorAll('.review-card')];
  const dots = [...slider.querySelectorAll('.review-dot')];
  let index = 0; let timer;
  const perView = () => window.innerWidth <= 620 ? 1 : window.innerWidth <= 900 ? 2 : 3;
  const render = () => { const max = Math.max(0, cards.length - perView()); index = Math.min(index, max); track.style.transform = `translateX(calc(-${index} * (100% + 18px) / ${perView()}))`; dots.forEach((dot, i) => dot.classList.toggle('active', i === index)); };
  const start = () => { clearInterval(timer); timer = setInterval(() => { const max = Math.max(0, cards.length - perView()); index = index >= max ? 0 : index + 1; render(); }, 3000); };
  dots.forEach((dot, i) => dot.addEventListener('click', () => { index = i; render(); start(); }));
  window.addEventListener('resize', render); slider.addEventListener('mouseenter', () => clearInterval(timer)); slider.addEventListener('mouseleave', start); render(); start();
});

const heroPhrase = document.querySelector('[data-hero-phrase]');
if (heroPhrase && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
  const phrases = [
    ['personal care,', 'designed around you.'],
    ['thoughtful care,', 'made for you.'],
    ['modern medicine,', 'centered on you.'],
  ];
  let phraseIndex = 0;
  const livePhrase = document.createElement('span');
  livePhrase.className = 'sr-only';
  livePhrase.setAttribute('aria-live', 'polite');
  heroPhrase.setAttribute('aria-hidden', 'true');
  heroPhrase.replaceChildren();
  const wordRows = phrases[0].map((line) => {
    const row = document.createElement('span');
    row.className = 'hero-phrase-row';
    line.split(' ').forEach((word) => {
      const wordElement = document.createElement('span');
      wordElement.className = 'hero-phrase-word';
      wordElement.textContent = word;
      row.append(wordElement);
    });
    heroPhrase.append(row);
    return [...row.children];
  });
  heroPhrase.after(livePhrase);
  livePhrase.textContent = phrases[0].join(' ');

  window.setInterval(() => {
    phraseIndex = (phraseIndex + 1) % phrases.length;
    const nextWords = phrases[phraseIndex].flatMap((line) => line.split(' '));
    const currentWords = wordRows.flat();
    currentWords.forEach((wordElement, index) => {
      window.setTimeout(() => {
        wordElement.classList.remove('is-changing');
        void wordElement.offsetWidth;
        wordElement.textContent = nextWords[index];
        wordElement.classList.add('is-changing');
      }, index * 150);
    });
    window.setTimeout(() => { livePhrase.textContent = phrases[phraseIndex].join(' '); }, currentWords.length * 150);
  }, 4400);
}

const heroImage = document.querySelector('.home-hero-image img');
const heroImageFrame = heroImage?.parentElement;
if (heroImage && heroImageFrame && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
  const slides = [
    { src: 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=1400&q=88', fallback: '/images/clinic-consultation.jpg', alt: 'Doctor ready to welcome a patient', note: 'A familiar face, every visit.' },
    { src: 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=1400&q=88', fallback: '/images/clinic-care.jpg', alt: 'A doctor offering thoughtful personal care', note: 'Care that takes time to listen.' },
    { src: 'https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=1400&q=88', fallback: '/images/clinic-wellness.jpg', alt: 'A clinician offering reassuring support to a patient', note: 'Every visit, made more human.' },
  ];
  let slideIndex = 0;
  let slideTimer;
  const controls = document.createElement('div');
  controls.className = 'hero-slider-controls';
  controls.setAttribute('role', 'group');
  controls.setAttribute('aria-label', 'Featured clinic images');
  const previous = document.createElement('button');
  previous.type = 'button'; previous.className = 'hero-slide-arrow'; previous.setAttribute('aria-label', 'Previous image'); previous.textContent = '←';
  const dots = document.createElement('div'); dots.className = 'hero-slide-dots';
  const next = document.createElement('button');
  next.type = 'button'; next.className = 'hero-slide-arrow'; next.setAttribute('aria-label', 'Next image'); next.textContent = '→';
  const note = document.querySelector('.home-hero-note b');
  const count = document.querySelector('.home-hero-index span:first-child');
  const renderSlide = (index) => {
    slideIndex = (index + slides.length) % slides.length;
    const slide = slides[slideIndex];
    heroImage.classList.remove('is-active');
    window.setTimeout(() => {
      heroImage.onerror = () => { heroImage.onerror = null; heroImage.src = slide.fallback; };
      heroImage.src = slide.src;
      heroImage.alt = slide.alt;
      heroImage.classList.add('is-active');
    }, 180);
    if (note) note.textContent = slide.note;
    if (count) count.textContent = `0${slideIndex + 1}`;
    dots.querySelectorAll('button').forEach((dot, dotIndex) => {
      dot.classList.toggle('is-active', dotIndex === slideIndex);
      dot.setAttribute('aria-current', dotIndex === slideIndex ? 'true' : 'false');
    });
  };
  slides.forEach((slide, index) => {
    const dot = document.createElement('button');
    dot.type = 'button'; dot.setAttribute('aria-label', `Show image ${index + 1}: ${slide.alt}`);
    dot.addEventListener('click', () => { renderSlide(index); startSlides(); });
    dots.append(dot);
  });
  const startSlides = () => {
    window.clearInterval(slideTimer);
    slideTimer = window.setInterval(() => renderSlide(slideIndex + 1), 6000);
  };
  previous.addEventListener('click', () => { renderSlide(slideIndex - 1); startSlides(); });
  next.addEventListener('click', () => { renderSlide(slideIndex + 1); startSlides(); });
  controls.append(previous, dots, next);
  heroImageFrame.append(controls);
  heroImageFrame.addEventListener('mouseenter', () => window.clearInterval(slideTimer));
  heroImageFrame.addEventListener('mouseleave', startSlides);
  renderSlide(0);
  startSlides();
}

const pushConfig = window.clinicFirebase;
if (pushConfig?.apiKey && 'serviceWorker' in navigator && 'Notification' in window) {
  const enablePush = async () => {
    if (Notification.permission !== 'granted') return;
    const [{ initializeApp }, { getMessaging, getToken, onMessage }] = await Promise.all([
      import('https://www.gstatic.com/firebasejs/10.13.2/firebase-app.js'),
      import('https://www.gstatic.com/firebasejs/10.13.2/firebase-messaging.js'),
    ]);
    const registration = await navigator.serviceWorker.register('/firebase-messaging-sw.js');
    const messaging = getMessaging(initializeApp(pushConfig));
    const token = await getToken(messaging, { vapidKey: pushConfig.vapidKey, serviceWorkerRegistration: registration });
    if (token) await fetch(pushConfig.subscriptionUrl, { method: 'POST', headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' }, body: JSON.stringify({ token, platform: 'web' }) });
    onMessage(messaging, ({ notification }) => new Notification(notification?.title || 'The Clinic', { body: notification?.body || '' }));
  };
  const tokenForms = [...document.querySelectorAll('form[method="POST"]')].filter((form) => {
    const pathname = new URL(form.action).pathname;
    return pathname.endsWith('/appointments') || pathname.endsWith('/login');
  });
  tokenForms.forEach((form) => {
    let submitting = false;
    form.addEventListener('submit', async (event) => {
      if (submitting) return;
      event.preventDefault();
      let permissionRequest;
      try {
        permissionRequest = Notification.permission === 'default'
          ? Notification.requestPermission()
          : Promise.resolve(Notification.permission);
      } catch (_) {
        permissionRequest = Promise.resolve('denied');
      }
      try {
        if (await permissionRequest === 'granted') {
          const [{ initializeApp, getApps }, { getMessaging, getToken }] = await Promise.all([
            import('https://www.gstatic.com/firebasejs/10.13.2/firebase-app.js'),
            import('https://www.gstatic.com/firebasejs/10.13.2/firebase-messaging.js'),
          ]);
          const app = getApps().find((item) => item.options.projectId === pushConfig.projectId) || initializeApp(pushConfig);
          const registration = await navigator.serviceWorker.register('/firebase-messaging-sw.js');
          const token = await getToken(getMessaging(app), { vapidKey: pushConfig.vapidKey, serviceWorkerRegistration: registration });
          if (token) {
            const input = document.createElement('input');
            input.type = 'hidden'; input.name = 'device_token'; input.value = token;
            form.append(input);
          }
        }
      } catch (_) {
        // A browser push failure must not prevent the appointment request.
      }
      submitting = true;
      form.requestSubmit();
    });
  });
  if (pushConfig.canSubscribe && Notification.permission === 'granted') {
    window.addEventListener('load', () => enablePush().catch(() => {}));
  }
}
