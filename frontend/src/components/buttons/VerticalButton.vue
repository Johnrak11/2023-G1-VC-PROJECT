<template>
  <div class="container">
    <v-btn icon class="menu-button" @click="showDropdown()">
      <v-icon>mdi-dots-vertical</v-icon>
    </v-btn>
    <v-menu ref="menu" :close-on-content-click="false">
      <v-list>
        <v-list-item @click="menuItemClicked('edit')">Edit</v-list-item>
        <v-list-item @click="menuItemClicked('delete')">Delete</v-list-item>
      </v-list>
    </v-menu>
    <div v-if="showEdit">Edit</div>
    <div v-if="showDelete">Delete</div>
  </div>
</template>
  
  <script setup>
import { ref } from "vue";

const showEdit = ref(false);
const showDelete = ref(false);

const showDropdown = () => {
  // Toggles the visibility of the dropdown menu
  if (this.$refs && this.$refs.menu) {
    this.$refs.menu.isActive = !this.$refs.menu.isActive;
  }
};

function menuItemClicked(action) {
  // If the "Edit" action was selected
  if (action === "edit") {
    // Set the value of the showEdit ref to true
    showEdit.value = true;
  }
  // If the "Delete" action was selected
  else if (action === "delete") {
    // Set the value of the showDelete ref to true
    showDelete.value = true;
  }
}
</script>
  
  <style scoped>
.container {
  margin-top: 20px;
}
.v-list-item {
  cursor: pointer;
}
.v-list-item:hover {
  background-color: #f5f5f5;
}
.show {
  display: block;
}
</style>