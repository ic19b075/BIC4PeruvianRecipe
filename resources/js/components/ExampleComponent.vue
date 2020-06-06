<style>
    table, th, td {
        border: 1px solid black;
    }
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
        <h1>My first VUE COMPONENT</h1>
        <h2>HEADER 2 MY COMPONENT</h2>
        <input>Beispieltext<input>
        <table>
            <thead>
            <tr>
                <th>Month</th>
                <th>Savings</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>January</td>
                <td>$100</td>
            </tr>
            <tr>
                <td>February</td>
                <td>$80</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td>Sum</td>
                <td>$180</td>
            </tr>
            </tfoot>
        </table>
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


