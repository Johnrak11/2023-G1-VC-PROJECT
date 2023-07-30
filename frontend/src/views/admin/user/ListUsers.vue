<template>
    <div>
        <UserComponent />
    </div>
</template>
<script setup>
import UserComponent from '../../../components/admin/UserComponent.vue'
import { userStore } from '@/stores/user';
import { onMounted } from "vue";
const users = userStore();

onMounted(() => {
    users.getAllUsers();
})
</script>