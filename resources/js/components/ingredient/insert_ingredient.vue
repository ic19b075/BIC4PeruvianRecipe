<template>
    <div class="card">
        <div class="card-header">
            <h1 class="card-header-title is-centered"  >New Ingredient</h1>
        </div>
        <div class="card-content">
            <form v-model="form" @submit.prevent="submit">
                <strong>Name:</strong>
                <input type="text" class="form-control" v-model="form.name"/>
                <strong>Description:</strong>
                <textarea class="form-control" v-model="form.description"/>
                <strong>Quantity:</strong>
                <input type="number"  class="form-control" v-model="form.quantity"/>
                <strong>Unit:</strong>
                <select class="form-control" v-model="form.unit">
                    <option value="grams">grams</option>
                    <option value="milliliters">milliliters</option>
                    <option value="pieces">pieces</option>
                </select>
                <strong>For Recipe:</strong>
                <input type="number" class="form-control" v-model="form.recipe_id"/>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
        <div class="card-footer">
            <div class="card-footer-item">
            <pre>
                <p>{{form.name}}</p>
                <p>{{form.description}}</p>
                <p>{{form.quantity}}</p>
                <p>{{form.unit}}</p>
                <p>{{form.recipe_id}}</p>
                <p>{{form.id}}</p>
            </pre>
            </div>
        </div>
    </div>
</template>

<script>
    let form = new Form({
        'id':'',
        'slug':'',
        'name':'',
        'description':'',
        'unit':'',
        'quantity':'',
        'recipe_id':''
    });
    export default {
        name: "insert_ingredient.vue",
        components:{
            QueryMessage
        },
        created(){
            console.log("insert_ingredient loaded");
        },
        data(){
            return{
                form:form,
                url:''
            }
        },
        methods:{
            submit() {
                this.url='/ingredient';
                this.form
                    .post(this.url)
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
