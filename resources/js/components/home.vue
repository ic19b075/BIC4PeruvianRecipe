<style>
    table, th, td {
        border: 1px solid black;
    }
    h1 {font-size:40px; margin-bottom: 20px; color: #193d29}
    h2 {font-size:28px; text-align:center; color: cadetblue}
</style>

<template>
    <div>
        <h1> Welcome to Peruvian Recipe Website - Gruppe 6</h1>
        <h2>
            Martin Olesch<br>
            Daniel Trivicevc<br>
            Andreas Wolfsbauer<br>
            Denis Zaborov
        </h2>
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


