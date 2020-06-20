<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="card column is-half is-offset-one-quarter">
                <header class="card-header">
                    <h1 class="card-header-title">
                        Edit Ingredient
                    </h1>
                </header>
                <div class="card-content">
                    <form class="vue-form" @submit.prevent="submit">
                        <div class="field">
                            <label class="label" for="name">Name</label>
                            <div class="control">
                                <input type="text" class="input" name="name" id="name" required="" v-model="form.name">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label" for="description">Description</label>
                            <div class="control">
                                <textarea class="textarea" name="description" id="description" required="" v-model="form.description"></textarea>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label" for="ingredient_id">Ingredient ID</label>
                            <div class="control">
                                <div class="select is-fullwidth" :class="loading ? 'is-loading' : ''">
                                    <select id="ingredient_id" :disabled="loading" v-model="form.ingredient.id">
                                        <option v-if="loading" :value="this.form.recipe_id">Loading...</option>
                                        <option v-for="ingredient in ingredients" v-if="!loading" v-text="ingredient.name" :value="ingredient.id"></option>
                                    </select>
                                </div>
                            </div>
                            <p class="help is-danger" v-if="form.errors.has('recipe_id')"
                               v-text="form.errors.get('recipe_id')"/>
                            <p v-if="noRecipeID" class="help is-warning">Add a recipe to edit ingredients!</p>
                        </div>
                        <br/>
                        <div>
                            <input type="submit" class="button is-primary" value="Update">
                        </div>
                    </form>
                    <br/>
                    <div>
                        <button class="button is-primary" @click="deleteIngredient()">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    let form = new Form({
        'name': '',
        'description': '',
        'ingredient_id': '',
        'noReset': ['recipe_id']
    });
    export default {
        name: "insert_ingredientComponent",
        components: {
            QueryMessage
        },
        props: ['title'],
        mounted() {
            console.log('EditIngredient mounted.')
        },
        methods: {
            // submit form handler
            submit() {
                this.form.put('/ingredient/' + this.ingredient.slug).then((response) => {
                    console.log(response);
                    alert("Successfully updated ingredient")
                }).catch(error => {
                    console.log(error),
                        alert("ERROR:\nIngredient name already exists")
                });
            },
            deleteIngredient(){
                if (confirm("Are you sure you want to delete this Ingredient?\nIt cannot be restored")) {
                    axios.delete('/ingredient/' + this.ingredient.slug).then(response => {
                        console.log(response);
                        window.location.href = '/ingredient';
                    }).catch(error => {
                        console.log(error)
                    });
                }
            }
        },
        data() {
            return {
                form: form,
                recipes: [],
               ingredients: [],
                ingredient: {
                    slug: '',
                },
                noRecipeID: false
            }
        },
        created() {
            let url  =  window.location.pathname.split('/');
            let ingredient = url[2];
            axios.get('/list/ingredient').then(response => {
                for (let i = 0; i < response.data.length; i++) {
                    if (ingredient == response.data[i].slug){
                        console.log(response)
                        this.ingredient.slug = response.data[i].slug;
                        this.form.name = response.data[i].name;
                        this.form.description = response.data[i].description;
                        this.form.recipe_id = response.data[i].recipe_id;
                        this.form.noReset = ['name', 'description', 'recipe_id'];
                    }
                }
            }).catch(error => {
                console.log(error)
            });
            axios.get('/list/recipe').then((response) => {
                console.log(response)
                this.recipes = response.data;
                if(this.loading)
                    this.noRecipesID = true;
            }).catch(error => {
                console.log(error)
            });
        },
        computed: {
            loading() {
                return !this.recipes.length
            }
        },
        watch: {
            recipes() {
                if (!this.loading && this.form.recipes_id === '') {
                    this.form.recipes_id = _.first(this.recipes).id;
                }
            }
        }
    }
</script>
<style scoped></style>
