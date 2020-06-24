<template id="edit_ingredient">
    <div class="card">
        <div class="card-header">
            <h1 class="card-header-title is-centered"  >Edit</h1>
        </div>
        <div class="card-content">
            <form v-model="form" @submit.prevent="submit">
                <strong>Name:</strong>
                <input type="text" class="form-control" v-model="ingredient.name"/>
                <strong>Description:</strong>
                <textarea class="form-control" v-model="ingredient.description"/>
                <strong>Für Rezept:</strong>
                <input type="number" class="form-control" v-model="ingredient.recipeId"/>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
        <div class="card-footer">
            <div class="card-footer-item">
            <pre>
                <p>{{form.name = ingredient.name}}</p>
                <p>{{form.description = ingredient.description}}</p>
                <p>{{form.recipe_id = ingredient.recipeId}}</p>
                <p>{{form.slug = ingredient.slug}}</p>
            </pre>
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
        },
        data(){
            return{
                form:form,
                url:''
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

</style>
