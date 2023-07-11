<template>
    <div class="mt-15">
        <ul class="d-flex justify-space-evenly">
            <li>All</li>
            <li>Workshop</li>
            <li>Concert</li>
            <li>Sport</li>
            <li>Art</li>
            <li>Business</li>
            <li>Free</li>
        </ul>
    </div>
</template>
<style scoped>
ul{
    list-style: none;
    margin-left: 5%;
    width: 86%;
}
li{
    padding: 5px 20px 5px 20px;
    background: rgba(128, 128, 128, 0.121);
    border-radius: 2px;
}
li:hover{
    padding: 5px 20px 5px 20px;
    background-color: red;
    border-radius: 5px;
    color: white;
    cursor: pointer;
}
.category{
    margin-top: 25%;
}
</style>