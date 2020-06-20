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
            <tr v-for="ingredient in ingredients" :key="ingredient.id" v-on:click="openIngredientDetails(ingredient)">
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
        <div id="ingredientDetails" class="overlay">
            <a href="javascript:void(0)" class="closebtn" v-on:click="closeDetails()">&times;</a>
            <div class="overlay-content">
                <edit-ingredient :ingredient="ingredient"></edit-ingredient>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "show_ingredient",
        data(){
            return{
                ingredients:[],
                ingredient: {
                    id : 0,
                    name: '',
                    description: '',
                    creationDate: '',
                    quantity: '',
                    slug: '',
                    recipeId: '',
                    updateDate: ''
                }
            }
        },
        created() {
            console.log("Component show_ingredient eingebunden");
            axios.get('./list/ingredient')
                .then(response => this.ingredients = response.data)
                .catch(e => console.log(e));
        },
        methods: {
            getIngredientList() {
                axios.get('/list/ingredient').then(response => {
                    console.log(response.data);
                    return response.data;
                }).then(jsonData => {
                    this.ingredients = jsonData;
                    console.log(this.ingredients);
                })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            openIngredientDetails(value) {
                document.getElementById("ingredientDetails").style.width = "100%";
                console.log(value);
                this.ingredient.name = value.name;
                this.ingredient.id = value.id;
                this.ingredient.description = value.description;
                this.ingredient.creationDate = value.created_at;
                this.ingredient.quantity = value.quantity;
                this.ingredient.slug = value.slug;
                this.ingredient.recipeId = value.recipe_id;
                this.ingredient.updateDate = value.updated_at;
                console.log(this.ingredient.name);
            },
            closeDetails() {
                document.getElementById("ingredientDetails").style.width = "0%";
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
