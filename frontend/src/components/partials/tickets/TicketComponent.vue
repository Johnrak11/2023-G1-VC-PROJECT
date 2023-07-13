<template>
    <v-hover v-slot="{ isHovering, props }" v-for="n in 7" :key="n" class="ticket-card" style="width: 100%;">

        <div 
        v-bind="props"
        :class="`elevation-${isHovering ? 24 : 6}`"
        class="pa-3 mt-5 d-flex rounded-lg"
        style="border-left: 5px solid red; height: 18vh; cursor: pointer;"
        >
            <div class="d-flex w-75">
                <div>
                    <img class="rounded-xl" src="https://wheninphnompenh.com/wp-content/uploads/2023/05/DSC_0078-1024x1024.jpg" width="100" alt="">
                </div>
                <div class=" ml-9">
                    <h3>Vannda Concert</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt earum eveniet quo voluptatibus.</p>
                    <p>2023/07/20</p>
                </div>
            </div>
            <div class="d-flex w-25 justify-space-between mt-10" style="margin-left: 20%;">
                <p>Koh Pich</p>
                <p>100$</p>
            </div>
        </div>
    </v-hover>
</template>