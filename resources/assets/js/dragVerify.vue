<template>
	<div class="drag_verify" :style="dragVerifyStyle" @mousemove="dragMoving" @mouseup="dragFinish" @touchmove="dragMoving" @touchend="dragFinish">

			<div class="dv_progress_bar" ref="progressBar" :style="progressBarStyle">

			</div>
			<div class="dv_text" :style="textStyle" ref="message">{{message}}</div>

			<div class="dv_handler dv_handler_bg" @mousedown="dragStart"  ref="handler" :style="handlerStyle" @touchstart="dragStart">
				<i :class="handlerIcon"></i>
			</div>

		</div>
</template>

<script>
	export default{
		name:'dragVerify',
	props:{
		width:{
			type:Number,
			default:200
		},
		height:{
			type:Number,
			default:60
		},
		text:{
			type:String,
			default:'swiping to the right side'
		},
		successText:{
			type:String,
			default:'success'
		},
    </script>
