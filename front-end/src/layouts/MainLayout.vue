<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated class="bg-teal">
      <q-toolbar>
        <q-toolbar-title>
          Salary App
        </q-toolbar-title>
        <q-btn flat round dense icon="login" />
      </q-toolbar>
    </q-header>
    <q-page-container>
      <router-view />
    </q-page-container>
    <q-footer id="mobile-menu" elevated class="bg-white">
      <q-tabs
        class="bg-teal text-light shadow-2"
      >
        <q-tab name="mails" icon="mail" label="Mails"></q-tab>
        <q-tab name="alarms" icon="alarm" label="Alarms"></q-tab>
        <q-tab name="/auth" icon="login" label="Auth"></q-tab>
      </q-tabs>
    </q-footer>
  </q-layout>
</template>

<script setup>
</script>
