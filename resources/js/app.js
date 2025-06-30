import './bootstrap';


document.querySelectorAll('#flash_close').forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.target.closest('#flash_msg')?.remove();
    });
});

setTimeout(() => {
    document.querySelectorAll('#flash_msg').forEach(el => el.remove());
}, 8000);