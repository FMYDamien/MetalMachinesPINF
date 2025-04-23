document.addEventListener('DOMContentLoaded', () => {
    // Charger les contenus depuis la BDD
    let rawPage = location.pathname.split('/').pop().replace('.php', '');
    let page = rawPage.replace('_en', ''); // on normalise le slug
    
    const lang = rawPage.includes('_en') ? 'en' : 'fr';
    localStorage.setItem('lang', lang);
    

    fetch(`/MetalMachines-main/PHP/load_content.php?page=${page}&lang=${lang}`)

        .then(res => res.json())
        .then(data => {
            data.forEach(item => {
                if (item.type === 'image' && item.nom_fichier && item.chemin) {
                    const el = document.querySelector(`img[data-key="${item.id_element}"]`);
                    if (el) {
                        el.src = `/MetalMachines-main/${item.chemin}/${item.nom_fichier}?v=${Date.now()}`;
                    }
                } else if (item.type === 'titre' || item.type === 'paragraphe') {
                    const el = document.querySelector(`[data-key="${item.id_element}"]`);
                    if (el) {
                        el.innerHTML = item.contenu;
                    }
                }
                
            });
        });
});
