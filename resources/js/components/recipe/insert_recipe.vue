<template>
    <div class="card">
        <div class="card-header">
            <h1 class="card-header-title is-centered"  >Hinzufügen</h1>
        </div>
        <div class="card-content">
            <form v-model="rform" @submit.prevent="submitting">
                <strong>Name:</strong>
                <input type="text" class="form-control" v-model="rform.name">
                <strong>Description:</strong>
                <textarea class="form-control" v-model="rform.description"></textarea>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
        <div class="card-footer">
            <div class="card-footer-item">
                <pre>
                    <p>{{rform.name}}</p>
                    <p>{{rform.description}}</p>
                </pre>
            </div>
            <div class="card-footer-item">
                <h1>Irgend ein Text</h1>
            </div>
        </div>
    </div>
</template>

<script>
    let rform =new Form({
        'id':'',
        'name':'',
        'description':'',
        'slug':'',
    });
    export default {
        name: "insert_recipe.vue",
        components:{
            QueryMessage
        },
        created() {
            console.log("insert_recipe.vue ist geladen");
        },
        data(){
            return{
                edit: undefined,
                rform: rform,
                url:'',
                output:''
            }
        },
        methods:{
            submitting(e){
                this.url='/recipe/';
                this.rform
                    .post(this.url)
                    .then((response) => {
                        console.log(response);
                    })
                    .catch((error)=> {
                        console.log("Errormessage:");
                        console.log(this.rform.failMessage);
                        });
            }
        }
    }
</script>

<style scoped>

</style>
