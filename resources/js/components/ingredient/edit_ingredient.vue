<template id="edit_ingredient">
    <div class="card">
        <div class="card-header">
            <h1 class="card-header-title is-centered"> Edit </h1>
        </div>
        <div class="card-content" style="background-color:#f4f8ed">
            <form v-model="form" @submit.prevent="submit">
                <strong> Name: </strong>
                <input type="text" style="height:35px;width:200px; font-size:15px; background-color:#f1f6f2" class="form-control" v-model="ingredient.name"/>
                <strong> Description: </strong>
                <textarea style="height:50px;width:650px; font-size:15px; background-color:#f1f6f2" cols="90" v-model="ingredient.description"/>
                <strong> For Recipe: </strong>
                <!---<input type="number" style="height:35px;width:40px; font-size:18px; background-color:#f1f6f2" class="form-control" v-model="ingredient.recipeId"/>-->
                <select style="font-size:20px" class="form-control" v-model="ingredient.recipeId">
                    <option v-for="recipe in recipes" :key="recipe.id" v-bind:value="recipe.id">{{recipe.name}}</option>
                </select>
                <hr>
                    <button class="block">Submit</button>
            </form>
        </div>
        <div class="card-footer" style="background-color:#f6f8ed ">
            <div class="card-footer-item">
                <pre class="my-pre">
                    <p style="font-size:30px; color:#829247; font-weight: bold; text-align:center;">PREVIEW</p>
                    <p style="font-size:25px; text-align:center; font-weight: bold">{{form.name = ingredient.name}}</p>
                    <p style="font-size:25px; text-align:center; font-weight: bold">{{form.slug = ingredient.slug}}</p>
                                        <p style="font-size:21px; max-width: 30em">{{form.description = ingredient.description}}</p>
                    <p style="font-size:19px; text-align:center; font-weight: bold">Recipe ID: {{form.recipe_id = ingredient.recipeId}}</p>
                </pre>
            </div>
            <div>
        <pre>
            <p style="background-color: orange">You are now in EDIT-MODE. Every Change made</br>here will be written directly to the Database.</br>Please be careful.</br>See <b>console.log</b> for</br>errors or success</p>
        </pre>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
    let form = new Form({
        'slug':'',
        'name':'',
        'description':'',
        'recipe_id':''
    });
    export default {
        name: "edit_ingredient",
        components:{
            QueryMessage
        },
        props: ['ingredient'],
        created(){
            console.log("edit_ingredient loaded");
            axios.get('../list/recipe')
                .then(response => {
                    this.recipes = response.data;
                    console.log("Inhalt recipies");
                    console.log(this.recipes);
                })
                .catch(e => console.log(e));
        },
        data(){
            return{
                form:form,
                url:'',
                recipes:[]
            }
        },
        methods:{
            submit() {
                this.url='/ingredient/' + form.slug;
                console.log(form.name + " " + form.description + " " + form.recipe_id)
                console.log(this.url);
                this.form
                    .put(this.url)
                    .then((response)=>{
                        console.log(response);
                    })
                    .catch((error)=>{
                        console.log("Errormessage:");
                        console.log(this.form.failMessage);
                    });
            }
        }

    }
</script>

<style scoped>
    .block {
        display: block;
        width: 100%;
        border: none;
        background-color: #00b89c;
        color: white;
        padding: 14px 28px;
        font-size: 20px;
        cursor: pointer;
        text-align: center;
    }
    .block:hover {
        background-color: green;
        color: black;
    }
    hr {
        border: 3px solid #318b35;
        border-radius: 10px;
    }

    .my-pre{
        background-color: rgb(244, 252, 226);
        background-size:2.4em 2.4em;
        background-origin:content-box;

        /* some extra styles*/
        padding:0 20px;
        text-align:justify;
        font-family:calibri,arial,sans-serif;
    }
</style>
