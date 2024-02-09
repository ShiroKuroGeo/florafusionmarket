<?php
session_start();
$loggedUserId = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Shop Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body id="chat"
    class="flex flex-col items-center justify-center w-screen min-h-screen bg-green-500 text-gray-800 p-10 overflow-x-hidden">
    <a href="../customer/index.php" class="absolute top-4 left-4 text-white hover:text-gray-600">
        <i class="fas fa-arrow-left text-lg"></i> Back to Home
    </a>
    <div class="container mx-auto shadow-lg rounded-lg bg-white border-2">
        <div class="px-5 py-5 flex justify-between items-center">
            <div class="font-semibold text-2xl">FloraFusion Market</div>
        </div>
        <div class="flex flex-row justify-between overflow-y-auto" style="height: 700px;">

            <!-- Inbox -->
            <div class="flex flex-col w-2/5 border-r-2 overflow-y-auto">
                <div class="border-b-2 py-4 px-2">
                    <input type="text" v-model="search" placeholder="Search Chat"
                        class="py-2 px-2 border-2 border-gray-200 rounded-2xl w-full" />
                </div>
                <!-- Contacts -->
                <div @click="getInboxById(inbox.id, inbox.sender_id, inbox.receiver_id)" v-for="inbox in searchData"
                    class="cursor-pointer flex flex-row py-4 px-2 justify-center items-center border-b-2">
                    <div class="w-1/4">
                        <img :src="'../assets/img/' + inbox.other_user_image"
                            class="object-cover h-12 w-12 rounded-full" alt="" />
                    </div>
                    <div class="w-full">
                        <div class="text-lg font-semibold">{{ inbox.other_user_name }}</div>
                    </div>
                </div>
            </div>

            <!-- Convertsation -->
            <div class="w-full px-5 flex flex-col justify-between">
                <div class="flex flex-col mt-5">
                    <div v-for="convo in conversationData"
                        :class="{ 'justify-start': convo.sender_id !== <?= $loggedUserId ?>, 'justify-end': convo.sender_id === <?= $loggedUserId ?> }"
                        class="flex mb-4">
                        <img :src="'../assets/img/' + convo.sender_image" class="object-cover h-8 w-8 rounded-full"
                            alt="" />
                        <div class="ml-2 py-3 px-4 bg-gray-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white ml-3">
                            {{ convo.message }}
                        </div>
                    </div>
                </div>
                <!-- If Not selected Chat -->
                <div v-show="conversationData.length <= 0" class="flex flex-col justify-center items-center ">
                    <p class="font-bold text-4xl text-gray-500">Select Chat!</p>
                </div>
                <!-- Send Chat -->
                <div v-show="conversationData.length > 0" class="py-5 flex items-center">
                    <input v-model="messageInput" class="w-full bg-gray-300 py-3 px-3 rounded-xl" type="text"
                        placeholder="Type your message here..." />
                    <button @click="sendChat(<?php echo json_encode($_SESSION['id']); ?>)"
                        class="text-blue-600 rounded p-2 py-3 px-5 rounded-xl">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
                <div :class="conversationData.length > 0 ? 'hidden' : 'opacity-0'">
                    <p>Temp</p>
                </div>

            </div>
        </div>
    </div>
    </div>

    <script src="../assets/services/vue.3.js"></script>
    <script src="../assets/services/axios.js"></script>
    <script src="../assets/services/chat.js"></script>
</body>

</html>