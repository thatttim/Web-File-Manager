const uploadModal = document.getElementById('uploadModal');
const newDirModal = document.getElementById('newDirModal');
const renameModal = document.getElementById('renameModal');
const deleteModal = document.getElementById('deleteModal');

const uploadBtn = document.getElementById('uploadBtn');
const newDirBtn = document.getElementById('newDirBtn');
const renameBtns = document.querySelectorAll('.renameBtn');
const deleteBtns = document.querySelectorAll('.deleteBtn');
const closeBtns = document.querySelectorAll('.close');

// Open modals
uploadBtn.onclick = () => uploadModal.style.display = 'flex';

newDirBtn.onclick = () => newDirModal.style.display = 'flex';

renameBtns.forEach(btn => {
    btn.onclick = () => {
        const fileName = btn.getAttribute('data-file');
        document.getElementById('rename_from').value = fileName;
        document.getElementById('rename_to').value = fileName;
        renameModal.style.display = 'flex';
    };
});

deleteBtns.forEach(btn => {
    btn.onclick = () => {
        const fileName = btn.getAttribute('data-file');
        document.getElementById('delete_file').value = fileName;
        deleteModal.style.display = 'flex';
    };
});

// Close modals
closeBtns.forEach(btn => {
    btn.onclick = () => {
        uploadModal.style.display = 'none';
        newDirModal.style.display = 'none';
        renameModal.style.display = 'none';
        deleteModal.style.display = 'none';
    };
});

// Scroll detection
document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.header');
    const fileList = document.querySelector('.file-list');

    fileList.addEventListener('scroll', () => {
        header.classList.toggle('scrolled', fileList.scrollTop > 0);
    });
});


// Close modals by clicking outside
window.onclick = (event) => {
    if ([uploadModal, newDirModal, renameModal, deleteModal].includes(event.target)) {
        event.target.style.display = 'none';
    }
};
