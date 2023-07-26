<template>
  <div>
    <v-menu>
      <template v-slot:activator="{ props }">
        <v-icon class="mt-2" v-bind="props">mdi-dots-vertical</v-icon>
      </template>
      <v-list>
        <v-list-item
          value="list"
          @click="alert.publicAlert(props.eventPreview.id)"
        >
          <v-list-item-title>Post</v-list-item-title>
        </v-list-item>
        <v-list-item value="list">
          <v-list-item-title>Edit</v-list-item-title>
        </v-list-item>
        <v-list-item
          value="list"
          @click="router.push(`/dashboard/attendees/${props.eventPreview.id}`)"
          v-if="currentpath === '/dashboard/event'"
        >
          <v-list-item-title>Attendees</v-list-item-title>
        </v-list-item>
        <v-list-item v-else value="list">
          <v-list-item-title>Delete</v-list-item-title>
        </v-list-item>
        <v-list-item value="list">
          <QrcodeDialog :eventInfor="props.eventPreview">QR CODE</QrcodeDialog>
        </v-list-item>
      </v-list>
    </v-menu>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>