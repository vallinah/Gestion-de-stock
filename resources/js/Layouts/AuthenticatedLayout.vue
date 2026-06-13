<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const showingNavigationDropdown = ref(false)
</script>

<template>
  <div class="min-h-screen bg-gray-100 flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white shadow-md p-4">
      <h1 class="text-xl font-bold mb-6" style="color:#04a4ff">
        Admin
      </h1>

      <nav class="flex flex-col gap-2">

        <Link href="/products" class="p-2 rounded hover:bg-gray-100">
          📦 Produits
        </Link>

        <Link href="/stock-movements" class="p-2 rounded hover:bg-gray-100">
          📊 Mouvement de stock
        </Link>

        <Link href="/clients" class="p-2 rounded hover:bg-gray-100">
          👤 Clients
        </Link>

      </nav>
    </aside>

    <!-- CONTENT AREA (Breeze existant conservé) -->
    <div class="flex-1">

      <!-- HEADER BREEZE ORIGINAL -->
      <nav class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
            <div class="flex">
              <div class="shrink-0 flex items-center">
                <Link href="/">
                  <span class="font-bold text-gray-800">Dashboard</span>
                </Link>
              </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
              <!-- Breeze user dropdown reste intact -->
              <slot name="header" />
            </div>
          </div>
        </div>
      </nav>

      <!-- PAGE CONTENT -->
      <main class="p-6">
        <slot />
      </main>

    </div>

  </div>
</template>