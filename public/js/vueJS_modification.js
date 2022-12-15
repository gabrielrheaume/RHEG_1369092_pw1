import { createApp, ref } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
const affichage = ref('modify')

/**
 * Return all classes of an element when giving his name
 * 
 * @param string name 
 * @return string list of all classes of the element
 */
function getClass(name)
{
    let classes = ""
    
    if(name == 'add') classes += 'add-link'
    if(name == 'modify') classes += 'modify-link'

    if(affichage.value == 'add' && name == 'add') classes += ' active'
    if(affichage.value == 'modify' && name == 'modify') classes += ' active'

    return classes
}

const root = {
    setup() {
        return {
            affichage,
            getClass,
        }
    }
}

createApp(root).mount('#app')