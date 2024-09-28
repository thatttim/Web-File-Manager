document.addEventListener('DOMContentLoaded', () => {
    const icons = document.querySelectorAll('.icon');
    const windows = document.querySelectorAll('.window');
    let zIndex = 1;

    // Open window on icon double-click
    icons.forEach(icon => {
        icon.addEventListener('dblclick', () => {
            const windowId = icon.getAttribute('data-window');
            const win = document.getElementById(windowId);
            win.style.display = 'flex';
            win.style.zIndex = zIndex++;
            // Center window
            win.style.left = (window.innerWidth - win.offsetWidth) / 2 + 'px';
            win.style.top = (window.innerHeight - win.offsetHeight) / 2 + 'px';
        });
    });

    // Make windows draggable
    windows.forEach(win => {
        const header = win.querySelector('.window-header');
        const closeBtn = win.querySelector('.close-btn');
        const minimizeBtn = win.querySelector('.minimize-btn');
        let isDragging = false;
        let offsetX, offsetY;

        header.addEventListener('mousedown', (e) => {
            isDragging = true;
            offsetX = e.clientX - win.offsetLeft;
            offsetY = e.clientY - win.offsetTop;
            win.style.zIndex = zIndex++;
        });

        document.addEventListener('mousemove', (e) => {
            if (isDragging) {
                win.style.left = (e.clientX - offsetX) + 'px';
                win.style.top = (e.clientY - offsetY) + 'px';
            }
        });

        document.addEventListener('mouseup', () => {
            isDragging = false;
        });

        // Close window on close button click
        closeBtn.addEventListener('click', () => {
            win.style.display = 'none';
        });

        // Minimize window on minimize button click
        minimizeBtn.addEventListener('click', () => {
            win.style.display = 'none';
        });

        // Bring window to front on click
        win.addEventListener('mousedown', () => {
            win.style.zIndex = zIndex++;
        });
    });
});
