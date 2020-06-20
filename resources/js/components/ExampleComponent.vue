<style>
    table, th, td {
        border: 1px solid black;

    }
    h1 {font-size:40px; margin-bottom: 20px; color: #193d29}
    h2 {font-size:28px; text-align:center; color: cadetblue}
</style>
<template>
<!--    <div class="container">-->
<!--        <div class="columns is-multiline">-->
<!--            <div class="card column is-half is-offset-one-quarter">-->
<!--                <header class="card-header">-->
<!--                    <h1 class="card-header-title">-->
<!--                        {{ title }}-->
<!--                    </h1>-->
<!--                </header>-->
<!--                <div class="card-content">-->
<!--                    <div class="content">-->
<!--                        <slot></slot>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <div>
        <h1> Welcome to PeruvianRecipe Task - Gruppe 6</h1>
        <h2> Martin Olesch <br>
         Daniel Trivicevc<br>
         Andreas Wolfsbauer<br>
         Denis Zaborov</h2>
    </div>
</template>

<script>
    export default {
        props: ['title'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>


