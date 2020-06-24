<template>
    <div class="card">
        <div class="card-header">
            <h1 class="card-header-title is-centered"  >Hinzufügen</h1>
        </div>
        <div class="card-content">
            <form v-model="form" @submit.prevent="submit">
                <strong>Name:</strong>
                <br>
                <input type="text" style="font-size:20px" class="form-control" v-model="form.name"/>
                <br>
                <strong>Description:</strong>
                <br>
                <textarea class="form-control" style="height:70px;width:450px; font-size:18px" cols="90" v-model="form.description"/>
                <br>
                <strong >Menge:</strong>
                <br>
                <input type="number" style="font-size:18px" class="form-control" v-model="form.quantity"/>
                <br>
                <strong>Einheit:</strong>
                <br>
                <select class="form-control"  style="font-size:18px" v-model="form.unit">
                    <option value="grams">grams</option>
                    <option value="milliliters">milliliters</option>
                    <option value="pieces">pieces</option>
                </select>
                <br>
                <strong>Für Rezept:</strong>
                <br>
                <input type="number" style="font-size:20px" class="form-control" v-model="form.recipe_id"/>
                <hr>
                <button class="block">Submit</button>
            </form>
        </div>
        <div class="card-footer">
            <div class="card-footer-item" style="background-color: #b3d7b3">
            <pre>
                <p style="font-size:30px; color:#a1b164; font-weight: bold; text-align:center;"> P R E V I E W </p>
                <p style="font-size:18px; text-align:center; font-weight: bold">{{form.name}}</p>
                <p style="font-size:16px">{{form.description}}</p>
                <p style="font-weight:bold"> Menge: {{form.quantity}}</p>
                <p style="font-weight:bold"> Einheit: {{form.unit}}</p>
                <p style="font-weight:bold"> Für Rezept: {{form.recipe_id}}</p>
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
</style>
