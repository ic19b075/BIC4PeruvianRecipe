<template id="edit_ingredient">
    <div class="card">
        <div class="card-header">
            <h1 class="card-header-title is-centered"> Edit </h1>
        </div>
        <div class="card-content">
            <form v-model="form" @submit.prevent="submit">
                <strong> Name: </strong>
                <input type="text" style="height:35px;width:200px; font-size:15px" class="form-control" v-model="ingredient.name"/>
                <strong> Description: </strong>
                <textarea style="height:50px;width:650px; font-size:15px" cols="90" v-model="ingredient.description"/>
                <strong> Für Rezept: </strong>
                <input type="number" style="height:35px;width:40px; font-size:18px;" class="form-control" v-model="ingredient.recipeId"/>
                <hr>
                    <button class="block">Submit</button>
            </form>
        </div>
        <div class="card-footer">
            <div class="card-footer-item">
            <pre class="my-pre">
                <p style="font-size:30px; color:#829247; font-weight: bold; text-align:center;">P R E V I E W</p>
                <p style="font-size:25px; text-align:center; font-weight: bold">{{form.name = ingredient.name}}</p>
                <p style="font-size:21px">{{form.description = ingredient.description}}</p>
                <p style="font-size:19px; text-align:center; font-weight: bold">Rezept ID:  {{form.recipe_id = ingredient.recipeId}}</p>
                <p style="font-size:19px;text-align:center; font-weight: bold">Rezept Slug:  {{form.slug = ingredient.slug}}</p>
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
            console.log("edit_ingredient ist geladen");
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
    .block {
        display: block;
        width: 100%;
        border: none;
        background-color: #4caf50;
        color: white;
        padding: 14px 28px;
        font-size: 20px;
        cursor: pointer;
        text-align: center;
    }
    .block:hover {
        background-color: #ddd;
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
