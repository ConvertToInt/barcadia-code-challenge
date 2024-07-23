<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcadia Conversion Application</title>
</head>
<body>

<div id="app" class="content" align="center">
    <h1>Hey!</h1>
    <h3>{{title}}</h3>
</div>
    
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script>
    const TestApp = {
        data(){
            return {
                title: "Hello from vjs3",
            }
        }
    }

    Vue.createApp(TestApp).mount('#app');
</script>
</body>
</html>