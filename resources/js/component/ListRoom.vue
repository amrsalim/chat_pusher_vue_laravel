<template>
  <div class="container">
    <div class="card">
      <div class="card-header">List Row</div>
      <div class="card-body">
        <ul class="list-unstyled">
          <li v-for="room in rooms" :key="room.id">
            <a  :href="`/room/${room.id}`">{{ room.user.name }} - {{ room.receive.name }}</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup>

import { ref, onMounted } from 'vue';
// import { echo } from '../app.js';

const rooms = ref([]);

onMounted(async () => {

  const response = await fetch('/api/rooms');
  rooms.value = await response.json();



  // const  channel = this.$echo.subscribe('chat');
  // channel.bind('my-event', function(data) {
  //   console.log(JSON.stringify(data));
  // });
  const channel = await Echo.channel('chat').listen('send-message', (data) => {
    console.log(data);
  });

});


</script>