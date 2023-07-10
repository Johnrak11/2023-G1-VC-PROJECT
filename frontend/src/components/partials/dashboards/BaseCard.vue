<template>
  <div class="card rounded white--text">
    <p>{{ title }}</p>
      <slot></slot>
  </div>
</template>
  
  <script>
export default {
  props: ["title"],
};
</script>
  
  <style scoped>

.card{
    background-color: red;
    width: 23%;

}

</style>