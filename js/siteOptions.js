window.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('site-options-container');
    const styleSelect = document.getElementById('style-select');
    const usukSelect = document.getElementById('usuk-select');
    const toggleBtn = document.getElementById('site-options-toggle');
    const backdrop = document.getElementById('site-options-backdrop');
    const modal = document.getElementById('site-options-modal');
    const closeBtn = document.getElementById('site-options-close');

    const currentStyle = container.dataset.style || 'default';
    const currentUsuk = container.dataset.usuk || 'UK';

    styleSelect.value = currentStyle;
    usukSelect.value = currentUsuk;

    styleSelect.addEventListener('change', function () {
        document.cookie = "style=" + this.value + "; path=/; max-age=" + (60 * 60 * 24 * 30);
        location.reload();
    });

    usukSelect.addEventListener('change', function () {
        document.cookie = "usuk=" + this.value + "; path=/; max-age=" + (60 * 60 * 24 * 30);
        location.reload();
    });

    function openOptions() {
        backdrop.hidden = false;
        modal.hidden = false;
    }

    function closeOptions() {
        backdrop.hidden = true;
        modal.hidden = true;
    }

    toggleBtn.addEventListener('click', openOptions);
    closeBtn.addEventListener('click', closeOptions);
    backdrop.addEventListener('click', closeOptions);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeOptions();
        }
    });
});