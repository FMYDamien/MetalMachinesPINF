<style>
.editable {
    cursor: default; /* toujours neutre par défaut */
}

#edit-controls {
    position: fixed;
    right: 2vw;
    bottom: 2vw;
    z-index: 9999;
    display: flex;
    flex-direction: column-reverse;
    align-items: flex-end;
    gap: 1em;
    pointer-events: none;
}
#edit-controls button {
    width: 58px;
    height: 58px;
    border-radius: 50%;
    background: #333;
    color: #fff;
    font-size: 1.8em;
    border: none;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    cursor: pointer;
    transition: background 0.2s, transform 0.15s ease;
    pointer-events: all;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0.85;
}
#edit-controls button:hover {
    transform: scale(1.1);
    opacity: 1;
}

#edit-toggle {
    background-color: #444;
}

#edit-toggle:hover {
    background-color: #4b8cff;
}

#edit-cancel {
    background: #b22222;
    font-size: 1.6em;
}

#edit-cancel:hover {
    background-color: #e53935; /* rouge plus vif */
}

.editable.editing {
    outline: 2px dashed rgba(75, 140, 255, 0.8);
    background-color: rgba(75, 140, 255, 0.05);
    transition: background-color 0.2s ease, outline 0.2s ease;
    position: relative;
    outline-offset: 2px;
    cursor: text;
}

.editable.editing:focus {
    outline-color:rgb(4, 121, 218);
    background-color: rgba(75, 140, 255, 0.1);
}

.editable.editing.img-editing {
    cursor: pointer;
}
</style>


<footer>
        <p>Métal Machines</p>
        <hr>
        <nav>
            <ul class="menu-foot">
                    <li><a href="accueil_en.php">Home</a></li>
                    <li><a href="qui-sommes-nous_en.php">Company</a></li>
                    <li><a href="competences_en.php">Expertise</a></li>
                    <li><a href="actualites_en.php">News</a></li>
                    <li><a href="contact_en.php">Contact us</a></li>
                    <?php // Mode admin  (Admin ou Déconnexion)
                    if (isset($_SESSION['admin'])) { ?>
                        <li>
                            <span id="admin-duration" data-start="<?= $_SESSION['admin']['login_time'] ?>">
                                Connected since ...
                            </span>
                        </li>
                    <?php    echo '<li><a href="../PHP/controleur.php?action=logout">Logout</a></li>';
                    } else {
                        echo '<li><a href="admin.php">Admin</a></li>';
                    }
                    ?>
            </ul>
        </nav>
        <!-- Chargé par tout le monde -->
        <script src="../JS/main.js"></script>


        <!-- Uniquement pour l'admin -->
        <?php if (isset($_SESSION['admin'])): ?>
            <!-- Cropper.js CSS -->
            <link href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet" />
            <!-- Cropper.js JS -->
            <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js"></script>

            <div id="cropperModal" style="display:none; position:fixed; top:0; left:0; right:0; bottom:0; background:#000000cc; z-index:10000; justify-content:center; align-items:center;">
                <div style="background:white; padding:20px; border-radius:8px; max-width:90vw; max-height:90vh;">
                    <img id="imageToCrop" style="max-width:100%; max-height:70vh;">
                    <div style="text-align:right; margin-top:10px;">
                        <button id="cancelCrop">Annuler/Cancel</button>
                        <button id="confirmCrop">Valider/Confirm</button>
                    </div>
                </div>
            </div>


            <!-- Boutons d'édition flottants -->
            <div id="edit-controls">
                <button id="edit-toggle" title="Modify content">
                    <span id="edit-icon">&#9998;</span><!-- 🖉 -->
                    <span id="check-icon" style="display:none">&#10003;</span><!-- ✅ -->
                </button>
                <button id="edit-cancel" title="Cancel changes" style="display:none;">&#10006;</button><!-- ❌ -->
            </div>

            
            <script src="../JS/edit-mode.js"></script>
            <script src="../JS/edit-images.js"></script>
        <?php endif; ?>
</footer>

<!-- Temps connexion admin dynamique-->
<script>
window.addEventListener("DOMContentLoaded", function () {
    const span = document.getElementById("admin-duration");
    if (!span) return;

    const start = parseInt(span.dataset.start) * 1000;

    function updateDuration() {
        const now = Date.now();
        const elapsed = now - start;

        const hours = Math.floor(elapsed / 3600000);
        const minutes = Math.floor((elapsed % 3600000) / 60000);
        const seconds = Math.floor((elapsed % 60000) / 1000);

        if (hours > 0) {
            span.textContent = `Connecté depuis/Connected for ${hours} h ${minutes} min`;
        } else {
            span.textContent = `Connecté depuis/Connected for ${minutes} min ${seconds} s`;
        }
    }

    updateDuration();
    setInterval(updateDuration, 1000); // met à jour chaque seconde
});
</script>