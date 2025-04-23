document.addEventListener('DOMContentLoaded', () => {
    let cropper, originalImageSrcs = {};

    document.querySelectorAll('img.editable').forEach((img) => {
        img.addEventListener('click', () => {
            if (!window.editing) return;

            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = 'image/*';

            fileInput.onchange = (e) => {
                const file = e.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = function (event) {
                    openCropperModal(img, event.target.result);
                };
                reader.readAsDataURL(file);
            };

            fileInput.click();
        });
    });

function openCropperModal(imgTarget, dataUrl) {
    const modal = document.getElementById('cropperModal');
    const image = document.getElementById('imageToCrop');
    const cancelBtn = document.getElementById('cancelCrop');
    const confirmBtn = document.getElementById('confirmCrop');

    image.src = dataUrl;
    modal.style.display = 'flex';

    if (cropper) cropper.destroy();
    cropper = new Cropper(image, {
        aspectRatio: imgTarget.naturalWidth / imgTarget.naturalHeight,
        viewMode: 1,
    });

    // Annulation
    cancelBtn.onclick = () => {
        cropper.destroy();
        modal.style.display = 'none';
    };

    // Validation
    confirmBtn.onclick = () => {
        const canvas = cropper.getCroppedCanvas();
        const fileType = 'image/png'; // toujours png
        canvas.toBlob((blob) => {
            const formData = new FormData();
            formData.append('image', blob);
            formData.append('element_id', imgTarget.dataset.key);
            formData.append('type', fileType);

            fetch('../PHP/upload_image.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    imgTarget.src = res.image_url;
                    modal.style.display = 'none';
                    cropper.destroy();
            
                    // Stocker cette image comme temporaire pour validation
                    window.temporaryImages = window.temporaryImages || [];
            
                    window.temporaryImages.push({
                        element_id: imgTarget.dataset.key,
                        filename: res.temp_filename,
                        type: fileType
                    });
                    console.log("Image temporaire ajoutée :", window.temporaryImages);

            
                } else {
                    alert('Erreur : ' + res.error);
                }
            });
            
        }, fileType);
    };
}

});