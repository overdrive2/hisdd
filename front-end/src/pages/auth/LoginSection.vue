<template>
  <q-page id="loginPage">
    <q-toolbar class="text-white bg-teal-8">
      <q-toolbar-title>Login</q-toolbar-title>
    </q-toolbar>

    <q-scroll-area class="form-style">
      <div class="text-h6 text-center q-pt-md">
        <q-img src="favicon.ico" height="60px" width="60px" />
        <div>Salary App</div>
      </div>

      <div class="q-pa-md q-gutter-md">
        <div class="text-center q-m-xs">Register and get extra features!</div>

        <q-input outlined stack-label label="Email" v-model="email">
          <template v-slot:append>
            <q-icon name="close" />
          </template>
        </q-input>
        <q-input outlined stack-label label="Password" v-model="password">
          <template v-slot:append>
            <q-icon name="close" />
          </template>
        </q-input>

        <div>
          <q-btn @click="login" color="black" size="lg" class="full-width" label="Login"></q-btn>
        </div>

        <div class="q-px-q-mt-xl text-center">
          <div class="q-mb-md no-account">Don't have an account?</div>
          <q-btn color="teal" outline rounded to="/auth/register" size="15px" >Register Here</q-btn>
        </div>
      </div>
    </q-scroll-area>
  </q-page>
</template>

<script setup>
import { ref } from 'vue'
import { useUserStore } from 'src/stores/user-store'

const userStore = useUserStore()

const email = ref('')
const password = ref('')

const login = async () => {
  // Get the tokens/cookie
  await userStore.getSanctumCookie()
  // Login user
  await userStore.login(email.value, password.value)
  // Get the user
  const user = await userStore.fetchUser()
  console.log(user)
  // Set user data in local storage (PINIA)
  userStore.setUser(user.data)
}
</script>

<style lang="scss">
#loginPage {
  .form-style {
    margin: 0 auto;
    height: calc(100vh - 180px);
    max-width: 500px;
  }
  .no-account {
    font-size: 17px;
  }
}
</style>
