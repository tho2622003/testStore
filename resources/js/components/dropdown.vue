<template>
  <div class="q-pa-sm">
    <p>Vue is working if you can see this.</p>
    <q-select
      v-model="model"
      :options="options"
      label="Filter"
      dense
      options-dense
      class="q-mt-sm"
      style="min-width: 150px;"
    />
  </div>
</template>

<script>
import { ref } from 'vue'

export default {
  setup() {
    return {
      model: ref(null),
      options: [
        'By Year',
        'By Genre',
        'By Format'
      ]
    }
  }
}
</script>