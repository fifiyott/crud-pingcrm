<template>
  <div>

    <Head title="CRUD Users" />
    <h1 class="mb-8 text-3xl font-bold">CRUD Users {{ title }}</h1>

    <div>
      <Link class="btn-indigo" href="/crudusers/create">
        <span>Create</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <thead>
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">Name</th>
            <th class="pb-4 pt-6 px-6">Email</th>
            <th class="pb-4 pt-6 px-6" colspan="2">Password</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in listusers" :key="user.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
            <td class="border-t">
              <Link class="flex items-center px-6 py-4 focus:text-indigo-500" >
                {{ user.name }}
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4"  tabindex="-1">
                {{ user.email }}
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4"  tabindex="-1">
                {{ user.password }}
              </Link>
            </td>
            <!-- :href="`/listusers/${user.id} dari nama variable yang dibuat di controller dari table crud_users -->
            <td class="w-px border-t" >
              <Link class="flex items-center px-4" :href="`/crudusers/${user.id}/detail`"   tabindex="-1">
                <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
                <!-- <div>View</div> -->
              </Link>
            </td>
          </tr>
          <!-- <tr v-if="organizations.data.length === 0">
            <td class="px-6 py-4 border-t" colspan="4">No organizations found.</td>
          </tr> -->
        </tbody>
      </table>
    </div>


    <div>contoh</div>
    <ul>
      <li v-for="user in listusers" :key="user.id">{{ user.name }}</li>
    </ul>
    {{ listusers }}
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'
import Layout from '@/Shared/Layout'


export default {
  components: {
    Icon,
    Link,
    Head,
  },
  // props:['title'],
  props: {
    title: String,
    listusers: Array,
  },
  layout: Layout,
}
</script>
