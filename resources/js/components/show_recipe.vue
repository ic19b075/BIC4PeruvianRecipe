<template>
    <div class="table-container is-fullwidth">
        <h1>
            All Recipes
        </h1>
        <table class="table is-fullwidth is-hoverable">
            <thead>
            <tr cass="title is-6">
                <th>ID</th>
                <th>Slug</th>
                <th>Name</th>
                <th>Beschreibung</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="recipe in recipes" :key="recipe.id">
                <th>{{recipe.id}}</th>
                <th>{{recipe.slug}}</th>
                <th>{{recipe.name}}</th>
                <th>{{recipe.description}}</th>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "show_recipe.vue",
        data(){
            return{
                recipes:[]
            }
        },
        created() {
            console.log("Component show_recipe eingebunden");
            axios.get('./list/recipe')
                .then(response => this.recipes = response.data);
        }
    }
</script>

<style scoped>

</style>



