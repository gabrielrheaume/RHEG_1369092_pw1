import { createApp, ref } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
const types = ref([])
const categories = ref([])
const meals = ref([])
const menu = ref([])
const nb_meals = ref([0])
const nb_meals_display = ref(3)
const menu_arrow_category = ref("˅")
const category_menu = ref(false)
const menu_arrow_type = ref("˅")
const type_menu = ref(false)
const chosen_type = ref(0)
const chosen_category = ref(0)
const display_entree = ref(false)
const display_main = ref(false)
const display_dessert = ref(false)

fetch("utils/types.json").then(reply => reply.json()).then(data => {
    types.value = data
})

fetch("utils/categories.json").then(reply => reply.json()).then(data => {
    categories.value = data
})

fetch("utils/meals.json").then(reply => reply.json()).then(data => {
    meals.value = data
    nb_meals.value = meals.value.length
    menu.value = createArray(nb_meals_display.value)
})

/**
 * Create the menu array with specified maximum meals
 * 
 * @param int nb_elem
 * @return array
 */
function createArray(nb_elem)
{
    let array = []
    let i = 0
    let added_elem = 0

    while(added_elem < nb_elem && i < meals.value.length)
    {
        if(isDisplayed(meals.value[i]["type_id"], meals.value[i]["categories"]))
        {
            array.push(meals.value[i])
            added_elem++
        }
        i++
    }

    display_entree.value = false
    display_main.value = false
    display_dessert.value = false

    display_entree.value = verifyPresentType(array, 'Entrée')
    display_main.value = verifyPresentType(array, 'Repas')
    display_dessert.value = verifyPresentType(array, 'Dessert')

    return array
}

/**
 * Determine if a meal if displayed before the number of meals limit
 * 
 * @param int type_id 
 * @param array categories
 * 
 * @return bool
 */
function isDisplayed(type_id, categories)
{
    if(chosen_type.value != 0 && chosen_type.value != type_id) return false
    if(chosen_category.value != 0)
    {
        for(let category of categories)
        {
            if(chosen_category.value == category) return true
        }
        return false
    }
    return true
}

/**
 * Verify if a meal type is in the array
 * 
 * @param array
 * @param string type 
 */
function verifyPresentType(array, type)
{
    for(let item of array)
    {
        if(item["type"] == type) return true
    }
    return false
}

/**
 * Get Type and / or Category menu to filter meals
 * 
 * @param string menu name of the menu to display (type or category)
 * 
 * @return void
 */
function getMenu(menu)
{
    if(menu == 'category')
    {
        if(menu_arrow_category.value == '˅') menu_arrow_category.value = '˄'
        else menu_arrow_category.value = '˅'
        category_menu.value = category_menu.value ? false : true
    }
    else
    {
        if(menu_arrow_type.value == '˅') menu_arrow_type.value = '˄'
        else menu_arrow_type.value = '˅'
        type_menu.value = type_menu.value ? false : true
    }
}

/**
 * Select the chosen choice in type or category menu
 * 
 * @param string type name of the menu (type or category) in which the element has been selected
 * @param int id id of the element
 * 
 * @return void
 */
function selectChoice(type, received_value)
{
    if(type == 'type')
    {
        chosen_type.value = chosen_type.value == received_value ? 0 : received_value
    }
    else
    {
        chosen_category.value = chosen_category.value == received_value ? 0 : received_value
    }
    menu.value = createArray(nb_meals_display.value)
}

/**
 * Remove chosen type and category to display every meal
 * 
 * @return void
 */
function selectAll()
{
    chosen_category.value = 0
    chosen_type.value = 0

    menu.value = createArray(nb_meals_display.value)
}

/**
 * Filter Meal to only get what is asked
 * 
 * @param object meal 
 * @returns bool
 */
function filterMeal(meal, type_of_meal)
{

    if(meal['type'] != type_of_meal) return false
    if(chosen_type.value != 0 && chosen_type.value != meal['type_id']) return false
    if(chosen_category.value != 0)
    {
        let find = false
        for(let category of meal["categories"])
        {
            if(category == chosen_category.value) find = true
        }
        if(!find) return false
    }
    return true
}

/**
 * Create the sentence containing the type and all categories of a meal
 * 
 * @param object meal 
 * @return string
 */
function typeCategories(meal)
{
    let text = ""
    text += meal["type"]
    for(let category of meal["categories"])
    {
        text += ", " + category
    }
    return text
}

/**
 * Create the link to modify a meal with his id
 * 
 * @param int id id of the meal
 * @return string the link
 */
function getLink(id)
{
    return 'modifier-plat?id=' + id
}

/**
 * Display more meals
 * 
 * @return void
 */
function seeMore()
{
    nb_meals_display.value += 3
    if(nb_meals_display.value > nb_meals.value) nb_meals_display.value = nb_meals.value
    menu.value = createArray(nb_meals_display.value)
}

/**
 * Determine if there is more meal to display
 * 
 * @return bool
 */
function displaySeeMore()
{
    let nb_meals_filtered = 0
    for(let meal of meals.value)
    {
        if(filterMeal(meal, meal["type"])) nb_meals_filtered++
    }
    if(nb_meals_display.value >= nb_meals_filtered) return false
    return true
}

const root = {
    setup() {
        return {
            /* VARIABLES */
            types,
            categories,
            meals,
            menu,
            nb_meals,
            nb_meals_display,
            menu_arrow_category,
            category_menu,
            menu_arrow_type,
            type_menu,
            chosen_type,
            chosen_category,
            display_entree,
            display_main,
            display_dessert,

            /* METHODS */
            getMenu,
            selectChoice,
            selectAll,
            filterMeal,
            typeCategories,
            getLink,
            seeMore,
            displaySeeMore,
        }
    }
}

createApp(root).mount('#app')