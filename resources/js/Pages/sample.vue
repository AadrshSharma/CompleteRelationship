<template>
    <div class="family-poppins" style="background-color: #EAEDED">
        <div class="h-screen w-full flex items-center justify-center">
            <div style="width: 400px">
                <div class="bg-white py-8 rounded-md p-8 border border-gray-300 w-full">
                    <div class="w-full pb-2">
                        <img class="mx-auto" height="900" width="250" src="https://kitaabshoppe.s3.amazonaws.com/project-assets/images/logo/ks-logo.png" alt="">
                    </div>
                    <div>
                        <h4 class="text-gray-900 font-medium text-2xl my-4">Sign-In</h4>
                        <div>
                            <label for="" class="text-sm font-normal text-gray-800">Email</label>
                            <input maxlength="35" v-model="form.email" type="text" class="w-full px-5 py-2.5 text-sm font-normal text-gray-900 mt-1 rounded-md border border-gray-300">
                        </div>
                        <div class="py-3">
                            <label for="" class="text-sm font-normal text-gray-800">Password</label>
                            <input maxlength="20" v-model="form.password" type="password" class="w-full px-5 py-2.5 text-sm font-normal text-gray-900 mt-1 rounded-md border border-gray-300">
                        </div>
                        <button @click="submit" class="bg-gray-800 text-white w-full px-4 py-2.5 rounded-md text-sm font-medium text-center mt-1.5 hover:bg-gray-900">Sign in</button>
<!--                        <p class="text-xs font-normal mt-3.5">-->
<!--                            By continuing, you agree to KitaabShoppe's <span class="text-blue-500 cursor-pointer"> Conditions of Use</span> and <span class="text-blue-500 cursor-pointer">Privacy Notice</span>.-->
<!--                        </p>-->
                    </div>
                </div>
                <!--                <div class="w-full">-->
                <!--                    <div class="flex items-center justify-center my-6">-->
                <!--                        <div class="border-b border-gray-300 w-full"></div>-->
                <!--                        <p class="text-xs font-light whitespace-nowrap mx-2.5">New to KitaabShoppe?</p>-->
                <!--                        <div class="border-b border-gray-300 w-full"></div>-->
                <!--                    </div>-->
                <!--                    <a href="/register">-->
                <!--                        <button class="w-full px-5 py-2.5 text-sm font-normal bg-gray-50 hover:bg-gray-100 border border-gray-300 text-gray-900 text-center rounded-md">Create your KitaabShoppe account</button>-->
                <!--                    </a>-->
                <!--                </div>-->
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    })
</script>
