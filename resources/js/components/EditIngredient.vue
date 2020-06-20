<template id="edit-ingredient">
    <div>
        <h1>Ingredient details</h1>
        <label class="bold">Ingredient id:</label>
        <input :value="ingredient.id" readonly>
        <br>
        <label class="bold">Ingredient name: </label>
        <input :value="ingredient.name">
        <br>
        <label class="bold">Creation date: </label>
        <input :value="ingredient.creationDate" readonly>
        <br>
        <label class="bold">Ingredient quantity: </label>
        <input :value="ingredient.quantity">
        <br>
        <label class="bold">Recipe id:</label>
        <input :value="ingredient.recipeId">
        <br>
        <label class="bold">Date of update:</label>
        <input :value="ingredient.updateDate">
        <br>
        <label class="bold">Ingredient description: </label>
        <br>
        <textarea rows="4" cols="50" name="description">{{ingredient.description}}</textarea>
        <br>
        <button>Update Ingredient</button>
    </div>
</template>

<script>
    export default {
        name: "edit-ingredient",
        props: ['ingredient'],
    }
</script>

<style scoped>
    .bold {
        font-weight: bold;
    }
</style>
