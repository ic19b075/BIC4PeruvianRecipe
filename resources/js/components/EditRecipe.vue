<template id="edit-recipe">
    <div class="card">
        <div class="card-header">
            <h1 class="card-header-title is-centered"  >Edit</h1>
        </div>
        <div class="card-content">
            <form v-model="form" @submit.prevent="submit">
                <strong>Name:</strong>
                <input type="text" class="form-control" v-model="recipe.name"/>
                <strong>Description:</strong>
                <textarea class="form-control" v-model="recipe.description"/>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
        <div class="card-footer">
            <div class="card-footer-item">
            <pre>
                <p>{{form.name = recipe.name}}</p>
                <p>{{form.description = recipe.description}}</p>
                <p>{{form.recipe_id = recipe.recipeId}}</p>
                <p>{{form.slug = recipe.slug}}</p>
            </pre>
            </div>
            <div class="card-footer-item">
                <h1>Irgend ein Text</h1>
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
        name: "edit-ingredient",
        components:{
            QueryMessage
        },
        props: ['recipe'],
        created(){
            console.log("insert_ingerdient ist geladen");
        },
        data(){
            return{
                form:form,
                url:''
            }
        },
        methods:{
            submit() {
                this.url='/recipe/' + form.slug;
                console.log(form.name + " " + form.description);
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

</style>
