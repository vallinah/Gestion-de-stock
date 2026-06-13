<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { router } from '@inertiajs/vue3'
import { reactive } from 'vue'

const deleteClient = (id) => {
  router.delete(`/clients/${id}`)
}

const props = defineProps({
  clients: Array,
  filters: Object
})

const form = reactive({
  name: props.filters.name || '',
  email: props.filters.email || '',
  number: props.filters.number || ''
})

const search = () => {
  router.get('/clients', form, {
    preserveState: true,
    replace: true
  })
}

const reset = () => {
  router.get('/clients')
}
</script>

<template>
  <DashboardLayout>

    <div class="p-6">

      <!-- HEADER (UNIFORME) -->
      <div class="flex justify-between items-center mb-4">

        <h1 class="text-xl font-bold">
          Clients
        </h1>

        <a
          href="/clients/create"
          class="px-4 py-2 text-white rounded"
          style="background:#04a4ff"
        >
          Ajouter client
        </a>

      </div>

      <!-- SEARCH CARD -->
      <div class="bg-white p-4 rounded shadow mb-4">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

          <input
            v-model="form.name"
            placeholder="Nom ou prénom"
            class="border p-2 rounded"
          />

          <input
            v-model="form.email"
            placeholder="Email"
            class="border p-2 rounded"
          />

          <input
            v-model="form.number"
            placeholder="Téléphone"
            class="border p-2 rounded"
          />

        </div>

        <div class="flex gap-2 mt-3">

          <button
            @click="search"
            class="px-4 py-2 text-white rounded"
            style="background:#04a4ff"
          >
            Rechercher
          </button>

          <button
            @click="reset"
            class="px-4 py-2 rounded border"
          >
            Reset
          </button>

        </div>

      </div>

      <!-- TABLE CARD (UNIFORME AVEC PRODUCTS) -->
      <div class="bg-white p-4 rounded shadow">

        <table class="w-full">

          <thead>
            <tr class="border-b text-left">
              <th class="p-2">Nom</th>
              <th class="p-2">Prénom</th>
              <th class="p-2">Email</th>
              <th class="p-2">Téléphone</th>
              <th class="p-2">Actions</th>
            </tr>
          </thead>

          <tbody>
            <tr
              v-for="c in clients"
              :key="c.id"
              class="border-b"
            >

              <td class="p-2">{{ c.last_name }}</td>
              <td class="p-2">{{ c.first_name }}</td>
              <td class="p-2">{{ c.email }}</td>
              <td class="p-2">{{ c.number }}</td>

              <td class="p-2 flex gap-2">

                <a
                  :href="`/clients/${c.id}/edit`"
                  class="text-blue-500 hover:underline"
                >
                  Edit
                </a>

                <button
                  @click="deleteClient(c.id)"
                  class="text-red-500 hover:underline"
                >
                  Delete
                </button>

              </td>

            </tr>
          </tbody>

        </table>

      </div>

    </div>

  </DashboardLayout>
</template>