// === /JS/edit-mode.js ===
window.temporaryImages = [];

document.addEventListener('DOMContentLoaded', () => {

    const editToggle = document.getElementById('edit-toggle');
    const cancelBtn = document.getElementById('edit-cancel');
    const editIcon = document.getElementById('edit-icon');
    const checkIcon = document.getElementById('check-icon');
    window.editing = false;
    let editing = false;
    let originalContent = {};

    if (!editToggle) return;

    editToggle.onclick = function () {
        if (!editing) {
            window.editing = true; // quand on entre en mode édition
            editing = true;
            editIcon.style.display = 'none';
            checkIcon.style.display = '';
            cancelBtn.style.display = '';
            document.querySelectorAll('.editable').forEach((el) => {
                el.setAttribute('contenteditable', 'true');
                el.classList.add('editing');
                const key = el.dataset.key;
                if (el.tagName === 'IMG') {
                    el.style.cursor = 'pointer';
                } else {
                    el.style.cursor = 'text';
                }
                if (el.tagName === 'IMG') {
                    originalContent[key] = el.src;
                } else {
                    originalContent[key] = el.innerHTML;
                }
            });
        } else {
            console.log("Images à sauvegarder :", window.temporaryImages);

            const updates = [];
            document.querySelectorAll('.editable').forEach((el) => {
                updates.push({
                    id_element: el.dataset.key,
                    contenu: el.innerHTML,
                    lang: localStorage.getItem('lang') || 'fr'
                });
            });

            fetch('../PHP/save_content.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    batch: updates,
                    images: window.temporaryImages || []
                })
            })
            .then(res => res.text())
            .then(() => {
                alert("Modifications enregistrées !");
                finishEdit();
                fetch('/MetalMachines-main/PHP/delete_temp_image.php')
                    .then(res => res.json())
                    .then(data => {
                        console.log("🧹 Images supprimées :", data.deleted);
                    });
            });
        }
    };

    cancelBtn.onclick = function () {
        window.editing = false; // quand on valide ou annule
        document.querySelectorAll('.editable').forEach((el) => {
            const key = el.dataset.key;
            if (el.tagName === 'IMG') {
                el.src = originalContent[key];
            } else {
                el.innerHTML = originalContent[key];
            }
        });
        finishEdit();
        fetch('/MetalMachines-main/PHP/delete_temp_image.php')
            .then(res => res.json())
            .then(data => {
                console.log("🧹 Images supprimées :", data.deleted);
            });
    };

    function finishEdit() {
        window.editing = false; // quand on valide ou annule
        editing = false;
        editIcon.style.display = '';
        checkIcon.style.display = 'none';
        cancelBtn.style.display = 'none';
        document.querySelectorAll('.editable').forEach((el) => {
            el.style.cursor = 'default'; // neutralise le style dynamique
            el.removeAttribute('contenteditable');
            el.classList.remove('editing');
        });
        originalContent = {};
        
    }
});
