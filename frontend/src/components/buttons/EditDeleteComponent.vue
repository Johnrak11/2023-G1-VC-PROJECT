<template>
  <div v-show="show">
    <h2>Edit/Delete {{ item.name }}</h2>
    <form>
      <label for="name">Name:</label>
      <input type="text" id="name" v-model="itemName" />
      <button @click.prevent="editItem">Save</button>
    </form>
    <button @click="deleteItem">Delete</button>
  </div>
</template>

<script>
export default {
  props: {
    show: {
      type: Boolean,
      required: true,
    },
    item: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      itemName: this.item.name,
    };
  },
  methods: {
    editItem() {
      // Perform edit logic here...
      this.$emit("edited");
    },
    deleteItem() {
      // Perform delete logic here...
      this.$emit("deleted");
    },
  },
};
</script>