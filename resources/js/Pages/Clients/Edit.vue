<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  client: Object
})

const form = useForm({
  last_name: props.client.last_name,
  first_name: props.client.first_name,
  email: props.client.email,
  number: props.client.number
})

const submit = () => {
  form.put(`/clients/${props.client.id}`)
}
</script>

<template>
  <DashboardLayout>

    <div class="p-6 max-w-md">

      <h1 class="text-xl mb-4">Modifier client</h1>

      <form @submit.prevent="submit" class="flex flex-col gap-3">

        <input v-model="form.last_name" class="border p-2" />
        <input v-model="form.first_name" class="border p-2" />
        <input v-model="form.email" class="border p-2" />
        <input v-model="form.number" class="border p-2" />

        <button class="text-white p-2 rounded" style="background:#0391dd">
          Mettre à jour
        </button>

      </form>

    </div>

  </DashboardLayout>
</template>