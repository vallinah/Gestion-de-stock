<script setup>
import { useForm } from '@inertiajs/vue3'
import DashboardLayout from '@/Layouts/DashboardLayout.vue'

defineProps({
  products: Array,
  types: Array
})

const form = useForm({
  product_id: '',
  stock_movement_type_id: '',
  quantity: '',
  stock_movements_date: ''
})

const submit = () => {
  form.post('/stock-movements')
}
</script>

<template>
  <DashboardLayout>

    <div class="p-6 max-w-md">

      <h1 class="text-xl mb-4">Nouveau mouvement</h1>

      <form @submit.prevent="submit" class="flex flex-col gap-3">

        <select v-model="form.product_id" class="border p-2">
          <option value="">Produit</option>
          <option v-for="p in products" :key="p.id" :value="p.id">
            {{ p.name }}
          </option>
        </select>

        <select v-model="form.stock_movement_type_id" class="border p-2">
          <option value="">Type</option>
          <option v-for="t in types" :key="t.id" :value="t.id">
            {{ t.type }}
          </option>
        </select>

        <input v-model="form.quantity" type="number" class="border p-2" placeholder="Quantité" />

        <input v-model="form.stock_movements_date" type="date" class="border p-2" />

        <button class="text-white p-2 rounded" style="background:#04a4ff">
          Enregistrer
        </button>
        <p v-if="$page.props.errors.quantity" class="text-red-500">
        {{ $page.props.errors.quantity }}
        </p>

      </form>


    </div>

  </DashboardLayout>
</template>