<template>
  <div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/">
      <icon name="dashboard" class="mr-2 w-4 h-4"
        :class="isUrl('') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
      <div :class="isUrl('') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Dashboard</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/teams">
      <icon name="office" class="mr-2 w-4 h-4"
        :class="isUrl('teams') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
      <div :class="isUrl('teams') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Teams</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/events">
      <icon name="users" class="mr-2 w-4 h-4"
        :class="isUrl('events') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
      <div :class="isUrl('events') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Events</div>
      </Link>
    </div>
    <!-- <div class="mb-4">
      <Link class="group flex items-center py-3" href="/reports">
        <icon name="printer" class="mr-2 w-4 h-4" :class="isUrl('reports') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('reports') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Reports</div>
      </Link>
    </div> -->
  </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon.vue'

export default {
  components: {
    Icon,
    Link,
  },
  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1)
      if (urls[0] === '') {
        return currentUrl === ''
      }
      return urls.filter((url) => currentUrl.startsWith(url)).length
    },
  },
}
</script>
