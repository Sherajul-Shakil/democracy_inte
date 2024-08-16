<template>
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-md p-6">
        <h1 class="text-xl font-semibold text-gray-700 mb-6">Create Event</h1>
        <form @submit.prevent="submit">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Event Name</label>
                <input type="text" v-model="form.name" id="name"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                <span v-if="form.errors.name" class="text-sm text-red-600 mt-2">{{ form.errors.name }}</span>
            </div>

            <div class="mb-4">
                <label for="event_date" class="block text-sm font-medium text-gray-700">Event Date</label>
                <input type="date" v-model="form.event_date" id="event_date"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                <span v-if="form.errors.event_date" class="text-sm text-red-600 mt-2">{{ form.errors.event_date
                    }}</span>
            </div>

            <div class="mb-6">
                <label for="team_id" class="block text-sm font-medium text-gray-700">Team</label>
                <select v-model="form.team_id" id="team_id"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option v-for="team in teams" :key="team.id" :value="team.id">
                        {{ team.name }}
                    </option>
                </select>
                <span v-if="form.errors.team_id" class="text-sm text-red-600 mt-2">{{ form.errors.team_id }}</span>
            </div>

            <button type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Create
            </button>
        </form>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';

export default {
    props: {
        teams: Array,
    },
    setup() {
        const form = useForm({
            name: '',
            event_date: '',
            team_id: null,
        });

        function submit() {
            form.post('/events', {
                onSuccess: () => {
                    form.reset();
                },
            });
        }

        return { form, submit };
    },
};
</script>
