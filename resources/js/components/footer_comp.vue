<template>
    <footer>
        <div class="text1">
        <a href="http://127.0.0.1:8000/home">Home</a>
        <a href="http://127.0.0.1:8000/ingredient">Ingredients</a>
        <a href="http://127.0.0.1:8000/recipe">Recipes</a>
        </div>
        <div>
            <p style="text-align: center">{{ new Date().getFullYear() }} — <strong>Peruvian Recipe</strong></p>
        </div>
    </footer>
</template>

<script>
</script>

<style>
    a {
        color: #121212;
    }
    .text1 {
        color: #121212;
        text-align: center;
        font-weight: bolder;
    }
    footer {
        padding: 10px;
        bottom: 0;
        left: 0;
        right: 0;
        background: #00b89c;
        border-color: #8a9da8;
    }
</style>
