<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  price: ''
})

const submit = () => {
  form.post('/products')
}
</script>

<template>
  <DashboardLayout>

    <div class="max-w-md">
      <h1 class="text-xl mb-4">Ajouter produit</h1>

      <form @submit.prevent="submit" class="flex flex-col gap-3">

        <input v-model="form.name" class="border p-2 rounded" placeholder="Nom" />

        <input v-model="form.price" class="border p-2 rounded" placeholder="Prix" />

        <button
          class="text-white p-2 rounded"
          style="background:#04a4ff"
        >
          Sauvegarder
        </button>

      </form>
    </div>

  </DashboardLayout>
</template>