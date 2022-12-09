const bloc_experience = document.querySelector(".experience")
const img = document.querySelector(".experience .exp-container img")
const bloc_texte = document.querySelector(".bloc-texte")

let height = img.height
let new_height = height + 100

bloc_experience.style.height = new_height + "px"
img.style.height = height + "px"
bloc_texte.style.height = height + "px"