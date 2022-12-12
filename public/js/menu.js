import { createApp, ref } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
const types = ref([])
const categories = ref([])
const meals = ref([])
const menu_arrow_category = ref("˅")
const category_menu = ref(false)
const menu_arrow_type = ref("˅")
const type_menu = ref(false)
const chosen_type = ref(0)
const chosen_category = ref(0)

fetch("utils/types.json").then(reply => reply.json()).then(data => {
    types.value = data
})

fetch("utils/categories.json").then(reply => reply.json()).then(data => {
    categories.value = data
})

fetch("utils/meals.json").then(reply => reply.json()).then(data => {
    meals.value = data
})

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
}

/**
 * Remove chosen type and category to display every meal
 * 
 * @return void
 */
function selectAll()
{
    chosen_type.value = 0
    chosen_category.value = 0
}

/**
 * Call filter method with one more parameter
 * 
 * @param object meal
 * @return bool
 */
function filterEntree(meal)
{
    return filterMeal(meal, 'Entrée')
}

/**
 * Call filter method with one more parameter
 * 
 * @param object meal
 * @return bool
 */
function filterMain(meal)
{
    return filterMeal(meal, 'Repas')
}

/**
 * Call filter method with one more parameter
 * 
 * @param object meal
 * @return bool
 */
function filterDessert(meal)
{
    return filterMeal(meal, 'Dessert')
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
        for(let category of meal["categories"])
        {
            if(category != chosen_category.value) return false
        }
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
 * Verify if there is an entree with chosen type and categories
 * 
 * @return bool true if there is no entree, false otherwise
 */
function noEntree()
{
    if(chosen_category.value == 0 && chosen_type.value == 0) return false
    if(!document.querySelector(".entree")) return true
    return false
}

/**
 * Verify if there is a main meal with chosen type and categories
 * 
 * @return bool true if there is no meal, false otherwise
 */
function noMain()
{
    if(chosen_category.value == 0 && chosen_type.value == 0) return false
    if(!document.querySelector(".main")) return true
    return false
}

/**
 * Verify if there is a main meal with chosen type and categories
 * 
 * @return bool true if there is no meal, false otherwise
 */
function noDessert()
{
    if(chosen_category.value == 0 && chosen_type.value == 0) return false
    if(!document.querySelector(".dessert")) return true
    return false
}

const root = {
    setup() {
        return {
            /* VARIABLES */
            types,
            categories,
            meals,
            menu_arrow_category,
            category_menu,
            menu_arrow_type,
            type_menu,
            chosen_type,
            chosen_category,

            /* METHODS */
            getMenu,
            selectChoice,
            selectAll,
            filterEntree,
            filterMain,
            filterDessert,
            typeCategories,
            noEntree,
            noMain,
            noDessert,
        }
    }
}

createApp(root).mount('#app')