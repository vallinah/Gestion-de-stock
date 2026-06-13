<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  product: Object,
  history: Array
})

const form = useForm({
  name: props.product.name,
  price: props.product.price
})

const submit = () => {
  form.put(`/products/${props.product.id}`)
}
</script>

<template>
  <DashboardLayout>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

      <!-- PRODUIT -->
      <div class="bg-white p-4 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Modifier produit</h1>

        <form @submit.prevent="submit" class="flex flex-col gap-3">

          <input
            v-model="form.name"
            class="border p-2 rounded"
            placeholder="Nom"
          />

          <input
            v-model="form.price"
            class="border p-2 rounded"
            placeholder="Prix"
          />

          <button
            class="text-white p-2 rounded"
            style="background:#04a4ff"
          >
            Mettre à jour
          </button>

        </form>
      </div>

      <!-- HISTORIQUE PRIX -->
      <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-bold mb-4">
          Historique des prix
        </h2>

        <div v-if="history.length === 0" class="text-gray-500">
          Aucun historique
        </div>

        <ul class="space-y-2">
          <li
            v-for="h in history"
            :key="h.id"
            class="flex justify-between border-b py-2"
          >
            <span class="font-medium">
              {{ h.price }} Ar
            </span>

            <span class="text-gray-500 text-sm">
              {{ new Date(h.created_at).toLocaleString() }}
            </span>
          </li>
        </ul>
      </div>

    </div>

  </DashboardLayout>
</template>