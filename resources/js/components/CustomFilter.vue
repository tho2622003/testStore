<template>
    <div class="custom-filter">
        <q-btn color="primary" :label="`Custom`" @click="showDialog = true" />
        <q-dialog v-model="showDialog">
            <q-card style="min-width: 350px">
                <q-card-section>
                    <div class="text-black text-h6">Input your custom {{ filterType }}:</div>
                </q-card-section>

                <q-card-section class="q-pt-none">
                    <q-select input-style="color: black" popup-content-style="color: black"
                        v-if="filterType === 'genre' || filterType === 'format'" v-model="filterValue"
                        :options="options" :label="`Select ${filterType}`" />
                    <q-input v-else v-model="filterValue" :label="`Enter ${filterType}`" />
                </q-card-section>

                <q-card-actions align="right" class="text-primary">
                    <q-btn flat label="Cancel" v-close-popup />
                    <q-btn flat label="Apply Filter" @click="applyFilter" v-close-popup />
                </q-card-actions>
            </q-card>
        </q-dialog>
    </div>
</template>

<script>
import { ref, onMounted, watch } from 'vue'

export default {
    props: {
        filterType: String,
        validOptions: {
            type: [Array, String],
            default: () => []
        }
    },
    setup(props) {
        const showDialog = ref(false)
        const filterValue = ref('')
        const options = ref([])

        const updateOptions = () => {
            if (props.filterType === 'genre' || props.filterType === 'format') {
                options.value = Array.isArray(props.validOptions)
                    ? props.validOptions
                    : JSON.parse(props.validOptions)
            }
        }

        onMounted(updateOptions)
        watch(() => props.validOptions, updateOptions)

        const applyFilter = () => {
            if (filterValue.value) {
                window.location.href = `/products/by-${props.filterType}/${filterValue.value}`
            }
        }

        return {
            showDialog,
            filterValue,
            options,
            applyFilter
        }
    }
}
</script>