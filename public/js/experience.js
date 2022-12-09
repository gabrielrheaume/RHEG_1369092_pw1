/* set dimension on text area for heading image */
setTimeout(changeHeight, 0.5)

function changeHeight()
{
    const heading_image = document.querySelector(".heading img")
    height = heading_image.height
    const text_area = document.querySelector(".heading .text-area")
    text_area.style.height = height * 0.65 + "px"
}

/* set experience text the same height as the images behind */
const experience_block = document.querySelector("section.experience")
const img = document.querySelector(".experience .exp-container img")
const text_block = document.querySelector(".experience .bloc-texte")

let height = img.height
let new_height = height + 100

experience_block.style.height = new_height + "px"
img.style.height = height + "px"
text_block.style.height = height + "px"
