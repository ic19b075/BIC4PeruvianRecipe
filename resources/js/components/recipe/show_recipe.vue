<template>
    <div class="table-container is-fullwidth">
        <h1>
            All Recipes
        </h1>
        <div v-for="recipe in recipes" :key="recipe.id">
            <h1>
                Rezept
            </h1>
            <table class="table is-fullwidth is-hoverable" >
            <thead>
            <tr cass="title is-6">
                <th>ID</th>
                <th>Slug</th>
                <th>Name</th>
                <th>Beschreibung</th>
            </tr>
            </thead>
            <tbody>
            <tr v-on:click="openRecipeDetails(recipe)">
                <th>{{recipe.id}}</th>
                <th>{{recipe.slug}}</th>
                <th>{{recipe.name}}</th>
                <th>{{recipe.description}}</th>
            </tr>
            </tbody>
        </table>

        <h1>
            Zutaten
        </h1>
            <div >
                <table class="table is-fullwidth is-hoverable">
                    <thead>
                    <tr cass="title is-5">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Beschreibung</th>
                        <th>Eiheit</th>
                        <th>Menge</th>
                        <th>slug</th>
                        <th>Recipe_id</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr v-for="ingredient in filtering_all(ingredients,recipe.id)" :key="ingredient.id">
                        <th>{{ingredient.id}}</th>
                        <th>{{ingredient.name}}</th>
                        <th>{{ingredient.description}}</th>
                        <th>{{ingredient.unit}}</th>
                        <th>{{ingredient.quantity}}</th>
                        <th>{{ingredient.slug}}</th>
                        <th>{{ingredient.recipe_id}}</th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="recipeDetails" class="overlay">
            <a href="javascript:void(0)" class="closebtn" v-on:click="closeDetails()">&times;</a>
            <div class="overlay-content">
                <edit-recipe :recipe="recipe"></edit-recipe>
            </div>
        </div>
    </div>
</template>

<script>
    import EditRecipe from "./edit_recipe";
    export default {
        name: "show_recipe.vue",
        components: {EditRecipe},
        data(){
            return{
                recipes:[],
                ingredients:[],
                recipe: {
                    slug: '',
                    description: '',
                    name: ''
                }
            }
        },
        created() {
            //console.log("Component show_recipe eingebunden");
            axios.get('./list/recipe')
                .then(response => this.recipes = response.data)
                .catch(e => console.log(e));
            axios.get('./list/ingredient')
                .then(response => this.ingredients = response.data)
                .catch(e => console.log(e));
        },
        methods:{
            filtering_all(inPut, filterKey){
            var list= [];
            for(var i=0;i<inPut.length;i++){
                if(inPut[i].recipe_id == filterKey){
                    list.push(inPut[i]);
                }
            };
        //console.log("Funktion wurde druchlaufen")
        //console.log(list);
        return list;
        },
            openRecipeDetails(recipe) {
                document.getElementById("recipeDetails").style.width = "100%";
                console.log("RECIPE DETAILS TEST");
                console.log(recipe);
                this.recipe.slug = recipe.slug;
                this.recipe.name = recipe.name;
                this.recipe.description = recipe.description;
            },
            closeDetails() {
                document.getElementById("recipeDetails").style.width = "0%";
                axios.get('./list/recipe')
                    .then(response => this.recipes = response.data)
                    .catch(e => console.log(e));
                axios.get('./list/ingredient')
                    .then(response => this.ingredients = response.data)
                    .catch(e => console.log(e));
            }
        }

    }



</script>

<style scoped>
    /*table, th, td {*/
    /*    border: 1px solid black;*/
    /*}*/
    tr:hover {
        background: azure;
    }

    .overlay {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: white;
        background-color: white;
        overflow-x: hidden;
        transition: 0.5s;
    }

    .overlay-content {
        position: relative;
        top: 25%;
        width: 100%;
        text-align: center;
        margin-top: 30px;
    }

    .overlay a {
        padding: 8px;
        text-decoration: none;
        font-size: 36px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .overlay a:hover, .overlay a:focus {
        color: #f1f1f1;
    }

    .overlay .closebtn {
        position: absolute;
        top: 20px;
        right: 45px;
        font-size: 60px;
    }
</style>



