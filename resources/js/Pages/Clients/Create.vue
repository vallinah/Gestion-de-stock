<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  last_name: '',
  first_name: '',
  email: '',
  number: ''
})

const submit = () => {
  form.post('/clients')
}
</script>

<template>
  <DashboardLayout>

    <div class="p-6 max-w-md">

      <h1 class="text-xl mb-4">Ajouter client</h1>

      <form @submit.prevent="submit" class="flex flex-col gap-3">

        <input v-model="form.last_name" placeholder="Nom" class="border p-2" />
        <input v-model="form.first_name" placeholder="Prénom" class="border p-2" />
        <input v-model="form.email" placeholder="Email" class="border p-2" />
        <input v-model="form.number" placeholder="Téléphone" class="border p-2" />

        <button class="text-white p-2 rounded" style="background:#04a4ff">
          Enregistrer
        </button>

      </form>
      <p v-if="$page.props.errors.email" class="text-red-500 text-sm">
  {{ $page.props.errors.email }}
</p>

    </div>

  </DashboardLayout>
</template>