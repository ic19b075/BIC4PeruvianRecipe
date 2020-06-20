<template>
    <div class="table-container is-fullwidth">
        <h1>
            All Ingredients
        </h1>
       <table class="table is-fullwidth is-hoverable">
        <thead>
            <tr cass="title is-6">
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
            <tr v-for="ingredient in ingredients" :key="ingredient.id">
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
</template>

<script>
    export default {
        name: "show_ingredient",
        data(){
            return{
                ingredients:[]
            }
        },
        created() {
            console.log("Component show_ingredient eingebunden");
            axios.get('./list/ingredient')
                .then(response => this.ingredients = response.data)
                .catch(e => console.log(e));
        }
    }

</script>

<style scoped>

</style>
