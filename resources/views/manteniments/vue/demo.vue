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
        <tr>
          <td>height</td>
          <td>
            <input type="text" v-model="height">
          </td>
        </tr>
        <tr>
          <td>text</td>
          <td>
           <input type="text" v-model="text">
          </td>
        </tr>
         <tr>
          <td>successText</td>
          <td>
           <input type="text" v-model="successText">
          </td>
        </tr>
        <tr>
          <td>background</td>
          <td>
           <input type="color" v-model="background">
          </td>
        </tr>
<tr>
<tr>
          <td>progressBarBg</td>
          <td>
           <input type="color" v-model="progressBarBg">
          </td>
        </tr>
        <tr>
          <td>completedBg</td>
          <td>
           <input type="color" v-model="completedBg">
          </td>
        </tr>
        <tr>
          <td>handlerBg</td>
          <td>
           <input type="color" v-model="handlerBg">
          </td>
        </tr>
         <tr>
          <td>textSize</td>
          <td>
            <input type="text" v-model="textSize">
          </td>
        </tr>
         <tr>
          <td>isCircle</td>
          <td>
            <select v-model="isCircle">
              <option>true</option>
              <option>false</option>
            </select>
          </td>
        </tr>

      </table>
      </div>
    </section>

  </div>


  </div>
</template>
