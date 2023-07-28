<template>
    <div style="margin-top: 18%;margin-bottom: 5%; margin-left: 5%;">
        <ul disabled class="d-flex justify-space-between">
            <li>{{t('list.all')}}</li>
            <li>{{ t('list.workshop') }}</li>
            <li>{{ t('list.concert') }}</li>
            <li>{{ t('list.sport') }}</li>
            <li>{{ t('list.art') }}</li>
            <li>{{ t('list.business') }}</li>
            <li>{{ t('list.esport') }}</li>
        </ul>
    </div>
</template>

<script setup>
import { useI18n } from 'vue-i18n';
const { t } = useI18n();
</script>

<style scoped>
ul {
    list-style: none;
    margin-left: 5%;
    width: 86%;
}

li {
    padding: 5px 20px 5px 20px;
    background: rgba(128, 128, 128, 0.121);
    border-radius: 2px;
}

/* li:hover {
    padding: 5px 20px 5px 20px;
    background-color: red;
    border-radius: 5px;
    color: white;
    cursor: pointer;
} */
</style>