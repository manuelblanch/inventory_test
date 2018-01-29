<template>

  <div class="progress" :class="[progressSize, isVertical?'vertical':'', isActive?'active':'']">
    <div class="progress-bar"
         :class="[`progress-bar-${type}`, (isStriped?'progress-bar-striped':'')]"
         role="progressbar"
         :aria-valuenow="value"
         :aria-valuemin="min"
         :aria-valuemax="max"
         :style="`${isVertical?'height':'width'}: ${value}%`">
      <span class="sr-only">{{text}}</span>
    </div>
  </div>

</template>
