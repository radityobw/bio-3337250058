document.addEventListener('DOMContentLoaded', () => {
    const themeToggleBtn = document.getElementById('theme-toggle');
    const body = document.body;

    // Cek preferensi tema sebelumnya di localStorage
    const currentTheme = localStorage.getItem('theme');
    if (currentTheme === 'light') {
        body.classList.add('light-mode');
        themeToggleBtn.innerHTML = '🌙 Dark Mode';
        themeToggleBtn.classList.replace('btn-outline-light', 'btn-outline-dark');
    }

    // Event listener untuk tombol toggle
    themeToggleBtn.addEventListener('click', () => {
        body.classList.toggle('light-mode');
        
        if (body.classList.contains('light-mode')) {
            localStorage.setItem('theme', 'light');
            themeToggleBtn.innerHTML = '🌙 Dark Mode';
            themeToggleBtn.classList.replace('btn-outline-light', 'btn-outline-dark');
        } else {
            localStorage.setItem('theme', 'dark');
            themeToggleBtn.innerHTML = '☀️ Light Mode';
            themeToggleBtn.classList.replace('btn-outline-dark', 'btn-outline-light');
        }
    });
});
