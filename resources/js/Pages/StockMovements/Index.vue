<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'

defineProps({
  movements: Array
})
</script>

<template>
  <DashboardLayout>

    <div class="p-6">

      <!-- HEADER (comme products & clients) -->
      <div class="flex justify-between items-center mb-4">

        <h1 class="text-xl font-bold">
          Mouvement de stock
        </h1>

        <a
          href="/stock-movements/create"
          class="px-4 py-2 text-white rounded"
          style="background:#04a4ff"
        >
          Nouveau mouvement
        </a>

      </div>

      <!-- TABLE CARD -->
      <div class="bg-white p-4 rounded shadow">

        <table class="w-full">

          <thead>
            <tr class="border-b text-left">
              <th class="p-2">Produit</th>
              <th class="p-2">Type</th>
              <th class="p-2">Quantité</th>
              <th class="p-2">Date</th>
            </tr>
          </thead>

          <tbody>
            <tr
              v-for="m in movements"
              :key="m.id"
              class="border-b"
            >

              <td class="p-2">
                {{ m.product.name }}
              </td>

              <td class="p-2">
                <span
                  :class="m.type.value === 1
                    ? 'text-green-600 font-medium'
                    : 'text-red-600 font-medium'"
                >
                  {{ m.type.type }}
                </span>
              </td>

              <td class="p-2">
                {{ m.quantity }}
              </td>

              <td class="p-2">
                {{ m.stock_movements_date }}
              </td>

            </tr>
          </tbody>

        </table>

      </div>

    </div>

  </DashboardLayout>
</template>