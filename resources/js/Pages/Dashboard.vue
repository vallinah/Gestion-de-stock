<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'

defineProps({
  stats: Object,
  movements: Array
})
</script>

<template>
  <DashboardLayout>

    <div class="p-6">

      <!-- KPI -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

        <div class="bg-white p-4 rounded shadow">
          <h3 class="text-gray-500">Produits</h3>
          <p class="text-2xl font-bold">{{ stats.products }}</p>
        </div>

        <div class="bg-white p-4 rounded shadow">
          <h3 class="text-gray-500">Clients</h3>
          <p class="text-2xl font-bold">{{ stats.clients }}</p>
        </div>

        <div class="bg-white p-4 rounded shadow">
          <h3 class="text-gray-500">Stock total</h3>
          <p class="text-2xl font-bold">{{ stats.stock }}</p>
        </div>

      </div>

      <!-- Derniers mouvements -->
      <div class="bg-white p-4 rounded shadow">

        <h2 class="text-lg font-bold mb-4">
          Derniers mouvements de stock
        </h2>

        <table class="w-full">

          <thead>
            <tr class="border-b">
              <th class="text-left p-2">Produit</th>
              <th class="text-left p-2">Type</th>
              <th class="text-left p-2">Quantité</th>
              <th class="text-left p-2">Date</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="m in movements" :key="m.id" class="border-b">

              <td class="p-2">{{ m.product.name }}</td>

              <td class="p-2">
                <span :class="m.type.value === 1 ? 'text-green-500' : 'text-red-500'">
                  {{ m.type.type }}
                </span>
              </td>

              <td class="p-2">{{ m.quantity }}</td>

              <td class="p-2">{{ m.stock_movements_date }}</td>

            </tr>
          </tbody>

        </table>

      </div>

    </div>

  </DashboardLayout>
</template>