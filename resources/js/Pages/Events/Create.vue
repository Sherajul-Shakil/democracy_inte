<template>
    <div>
        <h1>Create Event</h1>
        <form @submit.prevent="submit">
            <div>
                <label for="name">Event Name</label>
                <input type="text" v-model="form.name" id="name" />
                <span v-if="form.errors.name">{{ form.errors.name }}</span>
            </div>

            <div>
                <label for="event_date">Event Date</label>
                <input type="date" v-model="form.event_date" id="event_date" />
                <span v-if="form.errors.event_date">{{ form.errors.event_date }}</span>
            </div>

            <div>
                <label for="team_id">Team</label>
                <select v-model="form.team_id" id="team_id">
                    <option v-for="team in teams" :key="team.id" :value="team.id">
                        {{ team.name }}
                    </option>
                </select>
                <span v-if="form.errors.team_id">{{ form.errors.team_id }}</span>
            </div>

            <button type="submit">Create</button>
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
