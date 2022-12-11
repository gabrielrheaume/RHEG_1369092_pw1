let comments = []
let comments_to_pick = []

fetch("utils/comments.json").then(reply => reply.json()).then(data => {
    comments = data
    comment()
    // setInterval(comment, 500)
})

function comment()
{
    // fill the poll of comments to pick from is empty
    if(comments_to_pick.length == 0) comments_to_pick = comments
    let index = Math.floor(Math.random() * comments_to_pick.length)
    let chosen_comment = comments_to_pick[index]
    // remove the chosen comment to avoid getting it again until all comments have been picked up
    comments_to_pick.splice(index, 1)

    let text = chosen_comment["text"]
    let rating = chosen_comment["rating"]

    const body = document.querySelector('body')

    const div = document.createElement('div')
    div.setAttribute('class', 'comment')
    body.appendChild(div)

    const p = document.createElement('p')
    p.textContent = text
    div.appendChild(p)

    const stars = document.createElement('p')
    stars.setAttribute('class', 'stars')
    stars.textContent = getStarsRating(rating)
    div.appendChild(stars)

    div.addEventListener('click', (e) => {
        document.querySelector('.comment').remove()
    })
}

function getStarsRating(rating)
{
    let rounddown = Math.floor(rating)
    let rest = rating - rounddown
    let value = ""

    for(let i = 0; i < rounddown; i++)
    {
        value += '★'
    }

    if(rest == 0.5)
    {
        value += '\u2BEA' // star with half left full
        rounddown++
    }

    for(let i = rounddown; i < 5; i++)
    {
        value += '☆'
    }

    return value
}