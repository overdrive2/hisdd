<template>
  <q-page id="registtrationPage">
    <q-toolbar class="text-white bg-teal-8">
      <q-toolbar-title>Register</q-toolbar-title>
    </q-toolbar>

    <q-scroll-area class="form-style">
      <div class="text-h6 text-center q-pt-md">
        <q-img src="favicon.ico" height="60px" width="60px" />
        <div>Salary App</div>
      </div>

      <div class="q-pa-md q-gutter-md">
        <div class="text-center q-m-xs">Register and get extra features!</div>

        <q-input v-model="firstName" outlined stack-label label="First Name">
          <template v-slot:append>
            <q-icon name="close" />
          </template>
        </q-input>
        <q-input v-model="lastName" outlined stack-label label="Last Name">
          <template v-slot:append>
            <q-icon name="close" />
          </template>
        </q-input>
        <q-input v-model="email" outlined stack-label label="Email">
          <template v-slot:append>
            <q-icon name="close" />
          </template>
        </q-input>
        <q-input v-model="password" outlined stack-label label="Password">
          <template v-slot:append>
            <q-icon name="close" />
          </template>
        </q-input>
        <q-input v-model="confirmPassword" outlined stack-label label="Confirm Password">
          <template v-slot:append>
            <q-icon name="close" />
          </template>
        </q-input>

        <div>
          <q-btn color="black" @click="register" size="lg" class="full-width" label="Register"></q-btn>
        </div>
      </div>
    </q-scroll-area>
  </q-page>
</template>

<script setup>
import { ref } from 'vue'
import { useUserStore } from 'src/stores/user-store'

const userStore = useUserStore()

const firstName = ref('')
const lastName = ref('')
const email = ref('')
const password = ref('')
const confirmPassword = ref('')

const register = async () => {
  // get the token from the cookie
  await userStore.getSanctumCookie()
  // register user
  await userStore.register(
    firstName.value,
    lastName.value,
    email.value,
    password.value,
    confirmPassword.value
  )

  const user = await userStore.fetchUser()
  console.log(user)
  // Set user data in local storage (PINIA)
  userStore.setUser(user.data)
}
</script>

<style lang="scss">
#registtrationPage {
  .form-style {
    margin: 0 auto;
    height: calc(100vh - 180px);
    max-width: 500px;
  }
}
</style>
