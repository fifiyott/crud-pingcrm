<template>
    <div>

        <Head title="CRUD Users" />
        <h1 class="mb-8 text-3xl font-bold">{{ title }}</h1>

        <div >
            <ul>
                <li>
                    <h3>{{ user.name }}</h3>
                    <p>{{ user.email }}</p>
                    <p>{{ user.created_at }}</p>
                    <Link href="/crudusers">kembali</Link>
                    <div class=" px-8 py-4 bg-gray-50 border-t border-gray-100">
                        <button class="btn-indigo" @click="deleteUser">Hapus</button>
                        <!-- <button v-if="!contact.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete Contact</button> -->
                    </div>
                    <Link :href="`/crudusers/${user.id}/edit`">Edit</Link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
// import Icon from '@/Shared/Icon'
// import Layout from '@/Shared/Layout'


export default {
    components: {

        Link,
        Head,
    },
    // props:['title'],
    props: {
        title: String,
        user: Object,
    },
    methods: {
        deleteUser(){
            if (confirm('Are you sure you want to delete this data?')) {
            this.$inertia.delete(`/crudusers/${this.user.id}`)
            }
        }
    }
    // layout: Layout,
}
</script>