<template>
    <!--<div>
        <input type="text" v-model="rform" @change="submitting()"/>
        <input type="textarea" v-model="rform2" @change="submitting()"/>
        <ul v-if="errors && errors.length">
            <li v-for="error of errors">
                 {{error.message}}
            </li>
        </ul>
    </div>-->
    <div>
        <form v-model="rform" @submit.prevent="submitting">
            <strong>Name:</strong>
            <input type="text" class="form-control" v-model="rform.name">
            <strong>Description:</strong>
            <textarea class="form-control" v-model="rform.description"></textarea>
            <button class="btn btn-success">Submit</button>
        </form>
        <ul v-if="rform.failMessage && rform.failMessage.length">
            <li >
                <h2>Error:</h2>{{rform.failMessage}}
            </li>
        </ul>
        <pre>
            {{output}}
            <p>{{rform.rname}}</p>
            <p>{{rform.rdesc}}</p>
        </pre>
    </div>



    <!--<form name="rform" onsubmit="return formValidation()" method="post">
        <label for="rname">Name:</label><br>
        <input type="text" id="rname" name="rname"><br>
        <label for="rdesc">Beschreibung:</label><br>
        <input type="text" id="rdesc" name="rdesc">
        <input type="submit" value="Submit">
    </form>-->
</template>

<script>
    let rform =new Form({
        'id':'',
        'name':'',
        'description':'',
        'slug':''

    });
    export default {
        name: "insert_recipe.vue",
        components:{
            QueryMessage
        },
        created() {
            console.log("insert_recipe.vue ist geladen");
        },
        //data(){
        //    return{
        //        edit: undefined,
        //        form:rform,
        //        url:'../recipie'
        //    }
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
                //e.preventDefault();
                //let currentObj =this;
                this.url='/recipe/';
                console.log("name");
                console.log(rform.name);
                console.log("desc");
                console.log(rform.description);
                console.log(rform);

                this.rform
                    .post(this.url)
                    .then((response) => {
                        this.url = '/recipe/' + response.slug;
                        this.rform.id = response.id;
                        this.rform.name = response.name;
                        this.rform.description = response.description;
                        //this.form.category_id = response.category_id;
                        this.form.noReset = ['id', 'title', 'body'];
                        this.edit = true;
                        //window.history.pushState("", "", this.url);
                    })
                    .catch((error)=> {
                        console.log("Errormessage:");
                        console.log(error);
                        });

                /*this.$axios.post(this.url,{
                    name: rform.rname,
                    description: rform.rdesc
                })
                    .then(response =>(
                        console.log(response)
                    ))
                    .catch(error => (
                        console.log(error)
                ));*/

                //if(this.edit) {
                //    this.rform.post(this.url);
                //}
                //    else
                //    ;
            //},
            //formValidation(){
            //    var x = document.forms ["rform"] ["rname"].value;
            //    var y = document.forms ["rform"] ["rdesc"].value;

            //    if(x==""){
            //        alert("Name des Rezepts muss ausgefüllt sein");
            //        return false;
            //    }else{}
            //    if(y==""){
            //        alert("Beschreibung des Rezepts muss ausgefüllt sein");
            //        return false;
            //    }else{this.submitting()};
            }
        }
    }
</script>

<style scoped>

</style>
