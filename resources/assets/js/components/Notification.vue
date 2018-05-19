<template>
  <div class="notification-wrapper">
        <div class="notification alert alert-primary">
            Some random notification
        </div>
    </div>
</template>

<style>

.notification-wrapper {
    position: fixed;
    left: 50%;
    top: 2rem;
    z-index: 10000;
}

.notification {
    position: relative;
    left: -50%;
}

</style>

<script>
export default {
    props: ['type', 'message'],
    data()
    return {
        show: false,
        notification: this.message,
        alertClass: this.type,
        hideTimeout: false
    }
}
</script>
