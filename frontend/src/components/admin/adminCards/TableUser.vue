<template>
    <!-- <NavbarDashboard /> -->
    <div class="d-flex" style="width: 100%;">
        <div class="list " style=" width: 100%; margin-top: 5%; ">
            <div class="bg-white">
                <div class="d-flex justify-space-between mt-5">
                    <div class="ml-10">
                        <h2>All users</h2>
                    </div>
                    <div class="d-flex w-50" style="margin-right: 5%;">
                        <v-text-field :loading="loading" density="compact" variant="solo" label="Search users..."
                            append-icon="mdi-magnify" single-line hide-details @keydown.enter="searchNameUsers"
                            style="width: 100%;" v-model="userSearch">
                        </v-text-field>
                    </div>
                </div>
            </div><br>

        </div>
    </div>
    <v-table fixed-header height="75vh"  style=" margin-right: 10%; margin-left: 2%; border-radius: 5px; width: 94%;" class="list-user"  v-if="users.users.length>0">
        <thead class="users">
            <tr >
                <th class="text-left bg-red" style="width: 10%;">
                    image
                </th>
                <th class="text-left bg-red" style="width: 15%;">
                    First Name
                </th>
                <th class="text-left bg-red" style="width: 15%;">
                    Last Name
                </th>
                <th class="text-left bg-red" style="width: 15%;">
                    Phone Number
                </th>
                <th class="text-left bg-red" style="width: 50%;">
                    Email
                </th>
                <th class="text-left bg-red" style="width: 20%;">
                    Role
                </th>
                <th class="text-left bg-red" style="width: 10%;">
                    actions
                </th>
            </tr>
        </thead>
        <div>
            
        </div>
        <tbody>
            <tr v-for="user of users.users" :key="user" style="border: 1px solid black;">
                <td v-if="user !== null && user.profile_picture !== null"><img :src="user.profile_picture" alt="" width="40"
                        style="border-radius: 50%;" class="mt-2"></td>
                <td v-else><img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                        alt="" width="40" style="border-radius: 50%;" class="mt-2"></td>
                <td v-if="user !== null && user.firstname !== null">{{ user.firstname }}</td>
                <td v-if="user !== null && user.lastname !== null">{{ user.lastname }}</td>
                <td v-if="user != null && user.phone_number != null">{{ user.phone_number }}</td>
                <td v-else>N/A</td>
                <td v-if="user !== null && user.email !== null">{{ user.email }}</td>
                <td v-if="user !== null && user.role !== null">{{ user.role }}</td>
                <td>
                    <div class="text-center">
                        <div class="text-center">
                            <v-icon  type="button" style="height: 3vh; width: 10%;"
                                @click="clickHandler(user.id)">
                                mdi-pencil
                            </v-icon>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </v-table>
    <div class="d-flex justify-center prevent" style="margin-top: 10%;" v-else>
        <h1 class="text-red">Don't have this user!!!!!!</h1>
    </div>
    <v-dialog style="width: 30%;" v-model="dialog">
        <v-card style="padding: 10px;">
            <h2 class="text-center">Change user role</h2>
            <v-card-text>
                <v-select v-model="newRole" :items="['admin', 'organizer', 'customer']" variant="solo"></v-select>
            </v-card-text>
            <v-card-actions @click="updateUserRole()">
                <button class="bg-red ml-5 mr-5 pa-1 rounded" style="width: 100%;">Change</button>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script setup>

import NavbarDashboard from '@/components/partials/nav/NavbarDashboard.vue';
import { userStore } from '@/stores/user.js';
import { userRoleStore } from '@/stores/editRoleUser'
import { onMounted } from 'vue';
const users = userStore();
const userInfo = userRoleStore()
console.log(userInfo);
import { ref } from "vue";
const userSearch = ref("");
const loading = ref(false)
const newRole = ref("");

const dialog = ref(false);
const userId = ref(null);

async function searchNameUsers() {
    try {
        loading.value = true;
        await users.searchUsers(userSearch.value);
    } finally {
        loading.value = false;
    }
    console.log(userSearch.value);
}
async function updateUserRole() {
    userInfo.updateRoleUser(newRole.value, userId.value);
    users.getAllUsers()
    dialog.value = false;
}

function clickHandler(id) {
    let newUser = users.users.find(user => (user.id == id))
    newRole.value = newUser.role
    userId.value = newUser.id
    dialog.value = true;
}
onMounted(() => {
    users.getAllUsers()
})
</script>
<style scoped>
thead th {
    /* padding: 5px; */
    margin: 0;
}

tbody td {
    padding: 5px;
    margin: 0;
}

.list-user::-webkit-scrollbar {
    display: none;

}
.list-user{
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    border: 1px solid rgb(217, 217, 230);
}

li {
    list-style: none;
    padding: 5px;
    cursor: pointer;
}

li:hover {
    color: red;
}
.scroll-table{
    overflow-y: scroll;
}
</style>