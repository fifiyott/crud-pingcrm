<template>
    <div>

        <Head title="CRUD Users" />
        <h1 class="mb-8 text-3xl font-bold">
            <Link href="/crudusers">{{ title }}</Link>
        </h1>

        <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
            <form @submit.prevent="update">
                <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                    <div class="pb-8 pr-6 w-full lg:w-1/2">

                        <text-input v-model="formData.name"  label="Name" />
                        <!-- <p v-if="errors.name" class="text-orange-700">{{ errors.name }}</p> -->
                    </div>
                    <div class="pb-8 pr-6 w-full lg:w-1/2">

                        <text-input v-model="formData.email"  label="Email" />
                        <!-- <p v-if="errors.email" class="text-orange-700">{{ errors.email }}</p> -->
                    </div>
                    <div class="pb-8 pr-6 w-full lg:w-1/2">

                        <text-input v-model="formData.password"  label="Password" />
                        <!-- <p v-if="errors.password" class="text-orange-700">{{ errors.password }}</p> -->
                    </div>

                    <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
                        <button class="btn-indigo" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import TextInput from '@/Shared/TextInput'
// import Icon from '@/Shared/Icon'
// import Layout from '@/Shared/Layout'


export default {
    components: {

        Link,
        Head,
        TextInput,

    },
    // props: ['title'],
    props: {
        title: String,
        user: Object,
        errors: Object,
    },
    // layout: Layout,
    data() {
        return {
            formData: {
                name: this.user.name,
                email: this.user.email,
                password: this.user.password
            }
        }
    },
    methods: {
        update() {
            console.log(this.formData)
            // this.$inertia.put('/crudusers'+this.user.id, this.formData)
            this.$inertia.put(`/crudusers/${this.user.id}/detail`, this.formData)
        }
    }
}
</script>