<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

const page = usePage()

const isActive = (path) => {
  return page.url.startsWith(path)
}
</script>

<template>
  <div class="flex min-h-screen bg-gray-100">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#04a4ff] text-white shadow-xl flex flex-col">

      <!-- LOGO -->
      <div class="flex items-center justify-center h-20 border-b border-white/20">
        <img
          src="../assets/images/logo-biloki.png"
          alt="logo"
          class="h-14 w-auto object-contain"
        />
      </div>

      <!-- NAV -->
      <nav class="flex flex-col p-3 gap-1">

        <Link
          href="/dashboard"
          class="flex items-center gap-2 px-3 py-2 rounded-lg transition"
          :class="isActive('/dashboard')
            ? 'bg-white text-[#04a4ff]'
            : 'hover:bg-white/20 text-white'"
        >
          📊 Dashboard
        </Link>

        <Link
          href="/products"
          class="flex items-center gap-2 px-3 py-2 rounded-lg transition"
          :class="isActive('/products')
            ? 'bg-white text-[#04a4ff]'
            : 'hover:bg-white/20 text-white'"
        >
          📦 Produits
        </Link>

        <Link
          href="/stock-movements"
          class="flex items-center gap-2 px-3 py-2 rounded-lg transition"
          :class="isActive('/stock-movements')
            ? 'bg-white text-[#04a4ff]'
            : 'hover:bg-white/20 text-white'"
        >
          📊 Mouvement de stock
        </Link>

        <Link
          href="/clients"
          class="flex items-center gap-2 px-3 py-2 rounded-lg transition"
          :class="isActive('/clients')
            ? 'bg-white text-[#04a4ff]'
            : 'hover:bg-white/20 text-white'"
        >
          👤 Clients
        </Link>

      </nav>

      <!-- USER SECTION -->
      <div class="mt-auto border-t border-white/20 p-3">

        <!-- USER INFO -->
        <div class="flex items-center gap-3 mb-3">

          <div class="w-9 h-9 rounded-full bg-white text-[#04a4ff] flex items-center justify-center font-bold">
            {{ page.props.auth.user.name.charAt(0) }}
          </div>

          <div class="text-sm">
            <div class="font-semibold">
              {{ page.props.auth.user.name }}
            </div>
            <div class="text-xs text-white/70">
              {{ page.props.auth.user.email }}
            </div>
          </div>

        </div>

        <!-- PROFILE -->




<button
  @click="router.post('/logout')"
  class="w-full text-left px-3 py-2 rounded hover:bg-white/20 text-sm"
>
  🚪 Logout
</button>

      </div>

    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-6">
      <slot />
    </main>

  </div>
</template>