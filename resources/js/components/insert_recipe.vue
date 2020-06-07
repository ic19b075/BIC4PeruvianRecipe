<template>
    <div class="container">
        <div class="columns is-multiline">
            <header class="card-header">
                <h1 class="card-header-title is-centered">Neues Rezept</h1>
            </header>
            <div class="card-content">
                <div class="content">
                    <!--<query-message :success="form.isSuccess()" :fail="form.isFail()"
                                   :message="form.failMessage || form.successMessage"></query-message>-->
                    <form @submit.prevent="submit">
                        <div class="field">
                            <label class="label" for="rname">Name:</label>
                            <div class="control">
                                <input id="rname"
                                        v-model="form.rname"
                                        class="input"
                                        v-bind:class="{'is-danger':form.errors.has('rname')}"
                                        type="text" autofocus>
                            </div>
                            <p class="help is-danger" v-if="form.errors.has('rname')"
                               v-text="form.errors.get('rname')"/>
                        </div>
                        <div class="field">
                            <label class="label" for="rdesc">Beschreibung:</label>
                            <div class="control">
                                <textarea id="rdesc" v-model="form.rdesc" class="textarea"></textarea>
                            </div>
                            <p class="help is-danger" v-if="form.errors.has('rname')"
                               v-text="form.errors.get('rname')"/>

                        </div>
                        <input type="submit" class="button is-large is-primary is-outlined is-fullwidth" v-text="edit ? 'Save' : 'Post'" :disabled="loading"/>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <footer>
                    Ende
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
    let form =new Form({
        'rname':'',
        'rdesc':'',
        'rslug':'',
        'rid':''
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
                form:form,
                url:''
            }
        },
        methods:{
            submit(){
                if(this.edit)
                    this.form.put(this.url);
                else
                    ;
            }
        }
    }
</script>

<style scoped>

</style>
