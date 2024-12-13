<?php
// Telegram Bot Token
$botToken = "7342901249:AAGuppTlEt3jZOyXWRcuXHC9_1hOSmy_AYg";
$apiURL = "https://api.telegram.org/bot$botToken/";

// Predefined message list
$messageList = [
    "তরে ছুদি", "তরে কুত্তা দিয়ে জন্ম দিসে ", "বেসসার ছেলে ", "তর বইন রে ছুদি ",
    "মাদারচুদ", "তর মারে ছুদি", " বোচাকোদা তোর মাকে দিচ্ছি চুদে আহ আহ 🚼😋",
    "তোর বাপ কত সুন্দর চুদে আমাকে 😋 ২৪ জনে দিচ্ছে  এখনো সেই মজা 💋", "আহ্ আহ্ আহ্ উফ্ উফ্ উফ্ 😋😍",
    "টাকার জন্য নিজের সুন্দর মাকেও ভাড়া দিয়ে দেস By The Way কমদামে সেই মজা 💋❤️💋😍",
    "প্রতিদিন তো ১০০ টাকায়ই চুদতাম 😍 আজকে অনেক মজা পাচ্ছি তাই দিবনে তোকে মলম কিনার টাকা ☺️",
    "কিরে খানকির পোলা ", "তোর আব্বা হই আমরা ২৪ জন 💋 এই চুম্মা টা প্রতিদিন তোর মায়ের ভোদায় দেই আহ্ সেই মজা 😋",
    "বোকাচোদা চুদ,পুদ,গুদ মারানি রেন্ডির ছেলে ", "তোর মা খানকি নাম্বার 1 😆 হাতির সাথে চোদা খাইসিল আমি কন্ডম সাপ্লাই দিসিলাম নাইলে আজকে তুই হাতি হইতি 🫢🥱",
    "তর মারে বৃষ্টির রাতে কনডোম চুরি করে তর আব্বা চুদেসিল তোর জন্ম হইসে 😆😆😆", "কিরে মুরগি চোদন খানকি চোদা মাগির ছেলে 😆😆😆",
    "কিরে তোর হেডা কই? 😆 দিতাম ধরে ভাইংগা 🖕🥱", "কিরে কন্ডম চোর, পেন্টি চোর, টেপন মাগির ছেলে 😆 চুপ কইরা রইসিশ কেন? 🖕🥱😆",
    "কিরে কই তুই? 😆😆তোর মাকে চুদতে চুদতে ভোদা দিয়ে রক্ত বের করব 🖕🥱😆", "😆 ডাইনে চুদি 🥱🖕🖕🏿",
    "😆 বামে চুদি 🥱🖕🖕🏿", "😆 উপ্রে চুদি 🥱🖕🖕🏿", "😆 নিচে চুদি 🥱🖕🖕🏿", "😆 সামনে চুদি 🥱🖕🖕🏿",
    "😆 পিছনে চুদি 🥱🖕🖕🏿", "😆 বউরে চুদি 🥱🖕🖕🏿", "😆 উঠতে চুদি 🥱🖕🖕🏿", "😆 বইতে চুদি 🥱🖕🖕🏿",
    "😆 দারাই চুদি 🥱🖕🖕🏿", "😆 বসে চুদি 🥱🖕🖕🏿", "😆 তোর বাপের কান্ধে ফালায়া তোর বইন্রে চুদি 🥱🖕🖕🏿",
    "😆 রাস্তায় চুদি 🥱🖕🖕🏿", "😆 জাইতে চুদি 🥱🖕🖕🏿", "😆 আইতে চুদি 🥱🖕🖕🏿", "😆 দিনে চুদি 🥱🖕🖕🏿",
    "😆 রাইতে চুদি 🥱🖕🖕🏿", "😆 খারাইয়া চুদি 🥱🖕🖕🏿", "😆 বইয়া চুদি 🥱🖕🖕🏿", "😆 ঘরে চুদি 🥱🖕🖕🏿",
    "😆 বাইরে চুদি 🥱🖕🖕🏿", "😆 সকালে চুদি 🥱🖕🖕🏿", "😆 বিকালে চুদি 🥱🖕🖕🏿", "😆 শীতে চুদি 🥱🖕🖕🏿",
    "😆 গরমে চুদি 🥱🖕🖕🏿", "😆 গাড়িতে চুদি 🥱🖕🖕🏿", "😆 বাড়িতে চুদি 🥱🖕🖕🏿", "😆 আকাসে চুদি 🥱🖕🖕🏿",
    "😆 বাতাসে চুদি 🥱🖕🖕🏿", "আহ্ আহ্ 🖕 উফ্ উফ্ 🥱🥵🖕🏿", "😆 জামু সুন্দর বন 🥱নিয়া আসমু হাতির ধন 😆🖕🏿"
];

