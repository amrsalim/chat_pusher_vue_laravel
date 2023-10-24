

<template>
  <div class="container">
    <div class="card">
      <div class="card-header">chat</div>
      <div class="card-body">
        <div class="chat-messages">
          <div class="message" v-for="message in messages[0]" :key="message.id">
            <strong>{{ props.user.id === message.sender_id ? "me" : message.sender?.name }}</strong>: {{ message?.content }}
          </div>
        </div>
        <div class="input-group mt-3">
          <input type="text" class="form-control" v-model="newMessage" placeholder="Type a message...">
          <button class="btn btn-primary" @click="sendMessage">Send</button>

        </div>
      </div>
    </div>
  </div>

</template>
<script setup>
import { ref, onMounted  ,defineProps } from 'vue';

const messages = ref([]);
const newMessage = ref('');
const props = defineProps(['user', 'id']);

async function sendMessage() {
  if (newMessage.value.trim() === '') {
    return;
  }

  const response = await fetch(`/api/chat/${props.id}`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      message: newMessage.value,
      sender_id: props.user.id
    })
  });

  if (response.ok) {
    const data = await response.json();
    // console.log(data);
    // messages.value.length = 0;
    // messages.value.push(data);
    // Example echo setup

    newMessage.value = '';

  } else {
    console.error('Failed to send message');
  }

}

async  function getMassage() {

  const response = await fetch(`/api/chats/${props.id}`);
  const data = await response.json();
  // console.log(data);
  messages.value.length = 0;
  messages.value.push(data);
  // console.log(messages);

}

onMounted(async () => {
  await getMassage();
  Echo.channel('chat').listen('.send-message', async (data) => {
    // console.log(data);
    // console.log(props.id);

    await getMassage();
  });


});

</script>

