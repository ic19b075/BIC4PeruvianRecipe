<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="card column is-half is-offset-one-quarter">
                <header class="card-header">
                    <h1 class="card-header-title">
                        {{ title }}
                    </h1>
                </header>
                <div class="card-content">
                    <div class="content">
                        <div class="field">
                            <label class="label">Search by name or description</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Search" v-model="q">
                            </div>
                        </div>
                        <div v-if="results.length > 0 && q ">
                            <div class="field">
                                <label class="label">Number of hits</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Search" v-model="results.length"
                                           disabled>
                                </div>
                            </div>
                            <label class="label">Results</label>
                            <div class="control" v-for="result in results">
                                <div class="field is-grouped">
                                    <p class="control is-expanded">
                                        <input class="input" :key="result.id" :value="result.name" disabled>
                                    </p>
                                    <p class="control">
                                        <a class="button is-info" @click="editIngredient(result)">
                                            Edit
                                        </a>
                                    </p>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import _ from 'lodash';
    export default {
        name: "SearchIngredientComponent",
        props: ['title'],
        data() {
            return {
                q: null,
                results: [],
                url: 'http://127.0.0.1:8000/ingredient/'
            };
        },
        watch: {
            q() {
                _.debounce(this.search(),500);
            }
        },
        methods: {
            search() {
                if (this.q.length > 0) {
                    axios.post('/search/ingredient?q=' + this.q)
                        .then(res => this.results = res.data)
                        .catch(err => console.log(err.data, err.status, err.statusText, err.headers, err.config));
                }
            },
            editIngredient(result){
                window.location.href = this.url + result.slug;
            }
        }
    }
</script>

<style scoped>
</style>
