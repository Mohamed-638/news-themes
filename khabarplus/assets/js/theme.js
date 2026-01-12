(() => {
  const ticker = document.querySelector('.breaking__items');
  if (!ticker) return;

  let scrollAmount = 0;
  const step = 1;
  const interval = setInterval(() => {
    scrollAmount += step;
    if (scrollAmount >= ticker.scrollWidth - ticker.clientWidth) {
      scrollAmount = 0;
    }
    ticker.scrollTo({ left: scrollAmount, behavior: 'smooth' });
  }, 3000);

  window.addEventListener('beforeunload', () => clearInterval(interval));
})();
