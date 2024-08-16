<template>
    <div>
        <h1>Create Team</h1>
        <form @submit.prevent="submit">
            <div>
                <label for="name">Team Name</label>
                <input type="text" v-model="form.name" id="name" />
                <span v-if="form.errors.name">{{ form.errors.name }}</span>
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';

export default {
    setup() {
        const form = useForm({
            name: '',
        });

        function submit() {
            form.post('/teams', {
                onSuccess: () => {
                    form.reset();
                },
            });
        }

        return { form, submit };
    },
};
</script>
