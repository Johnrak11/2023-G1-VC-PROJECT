<template>
    <div>
        <img class="banner" src="https://cdn.pixabay.com/photo/2016/05/27/08/51/mobile-phone-1419275_1280.jpg" alt="" width="100%">
    </div>
    <div class="search-input">
       <slot></slot>
        <div class="w-90 search mt-16">
            <input class="bg-grey-lighten-2 pa-3 w-25" type="text" placeholder="Enter more">
            <select class="p-16 w-25 pa-3 bg-grey-lighten-2">
                <option value="">Select category</option>
                <option value="workshop">Workshop</option>
                <option value="concert">Concert</option>
                <option value="arts">Arts</option>
            </select>
            <input type="text" placeholder="Add time" class="w-25 pa-3 bg-grey-lighten-2">
            <button class="pa-3 bg-red">Search</button>
        </div>
    </div>
</template>
<style scoped>
input,select{
    /* background-color: #b1b0b0; */
    border: 1px solid black;
}
button{
    width: 10%;
}
.search{
    margin-left: 10%;
}
.search-input{
    margin-top: -40%;
}
button{
    border: 1px solid red;

}
.banner{
    height: 100vh;
}
</style>