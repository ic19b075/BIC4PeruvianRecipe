<template>
    <div>
        <h1>A list of Ingredients</h1>
<!--        <br>-->
        <table class="is-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Creation Date</th>
                    <th>Quantity</th>
                    <th>Slug</th>
                    <th>Date of update</th>
                    <th>Recipte id</th>
                </tr>
            </thead>
           <tbody>
                <tr v-for="ingredient in ingredients" v-on:click="openIngredientDetails(ingredient)">
                    <td>{{ingredient.id}}</td>
                    <td>{{ingredient.name}}</td>
                    <td>{{ingredient.description}}</td>
                    <td>{{ingredient.created_at}}</td>
                    <td>{{ingredient.quantity}}</td>
                    <td>{{ingredient.slug}}</td>
                    <td>{{ingredient.updated_at}}</td>
                    <td>{{ingredient.recipe_id}}</td>
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
    import EditIngredient from "./EditIngredient";
    export default {
        name: "list-ingredient",
        components:{
            EditIngredient
        },
        mounted() {
            this.getIngredientList();
        },
        data() {
            return {
                ingredients: [],
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
            };
        },
        methods:{
            getIngredientList() {
                axios.get('/list/ingredient').
                then(response => {
                    console.log(response.data);
                    return response.data;
                }).then(jsonData => {
                  this.ingredients = jsonData;
                  console.log(this.ingredients);
                })
                    .catch(function(error) {
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
    table, th, td {
            border: 1px solid black;
            }
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
