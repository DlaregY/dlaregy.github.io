(function () {
  const year = document.getElementById('year');
  if (year) year.textContent = new Date().getFullYear();

  const themeLink = document.getElementById('themeStylesheet');
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const savedTheme = localStorage.getItem('theme');
  const theme = savedTheme === 'nes' ? 'nes' : 'dos';
  const savedEffects = localStorage.getItem('effects');
  const effects = savedEffects ? savedEffects === 'on' : !reducedMotion;

  function applyTheme(nextTheme) {
    if (!themeLink) return;
    themeLink.setAttribute('href', nextTheme === 'nes' ? 'assets/theme-nes.css' : 'assets/theme-dos.css');
    localStorage.setItem('theme', nextTheme);
    document.querySelectorAll('[data-theme-btn]').forEach((btn) => {
      btn.setAttribute('aria-pressed', String(btn.dataset.themeBtn === nextTheme));
    });
  }

  function applyEffects(isOn) {
    document.body.classList.toggle('effects-on', isOn);
    localStorage.setItem('effects', isOn ? 'on' : 'off');
    const btn = document.querySelector('[data-effects-btn]');
    if (btn) btn.setAttribute('aria-pressed', String(isOn));
    if (btn) btn.textContent = isOn ? 'On' : 'Off';
  }

  const controlsHost = document.querySelector('.title-row');
  if (controlsHost) {
    const controls = document.createElement('div');
    controls.className = 'controls';
    controls.innerHTML = `
      <div class="control-group" role="group" aria-label="Theme selector">
        <span>Theme:</span>
        <button type="button" data-theme-btn="dos" aria-pressed="false">DOS</button>
        <button type="button" data-theme-btn="nes" aria-pressed="false">NES</button>
      </div>
      <div class="control-group" role="group" aria-label="Effects toggle">
        <span>Effects:</span>
        <button type="button" data-effects-btn aria-pressed="false">Off</button>
      </div>`;
    controlsHost.appendChild(controls);

    controls.querySelectorAll('[data-theme-btn]').forEach((button) => {
      button.addEventListener('click', () => applyTheme(button.dataset.themeBtn));
    });

    const effectsButton = controls.querySelector('[data-effects-btn]');
    effectsButton.addEventListener('click', () => {
      applyEffects(!document.body.classList.contains('effects-on'));
    });
  }

  applyTheme(theme);
  applyEffects(effects);
})();
