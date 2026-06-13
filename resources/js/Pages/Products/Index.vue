<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { router } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { reactive } from 'vue'



const deleteProduct = (id) => {
  router.delete(`/products/${id}`)
}

const props = defineProps({
  products: Array,
  filters: Object
})

const form = reactive({
  name: props.filters.name || '',
  min_price: props.filters.min_price || '',
  max_price: props.filters.max_price || ''
})

const search = () => {
  router.get('/products', form, {
    preserveState: true,
    replace: true
  })
}

const reset = () => {
  router.get('/products')
}
</script>

<template>
  <DashboardLayout>

    <div>
      <div class="flex justify-between mb-4">
        <h1 class="text-xl font-bold">Produits</h1>

        <a
          href="/products/create"
          class="px-4 py-2 text-white rounded"
          style="background:#04a4ff"
        >
          Ajouter
        </a>
      </div>
      <div class="bg-white p-4 rounded shadow mb-4">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

            <input
            v-model="form.name"
            placeholder="Nom produit"
            class="border p-2 rounded"
            />

            <input
            v-model="form.min_price"
            placeholder="Prix min"
            type="number"
            class="border p-2 rounded"
            />

            <input
            v-model="form.max_price"
            placeholder="Prix max"
            type="number"
            class="border p-2 rounded"
            />

        </div>

        <div class="flex gap-2 mt-3">

            <button
            @click="search"
            class="text-white px-4 py-2 rounded"
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

      <table class="w-full bg-white shadow rounded">
        <thead>
          <tr class="border-b">
            <th class="p-2 text-left">Nom</th>
            <th class="p-2 text-left">Prix</th>
            <th class="p-2 text-left">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="p in products" :key="p.id" class="border-b">
            <td class="p-2">{{ p.name }}</td>
            <td class="p-2">{{ p.price }} Ar</td>

            <td class="p-2 flex gap-2">
              <a :href="`/products/${p.id}/edit`" class="text-blue-500">
                Edit
              </a>

              <button @click="deleteProduct(p.id)" class="text-red-500">
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </DashboardLayout>
</template>