let comments = []
let comments_to_pick = null

fetch("utils/comments.json").then(reply => reply.json()).then(data => {
    comments = data
    comments_to_pick = comments.slice()
})

setInterval(comment, 30000) // à changer

/**
 * Display a comment that appears at the left (or right) of the screen
 * 
 * @return void
 */
function comment()
{
    // fill the poll of comments to pick from is empty
    if(comments_to_pick.length == 0)
    {
        comments_to_pick = comments.slice()
    }

    if(comments_to_pick.length > 0)
    {
        const index = Math.floor(Math.random() * comments_to_pick.length)
        let chosen_comment = comments_to_pick[index]
        // remove the chosen comment to avoid getting it again until all comments have been picked up
        comments_to_pick.splice(index, 1)
    
        const text = chosen_comment["text"]
        const rating = chosen_comment["rating"]
    
        const body = document.querySelector('body')
    
        const side = Math.round(Math.random())
    
        const div = document.createElement('div')
        if(side == 0) div.classList.add('comment', 'left')
        if(side == 1) div.classList.add('comment', 'right')
        const page_pos = document.documentElement.scrollTop
        div.style.top = (page_pos + window.innerHeight / 2) + "px"
        body.appendChild(div)
    
        const p = document.createElement('p')
        p.textContent = text
        div.appendChild(p)
    
        const stars = document.createElement('p')
        stars.setAttribute('class', 'stars')
        stars.textContent = getStarsRating(rating)
        div.appendChild(stars)
    
        const time = document.createElement('p')
        const date = new Date()
        let actual_time = date.getHours() + ':'
        if(date.getMinutes() < 10) actual_time += '0' + date.getMinutes()
        else actual_time += date.getMinutes()
        time.textContent = actual_time
        div.appendChild(time)
        
        setTimeout(deleteComment, 10000, div)
    
        div.addEventListener('click', (e) => {
            document.querySelector('.comment').remove()
        })
    }
}

/**
 * Convert numeric rating into string with stars representing that rating
 * 
 * @param float rating 
 * @return string stars rating
 */
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

function deleteComment(comment)
{
    comment.remove()
}