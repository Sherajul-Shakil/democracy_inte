<template>
    <div>
        <h1>Event List</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Team</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="event in events" :key="event.id">
                    <td>{{ event.id }}</td>
                    <td>{{ event.name }}</td>
                    <td>{{ event.event_date }}</td>
                    <td>{{ event.team.name }}</td>
                </tr>
            </tbody>
        </table>
        <div>
            <Link type="button" href="/events/create" class="ml-auto">Add New Event
            </Link>
        </div>

    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'
export default {

    props: {
        events: Array,
    },
    components: {
        Link,
    },
};
</script>