// To track active sending status
$activeSending = [];

$update = json_decode(file_get_contents("php://input"), true);

// Check if the update contains a message
if (isset($update['message'])) {
    $message = $update['message'];
    $chatId = $message['chat']['id'];
    $text = $message['text'];
    $isGroup = $message['chat']['type'] === "group" || $message['chat']['type'] === "supergroup";

    // Check if the bot is started (only send message in private chat)
    if (isset($message['text']) && $text == "/start") {
        // Create inline buttons for Channel and Group
        $keyboard = [
            'inline_keyboard' => [
                [
                    ['text' => 'Channel', 'url' => 'https://t.me/Mr_hacker98_Bd'],
                    ['text' => 'Group', 'url' => 'https://t.me/Xyz_mathod_king']
                ],
                [
                    ['text' => 'Joined', 'callback_data' => 'joined']
                ]
            ]
        ];

        // Send welcome message with inline buttons
        sendMessage($chatId, "Welcome! Click below to join:", $keyboard);

        // Send usage instructions after the first message
        sendMessage($chatId, "Usage: /send <name> this type");

        exit;
    }

    // Handle the 'Joined' button press
    if (isset($update['callback_query'])) {
        $callbackData = $update['callback_query']['data'];
        $callbackChatId = $update['callback_query']['message']['chat']['id'];
        if ($callbackData == 'joined') {
            sendMessage($callbackChatId, "Usage: /send <name> this type");
            exit;
        }
    }

    // Handle the /stop command with a 2-second stop delay
    if ($isGroup && $text == "/stop") {
        // Stop the active sending for this group
        if (isset($activeSending[$chatId])) {
            unset($activeSending[$chatId]);
            sendMessage($chatId, "Message sending has been stopped.");
        } else {
            sendMessage($chatId, "No active message sending process was found.");
        }
        exit;
    }

    // Process the /send command in group chats
    if ($isGroup && strpos($text, "/send") === 0) {
        $parts = explode(" ", $text, 2);
        if (count($parts) == 2) {
            $name = $parts[1]; // Extract the name after /send

            // Start sending messages if not already active
            if (!isset($activeSending[$chatId])) {
                $activeSending[$chatId] = true; // Mark as active
                foreach ($messageList as $index => $msg) {
                    $formattedMessage = "$name $msg";
                    sendMessage($chatId, $formattedMessage);
                    // Add a small delay between each message
                    usleep(500000); // 0.5 second
                }
            } else {
                sendMessage($chatId, "Message sending is already active. To stop, use /stop.");
            }
        } else {
            sendMessage($chatId, "Please use the correct format: /send <name>");
        }
    }
}

// Function to send messages
function sendMessage($chatId, $text, $keyboard = null) {
    global $apiURL;
    $url = $apiURL . "sendMessage";
    $data = [
        'chat_id' => $chatId,
        'text' => $text
    ];

    if ($keyboard) {
        $data['reply_markup'] = json_encode($keyboard);
    }

    file_get_contents($url . "?" . http_build_query($data));
}
?>