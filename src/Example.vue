<template>

<div class="container">
    <div class="box">
        <div class="box-header">
            <h2>Normal Alerts</h2>
        </div>
        <div class="box-body">
            <va-alert>
                <h4 slot="header">
<i class="icon fa fa-check"></i>

<va-alert type="danger" :dismissible="true">
          <h4 slot="header">
            <i class="icon fa fa-check"></i>
          </h4>
                <div slot="body">
                    Click on icon to check out it out on github.
                    <a href="" target="_blank">
                        <i class="fa fa-github fa-2x"></i>
                    </a>
                </div>
            </va-alert>

</template>
