<template>
  <div id="app">
  <div class="content">
    <section class="head">
      <h1>Vue drag Verify</h1>
      <h3>This is a vue component, which is sliding to unlock for login or sign up. This is used to protect your web app from bot attack.</h3>

    </section>

    <section class="demo-section">
    <div class="column">
      <drag-verify :width="width" :height="height" :text="text" :success-text="successText" :background="background" :progress-bar-bg="progressBarBg" :completed-bg="completedBg" :handler-bg="handlerBg" :handler-icon="handlerIcon" :text-size="textSize" :success-icon="successIcon" :circle="getShape"></drag-verify>
    </div>

      <div class="column">
           <table>
      <tr>
          <td>width</td>
          <td>
            <input type="text" v-model="width">
          </td>
</tr>
</template>
