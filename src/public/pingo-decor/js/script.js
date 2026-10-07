function toggleMenu() {
  document.getElementById('menu')?.classList.toggle('active');
}

document.addEventListener('DOMContentLoaded', () => {
  if (!window.gsap) return;
  if (window.ScrollTrigger) gsap.registerPlugin(ScrollTrigger);
  for (const [selector, offset] of [['.texto p', 40], ['.projeto-card', 60], ['.pub-card', 60]]) {
    if (!document.querySelector(selector)) continue;
    gsap.from(selector, {
      scrollTrigger: window.ScrollTrigger ? { trigger: selector, start: 'top 85%' } : undefined,
      opacity: 0, y: offset, duration: 0.8, stagger: 0.12
    });
  }
});
