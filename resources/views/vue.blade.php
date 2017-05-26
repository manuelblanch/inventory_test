<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Intro a VueJS</title>
</head>
<body>
  <div id="app">
  <h1>@{{ greeting }}</h1>
  <input type="text" v-model="greeting">
</div>
  <script src="https://unpkg.com/vue"></script>
  <script>
  new Vue({
elç: '#app',
data: {
  greeting: 'Hola Vue!'
}
})
  </script>
</body>
</html>
