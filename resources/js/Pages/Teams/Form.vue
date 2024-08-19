<template>
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-md p-6">
        <h1 class="text-xl font-semibold text-gray-700 mb-6">{{ isEdit ? 'Update Team' : 'Create Team' }}</h1>
        <form @submit.prevent="submit">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Team Name</label>
                <input type="text" v-model="form.name" id="name"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                <span v-if="form.errors.name" class="text-sm text-red-600 mt-2">{{ form.errors.name }}</span>
            </div>

            <button type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ isEdit ? 'Update' : 'Create' }}
            </button>
        </form>
    </div>
</template>

<script>
import { reactive, watch, computed } from 'vue';
import { useForm } from '@inertiajs/vue3';
import Layout from '@/Shared/Layout.vue';

export default {
    layout: Layout,
    props: {
        team: Object, 
    },
    setup(props) {
        const isEdit = props.team !== undefined;

        const form = useForm({
            name: props.team?.name || '',
        });

        // Store the initial form data
        const initialData = reactive({ ...form });

        // Compare form data to the initial state to check if there are any changes
        const hasChanges = computed(() => {
            return form.name !== initialData.name;
        });

        function submit() {
            // Prevent submission if there are no changes
            if (!hasChanges.value) {
                alert('No changes detected.');
                return;
            }

            if (isEdit) {
                form.put(`/teams/${props.team.id}`, {
                    onSuccess: () => {
                        form.reset();
                    },
                });
            } else {
                form.post('/teams', {
                    onSuccess: () => {
                        form.reset();
                    },
                });
            }
        }

        return { form, submit, isEdit, hasChanges };
    },
};
</script>
