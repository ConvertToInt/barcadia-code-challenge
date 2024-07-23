<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcadia | Roman Numeral Converter</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="assets/app.css" rel="stylesheet">
</head>
<body>
    <div class="flex justify-center mt-14 mb-14">
        <img src="assets/img/bml-pink.svg" alt="" width="200" height="200">
    </div>

    <div class="flex items-center justify-center">    
        <div id="barcadia-app" class="app-container w-full max-w-md p-8 shadow-md rounded">

            <h1 class="text-2xl font-bold mb-6 text-center">Roman Numerals Converter</h1>
            <input v-model="inputValue" class="w-full p-2 border rounded mb-4" placeholder="Enter a number or numeral">
            <button @click="convertValue" class="w-full text-white p-2 rounded convert-btn">Convert</button>

            <div v-if="convertedValue" class="mt-4 p-4 bg-green-100 text-green-700 rounded">
                {{ convertedValue }}
            </div>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="assets/app.js"></script>
</body>
</html>