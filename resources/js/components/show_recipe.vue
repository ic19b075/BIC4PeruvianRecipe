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
            <tr>
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
                        <th>Einheit</th>
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
    </div>
</template>

<script>
    export default {
        name: "show_recipe.vue",
        data(){
            return{
                recipes:[],
                ingredients:[]
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
        }

    }



</script>

<style scoped>

</style>



