(function() {

    const tagsInput = document.querySelector('#tags_input')

    if(tagsInput) {

        const tagsDiv = document.querySelector('#tags');
        const tagsInputHidden = document.querySelector('[name="tags"]');

        let tags = [];

        // Recuperar del input ocult
        if(tagsInputHidden.value !== '') {
            tags = tagsInputHidden.value.split(',');
            mostrarTags();
        }
 
        // Escoltar els canvis en el input
        tagsInput.addEventListener('keypress', guardarTag)

        function guardarTag(e) {
            if(e.keyCode === 44) {
                if(e.target.value.trim() === '' || e.target.value < 1) { 
                    return
                }
                e.preventDefault();
                tags = [...tags, e.target.value.trim()];
                tagsInput.value = '';
                mostrarTags();
            }
        }

        function mostrarTags() {
            tagsDiv.textContent = '';
            tags.forEach(tag => {
                const etiqueta = document.createElement('LI');
                etiqueta.classList.add('formulari__tag')
                etiqueta.textContent = tag;
                etiqueta.ondblclick = eliminarTag
                tagsDiv.appendChild(etiqueta)
            })
            actualitzarInputHidden();
        }   

        function eliminarTag(e) {
            e.target.remove()
            tags = tags.filter(tag => tag !== e.target.textContent)
            actualitzarInputHidden();
        }

        function actualitzarInputHidden() {
           tagsInputHidden.value = tags.toString();
        }
    }

})();